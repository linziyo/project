@extends('doctor.layout')
@section('css')
    <link href="{{ url('/assets/jqweuix/css/jqweuix.css') }}" rel="stylesheet"/>
@stop

@section('wechat_content')
        <input type="hidden" name="id" value="{{ $id }}">
        <div class="weui-cells__title">基本信息</div>
        <div class="weui-cells weui-cells_form baseinfo">
            <div class="weui-cell weui-cell_warn">
                <div class="weui-cell__hd"><label class="weui-label">姓名</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入姓名" name="real_name" value="{{ $archive->real_name }}"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div class="weui-cell weui-cell_warn">
                <div class="weui-cell__hd"><label class="weui-label">身份证号码</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入身份证号码" name="id_code" value="{{ $archive->id_code }}"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div class="weui-cell weui-cell_warn">
                <div class="weui-cell__hd"><label class="weui-label">联系电话</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入联系电话" name="mobile" value="{{ $archive->mobile }}"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
            <div class="weui-cell weui-cell_warn">
                <div class="weui-cell__hd"><label class="weui-label">常住地址</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入常住地址" name="address" value="{{ $archive->address }}"/>
                </div>
                <div class="weui-cell__ft">
                    <i class="weui-icon-warn"></i>
                </div>
            </div>
        </div>



        <div class="weui-cells__title">家庭资料</div>
        <div class="weui-cells family">
            @if (!empty($family))
                @foreach($family as $item)
                    @if($item['id_code'] == $archive->id_code)
                        @continue
                    @endif
                    <a class="weui-cell weui-cell_access family-member"  data-relationship="{{ $item['relationship'] }}" data-name="{{ $item['name'] }}" data-mobile="{{ $item['mobile'] }}" data-id_code="{{ $item['id_code'] }}">
                        <div class="weui-cell__bd">{{ $item['relationship'] }}</div>
                        <div class="weui-cell__ft">{{ $item['name'] }}&nbsp;{{ $item['id_code'] }}</div>
                    </a>
                    @endforeach
            @endif

            <a href="javascript:;" class="weui-cell weui-cell_link open-popup" data-target="#addFamily">
                <div class="weui-cell__bd">添加更多</div>
            </a>

        </div>

        <div id="addFamily" class="weui-popup__container popup-bottom">
            <div class="weui-popup__overlay"></div>
            <div class="weui-popup__modal">
                <div class="toolbar">
                <div class="toolbar-inner">
                    <a href="javascript:;" class="picker-button close-popup">关闭</a>
                    <h1 class="title">家庭成员</h1>
                </div>
                </div>
                <div class="modal-content">
                    <div class="weui-cells weui-cells_form">
                        <div class="weui-cell">
                            <div class="weui-cell__hd">
                                <label class="weui-label">关系</label>
                            </div>
                            <div class="weui-cell__bd">
                                <input class="weui-input" type="text" placeholder="关系" name="relationship">
                            </div>
                        </div>
                    </div>

                    <div class="weui-cells weui-cells_form">
                        <div class="weui-cell">
                            <div class="weui-cell__hd">
                                <label class="weui-label">姓名</label>
                            </div>
                            <div class="weui-cell__bd">
                                <input class="weui-input" type="text" placeholder="姓名" name="name">
                            </div>
                        </div>
                    </div>

                    <div class="weui-cells weui-cells_form">
                        <div class="weui-cell">
                            <div class="weui-cell__hd">
                                <label class="weui-label">手机</label>
                            </div>
                            <div class="weui-cell__bd">
                                <input class="weui-input" type="number" placeholder="手机号" name="mobile">
                            </div>
                        </div>
                    </div>

                    <div class="weui-cells weui-cells_form">
                        <div class="weui-cell">
                            <div class="weui-cell__hd">
                                <label class="weui-label">身份证</label>
                            </div>
                            <div class="weui-cell__bd">
                                <input class="weui-input" type="number" placeholder="身份证号" name="id_code">
                            </div>
                        </div>
                    </div>

                    <div class="weui-btn-area">
                        <a class="weui-btn weui-btn_primary" href="javascript:;" onclick="addFamily()">提交</a>
                    </div>
                </div>

            </div>
        </div>

        <div id="updateFamily" class="weui-popup__container popup-bottom">
            <div class="weui-popup__overlay"></div>
            <div class="weui-popup__modal">
                <div class="toolbar">
                    <div class="toolbar-inner">
                        <a href="javascript:;" class="picker-button close-popup">关闭</a>
                        <h1 class="title">家庭成员</h1>
                    </div>
                </div>
                <div class="modal-content">
                    <div class="weui-cells weui-cells_form">
                        <div class="weui-cell">
                            <div class="weui-cell__hd">
                                <label class="weui-label">关系</label>
                            </div>
                            <div class="weui-cell__bd">
                                <input class="weui-input" type="text" placeholder="关系" name="relationship">
                            </div>
                        </div>
                    </div>

                    <div class="weui-cells weui-cells_form">
                        <div class="weui-cell">
                            <div class="weui-cell__hd">
                                <label class="weui-label">姓名</label>
                            </div>
                            <div class="weui-cell__bd">
                                <input class="weui-input" type="text" placeholder="姓名" name="name">
                            </div>
                        </div>
                    </div>

                    <div class="weui-cells weui-cells_form">
                        <div class="weui-cell">
                            <div class="weui-cell__hd">
                                <label class="weui-label">手机</label>
                            </div>
                            <div class="weui-cell__bd">
                                <input class="weui-input" type="number" placeholder="手机号" name="mobile">
                            </div>
                        </div>
                    </div>

                    <div class="weui-cells weui-cells_form">
                        <div class="weui-cell">
                            <div class="weui-cell__hd">
                                <label class="weui-label">身份证</label>
                            </div>
                            <div class="weui-cell__bd">
                                <input class="weui-input" type="number" placeholder="身份证号" name="id_code">
                            </div>
                        </div>
                    </div>

                    <div class="weui-btn-area">
                        <a class="weui-btn weui-btn_primary submit" href="javascript:;" >修改</a>
                    </div>
                </div>

            </div>
        </div>


        <div class="weui-cells__title">签约服务</div>
        <div class="weui-cells">
            <div class="weui-cell weui-cell_select">
                <div class="weui-cell__bd">
                    <select class="weui-select package-service" name="select">
                        @foreach ($packages as $item)
                            <option value="{{ $item['id'] }}">{{ $item['name'] }}({{ number_format($item['price'],2) }}元)</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="weui-cells__title">协议照片</div>
        <div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <div class="weui-uploader">
                        <div class="weui-uploader__hd">
                            <p class="weui-uploader__title">图片上传</p>
                            <div class="weui-uploader__info">0/2</div>
                        </div>
                        <div class="weui-uploader__bd">
                            <ul class="weui-uploader__files" id="uploaderFiles">
                                <li class="weui-uploader__file" style="background-image:url(http://jqweui.com/dist/demos/images/pic_160.png)"></li>
                                <li class="weui-uploader__file" style="background-image:url(http://jqweui.com/dist/demos/images/pic_160.png)"></li>
                                <li class="weui-uploader__file" style="background-image:url(http://jqweui.com/dist/demos/images/pic_160.png)"></li>
                                <li class="weui-uploader__file weui-uploader__file_status" style="background-image:url(http://jqweui.com/dist/demos/images/pic_160.png)">
                                    <div class="weui-uploader__file-content">
                                        <i class="weui-icon-warn"></i>
                                    </div>
                                </li>
                                <li class="weui-uploader__file weui-uploader__file_status" style="background-image:url(http://jqweui.com/dist/demos/images/pic_160.png)">
                                    <div class="weui-uploader__file-content">50%</div>
                                </li>
                            </ul>
                            <div class="weui-uploader__input-box">
                                <input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" multiple="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <label for="weuiAgree" class="weui-agree">
            @if(empty($contract_status))
            <input id="weuiAgree" type="checkbox" class="weui-agree__checkbox"/>
            <span class="weui-agree__text">阅读并同意<a href="javascript:void(0);">《相关条款》</a></span>
            @else
                <input id="weuiAgree" type="checkbox" class="weui-agree__checkbox" checked/>
                <span class="weui-agree__text">阅读并同意<a href="javascript:void(0);">《相关条款》</a></span>
            @endif
        </label>
        @if(empty($contract_status) or $contract_status == 1)
            <div class="weui-btn-area">
                <button type="submit" class="weui-btn weui-btn_primary">确认签约</button>
            </div>
            @elseif($contract_status == 2)
            <button type="submit" class="weui-btn weui-btn_primary">修改</button>
            @endif

