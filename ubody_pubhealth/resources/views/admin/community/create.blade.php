<form class="form" method="post" action="{{URL::action('Admin\\CommunityController@store')}}">
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加社区</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label" for="name">名称</label>
            <input class="form-control" id="name" name="name" placeholder="名称"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">辖区居民数</label>
            <input class="form-control" id="realname" name="population" placeholder="简称"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">联系电话</label>
            <input class="form-control" id="level" name="phone" placeholder="级别"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">详细地址</label>
            <input class="form-control" id="address" name="address" placeholder="简称"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">门店照片</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="联系人"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">家医签约合同</label>
            <input type="file" class="form-control" id="contract_template" name="contract_template" placeholder="家医签约合同"/>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>