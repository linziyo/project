@extends('wechat.layout')
@section('css')
@stop

@section('wechat_content')
    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__hd">体检资料</div>
        <div class="weui-panel__bd">
            <img class="weui-media-box__thumb"
                 src="{{ !empty($model->Member->UserIcon) ? $model->Member->UserIcon : url('images/default_avatar.jpg') }}"/>
            姓名：{{ $model->Member->Name }}
            身份证：{{ $model->Member->IdCode }}
            手机号码：{{ $model->Member->Mobile }}
        </div>
    </div>
    @if(isset($model->Height))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">身高/体重</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->Fat))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">大脂肪</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->MinFat))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">人体成分脂肪</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->BloodPressure))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">血压</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->BloodOxygen))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">血氧</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->Ecg))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">单导心电图</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->PEEcg))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">十二导心电图</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->Temperature))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">体温</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->Whr))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">腰臀比</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->BloodSugar))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">血糖</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->UricAcid))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">尿酸</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->Chol))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">总胆固醇</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->BloodFat))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">血脂</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->Cardiovascular))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">心血管</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->BMD))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">骨密度</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->Alcohol))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">酒精含量</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->Lung))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">肺活量</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->Hb))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">血红蛋白</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if(isset($model->Urinalysis))
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">尿液分析</div>
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">标题一</h4>
                        <p class="weui-media-box__desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
                    </div>
                </a>
            </div>
        </div>
    @endif
@stop

@section('js')
    <script type="text/template">
    </script>

    <script type="text/javascript">
        $(function () {
        })
    </script>
@stop