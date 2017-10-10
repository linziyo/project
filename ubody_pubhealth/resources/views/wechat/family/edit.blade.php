@extends('wechat.layout')
@section('css')
@stop

@section('wechat_content')
    <form action="{{ URL::action('Wechat\FamilyController@update', $model->id) }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT"/>
        <div class="weui-cells__title">我的家人</div>
        <div class="weui-cells">
            <div class="weui-cell {{ isset($errors) && $errors->has('relationship') ? 'weui-cell_warn' : '' }}">
                <div class="weui-cell__hd"><label class="weui-label">关系 </label></div>
                <div class="weui-cell__bd">
                    <input id="relationship" name="relationship" type="text" class="weui-input" placeholder="和我的关系"
                           value="{{ isset($errors) && $errors->has('relationship') ? old('relationship') : $model->relationship  }}"/>
                </div>
                @if(isset($errors) && $errors->has('relationship'))
                    <div class="weui-cell__ft">
                        <i class="weui-icon-warn"></i>
                    </div>
                @endif
            </div>
            <div class="weui-cell {{ isset($errors) && $errors->has('name') ? 'weui-cell_warn' : '' }}">
                <div class="weui-cell__hd"><label class="weui-label">姓名</label></div>
                <div class="weui-cell__bd">
                    <input id="name" name="name" type="text" class="weui-input" placeholder="请输入姓名"
                           value="{{ isset($errors) && $errors->has('name') ? old('name')  : $model->name }}"/>
                </div>
                @if(isset($errors) && $errors->has('name'))
                    <div class="weui-cell__ft">
                        <i class="weui-icon-warn"></i>
                    </div>
                @endif
            </div>
            <div class="weui-cell {{ isset($errors) && $errors->has('mobile') ? 'weui-cell_warn' : '' }}">
                <div class="weui-cell__hd"><label class="weui-label">手机</label></div>
                <div class="weui-cell__bd">
                    <input id="mobile" name="mobile" type="number" class="weui-input" placeholder="请输入手机号码"
                           value="{{ isset($errors) && $errors->has('mobile') ? old('mobile') : $model->mobile }}"/>
                </div>
                @if(isset($errors) && $errors->has('mobile'))
                    <div class="weui-cell__ft">
                        <i class="weui-icon-warn"></i>
                    </div>
                @endif
            </div>
        </div>
        <div class="weui-btn-area">
            <button type="submit" class="weui-btn weui-btn_primary">保存</button>
        </div>
    </form>
@stop

@section('js')
@stop