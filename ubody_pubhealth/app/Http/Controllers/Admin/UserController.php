<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\Area;
use Auth;
use Form;
use App\Models\Community;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http;

class UserController extends Controller
{
    public $createValidation = ['name' => 'required|max:200', 'mobile' => 'required|max:200','email'=>'required|max:200','real_name'=>'required|max:200'];
    public $createColumns = ['name', 'mobile', 'email', 'real_name',];
    public $updateValidation =['name' => 'required|max:200', 'mobile' => 'required|max:200','real_name'=>'required|max:200'];
    public $updateColumns = ['name', 'mobile',  'real_name',];
    public function index(Request $request)
    {
        $q = $request->get('name');
        if (empty($q)) {
            return view('admin.user.index')
                ->withList(User::where('tenant_id',$request->get('tenant_id'))->paginate(20))
                ->withInput($request->all())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        } else {
            return view('admin.user.index')
                ->withList(User::where('name', 'like', "%$q%")->paginate(20))
                ->withInput($request->all())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        }
    }
    public function create(Request $request)
    {
        Form::setValidation($this->createValidation);

        return view('admin.user.create')->withTenant(Tenant::findOrFail($request->get('tenant_id')));
    }

    public function store(Request $request)
    {

        $inputs = Input::only($this->createColumns);

        $rules = $this->createValidation;

        $validator = Validator::make($inputs, $rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        $model = new User();

        $avatarUrl = $request->file('avatar');
        $model->avatar = $avatarUrl;
        $model->fill($request->all());
        $model->password = bcrypt($request->get('password'));
        $model->avatar = $avatarUrl;
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\UserController@index",'tenant_id='.$request->get('tenant_id'));
        }
    }

    public function edit($id)
    {
        Form::setValidation($this->updateValidation);


        return view('admin.user.edit')->withModel(User::findOrFail($id))->withList(Community::all());
    }

    public function update(Request $request, $id)
    {
        $inputs = Input::only($this->updateColumns);
        $rules = $this->updateValidation;
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $model = User::findOrFail($id);
        $data=$model->fill($request->all());
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\UserController@index",'tenant_id='.$request->get('tenant_id'));

//            return view('admin.user.index')->withTenant(Tenant::findOrFail($request->get('tenant_id')))->withList(User::paginate(20));
        }
    }

    public function destroy($id)
    {
        $model = User::findOrFail($id);
        $model->delete();
        return response()->json(['success' => true]);
    }
}
