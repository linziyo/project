@extends('wechat.layout')
@section('css')
@stop

@section('wechat_content')
    <form action="{{ URL::action('Wechat\UserController@changeMobile') }}" method="post">
        <div class="weui-cells__title">修改手机号码</div>
        <div class="weui-cells weui-cells_form">

            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">手机号</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="number" pattern="[0-9]*" placeholder="请输入qq号">
                </div>
            </div>
            <div class="weui-cell weui-cell_vcode">
                <div class="weui-cell__hd">
                    <label class="weui-label">验证码</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="tel" placeholder="请输入验证码">
                </div>
                <div class="weui-cell__ft">
                    <button id="requestVerifyCode" type="button" class="weui-vcode-btn">获取验证码</button>
                </div>
            </div>
        </div>
        <div class="weui-btn-area">
            <button type="submit" class="weui-btn weui-btn_primary">确定</button>
        </div>
    </form>
@stop

@section('js')
    <script type="text/javascript">
        $(function () {
            $("#requestVerifyCode").click(function () {
                $.alert("我是一个对话框");
            });
        });
    </script>
@stop