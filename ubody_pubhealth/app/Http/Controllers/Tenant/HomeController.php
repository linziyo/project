<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Archive;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Staff;
use Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        $weeks=[];
        if (Auth::user()->hasRole('staff')) {
            // 社区医院总建档数
            $staff = Staff::findByUser(Auth::user());

            $contractTotal = $staff->communityHospital->contracts()->count();
            $archiveTotal = $staff->communityHospital->archives()->count();
            $population = $staff->communityHospital->communities()->sum('population');
            $data['archive_count'] = $archiveTotal;
            $data['archive_percent'] = $population == 0 ? 0 : number_format($data['archive_count'] / $population, 3);
            $data['contract_count'] = $contractTotal;
            $data['contract_percent'] = $contractTotal == 0 ? 0 : $data['contract_count'] / $contractTotal;
            $data['latest_archive']=$staff->communityHospital->archives()->orderBy('id','desc')->limit(5)->get();
            $data['latest_contract']=$staff->communityHospital->contracts()->orderBy('id','desc')->limit(4)->get();
//            dd($data['latest_contract']);

            $data['latest_archive_mounth']=$staff->communityHospital->archives()
                ->where('created_at', '>=', Carbon::now()->subMonth())
                ->whereRaw('updated_at>created_at')
                ->count();
            $data['latest_archive_mounth_percent'] = $archiveTotal == 0 ? 0 : number_format($data['latest_archive_mounth'] / $archiveTotal, 5);


        } else if (Auth::user()->hasRole('doctor')) {
            // 社区医院总建档数
            $doctor = Doctor::findByUser(Auth::user());
            $contractTotal = $doctor->communityHospital->contracts()->count();
            $archiveTotal = $doctor->communityHospital->archives()->count();
            $population = $doctor->communityHospital->communities()->sum('population');
            $data['archive_count'] = $archiveTotal;
            $data['archive_percent'] = $population == 0 ? 0 : number_format($data['archive_count'] / $population, 3);
            $data['contract_count'] = $doctor->first()->contracts()->count();
            $data['contract_percent'] = $contractTotal == 0 ? 0 : $data['contract_count'] / $contractTotal;
            $data['latest_archive']=$doctor->communityHospital->archives()->orderBy('id','desc')->limit(4)->get();
            $data['latest_contract']=$doctor->communityHospital->contracts()->orderBy('id','desc')->limit(4)->get();
            $data['latest_archive_mounth']=$doctor->communityHospital->archives()
                ->where('created_at', '>=', Carbon::now()->subMonth())
                ->where('updated_at>created_at')
                ->count();
            $data['latest_archive_mounth_percent'] = $archiveTotal == 0 ? 0 : number_format($data['latest_archive_mounth'] / $archiveTotal, 5);

        }

        return view('tenant.home.index')->withModel($data)->withWeeks($weeks);

    }

    public function getCharts()
    {
        $dayArr = [];
        for ($i = 1; $i <= date('t'); $i++) {
            array_push($dayArr, date("Y-m") . "-" . $i);
        }
        return response()->json(['dates' => $dayArr]);
    }
    public function getWeeks()
    {
        $data=[];
        if (Auth::user()->hasRole('staff')) {

            $staff = Staff::findByUser(Auth::user());
//            $doctor_id=Doctor::select('id')->where('user_id',$staff->user_id)->first()->toArray();
            //本周一到周日所有建党统计建党统计
            $starttime = date('Y-m-d', strtotime('Sunday -6 day',time()));
            $endtime = date('Y-m-d', strtotime('Sunday 1 day',time()));
            $archives= array(date('Y-m-d', strtotime('Sunday -6 day',time()))=>'0',
                                date('Y-m-d', strtotime('Sunday -5 day',time()))=>'0',
                                date('Y-m-d', strtotime('Sunday -4 day',time()))=>'0',
                                date('Y-m-d', strtotime('Sunday -3 day',time()))=>'0',
                                date('Y-m-d', strtotime('Sunday -2 day',time()))=>'0',
                                date('Y-m-d', strtotime('Sunday -1 day',time()))=>'0',
                                date('Y-m-d', strtotime('Sunday',time()))=>'0',);
            $community_hospital_id =$staff->communityHospital->id;
            $month_archive= \DB::select("select  count(`id`) as counts ,DATE_FORMAT(created_at,'%Y-%m-%d') as days 
                            from archives where community_hospital_id =$community_hospital_id and created_at BETWEEN '".$starttime."'and '".$endtime."' group by days");
            foreach ($month_archive as $v){
                if(array_key_exists($v->days,$archives)){
                    $archives[$v->days] = $v->counts;
                }
            }

//        //获取本周一到周日所有签约统计
        $contracts =array(date('Y-m-d', strtotime('Sunday -6 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday -5 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday -4 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday -3 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday -2 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday -1 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday',time()))=>'0',);
        $month_contracts= \DB::select("select  count(`id`) as counts ,DATE_FORMAT(created_at,'%Y-%m-%d') as days 
                          from contracts where created_at BETWEEN '".$starttime."'and '".$endtime."' group by days");

        foreach ($month_contracts as $v){
            if(array_key_exists($v->days,$contracts)){
                $contracts[$v->days] = $v->counts;
            }
        }
        foreach ($month_contracts as $v){
            if(array_key_exists($v->days,$contracts)){
                $contracts[$v->days] = $v->counts;
            }
        }
        //本周一到周日所有我的建党统计建党统计

        $doctor_id=Doctor::select('id')->where('user_id',$staff->user_id)->first();

        $archive = array(date('Y-m-d', strtotime('Sunday -6 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday -5 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday -4 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday -3 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday -2 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday -1 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday',time()))=>'0',);
        $my_contract= $month_archive= \DB::select("select  count(`id`) as counts ,DATE_FORMAT(created_at,'%Y-%m-%d') as days 
                            from archives where community_hospital_id =$community_hospital_id   and doctor_id = $doctor_id->id   and created_at BETWEEN '".$starttime."'and '".$endtime."' group by days");;

        foreach ($my_contract as $v){
            if(array_key_exists($v->days,$archive)){
                $archive[$v->days] = $v->counts;
            }
        }
        //本周一到周日所有我的建党统计建党统计
        $contract =array(date('Y-m-d', strtotime('Sunday -6 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday -5 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday -4 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday -3 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday -2 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday -1 day',time()))=>'0',
            date('Y-m-d', strtotime('Sunday',time()))=>'0',);
        $my_contract= \DB::select("select  count(`id`) as counts ,DATE_FORMAT(created_at,'%Y-%m-%d') as days 
                          from contracts where created_at BETWEEN '".$starttime."'and '".$endtime."' group by days");

        foreach ($my_contract as $v){
            if(array_key_exists($v->days,$contract)){
                $contracts[$v->days] = $v->counts;
            }
        }
        $data['month_constract']=array_values($contracts);
        $data['my_constract']=array_values($archive);
        $data['month_archives']=array_values($archives);
        $data['my_archives']=array_values($archive);

    }else if (Auth::user()->hasRole('doctor')){
            $doctor = Doctor::findByUser(Auth::user());

            $starttime = date('Y-m-d', strtotime('Sunday -6 day',time()));
            $endtime = date('Y-m-d', strtotime('Sunday 1 day',time()));
            $archives= array(date('Y-m-d', strtotime('Sunday -6 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -5 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -4 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -3 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -2 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -1 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday',time()))=>'0',);
            $community_hospital_id =$doctor->communityHospital->id;
            $month_archive= \DB::select("select  count(`id`) as counts ,DATE_FORMAT(created_at,'%Y-%m-%d') as days 
                            from archives where community_hospital_id =$community_hospital_id and created_at BETWEEN '".$starttime."'and '".$endtime."' group by days");
            foreach ($month_archive as $v){
                if(array_key_exists($v->days,$archives)){
                    $archives[$v->days] = $v->counts;
                }
            }

//        //获取本周一到周日所有签约统计
            $contracts =array(date('Y-m-d', strtotime('Sunday -6 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -5 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -4 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -3 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -2 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -1 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday',time()))=>'0',);
            $month_contracts= \DB::select("select  count(`id`) as counts ,DATE_FORMAT(created_at,'%Y-%m-%d') as days 
                          from contracts where created_at BETWEEN '".$starttime."'and '".$endtime."' group by days");

            foreach ($month_contracts as $v){
                if(array_key_exists($v->days,$contracts)){
                    $contracts[$v->days] = $v->counts;
                }
            }
            foreach ($month_contracts as $v){
                if(array_key_exists($v->days,$contracts)){
                    $contracts[$v->days] = $v->counts;
                }
            }
            //本周一到周日所有我的建党统计建党统计

            $doctor_id=Doctor::select('id')->where('user_id',$doctor->user_id)->first();

            $archive = array(date('Y-m-d', strtotime('Sunday -6 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -5 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -4 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -3 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -2 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -1 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday',time()))=>'0',);
            $my_contract= $month_archive= \DB::select("select  count(`id`) as counts ,DATE_FORMAT(created_at,'%Y-%m-%d') as days 
                            from archives where community_hospital_id =$community_hospital_id   and doctor_id = $doctor_id->id   and created_at BETWEEN '".$starttime."'and '".$endtime."' group by days");;

            foreach ($my_contract as $v){
                if(array_key_exists($v->days,$archive)){
                    $archive[$v->days] = $v->counts;
                }
            }
            //本周一到周日所有我的建党统计建党统计
            $contract =array(date('Y-m-d', strtotime('Sunday -6 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -5 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -4 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -3 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -2 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday -1 day',time()))=>'0',
                date('Y-m-d', strtotime('Sunday',time()))=>'0',);
            $my_contract= \DB::select("select  count(`id`) as counts ,DATE_FORMAT(created_at,'%Y-%m-%d') as days 
                          from contracts where created_at BETWEEN '".$starttime."'and '".$endtime."' group by days");

            foreach ($my_contract as $v){
                if(array_key_exists($v->days,$contract)){
                    $contracts[$v->days] = $v->counts;
                }
            }
            $data['month_constract']=array_values($contracts);
            $data['my_constract']=array_values($archive);
            $data['month_archives']=array_values($archives);
            $data['my_archives']=array_values($archive);







        }
        return response()->json(['data'=>$data,'status'=>200]);


    }




}