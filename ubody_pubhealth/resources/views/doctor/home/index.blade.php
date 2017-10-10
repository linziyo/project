@extends('doctor.tab')
@push('css')
<link href="{{ url('/assets/jqweuix/css/jqweuix.css') }}" rel="stylesheet"/>
@endpush
@section('content')

    <div class="swiper-container" data-space-between='10' data-pagination='.swiper-pagination' data-autoplay="1000">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i1/TB1n3rZHFXXXXX9XFXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
            <div class="swiper-slide"><img src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i4/TB10rkPGVXXXXXGapXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
            <div class="swiper-slide"><img src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i1/TB1kQI3HpXXXXbSXFXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>



    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__hd">最近一周</div>
        <div class="weui-panel__bd">
            <div id="stat_archive" style="height:200px"></div>
        </div>
    </div>


@stop

@push('js')
<script type="text/javascript" src="{{ url('/assets/echarts/echarts.min.js') }}"></script>
<script type="text/javascript">

        var xAxis = '{!! json_encode($xAxis,JSON_UNESCAPED_UNICODE) !!}';
        var archiveWeekMap = '{!! json_encode($archiveWeekMap) !!}';
        var contractWeekMap = '{!! json_encode($contractWeekMap) !!}';

    function initECharts() {
        var myChart = echarts.init(document.getElementById("stat_archive"));
        // 指定图表的配置项和数据
        var option = {
            title:{
                text:''
            },
            tooltip: {
                trigger:'axis'
            },
            legend: {
                data:['建档','签约']
            },
            xAxis: {
                data: ["201701","201702","201703","201704","201705","201706"]
            },
            yAxis: {
                type:'value'
            },
            series: [
                {
                name: '建档',
                type: 'line',
                data: [5, 20, 36, 10, 10, 20,0]
                },
                {
                    name: '签约',
                    type: 'line',
                    data: [2, 10, 6, 1, 20, 10,0]
                }
            ]
        };
        option.xAxis.data = JSON.parse(xAxis);
        option.series[0].data = JSON.parse(archiveWeekMap);
        option.series[1].data = JSON.parse(contractWeekMap);
        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    }

    $(function () {
        initECharts();
        $('.swiper-container').swiper({
            autoSwipe:true,
            speed:1000,
            continuousScroll:true,
            transitionType:'cubic-bezier(0.22,0.69,0.72.0.88)',
            lazyLoad:true
        });
    });


</script>
@endpush