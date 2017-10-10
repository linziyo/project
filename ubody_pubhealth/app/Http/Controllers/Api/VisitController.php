<?php

namespace App\Http\Controllers\Api;


use App\Models\Doctor;
use App\Models\User;
use App\Models\Visit;
use App\Models\VisitChineseMedicine;
use App\Models\VisitDiabete;
use App\Models\VisitHypertension;
use App\Models\VisitMentalPatient;
use App\Models\VisitNewborn;
use App\Models\VisitSelfCareAbility;
use App\Models\VisitTuberculosisFirstRecord;
use App\Models\VisitTuberculosisPatient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisitController extends Controller
{
    public $selfcareValidation = ['archive_id'=>'required', 'meal'=>'required', 'comb_wash'=>'required', 'dressing'=>'required','toilets'=>'required',];
    public $selfcareColumns = ['archive_id', 'visit_mode', 'meal', 'comb_wash', 'dressing', 'toilets', 'activity','tenant_id'];

    public $hypertensionValidation = ['archive_id'=>'required', 'visited_at'=>'required', 'visit_mode'=>'required', 'symptom'=>'required', 'signs'=>'required',
        'auxiliary_check'=>'required','medication_compliance'=>'required','adverse_drug'=>'required','visit_classification'=>'required',
        'next_visited_at'=>'required','visit_doctor_signature'=>'required',];
    public $hypertensionColumns = ['archive_id','visited_at', 'visit_mode','symptom', 'signs', 'auxiliary_check', 'medication_compliance', 'adverse_drug',
        'visit_classification','next_visited_at','visit_doctor_signature'];

    public $diabeteValidation = ['archive_id'=>'required', 'visited_at'=>'required', 'visit_mode'=>'required', 'symptom'=>'required', 'signs'=>'required',
        'life_style'=>'required', 'auxiliary_check'=>'required','medication_compliance'=>'required','adverse_drug'=>'required','hypoglycemia_reaction'=>'required',
        'visit_classification'=>'required','medication_situation'=>'required','referral'=>'required', 'next_visited_at'=>'required','visit_doctor_signature'=>'required',];
    public $diabeteColumns = ['archive_id','visited_at', 'visit_mode','symptom','life_style', 'signs', 'auxiliary_check', 'medication_compliance', 'adverse_drug',
        'hypoglycemia_reaction', 'visit_classification','medication_situation','referral','next_visited_at','visit_doctor_signature'];

    public $mentalpatientValidation = ['archive_id'=>'required', 'visited_at'=>'required', 'visit_mode'=>'required', 'lost_visit'=>'required', 'death'=>'required',
        'risk_assessment'=>'required', 'symptom'=>'required','insight'=>'required','sleep'=>'required','diet'=>'required','social_function'=>'required','two_visit'=>'required',
        'two_hospitalization'=>'required', 'laboratory_examination'=>'required','medication_compliance'=>'required','adverse_drug'=>'required','treatment_effect'=>'required',
        'referral'=>'required','medication_situation'=>'required','medication_instruction'=>'required','rehabilitation_measures'=>'required','visit_classification'=>'required',
        'visit_doctor_signature'=>'required','next_visited_at'=>'required'];
    public $mentalpatientColumns =  ['archive_id', 'visited_at', 'visit_mode', 'lost_visit', 'death','risk_assessment', 'symptom', 'insight', 'sleep', 'diet',
        'social_function', 'dangerous_act','two_visit', 'two_hospitalization', 'laboratory_examination', 'medication_compliance','adverse_drug', 'treatment_effect',
        'referral', 'medication_situation','medication_instruction','rehabilitation_measures', 'visit_classification', 'visit_doctor_signature','next_visited_at'];

    public $tuberculosisfirstValidation = ['archive_id'=>'required', 'visited_at'=>'required', 'visit_mode'=>'required', 'patient_type'=>'required', 'sputum_situation'=>'required',
        'drug_resistance'=>'required', 'symptom'=>'required','medication'=>'required','supervise_staff'=>'required','living_environment'=>'required','life_style'=>'required',
        'education_training'=>'required','next_visited_at'=>'required', 'visit_doctor_signature'=>'required'];
    public $tuberculosisfirstColumns =  ['archive_id', 'visited_at', 'visit_mode', 'patient_type', 'sputum_situation','drug_resistance', 'symptom', 'medication', 'supervise_staff',
        'living_environment', 'life_style', 'education_training','next_visited_at', 'visit_doctor_signature'];

    public $tuberculosisValidation = ['archive_id'=>'required', 'visited_at'=>'required', 'visit_mode'=>'required', 'real_name'=>'required', 'treatment_monthly'=>'required | numeric',
        'supervise_staff'=>'required', 'symptom'=>'required','lift_style'=>'required','medication'=>'required','drug_response'=>'required','complication'=>'required',
        'referral'=>'required','opinions'=>'required', 'next_visited_at'=>'required', 'visit_doctor_signature'=>'required', 'stop_treatment'=>'required', 'full_management'=>'required'];
    public $tuberculosisColumns =  ['archive_id', 'visited_at', 'visit_mode', 'real_name', 'treatment_monthly','supervise_staff', 'symptom', 'lift_style', 'medication',
        'drug_response', 'complication', 'referral','opinions', 'next_visited_at','visit_doctor_signature','stop_treatment','full_management'];

    public $chinesemedicineValidation = ['archive_id'=>'required', 'energy'=>'required', 'exhausted'=>'required','breathing'=>'required', 'voice'=>'required',
        'emotion'=>'required','mental'=>'required','loneliness'=>'required','fear'=>'required','over_weight'=>'required','dry'=>'required', 'cold'=>'required', 'fear_cold'=>'required',
        'tolerance_cold'=>'required', 'have_cold'=>'required', 'stuffy_nose'=>'required', 'snore'=>'required', 'allergy'=>'required', 'urticaria'=>'required', 'ecchymosis'=>'required',
        'scratch'=>'required', 'skin_dry'=>'required', 'pain'=>'required', 'greasy'=>'required', 'face_speckle'=>'required', 'eczema'=>'required', 'throat_dry'=>'required',
        'mouse_smell'=>'required', 'fat_abdomen'=>'required', 'fear_cold_food'=>'required', 'shit_ache'=>'required', 'shit_dry'=>'required', 'tongue_thick'=>'required',
        'vein_thick'=>'required', 'qixu_score'=>'required', 'qixu_level'=>'required', 'qixu_healthcare'=>'required', 'yangxu_score'=>'required',
        'yangxu_level'=>'required', 'yangxu_healthcare'=>'required',  'yinxu_score'=>'required', 'yinxu_level'=>'required', 'yinxu_healthcare'=>'required',
         'tanshi_score'=>'required', 'tanshi_level'=>'required', 'tanshi_healthcare'=>'required','shire_score'=>'required',
        'shire_level'=>'required', 'shire_healthcare'=>'required',  'xieyu_score'=>'required', 'xieyu_level'=>'required', 'xieyu_healthcare'=>'required',
         'qiyu_score'=>'required', 'qiyu_level'=>'required', 'qiyu_healthcare'=>'required', 'tebing_score'=>'required',
        'tebing_level'=>'required', 'tebing_healthcare'=>'required', 'pinghe_score'=>'required', 'pinghe_level'=>'required',
        'pinghe_healthcare'=>'required',  'form_date'=>'required', 'doctor_name'=>'required'];

    public $chinesemedicineColumns =  ['archive_id', 'energy', 'exhausted','breathing', 'voice', 'emotion', 'mental', 'loneliness', 'fear', 'over_weight','dry',
        'cold','fear_cold','tolerance_cold','have_cold','stuffy_nose','snore','allergy','urticaria','ecchymosis','scratch','skin_dry','pain','greasy','face_speckle','eczema',
        'throat_dry','mouse_smell','fat_abdomen','fear_cold_food','shit_ache','shit_dry','tongue_thick','vein_thick','qixu_score','qixu_level','qixu_healthcare',
        'yangxu_score','yangxu_level','yangxu_healthcare','yinxu_score','yinxu_level','yinxu_healthcare','tanshi_score','tanshi_level','tanshi_healthcare','shire_score',
        'shire_level','shire_healthcare','xieyu_score','xieyu_level','xieyu_healthcare','qiyu_score','qiyu_level',
        'qiyu_healthcare','tebing_score','tebing_level','tebing_healthcare','pinghe_score','pinghe_level','pinghe_healthcare','form_date',
        'doctor_name'];

    public $newbornValidation = ['archive_id'=>'required', 'visited_at'=>'required', 'visit_mode'=>'required', 'next_visited_at'=>'required', 'father_name'=>'required ',
        'father_job'=>'required', 'father_phone_number'=>'required','father_birthday'=>'required','mother_name'=>'required','mother_job'=>'required',
        'mother_phone_number'=>'required', 'mother_birthday'=>'required','pregnancy_disease'=>'required', 'pregnancy_week'=>'required', 'midwifery_institution'=>'required',
        'midwifery_mode'=>'required', 'asphyxia_neonate'=>'required', 'deformity'=>'required', 'hearing_screening'=>'required', 'disease_screening'=>'required',  'birth_weight'=>'required', 'weight'=>'required', 'birth_height'=>'required', 'feeding_patterns'=>'required', 'feeding_amount'=>'required', 'feeding_frequency'=>'required', 'vomit'=>'required', 'shit'=>'required', 'shit_times'=>'required', 'temperature'=>'required'];
    public $newbornColumns =  ['archive_id', 'visited_at', 'visit_mode', 'next_visited_at', 'father_name','father_job', 'father_phone_number', 'father_birthday', 'mother_name',
        'mother_job', 'mother_phone_number', 'mother_birthday','pregnancy_disease', 'pregnancy_week','midwifery_institution','midwifery_mode','asphyxia_neonate','deformity','hearing_screening','disease_screening','birth_weight','weight','birth_height','feeding_patterns','feeding_amount','feeding_frequency','vomit','shit','shit_times','temperature'];

    //获取当前医生今日要的随访的记录
    public function index(Request $request)
    {
        $doctor = Doctor::findByUser(\Auth::user());
        $today = date('Y-m-d');
        return response()->json(Visit::where('doctor_id',$doctor->id)->where('next_visited_at',$today)->paginate(20));
    }


    //老年人生活自理能力评估接口
    public function selfcare_ability_store(Request $request)
    {
        //验证
        $inputs = $request->only($this->selfcareColumns);
        $rules = $this->selfcareValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }

        $doctor = Doctor::findByUser(\Auth::user());
        $model = new VisitSelfCareAbility();
        $model->fill($request->all());
        $model->doctor_id = $doctor->id;
        $model->tenant_id = $doctor->tenant_id;
        $model->save();

        return response()->json(['id' => $model->id, 'created_at' => $model->created_at,'code'=>201,'message'=>"success"], 201);
    }

    public function selfcare_ability_show($id)
    {
        $data = VisitSelfCareAbility::where('visit_id',$id)->first();
        if($data){
            return response()->json(['data'=>$data,'code'=>203,'message'=>"success"]);
        }
        return response()->json(['code'=>403,'message'=>"The VisitSelfCareAbility does not find by visit_id:".$id]);
    }

    public function selfcare_ability_update(Request $request, $id)
    {
        //验证
        $inputs = $request->only($this->selfcareColumns);
        $rules = $this->selfcareValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }
        $model =VisitSelfCareAbility::findOrFail($id);
