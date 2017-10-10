
@push('css')
<link rel="stylesheet" href="/css/table.css">
@endpush
@section('content_header')
	<h1>老年人生活自理评估表</h1>
@stop
@section('content')
	<div class="box box-primary">
		<form class="getForm" action="{{URL::action('Tenant\\VisitSelfCareAbilityController@store')}}" method="post" enctype="multipart/form-data" style="padding-bottom:60px; overflow: hidden; margin-top: 10px;">
			<input type="hidden" name="archive_id" value="{{$archive_id}}">
			<div class="container">
				@include('tenant.visit_chinese_medicine.form')
				{{--@include('tenant.visit_selfcare_ability.form')--}}
				<div class="box-footer">

					<div class="form-actions col-sm-10 col-sm-offset-2">
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
        $('input').attr('disabled',true);

	</script>

@stop
<section class="content">
	@yield('content')
</section>
@stack('js')
@yield('js')























{{--@push('css')--}}
{{--<link rel="stylesheet" href="/css/table.css">--}}
{{--@endpush--}}
{{--@section('content_header')--}}
    {{--<h1>老年人中医药健康管理服务记录表</h1>--}}
{{--@stop--}}
{{--@section('content')--}}
    {{--<div class="box box-primary" style="overflow: hidden;">--}}
    	{{--<form class="form-horizontal" id="form" style="padding-bottom:60px;" action="{{ URL::action('Tenant\VisitChineseMedicineController@store') }}" method="post">--}}
			{{--<input type="hidden" name="archive_id" value="{{ $archive_id }}"/>--}}
			{{--<div class="container">--}}
			{{--@include('tenant.visit_chinese_medicine.form',['data'=>$data?:[]])--}}
			{{--<div class="box-footer">--}}
                {{--<div class="form-actions col-sm-10 col-sm-offset-2">--}}
                    {{--<a href="{{ URL::action('Tenant\ArchiveController@show',['archive_id'=>$archive_id]) }}" class="btn btn-default">返回</a>--}}
                {{--</div>--}}
            {{--</div>--}}

			{{--</div>--}}
		{{--</form>--}}
    {{--</div>--}}


{{--@stop--}}

{{--@section('js')--}}
	{{--<section class="content">--}}
		{{--@yield('content')--}}
	{{--</section>--}}
	{{--@stack('js')--}}
	{{--@yield('js')--}}

{{--<script type="text/javascript">--}}
	{{--$(function(){--}}
		{{--$('input').attr('disabled',true);--}}
	{{--})--}}
        {{--</script>--}}
{{--@stop--}}