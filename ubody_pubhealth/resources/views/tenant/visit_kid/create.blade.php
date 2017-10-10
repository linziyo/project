@extends('tenant.layout')
@push('css')
<link rel="stylesheet" href="/css/table.css">
@endpush
@section('content_header')
    <h1>小儿访视记录表</h1>
@stop
@section('content')


    @include('tenant.visit_kid._form',['data'=>[],'actionUrl'=>URL::action('Tenant\VisitKidController@store'),'archive_id'=>$archive_id,'showOnly' => false])

@stop

@section('js')

@stop