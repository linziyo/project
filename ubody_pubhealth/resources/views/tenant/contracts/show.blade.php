@extends('tenant.layout')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
{{--                    <img class="profile-user-img img-responsive img-circle" src="{{ $model->user->avatar }}" alt="User profile picture">--}}
                    <h3 class="profile-username text-center">{{ $model->archive->real_name }}</h3>
                    <p class="text-muted text-center" style="margin-bottom:25px;"></p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>服务包</b> <a class="pull-right">{{ $model->package->name }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>价格</b> <a class="pull-right">{{ $model->price }}</a>
                        </li>
                        <li class="list-group-item">
                        <b>状态</b>
                        <a class="pull-right">
                            @if($model->status == 1)
                                预约
                            @elseif($model->status == 2)
                                签约
                            @else
                                作废
                            @endif
                        </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li><a href="#activity" data-toggle="tab" aria-expanded="false">签约家庭成员</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="activity">
                        <div class="post">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="width:50px">编号</th>
                                    <th>姓名</th>
                                    <th>手机号码</th>
                                    <th>身份证</th>
                                    <th>关系</th>
                                    <th style="width:120px">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $list)
                                    <tr>
                                        <td>{{ $list->id }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->mobile }}</td>
                                        <td>{{ $list->id_code }}</td>
                                        <td>{{ $list->relationship }}</td>
                                        <td style="text-align: right">
                                            <a href="{{ URL::action("Tenant\\ContractFamilyController@edit", ['id'=>$list->id,'contract_id'=>$model->id]) }}" data-toggle="modal" data-target="#ajax"
                                               class="btn btn-success btn-xs">编辑</a>
                                            <a href="javascript:;" url="{{ URL::action("Tenant\\ContractFamilyController@destroy", $list->id) }}"
                                               class="btn btn-danger btn-xs">删除</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <a href="{{ URL::action("Tenant\\ContractFamilyController@create",['contract_id'=>$model->id]) }}" data-toggle="modal"
                                       data-target="#ajax" class="btn btn-primary">新增成员</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <div class="modal fade" id="ajax">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $(function(){
            $('.nav-tabs').find('li').eq(0).addClass('active');
            $('.tab-content').find('.tab-pane').eq(0).addClass('active');

            $(".btn-danger").click(function(){

                var _this = $(this);
                bootbox.confirm({
                    message:'确认要删除吗？',
                    buttons:{
                        confirm:{
                            label:'确定',
                            className:'btn-success'
                        },
                        cancel:{
                            label:'取消',
                            className:'btn-danger'
                        }
                    },
                    callback:function(result){
                        if(result){
                            $.post(_this.attr('url'),{'_method': 'delete'},function(result){
                                if(result.success) {
                                    window.location.reload();
                                }
                            });
                        }
                    }
                })


            });
            $('#ajax').on('hidden.bs.modal', function (e) {
                $(this).removeData("bs.modal");
            })
        });
    </script>
@stop