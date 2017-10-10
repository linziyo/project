{!! Form::open(array('action'=>'Admin\\ArchiveController@store', 'method'=>'post', 'class'=>'getForm','enctype'=>'multipart/form-data')) !!}

<div class=" modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">建档</h4>
</div>
<input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
<div class="modal-body">
    <div class="form-group">
        {!! Form::label('code', '编码', ['class'=>'control-label']) !!}
        {!! Form::text('code', '', ['id'=>'code','class'=>'form-control','placeholder'=>'编码']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('real_name', '真实姓名', ['class'=>'control-label']) !!}
        {!! Form::text('real_name', '', ['id'=>'real_name','class'=>'form-control','placeholder'=>'真实姓名']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        <label class="control-label" for="name">所属机构</label><br>
        {!!  Form::select('organization_id',$list,null,['class'=>'form-control'])!!}
        <span class="help-block"></span>
    </div>

    <div class="form-group">
        {!! Form::label('sex', '性别', ['class'=>'control-label']) !!}
        {!! Form::text('sex', '', ['id'=>'sex','class'=>'form-control','placeholder'=>'性别']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('birthday', '生日', ['class'=>'control-label']) !!}
        {!! Form::text('birthday', '', ['id'=>'birthday','class'=>'form-control','placeholder'=>'生日']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('id_code', 'id编码', ['class'=>'control-label']) !!}
        {!! Form::text('id_code', '', ['id'=>'id_code','class'=>'form-control','placeholder'=>'id编码']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('work_unit', '工作地点', ['class'=>'control-label']) !!}
        {!! Form::text('work_unit', '', ['id'=>'work_unit','class'=>'form-control','placeholder'=>'工作地点']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('mobile', '电话', ['class'=>'control-label']) !!}
        {!! Form::text('mobile', '', ['id'=>'mobile','class'=>'form-control','placeholder'=>'电话']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('contact_moblie', '紧急联系人电话', ['class'=>'control-label']) !!}
        {!! Form::text('contact_moblie', '', ['id'=>'contact_moblie','class'=>'form-control','placeholder'=>'紧急联系人电话']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('nation', '国籍', ['class'=>'control-label']) !!}
        {!! Form::text('nation', '', ['id'=>'nation','class'=>'form-control','placeholder'=>'国籍']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('blood_group', '血型', ['class'=>'control-label']) !!}
        {!! Form::select('blood_group',\App\Models\Archive::$bloodGroups,null,['class'=>'form-control'],['id'=>'blood_group'])!!}</br>
        <span class="help-block"></span>
    </div>

    <div class="form-group">
        {!! Form::label('nation', '血型种类', ['class'=>'control-label']) !!}
        {!! Form::select('blood_group_rh',\App\Models\Archive::$bloodGroupRHs,null,['class'=>'form-control'],['id'=>'blood_group_rh'])!!}
    </div>


    <div class="form-group">
        {!! Form::label('nation', '最高学历', ['class'=>'control-label']) !!}</br>
        {!! Form::select('education',\App\Models\Archive::$educations,null,['class'=>'form-control'],['id'=>'education'])!!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('nation', '工作单位', ['class'=>'control-label']) !!}</br>
        {!! Form::select('job',\App\Models\Archive::$jobs,null,['class'=>'form-control'],['id'=>'job'])!!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('nation', '婚姻状况', ['class'=>'control-label']) !!}</br>
        {!! Form::select('marital_status',\App\Models\Archive::$maritalStatus,null,['class'=>'form-control'],['id'=>'marital_status'])!!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('address', '居住地', ['class'=>'control-label']) !!}
        {!! Form::text('address', '', ['id'=>'name','class'=>'form-control','placeholder'=>'address']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('phone_number', '电话号码', ['class'=>'control-label']) !!}
        {!! Form::text('phone_number', '', ['id'=>'phone_number','class'=>'form-control','placeholder'=>'电话号码']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::label('description', '描述', ['class'=>'control-label']) !!}
        {!! Form::text('description', '', ['id'=>'description','class'=>'form-control','placeholder'=>'描述']) !!}
        <span class="help-block"></span>
    </div>

</div>
<div class="modal-footer">
    {!! Form::button('取消建档',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
    {!! Form::submit('建立档案', ['class'=>'btn btn-primary']) !!}
</div>
{{ Form::close() }}
<script src="{{ asset('assets/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('laravalid/jquery.validate.laravalid.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $('.getForm').validate({onkeyup: false});
    });
</script>