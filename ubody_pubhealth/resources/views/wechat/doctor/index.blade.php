@extends('wechat.layout')
@section('css')
@stop

@section('wechat_content')
    @foreach($list as $model)
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">{{ $model->name }}</div>
            <div class="weui-panel__bd">
                @foreach($model->doctors as $doctor)
                    <a href="{{ URL::action('Wechat\DoctorController@show', $doctor->id) }}" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" src="{{ url('/images/default_avatar.jpg') }}">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">{{ $doctor->user->real_name }}</h4>
                            <p class="weui-media-box__desc">{{ $doctor->skills }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="weui-panel__ft">
                <a href="{{ URL::action('Wechat\GroupController@show', $model->id) }}" class="weui-cell weui-cell_access weui-cell_link">
                    <div class="weui-cell__bd">查看更多</div>
                    <span class="weui-cell__ft"></span>
                </a>
            </div>
        </div>
    @endforeach
@stop

@section('js')
@stop