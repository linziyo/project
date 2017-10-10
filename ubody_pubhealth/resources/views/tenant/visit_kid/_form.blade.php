<div class="box box-primary">
    <form class="form-horizontal"  action="{{ $actionUrl }}" method="post">
        <input type="hidden" name="archive_id" value="{{ $archive_id }}">
        @if(str_contains(route::currentRouteName(),'edit'))
        {!! method_field('PUT') !!}
        @endif
        {{ csrf_field() }}

<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">姓名</label>
    <div class="col-sm-4">
        <input data-rule-required="true" data-msg-required="请填写姓名." id="real_name" class="form-control" placeholder="请输入姓名" name="real_name" type="text" aria-required="true" readonly value="{{ $real_name }}">
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">月龄/随访日期</label>
    <div class="col-sm-6">
        <select name="month" class="col-sm-4">
            <option value="1">满月</option>
            <option value="3">3月龄</option>
            <option value="6">6月龄</option>
            <option value="8">8月龄</option>
            <option value="12">12月龄</option>
            <option value="18">18月龄</option>
            <option value="24">24月龄</option>
            <option value="30">30月龄</option>
            <option value="36">3 岁</option>
            <option value="48">4 岁</option>
            <option value="60">5 岁</option>
            <option value="72">6 岁</option>
        </select>
        <div class="input-group date">
            <input data-rule-required="true" data-msg-required="请填写随访日期." id="" class="form-control" placeholder="请输入随访日期" readonly="true" name="visited_at" type="text" aria-required="true">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">体重</label>
    <div class="col-sm-2 healthy pddright0">
        <input type="text" data-rule-required="true" data-msg-required="请填写体重(kg)." class="form-control" name="weight" id="" placeholder="请输入体重(kg) " />
        <input type="radio" name="weight_level" value="1"/>上<input type="radio" name="weight_level" value="2"/>中<input type="radio" name="weight_level" value="3"/>下
    </div>
    <div class="col-sm-1 healthy pddleft0">
        <span class="mt10">&nbsp;kg</span>
    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">身高</label>
    <div class="col-sm-2 healthy pddright0">
        <input type="text" data-rule-required="true" data-msg-required="请填写身高(cm)." class="form-control" name="height" id="" placeholder="请输入身高(cm) " />
        <input type="radio" name="height_level" value="1"/>上<input type="radio" name="height_level" value="2"/>中<input type="radio" name="height_level" value="3"/>下
    </div>
    <div class="col-sm-1 healthy pddleft0">
        <span class="mt10">&nbsp;cm</span>
    </div>
    <div class="clear"></div>
</div>
<div class="form-group" >
    <div id="wrapper">
        <!--各个阶段年龄-->
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">两次随机访问患病情况</label>
    <div class="col-sm-10">
        <label class="label_color"><input type="checkbox"  name="random_access[]" value="1" aria-required="true">&nbsp;无 </label>
        <br/><label class="label_color"><input type="checkbox"  name="random_access[]" value="2" aria-required="true">&nbsp;肺炎</label>
        <label>
            <input type="text" class="form-control" name="random_access_content_2" id="" placeholder="若有，请输入肺炎次数"  >
        </label>
        <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">次</p></label>
        <label class="label_color"><input type="checkbox"  name="random_access[]" value="3" aria-required="true">&nbsp;腹泻</label>
        <label>
            <input type="text" class="form-control" name="random_access_content_3" id="" placeholder="若有，请输入腹泻次数"  >
        </label>
        <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">次</p></label>
        <br/><label class="label_color"><input type="checkbox"  name="random_access[]" value="4" aria-required="true">&nbsp;外伤 </label>
        <label>
            <input type="text" class="form-control" name="random_access_content_4" id="" placeholder="若有，请输入外伤次数"  >
        </label>
        <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">次</p></label>
        <label class="label_color"><input type="checkbox"  name="random_access[]" value="5" aria-required="true">&nbsp;其他</label>
        <label>
            <input type="text" class="form-control" name="random_access_content_5" id="" placeholder="请输入其它情况" >
        </label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">转诊建议</label>
    <div class="col-sm-1 healthy pddright0" style="margin-top: 2px;">
        <label class="label_color"><input type="radio"  name="referral_recommendations"  id="" value="1" aria-required="true">&nbsp;无 </label>
        <label class="label_color"><input type="radio"  name="referral_recommendations"  id="" value="2" aria-required="true">&nbsp;有</label>
    </div>
    <div class="col-sm-1 healthy pddleft0" style="width:48px;margin-top:-2px;">
        <span class="mt10" style="width:48px;">&nbsp;&nbsp;&nbsp;原因</span>
    </div>
    <div class="col-sm-3 healthy pddright0">
        <input  type="text" class="form-control"  name="referral_recommendations_reason" id="" placeholder="请输入转诊原因" />
    </div>
    <div class="col-sm-1 healthy pddleft0" style="width:94px;margin-top:-2px;">
        <span class="mt10" style="width:94px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机构及科室</span>
    </div>
    <div class="col-sm-3 healthy pddright0">
        <input  type="text" class="form-control"  name="referral_recommendations_office" id="" placeholder="请输入转诊机构及科室" />
    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">指导</label>
    <div id="wrapper1">
        <!--各年龄阶段的指导-->
    </div>

