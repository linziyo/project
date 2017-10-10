<form class="form" method="post" action="{{URL::action('Admin\\DeviceController@store')}}">
    <div class=" modal-header">

        <input type="hidden" name="tenant_id" value="{{$tenant}}"/>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">设备</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label" for="name">设备编码</label>
            <input class="form-control" id="name" name="code" placeholder="名称"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">所属机构</label>
            <select class="form-control" name="community_hospital_id">
                @foreach($hospitals as $hospital)
                    <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                @endforeach
            </select>
            <span class="help-block"></span>

        </div>
        <div class="form-group">
            <label class="control-label" for="price">设备型号</label>
            <input class="form-control" id="price" name="type" placeholder="类型"/>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>
<script src="{{ asset('assets/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('laravalid/jquery.validate.laravalid.js') }}"></script>
<script type="text/javascript">
    $('.form').validate({onkeyup: false});
</script>