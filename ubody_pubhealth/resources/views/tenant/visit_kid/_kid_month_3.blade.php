<script type="text/template" id="kid_month_3">
    @include('tenant.visit_kid._guide_small')
</script>
<script type="text/template" id="kids_month_3">
    <div class="form-group">
        <label for="exampleInputName2" class="col-sm-2 control-label" style="margin-left: 10px;">头围</label>
        <div class="col-sm-2 healthy pddright0">
            <input type="text" data-rule-required="true" data-msg-required="请填写头围(cm)." class="form-control" name="head_size" id="" placeholder="请输入头围(cm) " />
        </div>
        <div class="col-sm-1 healthy pddleft0">
            <span class="mt10">&nbsp;cm</span>
        </div>
        <div class="clear"></div>
    </div>
    <label for="exampleInputName2" class="col-sm-2 control-label">体格检查</label>
    <div class="col-sm-10">
        <label for="exampleInputName2" class="mianse">面色&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写面色." type="radio" name="face_color" id="" value="1" aria-required="true">&nbsp;红润 </label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写面色." type="radio" name="face_color" id="" value="2" aria-required="true">&nbsp;黄染</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写面色." type="radio" name="face_color" id="" value="3" aria-required="true">&nbsp;其他</label><br />
        <label for="exampleInputName2" class="">皮肤&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写皮肤." type="radio" name="skin" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写皮肤." type="radio" name="skin" id="" value="2" aria-required="true">&nbsp;异常</label>	<br />
        <label for="exampleInputName2" class="">前卤&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写前卤." type="radio" name="bregma" id="" value="1" aria-required="true">&nbsp;闭合</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写前卤." type="radio" name="bregma" id="" value="2" aria-required="true">&nbsp;未闭 </label>
        <label>
            <input type="text" class="label_color" name="bregma_width"/>cm&nbsp;x&nbsp;cm<input type="text" class="label_color" name="bregma_height"/>
        </label><br />
        <label for="exampleInputName2" class="">颈部包块&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写颈部包块." type="radio" name="cervical_mass" id="" value="1" aria-required="true">&nbsp;有</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写颈部包块." type="radio" name="cervical_mass" id="" value="2" aria-required="true">&nbsp;无</label><br />
        <label for="exampleInputName2" class="">眼睛&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写眼睛." type="radio" name="eye" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写眼睛." type="radio" name="eye" id="" value="2" aria-required="true">&nbsp;异常</label><br />
        <label for="exampleInputName2" class="">耳&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写耳." type="radio" name="ear" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写耳." type="radio" name="ear" id="" value="2" aria-required="true">&nbsp;异常</label><br />
        <label for="exampleInputName2" class="">听力&nbsp;</label>
        <label class="label_color">— — — —</label>		<br />
        <label for="exampleInputName2" class="">口腔&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写口腔." type="radio" name="mouth" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写口腔." type="radio" name="mouth" id="" value="2" aria-required="true">&nbsp;异常</label><br />
        <label for="exampleInputName2" class="">胸部&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写胸部." type="radio" name="chest" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写胸部." type="radio" name="chest" id="" value="2" aria-required="true">&nbsp;异常</label><br />
        <label for="exampleInputName2" class="">腹部&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写腹部." type="radio" name="abdomen" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写腹部." type="radio" name="abdomen" id="" value="2" aria-required="true">&nbsp;异常</label><br />
        <label for="exampleInputName2" class="">脐部&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写脐部." type="radio" name="navel" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写脐部." type="radio" name="navel" id="" value="2" aria-required="true">&nbsp;异常</label>	<br />
        <label for="exampleInputName2" class="">四肢&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写四肢." type="radio" name="limb_mobility" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写四肢." type="radio" name="limb_mobility" id="" value="2" aria-required="true">&nbsp;异常</label><br />
        <label for="exampleInputName2" class="">可疑佝偻病症状&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写可疑佝偻病症状." type="checkbox" name="rickets_symptom[]" id="" value="1" aria-required="true">&nbsp;无</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写可疑佝偻病症状." type="checkbox" name="rickets_symptom[]" id="" value="2" aria-required="true">&nbsp;夜惊</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写可疑佝偻病症状." type="checkbox" name="rickets_symptom[]" id="" value="3" aria-required="true">&nbsp;多汗</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写可疑佝偻病症状." type="checkbox" name="rickets_symptom[]" id="" value="4" aria-required="true">&nbsp;烦躁</label><br />
        <label for="exampleInputName2" class="">可疑佝偻病体征&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写可疑佝偻病体征." type="checkbox" name="rickets_sign[]" id="" value="1" aria-required="true">&nbsp;无</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写可疑佝偻病体征." type="checkbox" name="rickets_sign[]" id="" value="2" aria-required="true">&nbsp;颅骨软化</label><br />
        <label for="exampleInputName2" class="">肛门/外生殖器&nbsp;</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写外生殖器." type="radio" name="aedea" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写外生殖器." type="radio" name="aedea" id="" value="2" aria-required="true">&nbsp;异常</label><br />
        <label for="exampleInputName2" class="">血红蛋白值&nbsp;</label>
        <label class="label_color">— — — —</label>

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
            <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写发育评估." name="grow_assessment[]" id="" value="1">对很大声音没有反应</label>
            <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写发育评估." name="grow_assessment[]" id="" value="2">逗引时不发音或不会微笑</label>
            <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写发育评估." name="grow_assessment[]" id="" value="3">不注视人脸，不追视移动人或物品</label>
            <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写发育评估." name="grow_assessment[]" id="" value="4">俯卧时不会抬头</label>
        </div>
    </div>
</script>
