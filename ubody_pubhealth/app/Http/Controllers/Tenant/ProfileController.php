<?php

namespace App\Http\Controllers\Tenant;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('tenant.profile.index')->withModel(Auth::user());
    }
}
