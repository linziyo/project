@extends('wechat.layout')
@section('css')
@stop

@section('wechat_content')
    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__hd">预约医生</div>
        <div class="weui-panel__bd">
            <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                <div class="weui-media-box__hd">
                    <img class="weui-media-box__thumb" src="{{ url('/images/default_avatar.jpg') }}">
                </div>
                <div class="weui-media-box__bd">
                    <h4 class="weui-media-box__title">标题一</h4>
                    <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                </div>
            </a>
        </div>
    </div>

    <div class="weui-cells__title">可预约时间</div>
    <div class="weui-cells weui-cells_radio">
        <label class="weui-cell weui-check__label" for="x11">
            <div class="weui-cell__bd">
                <p>上午 8:00-8:30</p>
            </div>
            <div class="weui-cell__ft">
                <input type="radio" class="weui-check" name="radio1" id="x11">
                <span class="weui-icon-checked"></span>
            </div>
        </label>
        <label class="weui-cell weui-check__label" for="x12">
            <div class="weui-cell__bd">
                <p>上午 8:30-9:00</p>
            </div>
            <div class="weui-cell__ft">
                <input type="radio" name="radio1" class="weui-check" id="x12" checked="checked">
                <span class="weui-icon-checked"></span>
            </div>
        </label>
    </div>

    <div class="weui-btn-area">
        <button type="submit" class="weui-btn weui-btn_primary">预约</button>
    </div>
@stop

@section('js')
@stop