@extends('tenant.layout')

@section('content_header')
    <h1>数据导入</h1>
@stop

@section('content')
<form class="form-horizontal" id="formArchive" method="POST" action="">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">数据导入</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label class="control-label col-sm-2" for="organization">机构系统</label>
                <div class="col-sm-2">
                    <select class="form-control valid" name="organization" aria-required="true" aria-invalid="false">
                        <option value="1" selected="selected">罗湖健康管理系统</option>
                    </select>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="organization">社区列表</label>
                <div class="col-sm-2">
                    <select class="form-control valid" name="community" id="community" aria-required="true" aria-invalid="false">
                        @if($communitys)
                        @foreach($communitys as $community)
                        <option value="{{ $community->id }}">{{ $community->name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="username">用户名</label>
                <div class="col-sm-2"><input type="text" class="form-control valid" name="username" id="username" value=""></div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">密码</label>
                <div class="col-sm-2"><input type="password" class="form-control valid" name="password" id="password" value=""></div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="box-footer">
                <div class="form-actions col-sm-10 col-sm-offset-2">
                    <div><a href="javascript:void(0);" class="btn btn-primary">提交</a></div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop

@section('js')
    <script type="text/javascript">
        $(function(){
            $(".btn-primary").click(function(){
                $(this).html('数据导入中...').css({'background-color':'#3c8dbc','border-color':'#367fa9','cursor':'wait'});
                var url = '{{ URL::action("Tenant\\DataSynchronousController@getLuoHuHealth") }}';
                var postData = {'username':$('#username').val(),
                                'password':$("#password").val(),
                                'community':$("#community").val()};
                $.post(url, postData, function(result){
                    if(result.status == 200){
                        swal({
                            'title': '提示',
                            'text':result.msg,
                            'type':'success',
                            'confirmButtonText':'确定'
                        })
                    }else{
                        swal({
                            'title': '提示',
                            'text':result.msg,
                            'type':'error',
                            'confirmButtonText':'确定'
                        })
                    }
                    $(".btn-primary").html('数据').css({'background-color':'#3c8dbc','border-color':'#367fa9','cursor':'auto'});
                });
            });
        });
    </script>
@stop