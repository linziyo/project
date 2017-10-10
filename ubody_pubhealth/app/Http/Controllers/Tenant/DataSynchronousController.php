<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Archive;
use App\Models\Community;
use App\Models\Doctor;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sonka\Importer\Handler\Luohu;


class DataSynchronousController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $communitys = Community::where('tenant_id',$user->tenant_id)->get();
        return view('tenant.data_synchronous.index')->withCommunitys($communitys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     * 健康罗湖管理系统数据导入
     *
     */
    public function getLuoHuHealth(Request $request){
        set_time_limit(0);
        $username = $request->get('username');
        $password = $request->get('password');
        $community = $request->get('community');

        if(!empty($username) && !empty($password)){
            $doctor = Doctor::findByUser(\Auth::user());
            $luoHu = new Luohu($username,$password);
            $result = $luoHu->syncArchives();
            $json = json_decode($result);

            if($json){
                foreach($json as $key=>$val){
                    $archive = new Archive();
                    $hasArchive = $archive->where('id_code',$val->id_code)->first();
                    if(empty($hasArchive)){
                        $archive->community_hospital_id = $doctor->community_hospital_id;
                        $archive->community_id = $community;
                        $archive->real_name = $val->real_name;
                        $archive->sex       = $val->sex;
                        $archive->birthday  = $val->birthday;
                        $archive->id_code   = $val->id_code;
                        $archive->mobile    = $val->mobile;
                        $archive->address   = $val->address;
                        $archive->save();
                    }
                }
            }
            return response()->json(['msg'=>'success','status'=>200]);
        }
        return response()->json(['msg'=>'error','status'=>400]);
    }

}