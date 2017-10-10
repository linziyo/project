@extends('tenant.layout')

@section('content_header')
    <h1>签约管理</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <form class="form-inline" method="get" action="{{ URL::action("Tenant\\ContractController@index") }}">
                <div class="form-group">
                    {{--<a href="{{ URL::action("Tenant\\ContractController@create") }}" data-toggle="modal" data-target="#ajax"--}}
                       {{--class="btn btn-primary">添加</a>--}}
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="标题" autocomplete="off" name="q" value="{{ isset($input["q"]) ? $input["q"] : ""}}"/>
                    <span class="input-group-btn"><button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i></button></span>
                </div>
            </form>
        </div>
        <div class="box-body">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    {{--<th style="width:10px"><input type="checkbox" class="icheck"/></th>--}}
                    <th style="width:50px">编号</th>
                    <th>居民</th>
                    <th>服务包</th>
                    <th>价格</th>
                    <th>状态</th>
                    <th style="width:120px">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $model)
                    <tr>
                        {{--<td><input type="checkbox" class="icheck"/></td>--}}
                        <td>{{ $model->id }}</td>
                        <td><a href="{{ URL::action("Tenant\\ContractController@show", $model->id) }}">{{ $model->archive->real_name }}</a></td>
                        <td>{{ $model->package->name }}</td>
                        <td>{{ $model->price }}</td>
                        <td>
                            @if($model->status == 1)
                                预约
                                @elseif($model->status == 2)
                                签约
                                @else
                                作废
                                @endif
                        </td>
                        <td style="text-align: right">
                            <a href="{{ URL::action("Tenant\\ContractController@edit", $model->id) }}" data-toggle="modal" data-target="#ajax"
                               class="btn btn-success btn-xs">编辑</a>
                            <a href="{{ URL::action("Tenant\\ContractController@destroy", $model->id) }}"
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
                            $.post(_this.attr('href'),{'_method': 'delete'},function(result){
                                if(result.success) {
                                    window.location.reload();
                                }
                            });
                        }
                    }
                })

                return false;
            });
            $('#ajax').on('hidden.bs.modal', function (e) {
                $(this).removeData("bs.modal");
            });
        });


    </script>
@stop