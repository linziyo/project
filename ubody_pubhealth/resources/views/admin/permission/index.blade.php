@extends('adminlte::page')

@section('content_header')
    <h1>权限管理</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <a href="{{ URL::action("Admin\\PermissionController@create") }}" data-toggle="modal" data-target="#ajax"
               class="btn btn-primary">添加</a>
        </div>
        <div class="box-body">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th style="width:10px"><input type="checkbox" class="icheck"/></th>
                    <th style="width:50px">编号</th>
                    <th>名称</th>
                    <th>友好名称</th>
                    <th>简介</th>
                    <th style="width:120px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $model)
                    <tr>
                        <td><input type="checkbox" class="icheck"/></td>
                        <td>{{  $model->id }}</td>
                        <td>{{  $model->name }}</td>
                        <td>{{  $model->display_name }}</td>
                        <td>{{  $model->description }}</td>
                        <td style="text-align: right">
                            <a href="{{ URL::action("Admin\\PermissionController@edit", $model->id) }}" data-toggle="modal"
                               data-target="#ajax"
                               class="btn btn-success btn-xs">编辑</a>
                            <a href="{{ URL::action("Admin\\PermissionController@destroy", $model->id) }}"
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
            $('#ajax').on('hidden.bs.modal', function (e) {
                $(this).removeData("bs.modal");
            })
        });
    </script>
@stop