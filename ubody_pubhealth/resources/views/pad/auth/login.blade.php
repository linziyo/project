@extends('wechat.layout')

@section('wechat_content')
    @if ($errors->has('mobile'))
        <span class="help-block">
            <strong>{{ $errors->first('mobile') }}</strong>
        </span>
    @endif
    <form action="{{ url('/oauth/token') }}" method="post" onsubmit="return submitLogin(this)">
        <input type="hidden" name="grant_type" value="password"/>
        <input type="hidden" name="client_id" value="1"/>
        <input type="hidden" name="client_secret" value="P9mFWSnNT5S8ywn0B5F8s6PQP2gHgAUPpMctkn40"/>
        <div class="weui-cells__title">登录</div>
        <div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">账号</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="tel" placeholder="手机号码" name="username" id="username">
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">密码</label>
                </div>
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
@section('js')
    <script type="text/javascript">
        function submitLogin(form) {
            var data = $(form).serialize();
            $.post($(form).attr('action'), data, function (result) {
                if (window.localStorage) {
                    var storage = window.localStorage;
                    storage.setItem('token', JSON.stringify(result));
                    location.href = "{{ URL::action('Pad\ArchiveController@index') }}";
                }
            });
            return false;
        }

        $(function () {
            if (window.localStorage) {
                var accessToken = JSON.parse(window.localStorage.getItem('token'));
                if (accessToken) {
                    location.href = "{{ URL::action('Pad\ArchiveController@index') }}";
                }
            }
        });
    </script>
@endsection