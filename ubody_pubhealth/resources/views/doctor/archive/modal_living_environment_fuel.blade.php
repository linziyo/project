<div id="popupLivingEnvironmentFuel" class="weui-popup__container">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <div class="toolbar">
            <div class="toolbar-inner"><a href="javascript:;" class="picker-button close-popup">确定</a>
                <h1 class="title">生活环境-燃料类型</h1>
            </div>
        </div>
        <div class="modal-content">
            <div class="weui-cells weui-cells_radio">
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">液化气</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_fuel" value="液化气"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">煤</label></div>
                    <div class="weui-cell__bd"></div>
                    <label class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_fuel" value="煤"/>
                        <span class="weui-icon-checked"></span>
                    </label>
                </label>
                <label class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">天然气</label></div>
                    <div class="weui-cell__bd"></div>
                    <label class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_fuel" value="天然气"/>
                        <span class="weui-icon-checked"></span>
                    </label>
                </label>
                <label class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">沼气</label></div>
                    <div class="weui-cell__bd"></div>
                    <label class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_fuel" value="沼气"/>
                        <span class="weui-icon-checked"></span>
                    </label>
                </label>
                <label class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">柴火</label></div>
                    <div class="weui-cell__bd"></div>
                    <label class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_fuel" value="柴火"/>
                        <span class="weui-icon-checked"></span>
                    </label>
                </label>
                <label class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">其他</label></div>
                    <div class="weui-cell__bd"></div>
                    <label class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_fuel" value="其他"/>
                        <span class="weui-icon-checked"></span>
                    </label>
                </label>
            </div>
        </div>
    </div>
</div>
@push('js')
<script type="text/javascript">
    $(function () {
        $("#popupLivingEnvironmentFuel").find('input[type=radio][name=living_environment_fuel]').change(function () {
            $("#living_environment_fuel").val($(this).val());
            $.closePopup();
        });
    });
</script>
@endpush