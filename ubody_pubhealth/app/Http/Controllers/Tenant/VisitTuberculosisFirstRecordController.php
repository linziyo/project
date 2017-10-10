<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VisitTuberculosisFirstRecord;

class VisitTuberculosisFirstRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('tenant.visit_tuberculosis_first_record.create')->withInput($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('tenant.visit_tuberculosis_first_record.create')->withInput($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $model = new VisitTuberculosisFirstRecord();
        $model->fill($request->all());
        $model->doctor_id =  \Auth::user()->doctor()->first()->id;
        $model->symptom = json_encode($request->symptom);
        $model->medication = json_encode($request->medication);
        $model->supervise_staff = json_encode($request->supervise_staff);
        $model->living_environment = json_encode($request->living_environment);
        $model->life_style = json_encode($request->life_style);
        $model->education_training = json_encode($request->education_training);

        $model->save();

        if ($request->ajax()) {
            return response()->json(['errorCode'=> 0,'message'=>'success' ]);
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
        $model = VisitTuberculosisFirstRecord::where('visit_id',$res->id)->first();

        $symptom_list = json_decode($model->symptom ,true);
        if($symptom_list){
            $symptom_list = array_column($symptom_list,'content','value');
        }
        $model->medications = json_decode($model->medication);
        $model->supervise_staffs = json_decode($model->supervise_staff);
        $model->living_environments = json_decode($model->living_environment);
        $model->life_styles = json_decode($model->life_style);
        $model->education_training = json_decode($model->education_training);

        return view('tenant.visit_tuberculosis_first_record.show')->withModel($model)->withSymptomlist($symptom_list);
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
        $model = VisitTuberculosisFirstRecord::where('visit_id',$res->id)->first();

        $symptom_list = json_decode($model->symptom ,true);
        if($symptom_list){
            $symptom_list = array_column($symptom_list,'content','value');
        }
        $model->medications = json_decode($model->medication);
        $model->supervise_staffs = json_decode($model->supervise_staff);
        $model->living_environments = json_decode($model->living_environment);
        $model->life_styles = json_decode($model->life_style);
        $model->education_training = json_decode($model->education_training);

        return view('tenant.visit_tuberculosis_first_record.edit')->withModel($model)->withSymptomlist($symptom_list);
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
//                dd($request->all());
        $model =VisitTuberculosisFirstRecord::findOrFail($id);
        $model->fill($request->all());
        $model->symptom = json_encode($request->symptom);
        $model->medication = json_encode($request->medication);
        $model->supervise_staff = json_encode($request->supervise_staff);
        $model->living_environment = json_encode($request->living_environment);
        $model->life_style = json_encode($request->life_style);
        $model->education_training = json_encode($request->education_training);

        $model->save();

        if ($request->ajax()) {
            return response()->json(['errorCode'=> 0,'message'=>'success' ]);
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