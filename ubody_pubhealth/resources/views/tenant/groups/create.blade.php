{!! Form::open(['action'=>'Tenant\\GroupController@store', 'id'=>'create_group_form']) !!}
    {!! Form::hidden('community_hospital_id',(isset($input['community_hospital_id'])?$input['community_hospital_id']:0),['id'=>'community_hospital_id']) !!}
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">创建医组信息</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('name', '医组名称', ['class'=>'control-label']) !!}
            {!! Form::text('name', '', ['id'=>'name','class'=>'form-control','placeholder'=>'医组名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('description', '医组介绍', ['class'=>'control-label']) !!}
            {!! Form::textarea('description', null, ['id'=>'description','class'=>'form-control','placeholder'=>'医组介绍']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        {!! Form::button('关闭',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
        {!! Form::submit('保存', ['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
<script type="text/javascript">
    $('#create_group_form').validate({onkeyup: false});
</script>