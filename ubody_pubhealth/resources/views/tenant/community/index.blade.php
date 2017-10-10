@extends('tenant.layout')

@section('content_header')
    <h1>社区列表</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <form class="form-inline" method="get" action="{{ URL::action('Tenant\CommunityController@index') }}">
                <div class="form-group">
                    <a href="{{ URL::action("Tenant\\CommunityController@create") }}" data-toggle="modal"
                       data-target="#ajax"
                       class="btn btn-primary btn-block">添加</a>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="社区名称" autocomplete="off" name="q" value="{{ isset($input["q"]) ? $input["q"] : ""}}"/>
                        <span class="input-group-btn"><button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i></button></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="box-body">
            <table class="table table-hover table-striped table-bordered table-responsive">
                <thead>
                <tr>
                    <th style="width:10px"><input type="checkbox" class="icheck"/></th>
                    <th style="width:50px">编号</th>
                    <th>名称</th>
                    <th>社区编码</th>
                    <th>辖区人口数</th>
                    <th>地址</th>
                    <th>联系电话</th>
                    <th style="width:120px">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $model)
                    <tr>
                        <td><input type="checkbox" class="icheck"/></td>
                        <td>{{ $model->id }}</td>
                        <td><a href="{{ URL::action('Tenant\CommunityController@show', $model->id) }}">{{ $model->name }}</a></td>
                        <td>{{ $model->code }}</td>
                        <td>{{ $model->population }}</td>
                        <td>{{ $model->address }}</td>
                        <td>{{ $model->telephone }}</td>
                        <td style="text-align: right">
                            <a href="{{ URL::action('Tenant\CommunityController@edit', $model->id) }}"
                               data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">编辑</a>
                            <a href="{{ URL::action('Tenant\CommunityController@destroy', $model->id) }}" class="btn btn-danger btn-xs">删除</a>
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
        <div class="modal-dialog modal-lg">
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