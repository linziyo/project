<script type="text/template" id="kid_month_48">
    @include('tenant.visit_kid._guide_large')
</script>
<script type="text/template" id="kids_month_48">
    <div class="form-group">
        <label for="exampleInputName2" class="col-sm-2 control-label" style="margin-left: 10px;">体重/身高</label>
        <div class="col-sm-2 healthy pddright0">
            <input type="text" data-rule-required="true" data-msg-required="请填写体重/身高." class="form-control" name="weight_height" id="" placeholder="请输入体重/身高" />
        </div>
        <div class="clear"></div>
    </div>
    <div class="form-group">
        <label for="exampleInputName2" class="col-sm-2 control-label" style="margin-left: 10px;">体格发育评价</label>
        <div class="col-sm-8 " style="margin-top: 3px;">
            <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写体格发育评价." name="body_assessment" id="" value="1">&nbsp;正常</label>
            <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写体格发育评价." name="body_assessment" id="" value="2">&nbsp;低体重</label>
            <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写体格发育评价." name="body_assessment" id="" value="3">&nbsp;消瘦</label>
            <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写体格发育评价." name="body_assessment" id="" value="4">&nbsp;生长迟缓 </label>
            <label class="label_color"><input type="radio" data-rule-required="true" data-msg-required="请填写体格发育评价." name="body_assessment" id="" value="5">&nbsp;超重</label>
        </div>
    </div>
    <label for="exampleInputName2" class="col-sm-2 control-label">体格检查</label>
    <div class="col-sm-10">
        <label >
            <input data-rule-required="true" data-msg-required="请填写视力." type="text" class="form-control" name="vision" id="" placeholder="请输入视力" >
        </label><br />
        <label>听力</label>
        <label class="label_color">— —  — —</label><br />
        <label for="exampleInputName2" class="">牙数（颗）/龋齿数&nbsp;</label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写牙数（颗）/龋齿数." type="text" class="form-control" name="tooth" id="" placeholder="请输入牙数（颗）/龋齿数" >
        </label><br />
        <label for="exampleInputName2" class="">胸部</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写胸部." type="radio" name="chest" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写胸部." type="radio" name="chest" id="" value="2" aria-required="true">&nbsp;异常</label><br />
        <label for="exampleInputName2" class="">腹部</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写肺部." type="radio" name="abdomen" id="" value="1" aria-required="true">&nbsp;未见异常</label>
        <label class="label_color"><input data-rule-required="true" data-msg-required="请填写肺部." type="radio" name="abdomen" id="" value="2" aria-required="true">&nbsp;异常</label><br />
    </div>
    <div class="form-group">
        <label for="exampleInputName2" class="col-sm-2 control-label"></label>
        <div class="col-sm-1 healthy pddleft0" style="width:102px;">
            <span class="mt10" style="width:102px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;血红蛋白值*</span>
        </div>
        <div class="col-sm-2 healthy pddright0">
            <input type="text" data-rule-required="true" data-msg-required="请填写血红蛋白." class="form-control" name="hemoglobin" id="" placeholder="请输入血红蛋白(g/L) " />
        </div>
        <div class="col-sm-1 healthy pddleft0">
            <span class="mt10">&nbsp;g/L</span>
        </div>
        <div class="clear"></div>
    </div>
    <div class="form-group">
        <label for="exampleInputName2" class="col-sm-2 control-label"></label>
        <div class="col-sm-1 healthy pddleft0" style="width:52px;">
            <span class="mt10" style="width:52px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;其它</span>
        </div>
        <div class="col-sm-2 healthy pddright0">
            <input type="text" data-rule-required="true" data-msg-required="请填写其它情况." class="form-control" name="body_mark" id="" placeholder="请输入其它情况" />
        </div>
        <div class="clear"></div>
    </div>
    <div class="form-group">
        <label for="exampleInputName2" class="col-sm-2 control-label" style="margin-left: 10px;">发育评估</label>
        <div class="col-sm-8 healthy pddright0" style="margin-top: 3px;">
            <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写发育评估." name="grow_assessment[]" id="" value="1">不会说带形容词的句子</label>
            <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写发育评估." name="grow_assessment[]" id="" value="2">不能按要求等待或轮流</label>
            <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写发育评估." name="grow_assessment[]" id="" value="3">不会独立穿衣</label>
            <label class="label_color"><input type="checkbox" data-rule-required="true" data-msg-required="请填写发育评估." name="grow_assessment[]" id="" value="4">不会单脚站立</label>
        </div>
    </div>
</script>