@stop

@push('js')
<script type="text/javascript">
    var pattern = /^(^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$)|(^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])((\d{4})|\d{3}[Xx])$)$/;
    var contract_status = {{ !empty($contract_status)?$contract_status:0 }};

    /**
     * 添加家庭成员
     */
    var addFamily = function(){
        let relationship = $.trim($('#addFamily input[name="relationship"]').val());
        let name = $.trim($('#addFamily input[name="name"]').val());
        let mobile = $.trim($('#addFamily input[name="mobile"]').val());
        let id_code = $.trim($('#addFamily input[name="id_code"]').val());
        if(!familyValidate(name,mobile,id_code,relationship)){
            return false;
        }
        let html = '';
        html += '<a class="weui-cell weui-cell_access family-member" data-relationship="'+relationship+'" data-name="'+name+'" data-mobile="'+mobile+'" data-id_code="'+id_code+'">';
        html += '<div class="weui-cell__bd">'+relationship+'</div><div class="weui-cell__ft">'+name+'&nbsp;'+id_code+'</div></a>';
        $('.family').prepend(html);
        $('#addFamily input').val('');
        $.closePopup();
    }

    /**
     * 更新家庭成员
     * @param t
     */

     $('body').on('click','.family-member',function(){
         if(contract_status == 2) return;
         var _this = $(this);
         console.log(_this);
         $.actions({
             title: '家庭成员',
             actions: [
                 {
                     text: "编辑", onClick: function () {
                     $('#updateFamily input[name="relationship"]').val($(_this).attr('data-relationship'));
                     $('#updateFamily input[name="name"]').val($(_this).attr('data-name'));
                     $('#updateFamily input[name="mobile"]').val($(_this).attr('data-mobile'));
                     $('#updateFamily input[name="id_code"]').val($(_this).attr('data-id_code'));
                     $('#updateFamily').popup();
                     updateSubmit(_this);
                    }
                 }, {
                     text: "删除", onClick: function () {
                         $(_this).remove();
                     }
                 }]
         });

     })


    var updateSubmit = function(t){
        $('#updateFamily .submit').one('click',function(){
            var relationship = $('#updateFamily input[name="relationship"]').val();
            var name = $('#updateFamily input[name="name"]').val();
            var mobile = $('#updateFamily input[name="mobile"]').val();
            var id_code = $('#updateFamily input[name="id_code"]').val();
            if(!familyValidate(name,mobile,id_code,relationship)){
                return false;
            }
            $(t).attr('data-relationship',relationship);
            $(t).attr('data-name',name);
            $(t).attr('data-mobile',mobile);
            $(t).attr('data-id_code',id_code);
            $(t).find('.weui-cell__bd').text(relationship);
            $(t).find('.weui-cell__ft').html(name+'&nbsp;'+id_code);
            $.closePopup();
        })
    }

    /**
     * 家庭成员操作下拉
     * @param t
     */
    var familyPop = function(t){
        var _this = t;
        $.actions({
            title: '家庭成员',
            actions: [
                {
                    text: "编辑", onClick: function () {
                    editFamily(_this);
                    console.log(_this);
                }
                }, {
                    text: "删除", onClick: function () {
                        $(_this).remove();
                    }
                }]
        });
    }

    //家庭成员验证
    var familyValidate = function(name,mobile,id_code,relationship){
        if(name == ''){
            $.alert('姓名不能为空');
            return false;
        }
        if(mobile != '' && (isNaN(mobile) || mobile.length != 11)){
            $.alert('手机号格式不正确');
            return false;
        }
        if(!pattern.test(id_code)){
            $.alert('身份证格式不正确');
            return false;
        }
        if(relationship == ''){
            $.alert('关系不能为空');
            return false;
        }
        return true;
    }
    //签约提交
    var signForm = {};
    $('button[type="submit"]').on('click',function(){
        $.confirm('确认提交？',function(){
            if(!signValidate()){
                return false;
            }
            $.ajax({
                type:"POST",
                url:"{{ URL::action('Doctor\ContractController@store') }}",
                data:signForm,
                dataType:"json",
                success:function(data){
                    var _url = data.url;
                    $.alert('签约成功','提示',function(){
                        window.location.href = _url;
                    });
                },
                error:function(data){
                    $.alert('签约失败');
                }
            })
        },function(){

        });

    });

    /**
     * 提交验证
     * @returns {boolean}
     */
    var signValidate = function(){
        let id = $('input[name="id"]').val();
        if(id == '') {
            return false;
        }
        let real_name = $.trim($('.baseinfo input[name="real_name"]').val());
        let id_code = $.trim($('.baseinfo input[name="id_code"]').val());
        let mobile = $.trim($('.baseinfo input[name="mobile"]').val());
        let address = $.trim($('.baseinfo input[name="address"]').val());
        if(real_name == ''){
            $.alert('姓名不能为空');
            return false;
        }
        if(!pattern.test(id_code)){
            $.alert('身份证格式不对');
            return false;
        }
        if(mobile.length != 11 || isNaN(mobile)){
            $.alert('手机号格式不对');
            return false;
        }
        if(address == ''){
            $.alert('地址不能为空');
            return false;
        }
        let package_id = $('.package-service').val();
        if(package_id == ''){
            $.alert('请选择签约服务');
            return false;
        }
        let agree = $('#weuiAgree').is(':checked');
        if(!agree){
            $.alert('请同意相关条款');
            return false;
        }
        signForm.id = id;
        signForm.agree = agree;
        signForm.package_id = package_id;
        signForm.real_name = real_name;
        signForm.id_code = id_code;
        signForm.mobile = mobile;
        signForm.address = address;
        let member = [];
        $('.family .family-member').each(function(i,el){
            member.push({
                'relationship':$(this).attr('data-relationship'),
                'name':$(this).attr('data-name'),
                'mobile':$(this).attr('data-mobile'),
                'id_code':$(this).attr('data-id_code')
            });
        });
        signForm.member = member;
        return true;
    }


</script>
@endpush