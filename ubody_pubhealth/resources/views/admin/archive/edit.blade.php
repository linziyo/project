<form class="getForm" action="{{URL::action('Admin\\ArchiveController@update', $model->id)}}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT"/>
    <input type="hidden" name="tenant_id" value="{{$model["tenant_id"]}}"/>
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">档案编辑</h4>
    </div>
    <div class="modal-body">

        <div class="form-group">
            {!! Form::label('code', '编码', ['class'=>'control-label']) !!}
            {!! Form::text('code',$model->code, ['id'=>'code','class'=>'form-control','placeholder'=>'编码']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('real_name', '真实姓名', ['class'=>'control-label']) !!}
            {!! Form::text('real_name',$model->real_name, ['id'=>'realname','class'=>'form-control','placeholder'=>'真实姓名']) !!}
            <span class="help-block"></span>
        </div>

        <div class="form-group">
            {!! Form::label('birthday', '生日', ['class'=>'control-label']) !!}
            {!! Form::text('birthday',$model->birthday, ['id'=>'birthday','class'=>'form-control','placeholder'=>'生日']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('id_code', 'id编码', ['class'=>'control-label']) !!}
            {!! Form::text('id_code',$model->id_code, ['id'=>'name','class'=>'form-control','placeholder'=>'id编码']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('work_unit', '工作地点', ['class'=>'control-label']) !!}
            {!! Form::text('work_unit', $model->work_unit, ['id'=>'name','class'=>'form-control','placeholder'=>'工作地点']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('mobile', '电话', ['class'=>'control-label']) !!}
            {!! Form::text('mobile', $model->mobile, ['id'=>'name','class'=>'form-control','placeholder'=>'电话']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('contact_moblie', '紧急联系人电话', ['class'=>'control-label']) !!}
            {!! Form::text('contact_moblie',$model->contact_moblie, ['id'=>'name','class'=>'form-control','placeholder'=>'名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('nation', '国籍', ['class'=>'control-label']) !!}
            {!! Form::text('nation', $model->nation, ['id'=>'name','class'=>'form-control','placeholder'=>'名称']) !!}
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
    $(function(){
        $('.getForm').validate({onkeyup: false});
    });
</script>