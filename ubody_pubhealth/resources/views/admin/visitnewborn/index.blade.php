@extends('admin.tenantLayout')

@section('content_header')
    <h1>随访管理</h1>
@stop

@section('tenant_content')
    <div class="box box-primary">
        <div class="box-header">
            <form action="{{ URL::action("Admin\\VisitNewbornController@index",'tenant_id='.$tenant['id']) }}" method="post" class="form-inline">
                <input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
                {{--<div class="form-group">--}}

                            {{--<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"--}}
                                    {{--aria-haspopup="true" aria-expanded="false"> 添加 <span class="caret"></span></button>--}}
                        {{--</div>--}}
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" autocomplete="off"  name="name" value="{{ isset($input["name"]) ? $input["name"] : ""}}" placeholder="请输入名称"/>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="box-body">
            {{--<div class="tab-pane" id="visitor">--}}
                {{--<div class="btn-group">--}}
                    {{--<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"--}}
                            {{--aria-haspopup="true" aria-expanded="false"> 添加 <span class="caret"></span></button>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="{{ URL::action("Tenant\\VisitSelfCareAbilityController@create","archive_id=".$model->id)}}" >老年人生活自理能力评估</a></li>--}}
                        {{--<li><a href="{{ URL::action("Tenant\\VisitHypertensionController@index","archive_id=".$model->id)}}">高血压随访</a></li>--}}
                        {{--<li><a href="{{ URL::action("Tenant\\VisitDiabetesController@index","archive_id=".$model->id)}}">二型糖尿病随访</a></li>--}}
                        {{--<li><a href="{{ URL::action("Tenant\\VisitMentalPatientController@index","archive_id=".$model->id)}}">重性精神疾病患者随访表</a></li>--}}
                        {{--<li><a href="{{ URL::action("Tenant\\VisitTuberculosisFirstRecordController@index","archive_id=".$model->id)}}">肺结核患者第一次入户随访</a></li>--}}
                        {{--<li><a href="{{ URL::action("Tenant\\VisitTuberculosisPatientController@index","archive_id=".$model->id)}}">用户多次肺结核随访</a></li>--}}
                        {{--<li><a href="{{ URL::action("Tenant\\VisitChineseMedicineController@create","archive_id=".$model->id)}}">用户中医体质随访</a></li>--}}
                        {{--<li><a href="{{ URL::action("Tenant\\VisitNewbornController@create","archive_id=".$model->id)}}">新生儿家庭访视记录表</a></li>--}}
                        {{--<li><a href="{{ URL::action("Tenant\\VisitKidController@create","archive_id=".$model->id)}}">小儿访视记录表</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li><a href="#">Separated link</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>随访编号</th>
                        <th>随访类型</th>
                        <th>随访时间</th>
                        <th>预计下次随访时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($model as $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{\App\Models\Visit::$visit_types[$value->visit_type]['name']}}</td>
                            <td>{{$value->visited_at}}</td>
                            <td>{{$value->next_visited_at}}</td>
                            <td>

                                <a href="{{ URL::action("Admin\\VisitNewbornController@edit", $value->id) }}" data-toggle="modal"
                                data-target="#ajax"
                                class="btn btn-success btn-xs">查看</a>

                                {{--<a href="{{ URL::action("Admin\\VisitNewbornController@edit", $value->id) }} "--}}
                                   {{--class="btn btn-success btn-xs">查看</a>--}}
                                {{--<a href="{{ route(\App\Models\Visit::$visit_types[$value->visit_type]['table'].'.show',$value->id) }}" class="btn btn-primary btn-xs">查看</a>--}}
                                {{--<a href="{{ route(\App\Models\Visit::$visit_types[$value->visit_type]['table'].'.edit', $value->id) }}" class="btn btn-success btn-xs">编辑</a></td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--高血压患者随访服务记录表、2型糖尿病患者随访服务记录表、严重精神障碍患者随访服务记录表、肺结核患者第一次入户随访记录表、肺结核患者随访服务记录表--}}
            </div>
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            {{--{{ $list->render() }}--}}
        </div>
    </div>

    <div class="modal fade" id="ajax">
        <div class="modal-dialog" style="width:1200px;">
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