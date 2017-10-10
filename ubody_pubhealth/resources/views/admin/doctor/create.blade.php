{!! Form::open(['action'=>'Admin\\DoctorController@store', 'id'=>'create_doctor_form','method'=>"post" , 'enctype'=>'multipart/form-data']) !!}
<input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
{{csrf_field()}}
{!! Form::hidden('user_id',null,['id'=>'user_id']) !!}
<div class=" modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">创建医生信息</h4>
</div>
<div class="modal-body">
    <div class="form-group">
        {!! Form::label('user_name', '医生手机号码', ['class'=>'control-label']) !!}
        <div class="input-group">
            {!! Form::text('mobile', '', ['id'=>'mobile','class'=>'form-control','placeholder'=>'医生手机号码']) !!}
            <span class="input-group-btn">
                {!! Form::button('搜索',['id'=>'btnSearch','class'=>'btn btn-info btn-flat','data-loading-text'=>'Loading...']) !!}
            </span>
        </div>
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('community_hospital_id', '社区医院', ['class'=>'control-label']) !!}<br />
        {!! Form::select('community_hospital_id',$list,null,['class'=>'form-control']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('avatar', '医生头像', ['class'=>'control-label']) !!}
        {!! Form::file('avatar', ['id'=>'avatar','class'=>'form-control','placeholder'=>'医生头像']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('duty', '职务', ['class'=>'control-label']) !!}
        {!! Form::text('duty', '', ['id'=>'duty','class'=>'form-control','placeholder'=>'职务']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('title', '职称', ['class'=>'control-label']) !!}
        {!! Form::text('title', '', ['id'=>'title','class'=>'form-control','placeholder'=>'职称']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('specialty', '专业', ['class'=>'control-label']) !!}
        {!! Form::text('specialty', '', ['id'=>'specialty','class'=>'form-control','placeholder'=>'专业']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('skills', '技能', ['class'=>'control-label']) !!}
        {!! Form::text('skills', '', ['id'=>'skills','class'=>'form-control','placeholder'=>'技能']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('working_time', '从业时间', ['class'=>'control-label']) !!}
        {!! Form::date('working_time', '', ['id'=>'working_time','class'=>'form-control ','placeholder'=>'从业时间']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('consult', '咨询时间', ['class'=>'control-label']) !!}
        {!! Form::date('consult', '', ['id'=>'consult','class'=>'form-control ','placeholder'=>'咨询时间']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('description', '医生介绍', ['class'=>'control-label']) !!}
        {!! Form::textarea('description', null, ['id'=>'description','class'=>'form-control','placeholder'=>'医生介绍']) !!}
        <span class="help-block"></span>
    </div>
</div>
<div class="modal-footer">
    {!! Form::button('关闭',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
    {!! Form::submit('保存', ['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
<script src="{{ asset('assets/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('laravalid/jquery.validate.laravalid.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $("#btnSearch").on('click', function () {
            var mobile = $('#mobile').val();
            if(!mobile)
            {
                alert('请输入手机号码');
            }else{
                var $btn = $(this).button('loading');
                var request_url = "{{URL::action('Admin\\DoctorController@create')}}";
                $.get(request_url, {'mobile': mobile}, function (data) {
                    $btn.button('reset');
                    if (data.success) {
                        $('#user_id').val(data.userid);
                        $("#btnSearch").parent().parent().parent().addClass('has-success');
                    }
                    else{
                        alert('请输入正确的手机号码');
                    }
                })};
        });

    });
    $('.form').validate({onkeyup: false});
</script>