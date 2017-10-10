<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Archive;
use App\Models\Community;
use App\Models\Doctor;
use App\Models\Health;
use App\Models\HealthMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Redirect;
use Validator;
use Form;

class ArchiveController extends Controller
{

    public $createValidation = ['community_id'=>'required', 'real_name'=>'required', 'id_code'=>'required', 'birthday'=>'required', 'sex'=>'required', 'mobile'=>'required',
                                'work_unit'=>'required', 'contact_name'=>'required', 'contact_mobile'=>'required','emergency_contact_name'=>'required','emergency_contact_mobile'=>'required',
                                'phone_number'=>'required', 'address'=>'required', 'nation'=>'required', 'education'=>'required', 'job'=>'required', 'blood_group'=>'required',
                                'blood_group_rh'=>'required','marital_status'=>'required', 'paymentModes' => 'required',  'allergies'=>'required',
                                'exposes'=>'required', 'diseases'=>'required', 'injuries'=>'required', 'operations'=>'required', 'transfusions'=>'required', 'families'=>'required',
                                'hereditaryDiseases'=>'required', 'disabilities'=>'required', 'livingKitchen'=>'required', 'livingFuel'=>'required', 'livingWater'=>'required',
                                'livingToilet'=>'required', 'livingFence'=>'required'];

    public $createColumns = ['community_id', 'real_name', 'id_code', 'birthday', 'sex', 'mobile', 'work_unit', 'contact_name', 'contact_mobile', 'emergency_contact_name',
                            'emergency_contact_mobile', 'phone_number', 'address', 'nation', 'education', 'job', 'blood_group', 'blood_group_rh', 'description',
                            'marital_status', 'paymentModes',  'allergies', 'exposes', 'diseases', 'injuries', 'operations', 'transfusions', 'families', 'hereditaryDiseases',
                            'disabilities', 'livingKitchen', 'livingFuel', 'livingWater', 'livingToilet', 'livingFence'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $doctor = Doctor::findByUser(\Auth::user());
        $q = $request->get('q');
        if (empty($q)) {
            return view('tenant.archive.index')->withList($doctor->communityHospital->archives()->orderBy('updated_at','DESC')->paginate(20));
        } else {
            if(is_numeric($q)){
                if(substr($q,0,1) == 1){
                    return view('tenant.archive.index')->withList($doctor->communityHospital->archives()->where('mobile','like',"%$q%")->orderBy('updated_at','DESC')->paginate(20))->withInput($request->all);
                }else {
                    return view('tenant.archive.index')->withList($doctor->communityHospital->archives()->where('id_code','like',"%$q%")->orderBy('updated_at','DESC')->paginate(20))->withInput($request->all);
                }
            }else {
                return view('tenant.archive.index')->withList($doctor->communityHospital->archives()->where('real_name','like',"%$q%")->orderBy('updated_at','DESC')->paginate(20))->withInput($request->all);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        Form::setValidation($this->createValidation);
        $list = Community::pluck('name', 'id')->all();
        return view('tenant.archive.create')->withList($list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $inputs = Input::only($this->createColumns);
//        $rules = $this->createValidation;
//        $validator = Validator::make($inputs, $rules);
//        if ($validator->fails()) {
//            return Redirect::back()->withErrors($validator);
//        }

        $doctor = Doctor::findByUser(\Auth::user());
        $model = new Archive();
        $archive = $model->where('community_id',$request->get('community_id'))->where('id_code',$request->get('id_code'))->first();
        if($archive){
            return response()->json(['errorCode'=>403,'message'=>'repeat id_code']);
        }
        $model->fill($request->all());
        $model->community_hospital_id = $doctor->community_hospital_id;
        $model->doctor_id = $doctor->id;
        $model->status = 1;
        $model->save();

        $this->postArchivesRelationData($model, $request);
        return response()->json(['errorCode' => 0, 'message' => 'success']);
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
        $health = $this->getPersonalHealthData($archive->id_code);
        $model = Archive::with(['visits' => function($query){
            $query->orderBy('created_at','desc');
        }])->findOrFail($id);
        return view('tenant.archive.show')->withModel($model)->withHealths($health)->withType('Evaluation');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Archive::findOrFail($id);
        $doctor = Doctor::findByUser(\Auth::user());
        $payment_list = $model->paymentModes()->get()->toArray();
        if($payment_list){
            $payment_list = array_column($payment_list,'content','value');
        }
        $allergy_list = $model->allergies()->get()->toArray();
        if($allergy_list){
            $allergy_list = array_column($allergy_list,'content','value');
        }
        $expose_list = $model->exposes()->get()->toArray();
        if($expose_list){
            $expose_list = array_column($expose_list,'value');
        }

        $disability_list = $model->disabilities()->get()->toArray();
        if($disability_list){
            $disability_list = array_column($disability_list,'value');
        }

        return view('tenant.archive.edit')->withModel($model)
                                                ->withCommunities($doctor->communityHospital->communities()->pluck('name','id'))
                                                ->withPaymentlist($payment_list)
                                                ->withAllergylist($allergy_list)
                                                ->withExposelist($expose_list)
                                                ->withDisabilitylist($disability_list);
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
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $doctor = Doctor::findByUser(\Auth::user());
        $model = Archive::findOrFail($id);
        if($model->id_code != $request->get('id_code')){
            $archive = Archive::where('community_id',$request->get('community_id'))->where('id_code','<>',$request->get('id_code'))->first();
            if($archive){
                return response()->json(['errorCode'=>403,'message'=>'repeat id_code']);
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
        return response()->json(['errorCode' => 0, 'message' => 'success']);
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
        return response()->json();
    }

    //基本信息
    public function getArchivesBase($id)
    {
        $model = Archive::findOrFail($id);
        return view('tenant.archive.show')->withModel($model)->withType('Base');
    }

    //随访记录
    public function getArchivesVisitor($id)
    {
        $model = Archive::findOrFail($id);
        return view('tenant.archive.show')->withModel($model)->withType('Visitor');
    }

    //签约信息
    public function getArchivesContract($id)
    {
        $model = Archive::findOrFail($id);
        $hospital = Doctor::findByUser(\Auth::user())->communityHospital;
        return view('tenant.archive.show')
        ->withPackages($hospital->packages)
        ->withModel($model)->withType('Contract');
    }
    //体检数据
    public function getArchivesHealth($id)
    {
        $archive = Archive::findOrFail($id);
        $health = $this->getPersonalHealthData($archive->id_code);
        return view('tenant.archive.show')->withModel($archive)->withHealth($health)->withType('Health');
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

    private static function getPersonalHealthData($IdCode){
        $health = HealthMember::where('IdCode',$IdCode)->select('health_id')->orderBy('id','desc')->limit(1)->get();
        if(empty($health[0])){
            return $data = [];
        }
        $model = Health::findOrFail($health[0]->health_id);
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
            $bloodSugar[0]['health_analysis'] = $model->bloodSugar->isAbnormal();
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
        return $data;
    }
}