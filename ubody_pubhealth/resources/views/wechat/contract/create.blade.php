@extends('wechat.layout')
@section('css')
@stop

@section('wechat_content')
    <form action="{{ URL::action('Wechat\ContractController@store') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" value="{{ $group->id }}" name="group_id"/>
        <div class="weui-cells__title">签约信息</div>
        <div class="weui-cells">
            <div class="weui-cell {{ $errors->has('real_name') ? 'weui-cell_warn' : '' }}">
                <div class="weui-cell__hd">
                    <label class="weui-label">签约人姓名</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" name="real_name" type="text" placeholder="请输入姓名"
                           value="{{ isset($errors) && $errors->has('real_name') ? old('real_name') : $user->real_name}}"/>
                </div>
                @if($errors->has('real_name'))
                    <div class="weui-cell__ft">
                        <i class="weui-icon-warn"></i>
                    </div>
                @endif
            </div>

            <div class="weui-cell {{ $errors->has('id_code') ? 'weui-cell_warn' : '' }}">
                <div class="weui-cell__hd">
                    <label class="weui-label">身份证号码</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" name="id_code" type="number" placeholder="请输入身份证号码"
                           value="{{ isset($errors) && $errors->has('id_code') ? old('id_code') : $user->id_code}}"/>
                </div>
                @if($errors->has('id_code'))
                    <div class="weui-cell__ft">
                        <i class="weui-icon-warn"></i>
                    </div>
                @endif
            </div>

            <div class="weui-cell {{ $errors->has('mobile') ? 'weui-cell_warn' : '' }}">
                <div class="weui-cell__hd">
                    <label class="weui-label">电话号码</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" name="mobile" type="number" placeholder="请输入电话号码"
                           value="{{ isset($errors) && $errors->has('mobile') ? old('mobile') : $user->mobile }}"/>
                </div>
                @if($errors->has('mobile'))
                    <div class="weui-cell__ft">
                        <i class="weui-icon-warn"></i>
                    </div>
                @endif
            </div>

            <div class="weui-cell {{ $errors->has('address') ? 'weui-cell_warn' : '' }}">
                <div class="weui-cell__hd">
                    <label class="weui-label">详细住址</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" name="address" type="text" placeholder="请输入详细住址"
                           value="{{ isset($errors) && $errors->has('address') ? old('address') : $user->address }}"/>
                </div>
                @if($errors->has('address'))
                    <div class="weui-cell__ft">
                        <i class="weui-icon-warn"></i>
                    </div>
                @endif
            </div>
        </div>

        <div class="weui-cells__title">选择签约服务</div>
        <div class="weui-cells weui-cells_radio">
            @foreach($group->packages as $package)
                <label class="weui-cell weui-check__label" for="package_{{ $package->id }}">
                    <div class="weui-cell__bd">
                        <p>{{ $package->name }}</p>
                    </div>
                    <div class="weui-cell__ft">
                        <small>￥{{ $package->price }} 元</small>
                        <input type="radio" class="weui-check" name="package_id" id="package_{{ $package->id }}" value="{{ $package->id }}" />
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
            @endforeach
        </div>

        <div class="weui-cells__title">选择家人</div>
        <div class="weui-cells weui-cells_checkbox">
            @foreach($user->family as $family)
                <label class="weui-cell weui-check__label" for="family_{{ $family->id }}">
                    <div class="weui-cell__bd">
                        <p>{{ $family->relationship }}</p>
                    </div>
                    <div class="weui-cell__ft">
                        <small>{{ $family->name }}</small>
                        <input type="checkbox" class="weui-check" name="family" id="family_{{ $family->id }}"
                               checked="checked" value="{{ $family->id }}"/>
                        <i class="weui-icon-checked"></i>
                    </div>
                </label>
            @endforeach
            <a href="javascript:void(0);" class="weui-cell weui-cell_link">
                <div class="weui-cell__bd">添加家人</div>
            </a>
        </div>

        <label for="weuiAgree" class="weui-agree">
            <input id="weuiAgree" type="checkbox" class="weui-agree__checkbox">
            <span class="weui-agree__text">阅读并同意<a href="javascript:void(0);">《家庭医生签约服务协议》</a></span>
        </label>

        <div class="weui-btn-area">
            <button id="btn_submit" type="submit" class="weui-btn weui-btn_disabled weui-btn_primary"
                    disabled="disabled">提交签约信息
            </button>
        </div>
    </form>
@stop

@section('js')
    <script type="text/javascript">
        $(function () {
            $("#weuiAgree").click(function () {
                if ($(this).is(':checked')) {
                    $("#btn_submit").removeClass('weui-btn_disabled').removeAttr('disabled');
                } else {
                    $("#btn_submit").addClass('weui-btn_disabled').attr('disabled', 'disabled');
                }
            });
        });
    </script>
@stop