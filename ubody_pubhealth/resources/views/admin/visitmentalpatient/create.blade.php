<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>严重精神障碍患者随访服务记录表</title>
		<link rel="stylesheet" type="text/css" href="../css/table.css"/>
		<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
	</head>

	<body>
	{!! Form::open(array('action'=>'Admin\\VisitMentalPatientsController@store', 'method'=>'post', 'class'=>'getForm','enctype'=>'multipart/form-data','style'=>'padding-bottom:60px')) !!}

			<div class="container">
				<h1>严重精神障碍患者随访服务记录表</h1>
				<input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">姓名</label>
					<div class="col-sm-10">
						{!! Form::text('name', '', ['id'=>'name','class'=>'form-control','placeholder'=>'请输入姓名']) !!}
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">监护人姓名</label>
					<div class="col-sm-10">
						<label>
							{!! Form::text('guardian_name', '', ['id'=>'guardian_name','class'=>'form-control','placeholder'=>'请输入监护人姓名']) !!}
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">和监护人关系</label>
					<div class="col-sm-10">
						<label>
							{!! Form::text('guardian_relationship', '', ['id'=>'guardian_relationship','class'=>'form-control','placeholder'=>'请输入监护人关系']) !!}
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">监护人住址</label>
					<div class="col-sm-10">
						<label>
							{!! Form::text('guardian_address', '', ['id'=>'guardian_address','class'=>'form-control','placeholder'=>'请输入监护人住址']) !!}
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">监护人电话</label>
					<div class="col-sm-10">
						<label>
							{!! Form::text('guardian_telephone', '', ['id'=>'guardian_telephone','class'=>'form-control','placeholder'=>'请输入监护人电话']) !!}
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">辖区村（居）委会联系人、电话</label>
					<div class="col-sm-10">
						<label>
							{!! Form::text('area_contact_person_info', '', ['id'=>'area_contact_person_info','class'=>'form-control','placeholder'=>'辖区村（居）委会联系人、电话']) !!}<br />
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">户口类型</label>
							<label class="label_color">
								@foreach(\App\Models\VisitMentalPatient::$account_type as $key=>$value)

									{!! Form::radio('account_type',$key),$value!!}
								@endforeach
							</label>
					<div class="clear"></div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">就业情况</label>
					<div class="col-sm-10">
						<label>
							@foreach(\App\Models\VisitMentalPatient::$employment_status as $key=>$value)

								{!! Form::radio('employment_status',$key),$value!!}
							@endforeach
						</label>
					</div>
					<div class="clear"></div>

				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">是否知情</label>
					<div class="col-sm-10">
						<label>
							@foreach(\App\Models\VisitMentalPatient::$knowing  as $key=>$value)

								{!! Form::radio('knowing',$key),$value!!}
							@endforeach
						</label>
					</div>
					<div class="clear"></div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">既往主要症状</label>
					<div class="col-sm-10">
						<label>
							{!! Form::text('symptom', '', ['id'=>'symptom','class'=>'form-control','placeholder'=>'以往发病主要症状', 'style'=>"width:200px"]) !!}
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">初次发病时间</label>
					<div class="col-sm-10">
						<label>
							{!! Form::date('first_time','') !!}

						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">既往主要症状</label>
					<div class="col-sm-10">
						<label>
							@foreach(\App\Models\VisitMentalPatient::$locked_type  as $key=>$value)

								{!! Form::radio('locked_type',$key),$value!!}
							@endforeach
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">既往治疗情况</label>
					<div class="col-sm-10">
						<label>
							{!! Form::text('treatment', '', ['id'=>'treatment','class'=>'form-control','placeholder'=>'既往治疗情况', 'style'=>"width:200px"]) !!}
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">目前诊断情况</label>
					<div class="col-sm-10">
						<label>
							{!! Form::text('diagnosis', '', ['id'=>'diagnosis','class'=>'form-control','placeholder'=>'目前诊断情况', 'style'=>"width:200px"]) !!}
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">治愈效果</label>
					<div class="col-sm-10">
						<label>

							@foreach(\App\Models\VisitMentalPatient::$last_treatment_effect  as $key=>$value)

								{!! Form::radio('last_treatment_effect',$key),$value!!}
							@endforeach
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">危险行为</label>
					<div class="col-sm-10">
						<label>
							{!! Form::text('behavior', '', ['id'=>'behavior','class'=>'form-control','placeholder'=>'目前诊断情况', 'style'=>"width:200px"]) !!}
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">经济状况</label>
					<div class="col-sm-10">
						<label>

							@foreach(\App\Models\VisitMentalPatient::$financial_condition as $key=>$value)

								{!! Form::radio('financial_condition',$key),$value!!}
							@endforeach
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">专科医生的意见</label>
					<div class="col-sm-10">
						<label>
							{!! Form::text('suggestion', '', ['id'=>'suggestion','class'=>'form-control','placeholder'=>'专科医生的意见', 'style'=>"width:200px"]) !!}
						</label>
					</div>
				</div>

				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">填表时间</label>
					<div class="col-sm-10">
						<label>
							{!! Form::date('form_at','') !!}

						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">医生签名</label>
					<div class="col-sm-10">
						<label>
							{!! Form::text('doctor_signature', '', ['id'=>'doctor_signature','class'=>'form-control','placeholder'=>'医生签名', 'style'=>"width:200px"]) !!}
						</label>
					</div>
				</div>


					{{--<div class="clear"></div>--}}
				</div>
	<div class="form-group">
		{!! Form::label('visited_at', '随访日期', ['class'=>'col-sm-2 control-label']) !!}
		{!! Form::date('visited_at','') !!}
		<span class="help-block"></span>
	</div>
		<div class="form-group">
			{!! Form::label('next_visited_at', '下次访视日期', ['class'=>'col-sm-2 control-label']) !!}
			{!! Form::date('next_visited_at','') !!}
			<span class="help-block"></span>
		</div>


			{{--</div>--}}
			</div>
	<div class="modal-footer">
		{!! Form::button('取消',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
		{!! Form::submit('提交', ['class'=>'btn btn-primary']) !!}
	</div>
	{{ Form::close() }}
	</body>

</html>
<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('assets/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('laravalid/jquery.validate.laravalid.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $('.getForm').validate({onkeyup: false});
    });
</script>
