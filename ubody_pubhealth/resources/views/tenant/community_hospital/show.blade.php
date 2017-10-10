@extends('tenant.layout')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="img-responsive"
                         src="{{ $model->image ? Storage::url($model->image) : asset('images/default_hospital.png') }}"/>
                    <h3 class="profile-username text-center">{{ $model->name }}</h3>
                    <p class="text-muted text-center" style="margin-bottom:25px;"></p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>联系电话</b> <a class="pull-right">{{ $model->phone_number }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>详细地址</b> <a class="pull-right">{{ $model->address }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>家医合同</b>
                            @if($model->contract)
                                <a class="pull-right" href="{{ Storage::url($model->contract) }}"
                                   target="_blank">查看合同</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li><a href="#doctors" data-toggle="tab" aria-expanded="false">医生</a></li>
                    <li><a href="#groups" data-toggle="tab" aria-expanded="false">医组</a></li>
                    <li><a href="#archives" data-toggle="tab" aria-expanded="false">档案</a></li>
                    <li><a href="#contracts" data-toggle="tab" aria-expanded="false">签约</a></li>
                    <li><a href="#communities" data-toggle="tab" aria-expanded="false">社区</a></li>
                    <li><a href="#packages" data-toggle="tab" aria-expanded="false">数据包</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="doctors">
                        <div class="post">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:50px">编号</th>
                                        <th>用户名</th>
                                        <th>手机号码</th>
                                        <th>姓名</th>
                                        <th>职务</th>
                                        <th>职称</th>
                                        <th>专业</th>
                                        <th>技能</th>
                                        <th style="width:120px">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($model->doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor->id }}</td>
                                        <td>{{ $doctor->user->name }}</td>
                                        <td>{{ $doctor->user->mobile }}</td>
                                        <td>{{ $doctor->user->real_name }}</td>
                                        <td>{{ $doctor->duty }}</td>
                                        <td>{{ $doctor->title }}</td>
                                        <td>{{ $doctor->specialty }}</td>
                                        <td>{{ $doctor->skills }}</td>
                                        <td style="text-align: right">
                                            <a href="{{ URL::action("Tenant\\DoctorController@edit", ['id'=>$doctor->id, 'community_hospital_id'=>$model->id]) }}"
                                               data-toggle="modal" data-target="#ajax"
                                               class="btn btn-success btn-xs">编辑</a>
                                            <a href="{{ URL::action("Tenant\\DoctorController@destroy", $doctor->id) }}"
                                               class="btn btn-danger btn-xs">删除</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <a href="{{ URL::action("Tenant\\DoctorController@create", ['community_hospital_id'=>$model->id]) }}"
                                       data-toggle="modal"
                                       data-target="#ajax" class="btn btn-primary">新增医生</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="groups">
                        <div class="post">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:50px">编号</th>
                                        <th>名称</th>
                                        <th>详情介绍</th>
                                        <th style="width:300px">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($model->groups as $group)
                                    <tr>
                                        <td>{{ $group->id }}</td>
                                        <td>{{ $group->name }}</td>
                                        <td>{{ $group->description }}</td>
                                        <td style="text-align:left">
                                            <a href="{{ URL::action("Tenant\\GroupController@getGroupDoctors", $group->id) }}"
                                               data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">添加医生</a>
                                            <a href="{{ URL::action("Tenant\\GroupController@getGroupPackages", $group->id) }}"
                                               data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">添加数据包</a>
                                            <a href="{{ URL::action("Tenant\\GroupController@edit", ['id'=>$group->id,'community_hospital_id'=>$model->id]) }}"
                                               data-toggle="modal" data-target="#ajax"
                                               class="btn btn-success btn-xs">编辑</a>
                                            <a href="{{ URL::action("Tenant\\GroupController@destroy", $group->id) }}"
                                               class="btn btn-danger btn-xs">删除</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <a href="{{ URL::action("Tenant\\GroupController@create", ['community_hospital_id'=>$model->id]) }}"
                                       data-toggle="modal"
                                       data-target="#ajax" class="btn btn-primary">新增医组</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="archives">
                        <div class="post">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>档案编号</th>
                                    <th>姓名</th>
                                    <th>身份证号码</th>
                                    <th>手机号码</th>
                                    <th>建档时间</th>
                                    <th style="width:120px">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($model->archives as $archive)
                                <tr>
                                    <td>
                                        <a href="{{ URL::action('Tenant\ArchiveController@show', $archive->id) }}">{{ $archive->code }}</a>
                                    </td>
                                    <td>{{ $archive->real_name }}</td>
                                    <td>{{ $archive->id_code }}</td>
                                    <td>{{ $archive->mobile }}</td>
                                    <td>{{ $archive->created_at }}</td>
                                    <td style="text-align: right">
                                        <a href="{{ URL::action("Tenant\\ArchiveController@edit", $archive->id) }}"
                                           data-toggle="modal" data-target="#ajax"
                                           class="btn btn-success btn-xs">编辑</a>
                                        <a href="{{ URL::action("Tenant\\ArchiveController@destroy", $archive->id) }}"
                                           class="btn btn-danger btn-xs">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="contracts">
                        <div class="post">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>签约编号</th>
                                    <th>签约服务</th>
                                    <th>签约医生</th>
                                    <th>价格</th>
                                    <th>签约时间</th>
                                    <th style="width:120px">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($model->contracts as $contract)
                                <tr>
                                    <td>{{ $contract->id }}</td>
                                    <td>{{ $contract->package->name }}</td>
                                    <td>{{ $contract->doctor->user->real_name }}</td>
                                    <td>{{ $contract->price }}</td>
                                    <td>{{ $contract->start_time }} {{ $contract->end_time }}</td>
                                    <td style="text-align: right">
                                        <a href="{{ URL::action("Tenant\\ContractController@edit", $contract->id) }}"
                                           data-toggle="modal" data-target="#ajax"
                                           class="btn btn-success btn-xs">编辑</a>
                                        <a href="{{ URL::action("Tenant\\ContractController@destroy", $contract->id) }}"
                                           class="btn btn-danger btn-xs">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="communities">
                        <div class="post">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>社区编码</th>
                                        <th>社区名称</th>
                                        <th>辖区人口数</th>
                                        <th>联系电话</th>
                                        <th>详细地址</th>
                                        <th style="width:120px">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($model->communities as $community)
                                    <tr>
                                        <td>{{ $community->code }}</td>
                                        <td>{{ $community->name }}</td>
                                        <td>{{ $community->population }}</td>
                                        <td>{{ $community->telephone }}</td>
                                        <td>{{ $community->address }}</td>
                                        <td style="text-align: right">
                                            <a href="{{ URL::action("Tenant\\CommunityController@edit", ['id'=>$community->id,'community_hospital_id'=>$model->id]) }}"
                                               data-toggle="modal" data-target="#ajax"
                                               class="btn btn-success btn-xs">编辑</a>
                                            <a href="{{ URL::action("Tenant\\CommunityController@destroy", $community->id) }}"
                                               class="btn btn-danger btn-xs">删除</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="post">
                            <div class="margin">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <a href="{{ URL::action('Tenant\CommunityController@create', ['community_hospital_id'=>$model->id]) }}"
                                           class="btn btn-primary"
                                           data-toggle="modal" data-target="#ajax">添加社区</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="packages">
                        <div class="post">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>编码</th>
                                        <th>服务包名称</th>
                                        <th>人群性质</th>
                                        <th>建议价格</th>
                                        <th style="width:120px">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($model->packages as $package)
                                    <tr>
                                        <td>{{ $package->id }}</td>
                                        <td>{{ $package->name }}</td>
                                        <td>{{ $package->character }}</td>
                                        <td>{{ $package->price }}</td>
                                        <td style="text-align: right">
                                            <a href="{{ URL::action("Tenant\\PackageController@edit", ['id'=>$package->id,'community_hospital_id'=>$model->id]) }}"
                                               data-toggle="modal" data-target="#ajax"
                                               class="btn btn-success btn-xs">编辑</a>
                                            <a href="{{ URL::action("Tenant\\PackageController@destroy", $package->id) }}"
                                               class="btn btn-danger btn-xs">删除</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="post">
                            <div class="margin">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <a href="{{ URL::action('Tenant\PackageController@create', ['community_hospital_id'=>$model->id]) }}"
                                           class="btn btn-primary"
                                           data-toggle="modal" data-target="#ajax">添加数据包 </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
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
            $('.nav-tabs').find('li').eq(0).addClass('active');
            $('.tab-content').find('.tab-pane').eq(0).addClass('active');

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