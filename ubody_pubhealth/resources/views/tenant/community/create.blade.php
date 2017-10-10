{!! Form::open(['action'=>'Tenant\\CommunityController@store', 'method'=>'post', 'id'=>'create_community_form', 'enctype'=>'multipart/form-data']) !!}
{!! Form::hidden('community_hospital_id',(isset($input['community_hospital_id'])?$input['community_hospital_id']:0),['id'=>'community_hospital_id']) !!}
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">编辑社区列表</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('name', '名称', ['class'=>'control-label']) !!}
            {!! Form::text('name', '', ['id'=>'name','class'=>'form-control','placeholder'=>'名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('code', '社区编码', ['class'=>'control-label']) !!}
            {!! Form::text('code', '', ['id'=>'code','class'=>'form-control','placeholder'=>'社区编码']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('population', '辖区人口数', ['class'=>'control-label']) !!}
            {!! Form::text('population', '', ['id'=>'population','class'=>'form-control','placeholder'=>'辖区人口数']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('address', '地址', ['class'=>'control-label']) !!}
            {!! Form::text('address', '', ['id'=>'address','class'=>'form-control','placeholder'=>'地址']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('telephone', '联系电话', ['class'=>'control-label']) !!}
            {!! Form::text('telephone', '', ['id'=>'telephone','class'=>'form-control','placeholder'=>'联系电话']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        {!! Form::button('关闭',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
        {!! Form::submit('保存', ['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
<script type="text/javascript">
    $('#create_community_form').validate({onkeyup: false});
</script>