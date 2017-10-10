<div id="popupPastHistoryTransfusion" class="weui-popup__container">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <div class="toolbar">
            <div class="toolbar-inner"><a href="javascript:;" class="picker-button close-popup">确定</a>
                <h1 class="title">既往史-输血</h1>
            </div>
        </div>
        <div class="modal-content">
            <div class="weui-cells weui-cells_checkbox">
                <label class="weui-cell weui-check_label">
                    <div class="weui-cell__bd"><p>无</p></div>
                    <div class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="past_history_transfusion" value="无">
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label" for="past_history_medical_hdp">有</label>
                    </div>
                    <div class="weui-cell__bd">
                    </div>
                    <label class="weui-cell__ft">
                        <input type="checkbox" class="weui-check" name="past_history_transfusion" value="有"/>
                        <span class="weui-icon-checked"></span>
                    </label>
                </div>
            </div>
            <div class="weui-cells">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <div class="weui-flex">
                            <div class="weui-flex__item">
                                <input type="text" class="weui-input" placeholder="名称"/>
                            </div>
                            <div class="weui-flex__item">
                                <input type="text" class="weui-input" placeholder="时间"/>
                            </div>
                        </div>
                    </div>
                    <div class="weui-cell__ft">
                        <i class="weui-icon-cancel"></i>
                    </div>
                </div>
            </div>
            <div class="weui-btn-area">
                <a class="weui-btn weui-btn_primary">添加</a>
            </div>
        </div>
    </div>
</div>
@push('js')
<script type="text/javascript">
    $(function () {
        $("input[type=checkbox][name=past_history_transfusion]").first().change(function () {
            $("input[type=checkbox][name=past_history_transfusion]").not("input[type=checkbox][name=past_history_transfusion]:first").prop('checked', false);
        });
    });
</script>
@endpush