<div class="box box-primary">
    <form class="form-horizontal"  action="{{ $actionUrl }}" method="post">
        <input type="hidden" name="archive_id" value="{{ $archive_id }}">
        @if(str_contains(route::currentRouteName(),'edit'))
        {!! method_field('PUT') !!}
        @endif
        {{ csrf_field() }}

<div class="form-group">
    <label  class="col-sm-2 control-label">姓名</label>
    <div class="col-sm-10">
        <label><input type="text" data-rule-required="true"   class="form-control" name="real_name"  placeholder="请输入姓名" readonly></label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">性别</label>
    <div class="col-sm-10" style="margin-top:2px;">
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写性别." name="sex" disabled value="1" aria-required="true">&nbsp;男 </label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写性别." name="sex" disabled value="2" aria-required="true">&nbsp;女</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写性别." name="sex" disabled value="0" aria-required="true">&nbsp;未说明的性别</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写性别." name="sex" disabled value="9" aria-required="true">&nbsp;未知的性别</label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">出生日期</label>
    <div class="col-sm-4">
        <div class="input-group date">
            <input data-rule-required="true" data-msg-required="请填写出生日期." id="date-of-birth" class="form-control" disabled placeholder="请输入出生日期" readonly="true" name="birthday" type="text" aria-required="true">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">身份证号</label>
    <div class="col-sm-10">
        <label><input type="text" data-rule-required="true" data-msg-required="请填写身份证号."  class="form-control" readonly name="id_code" id="ID-number" placeholder="请输入身份证号"></label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">家庭住址</label>
    <div class="col-sm-10">
        <label><input type="text" data-rule-required="true" data-msg-required="请填写家庭住址." class="form-control" readonly name="address" id="exampleInputName2" placeholder="请输入家庭住址"></label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">父亲</label>
    <div class="col-sm-4 healthy pddright0">
        <input type="text" data-rule-required="true" data-msg-required="请填写父亲姓名." class="form-control" name="father_name"  placeholder="请输入父亲姓名 " />
    </div>
    <div class="col-sm-1 healthy pddleft0">
        <span class="mt10"></span>
    </div>
    <div class="col-sm-4 healthy pddright0">
        <input type="text" data-rule-required="true" data-msg-required="请填写父亲联系电话." class="form-control" name="father_phone_number"  placeholder="请输入父亲联系电话" />
    </div>
    <div class="col-sm-1 healthy pddleft0">
        <span class="mt10"></span>
    </div>
    <div class="col-sm-2"></div>
    <div class="col-sm-4 healthy pddright0">
        <input type="text" data-rule-required="true" data-msg-required="请填写父亲从事职业." class="form-control mt10" name="father_job"  placeholder="请输入父亲从事职业" />
    </div>
    <div class="col-sm-1 healthy pddleft0">
        <span class="mt20"></span>
    </div>
    <div class="col-sm-2"></div>
    <div class="col-sm-4 healthy pddright0" style="margin-top: 7px;">
        <div class="input-group date">
            <input data-rule-required="true" data-msg-required="请填写父亲出生日期."  class="form-control" placeholder="请输入父亲出生日期" readonly="true" name="father_birthday" type="text" aria-required="true">
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
        <input type="text" data-rule-required="true" data-msg-required="请填写母亲姓名." class="form-control" name="mother_name"  placeholder="请输入母亲姓名 " />
    </div>
    <div class="col-sm-1 healthy pddleft0">
        <span class="mt10"></span>
    </div>
    <div class="col-sm-4 healthy pddright0">
        <input type="text" data-rule-required="true" data-msg-required="请填写母亲联系电话." class="form-control" name="mother_phone_number"  placeholder="请输入母亲联系电话" />
    </div>
    <div class="col-sm-1 healthy pddleft0">
        <span class="mt10"></span>
    </div>
    <div class="col-sm-2"></div>
    <div class="col-sm-4 healthy pddright0">
        <input type="text" data-rule-required="true" data-msg-required="请填写母亲从事职业." class="form-control mt10" name="mother_job"  placeholder="请输入母亲从事职业" />
    </div>
    <div class="col-sm-1 healthy pddleft0">
        <span class="mt20"></span>
    </div>
    <div class="col-sm-2"></div>
    <div class="col-sm-4 healthy pddright0" style="margin-top: 7px;">
        <div class="input-group date">
            <input data-rule-required="true" data-msg-required="请填写母亲出生日期."  class="form-control" placeholder="请输入母亲出生日期" readonly="true" name="mother_birthday" type="text" aria-required="true">
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
        <input type="text" data-rule-required="true" data-msg-required="请填写新生儿出生时母亲怀孕周数." class="form-control" name="pregnancy_week" placeholder="新生儿出生时母亲怀孕周数"/>
    </div>
    <div class="col-sm-1 healthy pddleft0">
        <span class="mt10">&nbsp;&nbsp;周</span>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label"></label>
    <div class="col-sm-8 healthy pddright0 type-checkbox">
        <span style="font-weight: initial;margin-top:2px">母亲妊娠期患病情况&nbsp;&nbsp;</span>
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="未填写，请填." name="pregnancy_disease[]"  value="1" aria-required="true">&nbsp;无 </label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="未填写，请填." name="pregnancy_disease[]"  value="2"  aria-required="true">&nbsp;糖尿病</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="未填写，请填." name="pregnancy_disease[]"  value="3"  aria-required="true">&nbsp;妊娠期高血压</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="未填写，请填." name="pregnancy_disease[]"  value="4"  aria-required="true">&nbsp;其他</label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">助产机构名称</label>
    <div class="col-sm-10 type-checkbox" id="week">
        <label>
            <label>
                <input type="text" class="form-control" data-rule-required="true" data-msg-required="请填写助产机构名称." name="midwifery_institution"  placeholder="请输入助产机构名称">
            </label>
        </label><br />
        <span style="font-weight: initial;">出生情况&nbsp;&nbsp;</span>
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写出生情况." name="midwifery_mode[]"  value="1" aria-required="true">&nbsp;顺产</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写出生情况." name="midwifery_mode[]" value="2" aria-required="true">&nbsp;胎头吸引</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写出生情况." name="midwifery_mode[]" value="3" aria-required="true">&nbsp;产钳</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写出生情况." name="midwifery_mode[]" value="4" aria-required="true">&nbsp;剖宫</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写出生情况." name="midwifery_mode[]" value="5" aria-required="true">&nbsp;双多胎</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写出生情况." name="midwifery_mode[]" value="6" aria-required="true">&nbsp;臀位</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写出生情况." name="midwifery_mode[]" value="7" aria-required="true">&nbsp;其他</label>
        <label>
            <input type="text" class="form-control" name="midwifery_mode_other"   placeholder="请输入其他情况" style="width:200px">
        </label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">新生儿窒息</label>
    <div class="col-sm-10 type-radio">
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写新生儿窒息情况." name="asphyxia-neonate"  value="1" aria-required="true">&nbsp;无 </label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写新生儿窒息情况." name="asphyxia-neonate"  value="2" aria-required="true">&nbsp;有</label>&nbsp;&nbsp;&nbsp;
    </div>
    <label for="exampleInputName2" class="col-sm-2 control-label">畸形</label>
    <div class="col-sm-10 type-radio">
        <label class="label_color"><input type="radio" name="deformity" value="1">&nbsp;无 </label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="radio" value="2" name="deformity">&nbsp;有</label>
        <label>
            <input type="text" class="form-control" name="deformity_other"  placeholder="若有畸形，请输入畸形情况"  />
        </label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">新生儿听力筛查</label>
    <div class="col-sm-10 type-radio">
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写新生儿听力筛查情况." name="hearing_screening"  value="1" aria-required="true">&nbsp;通过 </label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写新生儿听力筛查情况." name="hearing_screening"  value="2" aria-required="true">&nbsp;未通过</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写新生儿听力筛查情况." name="hearing_screening"  value="3" aria-required="true">&nbsp;未筛查 </label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写新生儿听力筛查情况." name="hearing_screening" value="4" aria-required="true">&nbsp;不详</label>&nbsp;&nbsp;&nbsp;
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">新生儿疾病筛查</label>
    <div class="col-sm-10 type-checkbox">
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写新生儿疾病筛查情况." name="disease_screening[]" value="1" aria-required="true">&nbsp;未进行 </label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写新生儿疾病筛查情况." name="disease_screening[]" value="2" aria-required="true">&nbsp;检查均阴性</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写新生儿疾病筛查情况." name="disease_screening[]" value="3" aria-required="true">&nbsp;甲低 </label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写新生儿疾病筛查情况." name="disease_screening[]" value="4" aria-required="true">&nbsp;苯丙酮尿症</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写新生儿疾病筛查情况." name="disease_screening[]" value="5" aria-required="true">&nbsp;其他遗传代谢病</label>&nbsp;&nbsp;&nbsp;
        <label>
            <input type="text" class="form-control" name="disease_screening_other" id="" placeholder="请输入其他遗传代谢病情况"  style="width:229px">
        </label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">新生儿体重</label>
    <div class="col-sm-3 healthy pddright0">
        <input type="text" data-rule-required="true" data-msg-required="请填出生体重." class="form-control" name="birth_weight"  placeholder="输入新生儿出生体重" />
    </div>
    <div class="col-sm-1 healthy pddleft0">
        <span class="mt10">&nbsp;kg</span>
    </div>
    <div class="col-sm-3 healthy pddright0">
        <input type="text" data-rule-required="true" data-msg-required="请填目前体重." class="form-control" name="weight"  placeholder="输入新生儿目前体重" />
    </div>
    <div class="col-sm-1 healthy pddleft0">
        <span class="mt10">&nbsp;kg</span>
    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">新生儿身长</label>
    <div class="col-sm-3 healthy pddright0">
        <input type="text" data-rule-required="true" data-msg-required="请填出生身长." class="form-control" name="birth_height"  placeholder="输入新生儿出生身长" />
    </div>
    <div class="col-sm-1 healthy pddleft0">
        <span class="mt10">&nbsp;cm</span>
    </div>
    <div class="clear"></div>
