@extends('adminlte::page')

@section('content_header')
    <h1>管理员管理</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <form action="{{ URL::action('Admin\AdminController@index') }}" method="get">
                <div class="row">
                    <div class="col-md-2">
                        <select class="form-control" name="community_id">
                            <option value="">请选择社区</option>
                            @foreach($community as $c )
                                @if(isset($input['community_id']) && $input['community_id'] == $c->id)
                                    <option value="{{$c->id}}" selected>{{$c->name}}</option>
                                @else
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" placeholder="管理员账号或姓名"/>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">查找</button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-offset-6 col-md-2">
                        <a href="{{ URL::action("Admin\\AdminController@create") }}" data-toggle="modal"
                           data-target="#ajax"
                           class="btn btn-primary pull-right">添加</a>
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
                    <th>用户名</th>
                    <th>手机</th>
                    <th style="width:120px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $model)
                    <tr>
                        <td><input type="checkbox" class="icheck"/></td>
                        <td>{{  $model->id }}</td>
                        <td>{{  $model->name }}</td>
                        <td>{{  $model->mobile }}</td>
                        <td style="text-align: right">
                            <a href="{{ URL::action("Admin\\AdminController@edit", $model->id) }}" data-toggle="modal"
                               data-target="#ajax"
                               class="btn btn-success btn-xs">编辑</a>
                            <a href="{{ URL::action("Admin\\AdminController@destroy", $model->id) }}"
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