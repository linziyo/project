<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;
use Jenssegers\Agent\Facades\Agent;

class HomeController extends Controller
{
    public function index()
    {
        return view('wechat.home.index');
    }

    public function valid()
    {
        return 'success';
    }

    public function getAuthorize()
    {

    }

    public function getCallback()
    {

    }
}