</div>

<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">喂养方式</label>
    <div class="col-sm-10 type-radio">
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写喂养方式." name="feeding_patterns"  value="1" aria-required="true">&nbsp;纯母乳 </label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写喂养方式." name="feeding_patterns"  value="2" aria-required="true">&nbsp;混合</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写喂养方式." name="feeding_patterns"  value="3" aria-required="true">&nbsp;人工</label>&nbsp;&nbsp;&nbsp;
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">吃奶量</label>
    <div class="col-sm-2 healthy pddright0">
        <input type="text"  class="form-control" name="feeding_amount"  placeholder="请输入吃奶量" />
    </div>
    <div class="col-sm-2 healthy pddleft0">
        <span class="mt10">&nbsp;mL/次</span>
    </div>
    <div class="col-sm-1 healthy pddleft0" style="width:62px;">
        <span class="mt10" style="width:62px;">&nbsp;吃奶次数</span>
    </div>
    <div class="col-sm-2 healthy pddright0">
        <input type="text" data-rule-required="true" data-msg-required="请填写每日吃奶次数." class="form-control" name="feeding_frequency"  placeholder="请输入每日吃奶次数" />
    </div>
    <div class="col-sm-2 healthy pddleft0">
        <span class="mt10">&nbsp;次/日</span>
    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">呕吐</label>
    <div class="col-sm-3 healthy pddright0 type-radio" style="margin-top: 2px;">
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="填写有无呕吐." name="vomit"  value="1" aria-required="true">&nbsp;无 </label>
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="填写有无呕吐." name="vomit"  value="2" aria-required="true">&nbsp;有</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">大便</label>
    <div class="col-sm-4 healthy pddright0 type-radio">
        <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="请填写大便." name="shit"  value="1" aria-required="true">&nbsp;糊状 </label>
        <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="请填写大便." name="shit"  value="2" aria-required="true">&nbsp;稀</label>
        <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="请填写大便." name="shit"  value="3" aria-required="true">&nbsp;其他</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">大便次数</label>
    <div class="col-sm-3 healthy pddright0">
        <input  type="text" class="form-control" data-rule-required="true" data-msg-required="请填写大便次数." name="shit_times"  placeholder="请输入每日大便次数" required />
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
        <input  type="text" class="form-control" data-rule-required="true" data-msg-required="请填写新生儿心率." name="heart_rate"  placeholder="请输入新生儿心率" />
    </div>
    <div class="col-sm-2 healthy pddleft0">
        <span class="mt10">&nbsp;次/分钟</span>
    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">呼吸频率</label>
    <div class="col-sm-3 healthy pddright0">
        <input  type="text" class="form-control" data-rule-required="true" data-msg-required="请填写新生儿呼吸频率." name="breathing_rate"  placeholder="请输入呼吸频率" />
    </div>
    <div class="col-sm-1 healthy pddleft0">
        <span class="mt10">&nbsp;次/日</span>
    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">面色</label>
    <div class="col-sm-10 type-radio" style="margin-top: -3px;">
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写面色." name="color_face"  value="1" aria-required="true">&nbsp;红润 </label>
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写面色." name="color_face" value="2" aria-required="true">&nbsp;黄染</label>
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写面色." name="color_face" value="3" aria-required="true">&nbsp;其他</label>&nbsp;&nbsp;&nbsp;
        <label>
            <input type="text" class="form-control" name="color_face_other"  placeholder="请输入其他情况" style="width:200px" />
        </label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">面黄疸部位</label>
    <div class="col-sm-10 type-checkbox" >
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写面黄疸部位." name="jaundice_parts[]"  value="1" aria-required="true">&nbsp;无</label>
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写面黄疸部位." name="jaundice_parts[]"  value="2" aria-required="true">&nbsp;面部</label>
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写面黄疸部位." name="jaundice_parts[]"  value="3" aria-required="true">&nbsp;躯干</label>
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写面黄疸部位." name="jaundice_parts[]"  value="4" aria-required="true">&nbsp;四肢</label>
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写面黄疸部位." name="jaundice_parts[]"  value="5" aria-required="true">&nbsp;手足</label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">前囟</label>
    <div class="col-sm-3 healthy pddright0">
        <input  type="text" class="form-control" data-rule-required="true" data-msg-required="请填写前囟值." name="bregma"  placeholder="请输入前囟数值" />
    </div>
    <div class="col-sm-1 healthy pddleft0">
        <span class="mt10">&nbsp;cm<sup>2</sup></span>
    </div>
    <div class="col-sm-6 type-radio">
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写前囟显示结果." name="bregma_result" value="1" aria-required="true">&nbsp;正常</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写前囟显示结果." name="bregma_result" value="2" aria-required="true">&nbsp;膨隆</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写前囟显示结果." name="bregma_result" value="3" aria-required="true">&nbsp;凹陷</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写前囟显示结果." name="bregma_result" value="4" aria-required="true">&nbsp;其他</label>
        <label>
            <input type="text" class="form-control" name="bregma_result_other" placeholder="请输入其他情况" style="width:200px;height:34px;">
        </label>
    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">眼睛</label>
    <div class="col-sm-10 type-radio_multi">
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="eye" id="eye" value="1" aria-required="true">&nbsp;未见异常 </label>
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="eye" id="eye" value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
        <label>
            &nbsp;&nbsp;&nbsp;<span>四肢活动度</span>
            <label class="label_color" style="font-weight: initial;"><input type="radio"  data-rule-required="true" data-msg-required="未填写." name="limb_mobility" value="1" aria-required="true">&nbsp;未见异常 </label>
            <label class="label_color" style="font-weight: initial;"><input type="radio"  data-rule-required="true" data-msg-required="未填写." name="limb_mobility"  value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
        </label>
        <label>
            &nbsp;&nbsp;&nbsp;<span>耳外观</span>
            <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="ear" value="1" aria-required="true">&nbsp;未见异常 </label>
            <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="ear" value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
        </label>
        <label>
            &nbsp;&nbsp;&nbsp;<span>颈部包块</span>
            <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="cervical_mass"  value="1" aria-required="true">&nbsp;无 </label>
            <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="cervical_mass"  value="2" aria-required="true">&nbsp;有</label>
        </label>

    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">鼻</label>
    <div class="col-sm-10 type-radio_multi">
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
            <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="mouth"  value="1" aria-required="true">&nbsp;未见异常 </label>
            <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="mouth"  value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
        </label>
        <label>
            &nbsp;&nbsp;&nbsp;<span>肛门</span>
            <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="portal_fissure"  value="1" aria-required="true">&nbsp;未见异常 </label>
            <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="portal_fissure"  value="2" aria-required="true">&nbsp;异常</label>
        </label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">心肺听诊</label>
    <div class="col-sm-10type-radio_multi">
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="cardiopulmonary_auscultation"  value="1" aria-required="true">&nbsp;未见异常 </label>
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="cardiopulmonary_auscultation"  value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
        <label>
            &nbsp;&nbsp;&nbsp;<span>胸部</span>
            <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="chest" id="chest" value="1" aria-required="true">&nbsp;未见异常 </label>
            <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="chest" id="chest" value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
        </label>
        <label>
            &nbsp;&nbsp;&nbsp;<span>腹部触诊</span>
            <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="abdominal_touch" value="1" aria-required="true">&nbsp;未见异常 </label>
            <label class="label_color" style="font-weight: initial;"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="abdominal_touch" value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
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
    <div class="col-sm-10 type_radio">
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="aedea"  value="1" aria-required="true">&nbsp;未见异常 </label>
        <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="未填写." name="aedea"  value="2" aria-required="true">&nbsp;异常</label>&nbsp;&nbsp;&nbsp;
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">脐带</label>
    <div class="col-sm-10 type-checkbox" style="margin-top:-2px;">
        <label class="label_color"><input type="checkbox"  data-rule-required="true" data-msg-required="请填写脐带情况." name="umbilical_cord[]"  value="1" aria-required="true">&nbsp;未脱 </label>
        <label class="label_color"><input type="checkbox"  data-rule-required="true" data-msg-required="请填写脐带情况." name="umbilical_cord[]"  value="2" aria-required="true">&nbsp;脱落</label>
        <label class="label_color"><input type="checkbox"  data-rule-required="true" data-msg-required="请填写脐带情况." name="umbilical_cord[]"  value="3" aria-required="true">&nbsp;脐部有渗出</label>&nbsp;&nbsp;&nbsp;
        <label class="label_color"><input type="checkbox"  data-rule-required="true" data-msg-required="请填写脐带情况." name="umbilical_cord[]"  value="4" aria-required="true">&nbsp;其他</label>
        <label>
            <input type="text" class="form-control" name="umbilical_cord_other" placeholder="请输入其他情况" />
        </label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">转诊建议</label>
    <div class="col-sm-1 healthy pddright0 type_radio" style="margin-top: 2px;">
        <label class="label_color"><input type="radio"  name="referral_recommendations"  value="1" aria-required="true">&nbsp;无 </label>
        <label class="label_color"><input type="radio"  name="referral_recommendations"  value="2" aria-required="true">&nbsp;有</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-sm-1 healthy pddleft0" style="width:45px;">
        <span class="mt10" style="width:45px;">&nbsp;&nbsp;&nbsp;原因</span>
    </div>
    <div class="col-sm-3 healthy pddright0">
        <input  type="text" class="form-control"  name="referral_reason"  placeholder="请输入转诊原因" />
    </div>
    <div class="col-sm-1 healthy pddleft0" style="width:94px;">
        <span class="mt10" style="width:94px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机构及科室</span>
    </div>
    <div class="col-sm-3 healthy pddright0">
        <input  type="text" class="form-control"  name="referral_department"  placeholder="请输入转诊机构及科室" />
    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">指导</label>
    <div class="col-sm-10 type-checkbox" style="margin-top:-2px;">
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写指导情况." name="guide[]" value="1" aria-required="true">&nbsp;喂养指导</label>
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写指导情况." name="guide[]" value="2" aria-required="true">&nbsp;发育指导</label>
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写指导情况." name="guide[]" value="3" aria-required="true">&nbsp;防病指导</label>
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写指导情况." name="guide[]" value="4" aria-required="true">&nbsp;预防伤害指导</label>
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写指导情况." name="guide[]" value="5" aria-required="true">&nbsp;口腔保健指导</label>
        <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写指导情况." name="guide[]" value="6" aria-required="true">&nbsp;其它</label>
        <label>
            <input type="text" class="form-control" name="guide_other" id="guide_other" placeholder="请输入其他情况" />
        </label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">本次访视日期</label>
    <div class="col-sm-4">
        <div class="input-group date">
            <input data-rule-required="true" data-msg-required="请填写本次访视日期."  class="form-control" placeholder="请输入本次访视日期" readonly="true" name="visited_at" type="text" aria-required="true">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">下次随访地点</label>
    <div class="col-sm-10">
        <label><input type="text" data-rule-required="true" data-msg-required="请填写下次随访地点." class="form-control" name="next_visit_place"  placeholder="请输入下次随访地点" ></label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">下次随访日期</label>
    <div class="col-sm-4">
        <div class="input-group date">
            <input data-rule-required="true" data-msg-required="请填写下次随访日期."   class="form-control" placeholder="请输入下次随访日期" readonly="true" name="next_visited_at" type="text" aria-required="true">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">随访医生签名</label>
    <div class="col-sm-10">
        <label><input type="text" data-rule-required="true" data-msg-required="请填写随访医生签名." class="form-control"  name="doctor_name" placeholder="请输入随访医生签名" ></label>
    </div>
