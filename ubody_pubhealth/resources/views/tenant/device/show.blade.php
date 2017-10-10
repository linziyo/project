@extends('tenant.layout')

@section('content_header')
    <h1>设备管理</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <form class="form-inline" method="get" action="{{ URL::action("Tenant\\DeviceController@index") }}">
                <div class="form-group">
                    <a href="{{ URL::action("Tenant\\DeviceController@create") }}" data-toggle="modal"
                       data-target="#ajax"
                       class="btn btn-primary">添加</a>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="设备编号" autocomplete="off" name="q"
                           value="{{ isset($input["q"]) ? $input["q"] : ""}}"/>
                    <span class="input-group-btn"><button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i></button></span>
                </div>
            </form>
        </div>

    </div>

    <div class="box-body">
        <table class="table table-hover table-striped table-bordered">
            <thead>
            <tr>
                <th style="width:10px"><input type="checkbox" class="icheck"/></th>
                <th style="width:50px">编号</th>
                <th>设备编号</th>
                <th>设备型号</th>
                <th>社区医院</th>
                <th style="width:200px">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $model)
                <tr>
                    <td><input type="checkbox" class="icheck"/></td>
                    <td>{{ $model->id }}</td>
                    <td>{{ $model->communityHospital->name }}</td>
                    <td>{{ $model->code }}</td>
                    <td>{{ $model->type }}</td>
                    <td style="text-align: right">
                        <a href="{{ URL::action("Tenant\\DeviceController@show", $model->id) }}" class="btn btn-success btn-xs">体检数据</a>
                        <a href="{{ URL::action("Tenant\\DeviceController@edit", $model->id) }}" data-toggle="modal" data-target="#ajax"
                           class="btn btn-success btn-xs">编辑</a>
                        <a href="{{ URL::action("Tenant\\DeviceController@destroy", $model->id) }}"
                           class="btn btn-danger btn-xs">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="box-footer">
        {{ $list->render() }}
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $(function () {
            $(".btn-danger").click(function () {
                if (confirm('确认要删除')) {
                    var url = 'http://1.publichealth.ubody.local/tenant/devices/4';
                    $.post(url, {'_method': 'delete'}, function (result) {
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