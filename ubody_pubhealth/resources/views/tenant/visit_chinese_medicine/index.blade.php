@extends('tenant.layout')
@push('css')
<link rel="stylesheet" href="/css/table.css">
@endpush
@section('content_header')
    <h1>老年人中医药健康管理服务记录表</h1>
@stop
@section('content')
    <div class="box box-primary" style="overflow: hidden;">
    	<form class="form-horizontal" id="form" style="padding-bottom:60px;" action="{{ URL::action('Tenant\VisitChineseMedicineController@store') }}" method="post">
			<input type="hidden" name="archive_id" value="{{ request('archive_id') }}"/>
			<div class="container">
			@include('tenant.visit_chinese_medicine.form')
			<div class="box-footer">
                <div class="form-actions col-sm-10 col-sm-offset-2">
                    <input type="submit" value="提交" class="btn btn-primary"/>
                    <a href="{{ URL::action('Tenant\ArchiveController@show',['archive_id'=>request('archive_id')]) }}" class="btn btn-default">返回</a>
                </div>
            </div>
           
			</div>
		</form>
    </div>


@stop

@section('js')


<script type="text/javascript">

	$(function(){
		$(".date").datepicker({
			'format': 'yyyy-mm-dd',
			'autoclose': true,
			'language': 'zh-CN'
		});
	})


	var type = ['qixu','yangxu','yinxu','tanshi','shire','xieyu','qiyu','tebing','pinghe'];
        $(function(){

			$('.radio_score label input').on('click',function(e){
				let divObj = $(this).parent().parent('div');
				$.each(type,function(index,value){
					let tag = value+'_choose';
					if(divObj.hasClass(tag)){
						score(value);
					}
				});
			})

		});

		function score(tag) {

			let chooseTag = '.'+tag+'_choose';
			let score = 0;
			$(chooseTag).find('input:radio:checked').each(function(){
				let value = $(this).val();
				if(tag == 'pinghe'){
					value = 6-parseInt(value);
				}
				score = score+parseInt(value);

			});
			let scoreTag = tag+'_score';
			$("input[name="+scoreTag+"]").val(score);
			let levelTag = tag+'_level';

			let totalScore = 0;
			if(tag == 'pinghe'){
				$.each(type,function(index,value){
					if(value != 'pinghe'){
						let tempTag = tag+'_score';
						totalScore = totalScore + parseInt($("input[name="+tempTag+"]").val());
					}
				});
				if(score >= 17 && totalScore <=8){
					$("input[name="+levelTag+"][value=1]").prop('checked',true);
				}else if(score>=17 && totalScore <= 10) {
					$("input[name="+levelTag+"][value=2]").prop('checked',true);
				}else {
					$("input[name="+levelTag+"][value=3]").prop('checked',true);
				}
			}else {
				if(score >= 11){
					$("input[name="+levelTag+"][value=1]").prop('checked',true);
				}else if(score>=9 && score <= 10) {
					$("input[name="+levelTag+"][value=2]").prop('checked',true);
				}else {
					$("input[name="+levelTag+"][value=3]").prop('checked',true);
				}
			}



		}
        </script>
@stop