@extends('tenant.layout')
@push('css')
<link rel="stylesheet" href="/css/table.css">
@endpush
@section('content_header')
    <h1>肺结核患者第一次入户随访记录表</h1>
@stop
@section('content')
    <div class="box box-primary">
        <form class="form-horizontal" id="formArchive">
            <input type="hidden" name="archive_id" value="{{$input['archive_id']}}">
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-4">
                    {!! Form::text('real_name', \App\Models\Archive::findOrFail($input['archive_id'])->real_name, ['id'=>'real_name','class'=>'form-control', 'placeholder'=>'请输入姓名','disabled'=>'disabled']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">随访日期</label>
                <div class="col-sm-4">
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
                <div class="col-sm-10 healthy">
                    <label class="label_color">
                        {!! Form::radio('visit_mode', 1, false) !!}&nbsp;门诊
                    </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">
                        {!! Form::radio('visit_mode', 2, false) !!}&nbsp;家庭
                    </label>&nbsp;&nbsp;&nbsp;
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">患者类型</label>
                <div class="col-sm-10 healthy">
                    <label class="label_color">
                        {!! Form::radio('patient_type', 1, false) !!}&nbsp;初治
                    </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">
                        {!! Form::radio('patient_type', 2, false) !!}&nbsp;复治
                    </label>&nbsp;&nbsp;&nbsp;
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">痰菌情况</label>
                <div class="col-sm-10 healthy">
                    <label class="label_color">
                        {!! Form::radio('sputum_situation', 1, false) !!}&nbsp;阳性
                    </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">
                        {!! Form::radio('sputum_situation', 2, false) !!}&nbsp;阴性
                    </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">
                        {!! Form::radio('sputum_situation', 3, false) !!}&nbsp;未查痰
                    </label>&nbsp;&nbsp;&nbsp;
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">耐药情况</label>
                <div class="col-sm-10 healthy">
                    <label class="label_color">
                        {!! Form::radio('drug_resistance', 1, false) !!}&nbsp;耐药
                    </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">
                        {!! Form::radio('drug_resistance', 2, false) !!}&nbsp;非耐药
                    </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">
                        {!! Form::radio('drug_resistance', 3, false) !!}&nbsp;未检测
                    </label>&nbsp;&nbsp;&nbsp;
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">症状及体征</label>
                <div class="col-sm-10">
                    <label class="label_color">{!! Form::checkbox('symptom', 1, false) !!} &nbsp;没有症状</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('symptom', 2, false) !!} &nbsp;咳嗽咳痰</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('symptom', 3, false) !!} &nbsp;低热盗汗</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('symptom', 4, false) !!} &nbsp;咯血或血痰</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('symptom', 5, false) !!} &nbsp;胸痛消瘦</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('symptom', 6, false) !!} &nbsp;恶心纳差</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('symptom', 7, false) !!} &nbsp;头痛失眠</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('symptom', 8, false) !!} &nbsp;视物模糊</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('symptom', 9, false) !!} &nbsp;皮肤瘙痒、皮疹</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('symptom', 10, false) !!} &nbsp;耳鸣、听力下降</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('symptom', 11,false) !!} &nbsp;其他</label>&nbsp;&nbsp;&nbsp;
                    <label>
                        <input type="text" class="form-control" name="symptom_content" id="" placeholder="请输入其他情况" disabled="disabled" style="width:229px">
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">用药</label>
                <div class="col-sm-10" style="margin-top: -2px;">
                    <label>
                        {!! Form::text('chemotherapy_regimen', null, ['id'=>'chemotherapy-regimen','class'=>'form-control', 'placeholder'=>'请填写化疗方案']) !!}
                    </label><br />
                    <span>用法</span>
                    <label class="label_color">{!! Form::radio('usage', 1, false) !!}&nbsp;每日</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::radio('usage', 2, false) !!}&nbsp;间歇</label><br />
                    <span>药品剂型</span>
                    <label class="label_color">{!! Form::checkbox('drug_dosage_forms', 1,false,['id'=>'drug_dosage_forms']) !!}&nbsp;固定剂量复合制剂</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('drug_dosage_forms', 2,false,['id'=>'drug_dosage_forms']) !!}&nbsp;散装药</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('drug_dosage_forms', 3,false,['id'=>'drug_dosage_forms']) !!}&nbsp;板式组合药 </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('drug_dosage_forms', 4,false,['id'=>'drug_dosage_forms']) !!}&nbsp;注射剂</label> <br />
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">督导人员选择</label>
                <div class="col-sm-10">
                    <label class="label_color">{!! Form::checkbox('supervise_staff', 1,false) !!}&nbsp;医生</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('supervise_staff', 2,false) !!}&nbsp;家属</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('supervise_staff', 3,false) !!}&nbsp;自服药 </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::checkbox('supervise_staff', 4,false) !!}&nbsp;其他</label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">家庭居住环境评估</label>
                <div class="col-sm-10">
                    <span><label>单独的居室</label></span>
                    <label class="label_color">{!! Form::radio('single_room', 1, false) !!}&nbsp;有</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::radio('single_room', 2, false) !!}&nbsp;无</label>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <span><label>通风情况</label></span>
                    <label class="label_color">{!! Form::radio('ventilation', 1, false) !!}&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::radio('ventilation', 2, false) !!}&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::radio('ventilation', 3, false) !!}&nbsp;差</label>&nbsp;&nbsp;&nbsp;
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">生活方式指导</label>
                <div class="col-sm-1 healthy pddleft0" style="width:62px;">
                    <span class="mt10" style="width:62px;">&nbsp;吸烟量</span>
                </div>
                <div class="col-sm-2 healthy pddright0">
                    {!! Form::text('smoke', null, ['id'=>'smoke','class'=>'form-control', 'placeholder'=>'请输入日吸烟量（支）']) !!}
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt10">&nbsp;支/天</span>
                </div>
                <div class="col-sm-1 healthy pddleft0" style="width:62px;">
                    <span class="mt10" style="width:62px;">&nbsp;饮酒量</span>
                </div>
                <div class="col-sm-2 healthy pddright0">
                    {!! Form::text('drink_wine', null, ['id'=>'drink_wine','class'=>'form-control', 'placeholder'=>'请输入日饮酒量（两）']) !!}
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt10">&nbsp;两/天</span>
                </div>
                <div class="col-sm-6"></div>
                <div class="clear"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">健康教育及培训</label>
                <div class="col-sm-2 healthy">
                    {!! Form::text('take', null, ['id'=>'take_medicine','class'=>'form-control', 'placeholder'=>'请输入取药地点']) !!}
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-4">
                    <div class="input-group date">
                        {!! Form::text('take_at', null, ['id'=>'take_medicine_at','class'=>'form-control','placeholder'=>'请填写取药日期', 'readonly'=>'true']) !!}
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
                <div style="clear: both;"></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-10" style="margin-top: 10px;">
                    <span class="col-sm-3"><label>服药记录卡的填写</label></span>
                    <label class="label_color">{!! Form::radio('record', 1, false) !!}&nbsp;掌握</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::radio('record', 2, false) !!}&nbsp;未掌握</label>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-10" style="margin-top: 10px;">
                    <span class="col-sm-3"><label>服药方法及药品存放</label></span>
                    <label class="label_color">{!! Form::radio('storage', 1, false) !!}&nbsp;掌握</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::radio('storage', 2, false) !!}&nbsp;未掌握</label>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-10" style="margin-top: 10px;">
                    <span class="col-sm-3"><label>肺结核治疗疗程</label></span>
                    <label class="label_color">{!! Form::radio('course', 1, false) !!}&nbsp;掌握</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::radio('course', 2, false) !!}&nbsp;未掌握</label>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-10" style="margin-top: 10px;">
                    <span class="col-sm-3"><label>不规律服药危害</label></span>
                    <label class="label_color">{!! Form::radio('irregular', 1, false) !!}&nbsp;掌握</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::radio('irregular', 2, false) !!}&nbsp;未掌握</label>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-10" style="margin-top: 10px;">
                    <span class="col-sm-3"><label>服药后不良反应及处理</label></span>
                    <label class="label_color">{!! Form::radio('adverse', 1, false) !!}&nbsp;掌握</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::radio('adverse', 2, false) !!}&nbsp;未掌握</label>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-10" style="margin-top: 10px;">
                    <span class="col-sm-3"><label>治疗期间复诊查痰</label></span>
                    <label class="label_color">{!! Form::radio('referral', 1, false) !!}&nbsp;掌握</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::radio('referral', 2, false) !!}&nbsp;未掌握</label>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-10" style="margin-top: 10px;">
                    <span class="col-sm-3"><label>外出期间如何坚持服药</label></span>
                    <label class="label_color">{!! Form::radio('adherence', 1, false) !!}&nbsp;掌握</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::radio('adherence', 2, false) !!}&nbsp;未掌握</label>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-10" style="margin-top: 10px;">
                    <span class="col-sm-3"><label>生活习惯及注意事项</label></span>
                    <label class="label_color">{!! Form::radio('habits', 1, false) !!}&nbsp;掌握</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::radio('habits', 2, false) !!}&nbsp;未掌握</label>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-10" style="margin-top: 10px;">
                    <span class="col-sm-3"><label>密切接触者检查</label></span>
                    <label class="label_color">{!! Form::radio('contact', 1, false) !!}&nbsp;掌握</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">{!! Form::radio('contact', 2, false) !!}&nbsp;未掌握</label>&nbsp;&nbsp;&nbsp;
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">下次随访日期</label>
                <div class="col-sm-4">
                    <div class="input-group date">
                        {!! Form::text('next_visited_at', null, ['id'=>'next_visited_at','class'=>'form-control','placeholder'=>'请填写下次随访日期', 'readonly'=>'true']) !!}
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">评估医生签名</label>
                <div class="col-sm-10">
                    {!! Form::text('visit_doctor_signature', null, ['id'=>'visit_doctor_signature','class'=>'form-control', 'placeholder'=>'请填写随访医生签名' ]) !!}
                </div>
            </div>

            <div class="box-footer">
                <div class="form-actions col-sm-10 col-sm-offset-2">
                    <input type="submit" value="提交" class="btn btn-primary">
                    <a href="javascript:window.history.go(-1);" class="btn btn-default">返回</a>
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
        $(function () {
            $(".btn-danger").click(function(){
                if(confirm('确认要删除')){
                    $.post($(this).attr('href'),{'_method': 'delete'},function(result){
                        if(result.success) {
                            window.location.reload();
                        }
                    });
                }
                return false;
            });
            $('#ajax').on('hidden.bs.modal', function (e) {
                $(this).removeData("bs.modal");
            });
        });
    </script>
    <script type="text/javascript">
        function removeItem(obj) {
            $(obj).parent().parent().remove();
        }

        $(function () {
            $("#formArchive").validate({
                rules: {
                    visited_at: 'required',
                    visit_mode: 'required',
                    patient_type: 'required',
                    sputum_situation: 'required',
                    drug_resistance: 'required',
                    supervise_staff: 'required',
                    visit_doctor_signature: 'required',
                    next_visited_at: 'required',
                },
                submitHandler: function (form) {
                    var oInp = document.getElementsByName('drug_dosage_forms');
                    var drug = [];
                    for(var i=0;i<oInp.length;i++){
                        if (oInp[i].checked){
                            drug.push(oInp[i].value);
                        }
                    }

                    var sInp = document.getElementsByName('supervise_staff');
                    var staff = [];
                    for(var i=0;i<sInp.length;i++){
                        if (sInp[i].checked){
                            staff.push(sInp[i].value);
                        }
                    }
                    var postData = {
                        'archive_id': $("input[name=archive_id]").val(),
                        'visited_at': $("input[name=visited_at]").val(),
                        'visit_mode': $("input[name=visit_mode]:checked").val(),
                        'patient_type':$("input[name=patient_type]:checked").val(),
                        'sputum_situation': $("input[name=sputum_situation]:checked").val(),
                        'drug_resistance': $("input[name=drug_resistance]:checked").val(),

                        'symptom': $("input[name=symptom]:checked").map(function (index, element) {
                            return this.value == 11 ? {
                                    'value': this.value,
                                    'content': $("input[name=symptom_content]").val()
                                } : {'value': this.value,'content':null};
                        }).get(),

                        'medication':{
                            'chemotherapy_regimen': $("input[name=chemotherapy_regimen]").val(),
                            'usage': $("input[name=usage]:checked").val(),
                            'drug_dosage_forms': drug,
                        },

                        'supervise_staff': staff,

                        'living_environment':{
                            'single_room': $("input[name=single_room]:checked").val(),
                            'ventilation': $("input[name=ventilation]:checked").val()
                        },

                        'life_style':{
                            'smoke': $("input[name=smoke]").val(),
                            'drink_wine': $("input[name=drink_wine]").val()
                        },

                        'education_training':{
                            'take':$("input[name=take]").val(),
                            'take_at':$("input[name=take_at]").val(),
                            'record':$("input[name=record]:checked").val(),
                            'storage':$("input[name=storage]:checked").val(),
                            'course':$("input[name=course]:checked").val(),
                            'irregular':$("input[name=irregular]:checked").val(),
                            'adverse':$("input[name=adverse]:checked").val(),
                            'referral':$("input[name=referral]:checked").val(),
                            'adherence':$("input[name=adherence]:checked").val(),
                            'habits':$("input[name=habits]:checked").val(),
                            'contact':$("input[name=contact]:checked").val(),
                        },

                        'next_visited_at': $("input[name=next_visited_at]").val(),
                        'visit_doctor_signature': $("input[name=visit_doctor_signature]").val(),

                    };

                    $.post("{{ URL::action('Tenant\VisitTuberculosisFirstRecordController@store') }}", postData, function(data){
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
            $("input[name=adverse_drug]").change(function () {
                if ($(this).val() == 1) {
                    if ($(this).is(':checked')) {
                        $("input[name=adverse_drug_content]").attr('disabled', 'disabled').empty();
                    } else {
                        $("input[type=radio][name=complexion]").not(":first").removeAttr('disabled');
                    }
                }
                if ($(this).val() == 2) {
                    if ($(this).is(':checked')) {
                        $("input[name=adverse_drug_content]").removeAttr('disabled');
                    } else {
                        $("input[name=adverse_drug_content]").attr('disabled', 'disabled');
                    }
                }
            });
            $("input[name=complication]").change(function () {
                if ($(this).val() == 1) {
                    if ($(this).is(':checked')) {
                        $("input[name=complication_content]").attr('disabled', 'disabled').empty();
                    } else {
                        $("input[type=radio][name=complication]").not(":first").removeAttr('disabled');
                    }
                }
                if ($(this).val() == 2) {
                    if ($(this).is(':checked')) {
                        $("input[name=complication_content]").removeAttr('disabled');
                    } else {
                        $("input[name=complication_content]").attr('disabled', 'disabled');
                    }
                }
            });
            $("input[name=symptom]").change(function () {
                if ($(this).val() == 1) {
                    if ($(this).is(':checked')) {
                        $("input[name=symptom]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                        $("input[name=symptom_content]").attr('disabled', 'disabled').empty();
                    } else {
                        $("input[type=checkbox][name=symptom]").not(":first").removeAttr('disabled');
                    }
                }
                if ($(this).val() == 11) {
                    if ($(this).is(':checked')) {
                        $("input[name=symptom_content]").removeAttr('disabled');
                    } else {
                        $("input[name=symptom_content]").attr('disabled', 'disabled');
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        window.onload = function() {
            var inputs = document.getElementsByTagName("input");
            for(i = 0; i < inputs.length; i++) {
                inputs[i].onblur = function() {
                    var add1 = document.getElementById("actual_medication").value;
                    var add2 = document.getElementById("number_medications").value;
                    document.getElementById("medication_rate").value = 100*(add1 * 1) /( add2 * 1);
                }
            }
        }
    </script>
@stop