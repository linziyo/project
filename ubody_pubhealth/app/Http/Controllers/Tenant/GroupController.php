<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Group;
use App\Models\Tenant;
use Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Redirect;
use Validator;

class GroupController extends Controller
{

    public $createValidation = ['name' => 'required|max:100', 'description' => 'required|max:255'];
    public $createColumns = ['name', 'description'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        if (empty($q)) {
            return view('tenant.groups.index')->withList(Group::orderBy('updated_at','DESC')->paginate(20))->withInput($request->all());
        } else {
            return view('tenant.groups.index')->withList(Group::where('name', 'like', "%$q%")->orderBy('updated_at','DESC')->paginate(20))
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
        return view('tenant.groups.create')->withInput($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
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

        $community_hospital_id = $request->get('community_hospital_id');
        $model = new Group();
        $model->fill($request->all());
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Tenant\\CommunityHospitalController@show", ['id' => $community_hospital_id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        Form::setValidation($this->createValidation);
        return view('tenant.groups.edit')->withModel(Group::findOrFail($id))->withInput($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
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

        $community_hospital_id = $request->get('community_hospital_id');
        $model = Group::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Tenant\\CommunityHospitalController@show", ['id' => $community_hospital_id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Group::findOrFail($id);
        $model->delete();
        return response()->json(['success' => true]);
    }


    public function getGroupDoctors($id)
    {
        $group = Group::findOrFail($id);
        $list = $group->communityHospital->doctors()->get();
        $group_doctor = $group->doctors->toArray();
        $group_member_list = array_column($group_doctor,'id');
        $group_leader_list = array();
        if(!empty($group_doctor)){
            foreach($group_doctor as $key=>$val){
                $group_leader_list[$val['id']] = $val['pivot']['is_leader'];
            }
        }

        return view('tenant.groups.group_doctors')->withGroup($group)->withDoctors($list)->withList($group_member_list)->withLeader($group_leader_list);
    }


    public function postGroupDoctors(Request $request, $id)
    {
        $is_leader = 0;
        $list = array();
        $group_doctor_data = $request->all();
        if (isset($group_doctor_data['doctor']) && !empty($group_doctor_data['doctor'])) {
            foreach ($group_doctor_data['doctor'] as $key => $val) {
                if (isset($group_doctor_data['is_leader'])) {
                    $is_leader = ($group_doctor_data['is_leader'] == $val) ? 1 : 0;
                }
                $list[$val] = array('is_leader' => $is_leader, 'tenant_id' => Tenant::current($request)->id);
            }
        }

        $group = Group::findOrFail($id);
        $hospital_id = $group->communityHospital->id;
        $group->doctors()->sync($list);
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Tenant\\CommunityHospitalController@show", ['id' => $hospital_id]);
        }
    }

    public function getGroupPackages($id)
    {
        $group = Group::findOrFail($id);
        $list = $group->communityHospital->packages()->get();
        $group_packages = $group->packages->toArray();
        $group_packages_list = array();
        if($group_packages){
            foreach($group_packages as $key=>$val){
                $group_packages_list[] = $val['pivot']['package_id'];
            }
        }
        return view('tenant.groups.group_packages')->withModel($group)->withPackage($list)->withList($group_packages_list);
    }

    public function postGroupPackages(Request $request, $id)
    {
        $list = array();
        $group_packages_data = $request->all();
        if (isset($group_packages_data['package']) && !empty($group_packages_data['package'])) {
            foreach ($group_packages_data['package'] as $val) {
                $list[$val] = array('tenant_id' => Tenant::current($request)->id);
            }
        }
        $group = Group::findOrFail($id);
        $hospital_id = $group->communityHospital->id;
        $group->packages()->sync($list);
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Tenant\\CommunityHospitalController@show", ['id' => $hospital_id]);
        }
    }
}