<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Archive;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $communityHospital = Auth::user()->doctor->first()->communityHospital;
        $confirming = $communityHospital->withCount(['archives'=>function($query){
            $query->where('status',0);
        }])->first();
        $confirmed = $communityHospital->withCount(['archives'=>function($query){
            $query->where('status',1);
        }])->first();

        $data = [
            'confirming' => $confirming->archives_count,
            'confirmed' => $confirmed->archives_count,
        ];
        return view('doctor.archive.index',$data);
    }

    public function query()
    {
        $pageSize = 20;
        $type = Input::get('type',1);
        $search = Input::get('searchname','');
        $where['status'] = $type == 1?0:1;
        if(empty($search)) {
            $list = Auth::user()->doctor->first()->communityHospital->archives()->where($where)->orderBy('created_at', 'desc')->paginate($pageSize);
        }else {
            if($search == '已预约' && $type ==2){
                $list = Auth::user()->doctor->first()->communityHospital->archives()->where($where)
                    ->whereHas('contract',function($query){
                        $query->where('status',1);
                    })->orderBy('created_at', 'desc')->paginate($pageSize);
            }elseif($search == '已签约' && $type ==2){
                $list = Auth::user()->doctor->first()->communityHospital->archives()->where($where)
                    ->whereHas('contract',function($query){
                        $query->where('status',2);
                    })->orderBy('created_at', 'desc')->paginate($pageSize);
            }elseif($search == '未签约' && $type ==2){
                $archive = Auth::user()->doctor->first()->communityHospital->archives();
                $list = $archive->where($where)->doesntHave('contract')->orderBy('created_at', 'desc')->paginate($pageSize);
            }else {
                $list = Auth::user()->doctor->first()->communityHospital->archives()->where($where)
                    ->where(function ($query) use ($search) {
                        if (is_numeric($search)) {
                            $query->where('mobile', 'like', "%$search%")
                                ->orWhere('id_code', 'like', "%$search%");
                        } else {
                            $query->where('real_name', 'like', "%$search%");
                        }
                    })->orderBy('created_at', 'desc')->paginate($pageSize);
            }
        }

        if($type == 2) {

            foreach($list as &$item){
                if(!empty($item->contract)){
                    $item->contract_status = $item->contract->status;
                }else {
                    $item->contract_status = 0;
                }
                unset($item->contract);
            }
        }
        return response()->json($list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.archive.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('doctor.archive.show')->withModel(Archive::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('doctor.archive.show')->withModel(Archive::findOrFail($id));
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

    public function center() {
        $id = Input::get('aid');
        return view('doctor.archive.center')->withModel(Archive::findOrFail($id));;
    }
}
