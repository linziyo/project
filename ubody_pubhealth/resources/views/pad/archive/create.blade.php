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
            <div class="weui-cells__title">基本信息</div>
            <div class="weui-cells weui-cells_form">
                <div class="weui-cell weui-cell_warn">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="code">姓名</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="code" type="text" class="weui-input" v-model="archive.code" placeholder="请输入姓名"/>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-warn"></i>
                    </div>
                </div>
                <div class="weui-cell weui-cell_warn">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="id_code">身份证号码</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="id_code" type="number" class="weui-input" v-model="archive.id_code"
                               placeholder="请输入身份证号码"/>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-success-no-circle"></i>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="work_unit">工作单位</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="work_unit" type="text" class="weui-input" v-model="archive.work_unit"
                               placeholder="请输入工作单位"/>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-warn"></i>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="phone_number">本人电话</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="phone_number" type="tel" class="weui-input" v-model="archive.phone_number"
                               placeholder="请输入本人电话"/>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-warn"></i>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="contact_person">联系人</label>
                    </div>
                    <div class="weui-cell__bd">
                        <div class="weui-flex">
                            <div class="weui-flex-item">
                                <input id="contact_person" type="text" class="weui-input"
                                       v-model="archive.contact_person" placeholder="联系人姓名"/>
                            </div>
                            <div class="weui-flex-item">
                                <input id="contact_mobile" type="tel" class="weui-input"
                                       v-model="archive.contact_mobile" placeholder="联系人电话"/>
                            </div>
                        </div>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-warn"></i>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="phone_number">紧急联系人</label>
                    </div>
                    <div class="weui-cell__bd">
                        <div class="weui-flex">
                            <div class="weui-flex-item">
                                <input id="contact_person" type="text" class="weui-input"
                                       v-model="archive.contact_person" placeholder="紧急联系人姓名"/>
                            </div>
                            <div class="weui-flex-item">
                                <input id="contact_mobile" type="tel" class="weui-input"
                                       v-model="archive.contact_mobile" placeholder="紧急联系人电话"/>
                            </div>
                        </div>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-warn"></i>
                    </div>
                </div>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="is_register">常住类型</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="is_register" type="text" class='weui-input' v-model="archive.is_register"/>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-success-no-circle"></i>
                    </div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="nation">民族</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="nation" type="text" class="weui-input" v-model="archive.nation" readonly="readonly"/>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-success-no-circle"></i>
                    </div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="education">文化程度</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="education" type="text" class="weui-input" v-model="archive.education"/>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-success-no-circle"></i>
                    </div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="job">职业</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="job" type="text" class="weui-input" v-model="archive.job"/>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-success-no-circle"></i>
                    </div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="blood_group">血型</label>
                    </div>
                    <div class="weui-cell__bd">
                        <div class="weui-flex">
                            <div class="weui-flex-item">
                                <input id="blood_group" type="text" class="weui-input" v-model="archive.blood_group"
                                       placeholder="血型"/>
                            </div>
                            <div class="weui-flex-item">
                                <input id="blood_group_rh" type="text" class="weui-input"
                                       v-model="archive.blood_group_rh" placeholder="阴性/阳性"/>
                            </div>
                        </div>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-success-no-circle"></i>
                    </div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="payment_modes">医保支付方式</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="payment_modes" type="text" class="weui-input" v-model="archive.payment_modes"/>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-success-no-circle"></i>
                    </div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="allergies">药物过敏史</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="allergies" type="text" class="weui-input" v-model="archive.allergies"/>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-success-no-circle"></i>
                    </div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="exposes">暴露史</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="exposes" type="text" class="weui-input" v-model="archive.exposes"/>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-success-no-circle"></i>
                    </div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="hereditary">遗传病史</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="hereditary" type="text" class="weui-input" v-model="archive.hereditary"/>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-success-no-circle"></i>
                    </div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="disability">残疾情况</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="disability" type="text" class="weui-input" v-model="archive.disability"/>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-success-no-circle"></i>
                    </div>
                </a>
            </div>
            <div class="weui-cells__title">既往史</div>
            <div class="weui-cells weui-cells_form">
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="disease">疾病</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="disease" type="text" class="weui-input" v-model="archive.disease"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="operation">手术</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="operation" type="text" class="weui-input" v-model="archive.operation"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="injury">外伤</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="injury" type="text" class="weui-input" v-model="archive.injury"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="transfusion">输血</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="transfusion" type="text" class="weui-input" v-model="archive.transfusion"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
            </div>
            <div class="weui-cells__title">家族史</div>
            <div class="weui-cells weui-cells_form">
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="disease">父亲</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="disease" type="text" class="weui-input" v-model="archive.disease"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="operation">母亲</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="operation" type="text" class="weui-input" v-model="archive.operation"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="injury">兄弟姐妹</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="injury" type="text" class="weui-input" v-model="archive.injury"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="transfusion">子女</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="transfusion" type="text" class="weui-input" v-model="archive.transfusion"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
            </div>
            <div class="weui-cells__title">生活环境</div>
            <div class="weui-cells weui-cells_form">
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="living_environment_kitchen">厨房排风设施</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="living_environment_kitchen" type="text" class="weui-input"
                               v-model="archive.living_environment_kitchen"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="living_environment_fuel">燃料类型</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="living_environment_fuel" type="text" class="weui-input"
                               v-model="archive.living_environment_fuel"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="living_environment_water">饮水</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="living_environment_water" type="text" class="weui-input"
                               v-model="archive.living_environment_water"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="living_environment_toilet">厕所</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="living_environment_toilet" type="text" class="weui-input"
                               v-model="archive.living_environment_toilet"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="living_environment_fence">禽畜栏</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="living_environment_fence" type="text" class="weui-input"
                               v-model="archive.living_environment_fence"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
            </div>
            <label for="weuiAgree" class="weui-agree">
                <input id="weuiAgree" type="checkbox" class="weui-agree__checkbox">
                <span class="weui-agree__text">阅读并同意<a href="javascript:void(0);">《相关条款》</a></span>
            </label>
            <div class="weui-btn-area">
                <button type="button" class="weui-btn weui-btn_primary" v-on:click='submit'>提交</button>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.bootcss.com/vue/2.4.1/vue.min.js"></script>
<script src="//cdn.bootcss.com/vue-resource/1.3.4/vue-resource.min.js"></script>
<script src="//cdn.bootcss.com/vue-router/2.7.0/vue-router.min.js"></script>
<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
<script src="{{ asset('js/archive.js') }}"></script>
<script>
    new Vue({
        el: "#app",
        data: {
            archive: {}
        },
        created: function () {
            if (window.localStorage) {
            }

        },
        methods: {
            submit: function (event) {
                location.href = '{{ URL::action('Pad\ArchiveController@index') }}';
            }
        }
    });
</script>
</body>
</html>