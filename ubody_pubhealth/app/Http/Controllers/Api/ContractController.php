<?php

namespace App\Http\Controllers\Api;

use App\Models\Contract;
use App\Models\Archive;
use App\Models\ContractFamily;
use App\Models\Doctor;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    public $createValidation = [ 'archive_id' => 'required|exists:archives,id', 'package_id' => 'required|exists:packages,id',
        'price' => 'required|digits_between:0,999999' ];
    public $createColumns = ['archive_id', 'package_id', 'price'];

    public function index()
    {
        return response()->json(Contract::paginate(20));
    }

    public function create(Request $request)
    {
        $archive = Archive::findOrFail($request->get('archive_id'));
        if($archive){
            $hospital = Doctor::findByUser(\Auth::user())->communityHospital;
            return response()->json(['archive'=>$archive,'packages'=>$hospital->packages,'code'=>200,'message'=>"success"]);
        }else{
            return response()->json(['code'=>200,'message'=>"The Archive does not find by archive_id:".$request->get('archive_id')]);
        }

    }

    public function store(Request $request)
    {
        //验证
        $inputs = $request->only($this->createColumns);
        $rules = $this->createValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }

        $doctor = Doctor::findByUser(\Auth::user());
        $archive = Archive::findOrFail($request['archive_id']);
        $own = ['relationship'=>"本人",'name'=>$archive->real_name,'id_code'=>$archive->id_code,'mobile' => $archive->mobile,'tenant_id'=>$doctor->tenant_id];
        $contract = Contract::where('archive_id',$request['archive_id'])->first();

        if(!$contract){
            $model = new Contract();
            $model->fill($request->all());
            $model->doctor()->associate($doctor);
            $model->tenant_id = $doctor->tenant_id;
            $model->status = 2;
            $model->save();

            $families = $request->get('families');
            array_push($families,$own);
            for ($i = 0; $i < sizeof($families); $i++) {
                $families[$i]['tenant_id']= $doctor->tenant_id;
            }
            $model->family()->createMany($families);
            return response()->json(['id' => $model->id, 'created_at' => $model->created_at,'code'=>201,'message'=>"success"], 201);
        }else{
            $model = Contract::findOrFail($contract->id);
            $model->fill($request->all());
            $model->save();

            $model->family()->where('contract_id',$contract->id)->delete();
            $families = $request->get('families');
            array_push($families,$own);
            for ($i = 0; $i < sizeof($families); $i++) {
                $families[$i]['tenant_id']= $doctor->tenant_id;
            }

            $model->family()->createMany($families);
            return response()->json(['updated_at' => $model->updated_at,'code'=>200,'message'=>"success"], 200);
        }

        return response()->json(['code'=>201,'message'=>"信息有误"], 401);
    }

    public function show($id)
    {
        $contract = Contract::where('archive_id',$id)->first();
        if(!$contract){
            $archive = Archive::findOrFail($id);
            $archive->doctor_name = $archive->doctor->user->real_name;
            $hospital = Doctor::findByUser(\Auth::user())->communityHospital;
            return response()->json(['archive'=>$archive,'packages'=>$hospital->packages,'code'=>203,'message'=>"success"]);
        }
        $contract->family;
        $archive = Archive::findOrFail($id);
        $archive->doctor_name = $archive->doctor->user->real_name;
        $hospital = Doctor::findByUser(\Auth::user())->communityHospital;
        if(!$contract){
            return response()->json(['code'=>403,'message'=>"The Contract does not find by archive_id:".$id]);
        }
        return response()->json(['contract'=>$contract,'archive'=>$archive,'packages'=>$hospital->packages,'code'=>200,'message'=>"success"]);

    }

    public function update(Request $request, $id)
    {
        //验证
        $inputs = $request->only($this->createColumns);
        $rules = $this->createValidation;
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return response()->json(['code'=>403,'message'=>$validator->errors()]);
        }

        $model = Contract::findOrFail($id);
        $model->fill($request->all());
//        if ($request->file('images')) {
//            $model->images = empty($request->file('images')) ? "" : $request->file('images')->store('images');
//        }
        $model->save();

        return response()->json(['updated_at' => $model->updated_at,'code'=>200,'message'=>"success"], 200);
    }

    public function destroy($id)
    {
        $model = Contract::findOrFail($id);
        $model->delete();
        $model->family()->where('contract_id',$id)->delete();
        return response()->json(['code'=>203,'message'=>"success"]);
    }
}
