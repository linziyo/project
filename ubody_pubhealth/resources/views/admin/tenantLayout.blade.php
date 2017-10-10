@extends('adminlte::page')

@section('content_header')
    <h1>{{ $tenant->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-2">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">管理</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#area">概览</a></li>
                        <li><a href="{{ URL::action('Admin\CommunityHospitalController@index',['tenant_id' => $tenant['id']]) }}">医院管理
                                <span class="label label-default pull-right">{{ $tenant->hospitals()->count()}}</span></a>
                        </li>
                        <li><a href="{{ URL::action('Admin\AreaController@index',['tenant_id' => $tenant['id']]) }}">区域管理
                                <span class="label label-default pull-right">{{ $tenant->areas()->count() }}</span>
                            </a>
                        </li>
                        <li><a href="{{ URL::action('Admin\DoctorController@index',['tenant_id' => $tenant['id']]) }}">医生管理
                                <span class="label label-default pull-right">{{ $tenant->doctors()->count() }}</span>
                            </a>
                        </li>
                        <li><a href="{{ URL::action('Admin\GroupController@index',['tenant_id' => $tenant['id']]) }}">医组管理
                                <span class="label label-default pull-right">{{ $tenant->groups()->count() }}</span>
                            </a>
                        </li>
                        <li><a href="{{ URL::action('Admin\StaffController@index',['tenant_id' => $tenant['id']]) }}">管理员添加
                                <span class="label label-default pull-right">{{ $tenant->staff()->count() }}</span>
                            </a>
                        </li>
                        <li><a href="{{ URL::action('Admin\PackageController@index',['tenant_id' => $tenant['id']]) }}">服务包管理
                                <span class="label label-default pull-right">{{ $tenant->packages()->count() }}</span>
                            </a>
                        </li>
                        <li><a href="{{ URL::action('Admin\UserController@index',['tenant_id' => $tenant['id']]) }}">用户管理
                                <span class="label label-default pull-right">{{ $tenant->users()->count() }}</span>
                            </a>
                        </li>
                        <li><a href="{{ URL::action('Admin\ArchiveController@index',['tenant_id' => $tenant['id']]) }}">建档管理
                                <span class="label label-default pull-right">{{ $tenant->archives()->count() }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::action('Admin\ContractController@index',['tenant_id' => $tenant['id']]) }}">签约管理
                                <span class="label label-default pull-right">{{ $tenant->contracts()->count() }}</span>
                            </a>
                        </li>
                        <li><a href="{{ URL::action('Admin\DeviceController@index',['tenant_id' => $tenant['id']]) }}">设备管理
                                <span class="label label-default pull-right">{{ $tenant->device()->count() }}</span>
                            </a>
                        </li>
                        {{--<li>--}}
                            {{--<a href="{{ URL::action('Admin\VisitNewbornController@index',['tenant_id' => $tenant['id']]) }}">随访管理--}}
                                {{--<span class="label label-default pull-right">0</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    </ul>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active">
                            <a href="{{ URL::action('Admin\SyncController@index', ['tenant_id'=>$tenant['id']]) }}">数据同步</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            @yield('tenant_content')
        </div>
    </div>
@stop

@section('js')

    <script type="text/javascript">
        $(function () {
        });
    </script>
@stop