<?php

namespace App\Http\Controllers\Admin;

use App\Models\Community;
use App\Models\CommunityHospital;
use App\Models\Doctor;
use App\Models\Group;
use App\Models\GroupDoctor;
use App\Models\Package;
use App\Models\GroupPackage;
use Auth;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class GroupController extends Controller
{
    public $createValidation = ['name' => 'required|max:200', 'community_hospital_id' => 'required|numeric'];
    public $createColumns = [ 'name', 'community_hospital_id'];

    public function index(Request $request)
    {
        $q = $request->get('name');
        $h = $request->get('community_hospital_id');
        if (empty($q) && empty($h)) {
            return view('admin.group.index')
                ->withList(Group::where('tenant_id',$request->get('tenant_id'))->paginate(20))
                ->withHospital(CommunityHospital::where('tenant_id',$request->get('tenant_id'))->get())
                ->withInput($request->all())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        } else {
            if(empty($q) || $q == ''){
                $list = Group::where('tenant_id',$request->get('tenant_id'))->where('community_hospital_id',$h)->paginate(20);
            }elseif(empty($h) || $h == ''){
                $list = Group::where('tenant_id',$request->get('tenant_id'))->where('name', 'like', "%$q%")->paginate(20);
            }else{
                $list = Group::where('tenant_id',$request->get('tenant_id'))->where('name', 'like', "%$q%")->where('community_hospital_id',$h)->paginate(20);
            }

            return view('admin.group.index')
                ->withList($list)
                ->withInput($request->all())
                ->withHospital(CommunityHospital::where('tenant_id',$request->get('tenant_id'))->get())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        }
    }

    public function show($id)
    {
        return view('admin.group.show')->withList(Group::findOrFail($id));
    }

    public function create(Request $request)
    {
        \Form::setValidation($this->createValidation);
        $list = ['' => '请选择机构'] + CommunityHospital::where('tenant_id',$request->get('tenant_id'))->pluck('name', 'id')->all();
        return view('admin.group.create')->withTenant(Tenant::findOrFail($request->get('tenant_id')))->withList($list);
    }

    public function store(Request $request)
    {
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $model = new Group();
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\GroupController@index","tenant_id=".$request->get('tenant_id'));
        }
    }

    public function edit($id)
    {
        \Form::setValidation($this->createValidation);
        $model =Group::findOrFail($id);
        return view('admin.group.edit')->withModel($model)->withList(CommunityHospital::where('tenant_id',$model->tenant_id)->get());
    }

    public function update(Request $request, $id)
    {
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }
        $model = Group::findOrFail($id);
        $model->fill($request->all());
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\GroupController@index","tenant_id=".$request->get('tenant_id'));
        }

    }

    public function destroy($id)
    {
        $model = Group::findOrFail($id);
        $model->delete();
        return response()->json(['success' => true]);
    }
    public function add(Request $request)
    {
        $group = Group::findOrFail($request->get('id'));
        $list = $group->communityHospital->doctors()->get();
        $group_doctor = $group->doctors->toArray();
        $group_member_list = array_column($group_doctor,'id');
        $group_leader_list = array();
        if(!empty($group_doctor)){
            foreach($group_doctor as $key=>$val){
                $group_leader_list[$val['id']] = $val['pivot']['is_leader'];
            }
        }
        return view('admin.group.add')
            ->withGroup($group)
            ->withDoctors($list)
            ->withTenant(Tenant::findOrFail($request->get('tenant_id')))
            ->withList($group_member_list)
            ->withLeader($group_leader_list);

    }
    public function group_doctor(Request $request)
    {
        $is_leader = 0;
        $list = array();
        $group_doctor_data = $request->all();
        if (isset($group_doctor_data['doctor']) && !empty($group_doctor_data['doctor'])) {
            foreach ($group_doctor_data['doctor'] as $key => $val) {
                if (isset($group_doctor_data['is_leader'])) {
                    $is_leader = ($group_doctor_data['is_leader'] == $val) ? 1 : 0;
                }
                $list[$val] = array('is_leader' => $is_leader, 'tenant_id' =>$request->get('tenant_id'));
            }
        }
        $group = Group::findOrFail($request->get('group_id'));
        $hospital_id = $group->communityHospital->id;
        $group->doctors()->sync($list);
        if ($request->ajax()) {
            return response()->json();
        } else {
          return redirect()->action("Admin\\GroupController@index","tenant_id=".$request->get('tenant_id'));
        }
    }
    public function add_package(Request $request)
    {
        $rs=GroupPackage::select('package_id')->where('group_id',$request->get('id'))->get();
        $package_id = [];
        foreach ($rs as $v){
            array_push($package_id,$v->package_id);
        }
        $data= Package::select('id','name')->where('tenant_id',$request->get('tenant_id'))->get();
        return view('admin.group.add_package')->withTenant(Tenant::findOrFail($request->get('tenant_id')))
            ->withId($request->get('id'))
            ->withPackage_id($package_id)
            ->withData($data);
    }
    public function group_package(Request $request)
    {
        $package_ids=$request->get('package_id');
        GroupPackage::where('group_id',$request->get('group_id'))->delete();
        foreach ($package_ids  as $k=>$v)
            {
            $model = new GroupPackage();
            $model->fill($request->all());
            $model->package_id= $v;
            $model->save();
        }
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\GroupController@index","tenant_id=".$request->get('tenant_id'));
        }

    }
}
