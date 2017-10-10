@extends('wechat.layout')
@section('css')
@stop

@section('wechat_content')
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <p>ID</p>
            </div>
            <div class="weui-cell__ft">{{ $model->id }}</div>
        </div>
    </div>

    <div class="weui-cells__title">基本信息</div>
    <div class="weui-cells">
        <a class="weui-cell weui-cell_access" href="{{ URL::action('Wechat\UserController@avatar') }}">
            <div class="weui-cell__bd">
                <p>头像</p>
            </div>
            <div class="weui-cell__ft">
                <img src="{{ url('/images/default_avatar.jpg') }}" class="weui-media-box__thumb"
                     style="width:50px;height:50px"/>
            </div>
        </a>
        <a class="weui-cell weui-cell_access open-popup" href="javascript:;" data-target="#real_name">
            <div class="weui-cell__bd">
                <p>姓名</p>
            </div>
            <div class="weui-cell__ft">{{ $model->real_name }}</div>
        </a>
        <a class="weui-cell weui-cell_access open-popup" href="javascript:;" data-target="#sex">
            <div class="weui-cell__bd">
                <p>性别</p>
            </div>
            <div class="weui-cell__ft">{{ $model->sex == 0 ? "男" : "女" }}</div>
        </a>
        <a class="weui-cell weui-cell_access open-popup" href="javascript:;" data-target="#birthday">
            <div class="weui-cell__bd">
                <p>出生日期</p>
            </div>
            <div class="weui-cell__ft">{{ $model->date_of_birth }}</div>
        </a>
        <a class="weui-cell weui-cell_access open-popup" href="javascript:;" data-target="#location">
            <div class="weui-cell__bd">
                <p>所在地</p>
            </div>
            <div class="weui-cell__ft">{{ $model->location }}</div>
        </a>
    </div>

    <div class="weui-cells__title">账号</div>
    <div class="weui-cells">
        <a class="weui-cell weui-cell_access" href="{{ URL::action('Wechat\UserController@mobile') }}">
            <div class="weui-cell__bd">
                <p>手机号码</p>
            </div>
            <div class="weui-cell__ft">{{ $model->mobile }}</div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd">
                <p>身份证</p>
            </div>
            <div class="weui-cell__ft">{{ $model->id_code }}</div>
        </a>
    </div>

    <div id="real_name" class="weui-popup__container popup-bottom">
        <div class="weui-popup__overlay"></div>
        <div class="weui-popup__modal">
            <div class="toolbar">
                <div class="toolbar-inner">
                    <a href="javascript:;" class="picker-button close-popup">关闭</a>
                    <h1 class="title">请输入姓名</h1>
                </div>
            </div>
            <div class="modal-content">
                <div style="padding:30px">
                    <input type="text" class="weui-input" placeholder="请输入姓名" style="margin:15px"/>
                    <button type="submit" class="weui-btn weui-btn_primary">确定</button>
                </div>
            </div>
        </div>
    </div>

    <div id="sex" class="weui-popup__container popup-bottom">
        <div class="weui-popup__overlay"></div>
        <div class="weui-popup__modal">
            <div class="toolbar">
                <div class="toolbar-inner">
                    <a href="javascript:;" class="picker-button close-popup">关闭</a>
                    <h1 class="title">请选择性别</h1>
                </div>
            </div>
            <div class="modal-content">
                <div style="padding:30px">
                    <input type="text" class="weui-input" placeholder="请输入姓名" style="margin:15px"/>
                    <button type="submit" class="weui-btn weui-btn_primary">确定</button>
                </div>
            </div>
        </div>
    </div>

    <div id="birthday" class="weui-popup__container popup-bottom">
        <div class="weui-popup__overlay"></div>
        <div class="weui-popup__modal">
            <div class="toolbar">
                <div class="toolbar-inner">
                    <a href="javascript:;" class="picker-button close-popup">关闭</a>
                    <h1 class="title">请选择性别</h1>
                </div>
            </div>
            <div class="modal-content">
                <div style="padding:30px">
                    <input type="text" class="weui-input" placeholder="请输入姓名" style="margin:15px"/>
                    <button type="submit" class="weui-btn weui-btn_primary">确定</button>
                </div>
            </div>
        </div>
    </div>

    <div id="location" class="weui-popup__container popup-bottom">
        <div class="weui-popup__overlay"></div>
        <div class="weui-popup__modal">
            <div class="toolbar">
                <div class="toolbar-inner">
                    <a href="javascript:;" class="picker-button close-popup">关闭</a>
                    <h1 class="title">请选择性别</h1>
                </div>
            </div>
            <div class="modal-content">
                <div style="padding:30px">
                    <input type="text" class="weui-input" placeholder="请输入姓名" style="margin:15px"/>
                    <button type="submit" class="weui-btn weui-btn_primary">确定</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript" src="http://jqweui.com/dist/js/city-picker.js"></script>
    <script type="text/javascript">
        $(function () {
//            $("#sex").select({title: "选择性别", items: ["男", "女"]});
            $("#my-input").calendar();
            $("#start").cityPicker({title: '请选择地址'});
        });
    </script>
@stop