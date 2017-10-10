<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Visit;
use App\Models\VisitChineseMedicine;
use App\Models\VisitDiabete;
use App\Models\VisitHypertension;
use App\Models\VisitMentalPatient;
use App\Models\VisitSelfCareAbility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $res = Visit::findOrFail($id);
        $visit_type = Visit::$visit_type[$res->visit_type];

        if($visit_type == 'visit_selfcare_ability'){
            return view('tenant.visit_selfcare_ability.edit')->withModel(VisitSelfCareAbility::where('visit_id',$res->id)->first());
        }

        if($visit_type == 'visit_hypertension'){
            $model = VisitHypertension::where('visit_id',$res->id)->first();
            $model->symptoms = explode(",",$model['original']['symptom']);
            $model->medication_situations = json_decode($model['original']['medication_situation']);
            return view('tenant.visit_hypertension.edit')->withModel($model);
        }

        if($visit_type == 'visit_chinese_medicine'){
            return view('tenant.visit_chinese_medicine.edit')->withModel(VisitChineseMedicine::where('visit_id',$res->id)->first());
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
