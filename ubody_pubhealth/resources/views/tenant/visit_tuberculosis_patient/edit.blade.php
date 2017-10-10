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
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-4">
                    <input data-rule-required="true" data-msg-required="请填写姓名." id="" class="form-control" placeholder="请输入姓名" name="real_name" value="{{ $data['real_name'] }}" type="text" aria-required="true">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">随访日期</label>
                <div class="col-sm-4">
                    <div class="input-group date">
                        <input data-rule-required="true" data-msg-required="请填写随访日期." id="follow_up_date" class="form-control" placeholder="请输入随访日期" readonly="true" name="follow_up_date" value="{{ $data['visited_at'] }}" type="text" aria-required="true">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">治疗月序</label>
                <div class="col-sm-4">
                    <input data-rule-required="true" data-msg-required="请填写治疗月序." type="text" class="form-control" name="treatment_order" value="{{ $data['treatment_monthly'] }}" id="treatment-order" placeholder="请输入治疗月序(第几月)">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">督导人员</label>
                <div class="col-sm-10">
                    <label class="label_color">
                        {!! Form::radio('supervise_staff', 1, ($data['supervise_staff'] == 1), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写督导人员.', 'id'=>'supervise_staff', 'aria-required'=>'true']) !!}&nbsp;医生
                    </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">
                        {!! Form::radio('supervise_staff', 2, ($data['supervise_staff'] == 2), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写督导人员.', 'id'=>'supervise_staff', 'aria-required'=>'true']) !!}&nbsp;家属
                    </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">
                        {!! Form::radio('supervise_staff', 3, ($data['supervise_staff'] == 3), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写督导人员.', 'id'=>'supervise_staff', 'aria-required'=>'true']) !!}&nbsp;自服药
                    </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">
                        {!! Form::radio('supervise_staff', 4, ($data['supervise_staff'] == 4), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写督导人员.', 'id'=>'supervise_staff', 'aria-required'=>'true']) !!}&nbsp;其他
                     </label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">随访方式</label>
                <div class="col-sm-10 healthy">
                    <label class="label_color">
                        {!! Form::radio('visit_mode', 1, ($data['visit_mode'] == 1), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写随访方式.', 'aria-required'=>'true']) !!}&nbsp;门诊
                    </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">
                        {!! Form::radio('visit_mode', 2, ($data['visit_mode'] == 2), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写随访方式.', 'aria-required'=>'true']) !!}&nbsp;家庭
                    </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">
                        {!! Form::radio('visit_mode', 3, ($data['visit_mode'] == 3), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写随访方式.', 'aria-required'=>'true']) !!}&nbsp;电话
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">症状及体征</label>
                <div class="col-sm-10">
                    <label class="label_color">
                        {!! Form::checkbox('symptom', 1, array_has($data['symptom'],1), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写症状及体征.', 'aria-required'=>'true']) !!}&nbsp;没有症状
                    </label>
                    <label class="label_color">
                        {!! Form::checkbox('symptom', 2, array_has($data['symptom'],2), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写症状及体征.', 'aria-required'=>'true']) !!}&nbsp;咳嗽咳痰
                    </label>
                    <label class="label_color">
                        {!! Form::checkbox('symptom', 3, array_has($data['symptom'],3), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写症状及体征.', 'aria-required'=>'true']) !!}&nbsp;低热盗汗
                    </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">
                        {!! Form::checkbox('symptom', 4, array_has($data['symptom'],4), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写症状及体征.', 'aria-required'=>'true']) !!}&nbsp;咯血或血痰
                    </label>
                    <label class="label_color">
                        {!! Form::checkbox('symptom', 5, array_has($data['symptom'],5), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写症状及体征.', 'aria-required'=>'true']) !!}&nbsp;胸痛消瘦
                    </label>
                    <label class="label_color">
                        {!! Form::checkbox('symptom', 6, array_has($data['symptom'],6), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写症状及体征.', 'aria-required'=>'true']) !!}&nbsp;恶心纳差
                    </label>
                    <label class="label_color">
                        {!! Form::checkbox('symptom', 7, array_has($data['symptom'],7), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写症状及体征.', 'aria-required'=>'true']) !!}&nbsp;关节疼痛
                    </label>
                    <label class="label_color">
                        {!! Form::checkbox('symptom', 8, array_has($data['symptom'],8), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写症状及体征.', 'aria-required'=>'true']) !!}&nbsp;头痛失眠
                    </label>
                    <label class="label_color">
                        {!! Form::checkbox('symptom', 9, array_has($data['symptom'],9), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写症状及体征.', 'aria-required'=>'true']) !!}&nbsp;视物模糊
                    </label>
                    <label class="label_color">
                        {!! Form::checkbox('symptom', 10, array_has($data['symptom'],10), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写症状及体征.', 'aria-required'=>'true']) !!}&nbsp;皮肤瘙痒、皮疹
                    </label>
                    <label class="label_color">
                        {!! Form::checkbox('symptom', 11, array_has($data['symptom'],11), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写症状及体征.', 'aria-required'=>'true']) !!}&nbsp;耳鸣、听力下降
                    </label>
                    <label class="label_color">
                        {!! Form::checkbox('symptom', 12, array_has($data['symptom'],12), ['data-rule-required'=>'true', 'data-msg-required'=>'请填写症状及体征.', 'aria-required'=>'true']) !!}&nbsp;其他
                    </label>
                    <label>
                        @if(array_has($data['symptom'],12))
                            {!! Form::text('symptom_content',$data['symptom'][12], ['class'=>'form-control','placeholder'=>'请输入其他情况', 'style'=>'width:229px']) !!}
                        @else
                            {!! Form::text('symptom_content',null, ['class'=>'form-control','placeholder'=>'请输入其他情况', 'disabled'=>'disabled','style'=>'width:229px']) !!}
                        @endif
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">生活方式指导</label>
                <div class="col-sm-1 healthy pddleft0" style="width:62px;">
                    <span class="mt10" style="width:62px;">&nbsp;吸烟量</span>
                </div>
                <div class="col-sm-2 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写吸烟量." class="form-control" name="smoke" value="{{ $data['lift_style']['smoke'] }}" id="smoke" placeholder="输入每日吸烟量 " />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt10">&nbsp;支/天</span>
                </div>
                <div class="col-sm-1 healthy pddleft0" style="width:62px;">
                    <span class="mt10" style="width:62px;">&nbsp;饮酒量</span>
                </div>
                <div class="col-sm-2 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写饮酒量." class="form-control" name="drink_wine" value="{{ $data['lift_style']['drink_wine'] }}" id="drink_wine" placeholder="输入每日饮酒量" />
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
                        <input type="text" data-rule-required="true" data-msg-required="请填写化疗方案." class="form-control" name="chemotherapy_regimen" value="{{ $data['medication']['chemotherapy_regimen'] }}" id="chemotherapy-regimen" placeholder="请输入化疗方案" />
                    </label><br />
                    <span>用法</span>
                    <label class="label_color">
                        {!! Form::radio('usage', 1, ($data['medication']['usage'] == 1), ['id'=>'usage','data-rule-required'=>'true','data-msg-required'=>'请填写用法.', 'aria-required'=>'true']) !!}&nbsp;每日
                    </label>
                    <label class="label_color">
                        {!! Form::radio('usage', 2, ($data['medication']['usage'] == 2), ['id'=>'usage','data-rule-required'=>'true','data-msg-required'=>'请填写用法.', 'aria-required'=>'true']) !!}&nbsp;间歇
                    </label><br />
                    <span>药品剂型</span>
                    <label class="label_color">
                        {!! Form::checkbox('drug_dosage_forms',1,in_array(1,$data['medication']['drug_dosage_forms']),['data-rule-required'=>'true','data-msg-required'=>'请填写药品剂型.','id'=>'drug_dosage_forms','aria-required'=>'true']) !!}&nbsp;固定剂量复合制剂
                    </label>&nbsp;&nbsp;&nbsp;
                    <label class="label_color">
                        {!! Form::checkbox('drug_dosage_forms',2,in_array(2,$data['medication']['drug_dosage_forms']),['data-rule-required'=>'true','data-msg-required'=>'请填写药品剂型.','id'=>'drug_dosage_forms','aria-required'=>'true']) !!}&nbsp;散装药
                    </label>
                    <label class="label_color">
                        {!! Form::checkbox('drug_dosage_forms',3,in_array(3,$data['medication']['drug_dosage_forms']),['data-rule-required'=>'true','data-msg-required'=>'请填写药品剂型.','id'=>'drug_dosage_forms','aria-required'=>'true']) !!}&nbsp;板式组合药
                    </label>
                    <label class="label_color">
                        {!! Form::checkbox('drug_dosage_forms',4,in_array(4,$data['medication']['drug_dosage_forms']),['data-rule-required'=>'true','data-msg-required'=>'请填写药品剂型.','id'=>'drug_dosage_forms','aria-required'=>'true']) !!}&nbsp;注射剂
                    </label>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-1 healthy pddleft0" style="width:95px;">
                    <span class="mt10" style="width:94px;">&nbsp;&nbsp;&nbsp;&nbsp;漏服药次数</span>
                </div>
                <div class="col-sm-3 healthy pddright0" style="width:229px;">
                    <input type="text" data-rule-required="true" data-msg-required="请填写漏服药次数." class="form-control" name="missed_medication" value="{{ $data['medication']['missed_medication'] }}" id="missed_medication" placeholder="请输入漏服药次数" />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt10">&nbsp;次</span>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="control-label col-sm-2">药物不良反应</label>
                <div class="col-sm-6">
                    <label class="label_color">
                        {!! Form::radio('adverse_drug',1,($data['drug_response']['value'] == 1)) !!} 无
                    </label>
                    <label class="label_color">
                        {!! Form::radio('adverse_drug',2,($data['drug_response']['value'] == 2)) !!} 有
                    </label>
                    <label class="label_color">
                        @if($data['drug_response']['value'] == 2)
                            {!! Form::text('adverse_drug_content', $data['drug_response']['content'], ['class'=>'form-control','placeholder'=>'请输入有哪些药物不良反应']) !!}
                        @else
                            {!! Form::text('adverse_drug_content', null, ['class'=>'form-control','placeholder'=>'请输入有哪些药物不良反应', 'disabled'=>'disabled']) !!}
                        @endif
                    </label>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="control-label col-sm-2">并发症或合并症</label>
                <div class="col-sm-6">
                    <label class="label_color">
                        {!! Form::radio('complication',1,($data['complication']['value'] == 1)) !!} 无
                    </label>
                    <label class="label_color">
                        {!! Form::radio('complication',2,($data['complication']['value'] == 2)) !!} 有
                    </label>
                    <label class="label_color">
                        @if($data['complication']['value'] == 2)
                            {!! Form::text('complication_content', $data['complication']['content'], ['class'=>'form-control','placeholder'=>'请输入并发症或合并症情况']) !!}
                        @else
                            {!! Form::text('complication_content', null, ['class'=>'form-control','placeholder'=>'请输入并发症或合并症情况','disabled'=>'disabled']) !!}
                        @endif
                    </label>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">转诊建议</label>
                <div class="col-sm-4 healthy pddright0">
                    {!! Form::text('organization_department',$data['referral']['organization_department'],
                                   ['data-rule-required'=>'true','data-msg-required'=>'请填写转诊科别.','class'=>'form-control','id'=>'organization_department','placeholder'=>'请输入转诊科别']) !!}
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt10"></span>
                </div>
                <div class="col-sm-4 healthy pddright0">
                    {!! Form::text('referral_reasons',$data['referral']['referral_reasons'],
                                    ['data-rule-required'=>'true','data-msg-required'=>'请填写转诊原因.','class'=>'form-control','id'=>'referral_reasons','placeholder'=>'请输入转诊原因']) !!}
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt10"></span>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-4 healthy pddright0">
                    {!! Form::text('follow_up_results',$data['referral']['follow_up_results'],
                                    ['data-rule-required'=>'true','data-msg-required'=>'请填写2周内随访，随访结果.','class'=>'form-control mt10','id'=>'follow_up_results','placeholder'=>'请输入2周内随访，随访结果']) !!}
                </div>
                <div class="clear"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">处理意见</label>
                <div class="col-sm-10">
                    <label>
                        {!! Form::text('handle_opinions', $data['opinions'], ['data-rule-required'=>'true','data-msg-required'=>'请填写处理意见.','class'=>'form-control','id'=>'handle-opinions', 'placeholder'=>'请输入处理意见']) !!}
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">下次随访日期</label>
                <div class="col-sm-4">
                    <div class="input-group date">
                        <input data-rule-required="true" data-msg-required="请填写下次随访日期." type="text" class="form-control" name="next_visit_date" value="{{ $data['next_visited_at'] }}" id="next_visit_date" placeholder="请输入下次随访日期" readonly="true" aria-required="true" /></label>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">随访医生签名</label>
                <div class="col-sm-10">
                    <label><input type="text" data-rule-required="true" data-msg-required="请填写随访医生签名." class="form-control" id="follow_doctor" name="follow_doctor" value="{{ $data['visit_doctor_signature'] }}" placeholder="请输入随访医生签名" ></label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">停止治疗时间 </label>
                <div class="col-sm-4">
                    <div class="input-group date">
                        <input data-rule-required="true" data-msg-required="请填写出现停止治疗时间." type="text" class="form-control" name="stop_treatment_time" value="{{ $data['stop_treatment']['time'] }}" id="stop_treatment_time" placeholder="请输入出现停止治疗时间" readonly="true" aria-required="true" /></label>
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
                    <label class="label_color">
                        {!! Form::radio('stop_treatment',1,($data['stop_treatment']['time'] == 1),['id'=>'stop_treatment']) !!}&nbsp;完成治疗
                    </label>
                    <label class="label_color">
                        {!! Form::radio('stop_treatment',2,($data['stop_treatment']['time'] == 2),['id'=>'stop_treatment']) !!}&nbsp;死亡
                    </label>
                    <label class="label_color">
                        {!! Form::radio('stop_treatment',3,($data['stop_treatment']['time'] == 3),['id'=>'stop_treatment']) !!}&nbsp;丢失
                    </label>
                    <label class="label_color">
                        {!! Form::radio('stop_treatment',4,($data['stop_treatment']['time'] == 4),['id'=>'stop_treatment']) !!}&nbsp;转入耐多药治疗
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">全程管理情况</label>
                <div class="col-sm-4 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写应访视患者次数." class="form-control" name="prospective_patient" value="{{ $data['full_management']['prospective_patient'] }}" id="prospective_patient" placeholder="请输入应访视患者次数（支） " />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt10">&nbsp;次</span>
                </div>
                <div class="col-sm-4 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写实际访视次数." class="form-control" name="actual_number" value="{{ $data['full_management']['actual_number'] }}" id="actual_number" placeholder="请输入实际访视次数" />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt10">&nbsp;次</span>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-4 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写患者应服药次数." class="form-control mt10" name="number_medications" value="{{ $data['full_management']['number_medications'] }}" id="number_medications" placeholder="请输入患者应服药次数" />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt20">&nbsp;次</span>
                </div>
                <div class="col-sm-4 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写实际服药次数." class="form-control mt10" name="actual_medication" value="{{ $data['full_management']['actual_medication'] }}" id="actual_medication" placeholder="请输入实际服药次数 " />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt20">&nbsp;次</span>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-4 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请输入服药率." class="form-control mt10" name="medication_rate" value="{{ $data['full_management']['medication_rate'] }}" id="medication_rate" placeholder="请输入服药率  " />
                </div>
                <div class="col-sm-1 healthy pddleft0">
                    <span class="mt20">&nbsp;%</span>
                </div>
                <div class="col-sm-4 healthy pddright0">
                    <input type="text" data-rule-required="true" data-msg-required="请填写评估医生签名." class="form-control mt10" name="physician_signature" value="{{ $data['full_management']['physician_signature'] }}" id="physician_signature" placeholder="请输入评估医生签名 " />
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
//                real_name: {
//                  length:12,

// }
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
                        '_method': $("input[name=_method]").val(),
                        '_token': $("input[name=_token]").val(),
                        'real_name': $("input[name=real_name]").val(),
                        'visited_at': $("input[name=follow_up_date]").val(),
                        'treatment_monthly':$("input[name=treatment_order]").val(),
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
                    $.post("{{ URL::action('Tenant\VisitTuberculosisPatientController@update',$data['visit_id']) }}", postData, function(data){
                        if(data.errorCode == 0){
                            window.location.href = "{{ URL::action('Tenant\ArchiveController@show',$data['archive_id']) }}"
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