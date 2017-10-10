<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\Community;
use App\Models\Staff;
use App\Models\CommunityHospital;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Form;
use Auth;
use App\Models\Doctor;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Role_user;

class StaffController extends Controller
{
    public $createValidation = ['user_id' => 'required|max:200', 'community_hospital_id' => 'required|numeric'];
    public $createColumns = [ 'user_id', 'community_hospital_id'];
    public function index(Request $request)
    {
        $q =trim($request->get('name'));
        if (empty($q)){
            return view('admin.staff.index')
                ->withList(Staff::withoutGlobalScope('tenant_id')->where('tenant_id',$request->get('tenant_id'))->paginate(20))
                ->withInput($request->all())
                ->withCommunity(Community::all())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        } else {
            $data=User::select('id')->where('tenant_id',$request->get('tenant_id'))->where('real_name',$q)->first();
               $list=Staff::where('user_id',$data->id)->where('tenant_id', $request->get('tenant_id'))->paginate(10);
            view()->share('tenant_id', $request->get('tenant_id'));
            return view('admin.staff.index')
                ->withList($list)
                ->withInput($request->all())
                ->withCommunity(Community::all())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        }
    }
    public function create(Request $request)
    {
        \Form::setValidation($this->createValidation);
        $list=User::select('id','real_name')->where('tenant_id',$request->get('tenant_id'))->get();
        $a=CommunityHospital::where('tenant_id',$request->get('tenant_id'))->get();
        return view('admin.staff.create')->withTenant(Tenant::findOrFail($request->get('tenant_id')))->withList($list)
            ->withHospitals(CommunityHospital::where('tenant_id',$request->get('tenant_id'))->get());
    }
    public function store(Request $request)
    {
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }
        $a=Staff::select('user_id')->where('user_id',$request->get('user_id'))->first();
        if($a)
        {
            return redirect()->action("Admin\\StaffController@index","tenant_id=".$request->get('tenant_id'));

        }
        if(is_null($request->get('user_id')))
        {
            return Redirect::back()->withInput()->with('mes','请先登录！');

        }
        $model = new Staff();
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\StaffController@index","tenant_id=".$request->get('tenant_id'));
        }
    }

    public function edit(Request $request, $id)
    {

        $r = Role_user::withoutGlobalScope('tenant_id')->first();
        $r->where('user_id',9)->where('role_id',2);


        $model = Staff::withoutGlobalScope('tenant_id')->findOrFail($id);
        $data=Staff::where('id',$id)->first();
        $list=User::select('id','real_name','mobile')->where('tenant_id', $data->tenant_id)->where('id',$data->user_id)->first();
        return view('admin.staff.edit')
            ->withList($list)
            ->withModel($data)
            ->withCommunity(Community::all())
            ->withTenant(Tenant::findOrFail($data->tenant_id))
            ->withHospitals(CommunityHospital::where('tenant_id',$data->tenant_id)->get());
            ;
}

    public function update(Request $request, $id)
    {

        if(empty($request->get('user_id')))
        {
            $data=Staff::where('id',$id)->first();
        }
        if(Staff::where('user_id',$request->get('user_id'))->where('id',$id)->first())
        {
            return redirect()->action("Admin\\StaffController@index","tenant_id=".$request->get('tenant_id'));
        }

        $model = new Staff();
        $model->where('id',$id)->delete();
        $model->fill($request->all());
        $model->id=$id;
        $model->user_id=$request->get('user_id')?$request->get('user_id'):$data->user_id;
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\StaffController@index","tenant_id=".$request->get('tenant_id'));
        }
    }
    public function destroy($id)
    {
        $model = Staff::withoutGlobalScope('tenant_id')->findOrFail($id);
        $data=Role_user::where('user_id',$model->user_id)->first();
        $data->where('user_id',$data->user_id)->where('role_id',$data->role_id)->delete();
        $model->delete();
        return response()->json(['success' => true]);
    }
}
