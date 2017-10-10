<html>
<head>
    <title>文华社区健康服务中心</title>
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background-color: #24293D;
            height: 100%;
            font-family: "微软雅黑", serif;
        }

        .box {
            background-color: #2C3145;
            padding: 4px 10px 4px 10px;
            margin-top: 16px;
        }

        h1 {
            color: #ffffff;
        }

        h2, h3, h4, h5, h6 {
            color: #ffffff;
        }

        .circle {
            width: 100px;
            margin: 6px 6px 20px;
            display: inline-block;
            position: relative;
            text-align: center;
            line-height: 1.2;
        }

        .circle canvas {
            vertical-align: top;
        }

        .circle strong {
            position: absolute;
            top: 30px;
            left: 0;
            width: 100%;
            text-align: center;
            line-height: 40px;
            font-size: 30px;
        }

        .circle strong i {
            font-style: normal;
            font-size: 0.6em;
            font-weight: normal;
        }

        .circle span {
            display: block;
            color: #aaa;
            margin-top: 12px;
        }

    </style>
</head>
<body>
<div class="container-fluid">
    <h1 class="text-center">文华社区健康服务中心</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="box">
                        <h4>累计签约总数</h4>
                        <h2>111,111
                            <small>份</small>
                        </h2>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>常住人口签约</h6>
                                <h4>111,111
                                    <small>份</small>
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <h6>流动人口签约</h6>
                                <h4>111,111
                                    <small>份</small>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box">
                        <h4>累计建档总数</h4>
                        <h2>111,111
                            <small>份</small>
                        </h2>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>常住人口建档</h6>
                                <h4>111,111
                                    <small>份</small>
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <h6>流动人口建档</h6>
                                <h4>111,111
                                    <small>份</small>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div id="age" style="width: 100%;height:350px;"></div>
            </div>
            <div class="box">
                <div id="sex" style="width: 100%;height:350px;"></div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box">
                <h4>累计建档总数</h4>
                <h2>111,111
                    <small>份</small>
                </h2>
                <div class="row">
                    <div class="col-md-6">
                        <h6>常住人口建档</h6>
                        <h4>111,111
                            <small>份</small>
                        </h4>
                    </div>
                    <div class="col-md-6">
                        <h6>流动人口建档</h6>
                        <h4>111,111
                            <small>份</small>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="box">
                <div id="HBP" style="width: 100%;height:350px;"></div>
            </div>
            <div class="box">
                <div id="T2D" style="width: 100%;height:350px;"></div>
            </div>
        </div>

    </div>
