<form class="form" action="{{URL::action('Admin\\PackageController@store' )}}" method="post">
    <input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加服务包</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('name', '名称', ['class'=>'control-label']) !!}
            {!! Form::text('name', '', ['id'=>'name','class'=>'form-control','placeholder'=>'名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('community_hospital_id', '所属机构', ['class'=>'control-label']) !!}<br />
            {!! Form::select('community_hospital_id',$list,null,['class'=>'form-control']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('character', '人群性质', ['class'=>'control-label']) !!}
            {!! Form::text('character', '', ['id'=>'character','class'=>'form-control','placeholder'=>'人群性质']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('requirement', '基本需求', ['class'=>'control-label']) !!}
            {!! Form::text('requirement', '', ['id'=>'requirement','class'=>'form-control','placeholder'=>'基本需求']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('management_objective', '管理目标', ['class'=>'control-label']) !!}
            {!! Form::text('management_objective', '', ['id'=>'management_objective','class'=>'form-control','placeholder'=>'管理目标']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('price', '建议价格', ['class'=>'control-label']) !!}
            {!! Form::text('price', '', ['id'=>'price','class'=>'form-control','placeholder'=>'建议价格']) !!}
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