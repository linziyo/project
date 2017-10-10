<?php

namespace App\Http\Controllers\Api;

use App\Models\Community;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommunityController extends Controller
{

    public $createValidation = ['name' => 'required|max:100', 'code' => 'required|max:20', 'population' => 'required', 'community_hospital_id' => 'required', 'address' => 'required',
        'telephone' => 'required|max:20'];
    public $createColumns = ['name', 'code', 'population', 'community_hospital_id', 'address', 'telephone' ];
    public $updateValidation = ['name' => 'required|max:100', 'code' => 'required|max:20', 'population' => 'required', 'community_hospital_id' => 'required', 'address' => 'required',
        'telephone' => 'required|max:20'];
    public $updateColumns = ['name', 'code', 'population', 'community_hospital_id', 'address', 'telephone'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Doctor::findByUser(\Auth::user());
        $communities = $doctor->communityHospital->communities->all();
//        $communities = Community::all();
        return response()->json($communities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->only($this->createColumns);
        $rules = $this->createValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }
        $imageUrl = $request->file('image')->store('images');
        $contractUrl = $request->file('contract')->store('contracts');

        $model = new Community();
        $model->fill($request->all());
        $model->image = $imageUrl;
        $model->contract = $contractUrl;
        $model->save();

        return response()->json(['id' => $model->id, 'created_at' => $model->created_at,'code'=>201,'message'=>"success"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Community::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(Community::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->only($this->updateColumns);
        $rules = $this->updateValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }

        $model = Community::findOrFail($id);
        $model->fill($request->all());
        if($request->file('image')){
            $model->image = $request->file('image')->store('images');
        }
        if($request->file('contract')){
            $model->contract = $request->file('contract')->store('contracts');
        }
        $model->save();

        return response()->json(['updated_at' => $model->updated_at,'code'=>200,'message'=>"success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
