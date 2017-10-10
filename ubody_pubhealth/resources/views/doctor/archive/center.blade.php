@extends('doctor.tab')
@section('css')
@stop

@section('content')
    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__bd">
            <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                <div class="weui-media-box__hd">
                    <img class="weui-media-box__thumb" src="{{ url('/images/default_avatar.jpg') }}">
                </div>
                <div class="weui-media-box__bd">
                    <h4 class="weui-media-box__title">{{ $model->real_name?:$model->name }}</h4>
                    <p class="weui-media-box__desc">手机号：{{ $model->mobile?:'无' }}</p>
                    <p class="weui-media-box__desc">身份证：{{ $model->id_code?:'无' }}</p>
                </div>
            </a>
        </div>
    </div>

    <div class="weui-grids" style="margin-top: 16px">

        <a href="{{ URL::action('Doctor\UserController@showArchive',$model->id) }}" class="weui-grid js_grid">
            <div class="weui-grid__icon">
                <img src="http://jqweui.com/dist/demos/images/icon_nav_toast.png" alt="">
            </div>
            <p class="weui-grid__label">健康档案</p>
        </a>

        @if($model->status == 0)
            <a href="#" onclick="$.alert('请先建档');return false;" class="weui-grid js_grid">
                <div class="weui-grid__icon">
                    <img src="http://jqweui.com/dist/demos/images/icon_nav_msg.png" alt="">
                </div>
                <p class="weui-grid__label">签约</p>
            </a>
            @elseif($model->status == 1)
            <a href="{{ URL::action('Doctor\ContractController@show', ['id'=> $model->id]) }}"
               class="weui-grid js_grid">
                <div class="weui-grid__icon">
                    <img src="http://jqweui.com/dist/demos/images/icon_nav_msg.png" alt="">
                </div>
                <p class="weui-grid__label">签约</p>
            </a>
            @endif


        <a href="" class="weui-grid js_grid">
            <div class="weui-grid__icon">
                <img src="http://jqweui.com/dist/demos/images/icon_nav_article.png" alt="">
            </div>
            <p class="weui-grid__label">随访记录</p>
        </a>

        <a href="" class="weui-grid js_grid">
            <div class="weui-grid__icon">
                <img src="http://jqweui.com/dist/demos/images/icon_nav_article.png" alt="">
            </div>
            <p class="weui-grid__label">体检记录</p>
        </a>

        <a href="" class="weui-grid js_grid">
            <div class="weui-grid__icon">
                <img src="http://jqweui.com/dist/demos/images/icon_nav_progress.png" alt="">
            </div>
            <p class="weui-grid__label">转诊记录</p>
        </a>

        <a href="" class="weui-grid js_grid">
            <div class="weui-grid__icon">
                <img src="http://jqweui.com/dist/demos/images/icon_nav_button.png" alt="">
            </div>
            <p class="weui-grid__label">服务提醒</p>
        </a>
        <a href="" class="weui-grid js_grid">
            <div class="weui-grid__icon">
                <img src="http://jqweui.com/dist/demos/images/icon_nav_cell.png" alt="">
            </div>
            <p class="weui-grid__label">日程提醒</p>
        </a>

        <a href="{{ URL::action('Doctor\UserController@showFamily',$model->id) }}" class="weui-grid js_grid">
            <div class="weui-grid__icon">
                <img src="http://jqweui.com/dist/demos/images/icon_nav_toast.png" alt="">
            </div>
            <p class="weui-grid__label">家人</p>
        </a>
        <a href="" class="weui-grid js_grid">
            <div class="weui-grid__icon">
                <img src="http://jqweui.com/dist/demos/images/icon_nav_dialog.png" alt="">
            </div>
            <p class="weui-grid__label">接诊记录</p>
        </a>




    </div>

    <div class="weui-btn-area">
        <a href="href:{{ $model->mobile }}" class="weui-btn weui-btn_primary">拨打电话</a>
    </div>
@stop

@section('js')
@stop