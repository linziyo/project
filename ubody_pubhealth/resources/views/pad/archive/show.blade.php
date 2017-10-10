<html>
<head>
    <title>建档</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="//cdn.bootcss.com/weui/1.1.2/style/weui.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/jquery-weui/1.0.1/css/jquery-weui.min.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="bd">
        <div class="page__bd">
            <div class="container" style="display:flex">
                <div style="flex:1">
                    <div class="weui-panel weui-panel_access">
                        <div class="weui-panel__hd">档案编号：@{{ code }}</div>
                        <div class="weui-panel__bd">
                            <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                    <img class="weui-media-box__thumb" src="{{ asset('images/default_avatar.jpg') }}"
                                         alt="">
                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">@{{ real_name }}
                                        <small>@{{ sex }} @{{ age }}岁</small>
                                    </h4>
                                    <p>@{{ nation }} @{{ marital_status }} @{{ education }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="weui-cells">
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">本人电话</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft"><a :href="'tel:' + mobile">@{{ mobile }}</a></div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">地址</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">@{{ address }}</div>
                        </div>
                    </div>
                    <div class="weui-cells">
                        <a class="weui-cell weui-cell_access">
                            <div class="weui-cell__hd"><label class="weui-label">档案</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft"></div>
                        </a>
                        <a class="weui-cell weui-cell_access">
                            <div class="weui-cell__hd"><label class="weui-label">签约</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft"></div>
                        </a>
                        <a class="weui-cell weui-cell_access">
                            <div class="weui-cell__hd"><label class="weui-label">随访</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft"></div>
                        </a>
                        <a class="weui-cell weui-cell_access">
                            <div class="weui-cell__hd"><label class="weui-label">家庭成员</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft"></div>
                        </a>
                        <a class="weui-cell weui-cell_access">
                            <div class="weui-cell__hd"><label class="weui-label">体检记录</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft"></div>
                        </a>
                        <a class="weui-cell weui-cell_access">
                            <div class="weui-cell__hd"><label class="weui-label">就诊记录</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft"></div>
                        </a>
                        <a class="weui-cell weui-cell_access">
                            <div class="weui-cell__hd"><label class="weui-label">转诊记录</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft"></div>
                        </a>
                    </div>
                </div>
                <div style="flex:3">
                    <div class="weui-cells">
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">出生日期</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">@{{ birthday }}</div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">职业</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">@{{ job }}</div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">工作单位</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">@{{ work_unit }}</div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">联系人</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">@{{ contact_name }} <a :href="'tel:' + contact_mobile">@{{ contact_mobile }}</a></div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">紧急联系人</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">@{{ emergency_contact_name }} <a :href="'tel:' + emergency_contact_mobile">@{{ emergency_contact_mobile }}</a></div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">血型</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">@{{ blood_group }} @{{ blood_group_rh }}</div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">医疗费用支付方式</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">
                                <label v-for="item in payment_modes">@{{ item.display_value }},</label>
                            </div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">药物过敏史</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">
                                <label v-for="item in allergies">@{{ item.display_value }},</label>
                            </div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">暴露史</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">
                                <label v-for="item in exposes">@{{ item.display_value }},</label>
                            </div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">遗传病史</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">@{{ hereditary_disease.display_value }}</div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">残疾情况</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">
                                <label v-for="item in disabilities">@{{ item.display_value }},</label>
                            </div>
                        </div>
                    </div>
                    <div class="weui-cells__title">既往史</div>
                    <div class="weui-cells">
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">疾病</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">
                                <label v-for="item in diseases">@{{ item.display_value }},</label>
                            </div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">手术</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">
                                <label v-for="item in operations">@{{ item.display_value }},</label>
                            </div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">外伤</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">
                                <label v-for="item in injuries">@{{ item.display_value }},</label>
                            </div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">输血</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">
                                <label v-for="item in transfusions">@{{ item.display_value }},</label>
                            </div>
                        </div>
                    </div>
                    <div class="weui-cells__title">家族史</div>
                    <div class="weui-cells">
                        <div class="weui-cell" v-for="family in families">
                            <div class="weui-cell__hd"><label class="weui-label">@{{ family.relationship }}</label>
                            </div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">@{{ family.display_value }}</div>
                        </div>
                    </div>
                    <div class="weui-cells__title">生活环境</div>
                    <div class="weui-cells">
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">厨房排风设施</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">@{{ living_kitchen.display_value }}</div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">燃料列席</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">@{{ living_fuel.display_value }}</div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">饮水</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">@{{ living_water.display_value }}</div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">厕所</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">@{{ living_toilet.display_value }}</div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label">禽畜栏</label></div>
                            <div class="weui-cell__bd"></div>
                            <div class="weui-cell__ft">@{{ living_fence.display_value }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="//cdn.bootcss.com/vue/2.4.1/vue.min.js"></script>
<script src="//cdn.bootcss.com/vue-resource/1.3.4/vue-resource.min.js"></script>
<script src="//cdn.bootcss.com/vue-router/2.7.0/vue-router.min.js"></script>
<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
<script>
    new Vue({
        http: {
            headers: {'Authorization': 'Bearer ' + JSON.parse(window.localStorage.getItem('token')).access_token}
        },
        el: "#app",
        data: {!! $model !!},
        methods: {
            submit: function (event) {
            }
        }
    });
</script>
</body>
</html>