<form class="form" action="{{URL::action('Admin\\UserController@update', $model->id)}}" method="post">
    {{csrf_field()}}
    <div class=" modal-header">
        <input type="hidden" name="_method" value="PUT"/>
        <input type="hidden" name="tenant_id" value="{{$model["tenant_id"]}}"/>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">修改 用户</h4>
    </div>

    <div class="modal-body">

        <div class="form-group">
            {!! Form::label('name', '名称', ['class'=>'control-label']) !!}
            {!! Form::text('name',$model->name, ['id'=>'name','class'=>'form-control','placeholder'=>'名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('mobile', '手机号码', ['class'=>'control-label']) !!}
            {!! Form::text('mobile', $model->mobile, ['id'=>'real_name','class'=>'form-control','placeholder'=>'名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('real_name', '真实名称', ['class'=>'control-label']) !!}
            {!! Form::text('real_name', $model->real_name, ['id'=>'real_name','class'=>'form-control','placeholder'=>'名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('id_code', '身份证号码', ['class'=>'control-label']) !!}</br>
            {!! Form::text('id_code', $model->id_code, ['id'=>'id_code','class'=>'form-control','placeholder'=>'身份证号码']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('email', '邮箱', ['class'=>'control-label']) !!}
            {!! Form::text('email', $model->email, ['id'=>'real_name','class'=>'form-control','placeholder'=>'名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('sex', '性别', ['class'=>'control-label']) !!}</br>
            {!! Form::select('sex',\App\Models\User::$sex,$model->sex,['class'=>'form-control'],['id'=>'sex'])!!}
            <span class="help-block"></span>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>