</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">下次随访日期</label>
    <div class="col-sm-4">
        <div class="input-group date">
            <input data-rule-required="true" data-msg-required="请填写下次随访日期." id="" class="form-control" placeholder="请输入随访日期" readonly="true" name="next_visited_at" type="text" aria-required="true">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">随访医生签名</label>
    <div class="col-sm-10">
        <label><input type="text" data-rule-required="true" data-msg-required="请填写随访医生签名." class="form-control" id="" name="doctor_name" placeholder="请输入随访医生签名" disabled></label>
    </div>
</div>

@include('tenant.visit_kid._kid_month_1')
@include('tenant.visit_kid._kid_month_3')
@include('tenant.visit_kid._kid_month_6')
@include('tenant.visit_kid._kid_month_8')
@include('tenant.visit_kid._kid_month_12')
@include('tenant.visit_kid._kid_month_18')
@include('tenant.visit_kid._kid_month_24')
@include('tenant.visit_kid._kid_month_30')
@include('tenant.visit_kid._kid_month_36')
@include('tenant.visit_kid._kid_month_48')
@include('tenant.visit_kid._kid_month_60')
@include('tenant.visit_kid._kid_month_72')

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
<script type="text/javascript">

    var showOnly = "{{ $showOnly }}" || false;
        if(showOnly) {
            $('input').attr('disabled', true);
        }

    var fillTemplate = function(val) {
        switch(val){
            case '1':

                $("#wrapper").html($("#kids_month_1").html());
                $("#wrapper1").html($("#kid_month_1").html());
                break;
            case '3':
                $("#wrapper").html($("#kids_month_3").html());
                $("#wrapper1").html($("#kid_month_3").html());
                break;
            case '6':
                $("#wrapper").html($("#kids_month_6").html());
                $("#wrapper1").html($("#kid_month_6").html());
                break;
            case '8':
                $("#wrapper").html($("#kids_month_8").html());
                $("#wrapper1").html($("#kid_month_8").html());
                break;
            case '12':
                $("#wrapper").html($("#kids_month_12").html());
                $("#wrapper1").html($("#kid_month_12").html());
                break;
            case '18':
                $("#wrapper").html($("#kids_month_18").html());
                $("#wrapper1").html($("#kid_month_18").html());
                break;
            case "24":
                $("#wrapper").html($("#kids_month_24").html());
                $("#wrapper1").html($("#kid_month_24").html());
                break;
            case "30":
                $("#wrapper").html($("#kids_month_30").html());
                $("#wrapper1").html($("#kid_month_30").html());
                break;
            case "36":
                $("#wrapper").html($("#kids_month_36").html());
                $("#wrapper1").html($("#kid_month_36").html());
                break;
            case "48":
                $("#wrapper").html($("#kids_month_48").html());
                $("#wrapper1").html($("#kid_month_48").html());
                break;
            case "60":
                $("#wrapper").html($("#kids_month_60").html());
                $("#wrapper1").html($("#kid_month_60").html());
                break;
            case "72":
                $("#wrapper").html($("#kids_month_72").html());
                $("#wrapper1").html($("#kid_month_72").html());
                break;
        }
        if(showOnly) {
            $('input').attr('disabled', true);
        }
    }

    var data = '{!! !empty($data)?json_encode($data,JSON_UNESCAPED_UNICODE):'' !!}';
    if(data != '')
    {
        data = JSON.parse(data);
        $('select[name=month]').attr('disabled',true);
        $('select[name=month]').val(data.month);
        fillTemplate($('select[name=month]').val());
        $('select[name=age][value='+data.month+']').prop('checked',true);
        $('[name=visited_at]').val(data.visited_at);
        $('[name=weight]').val(data.weight.weight);
        $('[name=weight_level][value='+data.weight.weight_level+']').prop('checked',true);
        $('[name=height]').val(data.height.height);
        $('[name=height_level][value='+data.height.height_level+']').prop('checked',true);
        $('[name=head_size]').val(data.head_size);
        $('[name=face_color][value='+data.face_color+']').prop('checked',true);
        $('[name=skin][value='+data.skin+']').prop('checked',true);
        $('[name=bregma][value='+data.bregma.bregma+']').prop('checked',true);
        $('[name=bregma_width]').val(data.bregma.bregma_width);
        $('[name=bregma_height]').val(data.bregma.bregma_height);
        $('[name=cervical_mass][value='+data.cervical_mass+']').prop('checked',true);
        $('[name=eye][value='+data.eye+']').prop('checked',true);
        $('[name=ear][value='+data.ear+']').prop('checked',true);
        if(data.month == 1 || data.month ==3){
            $('[name=mouth][value='+data.mouth+']').prop('checked',true);
        }else {
            $('[name=mouth]').val(data.mouth);
        }
        $('[name=chest][value='+data.chest+']').prop('checked',true);
        $('[name=hearing][value='+data.hearing+']').prop('checked',true);
        $('[name=abdomen][value='+data.abdomen+']').prop('checked',true);
        $('[name=navel][value='+data.navel+']').prop('checked',true);
        $('[name=limb_mobility][value='+data.limb_mobility+']').prop('checked',true);

        $('[name=hemoglogin]').val(data.aedea);
        $('[name=outdoor_activity]').val(data.outdoor_activity);
        $('[name=intake_vitamin_d]').val(data.intake_vitamin_d);

        $('[name=aedea][value='+data.aedea+']').prop('checked',true);
        $.each(data.disease_between_visit,function(i,el){
            $('[name="random_access[]"][value='+el.random_access+']').prop('checked',true);
            if(el.random_access != 1){
                var key = 'random_access_content_'+el.random_access;
                $('[name='+key+']').val(el.random_access_content);
            }
        });
        $('[name=referral_recommendations][value='+data.referral_recommendations.referral_recommendations+']').prop('checked',true);
        $('[name=referral_recommendations_reason]').val(data.referral_recommendations.referral_recommendations_reason);
        $('[name=referral_recommendations_office]').val(data.referral_recommendations.referral_recommendations_office);

        $.each(data.guide,function(i,el){
            $('[name="guide[]"][value='+el.guide+']').prop('checked',true);
            if(el.guide==6){
                $('[name=guide_other]').val(el.guide_other);
            }
        });
        $('[name=guide][value='+data.guide.guide+']').prop('checked',true);
        if(data.guide.guide == 6) {
            $('[name=guide_other]').val(data.guide.guide_other);
        }
        $('[name=next_visited_at]').val(data.next_visited_at);
        $('[name=doctor_name]').val(data.doctor_name);

        $('[name=tooth]').val(data.tooth);
        if(data.rickets_symptom.length>0){
            $.each(data.rickets_symptom,function(i,el){
                $('[name="rickets_symptom[]"][value='+el+']').prop('checked',true);
            })
        }
        if(data.rickets_sign.length>0) {
            $.each(data.rickets_sign,function(i,el){
                $('[name="rickets_sign[]"][value='+el+']').prop('checked',true);
            })
        }
        if(data.grow_assessment.length>0){
            $.each(data.grow_assessment,function(i,el){
                $('[name="grow_assessment[]"][value='+el+']').prop('checked',true);
            })
        }
        $('[name=body_assessment][value='+data.body_assessment+']').prop('checked',true);
        $('[name=hemoglobin]').val(data.hemoglobin);
        $('[name=gait][value='+data.gait+']').prop('checked',true);
        $('[name=body_mark]').val(data.body_mark);
        $('[name=vision]').val(data.vision);

        weight_height_ratio();

    }else {
        fillTemplate($('select[name=month]').val());
    }



    $(function () {
        $("select[name=month]").change(function(){
            var val = $(this).val();
            fillTemplate(val);
        })

        $('[name=doctor_name]').val('{{ $doctor_name }}');
        $('[name=doctor_name]').attr('readonly',true);
        $(".date").datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            'language': 'zh-CN'
        });



    });

    $('[name="random_access[]"]').on('click',function(){
        if($(this).val()==1){
            if($(this).is(':checked')){
                $('[name="random_access[]"][value!=1]').prop('checked',false);
                $(this).parent().parent().find(':text').attr('disabled',true);
                $(this).parent().parent().find(':text').val('');
            }else {
                $(this).parent().parent().find(':text').removeAttr('disabled');
            }
        }else {
            $(this).parent().parent().find(':text').removeAttr('disabled');
        }
    });
    $('[name=referral_recommendations]').on('click',function(){
        if($(this).val()==1){
            $('[name=referral_recommendations_reason]').val('');
            $('[name=referral_recommendations_office]').val('');
            $('[name=referral_recommendations_reason]').attr('disabled',true);
            $('[name=referral_recommendations_office]').attr('disabled',true);
        }else {
            $('[name=referral_recommendations_reason]').removeAttr('disabled');
            $('[name=referral_recommendations_office]').removeAttr('disabled');
        }
    });

    $('[name=weight],[name=height]').on('change',function(){
            weight_height_ratio();
    });

    var weight_height_ratio = function(){
        var weight = $('[name=weight]').val();
        var height = $('[name=height]').val();
        if(isNaN(weight) || isNaN(height) || !weight || !height){
            $('[name=weight_height]').val('');
        }else {
            var ratio = parseInt(weight)/parseInt(height);
            $('[name=weight_height]').val(ratio.toFixed(2));
        }
    }


</script>
@endpush