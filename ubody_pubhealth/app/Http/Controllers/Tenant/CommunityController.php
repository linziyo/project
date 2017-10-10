<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Models\Area;
use App\Models\Community;
use App\Models\CommunityHospital;
use Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CommunityController extends Controller
{
    public $createValidation = ['name' => 'required|max:100', 'code' => 'required|max:20', 'community_hospital_id' => 'required'];
    public $createColumns = ['name', 'code', 'population', 'community_hospital_id', 'address', 'telephone', 'image', 'contract'];
    public $updateValidation = ['name' => 'required|max:100', 'code' => 'required|max:20', 'community_hospital_id' => 'required'];
    public $updateColumns = ['name', 'code', 'population', 'community_hospital_id', 'address', 'telephone'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        if (empty($q)) {
            return view('tenant.community.index')->withList(Community::orderBy('updated_at','DESC')->paginate(20))->withInput($request->all());
        } else {
            return view('tenant.community.index')->withList(Community::where('name', 'like', "%$q%")->orderBy('updated_at','DESC')->paginate(20))
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
        $list = ['' => '请选择机构'] + CommunityHospital::pluck('name', 'id')->all();
        return view('tenant.community.create')->withList($list)->withInput($request->all());
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

        $model = new Community();
        $model->fill($request->all());
        if ($request->file('image')) {
            $imageUrl = $request->file('image')->store('images');
            $model->image = $imageUrl;
        }
        if ($request->file('image')) {
            $contractUrl = $request->file('contract')->store('contracts');
            $model->contract = $contractUrl;
        }
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Tenant\\CommunityHospitalController@show", ['id' => $request->get('community_hospital_id')]);
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
        return view('tenant.community.show')->withModel(Community::findOrFail($id))
            ->withAreas(Area::where('community_id', '=', $id)->paginate(20));

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
        $list = ['' => '请选择机构'] + CommunityHospital::pluck('name', 'id')->all();
        return view('tenant.community.edit')->withModel(Community::findOrFail($id))->withList($list)->withInput($request->all());
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

        $model = Community::findOrFail($id);
        $model->fill($request->all());
        if ($request->file('image')) {
            $model->image = $request->file('image')->store('images');
        }
        if ($request->file('contract')) {
            $model->contract = $request->file('contract')->store('contracts');
        }
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Tenant\\CommunityHospitalController@show", ['id' => $request->get('community_hospital_id')]);
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
        $model = Community::findOrFail($id);
        $model->destroy($id);
        return response()->json(['success' => true]);
    }
}
