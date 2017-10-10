<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultController extends Controller
{
    public function index()
    {
        return view('admin.consult.index');
    }
}
