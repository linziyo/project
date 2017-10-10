<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VisitTuberculosisPatient;
use Auth;

class VisitTuberculosisPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('tenant.visit_tuberculosis_patient.index')->withInput($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('tenant.visit_tuberculosis_patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new VisitTuberculosisPatient();
        $model->fill($request->all());
        $model->symptom = json_encode($model->symptom);
        $model->lift_style = json_encode($request->lift_style);
        $model->medication = json_encode($request->medication);
        $model->drug_response = json_encode($request->drug_response);
        $model->complication = json_encode($request->complication);
        $model->referral = json_encode($request->referral);
        $model->stop_treatment = json_encode($request->stop_treatment);
        $model->full_management = json_encode($request->full_management);
        $model->doctor_id = \Auth::user()->doctor()->first()->id;
        $model->archive_id = $archive_id = $request->get('archive_id');
        $model->save();

        if($request->ajax()){
            return response()->json(['errorCode'=>0,'message'=>'success']);
        }else{
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
        return view('tenant.visit_tuberculosis_patient.show')->withData($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        return view('tenant.visit_tuberculosis_patient.edit')->withData($data);
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
        $model = VisitTuberculosisPatient::where(['visit_id'=>$id])->first();
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

        if($request->ajax()){
            return response()->json(['errorCode' => 0, 'message' => 'success']);
        }else{
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
        $model = VisitTuberculosisPatient::findOrFail($id);
        $model->delete();
        return response()->json();
    }
}
