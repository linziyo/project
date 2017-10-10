<?php

namespace App\Http\Controllers\Api;

use App\Models\Archive;
use App\Models\Contract;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ArchiveController extends Controller
{
    public $createValidation = ['community_id'=>'required', 'real_name'=>'required', 'id_code'=>'required'];

    public $createColumns = ['community_id', 'real_name', 'id_code'];

    public $age_range = [
        '1'=>['starttime'=>'0','endtime'=>'3'], '2'=>['starttime'=>'3','endtime'=>'10'], '3'=>['starttime'=>'11','endtime'=>'20'],
        '4'=>['starttime'=>'21','endtime'=>'30'], '5'=>['starttime'=>'31','endtime'=>'40'], '6'=>['starttime'=>'41','endtime'=>'50'],
        '7'=>['starttime'=>'51','endtime'=>'60'], '8'=>['starttime'=>'60','endtime'=>'100']
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));//名字、手机号
        $community_id = $request->get('community_id');//社区
        $resident_type = $request->get('resident_type');//居民类型
        $visit_mode = $request->get('visit_mode');//随访类型
        $age = $request->get('age')?$this->age_range[$request->get('age')]:'';//年龄

        $res = Archive::with(['contract','visits']);

            if (!empty($search)) {
                if (is_numeric($search)) {
                    $res->where('archives.mobile', 'like', "%$search%");
                } else {
                    $res->where('archives.real_name', 'like', "%$search%");
                }
            }

            if(!empty($community_id)){
                $res->where('archives.community_id',$community_id);
            }
            if(!empty($resident_type)){
                $res->whereHas('contract', function ($query)use ($resident_type) {
                    $query->where('status',$resident_type);
                });
            }
            if(!empty($visited_style)){
                $res->whereHas('visits', function ($query)use ($visit_mode) {
                    $query->where('visit_mode',$visit_mode);
                });
            }

            if(!empty($age)){
                $res->whereBetween( 'archives.birthday',[ date('Y-m-d') - $age['endtime'] , date('Y-m-d') - $age['starttime']+1 ]);
            }

        $list = $res->paginate(20);

        return response()->json($list);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验证
        $inputs = $request->only($this->createColumns);
        $rules = $this->createValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }

        $doctor = Doctor::findByUser(\Auth::user());
        $model = new Archive();
        $archive = $model->where('community_id',$request->get('community_id'))->where('id_code',$request->get('id_code'))->first();
        if($archive){
            return response()->json(['code'=>403,'message'=>'repeat id_code']);
        }
        $model->fill($request->all());
        $model->community_hospital_id = $doctor->community_hospital_id;
        $model->doctor_id = $doctor->id;
        $model->tenant_id = $doctor->tenant_id;
        $model->status = 1;
        $model->save();

        $this->postArchivesRelationData($model, $request);

        return response()->json(['id' => $model->id, 'created_at' => $model->created_at,'code'=>201,'message'=>"success"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $archive = Archive::with([
            'paymentModes', 'allergies', 'exposes', 'diseases', 'operations', 'injuries', 'transfusions',
            'families', 'hereditaryDisease', 'disabilities', 'livingKitchen', 'livingFuel', 'livingWater',
            'livingToilet', 'livingFence','contract','doctor','visits' => function($query){ $query->orderBy('created_at','desc');}
        ])->findOrFail($id);
        if($archive){
            return response()->json($archive);
        }
        return response()->json(['code'=>403,'message'=>"not find"]);

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
        //验证
        $inputs = $request->only($this->createColumns);
        $rules = $this->createValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }

        $doctor = Doctor::findByUser(\Auth::user());
        $model = Archive::findOrFail($id);
        if($model->id_code != $request->get('id_code')){
            $archive = Archive::where('community_id',$request->get('community_id'))->where('id_code','<>',$request->get('id_code'))->first();
            if($archive){
                return response()->json(['code'=>403,'message'=>'repeat id_code']);
            }
        }

        $model->fill($request->all());
        $model->community_hospital_id = $doctor->community_hospital_id;
        $model->save();

        $model->paymentModes()->where('archive_id',$id)->delete();
        $model->allergies()->where('archive_id',$id)->delete();
        $model->exposes()->where('archive_id',$id)->delete();
        $model->diseases()->where('archive_id',$id)->delete();
        $model->injuries()->where('archive_id',$id)->delete();
        $model->operations()->where('archive_id',$id)->delete();
        $model->transfusions()->where('archive_id',$id)->delete();
        $model->families()->where('archive_id',$id)->delete();
        $model->hereditaryDisease()->where('archive_id',$id)->delete();
        $model->disabilities()->where('archive_id',$id)->delete();
        $model->livingKitchen()->where('archive_id',$id)->delete();
        $model->livingFuel()->where('archive_id',$id)->delete();
        $model->livingWater()->where('archive_id',$id)->delete();
        $model->livingToilet()->where('archive_id',$id)->delete();
        $model->livingFence()->where('archive_id',$id)->delete();

        $this->postArchivesRelationData($model, $request);


        return response()->json(['updated_at' => $model->updated_at,'code'=>200,'message'=>"success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Archive::findOrFail($id);
        $model->delete();
        $model->paymentModes()->where('archive_id',$id)->delete();
        $model->allergies()->where('archive_id',$id)->delete();
        $model->exposes()->where('archive_id',$id)->delete();
        $model->diseases()->where('archive_id',$id)->delete();
        $model->injuries()->where('archive_id',$id)->delete();
        $model->operations()->where('archive_id',$id)->delete();
        $model->transfusions()->where('archive_id',$id)->delete();
        $model->families()->where('archive_id',$id)->delete();
        $model->hereditaryDisease()->where('archive_id',$id)->delete();
        $model->disabilities()->where('archive_id',$id)->delete();
        $model->livingKitchen()->where('archive_id',$id)->delete();
        $model->livingFuel()->where('archive_id',$id)->delete();
        $model->livingWater()->where('archive_id',$id)->delete();
        $model->livingToilet()->where('archive_id',$id)->delete();
        $model->livingFence()->where('archive_id',$id)->delete();
        return response()->json(['code'=>203,'message'=>"success"]);
    }

    private function postArchivesRelationData($model, $request){
        if ($request->get('paymentModes')) {
            $model->paymentModes()->createMany($request->get('paymentModes'));
        }
        if ($request->get('allergies')) {
            $model->allergies()->createMany($request->get('allergies'));
        }
        if ($request->get('exposes')) {
            $model->exposes()->createMany($request->get('exposes'));
        }
        if (!empty($request->get('diseases'))) {
            $model->diseases()->createMany($request->get('diseases'));
        }
        if (!empty($request->get('injuries'))) {
            $model->injuries()->createMany($request->get('injuries'));
        }
        if (!empty($request->get('operations'))) {
            $model->operations()->createMany($request->get('operations'));
        }
        if (!empty($request->get('transfusions'))) {
            $model->transfusions()->createMany($request->get('transfusions'));
        }
        if (!empty($request->get('families'))) {
            $model->families()->createMany($request->get('families'));
        }
        if (!empty($request->get('hereditaryDiseases'))) {
            $model->hereditaryDisease()->createMany($request->get('hereditaryDiseases'));
        }
        if (!empty($request->get('disabilities'))) {
            $model->disabilities()->createMany($request->get('disabilities'));
        }
        if (!empty($request->get('livingKitchen'))) {
            $model->livingKitchen()->createMany($request->get('livingKitchen'));
        }
        if (!empty($request->get('livingFuel'))) {
            $model->livingFuel()->createMany($request->get('livingFuel'));
        }
        if (!empty($request->get('livingWater'))) {
            $model->livingWater()->createMany($request->get('livingWater'));
        }
        if (!empty($request->get('livingToilet'))) {
            $model->livingToilet()->createMany($request->get('livingToilet'));
        }
        if (!empty($request->get('livingFence'))) {
            $model->livingFence()->createMany($request->get('livingFence'));
        }
    }

    public function total(){
        $starttime = date('Y-m-d').' 00:00:00';
        $endtime = date('Y-m-d').' 23:59:59';
        $archive_num = Archive::whereBetween('created_at',[$starttime,$endtime])->count();
        $contract_num = Contract::whereBetween('created_at',[$starttime,$endtime])->count();

        return response()->json(['code'=>205,'message'=>"success",'data'=>['archive_num'=>$archive_num,'contract_num'=>$contract_num]]);
    }
}
