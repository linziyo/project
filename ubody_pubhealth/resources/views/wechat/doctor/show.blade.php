@extends('wechat.layout')
@section('css')
@stop

@section('wechat_content')
    <div class="weui-cells__title">医生信息</div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">姓名</div>
            <div class="weui-cell__ft">{{ $model->user->real_name }}</div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__bd">职务</div>
            <div class="weui-cell__ft">{{ $model->duty }}</div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__bd">职称</div>
            <div class="weui-cell__ft">{{ $model->title }}</div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__bd">技能</div>
            <div class="weui-cell__ft">{{ $model->skills }}</div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__bd">从业时间</div>
            <div class="weui-cell__ft">{{ $model->working_time }}</div>
        </div>
    </div>

    <div class="weui-cells__title">专业</div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">{{ empty($model->specialty)? '医生太懒，暂无介绍' : $model->specialty }}</div>
        </div>
    </div>

    <div class="weui-cells__title">医生简介</div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">{{ empty($model->description)? '医生太懒，暂无介绍' : $model->description }}</div>
        </div>
    </div>

    <div class="weui-flex">
        <div class="weui-flex__item">
            <div class="weui-btn-area">
                <a href="aaa" class="weui-btn weui-btn_primary">咨询</a>
            </div>
        </div>
        <div class="weui-flex__item">
            <div class="weui-btn-area">
                <a href="{{ URL::action('Wechat\AppointmentController@create') }}" class="weui-btn weui-btn_primary">预约</a>
            </div>
        </div>
    </div>
@stop

@section('js')
@stop