//        $model =VisitSelfCareAbility::where('visit_id',$id)->first();
        $model->fill($request->all());
        $model->save();

        return response()->json(['updated_at' => $model->updated_at,'code'=>200,'message'=>"success"], 200);
    }

    //高血压随访
    public function hypertension_store(Request $request)
    {
        //验证
        $inputs = $request->only($this->hypertensionColumns);
        $rules = $this->hypertensionValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }

        $doctor = Doctor::findByUser(\Auth::user());
        $model = new VisitHypertension();
        $model->fill($request->all());
        $model->doctor_id = $doctor->id;
        $model->tenant_id = $doctor->tenant_id;
        $model->symptom = json_encode($request->symptom);
        $model->signs = json_encode($request->signs);
        $model->life_style = json_encode($request->life_style);
        $model->adverse_drug = json_encode($request->adverse_drug);
        $model->referral = json_encode($request->referral);
        $model->medication_situation = json_encode($request->medication_situation);
        $model->save();

        return response()->json(['id' => $model->id, 'created_at' => $model->created_at,'code'=>201,'message'=>"success"], 201);
    }

    public function hypertension_show($id)
    {
        $data = VisitHypertension::where('visit_id',$id)->first();
        if($data){
            return response()->json(['data'=>$data,'code'=>203,'message'=>"success"]);
        }
        return response()->json(['code'=>403,'message'=>"not find"]);
    }

    public function hypertension_update(Request $request, $id)
    {
        //验证
        $inputs = $request->only($this->hypertensionColumns);
        $rules = $this->hypertensionValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }

        $model =VisitHypertension::findOrFail($id);
        $model->fill($request->all());
        $model->symptom = json_encode($request->symptoms);
        $model->signs = json_encode($request->signs);
        $model->life_style = json_encode($request->life_style);
        $model->adverse_drug = json_encode($request->adverse_drugs);
        $model->referral = json_encode($request->referral);
        $model->medication_situation = json_encode($request->medication_situation);
        $model->save();

        return response()->json(['updated_at' => $model->updated_at,'code'=>200,'message'=>"success"], 200);
    }

    //二型糖尿病随访
    public function diabete_store(Request $request)
    {
        //验证
        $inputs = $request->only($this->diabeteColumns);
        $rules = $this->diabeteValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }

        $doctor = Doctor::findByUser(\Auth::user());
        $model = new VisitDiabete();
        $model->fill($request->all());
        $model->doctor_id = $doctor->id;
        $model->tenant_id = $doctor->tenant_id;

        $model->symptom = json_encode($request->symptom);
        $model->signs = json_encode($request->signs);
        $model->life_style = json_encode($request->life_style);
        $model->auxiliary_check = json_encode($request->auxiliary_check);
        $model->adverse_drug = json_encode($request->adverse_drug);
        $model->referral = json_encode($request->referral);
        $model->medication_situation = json_encode($request->medication_situation);
        $model->save();

        return response()->json(['id' => $model->id, 'created_at' => $model->created_at,'code'=>201,'message'=>"success"], 201);
    }

    public function diabete_show($id)
    {
        $data = VisitDiabete::where('visit_id',$id)->first();
        if($data){
            return response()->json(['data'=>$data,'code'=>203,'message'=>"success"]);
        }
        return response()->json(['code'=>403,'message'=>"not find"]);
    }

    public function diabete_update(Request $request, $id)
    {
        //验证
        $inputs = $request->only($this->diabeteColumns);
        $rules = $this->diabeteValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }
        $model =VisitDiabete::findOrFail($id);
        $model->fill($request->all());

        $model->symptom = json_encode($request->symptom);
        $model->signs = json_encode($request->signs);
        $model->life_style = json_encode($request->life_style);
        $model->auxiliary_check = json_encode($request->auxiliary_check);
        $model->adverse_drug = json_encode($request->adverse_drug);
        $model->referral = json_encode($request->referral);
        $model->medication_situation = json_encode($request->medication_situation);
        $model->save();

        return response()->json(['updated_at' => $model->updated_at,'code'=>200,'message'=>"success"], 200);
    }

    //重性精神疾病患者随访
    public function mental_patient_store(Request $request)
    {
        //验证
        $inputs = $request->only($this->mentalpatientColumns);
        $rules = $this->mentalpatientValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }

        $doctor = Doctor::findByUser(\Auth::user());

        $dangerous = [];
        if($request['minor_trouble'] != '') {
            $dangerous[1] = $request['minor_trouble'][0];
        }
        if($request['trouble'] != '') {
            $dangerous[2] = $request['trouble'][0];
        }
        if($request['crime'] != '') {
            $dangerous[3] = $request['crime'][0];
        }
        if($request['other_harmful'] != '') {
            $dangerous[4] = $request['other_harmful'][0];
        }
        if($request['self_injury'] != '') {
            $dangerous[5] = $request['self_injury'][0];
        }
        if($request['attempted_suicide'] != '') {
            $dangerous[6] = $request['attempted_suicide'][0];
        }
        if($request['tige'] != '') {
            $dangerous[7] = $request['tige'][0];
        }

        $model = new VisitMentalPatient();
        $model->fill($request->all());
        $model->doctor_id = $doctor->id;
        $model->tenant_id = $doctor->tenant_id;

        $model->death = json_encode($request->death);
        $model->symptom = json_encode($request->symptom);
        $model->social_function = json_encode($request->social_function);
        $model->dangerous_act = json_encode($dangerous);
        $model->two_hospitalization = json_encode($request->two_hospitalization);
        $model->laboratory_examination = json_encode($request->laboratory_examination);
        $model->adverse_drug = json_encode($request->adverse_drug);
        $model->referral = json_encode($request->referral);
        $model->rehabilitation_measures = json_encode($request->rehabilitation_measures);
        $model->medication_situation = json_encode($request->medication_situation);
        $model->medication_instruction = json_encode($request->medication_instruction);
        $model->save();

        return response()->json(['id' => $model->id, 'created_at' => $model->created_at,'code'=>201,'message'=>"success"], 201);
    }

    public function mental_patient_show($id)
    {
        $data = VisitMentalPatient::where('visit_id',$id)->first();
        if($data){
            return response()->json(['data'=>$data,'code'=>203,'message'=>"success"]);
        }
        return response()->json(['code'=>403,'message'=>"not find"]);
    }

    public function mental_patient_update(Request $request, $id)
    {
        //验证
        $inputs = $request->only($this->mentalpatientColumns);
        $rules = $this->mentalpatientValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }

        $dangerous = [];
        if($request['minor_trouble'] != '') {
            $dangerous[1] = $request['minor_trouble'][0];
        }
        if($request['trouble'] != '') {
            $dangerous[2] = $request['trouble'][0];
        }
        if($request['crime'] != '') {
            $dangerous[3] = $request['crime'][0];
        }
        if($request['other_harmful'] != '') {
            $dangerous[4] = $request['other_harmful'][0];
        }
        if($request['self_injury'] != '') {
            $dangerous[5] = $request['self_injury'][0];
        }
        if($request['attempted_suicide'] != '') {
            $dangerous[6] = $request['attempted_suicide'][0];
        }
        if($request['tige'] != '') {
            $dangerous[7] = $request['tige'][0];
        }

        $model =VisitMentalPatient::findOrFail($id);
        $model->fill($request->all());
        $model->death = json_encode($request->death);
        $model->symptom = json_encode($request->symptom);
        $model->social_function = json_encode($request->social_function);
        $model->dangerous_act = json_encode($dangerous);
        $model->two_hospitalization = json_encode($request->two_hospitalization);
        $model->laboratory_examination = json_encode($request->laboratory_examination);
        $model->adverse_drug = json_encode($request->adverse_drug);
        $model->referral = json_encode($request->referral);
        $model->rehabilitation_measures = json_encode($request->rehabilitation_measures);
        $model->medication_situation = json_encode($request->medication_situation);
        $model->medication_instruction = json_encode($request->medication_instruction);
        $model->save();

        return response()->json(['updated_at' => $model->updated_at,'code'=>200,'message'=>"success"], 200);
    }


    //肺结核患者第一次入户随访
    public function tuberculosis_first_record_store(Request $request)
    {
        //验证
        $inputs = $request->only($this->tuberculosisfirstColumns);
        $rules = $this->tuberculosisfirstValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }

        $doctor = Doctor::findByUser(\Auth::user());
        $model = new VisitTuberculosisFirstRecord();
        $model->fill($request->all());
        $model->doctor_id = $doctor->id;
        $model->tenant_id = $doctor->tenant_id;

        $model->symptom = json_encode($request->symptom);
        $model->medication = json_encode($request->medication);
        $model->supervise_staff = json_encode($request->supervise_staff);
        $model->living_environment = json_encode($request->living_environment);
        $model->life_style = json_encode($request->life_style);
        $model->education_training = json_encode($request->education_training);

        $model->save();

        return response()->json(['id' => $model->id, 'created_at' => $model->created_at,'code'=>201,'message'=>"success"], 201);
    }

    public function tuberculosis_first_record_show($id)
    {
        $data = VisitTuberculosisFirstRecord::where('visit_id',$id)->first();
        if($data){
            return response()->json(['data'=>$data,'code'=>203,'message'=>"success"]);
        }
        return response()->json(['code'=>403,'message'=>"not find"]);
    }

    public function tuberculosis_first_record_update(Request $request, $id)
    {
        //验证
        $inputs = $request->only($this->tuberculosisfirstColumns);
        $rules = $this->tuberculosisfirstValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }
        $model =VisitTuberculosisFirstRecord::findOrFail($id);
        $model->fill($request->all());

        $model->symptom = json_encode($request->symptom);
        $model->medication = json_encode($request->medication);
        $model->supervise_staff = json_encode($request->supervise_staff);
        $model->living_environment = json_encode($request->living_environment);
        $model->life_style = json_encode($request->life_style);
        $model->education_training = json_encode($request->education_training);
        $model->save();

        return response()->json(['updated_at' => $model->updated_at,'code'=>200,'message'=>"success"], 200);
    }

    //用户多次肺结核随访
    public function tuberculosis_patient_store(Request $request)
    {
        //验证
        $inputs = $request->only($this->tuberculosisColumns);
        $rules = $this->tuberculosisValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }
        $doctor = Doctor::findByUser(\Auth::user());
        $model = new VisitTuberculosisPatient();
        $model->fill($request->all());
        $model->doctor_id = $doctor->id;
        $model->tenant_id = $doctor->tenant_id;

        $model->symptom = json_encode($model->symptom);
        $model->lift_style = json_encode($request->lift_style);
        $model->medication = json_encode($request->medication);
        $model->drug_response = json_encode($request->drug_response);
        $model->complication = json_encode($request->complication);
        $model->referral = json_encode($request->referral);
        $model->stop_treatment = json_encode($request->stop_treatment);
        $model->full_management = json_encode($request->full_management);
        $model->save();

        return response()->json(['id' => $model->id, 'created_at' => $model->created_at,'code'=>201,'message'=>"success"], 201);
    }

    public function tuberculosis_patient_show($id)
    {
        $data = VisitTuberculosisPatient::where('visit_id',$id)->first();
        if($data){
            return response()->json(['data'=>$data,'code'=>203,'message'=>"success"]);
        }
        return response()->json(['code'=>403,'message'=>"not find"]);
    }

    public function tuberculosis_patient_update(Request $request, $id)
    {
        //验证
        $inputs = $request->only($this->tuberculosisColumns);
        $rules = $this->tuberculosisValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }
        $model =VisitTuberculosisPatient::findOrFail($id);
