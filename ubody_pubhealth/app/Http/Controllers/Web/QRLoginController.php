<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QRLoginController extends Controller
{
    public function index()
    {
        return view('web.qrlogin.index');
    }

    public function check()
    {
        return response()->json('');
    }

    public function authorize()
    {
        return view('web.qrlogin.authorize');
    }
}
