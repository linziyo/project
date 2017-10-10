<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css">
    <link rel="stylesheet" href="//cdn.bootcss.com/jquery-weui/1.0.1/css/jquery-weui.min.css">
    <link href="/css/wechat.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/assets/jqweuix/css/jqweuix.css') }}">
    @stack('css')
</head>
<body ontouchstart>
@yield('wechat_content')
<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
<script src="/js/template.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/swiper.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/city-picker.min.js"></script>
<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script type="text/javascript">
    $(function () {
        wx.config({
            debug: false,
            appId: 'wxc864d4ebc9f8b76c',
            timestamp: 1435136888,
            nonceStr: '8det8HQ8Q8DU9JZU',
            signature: 'e8fa333e849db46f24fb409fcd862fb45d11666c',
            jsApiList: ''
        });

        wx.ready(function () {
            alert('ready');
        });

        wx.error(function(){
            alert('error');
        });
    })
</script>
@stack('js')
</body>
</html>