<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Doctor;
use App\Models\User;
use Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{

    public $createValidation = ['user_id' => 'required', 'community_hospital_id' => 'required'];
    public $createColumns = ['user_id', 'community_hospital_id', 'avatar', 'duty', 'title', 'specialty', 'skills', 'working_time', 'consult', 'description'];
    public $updateValidation = ['user_id' => 'required', 'community_hospital_id' => 'required'];
    public $updateColumns = ['user_id', 'community_hospital_id', 'duty', 'title', 'specialty', 'skills', 'working_time', 'consult', 'description'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        if (empty($q)) {
            return view('tenant.doctor.index')->withList(Doctor::orderBy('updated_at','DESC')->paginate(20))->withInput($request->all());
        } else {
            $user_info = User::where('mobile', 'like', "%$q%")->first();
            $id = !empty($user_info['id']) ? $user_info['id'] : 0;
            return view('tenant.doctor.index')->withList(Doctor::where('user_id', 'like', "%$id%")->orderBy('updated_at','DESC')->paginate(20))
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
        $mobile = $request->get('mobile');
        if (empty($mobile)) {
            return view('tenant.doctor.create')->withInput($request->all());
        } else {
            $user_info = User::where('mobile', $mobile)->first();

            if (!empty($user_info)) {
                $doctor = Doctor::where('user_id',$user_info->id)->get();
                if($doctor){
                    return response()->json(['status'=>1]);
                }
                return response()->json(['status' => 200, 'userid' => $user_info['id']]);
            } else {
                return response()->json(['status' => -1]);
            }
        }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        Form::setValidation($this->updateValidation);
        return view('tenant.doctor.edit')->withModel(Doctor::findOrFail($id))->withInput($request->all());
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
        $inputs = Input::only($this->updateColumns);
        $rules = $this->updateValidation;
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $model = Doctor::findOrFail($id);
        $hospital_id = $model->communityHospital->id;
        $model->fill($request->all());
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Tenant\\CommunityHospitalController@show", ['id' => $hospital_id]);
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
        $model = Doctor::findOrFail($id);
        $model->delete();
        return response()->json(['success' => true]);
    }
}
