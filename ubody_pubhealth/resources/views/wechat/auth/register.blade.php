@extends('wechat.layout')

@section('wechat_content')
    <form action="{{ URL::action('Auth\RegisterController@register') }}" method="post">
        <div class="weui-cells">
            <div class="weui-cell">
                <div class="weui-cell__bd">新用户注册</div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <input class="weui-input" type="number" placeholder="请输入手机号码" name="mobile" id="mobile">
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <input class="weui-input" type="number" placeholder="验证码" name="code" id="code">
                </div>
                <div class="weui-cell-ft">
                    <button type="button" class="weui-vcode-btn" id="btn_vcode">获取验证码</button>
                </div>
            </div>
        </div>

        <div class="weui-btn-area">
            <button type="submit" class="weui-btn weui-btn_primary">注册</button>
            <a href="{{ url('/login') }}" class="weui-btn weui-btn_default">登录</a>
        </div>
    </form>
@endsection

@section('js')
    <script type="text/javascript">
        $(function () {
            $("#btn_vcode").click(function () {
                $mobile = $("#mobile").val();
                if ($mobile.length != 11) {
                    $.toast('手机号码错误', 'text');
                    return;
                }

                $.showLoading();
                $.ajax({
                    url: '{{ URL::action('Auth\SmsController@requestValidateCode') }}',
                    data: {'mobile': $("#mobile").val()},
                    method: 'POST',
                    success: function () {
                        var time = 60;
                        $("#btn_vcode").addClass('weui-btn_disabled');
                        $("#btn_vcode").attr('disabled', 'disabled');
                        $("#btn_vcode").text(time + "秒后重发");
                        var interval = window.setInterval(function () {
                            time--;
                            if (time == 0) {
                                $("#btn_vcode").removeAttr('disabled');
                                time = 60;
                                window.clearInterval(interval);
                                $("#btn_vcode").text('获取验证码').removeClass('weui-btn_disabled');
                            }
                            else {
                                $("#btn_vcode").text(time + "秒后重发");
                            }
                        }, 1000);
                    },
                    error: function () {
//                        $.alert('error');
                    },
                    complete: function () {
                        $.hideLoading()
                    }
                });
            });
        });
    </script>
@endsection