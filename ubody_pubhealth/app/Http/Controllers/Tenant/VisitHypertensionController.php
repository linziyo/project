<?php

namespace App\Http\Controllers\Tenant;

use App\Models\VisitHypertension;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class VisitHypertensionController extends Controller
{

    public $createValidation = ['visited_at'=>'required', 'visit_mode'=>'required', 'symptom'=>'required', 'signs'=>'required','life_style'=>'required' , 'auxiliary_check'=>'required', 'medication_compliance'=>'required', 'adverse_drug' => 'required', 'visit_classification'=>'required',  'medication_situation'=>'required', 'referral'=>'required', 'next_visited_at'=>'required', 'visit_doctor_signature'=>'required'];

    public $createColumns = ['visited_at', 'visit_mode', 'symptom', 'signs','life_style', 'auxiliary_check', 'medication_compliance','adverse_drug','visit_classification','medication_situation','referral','next_visited_at','visit_doctor_signature'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        \Form::setValidation($this->createValidation);
        return view('tenant.visit_hypertension.create')->withInput($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('tenant.visit_hypertension.create')->withInput($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $inputs = Input::only($this->createColumns);
//        $rules = $this->createValidation;
//        $validator = \Validator::make($inputs, $rules);
//        if ($validator->fails()) {
//            return Redirect::back()->withErrors($validator);
//        }

        $model = new VisitHypertension();
        $model->fill($request->all());
        $model->doctor_id =  \Auth::user()->doctor()->first()->id;

        $model->symptom = json_encode($request->symptom);
        $model->signs = json_encode($request->signs);
        $model->life_style = json_encode($request->life_style);
        $model->adverse_drug = json_encode($request->adverse_drug);
        $model->referral = json_encode($request->referral);
        $model->medication_situation = json_encode($request->medication_situation);

        $model->save();

        if ($request->ajax()) {
            return response()->json(['errorCode'=> 0 ]);
        } else {
            return redirect()->action('Tenant\ArchiveController@show',$request->get('archive_id'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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

        return view('tenant.visit_hypertension.show')->withModel($model)->withSymptomlist($symptom_list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
        $res = Visit::findOrFail($id);
        $model = VisitHypertension::where('visit_id',$res->id)->first();

        $symptom_list = json_decode($model['original']['symptom'] ,true);
        if($symptom_list){
            $symptom_list = array_column($symptom_list,'content','value');
        }

        $model->signslist = json_decode($model->signs);
        $model->life_styles = json_decode($model->life_style);
        $model->adverse_drugs = json_decode($model->adverse_drug);
        $model->referrals = json_decode($model->referral);
        $model->medication_situations = json_decode($model->medication_situation);

        return view('tenant.visit_hypertension.edit')->withModel($model)->withSymptomlist($symptom_list);
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
        $model =VisitHypertension::findOrFail($id);
        $model->fill($request->all());

        $model->symptom = json_encode($request->symptom);
        $model->signs = json_encode($request->signs);
        $model->life_style = json_encode($request->life_style);
        $model->adverse_drug = json_encode($request->adverse_drug);
        $model->referral = json_encode($request->referral);
        $model->medication_situation = json_encode($request->medication_situation);

        $model->save();

        if ($request->ajax()) {
            return response()->json(['errorCode'=> 0 ]);
        } else {
            return redirect()->action('Tenant\ArchiveController@show',$request->get('archive_id'));
        }
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
