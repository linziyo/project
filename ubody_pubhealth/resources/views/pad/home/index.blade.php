<html>
<head>
    <title>建档</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="//cdn.bootcss.com/weui/1.1.2/style/weui.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/jquery-weui/1.0.1/css/jquery-weui.min.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="bd">
        <div class="page__bd">
            <div class="weui-grids">
                <a href="{{ URL::action('Pad\ArchiveController@index') }}" class="weui-grid js_grid">
                    <div class="weui-grid__icon">
                        <img src="http://jqweui.com/dist/demos/images/icon_nav_button.png" alt="">
                    </div>
                    <p class="weui-grid__label">建档 </p>
                </a>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.bootcss.com/vue/2.4.1/vue.min.js"></script>
<script src="//cdn.bootcss.com/vue-resource/1.3.4/vue-resource.min.js"></script>
<script src="//cdn.bootcss.com/vue-router/2.7.0/vue-router.min.js"></script>
<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
<script>
    var vue = new Vue({
        el: "#app",
        data: {
            archives: []
        },
        created: function () {
            var accessToken = JSON.parse(window.localStorage.getItem('token'));

            if (accessToken) {
                window.localStorage.removeItem('token');
            }
            else {
                location.href = '{{ url('/login') }}';
            }
        },
        methods: {}
    });
</script>
</body>
</html>