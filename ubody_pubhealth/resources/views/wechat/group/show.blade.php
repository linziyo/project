@extends('wechat.layout')
@section('css')
@stop

@section('wechat_content')
    <div class="weui-panel">
        <div class="weui-panel__hd">团队介绍</div>
        <div class="weui-panel__bd">
            <div class="weui-media-box weui-media-box_appmsg">
                <div class="weui-media-box__hd">
                    <img class="weui-media-box__thumb" src="{{ url('/images/default_avatar.jpg') }}">
                </div>
                <div class="weui-media-box__bd">
                    <h4 class="weui-media-box__title">{{ $model->name }}</h4>
                    <p class="weui-media-box__desc">{{ $model->description }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="weui-cells__title">团队医生</div>
    <div class="weui-cells">
        @foreach($model->doctors as $doctor)
            <a class="weui-cell weui-cell_access" href="{{ URL::action('Wechat\DoctorController@show', $doctor->id) }}">
                <div class="weui-cell__hd">
                    <img src="/images/default_avatar.jpg" style="width:48px;height:48px"/>
                </div>
                <div class="weui-cell__bd">
                    <p>{{ $doctor->user->real_name }}</p>
                    <small>{{ $doctor->title }}</small>
                </div>
                <div class="weui-cell__ft">
                    <p>{{ $doctor->pivot->is_leader ? "队长" : ""}}</p>
                </div>
            </a>
        @endforeach
    </div>

    <div class="weui-btn-area">
        <a href="{{ URL::action('Wechat\ContractController@create', ['group_id' => $model->id]) }}"
           class="weui-btn weui-btn_primary">签约</a>
    </div>
@stop

@section('js')
@stop