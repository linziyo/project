
<script type="text/template" id="kid_month_18">
    @include('tenant.visit_kid._guide_small')
</script>
<script type="text/template" id="kids_month_18">
    <label for="exampleInputName2" class="col-sm-2 control-label">体格检查</label>
    <div class="col-sm-10">
        <label for="exampleInputName2" class="mianse">面色&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写面色." type="radio" name="face_color" id="" value="1" aria-required="true">&nbsp;红润 </label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写面色." type="radio" name="face_color" id="" value="3" aria-required="true">&nbsp;其他</label><br />
        <label for="exampleInputName2" class="">皮肤&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写皮肤." type="radio" name="skin" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写皮肤." type="radio" name="skin" id="" value="2" aria-required="true">&nbsp;异常</label><br />
        <label for="exampleInputName2" class="">前卤&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写前卤." type="radio" name="bregma" id="" value="1" aria-required="true">&nbsp;闭合</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写前卤." type="radio" name="bregma" id="" value="2" aria-required="true">&nbsp;未闭 </label>
        <label>
            <input type="text" class="label_color" name="bregma_width"/>cm&nbsp;x&nbsp;cm<input type="text" class="label_color" name="bregma_height"/>
        </label><br />
        <label for="exampleInputName2" class="">眼睛&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写眼睛." type="radio" name="eye" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写眼睛." type="radio" name="eye" id="" value="2" aria-required="true">&nbsp;异常</label><br />
        <label for="exampleInputName2" class="">耳外观&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写耳外观." type="radio" name="ear" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写耳外观." type="radio" name="ear" id="" value="2" aria-required="true">&nbsp;异常</label><br />
        <label for="exampleInputName2" class="">听力&nbsp;</label>
        <label class="label_color">— — — —</label><br />
        <label for="exampleInputName2" class="">出牙/龋齿数（颗）&nbsp;</label>
        <label>
            <input type="text" class="form-control" id="" placeholder="请输入出牙/龋齿数（颗）" name="tooth">
        </label>
        <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">颗</sup></p></label><br />
        <label for="exampleInputName2" class="">胸部&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写胸部." type="radio" name="chest" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写胸部." type="radio" name="chest" id="" value="2" aria-required="true">&nbsp;异常</label><br />
        <label for="exampleInputName2" class="">腹部&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写腹部." type="radio" name="abdomen" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写腹部." type="radio" name="abdomen" id="" value="2" aria-required="true">&nbsp;异常</label><br />
        <label for="exampleInputName2" class="">四肢&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写四肢." type="radio" name="limb_mobility" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写四肢." type="radio" name="limb_mobility" id="" value="2" aria-required="true">&nbsp;异常</label><br />
        <label for="exampleInputName2" class="">步态&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写步态." type="radio" name="gait" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写步态." type="radio" name="gait" id="" value="2" aria-required="true">&nbsp;异常</label><br />
        <label for="exampleInputName2" class="">可疑佝偻病体征&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写可疑佝偻病体征." type="checkbox" name="rickets_sign[]" id="" value="1" aria-required="true">&nbsp;无</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写可疑佝偻病体征." type="checkbox" name="rickets_sign[]" id="" value="2" aria-required="true">&nbsp;肋串珠</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写可疑佝偻病体征." type="checkbox" name="rickets_sign[]" id="" value="3" aria-required="true">&nbsp;肋软骨沟</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写可疑佝偻病体征." type="checkbox" name="rickets_sign[]" id="" value="4" aria-required="true">&nbsp;鸡胸</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写可疑佝偻病体征." type="checkbox" name="rickets_sign[]" id="" value="5" aria-required="true">&nbsp;手足镯</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写可疑佝偻病体征." type="checkbox" name="rickets_sign[]" id="" value="6" aria-required="true">&nbsp;“O”型腿</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写可疑佝偻病体征." type="checkbox" name="rickets_sign[]" id="" value="7" aria-required="true">&nbsp;“X”型腿</label><br />
    </div>
    <div class="form-group">
        <label for="exampleInputName2" class="col-sm-2 control-label" style="margin-left: 10px;"></label>
        <div class="col-sm-1 healthy pddright0" style="width:91px;">
            <span class="mt10" style="width:91px;">&nbsp;血红蛋白值</span>
        </div>
        <div class="col-sm-2 healthy pddright0">
            <input type="text" data-rule-required="true" data-msg-required="请填写血红蛋白." class="form-control" name="hemoglobin" id="" placeholder="请输入血红蛋白质 " />
        </div>
        <div class="col-sm-1 healthy pddleft0">
            <span class="mt10">&nbsp;g/L</span>
        </div>
        <div class="clear"></div>
    </div>
    <div class="form-group">
        <label for="exampleInputName2" class="col-sm-2 control-label" style="margin-left: 10px;">户外活动</label>
        <div class="col-sm-2 healthy pddright0">
            <input type="text" data-rule-required="true" data-msg-required="请填写户外活动." class="form-control" name="outdoor_activity" id="" placeholder="请输入户外活动时长 " />
        </div>
        <div class="col-sm-1 healthy pddleft0">
            <span class="mt10">&nbsp;小时/日</span>
        </div>
        <div class="clear"></div>
    </div>
    <div class="form-group">
        <label for="exampleInputName2" class="col-sm-2 control-label" style="margin-left: 10px;">服用维生素D</label>
        <div class="col-sm-2 healthy pddright0">
            <input type="text" data-rule-required="true" data-msg-required="请填写服用维生D." class="form-control" name="intake_vitamin_d" id="" placeholder="请输入服用维生D量 " />
        </div>
        <div class="col-sm-1 healthy pddleft0">
            <span class="mt10">&nbsp;IU/日</span>
        </div>
        <div class="clear"></div>
    </div>
    <div class="form-group">
        <label for="exampleInputName2" class="col-sm-2 control-label" style="margin-left: 10px;">发育评估</label>
        <div class="col-sm-8 healthy pddright0" style="margin-top: 3px;">
            <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写发育评估." name="grow_assessment[]" id="" value="1">不会有意识叫“爸爸”或“妈妈”</label>
            <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写发育评估." name="grow_assessment[]" id="" value="2">不会按要求指人或物</label>
            <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写发育评估." name="grow_assessment[]" id="" value="3">与人无目光交流</label>
            <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写发育评估." name="grow_assessment[]" id="" value="4">不会独走</label>
        </div>
    </div>
</script>
