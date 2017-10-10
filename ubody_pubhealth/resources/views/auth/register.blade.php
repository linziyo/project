@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        {!! Form::open(['url'=> url('/register'),'method'=>'POST','class'=>'form-horizontal','autocomplete'=>'off','id'=>'form1' ]) !!}
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            {!! Form::label('mobile','手机号码',['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('mobile','',['class'=>'form-control', 'placeholder'=>'请输入手机号码']) !!}
                            </div>
                            <div class="col-md-2">
                                <button id="btnCode" type="button" class="btn btn-block btn-default">获取验证码</button>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            {!! Form::label('code','短信验证码',['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('code','',['class'=>'form-control', 'placeholder'=>'请输入短信验证码']) !!}
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                            {!! Form::label('mobile','验证码',['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('captcha','',['class'=>'form-control', 'placeholder'=>'请输入验证码']) !!}
                            </div>
                            <div class="col-md-2">
                                <img id="imgCaptcha" src="{{ Captcha::src('mini') }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">注册</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('assets/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('laravalid/jquery.validate.laravalid.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('#form1').validate({onkeyup: false});

            $("#imgCaptcha").bind('click', function () {
                $(this).attr('src', '{{ Captcha::src('mini') }}' + "?" + Math.random());
            });

            $("#btnCode").click(function () {
                $.ajax({
                    url: '{{ URL::action('Auth\SmsController@requestValidateCode') }}',
                    data: {'mobile': $("#mobile").val()},
                    method: 'POST',
                    success: function () {
                        var time = 60;
                        $("#btnCode").addClass('weui-btn_disabled');
                        $("#btnCode").attr('disabled', 'disabled');
                        $("#btnCode").text(time + "秒后重发");
                        var interval = window.setInterval(function () {
                            time--;
                            if (time == 0) {
                                $("#btnCode").removeAttr('disabled');
                                time = 60;
                                window.clearInterval(interval);
                                $("#btnCode").text('获取验证码').removeClass('weui-btn_disabled');
                            }
                            else {
                                $("#btnCode").text(time + "秒后重发");
                            }
                        }, 1000);
                    },
                    error: function () {
//                        $.alert('error');
                    },
                    complete: function () {
                        $.hideLoading()
                    }
                });
            });
        });
    </script>
@endsection
