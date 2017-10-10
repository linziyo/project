<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Archive;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VisitChineseMedicine;
use Auth;
use App\Http\Requests\ChineseMedicineRequest;

class VisitChineseMedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('tenant.visit_chinese_medicine.index')->withInput($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $archive_id = $request->get('archive_id');
        return view('tenant.visit_chinese_medicine.create',compact('archive_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChineseMedicineRequest $request)
    {
        //
        $model = new VisitChineseMedicine();
        $model->fill($request->except(['yangxu_healthcare','qixu_healthcare','yinxu_healthcare','tanshi_healthcare','shire_healthcare','xieyu_healthcare','qiyu_healthcare','tebing_healthcare','pinghe_healthcare']));
        $model->fillModel($request);
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
        $data = VisitChineseMedicine::where('visit_id',$id)->first()->toArray();
        $archive_id = $data['archive_id'];
        return view('tenant.visit_chinese_medicine.show',compact('data','archive_id'));
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
        $data = VisitChineseMedicine::where('visit_id',$id)->first()->toArray();
        $archive_id = $data['archive_id'];
        return view('tenant.visit_chinese_medicine.edit',compact('data','archive_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChineseMedicineRequest $request, $id)
    {
        $model =VisitChineseMedicine::where(['visit_id'=>$id])->first();
        $model->fill($request->except(['yangxu_healthcare','qixu_healthcare','yinxu_healthcare','tanshi_healthcare','shire_healthcare','xieyu_healthcare','qiyu_healthcare','tebing_healthcare','pinghe_healthcare']));
        $model->fillModel($request);
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
