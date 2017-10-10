<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Archive;
use App\Models\Doctor;
use App\Models\CommunityHospital;
use App\Models\Tenant;
use App\Models\Device;
class HomeController extends Controller
{
    public function index()
    {
        $data['user_count']=User::count();
        $data['archive_count']=Archive::count();
        $data['doctor_count']=Doctor::count();
        $data['communityhospital_count']=CommunityHospital::count();
        $data['tenant_count']=Tenant::count();
        $data['device_count']=Device::count();
        $data['live_device']=Device::whereRaw('created_at<updated_at')->count();
        $data['live_archive']=Archive::
            where('created_at','>=',date("Y-m-d H:i:s",mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y"))))
            ->where('created_at','<',date("Y-m-d H:i:s",mktime(23,59,59,date("m"),date("d")-date("w")+7,date("Y"))))->count();
        $data['live_user']=User::
        where('created_at','>=',date("Y-m-d H:i:s",mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y"))))
            ->where('created_at','<',date("Y-m-d H:i:s",mktime(23,59,59,date("m"),date("d")-date("w")+7,date("Y"))))->count();
        $data['users']=User::
        where('created_at','>=',date("Y-m-d H:i:s",mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y"))))
            ->where('created_at','<',date("Y-m-d H:i:s",mktime(23,59,59,date("m"),date("d")-date("w")+7,date("Y"))))->get();
        return view('admin.home.index')->withList($data);
    }
    public function show($organizationId)
    {
        dd($organizationId);
    }
}
