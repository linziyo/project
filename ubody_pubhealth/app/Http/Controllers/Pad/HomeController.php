<?php

namespace App\Http\Controllers\Pad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return redirect("http://1.publichealth.ubody.net/tenant");
//        return view('pad.home.index');
    }
}
