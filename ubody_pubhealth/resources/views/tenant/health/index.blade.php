@extends('tenant.layout')

@section('content_header')
    <h1>体检数据列表</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <form class="form-inline" method="get" action="{{ URL::action("Tenant\\HealthController@index") }}">
                <div class="form-group">
                    <a href="{{ URL::action("Tenant\\HealthController@create") }}" class="btn btn-primary">添加</a>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="档案编号/姓名/身份证/手机" autocomplete="off" name="q"
                           value="{{ isset($input["q"]) ? $input["q"] : ""}}"/>
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
                    <th>姓名</th>
                    <th>体检联系方式</th>
                    <th>体检身份证号</th>
                    <th>测量时间</th>
                    <th>所属部门</th>
                    <th style="width:200px">操作</th>
                </tr>
                </thead>
                <tbody>
                @if($healths)
                    @foreach($healths as $health)
                        <tr>
                            <td><input type="checkbox" class="icheck"/></td>
                            <td>{{ $health->id }}</td>
                            <td>{{ $health->Name }}</td>
                            <td>{{ $health->Mobile }}</td>
                            <td>{{ $health->IdCode }}</td>
                            <td>{{ $health->MeasureTime }}</td>
                            <td>{{ $device[0]->communityHospital->name }}</td>
                            <td style="text-align: right">
                                <a href="{{ URL::action("Tenant\\HealthController@show", $health->id) }}" data-toggle="modal" data-target="#ajax"
                                   class="btn btn-success btn-xs">数据查看</a>
                                <a href="{{ URL::action("Tenant\\HealthController@destroy", $health->id) }}" class="btn btn-danger btn-xs">删除</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            {{ $healths->render() }}
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
            $(".btn-danger").click(function () {
                if (confirm('确认要删除')) {
                    $.post($(this).attr('href'), {'_method': 'delete'}, function (result) {
                        if (result.success) {
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