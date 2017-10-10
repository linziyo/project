{!! Form::open(array('action'=>'Admin\\CommunityHospitalController@store', 'method'=>'post','class'=>'createForm','enctype'=>'multipart/form-data')) !!}
    <input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加社区医院信息</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('name', '社区医院名称', ['class'=>'control-label']) !!}
            {!! Form::text('name', '', ['id'=>'name','class'=>'form-control','placeholder'=>'社区医院名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('phone_number', '电话', ['class'=>'control-label']) !!}
            {!! Form::text('phone_number', '', ['id'=>'phone_number','class'=>'form-control','placeholder'=>'电话']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('address', '地址', ['class'=>'control-label']) !!}
            {!! Form::text('address', '', ['id'=>'address','class'=>'form-control','placeholder'=>'地址']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('image', '门店图片', ['class'=>'control-label']) !!}
            {!! Form::file('image',['id'=>'image','class'=>'form-control','placeholder'=>'门店图片']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('contract', '甲乙合同', ['class'=>'control-label']) !!}
            {!! Form::file('contract',['id'=>'contract','class'=>'form-control','placeholder'=>'甲乙合同']) !!}
            <span class="help-block"></span>
        </div>

    </div>
    <div class="modal-footer">
        <div class="modal-footer">
            {!! Form::button('关闭',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
            {!! Form::submit('保存', ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
{{ Form::close() }}

<script src="{{ asset('assets/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('laravalid/jquery.validate.laravalid.js') }}"></script>
<script type="text/javascript">
    $('.createForm').validate({onkeyup: false});
</script>