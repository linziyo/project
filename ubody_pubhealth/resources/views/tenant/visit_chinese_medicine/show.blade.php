@extends('tenant.layout')
@push('css')
<link rel="stylesheet" href="/css/table.css">
@endpush
@section('content_header')
    <h1>老年人中医药健康管理服务记录表</h1>
@stop
@section('content')
	@include('tenant.visit_chinese_medicine._form',['data'=>$data?$data:[],'actionUrl'=>'','archive_id'=>$archive_id,'showOnly' => true])

@stop

@section('js')

@stop