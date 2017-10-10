<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AuthController extends Controller
{
    public function getLogin()
    {
        return view('admin.auth.login');
    }
    public function postLogin(Request $request)
    {
        $redirectUrl = $request->get('redirectUrl');
        $credential = ['name' => $request->get('name'), 'password' => $request->get('password')];
        if (Auth::guard('admin')->attempt($credential)) {
            if ($request->ajax()) {
                return response()->json();
            } else {
                return redirect()->action("Admin\\HomeController@index");
            }
        } else {
            if ($request->ajax()) {
                return response()->json(['message' => 'Login Failed']);
            } else {
                return redirect('admin/login')->withInput()->with('message', 'Login Failed');
            }
        }
    }

    public function postLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function getReset()
    {
        return view('admin.auth.reset');
    }
    public function postReset(Request $request)
    {
        if ($request->ajax()) {

        } else {
            return view('admin.auth.reset')->withInput($request->all());
        }
    }
}
