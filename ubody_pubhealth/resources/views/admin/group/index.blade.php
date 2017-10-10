@extends('admin.tenantLayout')

@section('content_header')
    <h1>医组管理</h1>
@stop

@section('tenant_content')
    <div class="box box-primary">
        <div class="box-header">
            <form class="form-inline" action="{{ URL::action("Admin\\GroupController@index") }}" method="get">
                <input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
                <div class="form-group">
                    <a href="{{ URL::action("Admin\\GroupController@create", "tenant_id=".$tenant['id']) }}" data-toggle="modal"
                       data-target="#ajax"
                       class="btn btn-primary btn-block">添加</a>
                </div>
                <div class="form-group">
                    <select class="form-control" name="community_hospital_id">
                        <option value="">请选择机构</option>
                        @foreach($hospital as $h)
                            @if(isset($input['community_hospital_id']) && $input['community_hospital_id'] == $h->id)
                                    <option value="{{$h->id}}" selected>{{$h->name}}</option>
                            @else
                                <option value="{{$h->id}}">{{$h->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        {{--<input type="text" class="form-control" autocomplete="off"  name="name" value="{{ isset($input["name"]) ? $input["name"] : ""}}" placeholder="社区医院名称"/>--}}
                        <span class="input-group-btn"><button class="btn btn-default" type="submit">查找</button></span>
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
                    <th>名称</th>
                    <th>所属机构</th>
                    <th>医组介绍</th>
                    <th>添加医生</th>
                    <th>添加服务包</th>
                    <th style="width:120px">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $model)
                    <tr>
                        <td><input type="checkbox" class="icheck"/></td>
                        <td>{{  $model->id }}</td>
                        <td>{{  $model->name }}</td>
                        <td>{{  $model->CommunityHospital->name }}</td>
                        <td>{{  $model->description }}</td>
                        <td>
                            <a href="{{ URL::action("Admin\\GroupController@add", ["tenant_id"=>$tenant['id'] ,"id"=>$model->id]) }}" data-toggle="modal"
                               data-target="#ajax"
                               class="btn btn-success btn-xs">添加医组成员</a>
                        </td>
                        <td>
                            <a href="{{ URL::action("Admin\\GroupController@add_package", ["tenant_id"=>$tenant['id'] ,"id"=>$model->id]) }}" data-toggle="modal"
                               data-target="#ajax"
                               class="btn btn-success btn-xs">添加服务包</a>
                        </td>
                        <td style="text-align: right">
                            <a href="{{ URL::action("Admin\\GroupController@edit", $model->id) }}" data-toggle="modal"
                               data-target="#ajax"
                               class="btn btn-success btn-xs">编辑</a>
                            <a href="{{ URL::action("Admin\\GroupController@destroy", $model->id) }}"
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