$(function () {
    $("#is_register").select({
        title: "选择常住类型",
        items: [
            {title: '户籍', value: 1},
            {title: '非户籍', value: 0}
        ]
    });

    $("#nation").select({
        title: "选择民族",
        items: [
            '阿昌族', '白族', '保安族', '布朗族', '朝鲜族', '达斡尔族', '傣族', '德昂族', '东乡族', '侗族', '独龙族',
            '俄罗斯族', '鄂伦春族', '鄂温克族', '高山族', '仡佬族', '哈尼族', '哈萨克族', '汉族', '赫哲族', '回族',
            '基诺族', '京族', '景颇族', '柯尔克孜族', '拉祜族', '黎族', '傈僳族', '珞巴族', '满族', '毛南族', '门巴族',
            '蒙古族', '苗族', '仫佬族', '怒族', '普米族', '羌族', '撒拉族', '畲族', '水族', '塔吉克族', '塔塔尔族',
            '土家族', '土族', '佤族', '维吾尔族', '乌孜别克族', '锡伯族', '瑶族', '彝族', '裕固族', '藏族', '壮族']
    });

    $("#education").select({
        title: "选择文化程度",
        items: [
            {title: '研究生', value: 1},
            {title: '大学本科', value: 2},
            {title: '大学专科和专科学校', value: 3},
            {title: '中等专业学校', value: 4},
            {title: '技工学校', value: 5},
            {title: '高中', value: 6},
            {title: '初中', value: 7},
            {title: '小学', value: 8},
            {title: '文盲或半文盲', value: 9},
            {title: '不详', value: 10}]
    });

    $("#job").select({
        title: "选择文化职业",
        items: [
            {title: '国家机关、党群组织、企业、事业单位负责人', value: 0},
            {title: '专业技术人员', value: 1},
            {title: '办事人员和有关人员', value: 2},
            {title: '商业、服务业人员', value: 3},
            {title: '农、林、牧、渔、水利业生产人员', value: 4},
            {title: '生产、运输设备操作人员及有关人员', value: 5},
            {title: '军人', value: 6},
            {title: '不便分类的其他从业人员', value: 7},
            {title: '无职业', value: 8}]
    });

    $("#blood_group").select({
        title: "请选择血型",
        items: [
            {title: 'A型', value: 1},
            {title: 'B型', value: 2},
            {title: 'O型', value: 3},
            {title: 'AB型', value: 4},
            {title: '不详', value: 5}
        ]
    });

    $("#blood_group_rh").select({
        title: "请选择血型",
        items: [
            {title: '阴性', value: 1},
            {title: '阳性', value: 2},
            {title: '不详', value: 3}
        ]
    });

    $("#payment_modes").select({
        title: "选择文化职业",
        multi: true,
        items: [
            {title: '城镇职工基本医疗保险', value: 1},
            {title: '城镇居民基本医疗保险', value: 2},
            {title: '新型农村合作医疗', value: 3},
            {title: '贫困救助', value: 4},
            {title: '商业医疗保险', value: 5},
            {title: '全公费', value: 6},
            {title: '全自费', value: 7},
            {title: '其他', value: 8}],
        onChange: function (result) {
            for (var i = 0; i < result.valuesArray.length; i++) {
                if (result.valuesArray[i] == 8) {
                    $.prompt({
                        title: '请输入支付方式',
                        empty: false, // 是否允许为空
                        onOK: function (input) {
                            alert(input);
                        },
                        onCancel: function () {
                            //点击取消
                        }
                    });
                }
            }
        }
    });

    $("#allergies").select({
        title: "选择药物过敏史",
        multi: true,
        items: [
            {title: '无', value: 1},
            {title: '青霉素', value: 2},
            {title: '磺胺', value: 3},
            {title: '链霉素', value: 4},
            {title: '其他', value: 5}
        ],
        onChange: function (result) {
            for (var i = 0; i < result.valuesArray.length; i++) {
                if (result.valuesArray[i] == 1) {
                    result.valuesArray = [];
                }
                if (result.valuesArray[i] == 5) {
                    $.prompt({
                        title: '请输入过敏药物',
                        empty: false, // 是否允许为空
                        onOK: function (input) {
                            alert(input);
                        },
                        onCancel: function () {
                            //点击取消
                        }
                    });
                    break;
                }
            }
        }
    });

    $("#exposes").select({
        title: "选择药物过敏史",
        multi: true,
        items: [
            {title: '无', value: 1},
            {title: '化学品', value: 2},
            {title: '毒物', value: 3},
            {title: '射线', value: 4}
        ],
        onChange: function (result) {
        }
    });

    $("#hereditary").select({
        title: "选择药物过敏史",
        items: [
            {title: '无', value: 1},
            {title: '有', value: 2}
        ],
        onChange: function (result) {
        }
    });

    $("#disability").select({
        title: "选择残疾情况",
        multi: true,
        items: [
            {title: '无残疾', value: 1},
            {title: '视力残疾', value: 2},
            {title: '听力残疾', value: 3},
            {title: '言语残疾', value: 4},
            {title: '肢体残疾', value: 5},
            {title: '智力残疾', value: 6},
            {title: '精神残疾', value: 7},
            {title: '其他残疾', value: 8}
        ],
        onChange: function (result) {
        }
    });

    $("#living_environment_kitchen").select({
        title: "选择厨房排风设施",
        items: [{title: '无', value: 1}, {title: '油烟机', value: 2}, {title: '换气扇', value: 3}, {title: '烟囱', value: 4}]
    });
    $("#living_environment_fuel").select({
        title: "选择燃料类型",
        items: [
            {title: '液化气', value: 1},
            {title: '煤', value: 2},
            {title: '天然气', value: 3},
            {title: '沼气', value: 4},
            {title: '柴火', value: 5},
            {title: '其他', value: 6}
        ]
    });
    $("#living_environment_water").select({
        title: "选择饮水",
        items: [
            {title: '自来水', value: 1},
            {title: '经净化过滤的水', value: 2},
            {title: '井水', value: 3},
            {title: '河湖水', value: 4},
            {title: '塘水', value: 5},
            {title: '其他', value: 6}
        ]
    });
    $("#living_environment_toilet").select({
        title: "选择饮水",
        items: [
            {title: '卫生厕所', value: 1},
            {title: '一格或二格粪池式', value: 2},
            {title: '马桶', value: 3},
            {title: '露天粪坑', value: 4},
            {title: '简易棚厕', value: 5}
        ]
    });
    $("#living_environment_fence").select({
        title: "选择禽畜栏",
        items: [
            {title: '无', value: 1},
            {title: '单设', value: 2},
            {title: '室内', value: 3},
            {title: '室外', value: 4}
        ]
    });
});