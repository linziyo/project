@extends('tenant.layout')
@push('css')
<link rel="stylesheet" href="/css/table.css">
@endpush
@section('content_header')
    <h1>新生儿家庭访视记录</h1>
@stop
@section('content')
    <div class="box box-primary">
    	<form class="form-horizontal" id="formArchive">
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">姓名</label>
					<div class="col-sm-10">
                       <input data-rule-required="true" data-msg-required="请填写姓名." id="real_name" class="form-control" placeholder="请输入姓名" name="real_name" type="text" aria-required="true">					                     
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">性别</label>
					<div class="col-sm-10" style="margin-top:2px;">
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写性别." name="gender" id="gender" value="1" aria-required="true">&nbsp;男 </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写性别." name="gender" id="gender" value="2" aria-required="true">&nbsp;女</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写性别." name="gender" id="gender" value="3" aria-required="true">&nbsp;未说明的性别</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写性别." name="gender" id="gender" value="4" aria-required="true">&nbsp;未知的性别</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">出生日期</label>
					<div class="col-sm-4">
                        <div class="input-group date">
                            <input data-rule-required="true" data-msg-required="请填写出生日期." id="date-of-birth" class="form-control" placeholder="请输入出生日期" readonly="true" name="date-of-birth" type="text" aria-required="true">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">身份证号</label>
					<div class="col-sm-10">
						<label><input type="text" data-rule-required="true" data-msg-required="请填写身份证号."  class="form-control" name="ID-number" id="ID-number" placeholder="请输入身份证号"></label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">家庭住址</label>
					<div class="col-sm-10">
						<label><input type="text" data-rule-required="true" data-msg-required="请填写家庭住址." class="form-control" name="home-address" id="exampleInputName2" placeholder="请输入家庭住址"></label>
					</div>
				</div>				
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">父亲</label>
					<div class="col-sm-4 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填写父亲姓名." class="form-control" name="father-name" id="father-name" placeholder="请输入父亲姓名 " />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10"></span>
					</div>
					<div class="col-sm-4 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填写父亲联系电话." class="form-control" name="f-telephone-number" id="f-telephone-number" placeholder="请输入父亲联系电话" />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10"></span>
					</div>
					<div class="col-sm-2"></div>
					<div class="col-sm-4 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填写父亲从事职业." class="form-control mt10" name="father-works" id="father-works" placeholder="请输入父亲从事职业" />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt20"></span>
					</div>
					<div class="col-sm-2"></div>
					<div class="col-sm-4 healthy pddright0" style="margin-top: 7px;">
                            <div class="input-group date">
                            <input data-rule-required="true" data-msg-required="请填写父亲出生日期." id="f-date-birth" class="form-control" placeholder="请输入父亲出生日期" readonly="true" name="f-date-birth" type="text" aria-required="true">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
					
					<div class="clear"></div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">母亲</label>
					<div class="col-sm-4 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填写母亲姓名." class="form-control" name="mother-name" id="mother-name" placeholder="请输入母亲姓名 " />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10"></span>
					</div>
					<div class="col-sm-4 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填写母亲联系电话." class="form-control" name="m-telephone-number" id="m-telephone-number" placeholder="请输入母亲联系电话" />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10"></span>
					</div>
					<div class="col-sm-2"></div>
					<div class="col-sm-4 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填写母亲从事职业." class="form-control mt10" name="mother-works" id="mother-works" placeholder="请输入母亲从事职业" />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt20"></span>
					</div>
					<div class="col-sm-2"></div>
					<div class="col-sm-4 healthy pddright0" style="margin-top: 7px;">
                            <div class="input-group date">
                            <input data-rule-required="true" data-msg-required="请填写母亲出生日期." id="m-date-birth" class="form-control" placeholder="请输入母亲出生日期" readonly="true" name="m-date-birth" type="text" aria-required="true">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
					
					<div class="clear"></div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">出生孕周</label>
					<div class="col-sm-3 healthy pddright0">
                           <input type="text" data-rule-required="true" data-msg-required="请填写新生儿出生时母亲怀孕周数." class="form-control" name="gestational-age-birth" id="gestational-age-birth" placeholder="新生儿出生时母亲怀孕周数"/>
                    </div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10">&nbsp;&nbsp;周</span>
					</div>									
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label"></label>					
					<div class="col-sm-8 healthy pddright0">
                        <span style="font-weight: initial;margin-top:2px">母亲妊娠期患病情况&nbsp;&nbsp;</span>
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="未填写，请填." name="mother-pregnancy" id="mother-pregnancy" value="1" aria-required="true">&nbsp;无 </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="未填写，请填." name="mother-pregnancy" id="mother-pregnancy" value="2" disabled="disabled" aria-required="true">&nbsp;糖尿病</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="未填写，请填." name="mother-pregnancy" id="mother-pregnancy" value="3" disabled="disabled" aria-required="true">&nbsp;妊娠期高血压</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="未填写，请填." name="mother-pregnancy" id="mother-pregnancy" value="4" disabled="disabled" aria-required="true">&nbsp;其他</label>					
					</div>					
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">助产机构名称</label>
					<div class="col-sm-10" id="week">
						<label>                                                  
						<label>
							<input type="text" class="form-control" data-rule-required="true" data-msg-required="请填写助产机构名称." name="midwifery-institution" id="midwifery-institution" placeholder="请输入助产机构名称">
						</label>
						</label><br />
						<span style="font-weight: initial;">出生情况&nbsp;&nbsp;</span>
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写出生情况." name="birth-status" id="birth-status" value="1" aria-required="true">&nbsp;顺产</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写出生情况." name="birth-status" id="birth-status" value="2" aria-required="true">&nbsp;胎头吸引</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写出生情况." name="birth-status" id="birth-status" value="3" aria-required="true">&nbsp;产钳</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写出生情况." name="birth-status" id="birth-status" value="4" aria-required="true">&nbsp;剖宫</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写出生情况." name="birth-status" id="birth-status" value="5" aria-required="true">&nbsp;双多胎</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写出生情况." name="birth-status" id="birth-status" value="6" aria-required="true">&nbsp;臀位</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写出生情况." name="birth-status" id="birth-status" value="7" aria-required="true">&nbsp;其他</label>
						<label>
                           	<input type="text" class="form-control" name="birth-status_content" id="birth-status_content" disabled="disabled" placeholder="请输入其他情况" style="width:200px">
                        </label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">新生儿窒息</label>
					<div class="col-sm-10">
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写新生儿窒息情况." name="asphyxia-neonatorum" id="asphyxia-neonatorum" value="1" aria-required="true">&nbsp;无 </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写新生儿窒息情况." name="asphyxia-neonatorum" id="asphyxia-neonatorum" value="2" aria-required="true">&nbsp;有</label>&nbsp;&nbsp;&nbsp;
					</div>
					<label for="exampleInputName2" class="col-sm-2 control-label">畸形</label>					
					<div class="col-sm-10">
						<label class="label_color"><input type="radio" name="malformation" value="1">&nbsp;无 </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" name="malformation" value="2">&nbsp;有</label>
						<label>
                           	<input type="text" class="form-control" name="malformation_content"  placeholder="若有畸形，请输入畸形情况" disabled="disabled" />
                        </label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">新生儿听力筛查</label>
					<div class="col-sm-10">
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写新生儿听力筛查情况." name="unhs" id="unhs" value="1" aria-required="true">&nbsp;通过 </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写新生儿听力筛查情况." name="unhs" id="unhs" value="2" aria-required="true">&nbsp;未通过</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写新生儿听力筛查情况." name="unhs" id="unhs" value="3" aria-required="true">&nbsp;未筛查 </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写新生儿听力筛查情况." name="unhs" id="unhs" value="4" aria-required="true">&nbsp;不详</label>&nbsp;&nbsp;&nbsp;
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">新生儿疾病筛查</label>
					<div class="col-sm-10">
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写新生儿疾病筛查情况." name="neonatal-screening" value="1" aria-required="true">&nbsp;未进行 </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写新生儿疾病筛查情况." name="neonatal-screening" value="2" aria-required="true">&nbsp;检查均阴性</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写新生儿疾病筛查情况." name="neonatal-screening" value="3" aria-required="true">&nbsp;甲低 </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写新生儿疾病筛查情况." name="neonatal-screening" value="4" aria-required="true">&nbsp;苯丙酮尿症</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写新生儿疾病筛查情况." name="neonatal-screening" value="5" aria-required="true">&nbsp;其他遗传代谢病</label>&nbsp;&nbsp;&nbsp;
					    <label>
                           	<input type="text" class="form-control" name="neonatal-screening_content" id="" placeholder="请输入其他遗传代谢病情况" disabled="disabled" style="width:229px">
                        </label>
					</div>
				</div>				
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">新生儿体重</label>									
					<div class="col-sm-3 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填出生体重." class="form-control" name="birth-weight" id="birth-weight" placeholder="输入新生儿出生体重" />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10">&nbsp;kg</span>
					</div>					
					<div class="col-sm-3 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填目前体重." class="form-control" name="current-weight" id="current-weight" placeholder="输入新生儿目前体重" />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10">&nbsp;kg</span>
					</div>					
					<div class="clear"></div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">新生儿身长</label>																
					<div class="col-sm-3 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填出生身长." class="form-control" name="birth-height" id="birth-height" placeholder="输入新生儿出生身长" />
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10">&nbsp;cm</span>
					</div>										
					<div class="clear"></div>
				</div>
				
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">喂养方式</label>
					<div class="col-sm-10">
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写喂养方式." name="feeding-mode" id="feeding-mode" value="1" aria-required="true">&nbsp;纯母乳 </label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写喂养方式." name="feeding-mode" id="feeding-mode" value="2" aria-required="true">&nbsp;混合</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写喂养方式." name="feeding-mode" id="feeding-mode" value="3" aria-required="true">&nbsp;人工</label>&nbsp;&nbsp;&nbsp;
					</div>
				</div>				
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">吃奶量</label>
					<div class="col-sm-2 healthy pddright0">
						<input type="text"  class="form-control" name="sucking-quantity" id="sucking-quantity" placeholder="请输入吃奶量" disabled="disabled"/>
					</div>
					<div class="col-sm-2 healthy pddleft0">
						<span class="mt10">&nbsp;mL/次</span>
					</div>	
					<div class="col-sm-1 healthy pddleft0" style="width:62px;">
						<span class="mt10" style="width:62px;">&nbsp;吃奶次数</span>
					</div>					
					<div class="col-sm-2 healthy pddright0">
						<input type="text" data-rule-required="true" data-msg-required="请填写每日吃奶次数." class="form-control" name="feeding-times" id="feeding-times" placeholder="请输入每日吃奶次数" />
					</div>
					<div class="col-sm-2 healthy pddleft0">
						<span class="mt10">&nbsp;次/日</span>
					</div>													
					<div class="clear"></div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">呕吐</label>
					<div class="col-sm-3 healthy pddright0" style="margin-top: 2px;">
                        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="填写有无呕吐." name="vomit" id="vomit" value="1" aria-required="true">&nbsp;无 </label>
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="填写有无呕吐." name="vomit" id="vomit" value="2" aria-required="true">&nbsp;有</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					
					</div>													
					<div class="clear"></div>
				</div>		
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">大便</label>								
					<div class="col-sm-4 healthy pddright0">                                          
                        <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="请填写大便." name="shit" id="shit" value="1" aria-required="true">&nbsp;糊状 </label>
						<label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="请填写大便." name="shit" id="shit" value="2" aria-required="true">&nbsp;稀</label>
						<label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="请填写大便." name="shit" id="shit" value="3" aria-required="true">&nbsp;其他</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;										
					</div>					
					<div class="clear"></div>
				</div>		
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">大便次数</label>				
					<div class="col-sm-3 healthy pddright0">                        
                        <input  type="text" class="form-control" data-rule-required="true" data-msg-required="请填写大便次数." name="stool-frequency" id="stool-frequency" placeholder="请输入每日大便次数" />                          					   		
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10">&nbsp;次/日</span>
					</div>										
					<div class="clear"></div>
				</div>				
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">体温</label>										
					<div class="col-sm-3 healthy pddright0">                        
                        <input  type="text" class="form-control" data-rule-required="true" data-msg-required="请填写新生儿体温." name="temperature" id="temperature" placeholder="请输入新生儿体温" />                          					   		
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10">&nbsp;℃</span>
					</div>										
					<div class="col-sm-1 healthy pddleft0" style="width:32px;">
						<span class="mt10" style="width:32px;">&nbsp;心率</span>
					</div>						
					<div class="col-sm-3 healthy pddright0">                        
                        <input  type="text" class="form-control" data-rule-required="true" data-msg-required="请填写新生儿心率." name="heart-rate" id="heart-rate" placeholder="请输入新生儿心率" />                          					   		
					</div>
					<div class="col-sm-2 healthy pddleft0">
						<span class="mt10">&nbsp;次/分钟</span>
					</div>																						
					<div class="clear"></div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">呼吸频率</label>																							
					<div class="col-sm-3 healthy pddright0">                        
                        <input  type="text" class="form-control" data-rule-required="true" data-msg-required="请填写新生儿呼吸频率." name="respiratory-rate" id="respiratory-rate" placeholder="请输入呼吸频率" />                          					   		
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10">&nbsp;次/日</span>
					</div>															
					<div class="clear"></div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">面色</label>
					<div class="col-sm-10" style="margin-top: -3px;">
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写面色." name="complexion" id="complexion" value="1" aria-required="true">&nbsp;红润 </label>
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写面色." name="complexion" id="complexion" value="2" aria-required="true">&nbsp;黄染</label>
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写面色." name="complexion" id="complexion" value="3" aria-required="true">&nbsp;其他</label>&nbsp;&nbsp;&nbsp;
						<label>
                           	<input type="text" class="form-control" name="complexion_content" id="complexion_content" placeholder="请输入其他情况" style="width:200px" disabled="disabled"/>
                     </label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">面黄疸部位</label>
					<div class="col-sm-10" >
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写面黄疸部位." name="facial-jaundice" id="facial-jaundice" value="1" aria-required="true">&nbsp;无</label>
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写面黄疸部位." name="facial-jaundice" id="facial-jaundice" value="2" aria-required="true">&nbsp;面部</label>
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写面黄疸部位." name="facial-jaundice" id="facial-jaundice" value="3" aria-required="true">&nbsp;躯干</label>
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写面黄疸部位." name="facial-jaundice" id="facial-jaundice" value="4" aria-required="true">&nbsp;四肢</label>
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写面黄疸部位." name="facial-jaundice" id="facial-jaundice" value="5" aria-required="true">&nbsp;手足</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">前囟</label>										
					<div class="col-sm-3 healthy pddright0">                        
                        <input  type="text" class="form-control" data-rule-required="true" data-msg-required="请填写前囟值." name="bregmatic" id="bregmatic" placeholder="请输入前囟数值" />                          					   		
					</div>
					<div class="col-sm-1 healthy pddleft0">
						<span class="mt10">&nbsp;cm<sup>2</sup></span>
					</div>															
				   		<div class="col-sm-6">
				   			<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写前囟显示结果." name="bregmatic-results" id="bregmatic-results" value="1" aria-required="true">&nbsp;正常</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写前囟显示结果." name="bregmatic-results" id="bregmatic-results" value="2" aria-required="true">&nbsp;膨隆</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写前囟显示结果." name="bregmatic-results" id="bregmatic-results" value="3" aria-required="true">&nbsp;凹陷</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写前囟显示结果." name="bregmatic-results" id="bregmatic-results" value="4" aria-required="true">&nbsp;其他</label>
						<label>
                           	<input type="text" class="form-control" name="bregmatic-results_content" id="bregmatic-results_content" placeholder="请输入其他情况" style="width:200px;height:34px;">
                        </label>	
				   		</div>										
					<div class="clear"></div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">眼睛</label>
					<div class="col-sm-10">
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="eye" id="eye" value="1" aria-required="true">&nbsp;未见异常 </label>
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="eye" id="eye" value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
						<label>
                          &nbsp;&nbsp;&nbsp;<span>四肢活动度</span>
                        <label class="label_color" style="font-weight: initial;"><input type="radio"  data-rule-required="true" data-msg-required="未填写." name="limb-mobility" id="limb-mobility" value="1" aria-required="true">&nbsp;未见异常 </label>
						<label class="label_color" style="font-weight: initial;"><input type="radio"  data-rule-required="true" data-msg-required="未填写." name="limb-mobility" id="limb-mobility" value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
						</label>
						<label>
                          &nbsp;&nbsp;&nbsp;<span>耳外观</span>
                        <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="ear-appearance" value="1" aria-required="true">&nbsp;未见异常 </label>
						<label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="ear-appearance" value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
						</label>
						<label>
                          &nbsp;&nbsp;&nbsp;<span>颈部包块</span>
                        <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="cervical-mass" id="cervical-mass" value="1" aria-required="true">&nbsp;无 </label>
						<label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="cervical-mass" id="cervical-mass" value="2" aria-required="true">&nbsp;有</label>
						</label>
						
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">鼻</label>
					<div class="col-sm-10">
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="nose" id="nose" value="1" aria-required="true">&nbsp;未见异常 </label>
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="nose" id="nose" value="3" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
						<label>
                          &nbsp;&nbsp;&nbsp;<span>皮肤</span>
                        <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="skin" id="skin" value="1" aria-required="true">&nbsp;未见异常 </label>
						<label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="skin" id="skin" value="2" aria-required="true">&nbsp;湿疹</label>
						<label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="skin" id="skin" value="3" aria-required="true">&nbsp;糜烂</label>
						<label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="skin" id="skin" value="4" aria-required="true">&nbsp;其他</label>&nbsp;&nbsp;&nbsp;
						</label>
						<label>
                          &nbsp;&nbsp;&nbsp;<span>口腔</span>
                        <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="oral-cavity" id="oral-cavity" value="1" aria-required="true">&nbsp;未见异常 </label>
						<label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="oral-cavity" id="oral-cavity" value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
						</label>
						<label>
                          &nbsp;&nbsp;&nbsp;<span>肛门</span>
                        <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="anus" id="anus" value="1" aria-required="true">&nbsp;未见异常 </label>
						<label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="anus" id="anus" value="2" aria-required="true">&nbsp;异常</label>
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">心肺听诊</label>
					<div class="col-sm-10">
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="cardiopulmonary-auscultation" id="cardiopulmonary-auscultation" value="1" aria-required="true">&nbsp;未见异常 </label>
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="cardiopulmonary-auscultation" id="cardiopulmonary-auscultation" value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
						<label>
                          &nbsp;&nbsp;&nbsp;<span>胸部</span>
                        <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="chest" id="chest" value="1" aria-required="true">&nbsp;未见异常 </label>
						<label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="chest" id="chest" value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
						</label>
						<label>
                          &nbsp;&nbsp;&nbsp;<span>腹部触诊</span>
                        <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="abdominal-palpation" id="abdominal-palpation" value="1" aria-required="true">&nbsp;未见异常 </label>
						<label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="abdominal-palpation" id="abdominal-palpation" value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
						</label>
						<label>
                          &nbsp;&nbsp;&nbsp;<span>脊柱</span>
                        <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="spine" id="spine" value="1" aria-required="true">&nbsp;未见异常 </label>
						<label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="spine" id="spine" value="2" aria-required="true">&nbsp;异常</label>
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">外生殖器</label>
					<div class="col-sm-10">
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="external-genitalia" id="external-genitalia" value="1" aria-required="true">&nbsp;未见异常 </label>
						<label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="external-genitalia" id="external-genitalia" value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">脐带</label>
					<div class="col-sm-10" style="margin-top:-2px;">
						<label class="label_color"><input type="checkbox"  data-rule-required="true" data-msg-required="请填写脐带情况." name="umbilical-cord" id="umbilical-cord" value="1" aria-required="true">&nbsp;未脱 </label>
						<label class="label_color"><input type="checkbox"  data-rule-required="true" data-msg-required="请填写脐带情况." name="umbilical-cord" id="umbilical-cord" value="2" aria-required="true">&nbsp;脱落</label>
						<label class="label_color"><input type="checkbox"  data-rule-required="true" data-msg-required="请填写脐带情况." name="umbilical-cord" id="umbilical-cord" value="3" aria-required="true">&nbsp;脐部有渗出</label>&nbsp;&nbsp;&nbsp;
						<label class="label_color"><input type="checkbox"  data-rule-required="true" data-msg-required="请填写脐带情况." name="umbilical-cord" id="umbilical-cord" value="4" aria-required="true">&nbsp;其他</label>
						<label>
                           	<input type="text" class="form-control" name="umbilical-cord_content" id="umbilical-cord_content" placeholder="请输入其他情况" disabled="disabled"/>
                        </label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">转诊建议</label>
					<div class="col-sm-1 healthy pddright0" style="margin-top: 2px;">
                        <label class="label_color"><input type="radio"  name="referral-recommendations"  value="1" aria-required="true">&nbsp;无 </label>
						<label class="label_color"><input type="radio"  name="referral-recommendations"  value="2" aria-required="true">&nbsp;有</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					
					</div>					
					<div class="col-sm-1 healthy pddleft0" style="width:45px;">
						<span class="mt10" style="width:45px;">&nbsp;&nbsp;&nbsp;原因</span>
					</div>						
					<div class="col-sm-3 healthy pddright0">                        
                        <input  type="text" class="form-control"  name="referral-recommendations_content" id="referral-recommendations_content" placeholder="请输入转诊原因" disabled="disabled"/>                          					   		
					</div>				
					<div class="col-sm-1 healthy pddleft0" style="width:94px;">
						<span class="mt10" style="width:94px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机构及科室</span>
					</div>						
					<div class="col-sm-3 healthy pddright0">                        
                        <input  type="text" class="form-control"  name="referral-recommendations_content" id="referral-recommendations_content" placeholder="请输入转诊机构及科室" disabled="disabled"/>                          					   		
					</div>									
					<div class="clear"></div>
				</div>				
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">指导</label>
					<div class="col-sm-10" style="margin-top:-2px;">
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写指导情况." name="guidance" value="1" aria-required="true">&nbsp;喂养指导</label>
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写指导情况." name="guidance" value="2" aria-required="true">&nbsp;发育指导</label>
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写指导情况." name="guidance" value="3" aria-required="true">&nbsp;防病指导</label>
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写指导情况." name="guidance" value="4" aria-required="true">&nbsp;预防伤害指导</label>
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写指导情况." name="guidance" value="5" aria-required="true">&nbsp;口腔保健指导</label>
						<label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写指导情况." name="guidance" value="6" aria-required="true">&nbsp;其它</label>						
                        <label>
                           	<input type="text" class="form-control" name="guidance_content" id="guidance_content" placeholder="请输入其他情况" disabled="disabled"/>
                        </label>					
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">本次访视日期</label> 
					<div class="col-sm-4">
                        <div class="input-group date">
                            <input data-rule-required="true" data-msg-required="请填写本次访视日期." id="date-this-visit" class="form-control" placeholder="请输入本次访视日期" readonly="true" name="date-this-visit" type="text" aria-required="true">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">下次随访地点</label>
					<div class="col-sm-10">
						<label><input type="text" data-rule-required="true" data-msg-required="请填写下次随访地点." class="form-control" name="next-visit" id="next-visit" placeholder="请输入下次随访地点" ></label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputName2" class="col-sm-2 control-label">下次随访日期</label>
					<div class="col-sm-4">
                        <div class="input-group date">
                            <input data-rule-required="true" data-msg-required="请填写下次随访日期." id="next-follow-up-date" class="form-control" placeholder="请输入下次随访日期" readonly="true" name="next-follow-up-date" type="text" aria-required="true">
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
//                date-thisvisit: 'required', 
//                next-follow-up-date: 'required',   
//                follow-doctor: 'required',

