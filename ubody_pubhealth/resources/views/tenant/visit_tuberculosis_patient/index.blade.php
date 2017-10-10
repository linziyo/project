@extends('tenant.layout')
@push('css')
<link rel="stylesheet" href="/css/table.css">
@endpush
@section('content_header')
    <h1>肺结核患者随访服务记录表</h1>
@stop
@section('content')
    <div class="box box-primary">
        <form class="form-horizontal" id="formArchive">
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-4">
                    <input data-rule-required="true" data-msg-required="请填写姓名." id="" class="form-control" placeholder="请输入姓名" name="real_name" value="{{\App\Models\Archive::findOrFail($input['archive_id'])->real_name}}" type="text" aria-required="true">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">随访日期</label>
                <div class="col-sm-4">
                    <div class="input-group date">
                        <input data-rule-required="true" data-msg-required="请填写随访日期." id="follow_up_date" class="form-control" placeholder="请输入随访日期" readonly="true" name="follow_up_date" type="text" aria-required="true">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">治疗月序</label>
                <div class="col-sm-4">
                    <input data-rule-required="true" data-msg-required="请填写治疗月序." type="text" class="form-control" name="treatment-order" id="treatment-order" placeholder="请输入治疗月序(第几月)">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">督导人员</label>
                <div class="col-sm-10">
                    <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写督导人员." name="supervise_staff" id="supervise_staff" value="1" aria-required="true">&nbsp;医生</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写督导人员." name="supervise_staff" id="supervise_staff" value="2" aria-required="true">&nbsp;家属</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写督导人员." name="supervise_staff" id="supervise_staff" value="3" aria-required="true">&nbsp;自服药</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写督导人员." name="supervise_staff" id="supervise_staff" value="4" aria-required="true">&nbsp;其他</label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">随访方式</label>
                <div class="col-sm-10 healthy">
                    <label class="label_color">
                        <input data-rule-required="true" data-msg-required="请填写随访方式." type="radio" name="visit_mode" value="1" aria-required="true">&nbsp;门诊
                    </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">
                        <input data-rule-required="true" data-msg-required="请填写随访方式." type="radio" name="visit_mode" value="2" aria-required="true">&nbsp;家庭
                    </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">
                        <input data-rule-required="true" data-msg-required="请填写随访方式." type="radio" name="visit_mode" value="3" aria-required="true">&nbsp;电话
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">症状及体征</label>
                <div class="col-sm-10">
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状及体征." type="checkbox" name="symptom" value="1" aria-required="true">&nbsp;没有症状</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状及体征." type="checkbox" name="symptom" value="2" aria-required="true">&nbsp;咳嗽咳痰</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状及体征." type="checkbox" name="symptom" value="3" aria-required="true">&nbsp;低热盗汗</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状及体征." type="checkbox" name="symptom" value="4" aria-required="true">&nbsp;咯血或血痰</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状及体征." type="checkbox" name="symptom" value="5" aria-required="true">&nbsp;胸痛消瘦</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状及体征." type="checkbox" name="symptom" value="6" aria-required="true">&nbsp;恶心纳差</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状及体征." type="checkbox" name="symptom" value="7" aria-required="true">&nbsp;关节疼痛</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状及体征." type="checkbox" name="symptom" value="8" aria-required="true">&nbsp;头痛失眠</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状及体征." type="checkbox" name="symptom" value="9" aria-required="true">&nbsp;视物模糊</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状及体征." type="checkbox" name="symptom" value="10" aria-required="true">&nbsp;皮肤瘙痒、皮疹</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状及体征." type="checkbox" name="symptom" value="11" aria-required="true">&nbsp;耳鸣、听力下降</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状及体征." type="checkbox" name="symptom" value="12" aria-required="true">&nbsp;其他</label>
                    <label>
                        <input type="text" class="form-control" name="symptom_content" id="" placeholder="请输入其他情况" disabled="disabled" style="width:229px">
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">生活方式指导</label>
                <div class="col-sm-1 healthy pddleft0" style="width:62px;">
                    <span class="mt10" style="width:62px;">&nbsp;吸烟量</span>
                </div>
                <div class="col-sm-2 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写吸烟量." class="form-control" name="smoke" id="smoke" placeholder="输入每日吸烟量 " />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt10">&nbsp;支/天</span>
                </div>
                <div class="col-sm-1 healthy pddleft0" style="width:62px;">
                    <span class="mt10" style="width:62px;">&nbsp;饮酒量</span>
                </div>
                <div class="col-sm-2 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写饮酒量." class="form-control" name="drink_wine" id="drink_wine" placeholder="输入每日饮酒量" />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt10">&nbsp;两/天</span>
                </div>
                <div class="col-sm-6"></div>
                <div class="clear"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">用药</label>
                <div class="col-sm-10" style="margin-top: -2px;">
                    <label>
                        <input type="text" data-rule-required="true" data-msg-required="请填写化疗方案." class="form-control" name="chemotherapy_regimen" id="chemotherapy-regimen" placeholder="请输入化疗方案" />
                    </label><br />
                    <span>用法</span>
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写用法." type="radio" name="usage" id="usage" value="1" aria-required="true">&nbsp;每日</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写用法." type="radio" name="usage" id="usage" value="2" aria-required="true">&nbsp;间歇</label><br />
                    <span>药品剂型</span>
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写药品剂型." type="checkbox" name="drug_dosage_forms" id="drug_dosage_forms" value="1" aria-required="true">&nbsp;固定剂量复合制剂</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写药品剂型." type="checkbox" name="drug_dosage_forms" id="drug_dosage_forms" value="2" aria-required="true">&nbsp;散装药</label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写药品剂型." type="checkbox" name="drug_dosage_forms" id="drug_dosage_forms" value="3" aria-required="true">&nbsp;板式组合药 </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写药品剂型." type="checkbox" name="drug_dosage_forms" id="drug_dosage_forms" value="4" aria-required="true">&nbsp;注射剂</label> <br />
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-1 healthy pddleft0" style="width:95px;">
                    <span class="mt10" style="width:94px;">&nbsp;&nbsp;&nbsp;&nbsp;漏服药次数</span>
                </div>
                <div class="col-sm-3 healthy pddright0" style="width:229px;">
                    <input type="text" data-rule-required="true" data-msg-required="请填写漏服药次数." class="form-control" name="missed_medication" id="missed_medication" placeholder="请输入漏服药次数" />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt10">&nbsp;次</span>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="control-label col-sm-2">药物不良反应</label>
                <div class="col-sm-6">
                    <label class="label_color">
                        <input name="adverse_drug" type="radio" value="1"> 无
                    </label>
                    <label class="label_color">
                        <input name="adverse_drug" type="radio" value="2"> 有
                    </label>
                    <label class="label_color">
                        <input class="form-control" placeholder="请输入有哪些药物不良反应" name="adverse_drug_content" type="text" disabled="disabled">
                    </label>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="control-label col-sm-2">并发症或合并症</label>
                <div class="col-sm-6">
                    <label class="label_color">
                        <input name="complication" type="radio" value="1"> 无
                    </label>
                    <label class="label_color">
                        <input name="complication" type="radio" value="2"> 有
                    </label>
                    <label class="label_color">
                        <input class="form-control" placeholder="请输入并发症或合并症情况" name="complication_content" type="text" disabled="disabled">
                    </label>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">转诊建议</label>
                <div class="col-sm-4 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写转诊科别." class="form-control" name="organization_department" id="organization_department" placeholder="请输入转诊科别 " />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt10"></span>
                </div>
                <div class="col-sm-4 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写转诊原因." class="form-control" name="referral_reasons" id="referral_reasons" placeholder="请输入转诊原因" />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt10"></span>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-4 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写2周内随访，随访结果." class="form-control mt10" name="follow_up_results" id="follow_up_results" placeholder="请输入2周内随访，随访结果" />
                </div>
                <div class="clear"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">处理意见</label>
                <div class="col-sm-10">
                    <label><input type="text" data-rule-required="true" data-msg-required="请填写处理意见." class="form-control" name="handle_opinions" id="handle-opinions" placeholder="请输入处理意见" ></label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">下次随访日期</label>
                <div class="col-sm-4">
                    <div class="input-group date">
                        <input data-rule-required="true" data-msg-required="请填写下次随访日期." type="text" class="form-control" name="next_visit_date" id="next_visit_date" placeholder="请输入下次随访日期" readonly="true" aria-required="true" /></label>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">随访医生签名</label>
                <div class="col-sm-10">
                    <label><input type="text" data-rule-required="true" data-msg-required="请填写随访医生签名." class="form-control" id="follow_doctor" name="follow_doctor" placeholder="请输入随访医生签名" ></label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">停止治疗时间 </label>
                <div class="col-sm-4">
                    <div class="input-group date">
                        <input data-rule-required="true" data-msg-required="请填写出现停止治疗时间." type="text" class="form-control" name="stop_treatment_time" id="stop_treatment_time" placeholder="请输入出现停止治疗时间" readonly="true" aria-required="true" /></label>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">停止治疗原因</label>
                <div class="col-sm-10">
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写停止治疗原因." type="radio" name="stop_treatment" id="stop_treatment" value="1" aria-required="true">&nbsp;完成治疗</label>
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写停止治疗原因." type="radio" name="stop_treatment" id="stop_treatment" value="2" aria-required="true">&nbsp;死亡</label>
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写停止治疗原因." type="radio" name="stop_treatment" id="stop_treatment" value="3" aria-required="true">&nbsp;丢失</label>
                    <label class="label_color"><input data-rule-required="true" data-msg-required="请填写停止治疗原因." type="radio" name="stop_treatment" id="stop_treatment" value="4" aria-required="true">&nbsp;转入耐多药治疗</label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">全程管理情况</label>
                <div class="col-sm-4 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写应访视患者次数." class="form-control" name="prospective_patient" id="prospective_patient" placeholder="请输入应访视患者次数（支） " />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt10">&nbsp;次</span>
                </div>
                <div class="col-sm-4 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写实际访视次数." class="form-control" name="actual_number" id="actual_number" placeholder="请输入实际访视次数" />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt10">&nbsp;次</span>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-4 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写患者应服药次数." class="form-control mt10" name="number_medications" id="number_medications" placeholder="请输入患者应服药次数" />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt20">&nbsp;次</span>
                </div>
                <div class="col-sm-4 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写实际服药次数." class="form-control mt10" name="actual_medication" id="actual_medication" placeholder="请输入实际服药次数 " />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt20">&nbsp;次</span>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-4 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请输入服药率." class="form-control mt10" name="medication_rate" id="medication_rate" placeholder="请输入服药率  " />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt20">&nbsp;%</span>
                </div>
                <div class="col-sm-4 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写评估医生签名." class="form-control mt10" name="physician_signature" id="physician_signature" placeholder="请输入评估医生签名 " />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt20"></span>
                </div>
                <div class="col-sm-2"></div>
                <div class="clear"></div>
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
//                real_name: 'required',
//                follow_up_date: 'required',
//                visit_mode: 'required',
//                smoke: 'required',
//                drink_wine: 'required',
//                chemotherapy_regimen: 'required',
//                missed_medication: 'required',
//                complication: 'required',  
//                organization_department: 'required',
//                referral_reasons: 'required',
//                follow_up_results: 'required',
//                handle_opinions: 'required',
//                next_visit_date: 'required', 
//                follow_doctor: 'required',
//                stop_treatment_time: 'required',
//                prospective_patient: 'required',  
//                actual_number: 'required', 
//                number_medications: 'required',  
//                actual_medication: 'required',  
//                medication_rate: 'required', 
//                physician_signature: 'required', 
                },
                submitHandler: function (form) {
                    var oInp = document.getElementsByName('drug_dosage_forms');
                    var drug = [];
                    for(var i=0;i<oInp.length;i++){
                        if (oInp[i].checked){
                            drug.push(oInp[i].value);
                        }
                    }
                    var postData = {
                        'real_name': $("input[name=real_name]").val(),         
                        'visited_at': $("input[name=follow_up_date]").val(),
                        'treatment_monthly':$("input[name=treatment-order]").val(),
                        'supervise_staff': $("input[name=supervise_staff]:checked").val(),
                        'visit_mode': $("input[name=visit_mode]:checked").val(),
                        'symptom': $("input[name=symptom]:checked").map(function (index, element) {
                            return this.value == 12 ? {
                                'value': this.value,
                                'content': $("input[name=symptom_content]").val()
                            } : {'value': this.value,'content':null};
                        }).get(),
                        'lift_style':{
                            'smoke': $("input[name=smoke]").val(),
                            'drink_wine': $("input[name=drink_wine]").val()
                        },
                        'medication':{
                            'chemotherapy_regimen': $("input[name=chemotherapy_regimen]").val(),
                            'usage': $("input[name=usage]").val(),
                            'drug_dosage_forms': drug,
                            'missed_medication': $("input[name=missed_medication]").val()
                        },
                        'drug_response':{
                            'value':$("input[name=adverse_drug]:checked").val(),
                            'content':$("input[name=adverse_drug_content]").val()
                        },
                        'complication':{
                            'value':$("input[name=complication]:checked").val(),
                            'content':$("input[name=complication_content]").val()
                        },
                        'referral':{
                            'organization_department': $("input[name=organization_department]").val(),
                            'referral_reasons': $("input[name=referral_reasons]").val(),
                            'follow_up_results': $("input[name=follow_up_results]").val()
                        },
                        'opinions': $("input[name=handle_opinions]").val(),
                        'next_visited_at': $("input[name=next_visit_date]").val(),
                        'visit_doctor_signature': $("input[name=follow_doctor]").val(),
                        'stop_treatment':{
                            'time':$("input[name=stop_treatment_time]").val(),
                            'reason':$("input[name=stop_treatment]").val()
                        },
                        'full_management':{
                            'prospective_patient':$("input[name=prospective_patient]").val(),
                            'actual_number':$("input[name=actual_number]").val(),
                            'number_medications':$("input[name=number_medications]").val(),
                            'actual_medication': $("input[name=actual_medication]").val(),
                            'medication_rate': $("input[name=medication_rate]").val(),
                            'physician_signature': $("input[name=physician_signature]").val()
                        },
                    };

                    $.post("{{ URL::action('Tenant\VisitTuberculosisPatientController@store','archive_id='.$input['archive_id']) }}", postData, function(data){
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
                if ($(this).val() == 12) {
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