{!! Form::open(['action'=>['Tenant\\DoctorController@update',$model->id], 'method'=>'put', 'id'=>'update_doctor_form', 'enctype'=>'multipart/form-data']) !!}
    {!! Form::hidden('community_hospital_id',(isset($input['community_hospital_id'])?$input['community_hospital_id']:0),['id'=>'community_hospital_id']) !!}
    {!! Form::hidden('user_id',$model->user_id,['id'=>'user_id']) !!}
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">修改医生信息</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('avatar', '医生头像', ['class'=>'control-label']) !!}
            {!! Form::file('avatar', ['id'=>'avatar','class'=>'form-control','placeholder'=>'医生头像']) !!}
            <span class="help-block">
                <img src="{{ Storage::url($model->avatar) }}" style="width:75px;height:75px"/>
            </span>
        </div>
        <div class="form-group">
            {!! Form::label('duty', '职务', ['class'=>'control-label']) !!}
            {!! Form::text('duty', $model->duty, ['id'=>'avatar','class'=>'form-control','placeholder'=>'职务']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('title', '职称', ['class'=>'control-label']) !!}
            {!! Form::text('title', $model->title, ['id'=>'title','class'=>'form-control','placeholder'=>'职称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('specialty', '专业', ['class'=>'control-label']) !!}
            {!! Form::text('specialty', $model->specialty, ['id'=>'specialty','class'=>'form-control','placeholder'=>'专业']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('skills', '技能', ['class'=>'control-label']) !!}
            {!! Form::text('skills', $model->skills, ['id'=>'skills','class'=>'form-control','placeholder'=>'技能']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group date">
            {!! Form::label('working_time', '从业时间', ['class'=>'control-label']) !!}
            {!! Form::text('working_time', $model->working_time, ['id'=>'working_time','class'=>'form-control datepicker','placeholder'=>'从业时间']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('consult', '咨询时间', ['class'=>'control-label']) !!}
            {!! Form::text('consult', $model->consult, ['id'=>'consult','class'=>'form-control datepicker','placeholder'=>'咨询时间']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('description', '医生介绍', ['class'=>'control-label']) !!}
            {!! Form::textarea('description', $model->description, ['id'=>'description','class'=>'form-control','placeholder'=>'医生介绍','rows'=>3]) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        {!! Form::button('关闭',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
        {!! Form::submit('保存', ['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
<script type="text/javascript">
    $(function () {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            language: 'zh-CN'
        });
    });
    $('#update_doctor_form').validate({onkeyup: false});
</script>