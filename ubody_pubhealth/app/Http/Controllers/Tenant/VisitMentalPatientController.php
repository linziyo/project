<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Archive;
use App\Models\Visit;
use App\Models\VisitMentalPatient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisitMentalPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('tenant.visit_mental_patient.create')->withInput($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('tenant.visit_mental_patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd(json_encode($request->all()));
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
        $model->doctor_id = \Auth::user()->doctor()->first()->id;
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

        if ($request->ajax()) {
            return response()->json(['errorCode'=> 0 , 'message' => 'success']);
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
        $model = VisitMentalPatient::where('visit_id',$res->id)->first();

        $symptom_list = json_decode($model->symptom ,true);
        if($symptom_list){
            $symptom_list = array_column($symptom_list,'content','value');
        }
        $rehabilitation_list = json_decode($model->rehabilitation_measures ,true);
        if($rehabilitation_list){
            $rehabilitation_list = array_column($rehabilitation_list,'content','value');
        }

        $model->deaths = json_decode($model->death);
        $model->social_functions = json_decode($model->social_function);
        $model->dangerous_action = json_decode($model->dangerous_act,true);
        $model->two_hospitalizations = json_decode($model->two_hospitalization);
        $model->laboratory_examinations = json_decode($model->laboratory_examination);
        $model->adverse_drugs = json_decode($model->adverse_drug);
        $model->referrals = json_decode($model->referral);
        $model->rehabilitation_measures = json_decode($model->rehabilitation_measures);
        $model->medication_situations = json_decode($model->medication_situation);
        $model->medication_instructions = json_decode($model->medication_instruction);

        return view('tenant.visit_mental_patient.show')->withModel($model)->withSymptomlist($symptom_list)->withRehabilitationlist($rehabilitation_list);
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
        $model = VisitMentalPatient::where('visit_id',$res->id)->first();

        $symptom_list = json_decode($model->symptom ,true);
        if($symptom_list){
            $symptom_list = array_column($symptom_list,'content','value');
        }
        $rehabilitation_list = json_decode($model->rehabilitation_measures ,true);
        if($rehabilitation_list){
            $rehabilitation_list = array_column($rehabilitation_list,'content','value');
        }

        $model->deaths = json_decode($model->death);
        $model->social_functions = json_decode($model->social_function);
        $model->dangerous_action = json_decode($model->dangerous_act,true);
        $model->two_hospitalizations = json_decode($model->two_hospitalization);
        $model->laboratory_examinations = json_decode($model->laboratory_examination);
        $model->adverse_drugs = json_decode($model->adverse_drug);
        $model->referrals = json_decode($model->referral);
        $model->rehabilitation_measures = json_decode($model->rehabilitation_measures);
        $model->medication_situations = json_decode($model->medication_situation);
        $model->medication_instructions = json_decode($model->medication_instruction);

        return view('tenant.visit_mental_patient.edit')->withModel($model)->withSymptomlist($symptom_list)->withRehabilitationlist($rehabilitation_list);
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

        if ($request->ajax()) {
            return response()->json(['errorCode'=> 0 , 'message' => 'success']);
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
        $model = VisitMentalPatient::findOrFail($id);
        $model->delete();
        return response()->json();
    }
}
