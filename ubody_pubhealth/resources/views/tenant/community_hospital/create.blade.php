{!! Form::open(array('action'=>'Tenant\\CommunityHospitalController@store', 'id'=>'create-hospitals-form', 'enctype'=>'multipart/form-data')) !!}
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加社区医院</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('name', '名称', ['class'=>'control-label']) !!}
            {!! Form::text('name', '', ['id'=>'name','class'=>'form-control','placeholder'=>'名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('address', '地址', ['class'=>'control-label']) !!}
            {!! Form::text('address', '', ['id'=>'address','class'=>'form-control','placeholder'=>'地址']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('phone_number', '联系电话', ['class'=>'control-label']) !!}
            {!! Form::text('phone_number', '', ['id'=>'phone_number','class'=>'form-control','placeholder'=>'联系电话']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('image', '门店图片', ['class'=>'control-label']) !!}
            {!! Form::file('image',array('id'=>'image','class'=>'form-control','placeholder'=>'门店图片')) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('contract', '家医合同', ['class'=>'control-label']) !!}
            {!! Form::file('contract',array('id'=>'contract','class'=>'form-control','placeholder'=>'家医合同')) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        {!! Form::button('关闭',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
        {!! Form::submit('保存', ['class'=>'btn btn-primary']) !!}
    </div>
{{ Form::close() }}
<script type="text/javascript">
    $('#create-hospitals-form').validate({onkeyup: false});
</script>
