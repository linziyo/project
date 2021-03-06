@extends('tenant.layout')

@push('css')
<link rel="stylesheet" type="text/css" href="/css/table.css"/>
<link href="{{ asset('assets/select2/css/select2.min.css') }}" rel="stylesheet"/>
@endpush
@section('content_header')
    <h1>高血压随访表</h1>
@stop

@section('content')
    <div class="box box-primary">
        {{--<form action="{{URL::action('Tenant\\VisitHypertensionController@store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" id="formArchive" style="padding-bottom:50px;" >--}}
        <form class="form-horizontal" id="formArchive" method="post">
            <input type="hidden" name="archive_id" value="{{$input['archive_id']}}">
            <div class="container">
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">姓名</label>
                    <div class="col-sm-8">
                        {!! Form::text('real_name', \App\Models\Archive::findOrFail($input['archive_id'])->real_name, ['id'=>'real_name','class'=>'form-control', 'placeholder'=>'请输入姓名','disabled'=>'disabled']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">随访日期</label>
                    <div class="col-sm-5">
                        <div class="input-group date">
                            {!! Form::text('visited_at', null, ['id'=>'visited_at','class'=>'form-control','placeholder'=>'请输入出生日期', 'readonly'=>'true']) !!}
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">随访方式</label>
                    <div class="col-sm-4 healthy" style="margin-top:6px;">
                        <label class="label_color">{!! Form::radio('visit_mode', 1, false) !!} &nbsp;门诊 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::radio('visit_mode', 2, false) !!} &nbsp;家庭 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::radio('visit_mode', 3, false) !!} &nbsp;电话 </label>&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">症状</label>
                    <div class="col-sm-9 healthy" style="margin-top:6px;" >
                        <label class="label_color">{!! Form::checkbox('symptom', 1, false) !!} 无症状</label>
                        <label class="label_color">{!! Form::checkbox('symptom', 2, false) !!} 头痛头晕</label>
                        <label class="label_color">{!! Form::checkbox('symptom', 3, false) !!} 恶心呕吐</label>
                        <label class="label_color">{!! Form::checkbox('symptom', 4, false) !!} 眼花耳鸣</label>
                        <label class="label_color">{!! Form::checkbox('symptom', 5, false) !!} 呼吸困难</label>
                        <label class="label_color">{!! Form::checkbox('symptom', 6, false) !!} 心悸胸闷</label>
                        <label class="label_color">{!! Form::checkbox('symptom', 7, false) !!} 鼻衄出血不止</label>
                        <label class="label_color">{!! Form::checkbox('symptom', 8, false) !!} 四肢发麻</label>
                        <label class="label_color">{!! Form::checkbox('symptom', 9, false) !!} 下肢水肿</label>
                        <label class="label_color">{!! Form::checkbox('symptom', 10,false) !!} 其他</label>
                        <label>
                            <input type="text" name="symptom_content" class="form-control" placeholder="请输入其他症状" disabled="disabled"  style="width:229px;height:34px;">
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">体征</label>
                    <div class="col-sm-4 healthy pddright0">
                        {!! Form::text('blood_pressure_systolic', null, ['id'=>'blood_pressure_systolic','class'=>'form-control', 'placeholder'=>'请输入血 压（mmHg）']) !!}
                    </div>
                    <div class="col-sm-1 healthy pddleft0">
                        <span class="mt10">&nbsp;mmHg</span>
                    </div>
                    <div class="col-sm-4 healthy pddright0">
                        {!! Form::text('weight', null, ['id'=>'weight','class'=>'form-control', 'placeholder'=>'请输入体 重（kg)']) !!}
                    </div>
                    <div class="col-sm-1 healthy pddleft0">
                        <span class="mt10">&nbsp;kg</span>
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4 healthy pddright0">
                        {!! Form::text('bmi', null, ['id'=>'bmi','class'=>'form-control mt10', 'placeholder'=>'请输入体质指数 （BMI)kg/m2）']) !!}
                    </div>
                    <div class="col-sm-1 healthy pddleft0">
                        <span class="mt20">&nbsp;kg/m2</span>
                    </div>
                    <div class="col-sm-4 healthy pddright0">
                        {!! Form::text('heart_rate', null, ['id'=>'heart_rate','class'=>'form-control mt10', 'placeholder'=>'请输入心 率 （次/分钟 ）']) !!}
                    </div>
                    <div class="col-sm-1 healthy pddleft0">
                        <span class="mt20">&nbsp;次/分钟</span>
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4 healthy pddright0">
                        {!! Form::text('other_signs', null, ['id'=>'other_signs','class'=>'form-control mt10', 'placeholder'=>'请输入其他体征']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">生活方式指导</label>
                    <div class="col-sm-4 healthy pddright0">
                        {!! Form::text('smoke', null, ['id'=>'smoke','class'=>'form-control', 'placeholder'=>'请输入日吸烟量（支）']) !!}
                    </div>
                    <div class="col-sm-1 healthy pddleft0">
                        <span class="mt10">&nbsp;支</span>
                    </div>
                    <div class="col-sm-4 healthy pddright0">
                        {!! Form::text('drink_wine', null, ['id'=>'drink_wine','class'=>'form-control', 'placeholder'=>'请输入日饮酒量（两）']) !!}
                    </div>
                    <div class="col-sm-1 healthy pddleft0">
                        <span class="mt10">&nbsp;两</span>
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4 healthy pddright0">
                        {!! Form::text('sports_week', null, ['id'=>'sports_week','class'=>'form-control mt10', 'placeholder'=>'请输入运动次/周']) !!}
                    </div>
                    <div class="col-sm-1 healthy pddleft0">
                        <span class="mt20">&nbsp;次/周</span>
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4 healthy pddright0">
                        {!! Form::text('sports_minute', null, ['id'=>'sports_minute','class'=>'form-control mt10', 'placeholder'=>'请输入运动分钟/次 ']) !!}
                    </div>
                    <div class="col-sm-1 healthy pddleft0">
                        <span class="mt20">&nbsp;分钟/次</span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">生活方式指导/摄盐情况(咸淡)</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        <label class="label_color">{!! Form::radio('salt', 1, false) !!} &nbsp;轻 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::radio('salt', 2, false) !!} &nbsp;中 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::radio('salt', 3, false) !!} &nbsp;重 </label>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">生活方式指导/心理调整</label>
                    <div class="col-sm-10 healthy">
                        <label class="label_color">{!! Form::radio('psychology', 1, false) !!} &nbsp;良好 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::radio('psychology', 2, false) !!} &nbsp;一般 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::radio('psychology', 3, false) !!} &nbsp;差 </label>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">生活方式指导/遵医行为</label>
                    <div class="col-sm-10 healthy">
                        <label class="label_color">{!! Form::radio('compliance', 1, false) !!} &nbsp;良好 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::radio('compliance', 2, false) !!} &nbsp;一般 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::radio('compliance', 3, false) !!} &nbsp;差 </label>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">辅助检查*</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        {!! Form::text('auxiliary_check', null, ['id'=>'auxiliary_check','class'=>'form-control', 'placeholder'=>'请输入辅助检查']) !!}
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">服药依从性</label>
                    <div class="col-sm-10 healthy">
                        <label class="label_color">{!! Form::radio('medication_compliance', 1, false) !!} &nbsp;规律 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::radio('medication_compliance', 2, false) !!} &nbsp;间断 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::radio('medication_compliance', 3, false) !!} &nbsp;不服药 </label>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="control-label col-sm-2">药物不良反应</label>
                    <div class="col-sm-6">
                        <label class="label_color"> {!! Form::checkbox('adverse_drug',1 ,false) !!}&nbsp;无&nbsp;&nbsp;&nbsp; </label>
                        <label class="label_color"> {!! Form::checkbox('adverse_drug',2 ,false) !!}&nbsp;有&nbsp;&nbsp;&nbsp; </label>
                        <label class="label_color">
                            <input type="text" name="adverse_drug_content" class="form-control" placeholder="请输入有哪些药物不良反应" disabled="disabled">
                        </label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">此次随访分类</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        <label class="label_color">{!! Form::radio('visit_classification', 1, false) !!} &nbsp;控制满意 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::radio('visit_classification', 2, false) !!} &nbsp;控制不满意 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::radio('visit_classification', 3, false) !!} &nbsp;不良反 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::radio('visit_classification', 4, false) !!} &nbsp;并发症 </label>&nbsp;&nbsp;&nbsp;

                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">用 药 情 况</label>
                    <div id="medicationWrapper" class="col-md-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="medication_name" id="medication_name" placeholder="请输入药物名称 " />
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control text_long ml15" name="medication_dosage" id="medication_dosage" placeholder="请输入用法用量 " />
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="medication_time" id="medication_time" placeholder="请输入每日多少" />
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default btn-flat btn-block append"
                                        data-source="#tplOperation" data-target="#medicationWrapper"> 添加
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">转诊</label>
                    <div class="col-sm-5 healthy pddright0">
                        {!! Form::text('referral_reasons', null, ['id'=>'referral_reasons','class'=>'form-control', 'placeholder'=>'请输入转诊原因' ]) !!}
                    </div>
                    <div class="col-sm-1 healthy pddleft0">
                        <span class="mt10"></span>
                    </div>
                    <div class="col-sm-5 healthy pddright0">
                        {!! Form::text('organization_department', null, ['id'=>'organization_department','class'=>'form-control', 'placeholder'=>'请输入转诊机构及科别' ]) !!}
                    </div>
                    <div class="col-sm-1 healthy pddleft0">
                        <span class="mt10"></span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">下次随访日期</label>
                    <div class="col-sm-5">
                        <div class="input-group date">
                            {!! Form::text('next_visited_at', null, ['id'=>'next_visited_at','class'=>'form-control','placeholder'=>'请填写下次随访日期', 'readonly'=>'true']) !!}
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">随访医生签名</label>
                    <div class="col-sm-10">
                        <label>
                            {!! Form::text('visit_doctor_signature', null, ['id'=>'visit_doctor_signature','class'=>'form-control', 'placeholder'=>'请填写随访医生签名' ]) !!}
                        </label>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-actions col-sm-10 col-sm-offset-2">
                        <input type="submit" value="提交" class="btn btn-primary"/>
                        <a href="javascript:void(history.back())" class="btn btn-default">返回</a>
                        {{--<a href="{{ URL::action('Tenant\ArchiveController@index') }}" class="btn btn-default">返回</a>--}}
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="modal fade" id="ajax">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
@stop

