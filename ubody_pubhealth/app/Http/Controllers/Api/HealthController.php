<?php

namespace App\Http\Controllers\Api;

use App\Events\HealthCreatedEvent;
use App\Models\Device;
use App\Models\Health;
use App\Models\HealthMember;
use Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Health::paginate(20);
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
        $health = new Health();
        $health->fill($request->all());
        $health->content = $request->getContent();
        $health->save();

        return response()->json(['id' => $health->id, 'created_at' => $health['created_at']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Health::with(['Member','Height','Fat','MinFat','BloodPressure','BloodOxygen','Ecg','PEEcg',
            'Temperature','Whr','BloodSugar','UricAcid','Chol','BloodFat','Cardiovascular','BMD','Alcohol',
            'Lung','Hb','Urinalysis',])->findOrFail($id);

        return response()->json($model);
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
        $v = \Validator::make($request->all(), []);

        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }

        $model = Health::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        return response()->json(['updated_at' => $model->updated_at], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Health::findOrFail($id);
        $model->delete();
        return response()->json();
    }

    //设备下所有的体检数据
    public function getDevicesHealthList(Request $request)
    {
        $MachineId = $request->get('MachineId');
        $DeviceType = $request->get('DeviceType');
        $device = Device::where(['code' => $MachineId, 'type' => $DeviceType])->first();
        if(!$device){
            return response()->json(['code'=>403,'message'=>'The device does not exist']);
        }
        $healths = Health::where('MachineId',$MachineId)->where('DeviceType',$DeviceType)->with('member')->get();
        if(!$healths){
            return response()->json(['code'=>403,'message'=>'No physical examination data']);
        }

        return response()->json(['code'=>200,'message'=>'success','health_list'=>$healths,'devices'=>$device]);

    }

    //当前用户最新体检数据
    public function getHealths()
    {
        $user = \Auth::user();
        if(!$user || empty($user['id_code'])){
            return response()->json(['code'=>403,'message'=>"用户没有绑定身份证"]);
        }
        $id_code = $user['id_code'];
//        $id_code = $request->get('id_code');
        $health = HealthMember::select('health_id')->where('IdCode',$id_code)->orderBy('id','desc')->limit(1)->get()->toArray();
        if(empty($health)){
            return response()->json(['code'=>403,'message'=>'The HealthMember does not find by id_code:'.$id_code]);
        }
        $model = Health::findOrFail($health[0]['health_id']);
        if(empty($model)){
            return response()->json(['code'=>403,'message'=>'The Health does not exist']);
        }
        $member = $model->member()->get()->toArray();
        $age = isset($member[0]['Age'])?$member[0]['Age']:0;
        $sex = isset($member[0]['Sex'])?$member[0]['Sex']:0;

        $alcohol = $model->alcohol()->get()->toArray();
        if($alcohol){
            $alcohol[0]['health_analysis'] = $model->alcohol->isAbnormal();
        }
        $bloodFat = $model->bloodFat()->get()->toArray();
        if($bloodFat){
            $bloodFat[0]['health_analysis'] = $model->bloodFat->isAbnormal();
        }
        $bloodOxygen = $model->bloodOxygen()->get()->toArray();
        if($bloodOxygen){
            $bloodOxygen[0]['health_analysis'] = $model->bloodOxygen->isAbnormal();
        }
        $bloodPressure = $model->bloodPressure()->get()->toArray();
        if($bloodPressure){
            $bloodPressure[0]['health_analysis'] = $model->bloodPressure->isAbnormal();
        }
        $bloodSugar = $model->bloodSugar()->get()->toArray();
        if($bloodSugar){
            foreach($bloodSugar as $key=>$val){
                $bloodSugar[$key]['health_analysis'] = $model->bloodSugar->isAbnormal();
            }
        }
        $bMD = $model->bMD()->get()->toArray();
        if($bMD){
            $bMD[0]['health_analysis'] = $model->bMD->isAbnormal();
        }
        $cardiovascular = $model->cardiovascular()->get()->toArray();
        if($cardiovascular){
            $cardiovascular[0]['health_analysis'] = false;
        }
        $chol = $model->chol()->get()->toArray();
        if($chol){
            $chol[0]['health_analysis'] = $model->chol->isAbnormal();
        }
        $ecg = $model->ecg()->get()->toArray();
        if($ecg){
            $ecg[0]['health_analysis'] = $model->ecg->isAbnormal($sex);
        }
        $fat = $model->fat()->get()->toArray();
        if($fat){
            $fat[0]['health_analysis'] = false;
        }
        $hb = $model->hb()->get()->toArray();
        if($hb){
            $hb[0]['health_analysis'] = $model->hb->isAbnormal($sex);
        }
        $height = $model->height()->get()->toArray();
        if($height){
            $height[0]['health_analysis'] = false;
        }
        $lung = $model->lung()->get()->toArray();
        if($lung){
            $lung[0]['health_analysis'] = $model->lung->isAbnormal($sex);
        }
        $minFat = $model->minFat()->get()->toArray();
        if($minFat){
            $minFat[0]['health_analysis'] = false;
        }
        $pEEcg = $model->pEEcg()->get()->toArray();
        if($pEEcg){
            $pEEcg[0]['health_analysis'] = false;
        }
        $temperature = $model->temperature()->get()->toArray();
        if($temperature){
            $temperature[0]['health_analysis'] = $model->temperature->isAbnormal();
        }
        $uricAcid = $model->uricAcid()->get()->toArray();
        if($uricAcid){
            $uricAcid[0]['health_analysis'] = $model->uricAcid->isAbnormal($sex,$age);
        }
        $urinalysis = $model->urinalysis()->get()->toArray();
        if($urinalysis){
            $urinalysis[0]['health_analysis'] = $model->urinalysis->isAbnormal();
        }
        $whr = $model->whr()->get()->toArray();
        if($whr){
            $whr[0]['health_analysis'] = $model->whr->isAbnormal($sex);
        }

        $data = ['alcohol'=>$alcohol,'bloodFat'=>$bloodFat,'bloodOxygen'=>$bloodOxygen,'bloodPressure'=>$bloodPressure,'bloodSugar'=>$bloodSugar,
            'bMD'=>$bMD,'cardiovascular'=>$cardiovascular,'chol'=>$chol,'ecg'=>$ecg,'fat'=>$fat,'hb'=>$hb,'height'=>$height,'lung'=>$lung,
            'minFat'=>$minFat,'pEEcg'=>$pEEcg,'temperature'=>$temperature,'uricAcid'=>$uricAcid,'urinalysis'=>$urinalysis,'whr'=>$whr,'member'=>$member];

        return response()->json(['code'=>200,'message'=>'success','data'=>$data]);

    }

    //获取体检趋势图信息
    public function getHealthListData(Request $request)
    {
        $id_code = $request->get('id_code');
        $health_type = $request->get('health_type');
//        $asynchronous = !empty($request->get('asynchronous')) ? $request->get('asynchronous') : 0;
        $startTime    = !empty($request->get('startTime')) ? $request->get('startTime') : 0;
        $endTime      = !empty($request->get('endTime')) ? date("Y-m-d",strtotime($request->get('endTime')." +1 day")) : date('Y-m-d',strtotime('+1 day'));

        $types = ['alcohol' => 'health_alcohol', 'bloodFat' => 'health_blood_fat', 'bloodOxygen' => 'health_blood_oxygen', 'bloodPressure' => 'health_blood_pressure',
            'bloodSugar' => 'health_blood_sugar', 'bMD' => 'health_bmd', 'cardiovascular' => 'health_cardiovascular', 'chol' => 'health_chol', 'ecg' => 'health_ecg',
            'fat' => 'health_fat', 'hb' => 'health_hb', 'height' => 'health_height', 'lung' => 'health_lung', 'minFat' => 'health_min_fat', 'pEEcg' => 'health_peecg',
            'temperature' => 'health_temperature', 'uricAcid' => 'health_uric_acid', 'urinalysis' => 'health_urinalysis', 'whr' => 'health_whr'];

        $data = DB::table($types[$health_type])
            ->whereIn('health_id',function ($query) use ($id_code) {
                $query->select('health_id')
                    ->from('health_member')
                    ->where('health_member.IdCode', $id_code);
            })->join('healths',"$types[$health_type].health_id",'=','healths.id')->select("$types[$health_type].*",'healths.MachineId','healths.UnitNo','healths.UnitName','healths.MacAddr','healths.RecordNo','healths.MeasureTime','healths.DeviceType','healths.LoginType')
            ->whereBetween('healths.MeasureTime', [$startTime, $endTime])->orderBy('healths.MeasureTime','desc')->get();

        return response()->json(['code'=>200,'message'=>'success','data'=>$data]);
    }

}
