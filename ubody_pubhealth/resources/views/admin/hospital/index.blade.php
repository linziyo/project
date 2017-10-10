@extends('admin.tenantLayout')

@section('content_header')
    <h1>社区医院管理</h1>
@stop

@section('tenant_content')
    <div class="box box-primary">
        <div class="box-header">
            <form action="{{ URL::action('Admin\CommunityHospitalController@index') }}" method="get" class="form-inline">
                <input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
                <div class="form-group">
                    <a href="{{ URL::action("Admin\\CommunityHospitalController@create", "tenant_id=".$tenant['id']) }}" data-toggle="modal"
                       data-target="#ajax"
                       class="btn btn-primary pull-block">添加</a>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" autocomplete="off"  name="name" value="{{ isset($input["name"]) ? $input["name"] : ""}}" placeholder="社区医院名称"/>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                {{--<i class="glyphicon glyphicon-search">--}}
                                    查找
                                </button>
                        </span>
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
                    <th>社区医院</th>
                    <th>电话</th>
                    <th>地址</th>
                    <th style="width:120px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $model)
                    <tr>
                        <td><input type="checkbox" class="icheck"/></td>
                        <td>{{  $model->id }}</td>
                        <td>{{  $model->name }}</td>
                        <td>{{  $model->phone_number }}</td>
                        <td>{{  $model->address }}</td>
                        <td style="text-align: right">
                            <a href="{{ URL::action("Admin\\CommunityHospitalController@edit", $model->id) }}" data-toggle="modal"
                               data-target="#ajax"
                               class="btn btn-success btn-xs">编辑</a>
                            <a href="{{ URL::action('Admin\\CommunityHospitalController@destroy', $model->id) }}" class="btn btn-danger btn-xs">删除</a>
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
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@stop
@section('js')
    <script type="text/javascript">
        $(function () {
            $('#ajax').on('hidden.bs.modal', function (e) {
                $(this).removeData("bs.modal");
            });
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