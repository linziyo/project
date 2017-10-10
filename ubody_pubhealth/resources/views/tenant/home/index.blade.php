
@extends('tenant.layout')

@section('content_header')
    <h1>控制台</h1>
@endsection
{{--{{dd($model)}}--}}
{{--{{dd($model['archive_monday'])}}--}}




{{--{{dd($$model["archive_Friday"])}}--}}
{{--{{dd($model["archive_monday"])}}--}}
{{--{{dd($model["archive_Tuesday "])}}--}}
{{--{{dd($model["archive_Wednesday "])}}--}}
{{--{{dd($model["archive_Thursday"])}}--}}
{{--{{dd($model["archive_Friday"])}}--}}
{{--{{dd($model["archive_Saturday"])}}--}}
{{--{{dd($model["archive_Sunday"])}}--}}

{{--{{dd($model['archive_Tuesday'])}}--}}
@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">建档率</span>
                    <span class="info-box-number">{{ $model['archive_percent'] }}
                            <small>%</small></span>
                    <span class="info-box-text">档案总数</span>
                    <span class="info-box-number">{{ $model['archive_count'] }}</span>                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">签约率</span>
                    <span class="info-box-number">
                       {{ $model['contract_percent'] }}
                        %
                    </span>
                    <span class="info-box-text">签约总数</span>
                    <span class="info-box-number">{{ $model['contract_count'] }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">活跃档案率</span>
                    <span class="info-box-number">
                       {{ $model['latest_archive_mounth_percent'] }}
                        %
                    </span>
                    <span class="info-box-text">近一个月活跃档案总数</span>
                    <span class="info-box-number">{{ $model['latest_archive_mounth'] }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">签约总数</span>
                    <span class="info-box-number">{{ $model['contract_count'] }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">我的建档趋势</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center">
                                <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                            </p>

                            <div class="chart">
                                <!-- Sales Chart Canvas -->
                                <div id="archiveChart" style="height: 375px; width:100%;" width="677" height="250"></div>
                            </div>
                            <!-- /.chart-responsive -->
                        </div>
                        <!-- /.col -->
                        {{--<div class="col-md-4">--}}
                            {{--<p class="text-center">--}}
                                {{--<strong>Goal Completion</strong>--}}
                            {{--</p>--}}

                            {{--<div class="progress-group">--}}
                                {{--<span class="progress-text">Add Products to Cart</span>--}}
                                {{--<span class="progress-number"><b>160</b>/200</span>--}}

                                {{--<div class="progress sm">--}}
                                    {{--<div class="progress-bar progress-bar-aqua" style="width: 80%"></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <!-- /.progress-group -->
                            {{--<div class="progress-group">--}}
                                {{--<span class="progress-text">Complete Purchase</span>--}}
                                {{--<span class="progress-number"><b>310</b>/400</span>--}}

                                {{--<div class="progress sm">--}}
                                    {{--<div class="progress-bar progress-bar-red" style="width: 80%"></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <!-- /.progress-group -->
                            {{--<div class="progress-group">--}}
                                {{--<span class="progress-text">Visit Premium Page</span>--}}
                                {{--<span class="progress-number"><b>480</b>/800</span>--}}

                                {{--<div class="progress sm">--}}
                                    {{--<div class="progress-bar progress-bar-green" style="width: 80%"></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <!-- /.progress-group -->
                            {{--<div class="progress-group">--}}
                                {{--<span class="progress-text">Send Inquiries</span>--}}
                                {{--<span class="progress-number"><b>250</b>/500</span>--}}

                                {{--<div class="progress sm">--}}
                                    {{--<div class="progress-bar progress-bar-yellow" style="width: 80%"></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <!-- /.progress-group -->
                        {{--</div>--}}
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- ./box-body -->
                <div class="box-footer">
                    <div class="row">
                        {{--<div class="col-sm-3 col-xs-6">--}}
                            {{--<div class="description-block border-right">--}}
                                {{--<span class="description-percentage text-green"><i--}}
                                            {{--class="fa fa-caret-up"></i> 17%</span>--}}
                                {{--<h5 class="description-header">$35,210.43</h5>--}}
                                {{--<span class="description-text">TOTAL REVENUE</span>--}}
                            {{--</div>--}}
                            {{--<!-- /.description-block -->--}}
                        {{--</div>--}}
                        {{--<!-- /.col -->--}}
                        {{--<div class="col-sm-3 col-xs-6">--}}
                            {{--<div class="description-block border-right">--}}
                                {{--<span class="description-percentage text-yellow"><i--}}
                                            {{--class="fa fa-caret-left"></i> 0%</span>--}}
                                {{--<h5 class="description-header">$10,390.90</h5>--}}
                                {{--<span class="description-text">TOTAL COST</span>--}}
                            {{--</div>--}}
                            {{--<!-- /.description-block -->--}}
                        {{--</div>--}}
                        <!-- /.col -->
                        {{--<div class="col-sm-3 col-xs-6">--}}
                            {{--<div class="description-block border-right">--}}
                                {{--<span class="description-percentage text-green"><i--}}
                                            {{--class="fa fa-caret-up"></i> 20%</span>--}}
                                {{--<h5 class="description-header">$24,813.53</h5>--}}
                                {{--<span class="description-text">TOTAL PROFIT</span>--}}
                            {{--</div>--}}
                            {{--<!-- /.description-block -->--}}
                        {{--</div>--}}
                        <!-- /.col -->
                        {{--<div class="col-sm-3 col-xs-6">--}}
                            {{--<div class="description-block">--}}
                                {{--<span class="description-percentage text-red"><i--}}
                                            {{--class="fa fa-caret-down"></i> 18%</span>--}}
                                {{--<h5 class="description-header">1200</h5>--}}
                                {{--<span class="description-text">GOAL COMPLETIONS</span>--}}
                            {{--</div>--}}
                            {{--<!-- /.description-block -->--}}
                        {{--</div>--}}
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-3">
            <div class="box box-info">
                <div class="box-header"><h2 class="box-title">最近的档案</h2></div>
                <div class="box-body">
                    <ul class="list-group">

                        {{--dd{{$model['latest_archive']->real_name}}--}}
                        @foreach($model['latest_archive'] as $v)
                        <li class="list-group-item">
                            <a href="{{ URL::action('Tenant\ArchiveController@show', $v->id)}}">
                            {{--<a href="{{URL::action('Admin\\TenantController@show', $v->id)}}">--}}
                                <span>姓名:</span>
                                <span >{{ $v->real_name }}</span><br/>
                                <span >建档编号:</span>
                                <span >{{ $v->code }}</span><br/>
                                <span>性别:</span>
                                 <span >{{  $v->sex ==1 ? '男' : '女' }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">本月建档趋势</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-wrench"></i></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row" >
                        <div class="col-md-12">
                            <p class="text-center">
                                <strong>Sales:Jan, 2014 222- 30 Jul, 2014</strong>
                            </p>

                            <div class="chart">
                                <!-- Sales Chart Canvas -->
                                <div id="salesChart" style="height: 443px; width:100%;" width="677" height="250"></div>

                                {{--<canvas id="salesChart" style="height: 250px; width:100%;" width="677"--}}
                                        {{--height="250"></canvas>--}}
                            </div>
                            <!-- /.chart-responsive -->
                        </div>
                        <!-- /.col -->
                        {{--<div class="col-md-4">--}}
                            {{--<p class="text-center">--}}
                                {{--<strong>Goal Completion</strong>--}}
                            {{--</p>--}}

                            {{--<div class="progress-group">--}}
                                {{--<span class="progress-text">Add Products to Cart</span>--}}
                                {{--<span class="progress-number"><b>160</b>/200</span>--}}

                                {{--<div class="progress sm">--}}
                                    {{--<div class="progress-bar progress-bar-aqua" style="width: 80%"></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <!-- /.progress-group -->
                            {{--<div class="progress-group">--}}
                                {{--<span class="progress-text">Complete Purchase</span>--}}
                                {{--<span class="progress-number"><b>310</b>/400</span>--}}

                                {{--<div class="progress sm">--}}
                                    {{--<div class="progress-bar progress-bar-red" style="width: 80%"></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <!-- /.progress-group -->
                            {{--<div class="progress-group">--}}
                                {{--<span class="progress-text">Visit Premium Page</span>--}}
                                {{--<span class="progress-number"><b>480</b>/800</span>--}}

                                {{--<div class="progress sm">--}}
                                    {{--<div class="progress-bar progress-bar-green" style="width: 80%"></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <!-- /.progress-group -->
                            {{--<div class="progress-group">--}}
                                {{--<span class="progress-text">Send Inquiries</span>--}}
                                {{--<span class="progress-number"><b>250</b>/500</span>--}}

                                {{--<div class="progress sm">--}}
                                    {{--<div class="progress-bar progress-bar-yellow" style="width: 80%"></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <!-- /.progress-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                {{--</div>--}}
                <!-- ./box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block border-right">
                                {{--<span class="description-percentage text-green"><i--}}
                                            {{--class="fa fa-caret-up"></i> 17%</span>--}}
                                {{--<h5 class="description-header">$35,210.43</h5>--}}
                                {{--<span class="description-text">TOTAL REVENUE</span>--}}
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block border-right">
                                {{--<span class="description-percentage text-yellow"><i--}}
                                            {{--class="fa fa-caret-left"></i> 0%</span>--}}
                                {{--<h5 class="description-header">$10,390.90</h5>--}}
                                {{--<span class="description-text">TOTAL COST</span>--}}
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block border-right">
                                {{--<span class="description-percentage text-green"><i--}}
                                            {{--class="fa fa-caret-up"></i> 20%</span>--}}
                                {{--<h5 class="description-header">$24,813.53</h5>--}}
                                {{--<span class="description-text">TOTAL PROFIT</span>--}}
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block">
                                {{--<span class="description-percentage text-red"><i--}}
                                            {{--class="fa fa-caret-down"></i> 18%</span>--}}
                                {{--<h5 class="description-header">1200</h5>--}}
                                {{--<span class="description-text">GOAL COMPLETIONS</span>--}}
                            </div>
                            <!-- /.description-block -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-3">
            <div class="box box-info">
                <div class="box-header"><h2 class="box-title">最近的签约</h2></div>
                <div class="box-body">
                    <ul class="list-group">
                        @foreach($model['latest_contract'] as $v)
                            <li class="list-group-item">
                                <span>签约人:
                                {{ $v->doctor->user->real_name }}
                                </span>
                                <span></span><br/>
                                <span>签约价格:</span><br/>
                                <span >{{ $v->price }}</span><br/>
                                <span>签约状态:</span><br/>
                                <span >{{  $v->status ==1 ? '已审核' : '未审核' }}</span>
                                </li>
                        @endforeach
                    </ul>
                </div>


            </div>
        </div>
    </div>
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('js/echarts.min.js') }}"></script>
<script type="text/javascript">
        var myChart0 = echarts.init(document.getElementById('archiveChart'));
        var my_archive_data_values = {
            tooltip: {trigger: 'axis'},
            grid: {left: '3%', right: '4%', bottom: '3%', containLabel: true},
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
            },
            yAxis: {type: 'value'},
            series: [
                {
                    name: '档案统计',
                    type: 'line',
                    stack: '总量',
                    data: []
                },
                {
                    name: '签约统计',
                    type: 'line',
                    stack: '总量',
                    data: []
                }
            ]
        };
        myChart0.setOption(my_archive_data_values);
</script>
<script type="text/javascript">
    var myChart = echarts.init(document.getElementById('salesChart'));
    var archive_data_values = {
        tooltip: {trigger: 'axis'},
        grid: {left: '3%', right: '4%', bottom: '3%', containLabel: true},
        xAxis: {
            type: 'category',
            boundaryGap: false,
            data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
        },
        yAxis: {type: 'value'},
        series: [
            {
                name: '签约统计',
                type: 'line',
                stack: '总量',
                data: []
            },
            {
                name: '档案统计',
                type: 'line',
                stack: '总量',
                data:[]
            }
        ]
    };
    myChart.setOption(archive_data_values);
</script>
<script type="text/javascript">
    $(function () {
        $.get('{{ URL::action('Tenant\HomeController@getWeeks') }}', function (data) {
            archive_data_values.series[0].data = data.data.month_constract;
            archive_data_values.series[1].data = data.data.month_archives;
            myChart.setOption(archive_data_values);
            my_archive_data_values.series[0].data = data.data.my_constract;
            my_archive_data_values.series[1].data = data.data.my_archives;
            myChart0.setOption(my_archive_data_values);
        });
    });
</script>


@endpush