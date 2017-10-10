<div id="popupAllergicHistory" class="weui-popup__container">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <div class="toolbar">
            <div class="toolbar-inner"><a href="javascript:;" class="picker-button close-popup">确定</a>
                <h1 class="title">药物过敏史</h1>
            </div>
        </div>
        <div class="modal-content">
            <div class="weui-cells weui-cells_checkbox">
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>无</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="allergic_history" value="无"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>青霉素</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="allergic_history" value="青霉素"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>磺胺</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="allergic_history" value="磺胺"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>链霉素</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="allergic_history" value="链霉素"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>其他</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="allergic_history" id="allergic_history_other"
                               value="其他">
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <textarea class="weui-textarea" placeholder="请输入文本" rows="3"
                                  name="allergic_history"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script type="text/javascript">
    $(function () {
        $("#popupAllergicHistory").find('.weui-cell').last().hide();
        $("input[type=checkbox][name=allergic_history]").not("input[type=checkbox][name=allergic_history]:first").change(function () {
            $("input[type=checkbox][name=allergic_history]").first().prop('checked', false);
        });

        $("input[type=checkbox][name=allergic_history]").first().change(function () {
            $("input[type=checkbox][name=allergic_history]").not("input[type=checkbox][name=allergic_history]:first").prop('checked', false);
            $("#popupAllergicHistory").find('.weui-cell').last().hide();
        });

        $("#allergic_history_other").change(function () {
            if ($(this).is(':checked')) {
                $("#popupAllergicHistory").find('.weui-cell').last().show();
            } else {
                $("#popupAllergicHistory").find('.weui-cell').last().hide();
            }
        });

        $("#popupAllergicHistory").find('.weui-check').change(function () {
            var checked = $("#popupAllergicHistory").find('.weui-check:checked');
            var selectTexts = checked.map(function () {
                return $(this).val();
            }).get().join(',');
            $("#allergic_history").val(selectTexts);
        });
    });
</script>
@endpush