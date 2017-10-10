<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Sonka\Dispatcher\Dispatcher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
