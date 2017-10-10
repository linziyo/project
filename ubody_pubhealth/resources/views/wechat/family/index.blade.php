@extends('wechat.layout')
@section('css')
@stop

@section('wechat_content')
    <div class="weui-cells__title">我的家人</div>
    <div class="weui-cells">
        @foreach($list as $model)
            <a href="{{ URL::action('Wechat\FamilyController@show', $model->id) }}" class="weui-cell weui-cell_access">
                <div class="weui-cell__bd"><p>{{ $model->relationship }}</p></div>
                <div class="weui-cell__ft"><p>{{ $model->name }}</p></div>
            </a>
        @endforeach
    </div>
    <div class="weui-btn-area">
        <a href="{{ URL::action('Wechat\FamilyController@create') }}" class="weui-btn weui-btn_primary">添加家人</a>
    </div>
@stop

@section('js')
@stop