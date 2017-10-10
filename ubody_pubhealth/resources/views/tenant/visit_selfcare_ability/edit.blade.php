@extends('tenant.layout')
@push('css')
<link rel="stylesheet" href="/css/table.css">
@endpush
@section('content_header')
    <h1>老年人生活自理评估表</h1>
@stop
@section('content')

    @include('tenant.visit_selfcare_ability._form',['data'=>$data?$data:[],'actionUrl'=>URL::action('Tenant\\VisitSelfCareAbilityController@update',['id'=>$data['visit_id']]),'archive_id'=>$archive_id,'showOnly' => false])


@stop

@section('js')

@stop