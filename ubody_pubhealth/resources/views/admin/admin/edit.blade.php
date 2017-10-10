<form class="form" action="{{URL::action('Admin\\AdminController@update', $model->id)}}" method="post">
    {{csrf_field()}}
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">编辑</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label" for="name">用户名</label>
            <input class="form-control" id="name" name="name" placeholder="用户名" value="{{ $model->name }}"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">简称</label>
            <div class="form-group">
                {!! Form::label('community_id', '所属机构111', ['class'=>'control-label']) !!}<br />
                {!! Form::select('community_id', $list ,null,['class'=>"form-control"]) !!}
                <span class="help-block"></span>
            </div>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>