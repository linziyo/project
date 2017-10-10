<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Doctor;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function index()
    {
        return view('wechat.doctor.index')->withList(Auth::user()->groups()->get());
    }

    public function show($id)
    {
        $model = Doctor::findOrFail($id);
        return view('wechat.doctor.show')->withModel($model);
    }
}