//                treatment-order: 'required',
//                chemotherapy-regimen: 'required',
//                missed-medication: 'required',
//                complication: 'required',  
//                follow-up-results: 'required',
//                handle-opinions: 'required',
//                next-visit-date: 'required', 
//                stop-treatment-time: 'required',
//                prospective-patient: 'required',  
//                number-medications: 'required', 
//                actual-number: 'required',  
//                actual-medication: 'required',  
//                medication rate: 'required', 
//                physician signature: 'required',  
//                temperature: 'required',  
//                heart-rate: 'required', 
//                respiratory-rate: 'required',   

//                date-of-birth: 'required',
//                ID-number: 'required',
//                home-address: 'required', 
//                father-name: 'required',
//                f-telephone-number: 'required',
//                father-works: 'required', 
//                f-date-birth: 'required',
//                mother-name: 'required',
//                m-telephone-number: 'required',
//                mother-works: 'required', 
//                m-date-birth: 'required',  
//                gestational-age-birth: 'required', 
//                mother-pregnancy: 'required', 
//                midwifery-institution: 'required', 
//                birth-status: 'required', 
//                malformation: 'required',  
//                birth-weight: 'required', 
//                current-weight: 'required',
//                birth-height: 'required', 
//                feeding-times: 'required',
//                feeding-mode: 'required',  
//                stool-frequency: 'required', 
//                complexion: 'required',   
//                facial-jaundice: 'required',
//                bregmatic: 'required',  
//                eye: 'required',
//                limb-mobility: 'required',
//                ear-appearance: 'required',
//                cervical-mass: 'required',
//                nose: 'required',
//                skin: 'required',
//                oral-cavity: 'required',
//                anus: 'required',
//                cardiopulmonary-auscultation: 'required',
//                chest: 'required',
//                abdominal-palpation: 'required',
//                spine: 'required',
//                external-genitalia: 'required',
//                umbilical-cord: 'required',  
//                referral-recommendations: 'required', 
//                guidance: 'required',
//                next-visit: 'required',

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
                    'date-thisvisit': $("input[name=date-thisvisit]").val(),
                    'next-follow-up-date': $("input[name=next-follow-up-date]").val(),
                    'follow-doctor': $("input[name=follow-doctor]").val(),   
                    'date-this-visit': $("input[name=date-this-visit]").val(), 
                    
                    'treatment-order': $("input[name=treatment-order]").val(),
                    'supervisory-staff': $("input[name=supervisory-staff]").val(),
                    'chemotherapy-regimen': $("input[name=chemotherapy-regimen]").val(),
                    'usage': $("input[name=usage]").val(),
                    'drug-dosage-forms': $("input[name=drug-dosage-forms]").val(),
                    'missed-medication': $("input[name=missed-medication]").val(),
                    'complication': $("input[name=complication]").val(),
                    'follow-up-results': $("input[name=follow-up-results]").val(),
                    'handle-opinions': $("input[name=handle-opinions]").val(),
                    'next-visit-date': $("input[name=next-visit-date]").val(),
                    'stop-treatment-time': $("input[name=stop-treatment-time]").val(),
                    'stop-treatment-reason': $("input[name=stop-treatment-reason]").val(),
                    'prospective-patient': $("input[name=prospective-patient]").val(),
                    'number-medications': $("input[name=number-medications]").val(),
                    'actual-number': $("input[name=actual-number]").val(),  
                    'actual-medication': $("input[name=actual-medication]").val(),
                    'medication rate': $("input[name=medication rate]").val(),
                    'physician signature': $("input[name=physician signature]").val(),
                    
                    'gender': $("input[name=gender]").val(),
                    'date-of-birth': $("input[name=date-of-birth]").val(),
                    'ID-number': $("input[name=ID-number]").val(),
                    'home-address': $("input[name=home-address]").val(),
                    'father-name': $("input[name=father-name]").val(),
                    'f-telephone-number': $("input[name=f-telephone-number]").val(),
                    'father-works': $("input[name=father-works]").val(),
                    'f-date-birth': $("input[name=f-date-birth]").val(),
                    'mother-name': $("input[name=mother-name]").val(),
                    'm-telephone-number': $("input[name=m-telephone-number]").val(),
                    'mother-works': $("input[name=mother-works]").val(),
                    'm-date-birth': $("input[name=m-date-birth]").val(), 
                    'gestational-age-birth': $("input[name=gestational-age-birth]").val(), 
                    'mother-pregnancy': $("input[name=mother-pregnancy]").val(), 
                    'midwifery-institution': $("input[name=midwifery-institution]").val(),
                    'birth-status': $("input[name=birth-status]").val(),   
                    'asphyxia-neonatorum': $("input[name=asphyxia-neonatorum]").val(), 
                    'malformation': $("input[name=malformation]").val(), 
                    'unhs': $("input[name=unhs]").val(),
                    'neonatal-screening': $("input[name=neonatal-screening]").val(),  
                    'birth-weight': $("input[name=birth-weight]").val(),                     
                    'current-weight': $("input[name=current-weight]").val(),  
                    'birth-height': $("input[name=birth-height]").val(),  
                    'feeding-times': $("input[name=feeding-times]").val(), 
                    'feeding-mode': $("input[name=feeding-mode]").val(), 
                    'vomit': $("input[name=vomit]").val(),
                    'shit': $("input[name=shit]").val(),   
                    'stool-frequency': $("input[name=stool-frequency]").val(), 
                    'temperature': $("input[name=temperature]").val(),
                    'heart-rate': $("input[name=heart-rate]").val(),   
                    'respiratory-rate': $("input[name=respiratory-rate]").val(),
                    'complexion': $("input[name=complexion]").val(),
                    'facial-jaundice': $("input[name=facial-jaundice]").val(), 
                    'bregmatic': $("input[name=bregmatic]").val(),   
                    'eye': $("input[name=eye]").val(), 
                    'limb-mobility': $("input[name=limb-mobility]").val(), 
                    'ear-appearance': $("input[name=ear-appearance]").val(), 
                    'cervical-mass': $("input[name=cervical-mass]").val(), 
                    'nose': $("input[name=nose]").val(), 
                    'skin': $("input[name=skin]").val(), 
                    'oral-cavity': $("input[name=oral-cavity]").val(), 
                    'anus': $("input[name=anus]").val(), 
                    'cardiopulmonary-auscultation': $("input[name=cardiopulmonary-auscultation]").val(), 
                    'chest': $("input[name=chest]").val(), 
                    'abdominal-palpation': $("input[name=abdominal-palpation]").val(), 
                    'spine': $("input[name=spine]").val(), 
                    'external-genitalia': $("input[name=external-genitalia]").val(),  
                    'umbilical-cord': $("input[name=umbilical-cord]").val(),   
                    'referral-recommendations': $("input[name=umbilical-cord]").val(), 
                    'guidance': $("input[name=guidance]").val(), 
                    'next-visit': $("input[name=next-visit]").val(),
                    
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
                    'birthStatus': $("input[name=birth-status]:checked").map(function (index, element) {
                                    return this.value == 8 ? {
                                        'value': this.value,
                                        'content': $("input[name=birth-status_content]").val()
                                    } : {'value': this.value};
                                }).get(),
                    'symptom': $("input[name=symptom]:checked").map(function (index, element) {
                                    return this.value == 10 ? {
                                        'value': this.value,
                                        'content': $("input[name=symptom_content]").val()
                                    } : {'value': this.value};
                                }).get(), 
                    'guidance': $("input[name=guidance]:checked").map(function (index, element) {
                                    return this.value == 6 ? {
                                        'value': this.value,
                                        'content': $("input[name=guidance_content]").val()
                                    } : {'value': this.value};
                                }).get(),
                    'umbilicalCord': $("input[name=umbilical-cord]:checked").map(function (index, element) {
                                    return this.value == 10 ? {
                                        'value': this.value,
                                        'content': $("input[name=umbilical-cord_content]").val()
                                    } : {'value': this.value};
                                }).get(),
                    'bregmaticResults': $("input[name=bregmatic-results]:checked").map(function (index, element) {
                                    return this.value == 4 ? {
                                        'value': this.value,
                                        'content': $("input[name=bregmatic-results_content]").val()
                                    } : {'value': this.value};
                                }).get(),
                    'complexion': $("input[name=complexion]:checked").map(function (index, element) {
                                    return this.value == 10 ? {
                                        'value': this.value,
                                        'content': $("input[name=complexion_content]").val()
                                    } : {'value': this.value};
                                }).get(),
                    'feedingMode': $("input[name=feeding-mode]:checked").map(function (index, element) {
                                    return this.value == 3 ? {
                                        'value': this.value,
                                        'content': $("input[name=sucking-quantity]").val()
                                    } : {'value': this.value};
                                }).get(),
                    'neonatalScreening': $("input[name=neonatal-screening]:checked").map(function (index, element) {
                                    return this.value == 5 ? {
                                        'value': this.value,
                                        'content': $("input[name=neonatal-screening_content]").val()
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
                    'facialJaundice': $("input[name=facial-jaundice]:checked").map(function (index, element) {
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
                    'referralRecommendations': $("input[name=referral-recommendations]:checked").map(function (index, element) {
                                        return this.value == 2 ? {
                                            'value': this.value,
                                            'content': $("input[name=referral-recommendations_content]").val()
                                        } : {'value': this.value};
                                    }).get(), 
                    'malformation': $("input[name=malformation]:checked").map(function (index, element) {
                                        return this.value == 2 ? {
                                            'value': this.value,
                                            'content': $("input[name=malformation_content]").val()
                                        } : {'value': this.value};
                                    }).get(),
                   'complication': $("input[name=complication]:checked").map(function (index, element) {
                                        return this.value == 2 ? {
                                            'value': this.value,
                                            'content': $("input[name=complication_content]").val()
                                        } : {'value': this.value};
                                    }).get(), 
                    'mother-pregnancy': $("input[name=mother-pregnancy]:checked").map(function (index, element) {
                                    return {'value': this.value};
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

        $("input[type=checkbox][name=birth-status]:last").change(function () {
            if ($(this).is(':checked')) {
                $("input[name=birth-status_content]").removeAttr('disabled');
            } else {
                $("input[name=birth-status_content]").attr('disabled', 'disabled');
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
            if ($(this).val() == 12) {
                if ($(this).is(':checked')) {
                    $("input[name=symptom_content]").removeAttr('disabled');
                } else {
                    $("input[name=symptom_content]").attr('disabled', 'disabled');
                }
            }
        }); 
        $("input[name=umbilical-cord]").change(function () {
            if ($(this).val() == 1) {
                if ($(this).is(':checked')) {
                    $("input[name=umbilical-cord]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                    $("input[name=umbilical-cord_content]").attr('disabled', 'disabled').empty();
                } else {
                    $("input[type=checkbox][name=umbilical-cord]").not(":first").removeAttr('disabled');
                }
            }
            if ($(this).val() == 4) {
                if ($(this).is(':checked')) {
                    $("input[name=umbilical-cord_content]").removeAttr('disabled');
                } else {
                    $("input[name=umbilical-cord_content]").attr('disabled', 'disabled');
                }
            }
        }); 
        $("input[name=bregmatic-results]").change(function () {
            if ($(this).val() == 1) {
                if ($(this).is(':checked')) {                   
                    $("input[name=bregmatic-results_content]").attr('disabled', 'disabled').empty();
                } else {
                    $("input[type=radio][name=bregmatic-results]").not(":first").removeAttr('disabled');
                }
            }
            if ($(this).val() == 2) {
                if ($(this).is(':checked')) {                  
                    $("input[name=bregmatic-results_content]").attr('disabled', 'disabled').empty();
                } else {
                    $("input[type=radio][name=bregmatic-results]").not(":first").removeAttr('disabled');
                }
            }          
             if ($(this).val() == 3) {
                if ($(this).is(':checked')) {                  
                    $("input[name=bregmatic-results_content]").attr('disabled', 'disabled').empty();
                } else {
                    $("input[type=radio][name=bregmatic-results]").not(":first").removeAttr('disabled');
                }
            }             
            if ($(this).val() == 4) {
                if ($(this).is(':checked')) {
                    $("input[name=bregmatic-results_content]").removeAttr('disabled');
                } else {
                    $("input[name=bregmatic-results_content]").attr('disabled', 'disabled');
                }
            }
        });   
         $("input[name=guidance]").change(function () {           
            if ($(this).val() == 6) {
                if ($(this).is(':checked')) {
                    $("input[name=guidance_content]").removeAttr('disabled');
                } else {
                    $("input[name=guidance_content]").attr('disabled', 'disabled');
                }
            }
        }); 
         $("input[name=complexion]").change(function () {
            if ($(this).val() == 1) {
                if ($(this).is(':checked')) {                   
                    $("input[name=complexion_content]").attr('disabled', 'disabled').empty();
                } else {
                    $("input[type=radio][name=complexion]").not(":first").removeAttr('disabled');
                }
            }
            if ($(this).val() == 2) {
                if ($(this).is(':checked')) {                  
                    $("input[name=complexion_content]").attr('disabled', 'disabled').empty();
                } else {
                    $("input[type=radio][name=complexion]").not(":first").removeAttr('disabled');
                }
            }                 
            if ($(this).val() == 3) {
                if ($(this).is(':checked')) {
                    $("input[name=complexion_content]").removeAttr('disabled');
                } else {
                    $("input[name=complexion_content]").attr('disabled', 'disabled');
                }
            }
        }); 
        $("input[name=feeding-mode]").change(function () {
            if ($(this).val() == 1) {
                if ($(this).is(':checked')) {                   
                    $("input[name=sucking-quantity]").attr('disabled', 'disabled').empty();
                } else {
                    $("input[type=radio][name=feeding-mode]").not(":first").removeAttr('disabled');
                }
            }
            if ($(this).val() == 2) {
                if ($(this).is(':checked')) {                  
                    $("input[name=sucking-quantity]").attr('disabled', 'disabled').empty();
                } else {
                    $("input[type=radio][name=feeding-mode]").not(":first").removeAttr('disabled');
                }
            }                 
            if ($(this).val() == 3) {
                if ($(this).is(':checked')) {
                    $("input[name=sucking-quantity]").removeAttr('disabled');
                } else {
                    $("input[name=sucking-quantity]").attr('disabled', 'disabled');
                }
            }
        }); 
         $("input[name=neonatal-screening]").change(function () {
            if ($(this).val() == 1) {
                if ($(this).is(':checked')) {
                    $("input[name=neonatal-screening]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                    $("input[name=neonatal-screening_content]").attr('disabled', 'disabled').empty();
                } else {
                    $("input[type=checkbox][name=neonatal-screening]").not(":first").removeAttr('disabled');
                }
            }
            if ($(this).val() == 5) {
                if ($(this).is(':checked')) {
                    $("input[name=neonatal-screening_content]").removeAttr('disabled');
                } else {
                    $("input[name=neonatal-screening_content]").attr('disabled', 'disabled');
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
        $("input[type=checkbox][name=mother-pregnancy]").change(function () {
            if ($(this).val() == 1) {
                if ($(this).is(':checked')) {
                    $("input[name=mother-pregnancy]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                } else {
                    $("input[name=mother-pregnancy]").not(":first").removeAttr('disabled');
                }
            }
        });
        $(".append").click(function () {
            $($(this).attr('data-target')).append($($(this).attr('data-source')).html());
        });
        $("input[name=facial-jaundice]").change(function () {
            if ($(this).val() == 1) {
                if ($(this).is(':checked')) {
                    $("input[name=facial-jaundice]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                } else {
                    $("input[name=facial-jaundice]").not(":first").removeAttr('disabled');
                }
            }
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
        $("input[name=referral-recommendations]").change(function () {
            if ($(this).val() == 1) {
                if ($(this).is(':checked')) {                   
                    $("input[name=referral-recommendations_content]").attr('disabled', 'disabled').empty();
                } else {
                    $("input[type=radio][name=referral-recommendations]").not(":first").removeAttr('disabled');
                }
            }              
            if ($(this).val() == 2) {
                if ($(this).is(':checked')) {
                    $("input[name=referral-recommendations_content]").removeAttr('disabled');
                } else {
                    $("input[name=referral-recommendations_content]").attr('disabled', 'disabled');
                }
            }
        }); 
         $("input[name=malformation]").change(function () {
            if ($(this).val() == 1) {
                if ($(this).is(':checked')) {                   
                    $("input[name=malformation_content]").attr('disabled', 'disabled').empty();
                } else {
                    $("input[type=radio][name=malformation]").not(":first").removeAttr('disabled');
                }
            }            
            if ($(this).val() == 2) {
                if ($(this).is(':checked')) {
                    $("input[name=malformation_content]").removeAttr('disabled');
                } else {
                    $("input[name=malformation_content]").attr('disabled', 'disabled');
                }
            }
        });  
        $("input[type=checkbox][name=complication]").change(function () {
            if ($(this).val() == 2) {
                if ($(this).is(':checked')) {
                    $("input[name=complication_content]").removeAttr('disabled');
                } else {
                    $("input[name=complication_content]").attr('disabled', 'disabled');
                }
            }
            if ($(this).val() == 1){
                if ($(this).is(':checked')) {
                    $("input[name=complication]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                } else {
                    $("input[name=complication]").not(":first").removeAttr('disabled');
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
					<div class="col-sm-3">
						<input type="text" class="form-control" id="" placeholder="请输入药物名称 " />
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control text_long ml15" id="" placeholder="请输入用法用量每日多少次 " />
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="" placeholder="请输入用法用量每日多少" />
					</div>
        <div class="col-md-2">
            <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
        </div>
    </div>
</script>
@stop