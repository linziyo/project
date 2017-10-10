<?php

namespace App\Http\Controllers\Admin;

use App\Models\VisitHypertension;
use App\Models\VisitSelfCareAbility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VisitNewborn;
use App\Models\Tenant;
use App\Models\Community;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http;
use Form;
use Auth;use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Visit;
use App\Models\VisitChineseMedicine;
use App\Models\VisitTuberculosisPatient;
use App\models\VisitKid;
class VisitNewbornController extends Controller
{
    public $createValidation = ['father_name' => 'required|max:200','father_job' => 'required|max:200','father_phone_number' => 'required|max:200','father_birthday' => 'required|max:200',
        'mother_name' => 'required|max:200','mother_job' => 'required|max:200','mother_phone_number' => 'required|max:200','mother_birthday' => 'required|max:200','midwifery_institution' => 'required|max:200',
        'birth_weight'=>'required|max:200','weight'=>'required|max:200','birth_height'=>'required|max:200','feeding_amount'=>'required|max:200','feeding_frequency'=>'required|max:200',
        'temperature'=>'required|max:200','heart_rate'=>'required|max:200','bregma'=>'required|max:200',

    ];
    public $createColumns = ['father_name','father_job','father_phone_number','father_birthday','mother_name','mother_job','mother_phone_number','mother_birthday','midwifery_institution',
        'birth_weight','weight','birth_height','feeding_amount','feeding_frequency','temperature','heart_rate','bregma'

    ];
    public $updateValidation = ['father_name' => 'required|max:200','father_job' => 'required|max:200','mother_name' => 'required|max:200',
        'midwifery_institution' => 'required|max:200','birth_weight' => 'required|max:200','birth_height' => 'required|max:200'
    ];
    public $updateColumns = ['father_name','father_job','father_phone_number','mother_name','midwifery_institution','birth_weight',
    'birth_height'
    ];
    public function index(Request $request)
    {
        $q = $request->get('q');
        if (empty($q)) {
            return view('admin.visitnewborn.index')->withModel(Visit::paginate(20))
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
//            return view('admin.visitnewborn.index')->withList(visitnewborn::where('tenant_id',$request->get('tenant_id'))->paginate(20))
//                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        } else {
            return view('admin.visitnewborn.index')->withList(Visit::where('name', 'like', "%$q%")->paginate(20))
                ->withInput($request->all());
        }
    }
    public function show($id)
    {
        return view('admin.visitnewborn.show')->withList(Admin::findOrFail($id));
    }

    public function create(Request $request)
    {
        Form::setValidation($this->createValidation);
        $list = ['' => '请选择机构'] + Community::pluck('name', 'id')->all();
        return view('admin.visitnewborn.create')->withTenant(Tenant::findOrFail($request->get('tenant_id')))->withList($list);
    }

