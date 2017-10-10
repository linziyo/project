<form class="getForm" action="{{URL::action('Admin\\UserController@store')}}" method="post">
    <div class=" modal-header">
        <input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加 用户</h4>
    </div>
    <div class="modal-body">

    <div class="form-group">
        {!! Form::label('name', '用户名', ['class'=>'control-label']) !!}
        {!! Form::text('name', '', ['id'=>'name','class'=>'form-control','placeholder'=>'名称']) !!}
        <span class="help-block"></span>
    </div>
        <div class="form-group">
            <label class="control-label" for="name">密码</label></br>
            <input type="password" name="password" class="form-control"/>
            <span class="help-block"></span>
        </div>

    <div class="form-group">
        {!! Form::label('mobile', '手机', ['class'=>'control-label']) !!}
        {!! Form::text('mobile', '', ['id'=>'mobile','class'=>'form-control','placeholder'=>'名称']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('email', '邮箱', ['class'=>'control-label']) !!}
        {!! Form::text('email', '', ['id'=>'email','class'=>'form-control','placeholder'=>'名称']) !!}
        <span class="help-block"></span>
    </div>
        <div class="form-group">
            {!! Form::label('address', '地址', ['class'=>'control-label']) !!}
            {!! Form::text('address', '', ['id'=>'address','class'=>'form-control','placeholder'=>'名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('real_name', '真实姓名', ['class'=>'control-label']) !!}
            {!! Form::text('real_name', '', ['id'=>'real_name','class'=>'form-control','placeholder'=>'名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('id_code', '身份证号码', ['class'=>'control-label']) !!}</br>
            {!! Form::text('id_code', '', ['id'=>'id_code','class'=>'form-control','placeholder'=>'身份证号码']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('avatar', '头像', ['class'=>'control-label']) !!}
            {!! Form::file('avatar', ['id'=>'avatar','class'=>'form-control','placeholder'=>'头像']) !!}
            <span class="help-block"></span>
        </div>

        <div class="form-group">
            {!! Form::label('date_of_birth', '出生日期', ['class'=>'control-label']) !!}
            {!! Form::date('date_of_birth', '', ['id'=>'date_of_birth','class'=>'form-control ','placeholder'=>'咨询时间']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('sex', '性别', ['class'=>'control-label']) !!}</br>
            {!! Form::select('sex',\App\Models\User::$sex,['class'=>'form-control'],['id'=>'sex'])!!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        {!! Form::button('关闭',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
        {!! Form::submit('保存', ['class'=>'btn btn-primary']) !!}
    </div>
    </form>
<script src="{{ asset('assets/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('laravalid/jquery.validate.laravalid.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $('.getForm').validate({onkeyup: false});
    });
</script>