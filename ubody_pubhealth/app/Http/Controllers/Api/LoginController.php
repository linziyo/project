<?php

namespace App\Http\Controllers\Api;

use App\Models\Doctor;
use App\Models\Tenant;
use App\Models\User;
use Auth;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Redirect;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $mobileValidator = \Validator::make($request->all(), [
            'username' => 'required|mobile',
            'password' => 'required'
        ]);
//dd($request->all());
        $username = trim($request->get('username'));
        $password = trim($request->get('username'));
        $user = User::where('mobile',$username)->first();

        if($user){
            $doctor = Doctor::where('user_id',$user->id)->first();
            if(!$doctor){
                return response()->json(['code'=>403,'message'=>'登录失败：不是医生账号']);
            }
        }

        if ($mobileValidator->passes() && \Auth::attempt(['mobile' => $username, 'password' => $password])) {
            $http = new Client();
//            return  $request->getHost();
            $response = $http->post($_SERVER['HTTP_HOST'].'/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '6',
                    'client_secret' => 'yoPJILyzoVs1GPFncgc6l3rxDiyAgF6kpAkSPCJ6',
                    'username' => $username,
                    'password' => $password,
                    'scope' => '',
                ],
            ]);
            return json_decode((string) $response->getBody(), true);
        }

        return response()->json(['code'=>403,'message'=>trans('auth.failed')]);

    }
}
