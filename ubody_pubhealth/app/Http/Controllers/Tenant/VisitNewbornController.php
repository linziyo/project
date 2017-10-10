<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Archive;
use App\Models\VisitNewborn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class VisitNewbornController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tenant.visit_newborn.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $archive_id = $request->get('archive_id');
        $archive = Archive::findOrfail($archive_id);
        return view('tenant.visit_newborn.create',compact('archive_id','archive'));
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
        $model = new VisitNewborn();
        $model->fill($request->except(['guide','pregancy_disease','midwifery_mode','jaundice_parts','umbilical_cord','disease_screening']));
        $model->fillModel($request);
        $model->doctor_id = Auth::user()->doctor()->first()->id;
        $model->save();

        if ($request->ajax()) {
            return response()->json();
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
        $data = VisitNewborn::where('visit_id',$id)->first()->toArray();
        $archive_id = $data['archive_id'];
        $archive = Archive::findOrfail($archive_id);
        return view('tenant.visit_newborn.show',compact('data','archive_id','archive'));
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
        $data = VisitNewborn::where('visit_id',$id)->first()->toArray();
        $archive_id = $data['archive_id'];
        $archive = Archive::findOrfail($archive_id);
        return view('tenant.visit_newborn.edit',compact('data','archive_id','archive'));
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
        $model =VisitNewborn::where('visit_id',$id)->first();
        $model->fill($request->except(['guide','pregancy_disease','midwifery_mode','jaundice_parts','umbilical_cord','disease_screening']));
        $model->fillModel($request);
        $model->save();

        if ($request->ajax()) {
            return response()->json();
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
