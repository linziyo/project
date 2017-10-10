<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>优云智能健康管理系统</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="//cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/skins/skin-green.min.css')}} ">
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/css/tenant_common.css"/>
    <link rel="stylesheet" href="/css/jquery.toast.min.css"/>
    <link rel="stylesheet" href="/css/sweetalert.min.css"/>
    @stack('css')
    @yield('css')
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="{{ url('/tenant') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">优云健康</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">优云智能健康管理系统</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">{{ trans('adminlte::adminlte.toggle_navigation') }}</span>
            </a>
            {{--<ul class="nav navbar-nav">--}}
            {{--<li class="active"><a href="#">Link</a></li>--}}
            {{--<li><a href="#">Link</a></li>--}}
            {{--<li><a href="#">Link</a></li>--}}
            {{--</ul>--}}
            <form class="navbar-form navbar-left" action="{{ URL::action('Tenant\ArchiveController@index') }}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="档案编号/姓名/身份证/手机" autocomplete="off" name="q"
                           value="{{ isset($input["q"]) ? $input["q"] : ""}}"/>
                    <span class="input-group-btn">
                            <button class="btn btn-flat" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">

                <ul class="nav navbar-nav">
                    <li class="user user-menu">
                        <a href="{{ URL::action('Tenant\ProfileController@index') }}">
                            <img src="{{url('/images/default_avatar.jpg')}}" class="user-image"/>
                            <span class="hidden-xs"> {{ Auth::user()->real_name }} </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-fw fa-power-off"></i> 退出
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">控制台</li>
                <li class="{!! Route::currentRouteName() == '' ? 'active' : '' !!}">
                    <a href="{{ URL::action('Tenant\HomeController@index') }}">
                        <i class="fa fa-fw fa-home"></i> <span>首页</span>
                    </a>
                </li>
                @if(Entrust::hasRole('staff'))
                    <li class="{!! strpos(Route::currentRouteName(),'hospitals') === 0 ? 'active' : '' !!}">
                        <a href="{{ URL::action('Tenant\CommunityHospitalController@index') }}">
                            <i class="fa fa-fw fa-hospital-o "></i> <span>社区医院管理</span>
                        </a>
                    </li>
                    <li class="{!! strpos(Route::currentRouteName(),'users') === 0 ? 'active' : '' !!}">
                        <a href="{{ URL::action('Tenant\UserController@index') }}">
                            <i class="fa fa-fw fa-user"> </i> <span>用户管理</span>
                        </a>
                    </li>
                    <li class="{!! strpos(Route::currentRouteName(),'devices') === 0 ? 'active' : '' !!}">
                        <a href="{{ URL::action('Tenant\DeviceController@index') }}">
                            <i class="fa fa-fw fa-circle-o "></i> <span>设备管理</span>
                        </a>
                    </li>
                    <li class="{!! strpos(Route::currentRouteName(),'articles') === 0 ? 'active' : '' !!}">
                        <a href="{{ URL::action('Tenant\ArticleController@index') }}">
                            <i class="fa fa-fw fa-newspaper-o "></i> <span>文章管理</span>
                        </a>
                    </li>
                    <li class="{!! strpos(Route::currentRouteName(),'statistics') === 0 ? 'active' : '' !!}">
                        <a href="{{ URL::action('Tenant\ArchivesStatisticsController@index') }}" target="_blank">
                            <i class="fa fa-fw fa-file-o"></i> <span>管理统计</span>
                        </a>
                    </li>
                @endif
                @if(Entrust::hasRole('doctor'))
                    <li class="{!! strpos(Route::currentRouteName(),'archives') === 0 ? 'active' : '' !!}">
                        <a href="{{ URL::action('Tenant\ArchiveController@index') }}">
                            <i class="fa fa-fw fa-file-o"></i> <span>档案管理</span>
                        </a>
                    </li>
                @endif
                @if(Entrust::hasRole('staff'))
                    <li class="header">系统管理</li>
                    <li class="{!! strpos(Route::currentRouteName(),'weixin') === 0 ? 'active' : '' !!}">
                        <a href="{{ URL::action('Tenant\WechatController@index') }}">
                            <i class="fa fa-fw fa-wechat "></i> <span>微信管理</span>
                        </a>
                    </li>
                    <li class="{!! strpos(Route::currentRouteName(),'dataSynchronous') === 0 ? 'active' : '' !!}">
                        <a href="{{ URL::action('Tenant\DataSynchronousController@index') }}">
                            <i class="fa fa-fw fa-file-o"></i> <span>数据导入</span>
                        </a>
                    </li>
                    <li class="{!! strpos(Route::currentRouteName(),'auth-dispatch') === 0 ? 'active' : '' !!}">
                        <a href="{{ URL::action('Tenant\AuthDispatchController@index') }}">
                            <i class="fa fa-fw fa-code-fork"></i> <span>数据分发</span>
                        </a>
                    </li>
                @endif
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('content_header')
        </section>
        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
    </div>
    <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('vendor/adminlte/dist/js/app.min.js') }}"></script>
<script src="{{ asset('assets/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('laravalid/jquery.validate.laravalid.js') }}"></script>
<script src="{{ asset('assets/jquery-validation-1.14.0/lib/jquery.form.js') }}"></script>
<script src="//cdn.bootcss.com/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.zh-CN.min.js"></script>
<script src="/js/tenant_common.js"></script>
<script src="/js/jquery.toast.min.js"></script>
<script src="/js/bootbox.min.js"></script>
<script src="/js/sweetalert.min.js"></script>
@stack('js')
@yield('js')
</body>
</html>
