@extends('tenant.layout')

@section('content_header')
@stop

@section('content')
<div>
    <h4 class="modal-title">请输入原系统用户名和密码</h4>

    <div class="modal-body" style="width:500px;">
        <form method="GET" action="http://1.publichealth.ubody.local/tenant/areas/luoHu/dataSynchronous" accept-charset="UTF-8" id="create_user_form" enctype="multipart/form-data" novalidate="novalidate">
            <div class="form-group">
                <label for="name" class="control-label">用户名</label>
                <input data-rule-required="true" data-msg-required="请填写name." data-rule-maxlength="100" data-msg-maxlength="The name may not be greater than 100 characters." id="username" class="form-control" placeholder="用户名" name="username" type="text" value="" aria-required="true">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label for="password" class="control-label">密码</label>
                <input data-rule-required="true" data-msg-required="请填写password." data-rule-minlength="5" data-msg-minlength="The password must be at least 5 characters." id="password" class="form-control" placeholder="密码" name="password" type="password" value="" aria-required="true">
                <span class="help-block"></span>
            </div>
            <div class="modal-footer" style="text-align:left;padding:0px;">
                <input class="btn btn-primary" type="submit" value="保存">
                <button class="btn btn-default" data-dismiss="modal" type="button" onclick="javascript:history.go(-1);">返回</button>
            </div>
        </form>
    </div>
</div>
@stop

@section('js')
    <script type="text/javascript">


    </script>
@stop