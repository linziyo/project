<?php

namespace App\Http\Middleware;

use App\WechatUser;
use Closure;
use EasyWeChat\Foundation\Application;
use Illuminate\Support\Facades\Auth;

class WechatAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'wechat')
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                if (!$this->isWeChatBrowser($request)) {
                    return $next($request);
                }

                if (!session('wechat.user')) {

                    $options = [
                        'app_id' => 'wx98e412154362b80b',
                        'secret' => '428b0e5f64c47fa413d34c0816b363e7',
                        'token' => 'weixin',
                        'debug' => true,
                        'log' => ['level' => 'debug', 'file' => '/tmp/easywechat.log'],
                        'oauth' => ['scopes' => ['snsapi_base'], 'callback' => $request->getRequestUri()],
                    ];

                    $app = new Application($options);

                    if ($request->has('code')) {
                        $oAuthUser = $app->oauth->user();
                        $wechatUser = WechatUser::find($oAuthUser->id);
                        if (!$wechatUser) {
                            session(['wechat.oauth_user' => $oAuthUser]);
                            return redirect()->to('/weixin/bind/');
                        } else {
                            $user = $wechatUser->user()->first();
                            Auth::login($user);
                            return $next($request);
                        }
                    }

                    return $app->oauth->scopes(['snsapi_userinfo'])->redirect();
                }

                return $next($request);
            }
        }

        return $next($request);
    }

    protected function isWeChatBrowser($request)
    {
        return strpos($request->header('user_agent'), 'MicroMessenger') !== false;
    }
}