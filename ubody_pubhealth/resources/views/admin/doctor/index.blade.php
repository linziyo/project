@extends('admin.tenantLayout')

@section('content_header')
    <h1>医生管理</h1>
@stop

@section('tenant_content')
    <div class="box box-primary">
        <div class="box-header">
            <form class="form-inline" action="{{ URL::action("Admin\\DoctorController@index" ) }}" method="get">
                <input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
                <div class="form-group">
                    <a href="{{ URL::action("Admin\\DoctorController@create", "tenant_id=".$tenant['id']) }}" data-toggle="modal"
                       data-target="#ajax"
                       class="btn btn-primary btn-block">添加</a>
                </div>
                <div class="form-group">
                    <select class="form-control" name="community_hospital_id">
                        <option value="">请选择机构</option>
                        @foreach($hospital as $h)
                            @if(isset($input["community_hospital_id"]) && $input["community_hospital_id"] == $h->id )
                                <option value="{{ $h->id }}" selected>{{ $h->name }}</option>
                            @else
                                <option value="{{ $h->id }}">{{ $h->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="手机号码" autocomplete="off" name="q" value="{{ isset($input["q"]) ? $input["q"] : ""}}"/>
                        <span class="input-group-btn"><button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i></button></span>
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
                    <th>姓名</th>
                    <th>手机</th>
                    <th>所属机构</th>
                    <th>职务</th>
                    <th>职称</th>
                    <th>专业</th>
                    <th>技能</th>
                    <th>从业时间</th>
                    <th>咨询时间</th>
                    <th>医组介绍</th>
                    <th style="width:120px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $model)
                    <tr>
                        <td><input type="checkbox" class="icheck"/></td>
                        <td>{{  $model->id }}</td>
                        <td>{{  $model->user->real_name }}</td>
                        <td>{{  $model->user->mobile }}</td>
                        <td>@if(isset( $model->communityhospital->name) &&  $model->communityhospital->name !=''){{   $model->communityhospital->name}}@else   @endif</td>
                        <td>{{  $model->duty }}</td>
                        <td>{{  $model->title }}</td>
                        <td>{{  $model->specialty }}</td>
                        <td>{{  $model->skills }}</td>
                        <td>{{  $model->working_time }}</td>
                        <td>{{  $model->consult }}</td>
                        <td>{{  $model->description }}</td>
                        <td style="text-align: right">
                            <a href="{{ URL::action("Admin\\DoctorController@edit", $model->id) }}" data-toggle="modal"
                               data-target="#ajax"
                               class="btn btn-success btn-xs">编辑</a>
                            <a href="{{ URL::action("Admin\\DoctorController@destroy", $model->id) }}"
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