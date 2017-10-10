@extends('wechat.layout')

@section('wechat_content')
    <div class="weui-tab">
        @yield('content')

        <div class="weui-tabbar">
            <a href="#tab1" class="weui-tabbar__item weui-bar__item--on">
                <span class="weui-badge" style="position: absolute;top: -.4em;right: 1em;">8</span>
                <div class="weui-tabbar__icon">
                    <img src="http://jqweui.com/dist/demos/images/icon_nav_button.png" alt="">
                </div>
                <p class="weui-tabbar__label">首页</p>
            </a>
            <a href="#tab2" class="weui-tabbar__item">
                <div class="weui-tabbar__icon">
                    <img src="http://jqweui.com/dist/demos/images/icon_nav_msg.png" alt="">
                </div>
                <p class="weui-tabbar__label">健康档案</p>
            </a>
            <a href="#tab3" class="weui-tabbar__item">
                <div class="weui-tabbar__icon">
                    <img src="http://jqweui.com/dist/demos/images/icon_nav_article.png" alt="">
                </div>
                <p class="weui-tabbar__label">医生</p>
            </a>
            <a href="#tab4" class="weui-tabbar__item">
                <div class="weui-tabbar__icon">
                    <img src="http://jqweui.com/dist/demos/images/icon_nav_cell.png" alt="">
                </div>
                <p class="weui-tabbar__label">我</p>
            </a>
        </div>
    </div>

@stop