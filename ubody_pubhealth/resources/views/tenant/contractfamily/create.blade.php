<form class="form" action="{{URL::action('Tenant\\ContractFamilyController@store')}}" method="post">
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加家庭成员信息</h4>
    </div>
    <div class="modal-body">
        <input type="hidden" name="contract_id" value="{{ isset($input["contract_id"]) ? $input["contract_id"] : ""}}"/>
        <div class="form-group">
            <label class="control-label" for="name">姓名</label>
            <input class="form-control" id="name" name="name" placeholder="姓名" required/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="mobile">手机号码</label>
            <input class="form-control" id="mobile" name="mobile" placeholder="手机号码" />
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="mobile">身份证</label>
            <input class="form-control" id="id_code" name="id_code" placeholder="身份证" required/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="relationship">关系</label>
            <input class="form-control" id="relationship" name="relationship" placeholder="关系" required/>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>