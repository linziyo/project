<div id="popupNation" class="weui-popup__container">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <div class="toolbar">
            <div class="toolbar-inner"><a href="javascript:;" class="picker-button close-popup">确定</a>
                <h1 class="title">民族</h1>
            </div>
        </div>
        <div class="modal-content">
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">阿昌族</a></div>
                <div class="weui-flex__item"><a href="#">白族</a></div>
                <div class="weui-flex__item"><a href="#">保安族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">布朗族</a></div>
                <div class="weui-flex__item"><a href="#">布依族</a></div>
                <div class="weui-flex__item"><a href="#">朝鲜族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">达斡尔族</a></div>
                <div class="weui-flex__item"><a href="#">傣族</a></div>
                <div class="weui-flex__item"><a href="#">德昂族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">东乡族</a></div>
                <div class="weui-flex__item"><a href="#">侗族</a></div>
                <div class="weui-flex__item"><a href="#">独龙族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">俄罗斯族</a></div>
                <div class="weui-flex__item"><a href="#">鄂伦春族</a></div>
                <div class="weui-flex__item"><a href="#">鄂温克族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">高山族</a></div>
                <div class="weui-flex__item"><a href="#">仡佬族</a></div>
                <div class="weui-flex__item"><a href="#">哈尼族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">哈萨克族</a></div>
                <div class="weui-flex__item"><a href="#">汉族</a></div>
                <div class="weui-flex__item"><a href="#">赫哲族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">回族</a></div>
                <div class="weui-flex__item"><a href="#">基诺族</a></div>
                <div class="weui-flex__item"><a href="#">京族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">景颇族</a></div>
                <div class="weui-flex__item"><a href="#">柯尔克孜族</a></div>
                <div class="weui-flex__item"><a href="#">拉祜族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">黎族</a></div>
                <div class="weui-flex__item"><a href="#">傈僳族</a></div>
                <div class="weui-flex__item"><a href="#">珞巴族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">满族</a></div>
                <div class="weui-flex__item"><a href="#">毛南族</a></div>
                <div class="weui-flex__item"><a href="#">门巴族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">蒙古族</a></div>
                <div class="weui-flex__item"><a href="#">苗族</a></div>
                <div class="weui-flex__item"><a href="#">仫佬族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">纳西族</a></div>
                <div class="weui-flex__item"><a href="#">怒族</a></div>
                <div class="weui-flex__item"><a href="#">普米族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">羌族</a></div>
                <div class="weui-flex__item"><a href="#">撒拉族</a></div>
                <div class="weui-flex__item"><a href="#">畲族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">水族</a></div>
                <div class="weui-flex__item"><a href="#">塔吉克族</a></div>
                <div class="weui-flex__item"><a href="#">塔塔尔族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">土家族</a></div>
                <div class="weui-flex__item"><a href="#">土族</a></div>
                <div class="weui-flex__item"><a href="#">佤族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">维吾尔族</a></div>
                <div class="weui-flex__item"><a href="#">乌孜别克族</a></div>
                <div class="weui-flex__item"><a href="#">锡伯族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">瑶族</a></div>
                <div class="weui-flex__item"><a href="#">彝族</a></div>
                <div class="weui-flex__item"><a href="#">裕固族</a></div>
            </div>
            <div class="weui-flex">
                <div class="weui-flex__item"><a href="#">藏族</a></div>
                <div class="weui-flex__item"><a href="#">壮族</a></div>
                <div class="weui-flex__item"></div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script type="text/javascript">
    $(function () {
        $("#popupNation").find('.weui-flex__item > a').click(function () {
            $("#nation_text").text($(this).text());
            $("#nation").text($(this).text());
            $.closePopup();
            return false;
        });
    });
</script>
@endpush