@section('js')

    <script type="text/javascript">
        function removeItem(obj) {
            $(obj).parent().parent().remove();
        }

        $(function () {
            $("#formArchive").validate({
                rules: {
                    archive_id: 'required',
                    visited_at: 'required',
                    visit_mode: 'required',
                    symptom: 'required',
                    signs: 'required',
//                    auxiliary_check: 'required',
//                    medication_compliance: 'required',
                    adverse_drug: 'required',
//                    visit_classification: 'required',
                    next_visited_at: 'required',
                    visit_doctor_signature: 'required',

                },
                submitHandler: function (form) {
                    var oInp = document.getElementsByName('symptom');
                    var aInp = [];
                    for(var i=0;i<oInp.length;i++){
                        if (oInp[i].checked){
                            aInp.push(oInp[i].value);
                        }
                    }
                    var postData = {
                        'archive_id' : $("input[name=archive_id]").val(),
                        'visited_at' : $("input[name=visited_at]").val(),
                        'visit_mode': $("input[name=visit_mode]:checked").val(),
                        'symptom': $("input[name=symptom]:checked").map(function (index, element) {
                            return this.value == 10 ? {
                                    'value': this.value,
                                    'content': $("input[name=symptom_content]").val()
                                } : {'value': this.value,'content':'' };
                        }).get(),
//                        'symptoms':{
//                            'symptom': aInp,
//                            'symptom_content': $("input[name=symptom_content]").val(),
//                        },
                        'signs':{
                            'blood_pressure_systolic': $("input[name=blood_pressure_systolic]").val(),
                            'weight': $("input[name=weight]").val(),
                            'bmi': $("input[name=bmi]").val(),
                            'heart_rate': $("input[name=heart_rate]").val(),
                            'other_signs': $("input[name=other_signs]").val(),
                        },
                        'life_style':{
                            'smoke': $("input[name=smoke]").val(),
                            'drink_wine': $("input[name=drink_wine]").val(),
                            'sports_week': $("input[name=sports_week]").val(),
                            'sports_minute': $("input[name=sports_minute]").val(),
                            'salt': $("input[name=salt]:checked").val(),
                            'psychology': $("input[name=psychology]:checked").val(),
                            'compliance': $("input[name=compliance]:checked").val(),
                        },
                        'auxiliary_check': $("input[name=auxiliary_check]").val(),
                        'medication_compliance': $("input[name=medication_compliance]:checked").val(),
                        'adverse_drug':{
                            'adverse_drug':$("input[name=adverse_drug]:checked").val(),
                            'adverse_drug_content':$("input[name=adverse_drug_content]").val()
                        },
                        'visit_classification': $("input[name=visit_classification]:checked").val(),
                        'referral':{
                            'referral_reasons':$("input[name=referral_reasons]").val(),
                            'organization_department':$("input[name=organization_department]").val()
                        },

                        'next_visited_at': $("input[name=next_visited_at]").val(),
                        'visit_doctor_signature': $("input[name=visit_doctor_signature]").val(),

                        'medication_situation': $("#medicationWrapper").find('.row').map(function (index, element) {
                            return {
                                'medication_name': $(this).find("input[name=medication_name]").val(),
                                'medication_dosage': $(this).find("input[name=medication_dosage]").val(),
                                'medication_time': $(this).find("input[name=medication_time]").val()
                            };
                        }).get(),


                    };

                    $.post("{{ URL::action('Tenant\VisitHypertensionController@store') }}", postData, function(data){
                        if(data.errorCode == 0){
                            window.location.href = "{{ URL::action('Tenant\ArchiveController@show',$input['archive_id']) }}"
                        }
                    });
                    return false;
                }
            });

            $(".date").datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true,
                'language': 'zh-CN'
            });

            $("input[name=id_code]").change(function () {
                if ($(this).val().length == 18) {
                    $("input[name=follow-up-date]").val($(this).val().substr(6, 4) + '-' + $(this).val().substr(10, 2) + "-" + $(this).val().substr(12, 2));
                } else if ($(this).val().length == 15) {
                    $("input[name=follow-up-date]").val('19' + $(this).val().substr(6, 2) + '-' + $(this).val().substr(8, 2) + "-" + $(this).val().substr(8, 2));
                }
            });


            $("input[name= symptom]").change(function () {
                if ($(this).val() == 1) {
                    if ($(this).is(':checked')) {
                        $("input[name=symptom]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                        $("input[name=symptom_content]").attr('disabled', 'disabled').empty();
                    } else {
                        $("input[type=checkbox][name=symptom]").not(":first").removeAttr('disabled');
                    }
                }
                if ($(this).val() == 10) {
                    if ($(this).is(':checked')) {
                        $("input[name=symptom_content]").removeAttr('disabled');
                    } else {
                        $("input[name=symptom_content]").attr('disabled', 'disabled');
                    }
                }
            });

            $("input[type=checkbox][name=adverse_drug]").change(function () {
                if ($(this).val() == 2) {
                    if ($(this).is(':checked')) {
                        $("input[name=adverse_drug_content]").removeAttr('disabled');
                    } else {
                        $("input[name=adverse_drug_content]").attr('disabled', 'disabled');
                    }
                }
                if ($(this).val() == 1){
                    if ($(this).is(':checked')) {
                        $("input[name=adverse_drug]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                    } else {
                        $("input[name=adverse_drug]").not(":first").removeAttr('disabled');
                    }
                }
            });

            $(".append").click(function () {
                $($(this).attr('data-target')).append($($(this).attr('data-source')).html());
            });


            $('.form-control').change(function () {
                if ($(this).children('option:selected').val() == 12) {
                    $("input[name=family_disease_content]").removeAttr('disabled');
                } else {
                    $("input[name=family_disease_content]").attr('disabled', 'disabled');
                }
            });


        });
    </script>

    <script id="tplOperation" type="text/template">
        <div class="row">
            <div class="col-sm-3">
                <input type="text" class="form-control" name="medication_name" id="" placeholder="请输入药物名称 " />
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control text_long ml15" name="medication_dosage" id="" placeholder="请输入用法用量每日多少次 " />
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="medication_time" id="" placeholder="请输入用法用量每日多少" />
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
            </div>
        </div>
    </script>
@stop