</div>

        <div class="box-footer">
            <div class="form-actions col-sm-10 col-sm-offset-2">
                @if(!$showOnly)
                    <input type="submit" value="提交" class="btn btn-primary"/>
                @endif
                <a href="javascript:history.back()" class="btn btn-default">返回</a>
            </div>
        </div>
    </form>
</div>


@push('js')
<script>

    var showOnly = "{{ $showOnly }}" || false;
        if(showOnly) {
            $('input').attr('disabled', true);
        }

    var data = '{!! $data?json_encode($data,JSON_UNESCAPED_UNICODE):'' !!}';
    var archive = '{!! $archive?json_encode($archive,JSON_UNESCAPED_UNICODE):'' !!}';
    if(data != '') {
        data = JSON.parse(data);
        $(':text').each(function(index,el){
           var inputName = $(this).attr('name');
            if(data[inputName]){
                $(this).val(data[inputName]);
            }
        });
        $(':radio').each(function(index,el){
           var radioName = $(this).attr('name');
            if(data[radioName]){
                $(':radio[name='+radioName+'][value='+data[radioName]+']').prop('checked',true);
            }
        });
        $('.type-checkbox').each(function(index,el){
           var checkboxName = $(this).find(':checkbox').eq(0).attr('name');
            var point = checkboxName.indexOf('[');
            var boxName = checkboxName.substr(0,point);
            if(data[boxName]){
                $.each(data[boxName],function(i,v){
                    $(':checkbox[name="'+checkboxName+'"][value='+v+']').prop('checked',true);

                })
            }
        });
    }

    if(archive != ''){
        archive = JSON.parse(archive);
        $('[name=real_name]').val(archive.real_name);
        $('[name=sex][value='+archive.sex+']').prop('checked',true);
        $('[name=birthday]').val(archive.birthday);
        $('[name=id_code]').val(archive.id_code);
        $('[name=address]').val(archive.address);
    }
    $(".date").datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true,
        'language': 'zh-CN'
    });
    $(function(){

    })
    var map = {
        'midwifery_mode[]':7,
        'deformity':2,
        'disease_screening[]':5,
        'color_face':3,
        'umbilical_cord[]':4,
        'referral_recommendations':2,
        'guide[]':6,
        'bregma_result':4
    };
    $.each(map,function(key,value){
        var point = key.indexOf('[');
        var other_name = key+'_other';
        if(point>0){
            var filterKey = key.substr(0,point);
            other_name = filterKey+'_other';
            var checkObj = $('input[name="'+key+'"][value="'+value+'"]');
            $(checkObj).on('click',function(){
                if($(this).is(':checked')){
                    $('[name='+other_name+']').removeAttr('disabled');
                }else {
                    $('[name='+other_name+']').attr('disabled',true);
                    $('[name='+other_name+']').val('');

                }
            })
        }else {
            var checkObj = $('input[name="'+key+'"]');
            $(checkObj).on('click',function(){
                if($(this).val() == value){
                    $('[name='+other_name+']').removeAttr('disabled');
                }else {
                    $('[name='+other_name+']').attr('disabled',true);
                    $('[name='+other_name+']').val('');

                }
            })
        }
       if(!$('input[name="'+key+'"][value="'+value+'"]').is(':checked')){
           $('[name="'+other_name+'"]').val('');
           $('[name="'+other_name+'"]').attr('disabled',true);
       }


    });

    if(!$('[name="referral_recommendations"][value="2"]').is(':checked')){
        $('[name=referral_reason]').attr('disabled',true);
        $('[name=referral_department]').attr('disabled',true);
        $('[name=referral_reason]').val('');
        $('[name=referral_department]').val('');
    }
    $('input[name="referral_recommendations"]').on('click',function(){
        if($(this).val() == 2){
            $('[name="referral_reason"]').removeAttr('disabled');
            $('[name="referral_department"]').removeAttr('disabled');
        }else {
            $('[name="referral_reason"]').attr('disabled',true);
            $('[name="referral_department"]').attr('disabled',true);
            $('[name="referral_reason"]').val('');
            $('[name="referral_department"]').val('');
        }
    });

    if($('[name=feeding_patterns]:checked').val() != 3){
        $('[name=feeding_amount]').val('');
        $('[name=feeding_amount]').attr('disabled',true);
    }else {
        $('[name=feeding_amount]').removeAttr('disabled');
    }
    $('[name=feeding_patterns]').on('click',function(){
        if($(this).val() == 3){
            $('[name=feeding_amount]').removeAttr('disabled');
        }else {
            $('[name=feeding_amount]').val('');
            $('[name=feeding_amount]').attr('disabled',true);
        }
    })




</script>
@endpush