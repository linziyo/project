@extends('tenant.layout')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ $model->image }}"
                         alt="User profile picture">
                    <h3 class="profile-username text-center">{{ $model->name }}</h3>
                    <p class="text-muted text-center" style="margin-bottom:25px;"></p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>辖区人口数</b> <a class="pull-right">{{ $model->population }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>联系电话</b> <a class="pull-right">{{ $model->telephone }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>详细地址</b> <a class="pull-right">{{ $model->address }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li><a href="#area" data-toggle="tab" aria-expanded="false">区域列表</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="area">
                        <div class="post">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="width:50px">编号</th>
                                    <th>名称</th>
                                    <th>所属社区</th>
                                    <th style="width:300px">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($areas as $area)
                                    <tr>
                                        <td>{{ $area->id }}</td>
                                        <td>{{ $area->name }}</td>
                                        <td>{{ $area->community->name }}</td>
                                        <td style="text-align:left">
                                            <a href="{{ URL::action("Tenant\\AreaController@edit", ['id'=>$area->id,'community_id'=>$model->id]) }}"
                                               data-toggle="modal" data-target="#ajax"
                                               class="btn btn-success btn-xs">编辑</a>
                                            <a href="{{ URL::action("Tenant\\AreaController@destroy", $area->id) }}"
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
                                    <a href="{{ URL::action("Tenant\\AreaController@create", ['community_id'=>$model->id]) }}"
                                       data-toggle="modal"
                                       data-target="#ajax" class="btn btn-primary">新增区域</a>
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
        $(function () {
            $('.nav-tabs').find('li').eq(0).addClass('active');
            $('.tab-content').find('.tab-pane').eq(0).addClass('active');

            $(".btn-danger").click(function () {
                if (confirm('确认要删除')) {
                    $.post($(this).attr('href'), {'_method': 'delete'}, function (result) {
                        if (result.success) {
                            window.location.reload();
                        }
                    });
                }
                return false;
            });
            $('#ajax').on('hidden.bs.modal', function (e) {
                $(this).removeData("bs.modal");
            });
        });
    </script>
@stop