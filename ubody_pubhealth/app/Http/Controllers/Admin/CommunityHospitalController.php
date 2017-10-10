<?php

namespace App\Http\Controllers\Admin;

use App\Models\CommunityHospital;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Form;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CommunityHospitalController extends Controller
{
    public $createValidation = ['name' => 'required|max:200', 'address' => 'required|max:200', 'phone_number' => 'required|max:200', 'image' => 'image|nullable', 'contract' => 'file|nullable'];
    public $createColumns = ['name', 'address', 'phone_number', 'image', 'contract'];

    public function index(Request $request)
    {
        $q = $request->get('name');
        if (empty($q)){
            return view('admin.hospital.index')
                ->withList(CommunityHospital::withoutGlobalScope('tenant_id')->where('tenant_id', $request->get('tenant_id'))->paginate(20))
                ->withInput($request->all())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        } else {
            view()->share('tenant_id', $request->get('tenant_id'));
            return view('admin.hospital.index')
                ->withList(CommunityHospital::where('tenant_id', $request->get('tenant_id'))->where('name', 'like', "%$q%")->paginate(20))
                ->withInput($request->all())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        }

    }

    public function create(Request $request)
    {
        Form::setValidation($this->createValidation);
        return view('admin.hospital.create')->withTenant(Tenant::findOrFail($request->get('tenant_id')));
    }

    public function store(Request $request)
    {
        //验证
        $inputs = $request->only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $model = new CommunityHospital();
        $model->fill($request->all());
        $model->image = empty($request->file('image')) ? "" : $request->file('image')->store('images');
        $model->contract = empty($request->file('contract')) ? "" : $request->file('contract')->store('contracts');
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\CommunityHospitalController@index", "tenant_id=" . $request->get('tenant_id'));
        }

    }

    public function edit($id)
    {
//        (CommunityHospital::withoutGlobalScope('tenant_id')
        $model = CommunityHospital::withoutGlobalScope('tenant_id')->findOrFail($id);
        Form::setValidation($this->createValidation);
        return view('admin.hospital.edit')->withModel($model);
    }

    public function update(Request $request, $id)
    {
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        if ($request->file('image')) {
            $imageUrl = $request->file('image')->store('images');
        }
        if ($request->file('contract')) {
            $contractUrl = $request->file('contract')->store('contracts');
        }

        $model = CommunityHospital::withoutGlobalScope('tenant_id')->findOrFail($id);
        $model->fill($request->all());
        if (isset($imageUrl) && $imageUrl != '') {
            $model->image = $imageUrl;
        }
        if (isset($contractUrl) && $contractUrl != '') {
            $model->contract = $contractUrl;
        }

        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\CommunityHospitalController@index", "tenant_id=" . $request->get('tenant_id'));
        }
    }

    public function destroy($id)
    {
        $model = CommunityHospital::findOrFail($id);
        $model->delete();
        return response()->json(['success' => true]);
    }
}