//        $model = VisitTuberculosisPatient::where(['visit_id'=>$id])->first();
        $model->fill($request->all());
        $model->symptom = json_encode($model->symptom);
        $model->lift_style = json_encode($request->lift_style);
        $model->medication = json_encode($request->medication);
        $model->drug_response = json_encode($request->drug_response);
        $model->complication = json_encode($request->complication);
        $model->referral = json_encode($request->referral);
        $model->stop_treatment = json_encode($request->stop_treatment);
        $model->full_management = json_encode($request->full_management);
        $model->save();

        return response()->json(['updated_at' => $model->updated_at,'code'=>200,'message'=>"success"], 200);
    }

    //用户中医体质随访
    public function chinese_medicine_store(Request $request)
    {
        //验证
        $inputs = $request->only($this->chinesemedicineColumns);
        $rules = $this->chinesemedicineValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }
        $doctor = Doctor::findByUser(\Auth::user());
        $model = new VisitChineseMedicine();
        $model->fill($request->except(['yangxu_healthcare','qixu_healthcare','yinxu_healthcare','tanshi_healthcare','shire_healthcare','xieyu_healthcare','qiyu_healthcare','tebing_healthcare','pinghe_healthcare']));
        $model->fillModel($request);
        $model->doctor_id = $doctor->id;
        $model->tenant_id = $doctor->tenant_id;
        $model->save();

        return response()->json(['id' => $model->id, 'created_at' => $model->created_at,'code'=>201,'message'=>"success"], 201);
    }

    public function chinese_medicine_show($id)
    {
        $data = VisitChineseMedicine::where('visit_id',$id)->first();
        if($data){
            return response()->json(['data'=>$data,'code'=>203,'message'=>"success"]);
        }
        return response()->json(['code'=>403,'message'=>"not find"]);
    }

    public function chinese_medicine_update(Request $request, $id)
    {
        //验证
        $inputs = $request->only($this->chinesemedicineColumns);
        $rules = $this->chinesemedicineValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }
        $model =VisitChineseMedicine::findOrFail($id);
