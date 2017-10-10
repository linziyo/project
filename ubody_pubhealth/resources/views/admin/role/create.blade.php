<form class="form" action="{{URL::action('Admin\\RoleController@store')}}" method="post">
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加角色</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label" for="name">名称</label>
            <input class="form-control" id="name" name="name" placeholder="名称"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="display_name">友好名称</label>
            <input class="form-control" id="display_name" name="display_name" placeholder="技能"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="description">简介</label>
            <textarea name="description" class="form-control"></textarea>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>