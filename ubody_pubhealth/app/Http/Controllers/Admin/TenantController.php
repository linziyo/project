<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TenantController extends Controller
{
    public $createValidation = ['name' => 'required'];
    public $createColumns = ['name'];

    public function index(Request $request)
    {
        $q = $request->get('q');
        if (empty($q)) {
            return view('admin.tenant.index')->withList(Tenant::withoutGlobalScope('tenant_id')->paginate(20))->withInput($request->all());
        } else {
            return view('admin.tenant.index')
                ->withList(Tenant::withoutGlobalScope('tenant_id')->where('name', 'like', "%$q%")->paginate(20))
                ->withInput($request->all());
        }
    }

    public function show($id)
    {
        return view('admin.tenant.show')->withModel(Tenant::findOrFail($id))->withTenant(Tenant::findOrFail($id));;
    }

    public function create()
    {
        \Form::setValidation($this->createValidation);
        return view('admin.tenant.create');
    }

    public function store(Request $request)
    {
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = \Validator::make($inputs, $rules);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $model = new Tenant();
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\TenantController@index");
        }
    }

    public function edit($id)
    {
        \Form::setValidation($this->createValidation);
        return view('admin.tenant.edit')->withModel(Tenant::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $model = Tenant::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\TenantController@index");
        }
    }

    public function destroy($id)
    {
        $model = Tenant::findOrFail($id);
        $model->delete();
        return response()->json(['success'=>'true']);
    }
}
