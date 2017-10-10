<form class="form" action="{{URL::action('Tenant\\ContractController@update', $model->id)}}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put">
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">修改签约信息</h4>
    </div>
    <div class="modal-body">

        <div class="form-group">
            <label class="control-label" for="user_id">居民</label>
            <input class="form-control" id="real_name" name="real_name" placeholder="居民" value="{{ $model->archive->real_name }}" readonly required/>
            <span class="help-block"></span>
        </div>

        <div class="form-group">
            <label class="control-label" for="package_id">服务包</label>
            <select class="form-control" id="package_id" name="package_id" required>
                @foreach($package as $package)
                    <option value="{{ $package->id }}" data-price="{{ $package->price }}" @if($model->package_id == $package->id)selected="selected"@endif>{{ $package->name }}</option>
                @endforeach
            </select>
            <span class="help-block"></span>
        </div>


        <div class="form-group">
            <label class="control-label" for="price">价格</label>
            <input class="form-control" id="price" name="price" placeholder="价格" value="{{ $model->price }}"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="start_time">生效时间</label>
            <input class="form-control datepicker" id="start_time" name="start_time" placeholder="生效时间" value="{{ $model->start_time }}"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="end_time">结束时间</label>
            <input class="form-control datepicker" id="start_time" name="end_time" placeholder="结束时间" value="{{ $model->end_time }}"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="status">状态值</label>
            <select class="form-control" id="status" name="status">
                <option value="1" @if($model->status == 1)selected="selected"@endif>预约</option>
                <option value="2" @if($model->status == 2)selected="selected"@endif>签约</option>
                <option value="3" @if($model->status == 3)selected="selected"@endif>作废</option>
            </select>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>
<script type="text/javascript">
    $(function(){
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            language: 'zh-CN'
        })

        $("#package_id").change(function () {
            $("input[name=price]").val($("#package_id option:selected").attr('data-price'));
        });
    })
</script>