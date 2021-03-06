@extends('tenant.layout')

@section('content_header')
    <h1>严重精神障碍患者随访服务记录表</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <form class="form-inline" method="get" action="{{ URL::action("Tenant\\VisitMentalPatientController@index") }}">
                <div class="form-group">
                    <a href="{{ URL::action("Tenant\\VisitMentalPatientController@create") }}" class="btn btn-primary">添加</a>
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
                    <th>档案编号</th>
                    <th>姓名</th>
                    <th>身份证号码</th>
                    <th>手机号码</th>
                    <th>建档医生</th>
                    <th>建档时间</th>
                    <th>签约</th>
                    <th style="width:120px">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $model)
                    <tr>
                        <td><input type="checkbox" class="icheck"/></td>
                        <td>
                            <a href="{{ URL::action('Tenant\VisitMentalPatientController@show', $model->id) }}">{{ $model->code }}</a>
                        </td>
                        <td>{{ $model->real_name }}</td>
                        <td>{{ $model->id_code }}</td>
                        <td>{{ $model->mobile }}</td>
                        <td>{{ $model->doctor ? $model->doctor->user->real_name : '' }}</td>
                        <td>{{ $model->created_at }}</td>
                        <td>{{ $model->contract ? '已签约' : '未签约' }}</td>
                        <td style="text-align: right">
                            <a href="{{ URL::action("Tenant\\VisitMentalPatientController@edit", $model->id) }}"
                               class="btn btn-success btn-xs btn-flat">编辑</a>
                            <a href="{{ URL::action("Tenant\\VisitMentalPatientController@destroy", $model->id) }}"
                               class="btn btn-danger btn-xs btn-flat">删除</a>
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