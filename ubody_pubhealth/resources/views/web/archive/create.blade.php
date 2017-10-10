<html>
<head>
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
            <div class="weui-cells">
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="code">姓名</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="code" type="text" class="weui-input" v-model="archive.code"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="id_code">身份证号码</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="id_code" type="text" class="weui-input" v-model="archive.id_code"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="work_unit">工作单位</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="work_unit" type="text" class="weui-input" v-model="archive.work_unit"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="phone_number">本人电话</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="phone_number" type="text" class="weui-input" v-model="archive.phone_number"/>
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
                                       v-model="archive.contact_person" placeholder="姓名"/>
                            </div>
                            <div class="weui-flex-item">
                                <input id="contact_mobile" type="text" class="weui-input"
                                       v-model="archive.contact_mobile" placeholder="电话"/>
                            </div>
                        </div>
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
                                       v-model="archive.contact_person" placeholder="姓名"/>
                            </div>
                            <div class="weui-flex-item">
                                <input id="contact_mobile" type="text" class="weui-input"
                                       v-model="archive.contact_mobile" placeholder="电话"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="is_register">常住类型</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="is_register" type="checkbox" class='weui-check' v-model="archive.is_register"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="nation">民族</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="nation" type="text" class="weui-input" v-model="archive.nation"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="education">文化程度</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="education" type="text" class="weui-input" v-model="archive.education"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="job">职业</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="job" type="text" class="weui-input" v-model="archive.job"/>
                    </div>
                </div>
                <div class="weui-cell">
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
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="payment_modes">医保支付方式</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="payment_modes" type="text" class="weui-input" v-model="archive.payment_modes"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="allergies">药物过敏史</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="allergies" type="text" class="weui-input" v-model="archive.allergies"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="exposes">暴露史</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="exposes" type="text" class="weui-input" v-model="archive.exposes"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="hereditary">遗传病史</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="hereditary" type="text" class="weui-input" v-model="archive.hereditary"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="disability">残疾情况</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="disability" type="text" class="weui-input" v-model="archive.disability"/>
                    </div>
                </div>
            </div>
            <div class="weui-cells__title">既往史</div>
            <div class="weui-cells">
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
            <div class="weui-cells">
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
            <div class="weui-cells">
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="disease">厨房排风设施</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="disease" type="text" class="weui-input" v-model="archive.disease"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="operation">燃料类型</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="operation" type="text" class="weui-input" v-model="archive.operation"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="injury">饮水</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="injury" type="text" class="weui-input" v-model="archive.injury"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="transfusion">厕所</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="transfusion" type="text" class="weui-input" v-model="archive.transfusion"/>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <a class="weui-cell weui-cell_access">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="transfusion">禽畜栏</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input id="transfusion" type="text" class="weui-input" v-model="archive.transfusion"/>
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
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
<script>
    vue = new Vue({
        el: "#app",
        data: {
            archive: {},
            nations: [
                '阿昌族', '白族', '保安族', '布朗族', '朝鲜族', '达斡尔族', '傣族', '德昂族', '东乡族', '侗族', '独龙族',
                '俄罗斯族', '鄂伦春族', '鄂温克族', '高山族', '仡佬族', '哈尼族', '哈萨克族', '汉族', '赫哲族', '回族',
                '基诺族', '京族', '景颇族', '柯尔克孜族', '拉祜族', '黎族', '傈僳族', '珞巴族', '满族', '毛南族', '门巴族',
                '蒙古族', '苗族', '仫佬族', '怒族', '普米族', '羌族', '撒拉族', '畲族', '水族', '塔吉克族', '塔塔尔族',
                '土家族', '土族', '佤族', '维吾尔族', '乌孜别克族', '锡伯族', '瑶族', '彝族', '裕固族', '藏族', '壮族'
            ]
        },
        created: function () {
            $("#job").select({
                title: "选择职业",
                items: vue.archive.nations
            });

            this.$http.get('/api/archives/1').then(function (result) {
                vue.archive = result.body;
            });
        },
        methods: {
            submit: function (event) {
                alert(vue.archive.code);
            }
        }
    });
</script>
</body>
</html>