{!! Form::open(['action'=>['Tenant\\UserController@update', $model->id], 'method'=>'put', 'id'=>'update_user_form', 'enctype'=>'multipart/form-data']) !!}
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">修改用户信息</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('name', '用户名', ['class'=>'control-label']) !!}
            {!! Form::text('name', $model->name, ['id'=>'name','class'=>'form-control','placeholder'=>'用户名']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('password', '密码', ['class'=>'control-label']) !!}
            {!! Form::text('password', $model->password, ['id'=>'password','class'=>'form-control','placeholder'=>'密码']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('email', '邮箱', ['class'=>'control-label']) !!}
            {!! Form::text('email', $model->email, ['id'=>'email','class'=>'form-control','placeholder'=>'邮箱']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('mobile', '手机号码', ['class'=>'control-label']) !!}
            {!! Form::text('mobile', $model->mobile, ['id'=>'mobile','class'=>'form-control','placeholder'=>'手机号码']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('real_name', '名称', ['class'=>'control-label']) !!}
            {!! Form::text('real_name', $model->real_name, ['id'=>'real_name','class'=>'form-control','placeholder'=>'名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('id_code', '身份证', ['class'=>'control-label']) !!}
            {!! Form::text('id_code', $model->id_code, ['id'=>'id_code','class'=>'form-control','placeholder'=>'身份证']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('avatar', '头像', ['class'=>'control-label']) !!}
            {!! Form::file('avatar', ['id'=>'avatar','class'=>'form-control','placeholder'=>'头像']) !!}
            <span class="help-block">
                <img src="{{ Storage::url($model->avatar) }}" style="width:75px;height:75px"/>
            </span>
        </div>
        <div class="form-group">
            {!! Form::label('sex', '性别', ['class'=>'control-label']) !!}
            {{ Form::radio('sex', 1, ($model->sex == 1)) }}男
            {{ Form::radio('sex', 2, ($model->sex == 2)) }}女
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('date_of_birth', '出生年月', ['class'=>'control-label']) !!}
            {!! Form::text('date_of_birth', $model->date_of_birth, ['id'=>'date_of_birth','class'=>'form-control datepicker','placeholder'=>'出生年月']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        {!! Form::button('关闭',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
        {!! Form::submit('保存', ['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
<script type="text/javascript">
    $(function(){
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            language: 'zh-CN'
        });
    });
    $('#update_user_form').validate({onkeyup: false});
</script>