//        $model = VisitChineseMedicine::where(['visit_id'=>$id])->first();
        $model->fill($request->except(['yangxu_healthcare','qixu_healthcare','yinxu_healthcare','tanshi_healthcare','shire_healthcare','xieyu_healthcare','qiyu_healthcare','tebing_healthcare','pinghe_healthcare']));
        $model->fillModel($request);
        $model->save();

        return response()->json(['updated_at' => $model->updated_at,'code'=>200,'message'=>"success"], 200);
    }

    //新生儿家庭访视记录
    public function newborn_store(Request $request)
    {
        //验证
        $inputs = $request->only($this->newbornColumns);
        $rules = $this->newbornValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }
        $doctor = Doctor::findByUser(\Auth::user());
        $model = new VisitNewborn();
        $model->fill($request->except(['guide','pregancy_disease','midwifery_mode','jaundice_parts','umbilical_cord','disease_screening']));
        $model->fillModel($request);
        $model->doctor_id = $doctor->id;
        $model->tenant_id = $doctor->tenant_id;
        $model->save();

        return response()->json(['id' => $model->id, 'created_at' => $model->created_at,'code'=>201,'message'=>"success"], 201);
    }

    public function newborn_show($id)
    {
        $data = VisitNewborn::where('visit_id',$id)->first();
        if($data){
            return response()->json(['data'=>$data,'code'=>203,'message'=>"success"]);
        }
        return response()->json(['code'=>403,'message'=>"not find"]);
    }

    public function newborn_update(Request $request, $id)
    {
        //验证
        $inputs = $request->only($this->newbornColumns);
        $rules = $this->newbornValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }
        $model =VisitNewborn::findOrFail($id);
//        $model =VisitNewborn::where('visit_id',$id)->first();
        $model->fill($request->except(['guide','pregancy_disease','midwifery_mode','jaundice_parts','umbilical_cord','disease_screening']));
        $model->fillModel($request);
        $model->save();

        return response()->json(['updated_at' => $model->updated_at,'code'=>200,'message'=>"success"], 200);
    }


//    public function destroy($id)
//    {
//        $model = Visit::findOrFail($id);
//        $model->delete();
//        return response()->json();
//    }
}
