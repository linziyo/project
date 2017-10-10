<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sonka\SmsManager\Facades\SmsManager;

class SmsController extends Controller
{
    public function requestValidateCode(Request $request)
    {
        $v = \Validator::make($request->all(), ['mobile' => 'required|mobile|unique:users,mobile']);

        if ($v->fails()) {
            return response()->json(['msg' => '手机号码已存在'], 500);
        }

        return response()->json(SmsManager::sendVerifyCodeMessage($request->get('mobile')));
    }
}
