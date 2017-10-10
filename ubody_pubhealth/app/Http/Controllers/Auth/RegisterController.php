<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Form;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Sonka\SmsManager\SmsManager;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected $rules = [
        'mobile' => 'required|mobile',
        'code' => 'required',
        'captcha' => 'required|captcha'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, ['mobile' => 'required|mobile|unique:users,mobile']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(Request $request, array $data)
    {
        return User::create([
            'mobile' => $data['mobile'],
            'password' => bcrypt(substr($data['mobile'], 3, 8)),
            'mobile_verified' => 1
        ]);
    }

    public function showRegistrationForm(Request $request)
    {
        Form::setValidation($this->rules);
        if (\Agent::isDesktop()) {
            return view('auth.register');
        }

        if (\Agent::isMobile()) {
            return view('wechat.auth.register');
        }
    }

    public function register(Request $request)
    {
        if (\SmsManager::verifyCode($request->get('mobile'), $request->get('code'))) {
            $this->validator($request->all())->validate();

            event(new Registered($user = $this->create($request, $request->all())));

            $this->guard()->login($user);

            return $this->registered($request, $user) ?: redirect($this->redirectPath());
        } else {
            $errors = ['code' => '验证码错误'];
            return redirect()->back()->withErrors($errors)->withInput($request->all());
        }
    }
}
