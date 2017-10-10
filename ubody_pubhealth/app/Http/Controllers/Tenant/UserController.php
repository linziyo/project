<?php

namespace App\Http\Controllers\Tenant;

use App\Models\User;
use App\Models\Family;
use Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public $createValidation = ['name' => 'required|max:100', 'password' => 'required|min:5', 'mobile' => 'required|mobile'];
    public $createColumns = ['name', 'password', 'email', 'mobile', 'real_name', 'id_code', 'avatar', 'sex', 'date_of_birth'];
    public $updateValidation = ['name' => 'required|max:100', 'password' => 'required|min:5', 'mobile' => 'required'];
    public $updateColumns = ['name', 'password', 'email', 'mobile', 'real_name', 'id_code', 'sex', 'date_of_birth'];

    public function index(Request $request)
    {
        $q = $request->get('q');
        if (empty($q)) {
            return view('tenant.user.index')->withList(User::orderBy('updated_at','DESC')->paginate(20))->withInput($request->all());
        } else {
            return view('tenant.user.index')->withList(User::where('name', 'like', "%$q%")->orderBy('updated_at','DESC')->paginate(20))
                ->withInput($request->all());
        }
    }

    public function create()
    {
        Form::setValidation($this->createValidation);
        return view('tenant.user.create');
    }

    public function store(Request $request)
    {
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $model = new User();
        $model->fill($request->all());
        $model->password = bcrypt($request->get('password'));
        if ($request->file('avatar')) {
            $avatarUrl = $request->file('avatar')->store('avatars');
            $model->avatar = $avatarUrl;

        }
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Tenant\\UserController@index");
        }
    }

    public function show($id)
    {
        return view('tenant.user.show')->withModel(User::findOrFail($id))->withList(Family::where('user_id', '=', $id)->paginate(20));
    }

    public function edit($id)
    {
        Form::setValidation($this->createValidation);
        return view('tenant.user.edit')->withModel(User::findOrFail($id));
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
        $model->fill($request->all());
        if ($request->get('password')) {
            $model->password = bcrypt($request->get('password'));
        }
        if ($request->file('avatar')) {
            $model->avatar = $request->file('avatar')->store('avatars');
        }
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Tenant\\UserController@index");
        }
    }

    public function destroy($id)
    {
        $model = User::findOrFail($id);
        $model->delete();
        return response()->json(['success' => true]);
    }
}
