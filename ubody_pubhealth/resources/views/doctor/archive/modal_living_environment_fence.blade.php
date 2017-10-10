<div id="popupLivingEnvironmentFence" class="weui-popup__container">
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
                    <div class="weui-cell__hd"><label class="weui-label">无</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_fence" value="无"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">单设</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_fence" value="单设"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">室内</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_fence" value="室内"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">室外</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_fence" value="室外"/>
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
        $("#popupLivingEnvironmentFence").find('input[type=radio][name=living_environment_fence]').change(function () {
            $("#living_environment_fence").val($(this).val());
            $.closePopup();
        });
    });
</script>
@endpush