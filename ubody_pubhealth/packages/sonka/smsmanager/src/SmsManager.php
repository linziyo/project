<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/27 0027
 * Time: 下午 4:04
 */

namespace Sonka\SmsManager;


use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SmsManager
{
    private $baseUrl = "http://sms.10690221.com/hy/";
    private $orgno = "sjdz";
    private $uid = 80974;
    private $password = "sjdz668";
    private $expid = 0;

    public function sendVerifyCodeMessage($mobile)
    {
        $template = "【健康云助手】：您的验证码为%s，关注健康，关爱生命，健康云助手与您一起为健康加油！";
        $verifyCode = rand(1000, 9999);
        Session::put('verify_code', $verifyCode);
        Session::put('mobile', $mobile);

        return $this->send($mobile, ['template' => sprintf($template, $verifyCode)]);
    }

    public function verifyCode($mobile, $verifyCode)
    {
        $result = $mobile == Session::get('mobile') && $verifyCode == Session::get('verify_code');
        if ($result) {
            \Session::remove('mobile');
            \Session::remove('verify_code');
        }
        return $result;
    }

    public function send($mobile, $options)
    {
        $client = new Client();

        $response = $client->request('POST', $this->baseUrl, [
            'headers' => ['content-type' => 'application/x-www-form-urlencoded;charset=UTF-8'],
            'form_params' => [
                'mobile' => $mobile,
                'uid' => $this->uid,
                'auth' => strtolower(md5($this->orgno . $this->password)),
                'msg' => urlencode($options['template']),
                'encode' => 'utf-8',
                'expid' => 0
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            $responseContent = $response->getBody()->getContents();
            if (strpos($responseContent, '0') == 0) {
                return true;
            }
        }

        return false;
    }
}