@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h4>用户总数</h4>
                    <p>{{ $list['user_count']  }}人</p>
                    <h4>档案总数</h4>
                    <p>{{ $list['archive_count']}}件</p>
                    <h4>&nbsp;</h4>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">更多信息<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h4>医生总数</h4>
                    <p>{{ $list['doctor_count']}}人</p>
                    <h4>社区医院总数</h4>
                    <p>{{ $list['communityhospital_count']}}家</p>
                    <h4>租户总数</h4>
                    <p>{{ $list['tenant_count']}}家</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h4>设备总数</h4>
                    <p>{{ $list['device_count']}}台</p>
                    <h4>活跃设备数量</h4>
                    <p>{{ $list['live_device']}}台</p>
                    <h4>&nbsp;</h4>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h4>本周新增档案趋势</h4>
                    <p>{{ $list['live_archive']}}件</p>
                    <h4>本周新增用户趋势</h4>
                    <p>{{ $list['live_user']}}人</p>
                    <h4>&nbsp;</h4>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">更多信息<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header">
                    <h1 class="box-title">新用户</h1>
                    <br />
                    <br />
                    @foreach($list['users'] as $v)
                        <p>用户名</p>
                    <p>{{ $v->name}}</p>
                        <p>身份证号码</p>
                    <p>{{ $v->id_code}}</p>
                        <p>手机号码</p>
                    <p>{{ $v->mobile}}</p>
                    @endforeach

                </div>
                <div class="box-body">
                </div>
            </div>
        </div>
        <div class="col-md-6"></div>
    </div>
@stop