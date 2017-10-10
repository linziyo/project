@extends('adminlte::page')

@section('content_header')
    <h1>机构管理</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <form class="form-inline" method="post" action="{{ URL::action("Admin\\CommunityController@index") }}">
                <div class="form-group">
                    <input type="hidden" name="tenant_id" value="cnbruce.com">
                    <a href="{{ URL::action("Admin\\CommunityController@create") }}" data-toggle="modal"
                       data-target="#ajax"
                       class="btn btn-primary btn-block">添加</a>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="机构名称"/>
                        <span class="input-group-btn"><button class="btn btn-default" type="button">查找</button></span>
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
                    <th>简称</th>
                    <th>地址</th>
                    <th>电话</th>
                    <th>传真</th>
                    <th>网址</th>
                    <th style="width:120px">编辑 | 删除</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $model)
                    <tr>
                        <td><input type="checkbox" class="icheck"/></td>
                        <td>{{  $model->id }}</td>
                        <td>{{  $model->name }}</td>
                        <td>{{  $model->nickname }}</td>
                        <td>{{  $model->address }}</td>
                        <td>{{  $model->telephone }}</td>
                        <td>{{  $model->fax }}</td>
                        <td>{{  $model->url }}</td>
                        <td style="text-align: right">
                            <a href="{{ URL::action("Admin\\CommunityController@edit", $model->id) }}"
                               data-toggle="modal"
                               data-target="#ajax"
                               class="btn btn-success btn-xs">编辑</a>
                            <a href="{{ URL::action("Admin\\CommunityController@destroy", $model->id) }}"
                               class="btn btn-danger btn-xs">删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            {{ $list->appends(array('tenant_id'=>$tenant["id"]))->render() }}
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
            })
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