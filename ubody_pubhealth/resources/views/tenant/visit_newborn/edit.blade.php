@extends('tenant.layout')
@push('css')
<link rel="stylesheet" href="/css/table.css">
@endpush
@section('content_header')
    <h1>新生儿家庭访视记录</h1>
@stop
@section('content')
    {{--<div class="box box-primary">--}}
        {{--<form class="form-horizontal"  action="{{ URL::action('Tenant\VisitNewbornController@update',['id'=>$data['visit_id']]) }}" method="post">--}}
            {{--<input type="hidden" name="archive_id" value="{{ $archive_id }}">--}}
            {{--<input type="hidden" name="_method" value="PUT"/>--}}
            {{--{{ csrf_field() }}--}}
            {{--@include('tenant.visit_newborn.form',['data'=>$data,'archive'=>$archive])--}}
            {{--<div class="box-footer">--}}
                {{--<div class="form-actions col-sm-10 col-sm-offset-2">--}}
                    {{--<input type="submit" value="提交" class="btn btn-primary">--}}
                    {{--<a href="history.back()" class="btn btn-default">返回</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</form>--}}
    {{--</div>--}}

    @include('tenant.visit_newborn._form',['data'=>$data?$data:[],'archive'=>$archive,'actionUrl'=>URL::action('Tenant\VisitNewbornController@update',['id'=>$data['visit_id']]),'archive_id'=>$archive_id,'showOnly' => false])


@stop

