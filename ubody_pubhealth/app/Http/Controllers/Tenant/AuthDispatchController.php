<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\AuthDispatch;
use App\Models\Device;
use EasyWeChat\Foundation\Application;
use EasyWeChat\OpenPlatform\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use URL;
use Illuminate\Support\Facades\DB;

class AuthDispatchController extends Controller
{


    public function index()
    {
        $list = Device::with('authDispatch')->paginate(20);
        $authArchive = AuthDispatch::where('type','archive')->first();
        $authArchive = $authArchive?$authArchive->auth_list:null;
        return view('tenant.auth_dispatch.index',compact('list','authArchive'));
    }

    public function authArchive(Request $request)
    {
        $ids = $request->get('ids');
        $record = AuthDispatch::where('type','archive')->first();
        if(!$record){
            $record = new AuthDispatch();
        }
        $record->fill(['type'=>'archive','auth_list'=>$ids]);
        if($record->save()){
            return response()->json(['code'=>200,'msg'=>'success']);
        }else{
            return response()->json(['code'=>500,'msg'=>'error']);
        }

    }

    public function authDevice(Request $request)
    {
        $ids = $request->get('ids');
        $device_id = explode(',',$request->get('device_id'));
        $records = AuthDispatch::where('type','device')->whereIn('device_id',$device_id)->get()->toArray();

        if(!empty($records)){
            $records = array_column($records,null,'device_id');
        }
        foreach($device_id as $item)
        {
            if(!empty($records[$item]))
            {
                $model = AuthDispatch::findOrFail($records[$item]['id']);
            }else {
                $model = new AuthDispatch();
                $model->device_id = $item;
                $model->type = 'device';
            }
            $model->auth_list = $ids;

            $model->save();

        }
        return response()->json(['code'=>200,'msg'=>'success']);


    }

}
