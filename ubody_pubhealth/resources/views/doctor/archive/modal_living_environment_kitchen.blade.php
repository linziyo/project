<div id="popupLivingEnvironmentKitchen" class="weui-popup__container">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <div class="toolbar">
            <div class="toolbar-inner"><a href="javascript:;" class="picker-button close-popup">确定</a>
                <h1 class="title">生活环境-厨房排风设施</h1>
            </div>
        </div>
        <div class="modal-content">
            <div class="weui-cells weui-cells_radio">
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__hd"><label class="weui-label">无</label></div>
                    <div class="weui-cell__bd"></div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_kitchen" value="无"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">油烟机</label></div>
                    <div class="weui-cell__bd"></div>
                    <label class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_kitchen" value="油烟机"/>
                        <span class="weui-icon-checked"></span>
                    </label>
                </label>
                <label class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">换气扇</label></div>
                    <div class="weui-cell__bd"></div>
                    <label class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_kitchen" value="换气扇"/>
                        <span class="weui-icon-checked"></span>
                    </label>
                </label>
                <label class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">烟囱</label></div>
                    <div class="weui-cell__bd"></div>
                    <label class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="living_environment_kitchen" value="烟囱"/>
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
        $("#popupLivingEnvironmentKitchen").find('input[type=radio][name=living_environment_kitchen]').change(function () {
            $("#living_environment_kitchen").val($(this).val());
            $.closePopup();
        });
    });
</script>
@endpush