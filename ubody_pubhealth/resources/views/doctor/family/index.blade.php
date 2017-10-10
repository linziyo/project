@extends('doctor.layout')
@section('css')
    <link href="{{ url('/assets/jqweuix/css/jqweuix.css') }}" rel="stylesheet"/>
@stop

@section('wechat_content')
    <div class="weui-cells weui-cells_form">
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>父亲</p></div>
            <div class="weui-cell__ft">说明文字</div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>母亲</p></div>
            <div class="weui-cell__ft">说明文字</div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>岳父</p></div>
            <div class="weui-cell__ft">说明文字</div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>岳母</p></div>
            <div class="weui-cell__ft">说明文字</div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>爷爷</p></div>
            <div class="weui-cell__ft">说明文字</div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>奶奶</p></div>
            <div class="weui-cell__ft">说明文字</div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>外公</p></div>
            <div class="weui-cell__ft">说明文字</div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>外婆</p></div>
            <div class="weui-cell__ft">说明文字</div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>儿子</p></div>
            <div class="weui-cell__ft">说明文字</div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd"><p>女儿</p></div>
            <div class="weui-cell__ft">说明文字</div>
        </a>
    </div>

    <div class="weui-btn-area">
        <a href="{{ URL::action('Doctor\FamilyController@create') }}" class="weui-btn weui-btn_primary">添加家庭成员</a>
    </div>
@stop

@push('js')
@endpush