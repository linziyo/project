@extends('tenant.layout')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ $model->avatar ? Storage::url($model->avatar) : asset('images/default_avatar.jpg') }}" alt="User profile picture">
                    <h3 class="profile-username text-center">{{ $model->name }}</h3>
                    <p class="text-muted text-center" style="margin-bottom:25px;"></p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>邮箱</b> <a class="pull-right">{{ $model->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>手机号码</b> <a class="pull-right">{{ $model->mobile }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>真实名称</b> <a class="pull-right">{{ $model->real_name }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>身份证</b> <a class="pull-right">{{ $model->id_code }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>性别</b> <a class="pull-right">@if($model->sex == 1)男@else女@endif</a>
                        </li>
                        <li class="list-group-item">
                            <b>出生年月</b> <a class="pull-right">{{ $model->date_of_birth }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li><a href="#activity" data-toggle="tab" aria-expanded="false">家庭成员</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="activity">
                        <div class="post">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="width:50px">编号</th>
                                    <th>名称</th>
                                    <th>手机号码</th>
                                    <th>家庭关系</th>
                                    <th style="width:120px">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $family)
                                    <tr>
                                        <td>{{ $family->id }}</td>
                                        <td>{{ $family->name }}</td>
                                        <td>{{ $family->mobile }}</td>
                                        <td>{{ $family->relationship }}</td>
                                        <td style="text-align: right">
                                            <a href="{{ URL::action("Tenant\\FamilyController@edit", $family->id) }}" data-toggle="modal" data-target="#ajax"
                                               class="btn btn-success btn-xs">编辑</a>
                                            <a href="{{ URL::action("Tenant\\FamilyController@destroy", $family->id) }}"
                                               class="btn btn-danger btn-xs">删除</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="post">
                            <div class="box-body">
                                <form class="form-horizontal" action="{{URL::action('Tenant\\FamilyController@store')}}" method="post">
                                    <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                                        新增家庭成员
                                    </h4>
                                    <input type="hidden" name="user_id" value="{{ $model->id }}" />
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">姓名:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile" class="col-sm-2 control-label">手机号码:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="mobile" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="relationship" class="col-sm-2 control-label">家庭关系:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="relationship" name="relationship" placeholder="relationship" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
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
        $(function(){
            $('.nav-tabs').find('li').eq(0).addClass('active');
            $('.tab-content').find('.tab-pane').eq(0).addClass('active');

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
            })
        });
    </script>
@stop