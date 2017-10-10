<div id="popupPaymentMode" class="weui-popup__container">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <div class="toolbar">
            <div class="toolbar-inner"><a href="javascript:;" class="picker-button close-popup">确定</a>
                <h1 class="title">医疗费用支付方式</h1>
            </div>
        </div>
        <div class="modal-content">
            <div class="weui-cells weui-cells_checkbox">
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>城镇职工基本医疗保险</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="payment_mode" value="城镇职工基本医疗保险"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>城镇居民基本医疗保险</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="payment_mode" value="城镇居民基本医疗保险"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>新型农村合作医疗</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="payment_mode" value="新型农村合作医疗"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>贫困救助</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="payment_mode" value="贫困救助"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>商业医疗保险</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="payment_mode" value="商业医疗保险"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>全公费</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="payment_mode" value="全公费"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>全自费</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="payment_mode" value="全自费"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>其他</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="payment_mode" id="payment_mode_other"/>
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <textarea class="weui-textarea" placeholder="请输入文本" rows="3"
                                  name="payment_mode"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script type="text/javascript">
    $(function () {
        $("#popupPaymentMode").find('.weui-cell').last().hide();
        $("#payment_mode_other").click(function () {
            if ($(this).is(':checked')) {
                $("#popupPaymentMode").find('.weui-cell').last().show();
            } else {
                $("#popupPaymentMode").find('.weui-cell').last().hide();
            }
        });

        $("#popupPaymentMode").find('.weui-check').change(function () {
            var checked = $("#popupPaymentMode").find('.weui-check:checked');
            var selectTexts = checked.map(function () {
                return $(this).val();
            }).get().join(',');
            $("#payment_mode").val(selectTexts);
        });
    });
</script>
@endpush