<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Community;
use App\Models\CommunityHospital;
use App\Models\Doctor;
use App\Models\Group;
use App\Models\Package;
use Form;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommunityHospitalController extends Controller
{
    public $createValidation = ['name' => 'required|max:100', 'address' => 'required|max:200', 'phone_number' => 'required|max:100', 'image' => 'image', 'contract' => 'file'];
    public $createColumns = ['name', 'address', 'phone_number', 'image', 'contract'];
    public $updateValidation = ['name' => 'required|max:100', 'address' => 'required|max:200', 'phone_number' => 'required|max:100'];
    public $updateColumns = ['name', 'address', 'phone_number'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        if (empty($q)) {
            return view('tenant.community_hospital.index')->withList(CommunityHospital::orderBy('updated_at','DESC')->paginate(20))->withInput($request->all());
        } else {
            return view('tenant.community_hospital.index')->withList(CommunityHospital::where('name', 'like', "%$q%")->orderBy('updated_at','DESC')->paginate(20))
                ->withInput($request->all());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Form::setValidation($this->createValidation);
        return view('tenant.community_hospital.create');
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

        $imageUrl = $request->file('image')->store('images');
        $contractUrl = $request->file('contract')->store('contracts');

        $model = new CommunityHospital();
        $model->fill($request->all());
        $model->image = $imageUrl;
        $model->contract = $contractUrl;
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action('Tenant\CommunityHospitalController@index');
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
        return view('tenant.community_hospital.show')->withModel(CommunityHospital::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Form::setValidation($this->updateValidation);
        return view('tenant.community_hospital.edit')->withModel(CommunityHospital::findOrFail($id));
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

        $model = CommunityHospital::findOrFail($id);
        $model->fill($request->all());
        if($request->file('image')){
            $model->image = $request->file('image')->store('images');
        }
        if($request->file('contract')){
            $model->contract = $request->file('contract')->store('contracts');
        }
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action('Tenant\CommunityHospitalController@index');
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
        $model = CommunityHospital::findOrFail($id);
        $model->destroy($id);
        return response()->json(['success' => true]);
    }
}
