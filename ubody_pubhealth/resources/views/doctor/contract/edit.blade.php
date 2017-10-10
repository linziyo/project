@extends('doctor.layout')
@section('css')
    <link href="{{ url('/assets/jqweuix/css/jqweuix.css') }}" rel="stylesheet"/>
@stop

@section('wechat_content')
    <form action="{{ URL::action('Doctor\ArchiveController@update') }}">
        <div class="weui-cells__title">基本信息</div>
        <div class="weui-cells weui-cells_form">
            <div class="weui-cell weui-cell_warn">
                <div class="weui-cell__hd"><label class="weui-label">姓名</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入姓名"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div class="weui-cell weui-cell_warn">
                <div class="weui-cell__hd"><label class="weui-label">身份证号码</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入身份证号码"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div class="weui-cell weui-cell_warn">
                <div class="weui-cell__hd"><label class="weui-label">联系电话</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入联系电话"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div class="weui-cell weui-cell_warn">
                <div class="weui-cell__hd"><label class="weui-label">常住地址</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入常住地址"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
        </div>

        <div class="weui-cells">
            <a class="weui-cell weui-cell_access">
                <div class="weui-cell__bd">医疗费用支付方式</div>
                <div class="weui-cell__ft">医保</div>
            </a>
            <a class="weui-cell weui-cell_access">
                <div class="weui-cell__bd">药物过敏史</div>
                <div class="weui-cell__ft">无</div>
            </a>
            <a class="weui-cell weui-cell_access">
                <div class="weui-cell__bd">暴露史</div>
                <div class="weui-cell__ft">无</div>
            </a>
            <a class="weui-cell weui-cell_access">
                <div class="weui-cell__bd">既往病史</div>
                <div class="weui-cell__ft">无</div>
            </a>
            <a class="weui-cell weui-cell_access">
                <div class="weui-cell__bd">家族病史</div>
                <div class="weui-cell__ft">无</div>
            </a>
            <a class="weui-cell weui-cell_access">
                <div class="weui-cell__bd">遗传病史</div>
                <div class="weui-cell__ft">无</div>
            </a>
            <a class="weui-cell weui-cell_access">
                <div class="weui-cell__bd">残疾情况</div>
                <div class="weui-cell__ft">无</div>
            </a>
            <a class="weui-cell weui-cell_access">
                <div class="weui-cell__bd">生活环境</div>
                <div class="weui-cell__ft">无</div>
            </a>
        </div>
        <label for="weuiAgree" class="weui-agree">
            <input id="weuiAgree" type="checkbox" class="weui-agree__checkbox"/>
            <span class="weui-agree__text">阅读并同意<a href="javascript:void(0);">《相关条款》</a></span>
        </label>
        <div class="weui-btn-area">
            <button type="submit" class="weui-btn weui-btn_primary">确认建档</button>
        </div>
    </form>
@stop

@push('js')
<script type="text/javascript">
    $(function () {
        $(".weui-cell_access").click(function () {
            $.actions({
                title: '医疗费用支付方式',
                actions: [
                    {
                        text: "编辑", onClick: function () {
                    }
                    }, {
                        text: "删除", onClick: function () {
                        }
                    }]
            });
        });
    });
</script>
@endpush