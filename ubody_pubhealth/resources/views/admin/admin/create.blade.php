<form class="form" action="{{URL::action('Admin\\AdminController@store')}}" method="post" enctype="multipart/form-data">
    {{--<input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>--}}
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加管理员</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('name', '用户名', ['class'=>'control-label']) !!}
            {!! Form::text('name', '', ['id'=>'name','class'=>'form-control','placeholder'=>'用户名']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('community_id', '所属机构111', ['class'=>'control-label']) !!}<br />
            {!! Form::select('community_id', $list ,null,['class'=>"form-control"]) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('password', '密码', ['class'=>'control-label']) !!}
            {!! Form::text('password', '', ['id'=>'name','class'=>'form-control','placeholder'=>'密码']) !!}
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
    $('.form').validate({onkeyup: false});
</script>