</div>
<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="http://demo.htmleaf.com/1505/201505271814/dist/circle-progress.js"></script>
<script src="{{ asset('js/echarts.min.js') }}"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    var communityData = {
        name: '罗湖文华社区医院',
        population: 30703,
        family_population: 10252,
        flowing_population: 7811,
        resident_population: 3606,
        tags: {
            age: {
                0: 100,
                6: 100,
                10: 100,
                20: 100,
                30: 100,
                40: 100,
                50: 100,
                60: 100,
                70: 100,
                80: 100,
                90: 100,
                100: 100
            },
            sex: {
                '男': 1000,
                '女': 1000,
                '未知': 0,
                '未说明': 33
            },
            diseases: {
                common: {amount: 100},
                kids: {amount: 100},
                pregnant: {amount: 100},
                oldPeople: {amount: 100},
                HBP: {amount: 100},
                T2D: {amount: 100},
                psychosis: {amount: 100},
                PTB: {amount: 100},
                CMHM: {amount: 100}
            }
        }
    };

    function initHBP() {
        var hbpChart = echarts.init(document.getElementById('HBP'));
        option = {
            title: {
                text: '高血压管理',
                textStyle: {color: '#ffffff', fontWeight: 'normal'}
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: ['1/8', '2/8', '3/8', '4/8', '5/8', '6/8', '7/8', '8/8', '9/8', '10/8', '11/8', '12/8',
                    '13/8', '14/8', '15/8', '16/8', '17/8', '18/8', '19/8', '20/8', '21/8', '22/8', '23/8', '24/8',
                    '25/8', '26/8', '27/8', '28/8', '29/8', '30/8', '31/8']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1/8', '2/8', '3/8', '4/8', '5/8', '6/8', '7/8', '8/8', '9/8', '10/8', '11/8', '12/8',
                    '13/8', '14/8', '15/8', '16/8', '17/8', '18/8', '19/8', '20/8', '21/8', '22/8', '23/8', '24/8',
                    '25/8', '26/8', '27/8', '28/8', '29/8', '30/8', '31/8']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name: '2016建档趋势',
                    type: 'line',
                    areaStyle: {normal: {}},
                    stack: '总量',
                    data: [120, 132, 101, 134, 90, 230, 210]
                },
                {
                    name: '2017建档趋势',
                    type: 'line',
                    areaStyle: {normal: {}},
                    stack: '总量',
                    data: [220, 182, 191, 234, 290, 330, 310]
                }
            ]
        };
        hbpChart.setOption(option);
    }

    function initT2D() {
        var t2dChart = echarts.init(document.getElementById('T2D'));
        option = {
            title: {
                text: '二型糖尿病管理',
                textStyle: {color: '#ffffff', fontWeight: 'normal'}
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: ['1/8', '2/8', '3/8', '4/8', '5/8', '6/8', '7/8', '8/8', '9/8', '10/8', '11/8', '12/8',
                    '13/8', '14/8', '15/8', '16/8', '17/8', '18/8', '19/8', '20/8', '21/8', '22/8', '23/8', '24/8',
                    '25/8', '26/8', '27/8', '28/8', '29/8', '30/8', '31/8']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1/8', '2/8', '3/8', '4/8', '5/8', '6/8', '7/8', '8/8', '9/8', '10/8', '11/8', '12/8',
                    '13/8', '14/8', '15/8', '16/8', '17/8', '18/8', '19/8', '20/8', '21/8', '22/8', '23/8', '24/8',
                    '25/8', '26/8', '27/8', '28/8', '29/8', '30/8', '31/8']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name: '2016建档趋势',
                    type: 'line',
                    areaStyle: {normal: {}},
                    stack: '总量',
                    data: [120, 132, 101, 134, 90, 230, 210]
                },
                {
                    name: '2017建档趋势',
                    type: 'line',
                    areaStyle: {normal: {}},
                    stack: '总量',
                    data: [220, 182, 191, 234, 290, 330, 310]
                }
            ]
        };
        t2dChart.setOption(option);
    }

    function initSex() {
        var sexChart = echarts.init(document.getElementById('sex'));

        option = {
            title: {text: '管理分群分布', textStyle: {color: '#ffffff', fontWeight: 'normal'}},
            tooltip: {trigger: 'item', formatter: "{a} <br/>{b} : {c} ({d}%)"},
            legend: {orient: 'vertical', left: 'right', data: []},
            series: [
                {
                    name: '访问来源',
                    type: 'pie',
                    radius: '55%',
                    center: ['50%', '60%'],
                    data: [],
                    itemStyle: {
                        emphasis: {shadowBlur: 10, shadowOffsetX: 0, shadowColor: 'rgba(0, 0, 0, 0.5)'},
                        normal: {label: {show: true, formatter: '{b} : {c}'}, labelLine: {show: true}}
                    }
                }
            ]
        };

        for (var item in communityData.tags.sex) {
            option.legend.data.push(item);
            option.series[0].data.push({value: communityData.tags.sex[item], name: item});
        }

        sexChart.setOption(option);
    }
    function initAge() {
        var ageChart = echarts.init(document.getElementById('age'));

        option = {
            title: {text: '管理分群分布', textStyle: {color: '#ffffff', fontWeight: 'normal'}},
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                orient: 'vertical',
                left: 'right',
                data: []
            },
            series: [
                {
                    name: '访问来源',
                    type: 'pie',
                    radius: '55%',
                    center: ['50%', '60%'],
                    data: [],
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        },
                        normal: {
                            label: {
                                show: true,
                                formatter: '{b} : {c}'
                            },
                            labelLine: {show: true}
                        }

                    }
                }
            ]
        };

        for (var item in communityData.tags.diseases) {
            option.legend.data.push(item);
            option.series[0].data.push({value: communityData.tags.diseases[item].amount, name: item});
        }

        ageChart.setOption(option);
    }

    $(function () {
        initT2D();
        initHBP();
        initAge();
        initSex();
        $('#circle').circleProgress({
            value: 0.6
        }).on('circle-animation-progress', function (event, progress) {
            $(this).find('strong').html(parseInt(100 * progress) + '<i>%</i>');
        });
    });
</script>
</body>
</html>