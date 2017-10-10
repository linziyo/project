@extends('tenant.layout')
@push('css')
<link rel="stylesheet" href="/css/table.css">
@endpush
@section('content_header')
    <h1>小儿访视记录表</h1>
@stop
@section('content')
    <div class="box box-primary">
    	<form class="form-horizontal" id="formArchive" style="padding-bottom:60px;">
				@include('tenant.visit_kid._form')
				<div class="box-footer">
                  <div class="form-actions col-sm-10 col-sm-offset-2">
                    <input type="submit" value="提交" class="btn btn-primary">
                    <a href="http://1.publichealth.ubody.local.net:8080/tenant/archives" class="btn btn-default">返回</a>
                  </div>
            </div>
		</form>
    </div>
    <div class="modal fade" id="ajax">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
@stop

@section('js')



@stop