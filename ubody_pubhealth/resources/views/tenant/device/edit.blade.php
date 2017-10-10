<form class="form" action="{{URL::action('Tenant\\DeviceController@update',$model->id)}}" method="post" id="update_device_form">
    {{csrf_field()}}
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">创建设备信息</h4>
    </div>
    <div class="modal-body">
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <label for="community_hospital" class="control-label">所属社区医院</label>
            <select class="form-control" name="community_hospital_id">
                @foreach($hospitals as $hospital)
                    <option value="{{ $hospital->id }}" @if($model->community_hospital_id == $hospital->id)selected="selected"@endif>{{ $hospital->name }}</option>
                @endforeach
            </select>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="code">设备编号</label>
            <input class="form-control" id="code" name="code" placeholder="设备编号" value="{{ $model->code }}"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="type">设备型号</label>
            <input class="form-control" id="type" name="type" placeholder="设备型号" value="{{ $model->type }}" />
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>
<script type="text/javascript">
    $("#update_device_form").validate({onkeyup: false});
</script>