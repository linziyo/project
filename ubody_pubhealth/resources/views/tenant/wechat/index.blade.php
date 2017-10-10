@extends('tenant.layout')

@section('content_header')
    <h1 class="page-header">微信授权</h1>
@stop

@section('content')
    <a href="{{ URL::action('Tenant\WechatController@auth') }}" class="btn btn-primary">微信授权</a>
@stop