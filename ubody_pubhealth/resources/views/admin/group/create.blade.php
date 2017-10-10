<form class="form" action="{{URL::action('Admin\\GroupController@store')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加医组</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('name', '名称', ['class'=>'control-label']) !!}
            {!! Form::text('name', '', ['id'=>'name','class'=>'form-control','placeholder'=>'名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('community_hospital_id', '选择机构', ['class'=>'control-label']) !!}
            {!! Form::select('community_hospital_id', $list,null,['class'=>'form-control']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="description">简介</label>
            <textarea name="description" class="form-control"></textarea>
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