<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm(Request $request)
    {
        if (\Agent::isDesktop()) {
            return view('auth.login');
//            return view('pad.auth.login');
        }

        if (\Agent::isTablet()) {
            return view('auth.login');
        }

        if (\Agent::isMobile()) {
            return view('wechat.auth.login');
        }
    }

    public function login(Request $request)
    {
        $mobileValidator = \Validator::make($request->all(), [
            'username' => 'required|mobile',
            'password' => 'required'
        ]);

        $mailValidator = \Validator::make($request->all(), [
            'username' => 'required|email',
            'password' => 'required'
        ]);

        $usernameValidator = \Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($mobileValidator->passes() && Auth::attempt(['mobile' => $request->get('username'), 'password' => $request->get('password'), 'tenant_id' => Tenant::current($request)->id])) {
            $redirectUrl = $request->get('redirectUrl');
            return Redirect::intended('/');
        }

        if ($mailValidator->passes() && Auth::attempt(['email' => $request->get('username'), 'password' => $request->get('password'), 'tenant_id' => Tenant::current($request)->id])) {
            $redirectUrl = $request->get('redirectUrl');
            return Redirect::intended('/');
        }

        if ($usernameValidator->passes() && Auth::attempt(['name' => $request->get('username'), 'password' => $request->get('password'), 'tenant_id' => Tenant::current($request)->id])) {
            $redirectUrl = $request->get('redirectUrl');
            return Redirect::intended('/');
        }

        $errors = ['username' => trans('auth.failed')];
        return redirect()->back()->withErrors($errors)->withInput($request->all());
    }
}
