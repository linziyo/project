@extends('wechat.layout')
@section('css')
    <link href="{{url('assets/jqweuix/css/jqweuix.css')}}" rel="stylesheet"/>
@endsection
@section('wechat_content')
    <form action="{{ URL::action('Wechat\ArchiveController@store') }}" method="post" onsubmit="return submitForm(this)">
        <input type="hidden" id="community_id" name="community_id" value="{{ $community->id }}"/>
        <div class="weui-cells__title">基本信息</div>
        <div class="weui-cells weui-cells_form">
            <div id="actionRealName" class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">姓名</label></div>
                <div class="weui-cell__bd">
                    <input id="real_name" name="real_name" class="weui-input" type="text" placeholder="请输入姓名"
                           value="{{ $user->real_name }}"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div id="actionIdCode" class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">身份证号码</label></div>
                <div class="weui-cell__bd">
                    <input id="id_code" name="id_code" class="weui-input" type="text" placeholder="请输入身份证号码"
                           value="{{ $user->id_code }}"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div id="actionMobile" class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">联系电话</label></div>
                <div class="weui-cell__bd">
                    <input id="mobile" name="mobile" class="weui-input" type="text" placeholder="请输入联系电话"
                           value="{{ $user->mobile }}"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div id="actionAddress" class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">常住地址</label></div>
                <div class="weui-cell__bd">
                    <input id="address" name="address" class="weui-input" type="text" placeholder="请输入常住地址"
                           value="{{ $user->address }}"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
        </div>

        <div class="weui-cells weui-cells_form">
            <label id="actionPaymentMode" class="weui-cell">
                <div class="weui-cell__hd">
                    <label for="payment_mode" class="weui-label">费用支付方式</label>
                </div>
                <div class="weui-cell__bd">
                    <input type="text" id="payment_mode" name="payment_mode" class="weui-input" readonly/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </label>
            <label id="actionAllergicHistory" class="weui-cell">
                <div class="weui-cell__hd">
                    <label for="allergic_history" class="weui-label">药物过敏史</label>
                </div>
                <div class="weui-cell__bd">
                    <input type="text" id="allergic_history" name="allergic_history" class="weui-input" readonly/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </label>
            <label id="actionExpose" class="weui-cell">
                <div class="weui-cell__hd">
                    <label for="expose" class="weui-label">暴露史</label>
                </div>
                <div class="weui-cell__bd">
                    <input type="text" id="expose" name="expose" class="weui-input" readonly/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </label>
            <label id="actionMedicalHistory" class="weui-cell">
                <div class="weui-cell__hd">
                    <label for="medical_history" class="weui-label">既往病史</label>
                </div>
                <div class="weui-cell__bd">
                    <input type="text" id="medical_history" name="medical_history" class="weui-input" readonly/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </label>
            <label id="actionFamilyHistory" class="weui-cell">
                <div class="weui-cell__hd">
                    <label for="family_history" class="weui-label">家族病史</label>
                </div>
                <div class="weui-cell__bd">
                    <input type="hidden" id="family_history_father" name="family_history_father"/>
                    <input type="hidden" id="family_history_mother" name="family_history_mother"/>
                    <input type="hidden" id="family_history_children" name="family_history_children"/>
                    <input type="hidden" id="family_history_sibling" name="family_history_sibling"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </label>
            <label id="actionDiseaseHistory" class="weui-cell">
                <div class="weui-cell__hd">
                    <label for="disease_history" class="weui-label">遗传病史</label>
                </div>
                <div class="weui-cell__bd">
                    <input type="text" id="disease_history" name="disease_history" class="weui-input" readonly/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </label>
            <label id="actionDisabilityHistory" class="weui-cell">
                <div class="weui-cell__hd">
                    <label for="disability_history" class="weui-label">残疾情况</label>
                </div>
                <div class="weui-cell__bd">
                    <input type="text" id="disability_history" name="disability_history" class="weui-input" readonly/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </label>
            <label id="actionLivingEnvironment" class="weui-cell">
                <div class="weui-cell__hd">
                    <label for="living_environment" class="weui-label">生活环境</label>
                </div>
                <div class="weui-cell__bd">
                    <input type="hidden" id="living_environment_kitchen" name="living_environment_kitchen"/>
                    <input type="hidden" id="living_environment_fuel" name="living_environment_fuel"/>
                    <input type="hidden" id="living_environment_water" name="living_environment_water"/>
                    <input type="hidden" id="living_environment_toilet" name="living_environment_toilet"/>
                    <input type="hidden" id="living_environment_fence" name="living_environment_fence"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </label>
        </div>

        <div class="weui-btn-area">
            <button type="submit" class="weui-btn weui-btn_primary">提交</button>
        </div>
    </form>

    <div id="popupFamilyHistory" class="weui-popup__container">
        <div class="weui-popup__overlay"></div>
        <div class="weui-popup__modal">
            <div class="toolbar">
                <div class="toolbar-inner">
                    <a href="javascript:;" class="picker-button close-popup">关闭</a>
                    <h1 class="title">家族病史</h1>
                </div>
            </div>
            <div class="modal-content">
                <div class="weui-tab">
                    <div class="weui-navbar">
                        <a class="weui-navbar__item weui-bar__item--on" href="#familyHistoryTab1">父亲</a>
                        <a class="weui-navbar__item" href="#familyHistoryTab2">母亲</a>
                        <a class="weui-navbar__item" href="#familyHistoryTab3">子女</a>
                        <a class="weui-navbar__item" href="#familyHistoryTab4">兄弟姐妹</a>
                    </div>
                    <div class="weui-tab__bd">
                        <div id="familyHistoryTab1" class="weui-tab__bd-item weui-tab__bd-item--active"></div>
                        <div id="familyHistoryTab2" class="weui-tab__bd-item"></div>
                        <div id="familyHistoryTab3" class="weui-tab__bd-item"></div>
                        <div id="familyHistoryTab4" class="weui-tab__bd-item"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="popupLivingEnvironment" class="weui-popup__container">
        <div class="weui-popup__overlay"></div>
        <div class="weui-popup__modal">
            <div class="toolbar">
                <div class="toolbar-inner">
                    <a href="javascript:;" class="picker-button close-popup">关闭</a>
                    <h1 class="title">居住环境</h1>
                </div>
            </div>
            <div class="modal-content">
                <div class="weui-tab">
                    <div class="weui-navbar">
                        <a class="weui-navbar__item weui-bar__item--on" href="#livingEnvironmentTab1">厨房排风</a>
                        <a class="weui-navbar__item" href="#livingEnvironmentTab2">燃料类型</a>
                        <a class="weui-navbar__item" href="#livingEnvironmentTab3">饮水</a>
                        <a class="weui-navbar__item" href="#livingEnvironmentTab4">厕所</a>
                        <a class="weui-navbar__item" href="#livingEnvironmentTab5">禽畜栏</a>
                    </div>
                    <div class="weui-tab__bd">
                        <div id="livingEnvironmentTab1" class="weui-tab__bd-item weui-tab__bd-item--active">
                            <div class="weui-cells weui-cells_checkbox">
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>无</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="无">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>油烟机</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="油烟机">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>换气扇</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="换气扇">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>烟囱</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="烟囱">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div id="livingEnvironmentTab2" class="weui-tab__bd-item">
                            <div class="weui-cells weui-cells_checkbox">
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>液化气</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="液化气">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>煤</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="煤">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>天然气</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="天然气">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>沼气</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="沼气">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>柴火</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="柴火">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div id="livingEnvironmentTab3" class="weui-tab__bd-item">
                            <div class="weui-cells weui-cells_checkbox">
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>自来水</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="自来水">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>经净化过滤的水</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="经净化过滤的水">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>井水</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="井水">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>河湖水</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="河湖水">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>塘水</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="塘水">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>其他</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="其他">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div id="livingEnvironmentTab4" class="weui-tab__bd-item">
                            <div class="weui-cells weui-cells_checkbox">
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>卫生厕所</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="卫生厕所">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>一格或二格粪池式</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="一格或二格粪池式">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>马桶</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="马桶">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>露天粪坑</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="露天粪坑">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>简易棚厕</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="简易棚厕">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div id="livingEnvironmentTab5" class="weui-tab__bd-item">
                            <div class="weui-cells weui-cells_checkbox">
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>无</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="无">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>单设</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="单设">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>室内</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="室内">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                                <label class="weui-cell weui-check_label">
                                    <div class="weui-cell__bd weui-cell_primary"><p>室外</p></div>
                                    <div class="weui-cell__ft">
                                        <input type="checkbox" class="weui-check" name="weui-select" value="室外">
                                        <span class="weui-icon-checked"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script id="tplCheckboxTemplate" type="text/template">
        <div class="weui-cells weui-cells_checkbox">
            <%for(var i = 0; i < list.length; i++) {%>
            <label class="weui-cell weui-check_label">
                <div class="weui-cell__bd weui-cell_primary">
                    <p><%:=list[i]%></p>
                </div>
                <div class="weui-cell__ft">
                    <input type="checkbox" class="weui-check" name="weui-select" value="<%:=list[i]%>"/>
                    <span class="weui-icon-checked"></span>
                </div>
            </label>
            <%}%>
        </div>
    </script>
    <script type="text/javascript" src="{{ url('/assets/jqweuix/js/super_select.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/template.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $("#payment_mode").select({
                title: '医疗费用支付方式',
                items: ['城镇职工基本医疗保险', '城镇居民基本医疗保险', '新型农村合作医疗', '贫困救助', '商业医疗保险', '全公费', '全自费', '其他']
            });

            $("#allergic_history").superSelect({
                title: '药物过敏史', multi: true, items: ['无', '青霉素', '磺胺', '链霉素', '其他'],
                onItemChecked: function (dialog, isChecked, value) {
                    if (value == '无') {
                        dialog.find('input[type=checkbox]').not('input[value=无]').prop('checked', false);
                    } else {
                        dialog.find('input[type=checkbox][value=无]').prop('checked', false);
                    }
                }
            });

            $("#expose").superSelect({
                title: '暴露史', multi: true, items: ['无', '化学品', '毒物', '射线'],
                onItemChecked: function (dialog, isChecked, value) {
                    if (value == '无') {
                        dialog.find('input[type=checkbox]').not('input[value=无]').prop('checked', false);
                    } else {
                        dialog.find('input[type=checkbox][value=无]').prop('checked', false);
                    }
                }
            });

            $("#medical_history").superSelect({
                title: '既往病史',
                multi: true,
                items: ['无', '高血压', '恶性肿瘤', '肝炎', '糖尿病', '严重精神障碍', '先天畸形', '冠心病', '慢性阻塞性肺炎', '脑卒中', '其他'],
                onItemChecked: function (dialog, isChecked, value) {
                    if (value == '无') {
                        dialog.find('input[type=checkbox]').not('input[value=无]').prop('checked', false);
                    } else {
                        dialog.find('input[type=checkbox][value=无]').prop('checked', false);
                    }
                }
            });

            $("#disease_history").superSelect({
                title: '遗传病史', multi: true, items: ['无', '有'],
                onItemChecked: function (dialog, isChecked, value) {
                    if (value == '无') {
                        dialog.find('input[type=checkbox]').not('input[value=无]').prop('checked', false);
                    } else {
                        dialog.find('input[type=checkbox][value=无]').prop('checked', false);
                    }
                }
            });

            $("#disability_history").superSelect({
                title: '残疾情况', multi: true, items: ['无', '视力残疾', '言语残疾', '肢体残疾', '智力残疾', '精神残疾', '其他'],
                onItemChecked: function (dialog, isChecked, value) {
                    if (value == '无') {
                        dialog.find('input[type=checkbox]').not('input[value=无]').prop('checked', false);
                    } else {
                        dialog.find('input[type=checkbox][value=无]').prop('checked', false);
                    }
                }
            });

            $("#actionFamilyHistory").click(function () {
                $("#popupFamilyHistory").popup();

                $("#familyHistoryTab1").find('.weui-check').click(function () {
                    if ($(this).val() == '无') {
                        $("#familyHistoryTab1").find('input[type=checkbox]').not('input[value=无]').prop('checked', false);
                    } else {
                        $("#familyHistoryTab1").find('input[type=checkbox][value=无]').prop('checked', false);
                    }

                    var checked = $('#familyHistoryTab1').find("input:checked");
                    var values = checked.map(function () {
                        return $(this).val();
                    });
                    $('#family_history_father').val(values.join(','));
                });

                $("#familyHistoryTab2").find('.weui-check').click(function () {
                    if ($(this).val() == '无') {
                        $("#familyHistoryTab2").find('input[type=checkbox]').not('input[value=无]').prop('checked', false);
                    } else {
                        $("#familyHistoryTab2").find('input[type=checkbox][value=无]').prop('checked', false);
                    }

                    var checked = $('#familyHistoryTab2').find("input:checked");
                    var values = checked.map(function () {
                        return $(this).val();
                    });
                    $('#family_history_mother').val(values.join(','));
                });

                $("#familyHistoryTab3").find('.weui-check').click(function () {
                    if ($(this).val() == '无') {
                        $("#familyHistoryTab3").find('input[type=checkbox]').not('input[value=无]').prop('checked', false);
                    } else {
                        $("#familyHistoryTab3").find('input[type=checkbox][value=无]').prop('checked', false);
                    }

                    var checked = $('#familyHistoryTab3').find("input:checked");
                    var values = checked.map(function () {
                        return $(this).val();
                    });
                    $('#family_history_children').val(values.join(','));
                });

                $("#familyHistoryTab4").find('.weui-check').click(function () {
                    if ($(this).val() == '无') {
                        $("#familyHistoryTab4").find('input[type=checkbox]').not('input[value=无]').prop('checked', false);
                    } else {
                        $("#familyHistoryTab4").find('input[type=checkbox][value=无]').prop('checked', false);
                    }

                    var checked = $('#familyHistoryTab4').find("input:checked");
                    var values = checked.map(function () {
                        return $(this).val();
                    });
                    $('#family_history_sibling').val(values.join(','));
                });
            });

            $("#actionLivingEnvironment").click(function () {
                $("#popupLivingEnvironment").popup();

                $("#livingEnvironmentTab1").find('.weui-check').click(function () {
                    if ($(this).val() == '无') {
                        $("#livingEnvironmentTab1").find('input[type=checkbox]').not('input[value=无]').prop('checked', false);
                    } else {
                        $("#livingEnvironmentTab1").find('input[type=checkbox][value=无]').prop('checked', false);
                    }

                    var checked = $('#livingEnvironmentTab1').find("input:checked");
                    var values = checked.map(function () {
                        return $(this).val();
                    });
                    $('#living_environment_kitchen').val(values.join(','));
                });

                $("#livingEnvironmentTab2").find('.weui-check').click(function () {
                    if ($(this).val() == '无') {
                        $("#livingEnvironmentTab2").find('input[type=checkbox]').not('input[value=无]').prop('checked', false);
                    } else {
                        $("#livingEnvironmentTab2").find('input[type=checkbox][value=无]').prop('checked', false);
                    }

                    var checked = $('#livingEnvironmentTab2').find("input:checked");
                    var values = checked.map(function () {
                        return $(this).val();
                    });
                    $('#living_environment_fuel').val(values.join(','));
                });

                $("#livingEnvironmentTab3").find('.weui-check').click(function () {
                    if ($(this).val() == '无') {
                        $("#livingEnvironmentTab3").find('input[type=checkbox]').not('input[value=无]').prop('checked', false);
                    } else {
                        $("#livingEnvironmentTab3").find('input[type=checkbox][value=无]').prop('checked', false);
                    }

                    var checked = $('#livingEnvironmentTab3').find("input:checked");
                    var values = checked.map(function () {
                        return $(this).val();
                    });
                    $('#living_environment_water').val(values.join(','));
                });

                $("#livingEnvironmentTab4").find('.weui-check').click(function () {
                    if ($(this).val() == '无') {
                        $("#livingEnvironmentTab4").find('input[type=checkbox]').not('input[value=无]').prop('checked', false);
                    } else {
                        $("#livingEnvironmentTab4").find('input[type=checkbox][value=无]').prop('checked', false);
                    }

                    var checked = $('#livingEnvironmentTab4').find("input:checked");
                    var values = checked.map(function () {
                        return $(this).val();
                    });
                    $('#living_environment_toilet').val(values.join(','));
                });

                $("#livingEnvironmentTab5").find('.weui-check').click(function () {
                    if ($(this).val() == '无') {
                        $("#livingEnvironmentTab5").find('input[type=checkbox]').not('input[value=无]').prop('checked', false);
                    } else {
                        $("#livingEnvironmentTab5").find('input[type=checkbox][value=无]').prop('checked', false);
                    }

                    var checked = $('#livingEnvironmentTab5').find("input:checked");
                    var values = checked.map(function () {
                        return $(this).val();
                    });
                    $('#living_environment_fence').val(values.join(','));
                });
            });

            var medical = ['无', '高血压', '恶性肿瘤', '肝炎', '糖尿病', '严重精神障碍', '先天畸形', '冠心病', '慢性阻塞性肺炎', '脑卒中', '其他'];
            $("#popupFamilyHistory").find(".weui-tab__bd-item").each(function (i, j) {
                var tpl = $('#tplCheckboxTemplate').html()
                $(this).html(template(tpl, {list: medical}));
            });
        });

        function submitForm(form) {
            $.showLoading();

            $.ajax({
                url: '{{ URL::action('Wechat\ArchiveController@store') }}',
                data: {
                    'community_id': $('#community_id').val(),
                    'real_name': $('#real_name').val(),
                    'id_code': $('#id_code').val(),
                    'mobile': $('#mobile').val(),
                    'address': $('#address').val(),
                    'payment_mode': $('#payment_mode').val(),
                    'allergic_history': $('#allergic_history').val(),
                    'expose': $('#expose').val(),
                    'medical_history': $('#medical_history').val(),
                    'family_history_father': $('#family_history_father').val(),
                    'family_history_mother': $('#family_history_mother').val(),
                    'family_history_children': $('#family_history_children').val(),
                    'family_history_sibling': $('#family_history_sibling').val(),
                    'disease_history': $('#disease_history').val(),
                    'disability_history': $('#disability_history').val(),
                    'living_environment_kitchen': $('#living_environment_kitchen').val(),
                    'living_environment_fuel': $('#living_environment_fuel').val(),
                    'living_environment_water': $('#living_environment_water').val(),
                    'living_environment_toilet': $('#living_environment_toilet').val(),
                    'living_environment_fence': $('#living_environment_fence').val()
                },
                type: 'POST',
                success: function (data, textStatus) {
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    if (XMLHttpRequest.status == 422) {
                        var json = JSON.parse(XMLHttpRequest.responseText);
                        if (json.hasOwnProperty('real_name')) {
                            $("#actionRealName").addClass('weui-cell_warn');
                        } else {
                            $("#actionRealName").removeClass('weui-cell_warn');
                        }
                        if (json.hasOwnProperty('id_code')) {
                            $("#actionIdCode").addClass('weui-cell_warn');
                        } else {
                            $("#actionIdCode").removeClass('weui-cell_warn');
                        }
                        if (json.hasOwnProperty('mobile')) {
                            $("#actionMobile").addClass('weui-cell_warn');
                        } else {
                            $("#actionMobile").removeClass('weui-cell_warn');
                        }
                        if (json.hasOwnProperty('address')) {
                            $("#actionAddress").addClass('weui-cell_warn');
                        } else {
                            $("#actionAddress").removeClass('weui-cell_warn');
                        }
                        if (json.hasOwnProperty('payment_mode')) {
                            $("#actionPaymentMode").addClass('weui-cell_warn');
                        } else {
                            $("#actionPaymentMode").removeClass('weui-cell_warn');
                        }

                        if (json.hasOwnProperty('allergic_history')) {
                            $("#actionAllergicHistory").addClass('weui-cell_warn');
                        } else {
                            $("#actionAllergicHistory").removeClass('weui-cell_warn');
                        }

                        if (json.hasOwnProperty('expose')) {
                            $("#actionExpose").addClass('weui-cell_warn');
                        } else {
                            $("#actionExpose").removeClass('weui-cell_warn');
                        }

                        if (json.hasOwnProperty('medical_history')) {
                            $("#actionMedicalHistory").addClass('weui-cell_warn');
                        } else {
                            $("#actionMedicalHistory").removeClass('weui-cell_warn');
                        }

                        if (json.hasOwnProperty('family_history_father') ||
                            json.hasOwnProperty('family_history_mother') ||
                            json.hasOwnProperty('family_history_children') ||
                            json.hasOwnProperty('family_history_sibling')) {
                            $("#actionFamilyHistory").addClass('weui-cell_warn');
                        } else {
                            $("#actionFamilyHistory").removeClass('weui-cell_warn');
                        }

                        if (json.hasOwnProperty('disease_history')) {
                            $("#actionDiseaseHistory").addClass('weui-cell_warn');
                        } else {
                            $("#actionDiseaseHistory").removeClass('weui-cell_warn');
                        }

                        if (json.hasOwnProperty('disability_history')) {
                            $("#actionDisabilityHistory").addClass('weui-cell_warn');
                        } else {
                            $("#actionDisabilityHistory").removeClass('weui-cell_warn');
                        }

                        if (json.hasOwnProperty('living_environment_kitchen') ||
                            json.hasOwnProperty('living_environment_fuel') ||
                            json.hasOwnProperty('living_environment_water') ||
                            json.hasOwnProperty('living_environment_toilet') ||
                            json.hasOwnProperty('living_environment_fence')) {
                            $("#actionLivingEnvironment").addClass('weui-cell_warn');
                        } else {
                            $("#actionLivingEnvironment").removeClass('weui-cell_warn');
                        }
                    }
                },
                complete: function () {
                    $.hideLoading();
                }
            });
            return false;
        }
    </script>
@endsection