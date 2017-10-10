<div id="popupDisabilityHistory" class="weui-popup__container">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <div class="toolbar">
            <div class="toolbar-inner"><a href="javascript:;" class="picker-button close-popup">确定</a>
                <h1 class="title">残疾情况</h1>
            </div>
        </div>
        <div class="modal-content">
            <div class="weui-cells weui-cells_checkbox">
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>无残疾</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="disability_history" value="无残疾"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>视力残疾</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="disability_history" value="视力残疾"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>听力残疾</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="disability_history" value="听力残疾"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>言语残疾</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="disability_history" value="言语残疾"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>肢体残疾</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="disability_history" value="肢体残疾"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>智力残疾</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="disability_history" value="智力残疾"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>精神残疾</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="disability_history" value="精神残疾"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>其他残疾</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="disability_history" value="其他残疾"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <textarea class="weui-textarea" placeholder="请输入文本" rows="3"
                                  name="disability_history"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script type="text/javascript">
    $(function () {
        $("#popupDisabilityHistory").find('.weui-cell').last().hide();
        $("input[type=checkbox][name=disability_history]").not("input[type=checkbox][name=disability_history]:first").change(function () {
            $("input[type=checkbox][name=disability_history]").first().prop('checked', false);
        });

        $("input[type=checkbox][name=disability_history]").first().change(function () {
            $("input[type=checkbox][name=disability_history]").not("input[type=checkbox][name=disability_history]:first").prop('checked', false);
            $("#popupDisabilityHistory").find('.weui-cell').last().hide();
        });

        $("input[type=checkbox][name=disability_history]").last().change(function () {
            if ($(this).is(':checked')) {
                $("#popupDisabilityHistory").find('.weui-cell').last().show();
            } else {
                $("#popupDisabilityHistory").find('.weui-cell').last().hide();
            }
        });

        $("#popupDisabilityHistory").find('.weui-check').change(function () {
            var checked = $("#popupDisabilityHistory").find('.weui-check:checked');
            var selectTexts = checked.map(function () {
                return $(this).val();
            }).get().join(',');
            $("#disability_history").val(selectTexts);
        });
    });
</script>
@endpush