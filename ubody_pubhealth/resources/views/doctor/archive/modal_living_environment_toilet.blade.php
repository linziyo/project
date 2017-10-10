<div id="popupLivingEnvironmentToilet" class="weui-popup__container">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <div class="toolbar">
            <div class="toolbar-inner"><a href="javascript:;" class="picker-button close-popup">确定</a>
                <h1 class="title">生活环境-厕所</h1>
            </div>
        </div>
        <div class="modal-content">
            <div class="weui-cells weui-cells_radio">
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">卫生厕所</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_toilet" value="卫生厕所"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">一格或二格粪池式</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_toilet" value="一格或二格粪池式"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">马桶</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_toilet" value="马桶"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">露天粪坑</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_toilet" value="露天粪坑"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">简易棚厕</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_toilet" value="简易棚厕"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
            </div>
        </div>
    </div>
</div>
@push('js')
<script type="text/javascript">
    $(function () {
        $("#popupLivingEnvironmentToilet").find('input[type=radio][name=living_environment_toilet]').change(function () {
            $("#living_environment_toilet").val($(this).val());
            $.closePopup();
        });
    });
</script>
@endpush