@extends('tenant.layout')

@section('content_header')
    <h1>医生管理</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <form class="form-inline" method="get" action="{{ URL::action("Tenant\\DoctorController@index") }}">
                <div class="form-group">
                    <a href="{{ URL::action("Tenant\\DoctorController@create") }}" data-toggle="modal" data-target="#ajax"
                       class="btn btn-primary">添加</a>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="手机号码" autocomplete="off" name="q" value="{{ isset($input["q"]) ? $input["q"] : ""}}"/>
                    <span class="input-group-btn"><button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i></button></span>
                </div>
            </form>
        </div>
        <div class="box-body">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th style="width:10px"><input type="checkbox" class="icheck"/></th>
                    <th style="width:50px">编号</th>
                    <th>名称</th>
                    <th>手机号码</th>
                    <th>机构</th>
                    <th>职务</th>
                    <th>职称</th>
                    <th>专业</th>
                    <th>技能</th>
                    <th style="width:120px">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $model)
                    <tr>
                        <td><input type="checkbox" class="icheck"/></td>
                        <td>{{ $model->id }}</td>
                        <td>{{ $model->user->name }}</td>
                        <td>{{ $model->user }}</td>
                        <td>{{ $model->community->name }}</td>
                        <td>{{ $model->duty }}</td>
                        <td>{{ $model->title }}</td>
                        <td>{{ $model->specialty }}</td>
                        <td>{{ $model->skills }}</td>
                        <td style="text-align: right">
                            <a href="{{ URL::action("Tenant\\DoctorController@edit", $model->id) }}" data-toggle="modal" data-target="#ajax"
                               class="btn btn-success btn-xs">编辑</a>
                            <a href="{{ URL::action("Tenant\\DoctorController@destroy", $model->id) }}"
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
            $(".btn-danger").click(function(){
                if(confirm('确认要删除')){
                    $.post($(this).attr('href'),{'_method': 'delete'},function(result){
                        if(result.success) {
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