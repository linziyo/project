<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>公共卫生服务管理系统 - 登录</title>
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

    </script>
    <style>
        #header {
            padding: 22px 0;
            height: 80px;
        }

        #logo {
            width: 1200px;
            margin: 0 auto;
            font-size: 32px;
        }

        #content {
            background-image: url(/images/bg.jpg);
        }

        #content .content-layout {
            width: 1200px;
            margin: 0 auto;
            overflow: hidden;
            position: relative;
            height: 770px;
            z-index: 999;
        }

        #login-box-wrapper {
            padding: 15px 15px 15px 15px;
            background-color: #fff;
            position: absolute;
            top: 120px;
            right: 60px;
            width: 350px;
        }

        #footer {
            margin: 60px auto 0;
        }
    </style>
</head>
<body>
<div id="header">
    <div id="logo">基本公共卫生服务管理系统</div>
</div>
<div id="content">
    <div class="content-layout">
        <div id="login-box-wrapper">
            <h1>登录</h1>
            <form class="form" role="form" method="POST" action="{{ url('/login') }}" autocomplete="off">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </div>
                        <input type="text" class="form-control" id="username" name="username"
                               placeholder="手机/身份证/用户名" value="{{ old('username') }}" autofocus/>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                        </div>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="密码"/>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">登录</button>
                </div>
                <div class="form-group">
                    <a href="{{ URL::action('Auth\ForgotPasswordController@showLinkRequestForm') }}">忘记密码</a>
                    <a href="{{ URL::action('Auth\RegisterController@showRegistrationForm') }}"
                       class="pull-right">免费注册</a>
                </div>
                @if ($errors->has('username'))
                    <div class="form-group has-error">
                        <span class="help-block">{{ $errors->first('username') }}</span>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
<div id="footer">
    @if(Config::get('app.debug'))
        <ul class="list-inline text-center">
            <li><a href="{{URL::action('Admin\HomeController@index')}}">管理端</a></li>
            <li><a href="{{URL::action('Tenant\HomeController@index')}}">租户端</a></li>
            <li><a href="{{URL::action('Wechat\HomeController@index')}}">微信端</a></li>
            <li><a href="{{URL::action('Doctor\HomeController@index')}}">医生端</a></li>
        </ul>
    @endif
    <ul class="list-inline text-center">
        <li><a href="http://www.miibeian.gov.cn/" target="_blank">粤ICP备12068998号-2</a></li>
        <li>技术支持：优云健康</li>
    </ul>
</div>

<script src="/js/app.js"></script>
</body>
</html>