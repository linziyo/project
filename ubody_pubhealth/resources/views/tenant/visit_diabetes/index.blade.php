@extends('tenant.layout')
@push('css')
<link rel="stylesheet" href="/css/table.css">
@endpush
@section('content_header')
    <h1>2型糖尿病患者随访服务记录表</h1>
@stop
@section('content')
    <div class="box box-primary" style="overflow: hidden;">
    	<form class="form-horizontal" id="formArchive" style="padding-bottom:60px;">
				<div class="form-group">
					<label for="title" class="col-sm-2 control-label">姓名</label>
					<div class="col-sm-4">
                       <input data-rule-required="true" data-msg-required="请填写姓名." id="" class="form-control" placeholder="请输入姓名" name="real_name" type="text" aria-required="true">					                     
                    </div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">随访日期</label>
					<div class="col-sm-4">
                        <div class="input-group date">
                            <input data-rule-required="true" data-msg-required="请填写随访日期." id="follow-up-date" class="form-control" placeholder="请输入随访日期" readonly="true" name="follow-up-date" type="text" aria-required="true">
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
							<input data-rule-required="true" data-msg-required="请填写随访方式." type="radio" name="follow-up-method" value="1" aria-required="true">&nbsp;门诊
					    </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color">
							<input data-rule-required="true" data-msg-required="请填写随访方式." type="radio" name="follow-up-method" value="2" aria-required="true">&nbsp;家庭 
						</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color">
							<input data-rule-required="true" data-msg-required="请填写随访方式." type="radio" name="follow-up-method" value="3" aria-required="true">&nbsp;电话
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">症状</label>
					<div class="col-sm-10 healthy">
						<label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状." type="checkbox" name="symptom" value="1" aria-required="true">&nbsp;无症状  </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状." type="checkbox" name="symptom" value="2" aria-required="true">&nbsp;多饮 </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状." type="checkbox" name="symptom" value="3" aria-required="true">&nbsp;多食</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状." type="checkbox" name="symptom" value="4" aria-required="true">&nbsp;多尿 </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状." type="checkbox" name="symptom" value="5" aria-required="true">&nbsp;视力模糊  </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状." type="checkbox" name="symptom" value="6" aria-required="true">&nbsp; 感染   </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状." type="checkbox" name="symptom" value="7" aria-required="true">&nbsp;手脚麻木   </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状." type="checkbox" name="symptom" value="8" aria-required="true">&nbsp;下肢浮肿 </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状." type="checkbox" name="symptom" value="9" aria-required="true">&nbsp;体重明显下降 </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input data-rule-required="true" data-msg-required="请填写症状." type="checkbox" name="symptom" value="10" aria-required="true">&nbsp;其他</label>
						<label>
                           	<input type="text" class="form-control" name="symptom_content" id="" placeholder="请输入其他情况" disabled="disabled" style="width:229px;height:34px;">
                        </label>
					</div>
				</div>				
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">体征</label>
					<div class="col-sm-4 healthy pddright0">
						<input type="text" class="form-control" data-rule-required="true" data-msg-required="请填写舒张压/收缩压." name="blood-pressureSystolic" id="blood-pressureSystolic" placeholder="请输入血 压（mmHg）" />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10">&nbsp;mmHg</span>
					</div>
					<div class="col-sm-4 healthy pddright0">
						<input type="text" class="form-control" data-rule-required="true" data-msg-required="请填写体重." type="text" name="weight" id="weight" placeholder="请输入体 重（kg)" />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10">&nbsp;kg</span>
					</div>
					<div class="col-sm-2"></div>
					<div class="col-sm-4 healthy pddright0">
						<input type="text" class="form-control mt10" data-rule-required="true" data-msg-required="请填写体质指数." name="BMI" id="BMI" placeholder="请输入体质指数 （BMI)kg/m2）" />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt15">&nbsp;kg/m2</span>
					</div>
					<div class="col-sm-2"></div>
					<div class="col-sm-4 healthy pddright0">
						<input type="text" class="form-control mt10" data-rule-required="true" data-msg-required="请填写其他体征." name="other" id="other" placeholder="请输入其他体征" />
					</div>
					<div class="col-sm-2"></div>
					<div class="col-sm-10 healthy pddright0">
						<label style="margin-top: 10px;">
                           <span style="font-weight: initial;">足背动脉搏动&nbsp;&nbsp;</span>
                           <label>
                           	<input data-rule-required="true" data-msg-required="请填写足背动脉搏动情况." type="radio" name="dorsalis-pedis" id="dorsalis-pedis" value="1" placeholder="请输入原因">&nbsp;触及正常 
                           </label>
                           <label>
                           	<input data-rule-required="true" data-msg-required="请填写足背动脉搏动情况." type="radio" name="dorsalis-pedis" id="dorsalis-pedis" value="2" placeholder="请输入原因">减弱（双侧 左侧 右侧）
                           </label>
                           <label>
                           	<input data-rule-required="true" data-msg-required="请填写足背动脉搏动情况." type="radio" name="dorsalis-pedis" id="dorsalis-pedis" value="3" placeholder="请输入原因">消失（双侧 左侧 右侧）
                           </label>
						</label>
					</div>
				</div>				
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">生活方式指导</label>
					<div class="col-sm-4 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填写吸烟量." class="form-control" name="smoke" id="smoke" placeholder="请输入日吸烟量（支） " />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10">&nbsp;支/天</span>
					</div>
					<div class="col-sm-4 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填写饮酒量（两）." class="form-control" name="drink-wine" id="drink-wine" placeholder="请输入日饮酒量（两）" />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10">&nbsp;两/天</span>
					</div>
					<div class="col-sm-2"></div>
					<div class="col-sm-4 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填写运动次数/周." class="form-control mt10" name="sports-week" id="sports-week" placeholder="请输入运动次/周" />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt20">&nbsp;次/周</span>
					</div>
					<div class="col-sm-2"></div>
					<div class="col-sm-4 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填写运动分钟/次." class="form-control mt10" name="sports-minute" id="sports-minute" placeholder="请输入运动分钟/次  " />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt20">&nbsp;分钟/次</span>
					</div>
					<div class="col-sm-2"></div>
					<div class="col-sm-4 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填写主食克/天." class="form-control mt10" name="staple-food" id="staple-food" placeholder="请输入主食克/天  " />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt20">&nbsp;克/天</span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">生活方式指导/心理调整</label>
					<div class="col-sm-10 healthy">
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写心理调整." name="psychology" id="psychology" value="1" aria-required="true">&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写心理调整." name="psychology" id="psychology" value="2" aria-required="true">&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写心理调整." name="psychology" id="psychology" value="3" aria-required="true">&nbsp;差</label>&nbsp;&nbsp;&nbsp;
					</div>
					<div class="clear"></div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">生活方式指导/遵医行为</label>
					<div class="col-sm-10 healthy">
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写遵医行为." name="compliance" id="compliance" value="1" aria-required="true">&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写遵医行为." name="compliance" id="compliance" value="2" aria-required="true">&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写遵医行为." name="compliance" id="compliance" value="3" aria-required="true">&nbsp;差</label>&nbsp;&nbsp;&nbsp;
					</div>
					<div class="clear"></div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">辅助检查*/空腹血糖值</label>
					<div class="col-sm-3 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填写空腹血糖值." class="form-control" name="blood-glucose" id="blood-glucose" placeholder="请输入空腹血糖值 " />
					</div>
					<div class="col-sm-2 healthy pddleft0">
						<span class="mt10">&nbsp;mmol/L</span>
					</div>					
					<div class="clear"></div>
				</div>							
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">辅助检查*/其他检查</label>
					<div class="col-sm-3 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请输入糖化血红蛋白." class="form-control" name="glycosylated-hemoglobin" id="glycosylated-hemoglobin" placeholder="请输入糖化血红蛋白 " />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10">&nbsp;％</span>
					</div>
					<div class="col-sm-3 healthy pddright0">
						<div class="input-group date">
                            <input data-rule-required="true" data-msg-required="请填写检查日期." id="date-inspection" class="form-control" placeholder="请输入检查日期" readonly="true" name="date-inspection" type="text" aria-required="true">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
					</div>										
					<div class="clear"></div>
				</div>				
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">服药依从性</label>
					<div class="col-sm-10 healthy">
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写服药依从性." name="medication-compliance" value="1" aria-required="true">&nbsp;规律</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写服药依从性." name="medication-compliance" value="2" aria-required="true">&nbsp;间断</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写服药依从性." name="medication-compliance" value="3" aria-required="true">&nbsp;不服药</label>&nbsp;&nbsp;&nbsp;
					</div>
					<div class="clear"></div>
				</div>				
				<div class="form-group">
                <label for="exampleInputName2" class="control-label col-sm-2">药物不良反应</label>
                <div class="col-sm-6">
                    <label class="label_color">
                        <input name="adverse_drug" type="checkbox" value="1"> 无
                    </label>
                    <label class="label_color">
                        <input name="adverse_drug" type="checkbox" value="2"> 有
                    </label>
                    <label class="label_color">
                        <input class="form-control" placeholder="请输入有哪些药物不良反应" name="adverse_drug_content" type="text" disabled="disabled">
                    </label>
                 </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
                </div>             
                <div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">低血糖反应</label>
					<div class="col-sm-10 healthy">
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写低血糖反应." name="hypoglycemia-reaction" value="1" aria-required="true">&nbsp;无</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写低血糖反应." name="hypoglycemia-reaction" value="2" aria-required="true">&nbsp;偶尔</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写低血糖反应." name="hypoglycemia-reaction" value="3" aria-required="true">&nbsp;频繁</label>&nbsp;&nbsp;&nbsp;
					</div>
					<div class="clear"></div>
				</div>	
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">此次随访分类</label>
					<div class="col-sm-10 healthy">
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请输入随访分类." name="follow-classification" value="1" aria-required="true">&nbsp;控制满意</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请输入随访分类." name="follow-classification" value="2" aria-required="true">&nbsp; 控制不满意</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请输入随访分类." name="follow-classification" value="3" aria-required="true">&nbsp;不良反应</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请输入随访分类." name="follow-classification" value="4" aria-required="true">&nbsp;并发症 </label>
					</div>
					<div class="clear"></div>
				</div>								
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">用 药 情 况</label>
					<div id="operationWrapper" class="col-md-10">
						<div class="row">
					<div class="col-sm-3">
						<input type="text" class="form-control" id="" placeholder="请输入药物名称 " />
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control text_long ml15" id="" placeholder="请输入用法用量每日多少次 " />
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="" placeholder="请输入用法用量每日多少" />
					</div>
					<div class="clear"></div>				
                    <div class="col-sm-1" style="padding-right: 0;">
                        <button type="button" class="btn btn-default btn-flat btn-block append"
                            data-source="#tplOperation" data-target="#operationWrapper"> 添加
                        </button>
                    </div>
                    </div>
                    </div>
                        <div class="clear"></div>
					</div>
							
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">转诊</label>
					<div class="col-sm-1 healthy pddleft0" style="width:80px;">
						<span class="" style="width:80px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;转诊原因</span>
					</div>
					<div class="col-sm-3 healthy pddright0">
                           	<input type="text" class="form-control" data-rule-required="true" data-msg-required="请填写转诊原因." name="referral-reasons" id="referral-reasons" placeholder="请输入转诊原因">
					</div>	
					<div class="col-sm-1 healthy pddleft0" style="width:115px;">
						<span class="" style="width:115px;">&nbsp;&nbsp;&nbsp;&nbsp;转诊机构及科别</span>
					</div>			
					<div class="col-sm-3 healthy pddright0">
                           	<input type="text" class="form-control" data-rule-required="true" data-msg-required="请填写转诊机构及科别." name="organization-department" id="organization-department" placeholder="请输入转诊机构及科别">
					</div>									
					<div class="clear"></div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">下次随访日期</label>
					<div class="col-sm-4">
                        <div class="input-group date">
                            <input data-rule-required="true" data-msg-required="请填写下次随访日期." id="next-follow-up-date" class="form-control" placeholder="请输入随访日期" readonly="true" name="next-follow-up-date" type="text" aria-required="true">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">随访医生签名</label>
					<div class="col-sm-10">
						<label><input type="text" data-rule-required="true" data-msg-required="请填写随访医生签名." class="form-control" id="follow-doctor" name="follow-doctor" placeholder="请输入随访医生签名" ></label>
					</div>
				</div>
				<div class="box-footer">
                <div class="form-actions col-sm-10 col-sm-offset-2">
                    <input type="submit" value="提交" class="btn btn-primary">
                    <a href="http://1.publichealth.ubody.local.net:8080/tenant/archives" class="btn btn-default">返回</a>
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
//                community_id: 'required',
//                real_name: 'required',
//                id_code: 'required',
//                birthday: 'required',
//                follow-up-date: 'required',
//                follow-up-method: 'required',
//                blood-pressureSystolic: 'required',
//                weight: 'required',
//                BMI: 'required',
//                other: 'required',
//                smoke: 'required',
//                drink-wine: 'required',
//                sports-week: 'required',
//                sports-minute: 'required',
//                staple-food: 'required',
//                date-inspection: 'required',
//                blood-glucose: 'required',
//                glycosylated-hemoglobin: 'required',
//                doctor-remarks: 'required',
//                doctor-remarks: 'required',
//                adverse_drug: 'required',
//                hereditary_disease: 'required',
//                referral-reasons: 'required',
//                organization-department: 'required',
//                next-follow-up-date: 'required',
//                follow-doctor: 'required',
//                hypoglycemia-reaction: 'required',

