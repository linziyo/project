@extends('doctor.layout')
@section('css')
    <link href="{{ url('/assets/jqweuix/css/jqweuix.css') }}" rel="stylesheet"/>
@stop

@section('wechat_content')
    <form action="{{ URL::action('Doctor\ArchiveController@store') }}">
        <div class="weui-cells__title">基本信息</div>
        <div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">身份证号码</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入身份证号码"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">姓名</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入姓名"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>

            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">工作单位</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入工作单位"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">本人电话</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入本人电话"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">联系人姓名</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入联系人姓名"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">联系人电话</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入联系人电话"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">常住类型</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="resident_type" name="resident_type"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup" data-target="#popupNation">
                <div class="weui-cell__hd"><label class="weui-label">民族</label></div>
                <div class="weui-cell__bd">
                    <p id="nation_text"></p>
                    <input class="weui-input" type="hidden" id="nation" name="nation"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </a>
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">文化程度</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="education_degree" name="education_degree"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">职业</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="job" name="job"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">血型</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="blood_group" name="blood_group"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
        </div>

        <div class="weui-cells">
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup" data-target="#popupPaymentMode">
                <div class="weui-cell__hd"><label class="weui-label" for="payment_mode">医疗费用支付方式</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="payment_mode" name="payment_mode" readonly="readonly"/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup" data-target="#popupAllergicHistory">
                <div class="weui-cell__hd"><label class="weui-label" for="allergic_history">药物过敏史</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="allergic_history" name="allergic_history" readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup" data-target="#popupExpose">
                <div class="weui-cell__hd"><label class="weui-label" for="expose">暴露史</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="expose" name="expose" readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup" data-target="#popupHereditaryHistory">
                <div class="weui-cell__hd"><label class="weui-label" for="hereditary_history">遗传病史</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="hereditary_history" name="hereditary_history" readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup" data-target="#popupDisabilityHistory">
                <div class="weui-cell__hd"><label class="weui-label" for="disability_history">残疾情况</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="disability_history" name="disability_history" readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
        </div>
        <div class="weui-cells__title">既往史</div>
        <div class="weui-cells">
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup" data-target="#popupPastHistoryMedical">
                <div class="weui-cell__hd"><label class="weui-label">疾病</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="past_history_medical" name="past_history_medical"
                           readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup"
               data-target="#popupPastHistoryOperation">
                <div class="weui-cell__hd"><label class="weui-label">手术</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="past_history_operation" name="past_history_operation"
                           readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup" data-target="#popupPastHistoryInjury">
                <div class="weui-cell__hd"><label class="weui-label">外伤</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="past_history_injury" name="past_history_injury"
                           readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup"
               data-target="#popupPastHistoryTransfusion">
                <div class="weui-cell__hd"><label class="weui-label">输血</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="past_history_transfusion"
                           name="past_history_transfusion" readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
        </div>
        <div class="weui-cells__title">家族史</div>
        <div class="weui-cells">
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup"
               data-target="#popupFamilyHistoryFather">
                <div class="weui-cell__hd"><label class="weui-label">父亲</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="family_history_father" name="family_history_father"
                           readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup"
               data-target="#popupFamilyHistoryMother">
                <div class="weui-cell__hd"><label class="weui-label">母亲</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="family_history_mother" name="family_history_mother"
                           readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup"
               data-target="#popupFamilyHistorySibling">
                <div class="weui-cell__hd"><label class="weui-label">兄弟姐妹</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="family_history_sibling" name="family_history_sibling"
                           readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup"
               data-target="#popupFamilyHistoryChildren">
                <div class="weui-cell__hd"><label class="weui-label">子女</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="family_history_children" name="family_history_children"
                           readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
        </div>
        <div class="weui-cells__title">生活环境</div>
        <div class="weui-cells">
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup"
               data-target="#popupLivingEnvironmentKitchen">
                <div class="weui-cell__hd"><label class="weui-label">厨房排风设施</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="living_environment_kitchen"
                           name="living_environment_kitchen"
                           readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup"
               data-target="#popupLivingEnvironmentFuel">
                <div class="weui-cell__hd"><label class="weui-label">燃料类型</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="living_environment_fuel" name="living_environment_fuel"
                           readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup"
               data-target="#popupLivingEnvironmentWater">
                <div class="weui-cell__hd"><label class="weui-label">饮水</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="living_environment_water" name="living_environment_water"
                           readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup"
               data-target="#popupLivingEnvironmentToilet">
                <div class="weui-cell__hd"><label class="weui-label">厕所</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="living_environment_toilet"
                           name="living_environment_toilet"
                           readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
            <a href="javascript:;" class="weui-cell weui-cell_access open-popup"
               data-target="#popupLivingEnvironmentFence">
                <div class="weui-cell__hd"><label class="weui-label">禽畜栏</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" id="living_environment_fence" name="living_environment_fence"
                           readonly/>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
        </div>
        <label for="weuiAgree" class="weui-agree">
            <input id="weuiAgree" type="checkbox" class="weui-agree__checkbox"/>
            <span class="weui-agree__text">阅读并同意<a href="javascript:void(0);">《相关条款》</a></span>
        </label>
        <div class="weui-btn-area">
            <button type="submit" class="weui-btn weui-btn_primary">确认建档</button>
        </div>
    </form>

    @include('doctor.archive.modal_nations')
    @include('doctor.archive.modal_payment_mode')
    @include('doctor.archive.modal_allergic_history')
    @include('doctor.archive.modal_expose')
    @include('doctor.archive.modal_past_history_medical')
    @include('doctor.archive.modal_past_history_operation')
    @include('doctor.archive.modal_past_history_injury')
    @include('doctor.archive.modal_past_history_transfusion')
    @include('doctor.archive.modal_family_history_father')
    @include('doctor.archive.modal_family_history_mother')
    @include('doctor.archive.modal_family_history_sibling')
    @include('doctor.archive.modal_family_history_children')
    @include('doctor.archive.modal_hereditary_history')
    @include('doctor.archive.modal_disability_history')
    @include('doctor.archive.modal_living_environment_kitchen')
    @include('doctor.archive.modal_living_environment_fuel')
    @include('doctor.archive.modal_living_environment_water')
    @include('doctor.archive.modal_living_environment_toilet')
    @include('doctor.archive.modal_living_environment_fence')
@stop

@push('js')
<script type="text/javascript">
</script>
@endpush