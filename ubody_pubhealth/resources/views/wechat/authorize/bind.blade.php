<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="//res.wx.qq.com/open/libs/weui/1.1.2/weui.min.css" rel="stylesheet">
</head>
<body ontouchstart>
<!--页面切换必须要添加js_container-->
<div class="container js_container">
    <div class="page__bd">
        <form method="post" action="{{ URL::action('Wechat\AuthorizeController@bind') }}">
            <div class="weui-cells weui-cells_form">
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">账号</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="number" pattern="[0-9]*" placeholder="手机/邮箱/用户名">
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="password" pattern="[0-9]*" placeholder="请输入密码">
                    </div>
                </div>
                <div class="weui-cell weui-cell_vcode">
                    <div class="weui-cell__hd"><label class="weui-label">验证码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" placeholder="请输入验证码" maxlength="4">
                    </div>
                    <div class="weui-cell__ft">
                        <img id="vcode" src="{{ captcha_src() }}">
                    </div>
                </div>
            </div>
            <div class="weui-btn-area">
                <button type="submit" class="weui-btn weui-btn_primary">绑定</button>
            </div>
        </form>
    </div>
</div>
<!--页面切换-->
<script src="//weui.io/zepto.min.js"></script>
<script src="//res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#vcode").click(function () {
            $(this).attr('src', '{{ captcha_src() }}' + math.random());
        });
    })
</script>
</body>
</html>