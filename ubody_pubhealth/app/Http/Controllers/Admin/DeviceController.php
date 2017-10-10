<?php

namespace App\Http\Controllers\Admin;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Tenant;
use App\Models\Area;
use App\Models\CommunityHospital;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;



class DeviceController extends Controller
{
    public $createValidation = ['code' => 'required|max:200', 'type' => 'required|numeric'];
    public $createColumns = [ 'code', 'type'];

    public $updateValidation = [ 'code' => 'required', 'type' => 'required|numeric'];
    public $updateColumns = [ 'code', 'avatar', 'duty', 'type'];


    public function index(Request $request)
    {
        $q = trim($request->get('q'));
        if(empty($q)){
            return view('admin.device.index')
                ->withList(Device::where('tenant_id',$request->get('tenant_id'))->paginate(20))
                ->withInput($request->all())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));

        }else{
            return view('admin.device.index')->withList(Device::where('code', 'like', "%$q%")->paginate(20))
                ->withInput($request->all())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        }
    }

    public function create(Request $request)
    {
        \Form::setValidation($this->createValidation);

        $community_hospital = CommunityHospital::all();
        return view('admin.device.create')
            ->withHospitals($community_hospital)
            ->withTenant($request->get('tenant_id'))
            ;
    }

    public function store(Request $request)
    {
        $model = new Device();
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\DeviceController@index","tenant_id=".$request->get('tenant_id'));
        }
    }

    public function edit(Request $request,$id)
    {
        $community_hospital = CommunityHospital::all();
        return view('admin.device.edit')->withHospitals($community_hospital)->withModel(Device::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $model = Device::findOrFail($id);
        $model->fill($request->all());
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\DeviceController@index","tenant_id=".$request->get('tenant_id'));
        }
    }

    public function destroy($id)
    {
        $model = Device::withoutGlobalScope('tenant_id')->findOrFail($id);
        $model->delete();
        return response()->json(['success' => true]);
    }
}
