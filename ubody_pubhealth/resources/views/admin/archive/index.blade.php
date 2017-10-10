@extends('admin.tenantLayout')

@section('content_header')
    <h1>建档管理</h1>
@stop

@section('tenant_content')
    <div class="box box-primary">
        <div class="box-header">
            <form action="{{ URL::action("Admin\\ArchiveController@index",'tenant_id='.$tenant['id']) }}" method="get" class="form-inline">
                <input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
                <div class="form-group">
                    <a href="{{ URL::action("Admin\\ArchiveController@create",'tenant_id='.$tenant['id']) }}" data-toggle="modal"
                       data-target="#ajax"
                       class="btn btn-primary pull-block">添加</a>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" autocomplete="off"  name="real_name" value="{{ isset($input["real_name"]) ? $input["real_name"] : ""}}" placeholder="请输入名称"/>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </span>
                    </div>
                </div>
            </form>
            {{--<a href="{{ URL::action("Admin\\ArchiveController@create",'tenant_id='.$tenant['id']) }}" data-toggle="modal" data-target="#ajax"--}}
               {{--class="btn btn-primary">添加</a>--}}
        </div>
        <div class="box-body">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th style="width:10px"><input type="checkbox" class="icheck"/></th>
                    <th style="width:50px">编号</th>

                    <th>服务</th>
                    <th>用户</th>
                    <th>工作性质</th>
                    <th>工作地点</th>
                    <th>电话</th>
                    <th>操作</th>

                    <th style="width:120px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $model)
                    <tr>
                        <td><input type="checkbox" class="icheck"/></td>
                        <td>{{  $model->id }}</td>
                        <td>@if(isset($model->contract->package->name) && $model->contract->package->name !=''){{  $model->contract->package->name}}@else  @endif</td>
                        <td>{{  $model->real_name }}</td>
                        <td>{{  $model->job }}</td>
                        <td>{{  $model->work_unit }}</td>
                        <td>{{  $model->mobile }}</td>
                        <td style="text-align: right">
                            <a href="{{ URL::action("Admin\\ArchiveController@edit", $model->id) }}" data-toggle="modal"
                               data-target="#ajax"
                               class="btn btn-success btn-xs">编辑</a>
                            <a href="{{ URL::action("Admin\\ArchiveController@destroy", $model->id) }}"
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
            $('.btn-danger').click(function(){
                if(confirm('确定要删除?')){
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