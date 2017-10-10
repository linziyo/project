{!! Form::open(['action'=>'Tenant\ContractController@store','id'=>'form1']) !!}
<div class=" modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">签约</h4>
</div>
<div class="modal-body">
    {{ Form::hidden('archive_id', Request::get('archive_id')) }}
    <div class="form-group">
        <label class="control-label" for="user_id">档案</label>
        <div class="row">
            <div class="col-md-6">
                <input type="text" class="form-control" readonly="readonly" placeholder="姓名"
                       value="{{ $archive->real_name }}"/>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" readonly="readonly" placeholder="档案编号"
                       value="{{ $archive->code }}"/>
            </div>
        </div>
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        <label class="control-label" for="package_id">服务包</label>
        <select id="package_id" name="package_id" class="form-control" data-rule-required="true"
                data-msg-required="请选择服务包"
                aria-required="true">
            <option value="">请选择服务包</option>
            @foreach($packages as $package)
                <option value="{{ $package->id }}" data-price="{{ $package->price }}">{{ $package->name }}</option>
            @endforeach
        </select>
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        <label class="control-label" for="price">价格</label>
        {!! Form::text('price',old('price'),['class'=>'form-control']) !!}
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        <label class="control-label" for="start_time">生效时间</label>
        <div class="row">
            <div class="col-md-6">
                {!! Form::text('start_time',date('Y-m-d'),['class'=>'form-control datepicker','placeholder'=>'开始时间']) !!}
            </div>
            <div class="col-md-6">
                {!! Form::text('end_time',date('Y-m-d',strtotime("next year")),['class'=>'form-control datepicker','placeholder'=>'结束时间']) !!}
            </div>
        </div>
        <span class="help-block"></span>
    </div>
    <div class="form-group">
        <label class="control-label" for="start_time">家庭信息</label>
        <div class="row">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-btn">
                        <select name="relationship[]" class="form-control" style="width:auto" readonly="readonly">
                            <option value="本人" selected="selected">本人</option>
                        </select>
                    </span>
                    <input type="text" class="form-control" name="real_name[]" placeholder="姓名"
                           value="{{ $archive->real_name }}" readonly="readonly"/>
                </div>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="mobile[]" placeholder="手机" value="{{ $archive->mobile }}"
                       readonly="readonly"/>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" name="id_code[]" placeholder="身份证"
                       value="{{ $archive->id_code }}" readonly="readonly"/>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button id="btnAddFamily" type="button" class="btn btn-default pull-left">添加家庭成员</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
    <button type="submit" class="btn btn-primary">立即签约</button>
</div>
{!! Form::close() !!}
<script id="tplFamily" type="text/template">
    <div class="form-group">
        <div class="row">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-btn">
                        <select name="relationship[]" class="form-control" style="width:auto">
                            <option value="父亲">父亲</option>
                            <option value="母亲">母亲</option>
                            <option value="儿子">儿子</option>
                            <option value="女儿">女儿</option>
                            <option value="其他">其他</option>
                        </select>
                        </span>
                    <input type="text" class="form-control" name="real_name[]" placeholder="姓名" required/>
                </div>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="mobile[]" placeholder="手机"/>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="id_code[]" placeholder="身份证" required/>
                    <span class="input-group-btn">
                        <button class="btn btn-flat btn-remove-family" type="button" onclick="removeFamilyItem(this)">
                            <i class="fa fa-close"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</script>
<script type="text/javascript">
    function removeFamilyItem(btn) {
        $(btn).parent().parent().parent().parent().parent().remove();
    }

    $(function () {
        $("#btnAddFamily").click(function () {
            $("#ajax").find('.modal-body').append($("#tplFamily").html());
        });

        $("#package_id").change(function () {
            $("input[name=price]").val($("#package_id option:selected").attr('data-price'));
        });

        $("#form1").validate();
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            language: 'zh-CN'
        })
    })
</script>