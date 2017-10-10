<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Archive;
use App\Models\VisitKid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class VisitKidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tenant.visit_kid.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $archive_id = $request->get('archive_id');
        $archive = Archive::findOrFail($archive_id);
        $doctor_name = $archive->doctor->user->real_name;
        $real_name = $archive->real_name;

        return view('tenant.visit_kid.create',compact('archive_id','doctor_name','real_name'));
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
        $model = new VisitKid();
        $model->fill($request->except(['weight','height','bregma','disease_between_visit','referral_recommendation','guide']));
        $model->fillModel($request->toArray());
        $model->doctor_id = Auth::user()->doctor->first()->id;
        $model->save();

        if ($request->ajax()) {
            return response()->json(['code'=>200]);
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
        //
        $record = VisitKid::where('visit_id',$id)->first();
        $data = $record->toArray();
        $data['doctor_name'] = $doctor_name =  $record->doctorName;
        $archive_id = $data['archive_id'];
        $real_name = Archive::findOrFail($archive_id)->real_name;
        return view('tenant.visit_kid.show',compact('data','archive_id','doctor_name','real_name'));
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
        $record = VisitKid::where('visit_id',$id)->first();
        $data = $record->toArray();
        $data['doctor_name'] = $doctor_name =$record->doctorName;
        $archive_id = $data['archive_id'];
        $real_name = Archive::findOrFail($archive_id)->real_name;
        return view('tenant.visit_kid.edit',compact('data','archive_id','doctor_name','real_name'));
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
        $model =VisitKid::where(['visit_id'=>$id])->first();
        $model->fill($request->except(['weight','height','bregma','disease_between_visit','referral_recommendation','guide']));
        $model->fillModel($request->toArray());
        $model->save();
        if ($request->ajax()) {
            return response()->json(['code'=>200]);
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
