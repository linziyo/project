<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>社区健康服务中心</title>
    <link rel="stylesheet" type="text/css" href="/css/statistics.css"/>
    <script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div class="statistics">
    <div class="top">社区健康服务中心</div>
    <div class="bottom">
        <div class="resident-filing">
            <div class="triangle">
                <img src="/images/triangle.png" />
            </div>
            <div class="filing-number">
                <span>居民建档总数</span>
            </div>
            <div class="total-documentation">
                <div class="total-top">
                    月累积建档总数<span class="month_archive_count">0</span>份
                </div>
                <div class="total-bottomLeft">
                    <div class="changzhu">常住人口</div>
                    <span class="permanent_residents_count">0</span>
                </div>
                <div class="total-bottomLeft">
                    <div class="changzhu">流动人口</div>
                    <span class="floating_population">0</span>
                </div>
            </div>
            <div class="record">
                <div class="record-left">
                    <p>建档率</p>
                    <div class="circle">
                        <div class="pie_left"><div class="leftt"></div></div>
                        <div class="pie_right"><div class="rightt"></div></div>
                        <div class="mask"><span class="create_archives_rate">0</span>%</div>
                    </div>
                </div>
                <div class="record-right">
                    <div class="title">
                        <div class="tu">
                            <img src="/images/jiandang.png"/>
                        </div>
                        建档用户
                    </div>
                    <ul class="latest_archive"></ul>
                </div>
            </div>
            <div class="tubiao">
                <p>单位/天</p>
                <div id="mase"></div>
            </div>
        </div>

        <div class="resident-filing management">
            <div class="residentsTop">
                <div class="triangle">
                    <img src="/images/triangle.png"/>
                </div>
                <div class="key-management">

                    <div class="residents">
                        重点管理居民
                    </div>
                    <div class="residents-bottom">
                        <div class="written">
                            2,6839
                        </div>
                        <div class="updown">
                            <img src="/images/updown.png"/>
                        </div>
                        <div class="beijing">
                            <div id="one"></div>
                        </div>
                        <div class="yiban">
                            <span></span>&nbsp;一般人群
                        </div>
                        <div class="yiban zhongdian">
                            <span></span>&nbsp;重点人群
                        </div>
                    </div>
                </div>
            </div>
            <div class="sanBottm">
                <div class="population">
                    <div class="popu-title">
                        管理人群分布
                    </div>
                    <div id="two"></div>
                </div>
                <div class="population old">
                    <div class="popu-title old_one">
                        建档年龄段
                    </div>
                    <div id="three"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="/js/echarts.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var month_archive_myChart = echarts.init(document.getElementById('mase'));
    // See https://github.com/ecomfe/echarts-stat
    var month_archive_data = {
        tooltip : {
            trigger: 'axis',
            axisPointer: {
                type: 'cross',
                label: {
                    backgroundColor: '#78c0f0'
                }
            }
        },
        legend: {

        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis : [
            {
                type : 'category',
                boundaryGap : false,
                data : [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        itemStyle : {
            normal:{
                color:'#78c0f0'
            }
        },
        series : [
            {
                name:'建档数据',
                type:'line',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'top'
                    },
                },
                areaStyle: {normal: {}},
                data:[1, 5, 61, 44, 55, 88, 66,1, 5, 61, 44, 55, 88, 66,1, 5, 61, 44, 55, 88, 66,1, 5, 61, 44, 55, 88, 66]
            }
        ]
    };

    // 使用刚指定的配置项和数据显示图表。
    month_archive_myChart.setOption(month_archive_data);
</script>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('one'));
    // See https://github.com/ecomfe/echarts-stat
    var option = {
        tooltip : {
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        series : [
            {
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                label: {
                    normal: {
                        show: false
                    },
                    emphasis: {
                        show: true
                    }
                },

                data:[
                    {
                        value:335,
                        name:'重点人群',
                        itemStyle : {
                            normal:{
                                color:'#d2ddc4'
                            }
                        },
                    },
                    {
                        value:310,
                        name:'一般人群',
                        axisLabel : {
                            textStyle : {
                                color: '#ffffff'
                            },
                        },
                        itemStyle : {
                            normal:{
                                color:'#74b02d'
                            }
                        },
                    }
                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };
    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var management_crowd_distribution_data = echarts.init(document.getElementById('two'));
    // See https://github.com/ecomfe/echarts-stat
    var distribution_data = {
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            left: 'right',
            data: ['南山区','罗湖区','龙岗区','福田区']
        },
        series : [
            {
                name: '访问来源',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data:[{value:0,name:'南山区'},
                    {value:0,name:'罗湖区'},
                    {value:0,name:'龙岗区'},
                    {value:0,name:'福田区'}],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };
    // 使用刚指定的配置项和数据显示图表。
    management_crowd_distribution_data.setOption(distribution_data);
</script>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var statistics_age_list_data = echarts.init(document.getElementById('three'));
    // See https://github.com/ecomfe/echarts-stat
    var statistics_age_data = {
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            left: 'right',
            data:['01-10岁','11-20岁','21-30岁','31-40岁','41-50岁','51-60岁','61-70岁','71-80岁','80岁以上']
        },

        calculable : true,
        series : [
            {
                name:'半径模式',
                type:'pie',
                radius : [50, 110],
                center : ['50%', '50%'],
                roseType : 'radius',
                label: {
                    normal: {
                        show: false
                    },
                    emphasis: {
                        show: true
                    }
                },

                data:[
                    {
                        value:10,
                        name:'01-10岁',
                        itemStyle : {
                            normal:{
                                color:'#a7ce50'
                            }
                        },
                    },
                    {
                        value:5,
                        name:'11-20岁',
                        itemStyle : {
                            normal:{
                                color:'#5dc0bc'
                            }
                        },
                    },
                    {
                        value:15,
                        name:'21-30岁',
                        itemStyle : {
                            normal:{
                                color:'#5385c4'
                            }
                        },
                    },
                    {
                        value:25,
                        name:'31-40岁',
                        itemStyle : {
                            normal:{
                                color:'#ed816c'
                            }
                        },
                    },
                    {
                        value:35,
                        name:'41-50岁',
                        itemStyle : {
                            normal:{
                                color:'#ea6a51'
                            }
                        },
                    },
                    {
                        value:45,
                        name:'51-60岁',
                        itemStyle : {
                            normal:{
                                color:'#f5a945'
                            }
                        },
                    },
                    {
                        value:55,
                        name:'61-70岁',
                        itemStyle : {
                            normal:{
                                color:'#f8bf45'
                            }
                        },
                    },
                    {
                        value:55,
                        name:'71-80岁',
                        itemStyle : {
                            normal:{
                                color:'#52a854'
                            }
                        },
                    },
                    {
                        value:55,
                        name:'80岁以上',
                        itemStyle : {
                            normal:{
                                color:'#66ba68'
                            }
                        },
                    },
                ]
            },
        ]
    };
    // 使用刚指定的配置项和数据显示图表。
    statistics_age_list_data.setOption(statistics_age_data);
</script>
<script type="text/javascript">
    $(function() {
        $('.record-right ul li:odd').addClass("huise");
        $('.circle').each(function(index, el) {
            var num = $(this).find('span').text() * 3.6;
            if (num<=180) {
                $(this).find('.rightt').css('transform', "rotate(" + num + "deg)");
            } else {
                $(this).find('.rightt').css('transform', "rotate(180deg)");
                $(this).find('.leftt').css('transform', "rotate(" + (num - 180) + "deg)");
            };
        });

        setInterval(function(){
            $.get("http://1.publichealth.ubody.local/tenant/archive/{{$id}}/statistics",function(data){
                if(data.status==200){
                    $('.top').text(data.data.hospital_name);
                    $('.month_archive_count').text(data.data.month_archive_count);
                    $('.permanent_residents_count').text(data.data.permanent_residents_count);
                    $('.floating_population').text(data.data.floating_population);
                    $('.create_archives_rate').text(data.data.create_archives_rate);

                    var latest_archive = data.data.latest_archive;
                    if(latest_archive){
                        var html = '';
                        for(var i=0;i<latest_archive.length;i++){
                            html += "<li><div class='icon'></div><span>"+latest_archive[i]['real_name']+"</span><span>"+latest_archive[i]['sex']+"</span></li>";
                        }
                        $('.latest_archive').html(html);
                    }

                    //每月建档分布图
                    var month_archive_data_key = new Array();
                    var month_archive_data_value = new Array();
                    var month_archive_list = data.data.month_archive_list;

                    if(month_archive_list){
                        for(var i=0;i<month_archive_list.length;i++){
                            month_archive_data_key.push(month_archive_list[i].index);
                            month_archive_data_value.push(month_archive_list[i].value);
                        }
                    }
                    month_archive_data.xAxis[0].data = month_archive_data_key;
                    month_archive_data.series[0].data = month_archive_data_value;
                    month_archive_myChart.setOption(month_archive_data);

                    //管理人群分布
                    var management_crowd_key = new Array();
                    var management_crowd_value = new Array();
                    var management_crowd_distribution = data.data.management_crowd_distribution;

                    if(management_crowd_distribution){
                        for(var i=0;i<management_crowd_distribution.length;i++){
                            management_crowd_key.push(management_crowd_distribution[i].name);
                            var obj = {
                                value:management_crowd_distribution[i].value,
                                name:management_crowd_distribution[i].name
                            }
                            management_crowd_value.push(obj);
                        }
                    }

                    distribution_data.legend.data = management_crowd_key;
                    distribution_data.series[0].data = management_crowd_value;
                    management_crowd_distribution_data.setOption(distribution_data);

                    //建档年龄段
                    var statistics_age_list = data.data.statistics_age_list;
                    if(statistics_age_list){
                        for(var i=0;i<statistics_age_list.length;i++){
                            var value = statistics_age_list[i].value;
                            statistics_age_data.series[0].data[i].value = value;
                        }
                    }
                    statistics_age_list_data.setOption(statistics_age_data);
                }
            });
        },10000);
    });
</script>