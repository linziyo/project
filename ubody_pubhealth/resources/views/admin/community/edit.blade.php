<form class="form"  method="post"  action="{{URL::action('Admin\\CommunityController@update', $model->id)}}">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT"/>
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">修改 社区</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label" for="name">名称</label>
            <input class="form-control" id="name" name="name" placeholder="名称" value="{{ $model->name }}"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">简称</label>
            <input class="form-control" id="realname" name="realname" placeholder="简称" value="{{ $model->nickname }}"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">级别</label>
            <input class="form-control" id="level" name="level" placeholder="级别" value="{{ $model->level }}"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">所在地</label>
            <div class="row">
                <div class="col-md-4">
                    <select name="province" class="form-control">
                        <option>请选择省</option>
                    </select>
                </div>
                <div class="col-md-4"><select name="city" class="form-control">
                        <option>请选择市</option>
                    </select></div>
                <div class="col-md-4"><select name="district" class="form-control">
                        <option>请选择区/县</option>
                    </select></div>
            </div>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">地址</label>
            <input class="form-control" id="address" name="address" placeholder="地址" value="{{ $model->address }}"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">联系人</label>
            <input class="form-control" id="contact_person" name="contact_person" placeholder="联系人" value="{{ $model->contact_person }}"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">电话</label>
            <input class="form-control" id="telephone" name="telephone" placeholder="电话" value="{{ $model->telephone }}"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">传真</label>
            <input class="form-control" id="fax" name="fax" placeholder="传真" value="{{ $model->fax }}"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">网址</label>
            <input class="form-control" id="url" name="url" placeholder="网址" value="{{ $model->url }}"/>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>