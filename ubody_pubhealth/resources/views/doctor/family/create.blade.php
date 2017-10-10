@extends('doctor.layout')
@section('css')
    <link href="{{ url('/assets/jqweuix/css/jqweuix.css') }}" rel="stylesheet"/>
@stop

@section('wechat_content')
    <form action="{{ URL::action('Doctor\FamilyController@store') }}">
        <div class="weui-cells__title">添加家人</div>
        <div class="weui-cells weui-cells_form">
            <div class="weui-cell weui-cell_warn">
                <div class="weui-cell__hd"><label class="weui-label">称呼</label></div>
                <div class="weui-cell__bd">
                    <input type="text" class="weui-input" placeholder="请输入称呼"/>
                </div>
                <div class="weui-cell__ft"><i class="weui-icon-warn"></i></div>
            </div>
            <div class="weui-cell weui-cell_warn">
                <div class="weui-cell__hd"><label class="weui-label">姓名</label></div>
                <div class="weui-cell__bd">
                    <input type="text" class="weui-input" placeholder="请输入姓名"/>
                </div>
                <div class="weui-cell__ft"><i class="weui-icon-warn"></i></div>
            </div>
            <div class="weui-cell weui-cell_warn">
                <div class="weui-cell__hd"><label class="weui-label">身份证号码</label></div>
                <div class="weui-cell__bd">
                    <input type="text" class="weui-input" placeholder="请输入身份证号码"/>
                </div>
                <div class="weui-cell__ft"><i class="weui-icon-warn"></i></div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">手机号码</label></div>
                <div class="weui-cell__bd">
                    <input type="text" class="weui-input" placeholder="请输入手机号码"/>
                </div>
                <div class="weui-cell__ft"></div>
            </div>
        </div>

        <div class="weui-btn-area">
            <button type="submit" class="weui-btn weui-btn_primary">保存</button>
        </div>
    </form>
@stop

@push('js')
@endpush