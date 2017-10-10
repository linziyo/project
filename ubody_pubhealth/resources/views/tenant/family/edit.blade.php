<form class="form" action="{{URL::action('Tenant\\FamilyController@update', $model->id)}}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put" />
    <input type="hidden" name="id" value="{{ $model->id }}" />
    <input type="hidden" name="user_id" value="{{ $model->user_id }}" />
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">修改家庭成员信息</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label" for="name">名称</label>
            <input class="form-control" id="name" name="name" placeholder="名称" value="{{ $model->name }}" />
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="mobile">手机号码</label>
            <input class="form-control" id="mobile" name="mobile" placeholder="手机号码" value="{{ $model->mobile }}" />
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="relationship">关系</label>
            <input class="form-control" id="relationship" name="relationship" placeholder="名称" value="{{ $model->relationship }}" />
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>