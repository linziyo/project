<div id="popupExpose" class="weui-popup__container">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <div class="toolbar">
            <div class="toolbar-inner"><a href="javascript:;" class="picker-button close-popup">确定</a>
                <h1 class="title">暴露史</h1>
            </div>
        </div>
        <div class="modal-content">
            <div class="weui-cells weui-cells_checkbox">
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>无</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="expose" value="无"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>化学品</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="expose" value="化学品"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>毒物</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="expose" value="毒物"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>射线</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="expose" value="射线"/>
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
        $("#popupAllergicHistory").find('.weui-cell').last().hide();
        $("input[type=checkbox][name=expose]").not("input[type=checkbox][name=expose]:first").change(function () {
            $("input[type=checkbox][name=expose]").first().prop('checked', false);
        });

        $("input[type=checkbox][name=expose]").first().change(function () {
            $("input[type=checkbox][name=expose]").not("input[type=checkbox][name=expose]:first").prop('checked', false);
        });

        $("#popupExpose").find('.weui-check').change(function () {
            var checked = $("#popupExpose").find('.weui-check:checked');
            var selectTexts = checked.map(function () {
                return $(this).val();
            }).get().join(',');
            $("#expose").val(selectTexts);
        });
    });
</script>
@endpush