@extends('wechat.layout')
@section('css')
@stop

@section('wechat_content')
    <div class="weui-cells__title">{{ $model->relationship }}</div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd"><p>姓名</p></div>
            <div class="weui-cell__ft">{{ $model->name }}</div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__bd"><p>手机</p></div>
            <div class="weui-cell__ft">{{ $model->mobile }}</div>
        </div>
    </div>
    <div class="weui-flex">
        <div class="weui-flex__item">
            <div class="weui-btn-area">
                <a href="{{ URL::action('Wechat\FamilyController@edit', $model->id) }}"
                   class="weui-btn weui-btn_primary">修改</a>
            </div>
        </div>
        <div class="weui-flex__item">
            <div class="weui-btn-area">
                <form method="post" action="{{ URL::action('Wechat\FamilyController@destroy', $model->id) }}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="delete"/>
                    <button href="{{ URL::action('Wechat\FamilyController@destroy', $model->id) }}"
                            class="weui-btn weui-btn_warn">删除
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
@stop