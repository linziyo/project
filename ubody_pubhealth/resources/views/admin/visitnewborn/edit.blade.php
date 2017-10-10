
<form class="getForm" action="{{URL::action('Admin\\VisitNewbornController@update', $model->id)}}" method="post">
{{--<form class="form" action="{{URL::action('Admin\\VisitNewbornController@update', $model->id)}}" method="post">--}}
    {{csrf_field()}}
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
    </div>

<input type="hidden" name="_method" value="PUT"/>
<input type="hidden" name="tenant_id" value="{{$model["tenant_id"]}}"/>
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label" for="name">父亲名字</label>
            {!! Form::text('father_name',$model->father_name,['id'=>'father_name','class'=>'form-control','placeholder'=>'请输入父亲姓名','style'=>"width:200px"]) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">父亲联系电话</label>
            {!! Form::text('father_phone_number',$model->father_phone_number,['id'=>'father_phone_number','class'=>'form-control','placeholder'=>'请输入父亲联系电话','style'=>"width:200px"]) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">母亲名字</label>
            {!! Form::text('mother_name',$model->mother_name,['id'=>'mother_name','class'=>'form-control','placeholder'=>'请输入母亲名字','style'=>"width:200px"]) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">请输入助产机构名称</label>
            {!! Form::text('midwifery_institution',$model->midwifery_institution,['id'=>'midwifery_institution','class'=>'form-control','placeholder'=>'请输入助产机构名称','style'=>"width:200px"]) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">新生儿体重</label>
            {!! Form::text('birth_weight',$model->birth_weight,['id'=>'birth_weight','class'=>'form-control','placeholder'=>'请输入新生儿体重','style'=>"width:200px"]) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">出生身长</label>
            {!! Form::text('birth_height',$model->birth_height,['id'=>'birth_height','class'=>'form-control','placeholder'=>'请输入出生身长','style'=>"width:200px"]) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="submit" class="btn btn-primary">更改</button>
    </div>
</form>
<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('assets/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('laravalid/jquery.validate.laravalid.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $('.getForm').validate({onkeyup: false});
    });
</script>