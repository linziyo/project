<?php

namespace App\Http\Controllers\Admin;

use App\Models\Community;
use App\Models\CommunityHospital;
use App\Models\Doctor;
use App\Models\Group;
use App\Models\User;
use Auth;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Form;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public $createValidation = ['community_hospital_id' => 'required'];
    public $createColumns = [ 'community_hospital_id', 'avatar', 'duty', 'title', 'specialty', 'skills', 'working_time', 'consult', 'description'];
    public $updateValidation = [ 'community_hospital_id' => 'required'];
    public $updateColumns = [ 'community_hospital_id', 'avatar', 'duty', 'title', 'specialty', 'skills', 'working_time', 'consult', 'description'];
    public function index(Request $request)
    {
        $q = trim($request->get('q'));
        $h = $request->get('community_hospital_id');
        if (empty($q) && empty($h)) {
            $list=Doctor::withoutGlobalScope('tenant_id')->where('tenant_id',$request->get('tenant_id'))->paginate(20);
            return view('admin.doctor.index')
                ->withList($list)
                ->withHospital(CommunityHospital::withoutGlobalScope('tenant_id')->where('tenant_id',$request->get('tenant_id'))->get())
                ->withInput($request->all())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        } else {
            if(empty($q) || $q == ''){
                $list = Doctor::withoutGlobalScope('tenant_id')->where('tenant_id',$request->get('tenant_id'))->where('community_hospital_id',$h)->paginate(20);
            }elseif(empty($h) || $h == ''){
                $user_info = User::where('mobile', 'like', "%$q%")->first();
                $id = !empty($user_info['id']) ? $user_info['id'] : 0;
                $list = Doctor::withoutGlobalScope('tenant_id')->where('tenant_id',$request->get('tenant_id'))->where('user_id', $id)->paginate(20);
            }else{
                $user_info = User::where('mobile', 'like', "%$q%")->first();
                $id = !empty($user_info['id']) ? $user_info['id'] : 0;
                $list = Doctor::withoutGlobalScope('tenant_id')->where('tenant_id',$request->get('tenant_id'))->where('user_id', $id)->where('community_hospital_id',$h)->paginate(20);
            }

            return view('admin.doctor.index')
                ->withList($list)
                ->withInput($request->all())
                ->withHospital(CommunityHospital::withoutGlobalScope('tenant_id')->where        ('tenant_id',$request->get('tenant_id'))->get())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        }
    }
    public function create(Request $request)
    {
        $mobile = trim($request->get('mobile'));
        if (empty($mobile)) {
            \Form::setValidation($this->createValidation);
            $list = ['' => '请选择机构'] + CommunityHospital::withoutGlobalScope('tenant_id')->where('tenant_id',$request->get('tenant_id'))->pluck('name', 'id')->all();
            return view('admin.doctor.create')->withTenant(Tenant::findOrFail($request->get('tenant_id')))->withList($list)->withInput($request->all());
        } else {
            $user_info = User::where('mobile', $mobile)->first();
            if (!empty($user_info)) {
                return response()->json(['success' => true, 'userid' => $user_info['id']]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function store(Request $request)
    {
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $model = new Doctor();
        $model->fill($request->all());
        if ($request->file('avatar')) {
            $avatarUrl = $request->file('avatar')->store('avatars');
            $model->avatar = $avatarUrl;
        }
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\DoctorController@index","tenant_id=".$request->get('tenant_id'));
        }
    }

    public function edit($id)
    {
        Form::setValidation($this->createValidation);
        $model = Doctor::withoutGlobalScope('tenant_id')->findOrFail($id);
        return view('admin.doctor.edit')->withModel($model)->withList(CommunityHospital::withoutGlobalScope('tenant_id')->where('tenant_id',$model->tenant_id)->get());
    }

    public function update(Request $request, $id)
    {
        $inputs = Input::only($this->updateColumns);
        $rules = $this->updateValidation;
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }
        if($request->file('avatar')){
            $avatarUrl = $request->file('avatar')->store('avatars');
        }
        $model = Doctor::withoutGlobalScope('tenant_id')->findOrFail($id);
        $model->fill($request->all());

        if(isset($avatarUrl) && $avatarUrl!=''){
            $model->avatar = $avatarUrl;
        }
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\DoctorController@index","tenant_id=".$request->get('tenant_id'));
        }
    }

    public function destroy($id)
    {
        $model = Doctor::withoutGlobalScope('tenant_id')->findOrFail($id);
        $model->delete();

        return response()->json(['success' => true]);
    }
}
