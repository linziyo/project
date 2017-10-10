{!! Form::open(['action'=>['Tenant\\PackageController@update', $model->id], 'id'=>'update_package_form', 'method'=>'put']) !!}
{!! Form::hidden('community_hospital_id',(isset($input['community_hospital_id'])?$input['community_hospital_id']:0),['id'=>'community_hospital_id']) !!}
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">修改医生信息</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('name','服务包名称',['class'=>'control-label']) !!}
            {!! Form::text('name',$model->name,['id'=>'name','class'=>'form-control','placeholder'=>'服务包名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('character','人群性质',['class'=>'control-label']) !!}
            {!! Form::text('character',$model->character,['id'=>'character','class'=>'form-control','placeholder'=>'人群性质']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('requirement','基本需求',['class'=>'control-label']) !!}
            {!! Form::text('requirement',$model->requirement,['id'=>'requirement','class'=>'form-control','placeholder'=>'基本需求']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('management_objective','管理目标',['class'=>'control-label']) !!}
            {!! Form::text('management_objective',$model->management_objective,['id'=>'management_objective','class'=>'form-control','placeholder'=>'管理目标']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('price','建议价格',['class'=>'control-label']) !!}
            {!! Form::text('price',$model->price,['id'=>'price','class'=>'form-control','placeholder'=>'建议价格']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        {!! Form::button('关闭',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
        {!! Form::submit('保存', ['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
<script type="text/javascript">
    $('#update_package_form').validate({onkeyup: false});
</script>