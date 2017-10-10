@extends('tenant.layout')
@push('css')
<link rel="stylesheet" href="/css/table.css">
@endpush
@section('content_header')
    <h1>老年人生活自理评估表</h1>
@stop
@section('content')
    <div class="box box-primary">
        <form class="getForm" action="{{URL::action('Tenant\\VisitSelfCareAbilityController@store')}}" method="post" enctype="multipart/form-data" style="padding-bottom:60px; overflow: hidden; margin-top: 10px;">
            <input type="hidden" name="archive_id" value="{{$input['archive_id']}}">
			<div class="container">				

				<div class="box-footer">
                <div class="form-actions col-sm-10 col-sm-offset-2">
                    <input type="submit" value="提交" class="btn btn-primary">
                    <a  href="javascript:void(history.back())" class="btn btn-default">返回</a>
                </div>
                </div>
			</div>
			
		</form>
        <div class="box-footer">
        </div>
    </div>


@stop

@section('js')
    <script type="text/javascript">


    </script>

@stop