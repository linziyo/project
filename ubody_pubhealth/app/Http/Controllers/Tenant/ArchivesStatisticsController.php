<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Archive;
use App\Models\Community;
use App\Models\CommunityHospital;
use DB;

class ArchivesStatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = !empty($request->id)?$request->id:1;
        return view('tenant.archives_statistics.index',['id'=>$id]);
    }


    public function getArchivesStatistics($id){
        $community_hospital_id = $id;
        $month_start_time = date('Y-m-1 00:00:00');
        $month_end_time   = date('Y-m-d 23:59:59');

        $hospital_name = CommunityHospital::find($community_hospital_id)->name;
        $month_archive_count = Archive::where('created_at','>',$month_start_time)->where('created_at','<',$month_end_time)
                                                ->where('community_hospital_id','=',$community_hospital_id)->count();
        $permanent_residents_count = Archive::where('status','=',1)->count();
        $community_hospital_population = Community::where('community_hospital_id','=',$community_hospital_id)->sum('population');
        $floating_population = $community_hospital_population - $permanent_residents_count;

        $create_archives_rate = number_format($permanent_residents_count/$community_hospital_population,2);
        $latest_archive_list = Archive::where('community_hospital_id','=',$community_hospital_id)->select(['real_name','sex'])->limit(4)->orderBy('id','desc')->get();

        $latest_archive = [];
        if($latest_archive_list){
            foreach($latest_archive_list as $key=>$val){
                $latest_archive[$key]['real_name'] = $val->real_name;
                $latest_archive[$key]['sex'] = ($val->sex == 1)?'男':'女';
            }
        }

        $archive_list = DB::select("SELECT DATE_FORMAT(created_at,'%d') days,COUNT(id) count FROM archives p WHERE p.created_at > '{$month_start_time}' 
                                          AND p.created_at < '{$month_end_time}' AND p.community_hospital_id = {$community_hospital_id} GROUP BY days");
        $archive_distributed = [];

        if(!empty($archive_list)){
            foreach($archive_list as $key=>$val){
                $archive_distributed[$val->days] = $val->count;
            }
        }
        $beginDate = date('Y-m-1', strtotime(date("Y-m-d")));
        $monthDays = date('d', strtotime("$beginDate +1 month -1 day"));

        $month_archive_list = [];
        for($i=0;$i<$monthDays;$i++){
            $month_archive_list[$i]['index'] = $i+1;
            if(array_key_exists($i,$archive_distributed)){
                $month_archive_list[$i]['value'] = $archive_distributed[$i];
            }else{
                $month_archive_list[$i]['value'] = 0;
            }
        }

        $community_list = DB::select("SELECT a.count AS value,b.name AS name FROM (SELECT community_id,COUNT(id) count 
                                                FROM archives p 
                                                WHERE p.community_hospital_id = 1 
                                                GROUP BY community_id) a LEFT JOIN communities as b 
                                                ON a.community_id = b.id");
        $management_crowd_distribution = [];
        if(!empty($community_list)){
            foreach($community_list as $key=>$val){
                $management_crowd_distribution[$key]['name'] = $val->name;
                $management_crowd_distribution[$key]['value'] = $val->value;
            }
        }

        $archive_birthday_list = DB::select("SELECT birthday FROM archives p WHERE p.community_hospital_id = {$community_hospital_id}");
        $time1 = date('Y-m-d');
        $time2 = date('Y-00-00',strtotime("-10 years"));
        $time3 = date('Y-00-00',strtotime("-20 years"));
        $time4 = date('Y-00-00',strtotime("-30 years"));
        $time5 = date('Y-00-00',strtotime("-40 years"));
        $time6 = date('Y-00-00',strtotime("-50 years"));
        $time7 = date('Y-00-00',strtotime("-60 years"));
        $time8 = date('Y-00-00',strtotime("-70 years"));
        $time9 = date('Y-00-00',strtotime("-80 years"));
        $num1 = $num2 = $num3 = $num4 = $num5 = $num6 = $num7 = $num8 = $num9 = 0;
        if(!empty($archive_birthday_list)){
            foreach($archive_birthday_list as $key=>$val){
                $birthday = $val->birthday;
                if($time2 < $birthday && $birthday < $time1){
                    $num1 += 1;
                }
                if($time3 < $birthday && $birthday < $time2){
                    $num2 += 1;
                }
                if($time4 < $birthday && $birthday < $time3){
                    $num3 += 1;
                }
                if($time5 < $birthday && $birthday < $time4){
                    $num4 += 1;
                }
                if($time6 < $birthday && $birthday < $time5){
                    $num5 += 1;
                }
                if($time7 < $birthday && $birthday < $time6){
                    $num6 += 1;
                }
                if($time8 < $birthday && $birthday < $time7){
                    $num7 += 1;
                }
                if($time9 < $birthday && $birthday < $time8){
                    $num8 += 1;
                }
                if($birthday < $time8){
                    $num9 += 1;
                }
            }
        }

        $statistics_age_list = array(0=>array('index'=>1,'value'=>$num1),
                                     1=>array('index'=>2,'value'=>$num2),
                                     2=>array('index'=>3,'value'=>$num3),
                                     3=>array('index'=>4,'value'=>$num4),
                                     4=>array('index'=>5,'value'=>$num5),
                                     5=>array('index'=>6,'value'=>$num6),
                                     6=>array('index'=>7,'value'=>$num7),
                                     7=>array('index'=>8,'value'=>$num8),
                                     8=>array('index'=>9,'value'=>$num9));

        $data = array('hospital_name'=>$hospital_name,'month_archive_count'=>$month_archive_count, 'permanent_residents_count'=>$permanent_residents_count,
                      'floating_population'=>$floating_population, 'create_archives_rate'=>$create_archives_rate, 'latest_archive'=>$latest_archive,
                      'month_archive_list'=>$month_archive_list, 'management_crowd_distribution'=>$management_crowd_distribution,'statistics_age_list'=>$statistics_age_list);
        return response()->json(['data'=>$data,'status'=>200]);
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
}
