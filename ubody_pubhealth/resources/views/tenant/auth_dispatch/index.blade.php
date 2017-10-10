@extends('tenant.layout')

@section('content_header')
    <h1>授权数据管理</h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-body">


            <div class="col-md-5">
                <div class="box box-warning box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">已授权第三方</h3>
                    </div>

                    <div class="box-body">
                        @if($authArchive)
                            @if(in_array(1,$authArchive))
                                知己<br/>
                             @endif
                            @if(in_array(2,$authArchive))
                                罗湖<br/>
                                @endif
                            @else
                            未授权第三方
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <span  class="btn btn-primary" onclick="showModal('archive')">档案授权</span>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-primary">

        <div class="box-body">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">社备列表</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th style="width:10px"><input type="checkbox" class="icheck comunity-hospital"/></th>
                            <th style="width:50px">编号</th>
                            <th>社区医院</th>
                            <th>设备</th>
                            <th>型号</th>
                            <th>已授权第三方</th>
                        </tr>
                        </thead>
                        <tbody class="comunity-data">
                        @foreach($list as $key=>$model)
                            <tr>
                                <td><input type="checkbox" class="icheck" value="{{ $model->id }}"/></td>
                                <td>{{ ++$key }}</td>
                                <td>{{ $model->communityHospital->name }}</td>
                                <td>{{ $model->code }}</td>
                                <td>{{ $model->type }}</td>
                                <td>
                                    @if(in_array(1,$model->authDispatch?$model->authDispatch->auth_list:[]))
                                        知己;
                                    @endif
                                    @if(in_array(2,$model->authDispatch?$model->authDispatch->auth_list:[]))
                                        罗湖;
                                    @endif

                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="btn bg-olive margin" onclick="showModal('device')">授权</button>
                </div>
            </div>

        </div>
        <div class="box-footer">
            {{ $list->render() }}
        </div>
    </div>

    <div class="modal fade" id="modal-list">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">授权第三方</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="1" name="third_company[]">知己
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="2" name="third_company[]">罗湖
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary submitAuth" onclick="submitAuth()" data-auth="">提交</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">

        $('.comunity-hospital').on('click',function(){
           if($(this).is(':checked')){
               $('.comunity-data :checkbox').prop('checked',true);
           }else {
               $('.comunity-data :checkbox').prop('checked',false);
           }
        });
        var showModal = function(type) {
            $('.submitAuth').attr('data-auth',type);
            $('#modal-list').modal();
        };
        var submitAuth = function() {
            var type = $('.submitAuth').attr('data-auth');
            if(!type){
                return ;
            }
            var auth_company = [];
            $('[name="third_company[]"]:checked').each(function(){
                auth_company.push($(this).val());
            });
            var data = {ids:auth_company.join(',')};
            if(type == 'archive'){
                var url = '{{ URL::action('Tenant\\AuthDispatchController@authArchive') }}';

            }else if(type == 'device') {
                var url = '{{ URL::action('Tenant\\AuthDispatchController@authDevice') }}';
                var device_id = [];
                $('.comunity-data :checkbox:checked').each(function(){
                   device_id.push($(this).val());
                });
                data.device_id = device_id.join(',');
            }else {
                return;
            }

            $.ajax({
                url:url,
                type:'POST',
                data:data,
                dataType:'json',
                success: function(data) {
                    if(data.code == 200)
                    {
                        $.toast('操作成功',{type:'success'});
                        $('#modal-list').hide();
                        window.location.reload();

                    }else{
                        $.toast('操作失败',{type:'danger'});
                    }
                },
                error: function(xhr) {
                    $.toast('内部异常',{type:'danger'});
                }
            })
        }
    </script>
@stop