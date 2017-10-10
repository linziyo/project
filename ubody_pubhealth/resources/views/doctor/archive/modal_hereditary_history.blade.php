<div id="popupHereditaryHistory" class="weui-popup__container">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <div class="toolbar">
            <div class="toolbar-inner"><a href="javascript:;" class="picker-button close-popup">确定</a>
                <h1 class="title">遗传病史</h1>
            </div>
        </div>
        <div class="modal-content">
            <div class="weui-cells weui-cells_checkbox">
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>无</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="hereditary_history" value="无">
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>有</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="hereditary_history" value="有">
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <textarea class="weui-textarea" placeholder="请输入文本" rows="3"
                                  name="hereditary_history"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script type="text/javascript">
    $(function () {
        $("#popupHereditaryHistory").find('.weui-cell').last().hide();
        $("input[type=checkbox][name=hereditary_history]").not("input[type=checkbox][name=hereditary_history]:first").change(function () {
            $("input[type=checkbox][name=hereditary_history]").first().prop('checked', false);
        });

        $("input[type=checkbox][name=hereditary_history]").first().change(function () {
            $("input[type=checkbox][name=hereditary_history]").not("input[type=checkbox][name=hereditary_history]:first").prop('checked', false);
            $("#popupHereditaryHistory").find('.weui-cell').last().hide();
        });

        $("input[type=checkbox][name=hereditary_history]").last().change(function () {
            if ($(this).is(':checked')) {
                $("#popupHereditaryHistory").find('.weui-cell').last().show();
            } else {
                $("#popupHereditaryHistory").find('.weui-cell').last().hide();
            }
        });

        $("#popupHereditaryHistory").find('.weui-check').change(function () {
            var checked = $("#popupHereditaryHistory").find('.weui-check:checked');
            var selectTexts = checked.map(function () {
                return $(this).val();
            }).get().join(',');
            $("#hereditary_history").val(selectTexts);
        });
    });
</script>
@endpush