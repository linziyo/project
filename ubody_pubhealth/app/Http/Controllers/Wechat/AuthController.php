<?php

namespace App\Http\Controllers\Wechat;

use App\Models\User;
use App\Models\WechatUser;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sonka\SmsManager\Facades\SmsManager;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('wechat.auth.index');
    }

    public function getBind(Request $request)
    {
        return view('wechat.auth.bind');
    }

    public function postBind(Request $request)
    {
        $mobile = $request->get('mobile');
        $verifyCode = $request->get('verify_code');

        if (SmsManager::verifyCode($mobile, $verifyCode)) {
            $wechatOAuthUser = session('wechat.oauth_user');

            $user = User::where('mobile', $mobile)->first();
            if (!$user) {
                $user = new User();
                $user->mobile = $mobile;
                $user->password = bcrypt(substr($mobile, 5, 6));
                $user->mobile_verified = true;
                $user->save();
            }

            $wechatUser = WechatUser::where('user_id', $user->id)->first();
            if (!$wechatUser) {
                $wechatUser = new WechatUser();
                $wechatUser->id = $wechatOAuthUser->id;
                $wechatUser->user_id = $user->id;
                $wechatUser->save();
                Auth::login($user);
                return redirect()->to('/weixin');
            } else {
                return redirect()->back()->withErrors(['error' => 'auth.bind_failed'])->withInput($request->all());
            }
        }

        return redirect()->back()->withErrors(['error' => '验证码错误'])->withInput($request->all());
    }

    public function getLogin()
    {
        return view('wechat.auth.login');
    }

    public function postLogin(Request $request)
    {
        return redirect()->back()->withErrors(['error' => trans('auth.failed')])->withInput($request->all());
    }
}