<form class="form" action="{{URL::action('Admin\\TenantController@update', $model->id)}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT"/>
    {{csrf_field()}}
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">修改租户信息</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('name', '租户名称', ['class'=>'control-label']) !!}
            {!! Form::text('name', $model->name, ['id'=>'name','class'=>'form-control','placeholder'=>'租户名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('full_name', '租户全称', ['class'=>'control-label']) !!}
            {!! Form::text('full_name', $model->full_name, ['id'=>'full_name','class'=>'form-control','placeholder'=>'租户全称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('contact_name', '联系人姓名', ['class'=>'control-label']) !!}
            {!! Form::text('contact_name', $model->contact_name, ['id'=>'contact_name','class'=>'form-control','placeholder'=>'联系人姓名']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('phone_number', '电话', ['class'=>'control-label']) !!}
            {!! Form::text('phone_number', $model->phone_number, ['id'=>'phone_number','class'=>'form-control','placeholder'=>'电话']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>

<script src="{{ asset('assets/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('laravalid/jquery.validate.laravalid.js') }}"></script>
<script type="text/javascript">
    $('.form').validate({onkeyup: false});
</script>