<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Package;
use App\Models\CommunityHospital;
use Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{

    public $createValidation = ['name' => 'required|max:100', 'community_hospital_id' => 'required', 'character' => 'required', 'requirement' => 'required', 'management_objective' => 'required',
                                'price' => 'required'];
    public $createColumns = ['name', 'community_hospital_id', 'character', 'requirement', 'management_objective', 'price'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        if (empty($q)) {
            return view('tenant.package.index')->withList(Package::orderBy('updated_at','DESC')->paginate(20))->withInput($request->all());
        } else {
            return view('tenant.package.index')->withList(Package::where('name', 'like', "%$q%")->orderBy('updated_at','DESC')->paginate(20))
                                                     ->withInput($request->all());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Form::setValidation($this->createValidation);
        $list = ['' => '请选择机构'] + CommunityHospital::pluck('name', 'id')->all();
        return view('tenant.package.create')->withList($list)->withInput($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $model = new Package();
        $model->fill($request->all());
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Tenant\\CommunityHospitalController@show", ['id' => $request->get('community_hospital_id')]);
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
        return view('tenant.package.show')->withModel(Package::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        Form::setValidation($this->createValidation);
        $list = ['' => '请选择机构'] + CommunityHospital::pluck('name', 'id')->all();
        return view('tenant.package.edit')->withModel(Package::findOrFail($id))->withList($list)->withInput($request->all());
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
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $model = Package::findOrFail($id);
        $model->fill($request->all());
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Tenant\\CommunityHospitalController@show", ['id' => $request->get('community_hospital_id')]);
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
        $model = Package::findOrFail($id);
        $model->destroy($id);
        return response()->json(['success' => true]);
    }
}
