@extends('doctor.tab')
@push('css')
<link href="{{ url('/assets/jqweuix/css/jqweuix.css') }}" rel="stylesheet"/>
<style>
    .submit-margin{
        margin-bottom: 60px;
    }
</style>
@endpush
@section('content')

<div class="weui-panel weui-panel_access">
    <div class="weui-panel__bd">
        <a href="#" class="weui-media-box weui-media-box_appmsg">
            <div class="weui-media-box__hd">
                <img class="weui-media-box__thumb" src="/images/default_avatar.jpg"/>
            </div>
            <div class="weui-media-box__bd">
                <h4 class="weui-media-box__title">{{ Auth::user()->real_name}}</h4>
            </div>

        </a>
    </div>
</div>

<div class="weui-cells">
    <a class="weui-cell weui-cell_access base" href="javascript:;">
        <div class="weui-cell__bd">
            <p>真实姓名</p>
        </div>
        <div class="weui-cell__ft base" base="real_name">{{ Auth::user()->real_name }}</div>
    </a>

    <a class="weui-cell weui-cell_access base" href="javascript:;">
        <div class="weui-cell__bd">
            <p>昵称</p>
        </div>
        <div class="weui-cell__ft" base="name">{{ Auth::user()->name }}</div>
    </a>

    <a class="weui-cell weui-cell_access base" href="javascript:;">
        <div class="weui-cell__bd">
            <p>手机</p>
        </div>
        <div class="weui-cell__ft" base="mobile">{{ Auth::user()->mobile }}</div>
    </a>

    <a class="weui-cell weui-cell_access base" href="javascript:;">
        <div class="weui-cell__bd">
            <p>身份证</p>
        </div>
        <div class="weui-cell__ft" base="id_code">{{ Auth::user()->id_code }}</div>
    </a>

    <div class="weui-cell" href="javascript:;">
        <div class="weui-cell__bd">
            <p>性别</p>
        </div>
        <div class="weui-cell__ft sex" >{{ Auth::user()->sex == 1?'男':(Auth::user()->sex == 2?'女':'未知') }}</div>
    </div>

    <div class="weui-cell" href="javascript:;">
        <div class="weui-cell__bd">
            <p>出生日期</p>
        </div>
        <div class="weui-cell__ft birth">{{ Auth::user()->date_of_birth }}</div>
    </div>

    <a class="weui-cell weui-cell_access base" href="javascript:;">
        <div class="weui-cell__bd">
            <p>邮箱</p>
        </div>
        <div class="weui-cell__ft" base="email">{{ Auth::user()->email }}</div>
    </a>


    <a class="weui-cell weui-cell_access base" href="javascript:;">
        <div class="weui-cell__bd">
            <p>职务</p>
        </div>
        <div class="weui-cell__ft" base="duty">{{ $model->duty }}</div>
    </a>

    <a class="weui-cell weui-cell_access base" href="javascript:;">
        <div class="weui-cell__bd">
            <p>职称</p>
        </div>
        <div class="weui-cell__ft" base="title">{{ $model->title }}</div>
    </a>

    <a class="weui-cell weui-cell_access base" href="javascript:;">
        <div class="weui-cell__bd">
            <p>专业</p>
        </div>
        <div class="weui-cell__ft" base="specialty">{{ $model->specialty }}</div>
    </a>

    <a class="weui-cell weui-cell_access base" href="javascript:;">
        <div class="weui-cell__bd">
            <p>技能</p>
        </div>
        <div class="weui-cell__ft" base="skills">{{ $model->skills }}</div>
    </a>
    <a class="weui-cell weui-cell_access desc-field" href="javascript:;">
        <div class="weui-cell__bd">
            <p>介绍</p>
        </div>
        <div class="weui-cell__ft"></div>
    </a>


</div>
    <a class="weui-cell weui-cell_access" href="javascript:;">
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__bd"></div>
            <div class="weui-panel__bd">
                <div class="weui-media-box weui-media-box_text">
                    <p class="weui-media-box__desc desc-value"> {{ $model->description }}</p>
                </div>
            </div>
        </div>
    </a>
    <div class="weui-cells">
    <a class="weui-cell weui-cell_access pwd" href="javascript:;">
        <div class="weui-cell__bd">
            <p>修改密码</p>
        </div>
        <div class="weui-cell__ft" ></div>
    </a>
    </div>
{{--医生介绍--}}
<div id="descModal" class="weui-popup__container popup-bottom">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <div class="toolbar">
            <div class="toolbar-inner">
                <a href="javascript:;" class="picker-button close-popup">关闭</a>
                <h1 class="title">医生介绍</h1>
            </div>
        </div>
        <div class="modal-content">
            <div class="weui-cells">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <textarea class="weui-textarea" rows="2" type="text" placeholder="请输入文本" name="desc"  maxlength="100" onpropertychange="countNum(this)" oninput="countNum(this)">{{$model->description}}</textarea>
                        <div class="weui-textarea-counter"><span>{{ mb_strlen($model->description) }}</span>/100</div>
                    </div>
                </div>
            </div>

            <div class="weui-btn-area submit-margin" >
                <a class="weui-btn weui-btn_primary submit" href="javascript:;" >提交</a>
            </div>
        </div>

    </div>
