@extends('wechat.layout')
@section('wechat_content')
    <div class="weui-panel__bd">
        <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
            <div class="weui-media-box__hd">
                <img class="weui-media-box__thumb" src="{{ Auth::user()->avatar }}" alt="">
            </div>
            <div class="weui-media-box__bd">
                <h4 class="weui-media-box__title">{{ $model->real_name }}</h4>
                <p class="weui-media-box__desc">
                    手机号码：<span>{{ $model->mobile }}</span>
                </p>
                <p class="weui-media-box__desc">
                    身份证：<span>{{ $model->id_code }}</span>
                </p>
            </div>
        </a>
    </div>

    <div class="weui-cells__title"></div>
    <div class="weui-cells">
        <a class="weui-cell weui-cell_access">
            <div class="weui-cell__bd"><p>医疗费用支付方式</p></div>
            <div class="weui-cell__ft">{{ $model->payment_mode }}</div>
        </a>
        <a class="weui-cell weui-cell_access">
            <div class="weui-cell__bd"><p>药物过敏史</p></div>
            <div class="weui-cell__ft">{{ $model->allergic_history }}</div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd">
                <p>暴露史</p>
            </div>
            <div class="weui-cell__ft">{{ $model->expose }}</div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd">
                <p>既往病史</p>
            </div>
            <div class="weui-cell__ft">{{ $model->medical_history }}</div>
        </a>
        <a class="weui-cell weui-cell_access open-popup" href="javascript:;" data-target="#popupFamilyHistory">
            <div class="weui-cell__bd">
                <p>家族史</p>
            </div>
            <div class="weui-cell__ft">点击查看详情</div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd">
                <p>遗传病史</p>
            </div>
            <div class="weui-cell__ft">{{ $model->disease_history }}</div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd">
                <p>残疾情况</p>
            </div>
            <div class="weui-cell__ft">{{ $model->disability_history }}</div>
        </a>
        <a class="weui-cell weui-cell_access open-popup" href="javascript:;" data-target="#popupLivingEnvironment">
            <div class="weui-cell__bd">
                <p>生活环境</p>
            </div>
            <div class="weui-cell__ft">点击查看详情</div>
        </a>
    </div>
    <div class="weui-btn-area">
        <a href="{{ URL::action('Wechat\ArchiveController@edit', $model->id) }}" class="weui-btn weui-btn_primary">修改</a>
    </div>

    <div id="popupFamilyHistory" class="weui-popup__container">
        <div class="weui-popup__overlay"></div>
        <div class="weui-popup__modal">
            <div class="toolbar">
                <div class="toolbar-inner">
                    <a href="javascript:;" class="picker-button close-popup">关闭</a>
                    <h1 class="title">家族病史</h1>
                </div>
            </div>
            <div class="modal-content">
                <div class="weui-cells__title">父亲</div>
                <div class="weui-cells">
                    @foreach(explode(',',$model->family_history_father) as $item)
                        <div class="weui-cell">
                            <div class="weui-cell__bd">{{ $item }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="weui-cells__title">母亲</div>
                <div class="weui-cells">
                    @foreach(explode(',',$model->family_history_mother) as $item)
                        <div class="weui-cell">
                            <div class="weui-cell__bd">{{ $item }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="weui-cells__title">子女</div>
                <div class="weui-cells">
                    @foreach(explode(',',$model->family_history_children) as $item)
                        <div class="weui-cell">
                            <div class="weui-cell__bd">{{ $item }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="weui-cells__title">兄弟姐妹</div>
                <div class="weui-cells">
                    @foreach(explode(',',$model->family_history_sibling) as $item)
                        <div class="weui-cell">
                            <div class="weui-cell__bd">{{ $item }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div id="popupLivingEnvironment" class="weui-popup__container">
        <div class="weui-popup__overlay"></div>
        <div class="weui-popup__modal">
            <div class="toolbar">
                <div class="toolbar-inner">
                    <a href="javascript:;" class="picker-button close-popup">关闭</a>
                    <h1 class="title">标题</h1>
                </div>
            </div>
            <div class="modal-content">
                <div class="weui-cells__title">厨房排风设施</div>
                <div class="weui-cells">
                    @foreach(explode(',',$model->living_environment_kitchen) as $item)
                        <div class="weui-cell">
                            <div class="weui-cell__bd">{{ $item }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="weui-cells__title">燃料类型</div>
                <div class="weui-cells">
                    @foreach(explode(',',$model->living_environment_fuel) as $item)
                        <div class="weui-cell">
                            <div class="weui-cell__bd">{{ $item }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="weui-cells__title">饮水</div>
                <div class="weui-cells">
                    @foreach(explode(',',$model->living_environment_water) as $item)
                        <div class="weui-cell">
                            <div class="weui-cell__bd">{{ $item }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="weui-cells__title">厕所</div>
                <div class="weui-cells">
                    @foreach(explode(',',$model->living_environment_toilet) as $item)
                        <div class="weui-cell">
                            <div class="weui-cell__bd">{{ $item }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="weui-cells__title">禽畜栏</div>
                <div class="weui-cells">
                    @foreach(explode(',',$model->living_environment_fence) as $item)
                        <div class="weui-cell">
                            <div class="weui-cell__bd">{{ $item }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop