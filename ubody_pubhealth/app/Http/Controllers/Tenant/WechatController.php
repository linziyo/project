<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;
use EasyWeChat\OpenPlatform\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use URL;

class WechatController extends Controller
{
    private $options = [
        'debug' => true,
        'open_platform' => [
            'app_id' => 'wx3cdefbfb2604c70e',
            'secret' => '980608138086e94ce9ef8a229cd07c04',
            'token' => 'f6eV4fGs8gJ',
            'aes_key' => 'uXJubNBM3HjhCZVVSehn3hG4Wi5zx4Hkyv0QyZkszmj'
        ],
        'log' => [
            'level' => 'debug',
            'file' => '/tmp/easywechat.log'
        ],
        'oauth' => [
            'scopes' => ['snsapi_base'],
            'callback' => '/wechat/authorize/callback',
        ],
    ];

    protected $openPlatform;

    public function __construct()
    {
        $app = new Application($this->options);
        $this->openPlatform = $app->open_platform;
    }


    public function index()
    {
        return view('tenant.wechat.index');
    }

    public function serve(Request $request)
    {
        Log::info($request->getContent());
        $openPlatform = $this->openPlatform;
        $server = $openPlatform->server;
        $server->setMessageHandler(function ($event) use ($openPlatform) {
            switch ($event->InfoType) {
                case Guard::EVENT_AUTHORIZED:
                    $authorizationInfo = $openPlatform->getAuthorizationInfo($event->AuthorizationCode);
                case Guard::EVENT_UPDATE_AUTHORIZED:
                case Guard::EVENT_UNAUTHORIZED:
            }
        });

        return $server->serve();
    }

    public function auth(Request $request)
    {
        return $this->openPlatform->pre_auth->redirect(URL::action('Tenant\WechatController@serve'));
    }
}