</div>
{{--修改密码--}}
<div id="pwdModal" class="weui-popup__container popup-bottom">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <div class="toolbar">
            <div class="toolbar-inner">
                <a href="javascript:;" class="picker-button close-popup">关闭</a>
                <h1 class="title">更新密码</h1>
            </div>
        </div>
        <div class="modal-content">
            <div class="weui-cells weui-cells_form">
                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label class="weui-label">原密码</label></div>
                        <div class="weui-cell__bd">
                            <input class="weui-input" type="password"  placeholder="请输入原密码" name="oldpwd">
                        </div>
                    </div>

                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label class="weui-label">新密码</label></div>
                        <div class="weui-cell__bd">
                            <input class="weui-input" type="password"  placeholder="请输入新密码" name="newpwd">
                        </div>
                    </div>

                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label class="weui-label">确认密码</label></div>
                        <div class="weui-cell__bd">
                            <input class="weui-input" type="password"  placeholder="请确认密码" name="repwd">
                        </div>
                    </div>

            </div>

            <div class="weui-btn-area submit-margin" >
                <a class="weui-btn weui-btn_primary submit" href="javascript:;" >提交</a>
            </div>
        </div>

    </div>
</div>

@stop

@push('js')
<script type="text/javascript">
    var mobile_pattern = /^1\d{10}$/;
    var id_code_pattern = /^(^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$)|(^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])((\d{4})|\d{3}[Xx])$)$/;
    var email_pattern = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/;

    /**
     * 基本信息修改
     */
    $('.base').on('click',function(){
        var _this = $(this).find('.weui-cell__ft');
        var key = _this.attr('base');
        var value = _this.text();

        $.prompt({
            title:_this.siblings('div').find('p').text(),
            text:'',
            input:value,
            onOK:function(input){
                if($.trim(input) == '' || $.trim(input) == value){
                    return false;
                }
                if(key == 'mobile' && !mobile_pattern.test(input)){
                    $.alert('手机格式不正确');return false;
                }else if(key == 'id_code' && !id_code_pattern.test(input)){
                    $.alert('身份证格式不正确');return false;
                }else if(key == 'email' && !email_pattern.test(input)){
                    $.alert('邮箱格式不正确');return false;
                }
                $.ajax({
                    type:'GET',
                    url:'{{ URL::action('Doctor\HomeController@save') }}',
                    dataType:'json',
                    data:{value:input,field:key},
                    success:function(data){
                        _this.text(input);
                        if(key == 'id_code'){
                            $('.birth').text(data.birth);
                            $('.sex').text(data.sex);
                        }
                        $.toast('操作成功');
                    },
                    error:function(data){
                        $.toast('操作失败');
                    }
                });
            },
            onCancel:function(){

            }
        });
    })
    //医生介绍
    $('.desc-field').on('click', function () {
        let desc = $('.desc-value').text();
        if($.trim(desc) != '') {
            $('textarea[name="desc"]').val(desc);
        }
        $('#descModal').popup();
    })
    var descLoading = false;
    $('#descModal .submit').on('click',function(){
        if(descLoading){
            return false;
        }
        descLoading = true;
        let desc = $.trim($('textarea[name="desc"]').val());
        if($.trim(desc) == '' || desc == $('.desc-value').text()){
            $.closePopup();
            return false;
        }
        $.ajax({
            type:'GET',
            url:'{{ URL::action('Doctor\HomeController@save') }}',
            dataType:'json',
            data:{value:desc,field:'description'},
            success:function(data){
                $('.desc-value').text(desc);
                $.toast('操作成功');
                $.closePopup();
                descLoading = false;
            },
            error:function(data){
                $.toast('操作失败');
                descLoading = false;
            }
        });
    });
    //医生介绍字符数统计
    function countNum(evt){
        $('.weui-textarea-counter span').text($(evt).val().length);
    }

    //更新密码
    $('.pwd').on('click',function(){
       $('#pwdModal').popup();
    });
    var pwdLoading = false;
    $('#pwdModal .submit').on('click',function(){
        if(pwdLoading){
            return false;
        }
        pwdLoading = true;
       let oldpwd = $.trim($('input[name="oldpwd"]').val());
       let newpwd = $.trim($('input[name="newpwd"]').val());
       let repwd = $.trim($('input[name="repwd"]').val());
        if(oldpwd==''){
            $.alert('请输入原密码');return false;
        }
        if(newpwd.length <6){
            $.alert('密码长度至少6位');return false;
        }
        if(newpwd != repwd){
            $.alert('两次密码不匹配');return false;
        }
        $.ajax({
            type:'POST',
            url:'{{ URL::action("Doctor\HomeController@updatepwd") }}',
            dataType:'json',
            data:{oldpwd:oldpwd,newpwd:newpwd,repwd:repwd},
            success:function(data){
                if(data.success == true){
                    $.closePopup();
                    $.toast('更新成功');
                }else if(data.success == false) {
                    $.alert('原密码不正确');
                }
                pwdLoading = false;
            },
            error:function(data){
                $.alert('更新失败');
                pwdLoading = false;
            }
        });
    });
</script>
@endpush

