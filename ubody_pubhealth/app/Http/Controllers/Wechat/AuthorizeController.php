<?php

namespace App\Http\Controllers\Wechat;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorizeController extends Controller
{
    private $options = [
        'debug' => true,
        'component_app_id' => 'wx98e412154362b80b',
        'component_app_secret' => '428b0e5f64c47fa413d34c0816b363e7',
        'token' => 'weixin',
        'log' => [
            'level' => 'debug',
            'file' => '/tmp/easywechat.log'
        ],
        'oauth' => [
            'scopes' => ['snsapi_base'],
            'callback' => '/wechat/authorize/callback',
        ],
    ];

    public function index($appId)
    {
        $app = new Application($this->options);

        return $app->oauth->redirect();
    }

    public function bind(Request $request)
    {
        $code = $request->get('code');
        $state = $request->get('state');

        return view('wechat.authorize.bind');
    }

    public function callback(Request $request, $appId)
    {
        $code = $request->get('code');
        $state = $request->get('state');

        $app = new Application($this->options);
        $user = $app->oauth->user();
        dd($user);
    }
}