    public function store(Request $request)
    {
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $model = new VisitNewborn();
        $model->fill($request->all());
        $model->doctor_id = Auth::guard('admin')->id();
        $model->archive_id = Auth::guard('admin')->id();
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\VisitNewbornController@index",'tenant_id='.$request->get('tenant_id'));
        }
    }

    public function visit_selfcare_ability($id)
    {
        $res = Visit::findOrFail($id);

    }


    public function edit($id)
    {
        $res = Visit::findOrFail($id);
        $visit_type = Visit::$visit_type[$res->visit_type];
        if($visit_type == 'visit_selfcare_ability'){
            $data = VisitSelfCareAbility::where('visit_id',$id)->first()->toArray();
            $archive_id = $data['archive_id'];
            return view('admin.visit.visit_selfcare_ability',compact('data','archive_id'))->withTenant(Tenant::findOrFail($data['tenant_id']));
        }
        if($visit_type == 'visit_hypertension'){
            $res = Visit::findOrFail($id);
            $model = VisitHypertension::where('visit_id',$res->id)->first();

            $symptom_list = json_decode($model->symptom ,true);
            if($symptom_list){
                $symptom_list = array_column($symptom_list,'content','value');
            }

            $model->signslist = json_decode($model->signs);
            $model->life_styles = json_decode($model->life_style);
            $model->adverse_drugs = json_decode($model->adverse_drug);
            $model->referrals = json_decode($model->referral);
            $model->medication_situations = json_decode($model->medication_situation);

            return view('admin.visit.visit_hypertension')->withModel($model)->withSymptomlist($symptom_list);
        }
        if($visit_type == 'visit_tuberculosis_patient'){
            $data = VisitTuberculosisPatient::where('visit_id',$id)->first()->toArray();
            if(isset($data['symptom']) && !empty($data['symptom'])){
                $symptom_list = json_decode($data['symptom'],true);
                $data['symptom'] = array_column($symptom_list,'content','value');
            }
            if(isset($data['lift_style']) && !empty($data['lift_style'])){
                $data['lift_style'] = json_decode($data['lift_style'],true);
            }
            if(isset($data['medication']) && !empty($data['medication'])){
                $data['medication'] = json_decode($data['medication'],true);
            }
            if(isset($data['drug_response']) && !empty($data['drug_response'])){
                $data['drug_response'] = json_decode($data['drug_response'],true);
            }
            if(isset($data['complication']) && !empty($data['complication'])){
                $data['complication'] = json_decode($data['complication'],true);
            }
            if(isset($data['referral']) && !empty($data['referral'])){
                $data['referral'] = json_decode($data['referral'],true);
            }
            if(isset($data['stop_treatment']) && !empty($data['stop_treatment'])){
                $data['stop_treatment'] = json_decode($data['stop_treatment'],true);
            }
            if(isset($data['full_management']) && !empty($data['full_management'])){
                $data['full_management'] = json_decode($data['full_management'],true);
            }
            return view('admin.visit.visit_tuberculosis_patient')->withData($data);

        }

        if($visit_type == 'visit_kid'){
            $record = VisitKid::where('visit_id',$id)->first();
            $data = $record->toArray();
            $data['doctor_name'] = $doctor_name =  $record->doctorName;
            $archive_id = $data['archive_id'];
            return view('admin.visit.visit_kid',compact('data','archive_id','doctor_name'));
        }
        if($visit_type == 'visit_chinese_medicine'){
            $data = VisitChineseMedicine::where('visit_id',$id)->first()->toArray();
            $archive_id = $data['archive_id'];
            ;
            return view('admin.visit.visit_chinese_medicine',compact('data','archive_id'));

        }
        if($visit_type == 'visit_chinese_medicine'){
//            echo 1;die;
            $data = VisitChineseMedicine::where('visit_id',$id)->first()->toArray();
            $archive_id = $data['archive_id'];
;
            return view('admin.visit.visit_chinese_medicine',compact('data','archive_id'));

        }

        if($visit_type == 'visit_diabetes'){
            $model = VisitDiabete::where('visit_id',$res->id)->first();
            $model->symptoms = explode(",",$model['original']['symptom']);
            $model->medication_situations = json_decode($model['original']['medication_situation']);
            return view('tenant.visit_diabetes.edit')->withModel($model);
        }
        if($visit_type == 'visit_mental_patient'){
            $model = VisitMentalPatient::where('visit_id',$res->id)->first();
            $model->symptoms = explode(",",$model['original']['symptom']);
            $model->rehabilitations = explode(",",$model['original']['rehabilitation_measures']);
            $model->medication_situations = json_decode($model['original']['medication_situation']);
            $model->medication_instructions = json_decode($model['original']['medication_instruction']);
            $model->dangerous_action = json_decode($model['original']['dangerous_act'],true);

            return view('tenant.visit_mental_patient.edit')->withModel($model);
        }
    }

    public function update(Request $request, $id)
    {

        $inputs = Input::only($this->updateColumns);

        $rules = $this->updateValidation;

        $validator = Validator::make($inputs, $rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        $model = VisitNewborn::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\VisitNewbornController@index",'tenant_id='.$request->get('tenant_id'));
        }
    }

    public function destroy($id)
    {
        $model = VisitNewborn::findOrFail($id);
        $model->delete();
        return response()->json(['success' => true]);
    }
}