//                sex: 'required',
//                mobile: 'required',
//                work_unit: 'required',
//                contact_name: 'required',
//                contact_mobile: 'required',
//                emergency_contact_name: 'required',
//                emergency_contact_mobile: 'required',
//                phone_number: 'required',
//                address: 'required',
//                nation: 'required',
//                education: 'required',
//                job: 'required',
//                blood_group: 'required',
//                blood_group_rh: 'required',
//                marital_status: 'required',
//                description: 'required',
//                payment_mode: 'required',
//                allergy: 'required',
//                expose: 'required',
//                family_relationship: 'required',
//                family_value: 'required',
//                hereditary_disease: 'required',
//                disability: 'required',
//                living_kitchen: 'required',
//                living_fuel: 'required',
//                living_water: 'required',
//                living_toilet: 'required',
//                living_fence: 'required'
            },
            submitHandler: function (form) {
                var postData = {
                    'community_id': $("select[name=community_id]").val(),
                    'real_name': $("input[name=real_name]").val(),
                    'is_register': ($("input[name=is_register]").prop('checked'))?1:0,
                    'id_code': $("input[name=id_code]").val(),
                    'birthday': $("input[name=birthday]").val(),
                    'follow-up-date': $("input[name=follow-up-date]").val(),
                    'symptom': $("input[name=symptom]").val(),
                    'blood-pressureSystolic': $("input[name=blood-pressureSystolic]").val(),
                    'weight': $("input[name=weight]").val(),
                    'BMI': $("input[name=BMI]").val(),
                    'other': $("input[name=other]").val(),
                    'smoke': $("input[name=smoke]").val(),
                    'drink-wine': $("input[name=drink-wine]").val(),
                    'sports-week': $("input[name=sports-week]").val(),
                    'sports-minute': $("input[name=sports-minute]").val(),
                    'staple-food': $("input[name=staple-food]").val(),
                    'dorsalis-pedis': $("input[name=dorsalis-pedis]").val(),
                    'date-inspection': $("input[name=date-inspection]").val(),
                    'psychology': $("input[name=psychology]").val(),
                    'compliance': $("input[name=compliance]").val(),
                    'blood-glucose': $("input[name=blood-glucose]").val(),
                    'glycosylated-hemoglobin': $("input[name=glycosylated-hemoglobin]").val(),
                    'doctor-remarks': $("input[name=doctor-remarks]").val(),
                    'medication-compliance': $("input[name=medication-compliance]").val(),
                    'adverse_drug': $("input[name=adverse-drug]").val(),
                    'follow-classification': $("input[name=follow-classification]").val(),
                    'referral-reasons': $("input[name=referral-reasons]").val(),
                    'organization-department': $("input[name=organization-department]").val(),
                    'next-follow-up-date': $("input[name=next-follow-up-date]").val(),
                    'follow-doctor': $("input[name=follow-doctor]").val(),
                    'hypoglycemia-reaction': $("input[name=hypoglycemia-reaction]").val(),
                    
                    'sex': $("input[name=sex]:checked").val(),
                    'mobile': $("input[name=mobile]").val(),
                    'work_unit': $("input[name=work_unit]").val(),
                    'contact_name': $("input[name=contact_name]").val(),
                    'contact_mobile': $("input[name=contact_mobile]").val(),
                    'emergency_contact_name': $("input[name=emergency_contact_name]").val(),
                    'emergency_contact_mobile': $("input[name=emergency_contact_mobile]").val(),
                    'phone_number': $("input[name=phone_number]").val(),
                    'address': $("input[name=address]").val(),
                    'nation': $("select[name=nation]").val(),
                    'education': $("select[name=education]").val(),
                    'job': $("select[name=job]").val(),
                    'blood_group': $("select[name=blood_group]").val(),
                    'blood_group_rh': $("select[name=blood_group_rh]").val(),
                    'description': $("#description").val(),
                    'marital_status': $("select[name=marital_status]").val(),
                    'paymentModes': $("input[name=payment_mode]:checked").map(function (index, element) {
                                    return this.value == 8 ? {
                                        'value': this.value,
                                        'content': $("input[name=payment_mode_content]").val()
                                    } : {'value': this.value};
                                }).get(),
                    'symptom': $("input[name=symptom]:checked").map(function (index, element) {
                                    return this.value == 10 ? {
                                        'value': this.value,
                                        'content': $("input[name=symptom_content]").val()
                                    } : {'value': this.value};
                                }).get(),
                    'allergies': $("input[name=allergy]:checked").map(function (index, element) {
                                    return this.value == 5 ? {
                                        'value': this.value,
                                        'content': $("input[name=allergy_content]").val()
                                    } : {'value': this.value};
                                }).get(),
                    'exposes': $("input[name=expose]:checked").map(function (index, element) {
                                    return {'value': this.value};
                                }).get(),
                    'diseases': $("#diseaseWrapper").find('.row').map(function (index, element) {
                                    return {
                                        'value': $(this).find("select[name=disease_value]").val(),
                                        'content': $(this).find("input[name=disease_content]").val(),
                                        'confirm_at': $(this).find("input[name=disease_confirmed_at]").val()
                                    };
                                }).get(),
                    'injuries': $("#injuryWrapper").find('.row').map(function (index, element) {
                                    return {
                                        'value': $(this).find("select[name=injury_value]").val(),
                                        'content': $(this).find("input[name=injury_content]").val(),
                                        'confirm_at': $(this).find("input[name=injury_confirmed_at]").val()
                                    };
                                }).get(),
                    'operations': $("#operationWrapper").find('.row').map(function (index, element) {
                                        return {
                                            'value': $(this).find("select[name=operation_value]").val(),
                                            'content': $(this).find("input[name=operation_content]").val(),
                                            'confirm_at': $(this).find("input[name=operation_confirmed_at]").val()
                                        };
                                    }).get(),
                    'transfusions': $("#transfusionWrapper").find('.row').map(function (index, element) {
                                        return {
                                            'value': $(this).find("select[name=transfusion_value]").val(),
                                            'content': $(this).find("input[name=transfusion_content]").val(),
                                            'confirm_at': $(this).find("input[name=transfusion_confirmed_at]").val()
                                        };
                                    }).get(),
                    'families': $("#familyWrapper").find('.row').map(function (index, element) {
                                    return {
                                        'relationship': $(this).find("select[name=family_relationship]").val(),
                                        'value': $(this).find("select[name=family_value]").val(),
                                        'content': $(this).find("input[name=family_content]").val()
                                    };
                                }).get(),
                    'disabilities': $("input[name=disability]:checked").map(function (index, element) {
                                        return {'value': this.value};
                                    }).get(),
                    'hereditaryDiseases': $("input[name=hereditary_disease]:checked").map(function (index, element) {
                                        return this.value == 2 ? {
                                            'value': this.value,
                                            'content': $("input[name=hereditary_disease_content]").val()
                                        } : {'value': this.value};
                                    }).get(),
                    'adverseDrug': $("input[name=adverse_drug]:checked").map(function (index, element) {
                                        return this.value == 2 ? {
                                            'value': this.value,
                                            'content': $("input[name=adverse_drug_content]").val()
                                        } : {'value': this.value};
                                    }).get(),
                    'livingKitchen': [{'value': $("select[name='living_kitchen']").val()}],
                    'livingFuel': [{'value': $("select[name='living_fuel']").val()}],
                    'livingWater': [{'value': $("select[name='living_water']").val()}],
                    'livingToilet': [{'value': $("select[name='living_toilet']").val()}],
                    'livingFence': [{'value': $("select[name='living_fence']").val()}]
                };

                $.post("{{ URL::action('Tenant\ArchiveController@store') }}", postData, function(data){
                    if(data.errorCode == 0){
                        window.location.href = "{{ URL::action('Tenant\ArchiveController@index') }}"
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
                $("input[name=birthday]").val($(this).val().substr(6, 4) + '-' + $(this).val().substr(10, 2) + "-" + $(this).val().substr(12, 2));
                if ($(this).val().substr(16, 1) / 2 == 0) {
                    $("input[name=sex][value='2']").prop('checked', true);
                } else {
                    $("input[name=sex][value='1']").prop('checked', true);
                }
            } else if ($(this).val().length == 15) {
                $("input[name=birthday]").val('19' + $(this).val().substr(6, 2) + '-' + $(this).val().substr(8, 2) + "-" + $(this).val().substr(8, 2));
                if ($(this).val().substr(14, 1) / 2 == 0) {
                    $("input[name=sex][value='2']").prop('checked', true);
                } else {
                    $("input[name=sex][value='1']").prop('checked', true);
                }
            }
        });

        $("input[name=contact_name]").change(function () {
            $("input[name=emergency_contact_name]").val($(this).val());
        });

        $("input[name=contact_mobile]").change(function () {
            $("input[name=emergency_contact_mobile]").val($(this).val());
        });

        $("input[type=checkbox][name=payment_mode]:last").change(function () {
            if ($(this).is(':checked')) {
                $("input[name=payment_mode_content]").removeAttr('disabled');
            } else {
                $("input[name=payment_mode_content]").attr('disabled', 'disabled');
            }
        });

        $("input[name=allergy]").change(function () {
            if ($(this).val() == 1) {
                if ($(this).is(':checked')) {
                    $("input[name=allergy]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                    $("input[name=allergy_content]").attr('disabled', 'disabled').empty();
                } else {
                    $("input[type=checkbox][name=allergy]").not(":first").removeAttr('disabled');
                }
            }
            if ($(this).val() == 5) {
                if ($(this).is(':checked')) {
                    $("input[name=allergy_content]").removeAttr('disabled');
                } else {
                    $("input[name=allergy_content]").attr('disabled', 'disabled');
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
            if ($(this).val() == 10) {
                if ($(this).is(':checked')) {
                    $("input[name=symptom_content]").removeAttr('disabled');
                } else {
                    $("input[name=symptom_content]").attr('disabled', 'disabled');
                }
            }
        });
        $("input[type=checkbox][name=expose]").change(function () {
            if ($(this).val() == 1) {
                if ($(this).is(':checked')) {
                    $("input[name=expose]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                } else {
                    $("input[name=expose]").not(":first").removeAttr('disabled');
                }
            }
        });
        $(".append").click(function () {
            $($(this).attr('data-target')).append($($(this).attr('data-source')).html());
        });
        $("input[name=disability]").change(function () {
            if ($(this).val() == 1) {
                if ($(this).is(':checked')) {
                    $("input[name=disability]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                } else {
                    $("input[name=disability]").not(":first").removeAttr('disabled');
                }
            }
        });
        $("input[type=checkbox][name=hereditary_disease]").change(function () {
            if ($(this).val() == 2) {
                if ($(this).is(':checked')) {
                    $("input[name=hereditary_disease_content]").removeAttr('disabled');
                } else {
                    $("input[name=hereditary_disease_content]").attr('disabled', 'disabled');
                }
            }
            if ($(this).val() == 1){
                if ($(this).is(':checked')) {
                    $("input[name=hereditary_disease]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                } else {
                    $("input[name=hereditary_disease]").not(":first").removeAttr('disabled');
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
        
        $('.form-control').change(function () {
            if ($(this).children('option:selected').val() == 12) {
                $("input[name=family_disease_content]").removeAttr('disabled');
            } else {
                $("input[name=family_disease_content]").attr('disabled', 'disabled');
            }
        });
        $("#disease_value").change(function () {
            if ($(this).val() != 1) {
                $("input[name=disease_content]").removeAttr('disabled');
                $("input[name=disease_confirmed_at]").removeAttr('disabled');
            } else {
                $("input[name=disease_content]").attr('disabled', 'disabled');
                $("input[name=disease_confirmed_at]").attr('disabled', 'disabled');
            }
        });
        $("#injury_value").change(function () {
            if ($(this).val() != 1) {
                $("input[name=injury_content]").removeAttr('disabled');
                $("input[name=injury_confirmed_at]").removeAttr('disabled');
            } else {
                $("input[name=injury_content]").attr('disabled', 'disabled');
                $("input[name=injury_confirmed_at]").attr('disabled', 'disabled');
            }
        });
        $("#operation_value").change(function () {
            if ($(this).val() != 1) {
                $("input[name=operation_content]").removeAttr('disabled');
                $("input[name=operation_confirmed_at]").removeAttr('disabled');
            } else {
                $("input[name=operation_content]").attr('disabled', 'disabled');
                $("input[name=operation_confirmed_at]").attr('disabled', 'disabled');
            }
        });
        $("#transfusion_value").change(function () {
            if ($(this).val() != 1) {
                $("input[name=transfusion_content]").removeAttr('disabled');
                $("input[name=transfusion_confirmed_at]").removeAttr('disabled');
            } else {
                $("input[name=transfusion_content]").attr('disabled', 'disabled');
                $("input[name=transfusion_confirmed_at]").attr('disabled', 'disabled');
            }
        });
    });
    </script>
    <script id="tplOperation" type="text/template">
    <div class="row">
    	<div class="col-sm-2"></div>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="" placeholder="请输入药物名称 " />
		</div>
		<div class="col-sm-3">
			<input type="text" class="form-control text_long ml15" id="" placeholder="请输入用法用量每日多少次 " />
		</div>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="" placeholder="请输入用法用量每日多少" />
		</div>
        <div class="col-sm-1" style="padding-right: 0;">
            <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
        </div>
    </div>
</script>
@stop