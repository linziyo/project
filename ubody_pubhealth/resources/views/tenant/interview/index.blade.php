@extends('tenant.layout')

@section('content_header')
    <h1>随访管理</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <form class="form-inline" method="get" action="{{ URL::action("Tenant\\ArchiveController@index") }}">
                <div class="form-group">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"> 添加 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::action("Tenant\\VisitSelfCareAbilityController@index") }}" >老年人生活自理能力评估表</a></li>
                            <li><a href="{{ URL::action("Tenant\\VisitSelfCareAbilityController@create") }}" data-toggle="modal" data-target="#ajax">老年人生活自理能力评估表</a></li>
                            <li><a href="#">高血压随访表</a></li>
                            <li><a href="#">二型糖尿病随访表</a></li>
                            <li><a href="#">重性精神疾病患者随访表</a></li>
                            <li><a href="#">用户多次肺结核随访</a></li>
                            <li><a href="#">用户中医体质随访</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                </div>
                <div class="input-group">
                    <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                        <span>按时间：</span>
                        <span>2017-7-7 - 2017-7-13</span>
                        <i class="fa fa-calendar"></i>
                    </button>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="档案编号/姓名/身份证/手机" autocomplete="off" name="q"
                           value="{{ isset($input["q"]) ? $input["q"] : ""}}"/>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
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
                    <th style="width:120px">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $model)
                    <tr>
                        <td><input type="checkbox" class="icheck"/></td>
                        <td>{{ $model->id }}</td>
                        <td>{{ $model->title }}</td>
                        <td>{{ $model->content }}</td>
                        <td style="text-align: right">
                            <a href="{{ URL::action("Tenant\\InterviewController@edit", $model->id) }}"
                               data-toggle="modal" data-target="#ajax"
                               class="btn btn-success btn-xs">编辑</a>
                            <a href="{{ URL::action("Tenant\\InterviewController@destroy", $model->id) }}"
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