@extends('tenant.layout')

@section('content_header')
    <h1>个人资料</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-primary">
                    <div class="widget-user-image">
                        <img class="img-circle" src="{{ asset('images/default_avatar.jpg') }}" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">{{ $model->real_name }}</h3>
                    <h5 class="widget-user-desc">
                        <p>
                            @if($model->hasRole('staff'))
                                <span class="label label-danger">管理员</span>
                            @endif
                            @if($model->hasRole('doctor'))
                                <span class="label label-success">医生</span>
                                <span class="label label-warning">{{ \App\Models\Doctor::findByUser($model)->title }}</span>
                            @endif
                        </p>
                    </h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
                        <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                        <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                        <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- /.box -->
        </div>

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#base" data-toggle="tab" aria-expanded="false">基本信息</a></li>
                    <li><a href="#job" data-toggle="tab" aria-expanded="false">职业信息</a></li>
                    <li><a href="#password" data-toggle="tab" aria-expanded="false">修改密码</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane class" id="base">
                        {{ Form::model(Auth::user()) }}
                        {{ Form::close() }}
                    </div>
                    <div class="tab-pane" id="job">
                        职业信息
                    </div>
                    <div class="tab-pane" id="password">
                        修改密码
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
            })
        });
    </script>
@stop