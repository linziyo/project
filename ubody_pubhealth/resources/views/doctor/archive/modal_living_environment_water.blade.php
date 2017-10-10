<div id="popupLivingEnvironmentWater" class="weui-popup__container">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <div class="toolbar">
            <div class="toolbar-inner"><a href="javascript:;" class="picker-button close-popup">确定</a>
                <h1 class="title">生活环境-饮水</h1>
            </div>
        </div>
        <div class="modal-content">
            <div class="weui-cells weui-cells_radio">
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">自来水</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_water" value="自来水"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">经净化过滤的水</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_water" value="经净化过滤的水"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">井水</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_water" value="井水"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">河湖水</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_water" value="河湖水"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">塘水</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_water" value="塘水"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">其他</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_water" value="其他"/>
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
        $("#popupLivingEnvironmentWater").find('input[type=radio][name=living_environment_water]').change(function () {
            $("#living_environment_water").val($(this).val());
            $.closePopup();
        });
    });
</script>
@endpush