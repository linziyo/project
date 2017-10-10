@extends('doctor.layout')

@section('wechat_content')
    <div class="weui-tab">
        @yield('content')
        <div class="weui-tabbar">
            <a href="{{ URL::action('Doctor\HomeController@index') }}" class="weui-tabbar__item weui-bar__item--on">
                {{--<span class="weui-badge" style="position: absolute;top: -.4em;right: 1em;">8</span>--}}
                <div class="weui-tabbar__icon">
                    <img src="http://jqweui.com/dist/demos/images/icon_nav_button.png" alt="">
                </div>
                <p class="weui-tabbar__label">首页</p>
            </a>

            <a href="{{ URL::action('Doctor\ArchiveController@index') }}" class="weui-tabbar__item">
                <div class="weui-tabbar__icon">
                    <img src="http://jqweui.com/dist/demos/images/icon_nav_article.png" alt="">
                </div>
                <p class="weui-tabbar__label">建档</p>
            </a>

            <a href="{{ URL::action('Doctor\HomeController@my') }}" class="weui-tabbar__item">
                <div class="weui-tabbar__icon">
                    <img src="http://jqweui.com/dist/demos/images/icon_nav_msg.png" alt="">
                </div>
                <p class="weui-tabbar__label">个人中心</p>
            </a>

        </div>
    </div>
@stop