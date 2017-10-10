<form class="form" action="{{URL::action('Admin\\DeviceController@update', $model->id)}}" method="post">
    {{csrf_field()}}
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">设备 编辑</h4>
    </div>
    <div class="modal-body">
        <input type="hidden" name="tenant_id" value="{{$model->tenant_id}}"/>
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group">
            <label class="control-label" for="name">简称</label>
            <select class="form-control" name="community_hospital_id">
                @foreach($hospitals as $hospital)
                    <option value="{{ $hospital->id }}" @if($model->community_hospital_id == $hospital->id)selected="selected"@endif>{{ $hospital->name }}</option>
                @endforeach
            </select>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">设备编码</label>
            <input class="form-control" id="name" name="code" placeholder="名称" value="{{$model->code}}"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="price">类型</label>
            <input class="form-control" id="price" name="type" placeholder="设备类型" value="{{ $model->type }}"/>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>