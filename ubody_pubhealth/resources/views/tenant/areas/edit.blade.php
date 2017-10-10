<form class="form" action="{{URL::action('Tenant\\AreaController@update', $model->id)}}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put">
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">修改区域信息</h4>
    </div>
    <div class="modal-body">
        <input type="hidden" id="community_id" name="community_id" value="{{ isset($input['community_id'])?$input['community_id']:0 }}">
        <div class="form-group">
            <label class="control-label" for="name">名字</label>
            <input class="form-control" id="name" name="name" placeholder="名字" value="{{ $model->name }}" />
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>