@extends('adminlte::page')

@section('content_header')
    <h1>租户管理</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <form class="form-inline" action="{{ URL::action("Admin\\TenantController@index") }}" method="get">
                <div class="form-group">
                    <a href="{{ URL::action("Admin\\TenantController@create") }}" data-toggle="modal"
                       data-target="#ajax"
                       class="btn btn-primary">添加</a>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="租户名称" autocomplete="off" name="q"
                               value="{{ isset($input["q"]) ? $input["q"] : ""}}"/>
                        <span class="input-group-btn"><button class="btn btn-default" type="submit"><i
                                        class="glyphicon glyphicon-search"></i></button></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="box-body">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th style="width:10px"><input type="checkbox" class="icheck"/></th>
                    <th style="width:50px">编号</th>
                    <th>租户名称</th>
                    <th>租户全称</th>
                    <th>联系人名称</th>
                    <th>电话</th>
                    <th style="width:120px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $model)
                    <tr>
                        <td><input type="checkbox" class="icheck"/></td>
                        <td>{{  $model->id }}</td>
                        <td><a href="{{URL::action('Admin\\TenantController@show', $model->id)}}">{{ $model->name }}</a>
                        </td>
                        <td>{{  $model->full_name }}</td>
                        <td>{{  $model->contact_name }}</td>
                        <td>{{  $model->phone_number }}</td>
                        <td style="text-align: right">
                            <a href="{{ URL::action("Admin\\TenantController@edit", $model->id) }}" data-toggle="modal"
                               data-target="#ajax"
                               class="btn btn-success btn-xs">编辑</a>
                            <a href="{{ URL::action("Admin\\TenantController@destroy", $model->id) }}"
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
            });

            $('.btn-danger').click(function(){
                if(confirm('确定要删除')){
                    $.post($(this).attr('href'),{'_method':'delete'},function(data){
                        if(data.success){
                            window.location.reload();
                        }
                    });
                }
                return false;
            });
        });
    </script>
@stop