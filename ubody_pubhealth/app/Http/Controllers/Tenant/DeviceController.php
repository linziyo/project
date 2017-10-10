<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Device;
use App\Models\CommunityHospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        if(empty($q)){
            return view('tenant.device.index')->withList(Device::orderBy('updated_at','DESC')->paginate(20))->withInput($request->all());
        }else{
            return view('tenant.device.index')->withList(Device::where('code', 'like', "%$q%")->orderBy('updated_at','DESC')->paginate(20))
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
        $community_hospital = CommunityHospital::all();
        return view('tenant.device.create')->withHospitals($community_hospital);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Device();
        $model->fill($request->all());
        $model->save();
        if($request->ajax()){
            return response()->json();
        }else{
            return redirect()->action('Tenant\DeviceController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $community_hospital = CommunityHospital::all();
        return view('tenant.device.edit')->withHospitals($community_hospital)->withModel(Device::findOrFail($id));
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
        $model = Device::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        if($request->ajax()){
            return response()->json();
        }else{
            return redirect()->action('Tenant\DeviceController@index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Device::findOrFail($id);
        $model->destroy($id);
        return response()->json(['success' => true]);
    }

}