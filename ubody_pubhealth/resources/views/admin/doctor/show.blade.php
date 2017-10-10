@extends('adminlte::page')

@section('content_header')
    <h1>{{ $model->name }}
        <small>sdfasd</small>
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-2">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">管理</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#area">概览</a></li>
                        <li>
                            <a href="{{ URL::action('Admin\CommunityController@index',['tenant_id' => $model['id']]) }}">社区管理
                                <span class="label label-default pull-right">{{ $model->communities()->count() }}</span></a>
                        </li>
                        <li><a href="{{ URL::action('Admin\AreaController@index',['tenant_id' => $model['id']]) }}">区域管理
                                <span class="label label-default pull-right">{{ $model->areas()->count() }}</span>
                            </a>
                        </li>
                        <li><a href="{{ URL::action('Admin\DoctorController@index',['tenant_id' => $model['id']]) }}">医生管理
                                <span class="label label-default pull-right">{{ $model->doctors()->count() }}</span>
                            </a>
                        </li>
                        <li><a href="{{ URL::action('Admin\GroupController@index',['tenant_id' => $model['id']]) }}">医组管理
                                <span class="label label-default pull-right">{{ $model->groups()->count() }}</span>
                            </a>
                        </li>
                        <li><a href="{{ URL::action('Admin\PackageController@index',['tenant_id' => $model['id']]) }}">服务包管理
                                <span class="label label-default pull-right">{{ $model->packages()->count() }}</span>
                            </a>
                        </li>
                        <li><a href="{{ URL::action('Admin\UserController@index',['tenant_id' => $model['id']]) }}">用户管理
                                <span class="label label-default pull-right">{{ $model->users()->count() }}</span>
                            </a>
                        </li>
                        <li><a href="{{ URL::action('Admin\ArchiveController@index',['tenant_id' => $model['id']]) }}">建档管理
                                <span class="label label-default pull-right">0</span>
                            </a>
                        </li>
                        <li><a href="{{ URL::action('Admin\ContractController@index',['tenant_id' => $model['id']]) }}">签约管理
                                <span class="label label-default pull-right">0</span>
                            </a>
                        </li>
                        <li><a href="{{ URL::action('Admin\DeviceController@index',['tenant_id' => $model['id']]) }}">设备管理
                                <span class="label label-default pull-right">0</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header"><h3 class="box-title">建档率</h3></div>
                        <div class="box-body"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header"><h3 class="box-title">签约率</h3></div>
                        <div class="box-body"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $(function () {
        });
    </script>
@stop