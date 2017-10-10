<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FamilyController extends Controller
{
    public function index()
    {
        return view('doctor.family.index');
    }

    public function create()
    {
        return view('doctor.family.create');
    }
}
