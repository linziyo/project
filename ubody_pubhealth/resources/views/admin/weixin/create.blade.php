<form class="form" action="{{URL::action('Admin\\OrganizationController@store')}}">
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label" for="name">名称</label>
            <input class="form-control" id="name" name="name" placeholder="名称"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">所属机构</label>
            <select name="organization_id" id="organization_id" class="form-control">
                <option>请选择机构</option>
                @foreach($list as $organization)
                    <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                @endforeach
            </select>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="price">建议价格</label>
            <input class="form-control" id="price" name="price" placeholder="技能"/>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>