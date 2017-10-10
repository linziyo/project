<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Archive;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;

class ContractController extends Controller
{
    protected $archiveValidate = ['real_name'=>'required','mobile'=>'required|mobile','id_code'=>'required|id_card_number','address'=>'required'];
    protected $familyValidate = ['name'=>'required','mobile'=>'mobile','id_code'=>'required|id_card_number','relationship'=>'required'];

    /**签约列表
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Auth::user()->doctor->first();
        $data = $doctor->contracts()->select(DB::raw('count(id) as total,status'))->groupBy('status')->get()->toArray();
        if(!empty($data)){
            $data = array_column($data,'total','status');
        }
        $data = [
            'confirming' => !empty($data[1])?$data[1]:0,
            'confirmed' => !empty($data[2])?$data[2]:0
        ];
        return view('doctor.contract.index',$data);
    }

    /**签约待确认和或已签约用户
     * @return \Illuminate\Http\JsonResponse
     */
    public function query()
    {
        $pageSize = 20;
        $type = Input::get('type',1);
        $data = Auth::user()->doctor->first()->contracts()->with('archive')->where('status',$type)->orderBy('created_at','desc')->paginate($pageSize);
        foreach($data as $key=>&$item){
             $item->real_name = $item->archive->real_name;
             $item->mobile = $item->archive->mobile;
             $item->id_code = $item->archive->id_code;
             $item->aid = $item->archive->id;
        }

        return response()->json($data);
    }

    /**发起签约
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $archive_id = $id;
        $archive = Archive::findOrFail($archive_id);
        $packages = Auth::user()->doctor->first()->CommunityHospital->packages()->get()->toArray();
        $data['packages'] = $packages;
        $data['archive'] = $archive;
        return $data;
    }

    /**
     * 创建或更新
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->isMethod('post')){
            $archive_id = $request->input('id');
            $archive = Archive::findOrFail($archive_id);
            $archiveData = [
                'real_name' => $request->input('real_name'),
                'mobile' => $request->input('mobile'),
                'id_code' => $request->input('id_code'),
                'address' => $request->input('address'),
            ];
            $validator = \Validator::make($archiveData,$this->archiveValidate);
            if($validator->fails()){
                $this->throwValidationException($request,$validator);
            }

            //家庭成员
            $self = [
                'name' => $archiveData['real_name'],
                'mobile' => $archiveData['mobile'],
                'id_code' => $archiveData['id_code'],
                'relationship' => '本人'
            ];
            $family[] = $self;
            $member = $request->input('member');
            if(!empty($member)){
                foreach($member as $item){
                    $record = [
                        'name' => $item['name'],
                        'mobile' => $item['mobile'],
                        'id_code' => $item['id_code'],
                        'relationship' => $item['relationship']
                    ];
                    $validator = \Validator::make($record,$this->familyValidate);
                    if($validator->fails()){
                        $this->throwValidationException($request,$validator);
                    }
                    $family[] = $record;
                }
            }

            //更新档案
            $archive->update($archiveData);

            if($archive->contract){
                $data = $this->updateContract($request,$archive,$family);
            }else {
                $data = $this->createContract($request,$archive,$family);
            }
            $data['data']['url'] = URL::action('Doctor\ArchiveController@center',['aid'=>$archive_id]);
            return response()->json($data['data'],$data['code']);

        }
    }

    /**创建
     * @param $request
     * @param $archive
     * @param $family
     * @return mixed
     */
    protected function createContract($request,$archive,$family){

        //添加合同
        $contractData = [
            'doctor_id' => Auth::user()->doctor->first()->id,
            'package_id' => $request->input('package_id'),
            'archive_id' => $archive->id,
            'status' => 2,
            'start_time' => date('Y-m-d'),
            'end_time' => date('Y-m-d',strtotime('+1 year')),
        ];
        $contractModel = new Contract();
        $contractModel->fill($contractData);
        if($contractModel->save()){
            $contractModel->family()->createMany($family);
        }

        $data['data'] = ['success'=>true];
        $data['code'] = 200;
        return $data;
    }

    /**更新
     * @param $request
     * @param $archive
     * @param $family
     * @return mixed
     */
    protected function updateContract($request,$archive,$family){


        $contractData = [
            'package_id' => $request->input('package_id'),
            'status' => 2,
        ];
        $contractModel = $archive->contract;
        $contractModel->fill($contractData);
        if($contractModel->save()){
            $contractModel->family()->forceDelete();
            $contractModel->family()->createMany($family);
        }
        $data['data'] = ['success'=>true];
        $data['code'] = 200;
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $archive = Archive::findOrFail($id);
        if($archive->contract){
            $data = $this->detail($id);
        }else {
            $data = $this->create($id);
        }
        $data['id'] = $id;
        return view('doctor.contract.create',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**签约信息
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id) {
        $archive = Archive::findOrFail($id);

        $contract = $archive->contract;

        $family = $contract->family;

        $packages = Auth::user()->doctor->first()->CommunityHospital->packages()->get()->toArray();
        $selectPackage = [];
        foreach($packages as $key=>$item){
            if($item['id'] == $contract->package_id){
                $selectPackage = $packages[$key];
                unset($packages[$key]);
                break;
            }
        }
        if(!empty($selectPackage)){
            array_unshift($packages,$selectPackage);
        }
        $data = [
            'package_id' => $contract->package_id,
            'contract_status' => $contract->status,
            'family' => $family->toArray(),
            'packages' => $packages,
            'archive' => $archive
        ];


        return $data;

    }

}
