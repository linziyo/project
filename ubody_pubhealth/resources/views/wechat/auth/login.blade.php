@extends('wechat.layout')

@section('wechat_content')
    @if ($errors->has('mobile'))
        <span class="help-block">
            <strong>{{ $errors->first('mobile') }}</strong>
        </span>
    @endif
    <form action="{{ url('/login') }}" method="post">
        <div class="weui-cells">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="手机号码" name="username" id="username">
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <input class="weui-input" type="password" placeholder="请输入密码" name="password" id="password">
                </div>
            </div>
        </div>

        <div class="weui-btn-area">
            <button type="submit" class="weui-btn weui-btn_primary">登录</button>
            <a href="{{ url('/register') }}" class="weui-btn weui-btn_default">注册</a>
            <p style="margin-top: 15px;">
                <a href="{{ url('/password/reset') }}" style="float:right">忘记密码</a>
            </p>
        </div>
    </form>
@endsection