<?php

namespace App\Http\Controllers\Admin;

use App\Models\Community;
use App\Models\CommunityHospital;
use App\Models\Package;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Form;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http;

class PackageController extends Controller
{
    public $createValidation = ['name' => 'required|max:200', 'community_hospital_id' => 'required|numeric','character' => 'required', 'requirement' => 'required', 'management_objective' => 'required', 'price' => 'required'];
    public $createColumns = [ 'name', 'community_hospital_id','character', 'requirement', 'management_objective', 'price'];
    public function index(Request $request)
    {
        $q = $request->get('name');
        $h = $request->get('community_hospital_id');
        if (empty($q) && empty($h)) {
            return view('admin.package.index')
                ->withList(Package::where('tenant_id',$request->get('tenant_id'))->paginate(20))
                ->withHospital(CommunityHospital::where('tenant_id',$request->get('tenant_id'))->get())
                ->withInput($request->all())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        } else {
            if(empty($q) || $q == ''){
                $list = Package::where('tenant_id',$request->get('tenant_id'))->where('community_hospital_id',$h)->paginate(20);
            }elseif(empty($h) || $h == ''){
                $list = Package::where('tenant_id',$request->get('tenant_id'))->where('name', 'like', "%$q%")->paginate(20);
            }else{
                $list = Package::where('tenant_id',$request->get('tenant_id'))->where('name', 'like', "%$q%")->where('community_hospital_id',$h)->paginate(20);
            }

            return view('admin.package.index')
                ->withList($list)
                ->withInput($request->all())
                ->withHospital(CommunityHospital::where('tenant_id',$request->get('tenant_id'))->get())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        }
    }

    public function show($id)
    {
        return view('admin.package.show')->withList(Package::findOrFail($id));
    }

    public function create(Request $request)
    {
        \Form::setValidation($this->createValidation);
        $list = ['' => '请选择机构'] + CommunityHospital::where('tenant_id',$request->get('tenant_id'))->pluck('name', 'id')->all();
        return view('admin.package.create')->withTenant(Tenant::findOrFail($request->get('tenant_id')))->withList($list);
    }

    public function store(Request $request)
    {
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }
        $model = new Package();
        $model->fill($request->all());
//        $model->community_id = Auth::guard('admin')->id();
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\PackageController@index","tenant_id=".$request->get('tenant_id'));
        }
    }

    public function edit($id)
    {
        \Form::setValidation($this->createValidation);
        $model = Package::findOrFail($id);
        return view('admin.package.edit')->withModel($model)->withList(CommunityHospital::where('tenant_id',$model->tenant_id)->get());
    }

    public function update(Request $request, $id)
    {
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $model = Package::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\PackageController@index","tenant_id=".$request->get('tenant_id'));
        }
    }

    public function destroy($id)
    {
        $model = Package::findOrFail($id);
        $model->delete();
        return response()->json(['success'=>true]);
    }
}
