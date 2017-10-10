<div class="box box-primary">
    <form class="getForm" action="{{ $actionUrl?$actionUrl:'' }}" method="post" enctype="multipart/form-data" style="padding-bottom:60px; overflow: hidden; margin-top: 10px;">
        <input type="hidden" name="archive_id" value="{{$archive_id}}">
        @if(str_contains(route::currentRouteName(),'edit'))
        {!! method_field('PUT') !!}
        @endif
        {{ csrf_field() }}

        <div class="container">

<p>该表为自评表，根据下表中 5 个方面进行评估，将各方面判断评分汇总后，0～3 分者 为可自理；4～8 分者为轻度依赖；9～18 分者为中度依赖； ≥19 分者为不能自理。</p>
<div class="panel panel-default">
    <div class="panel-heading">
        <label for="name">评估事项、内容与评分与程度等级</label>
    </div>
    <div class="panel-body healthy">
                <span>
                    <label for="">进餐：使用餐具将饭菜送入口、咀嚼、吞咽等活动</label>
                </span>
        <br /><br />
        <div class="clear"></div>
        <label>
            <input data-rule-required="true" data-msg-required="请填写进餐自理能力." type="radio" name="meal" id="meal" value="1" score="0" aria-required="false" required/>&nbsp;可自理/独立完成(0分)
        </label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写进餐自理能力." type="radio" name="meal" id="meal" value="2" score="0" aria-required="false" />&nbsp;轻度依赖 /—(0分)
        </label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写进餐自理能力." type="radio" name="meal" id="meal" value="3" score="3" aria-required="false" />&nbsp;中度依赖 /需要协助，如切碎、搅拌食物等(3分)
        </label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写进餐自理能力." type="radio" name="meal" id="meal" value="4" score="5" aria-required="false" />&nbsp;不能自理/完全需要帮助(5分)
        </label>
        <input type="text" class="form-control" name="meal_num" data-name="one" id="meal_num" placeholder="请输入你要填写的分数" disabled="disabled" value="0"/>
    </div>

    <div class="panel-body healthy pddtop0">
                <span>
                    <label for="">梳洗：梳头、洗脸、刷牙、剃须、洗澡等活动</label>
                </span>
        <br /><br />
        <div class="clear"></div>
        <label>
            <input data-rule-required="true" data-msg-required="请填写梳洗自理能力." type="radio" name="comb_wash" id="comb_wash" value="1" score="0" aria-required="true" required/>&nbsp;可自理/独立完成(0分)
        </label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写梳洗自理能力." type="radio" name="comb_wash" id="comb_wash" value="2" score="1" aria-required="true" />&nbsp; 轻度依赖 /能独立地洗头、梳头、洗脸、刷牙、剃须等；洗澡需要协助 (1分)
        </label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写梳洗自理能力." type="radio" name="comb_wash" id="comb_wash" value="3" score="3" aria-required="true" />&nbsp;中度依赖 /在协助下和适当的时间内，能完成部分梳洗活动(3分)
        </label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写梳洗自理能力." type="radio" name="comb_wash" id="comb_wash" value="4" score="7" aria-required="true" />&nbsp;不能自理/完全需要帮助(7分)
        </label>
        <input type="text" class="form-control" name="comb_wash_num" data-name="one" id="comb_wash_num" placeholder="请输入你要填写的分数" disabled="disabled" value="0"/>
    </div>

    <div class="panel-body healthy pddtop0">
                <span>
                    <label for="">穿衣：穿衣裤、袜子、鞋子等活动</label>
                </span>
        <br /><br />
        <div class="clear"></div>
        <label>
            <input data-rule-required="true" data-msg-required="请填写穿衣自理能力." type="radio" name="dressing" id="dressing" value="1" score="0" aria-required="true" required/>&nbsp;可自理/独立完成(0分)
        </label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写穿衣自理能力." type="radio" name="dressing" id="dressing" value="2" score="0" aria-required="true" />&nbsp; 轻度依赖 /—(0分)
        </label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写穿衣自理能力." type="radio" name="dressing" id="dressing" value="3" score="3" aria-required="true" />&nbsp;中度依赖 /需要协助，在适当的时间内完成部分穿衣(3分)
        </label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写穿衣自理能力." type="radio" name="dressing" id="dressing" value="4" score="5" aria-required="true" />&nbsp;不能自理/完全需要帮助(5分)
        </label>
        <input type="text" class="form-control" name="dressing_num" data-name="one" id="dressing_num" placeholder="请输入你要填写的分数" disabled="disabled" value="0" />
    </div>

    <div class="panel-body healthy pddtop0">
                <span>
                    <label for="">如厕：小便、大便等活动及自控</label>
                </span>
        <br /><br />
        <div class="clear"></div>
        <label>
            <input data-rule-required="true" data-msg-required="请填写如厕自理能力." type="radio" name="toilets" id="toilets" value="1" score="0"  aria-required="true" required/>&nbsp;可自理/不需协助，可自控(0分)
        </label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写如厕自理能力." type="radio" name="toilets" id="toilets" value="2" score="1" aria-required="true" />&nbsp; 轻度依赖 /偶尔失禁，但基本上能如厕或使用便具(1分)
        </label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写如厕自理能力." type="radio" name="toilets" id="toilets" value="3" score="5" aria-required="true" />&nbsp;中度依赖 /经常失禁，在很多提示和协助下尚能如厕或使用便具(5分)
        </label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写如厕自理能力." type="radio" name="toilets" id="toilets" value="4" score="10" aria-required="true" />&nbsp;不能自理/完全失禁，完全需要帮助(10分)
        </label>
        <input type="text" class="form-control" name="toilets_num" data-name="one" id="toilets_num" placeholder="请输入你要填写的分数" disabled="disabled" value="0" />
    </div>

    <div class="panel-body healthy pddtop0">
                <span>
                    <label for="">活动：站立、室内行走、上下楼梯、户外活动</label>
                </span>
        <br /><br />
        <div class="clear"></div>
        <label>
            <input data-rule-required="true" data-msg-required="请填写活动自理能力." type="radio" name="activity" id="activity" value="1" score="0" aria-required="true" required/>&nbsp;可自理/独立完成所有活动(0分)
        </label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写活动自理能力." type="radio" name="activity" id="activity" value="2" score="1" aria-required="true" />&nbsp; 轻度依赖 /借助较小的外力或辅助装置能完成站立、行走、上下楼梯等(1分)
        </label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写活动自理能力." type="radio" name="activity" id="activity" value="3" score="5" aria-required="true" />&nbsp;中度依赖 /借助较大的外力才能完成站立、行走，不能上下楼梯(5分)
        </label>
        <label>
            <input data-rule-required="true" data-msg-required="请填写活动自理能力." type="radio" name="activity" id="activity" value="4" score="10" aria-required="true" />&nbsp;不能自理/卧床不起，活动完全需要帮助(10分)
        </label>
        <input type="text" class="form-control" name="activity_num" data-name="one" id="activity_num" placeholder="请输入你要填写的分数" disabled="disabled" value="0"/>
    </div>
    <div class="panel-body healthy pddtop0">
        <input type="text" class="form-control" name="total_num" id="total_num" placeholder="请输入全部相加的分数" disabled="disabled" />
    </div>
</div>

            <div class="box-footer">
                <div class="form-actions col-sm-10 col-sm-offset-2">
                    @if(!$showOnly)
                        <input type="submit" value="提交" class="btn btn-primary"/>
                    @endif
                    <a  href="javascript:void(history.back())" class="btn btn-default">返回</a>
                </div>
            </div>
        </div>

    </form>
    <div class="box-footer">
    </div>
</div>

@push('js')

<script>



    var data = '{!! $data?json_encode($data,JSON_UNESCAPED_UNICODE):'' !!}';
    if(data != ''){
        data = JSON.parse(data);
        var total = 0;
        $('.panel-body').each(function(index,el){
            if(index <5) {
                var radio_name = $(this).find(':radio').eq(0).attr('name');
                if (data[radio_name]) {
                    var radio_obj = $('input[name=' + radio_name + '][value=' + data[radio_name] + ']');
                    radio_obj.prop('checked', true);
                    var score = radio_obj.attr('score');
                    $(this).find(':text').val(score);
                    total = total+parseInt(score);
                }
            }
        });

        $('.panel-body').eq(5).find(':text').val(total);
    }

    $('.panel-body :radio').on('click',function(){
        $(this).parent().parent().find(':text').val($(this).attr('score'));
        var total = parseInt($('#meal_num').val())+parseInt($('#comb_wash_num').val())+parseInt($('#dressing_num').val())+parseInt($('#toilets_num').val())+parseInt($('#activity_num').val());
        $('#total_num').val(total);
    })
    var errors = '{!! json_encode($errors->all()) !!}';
    errors = JSON.parse(errors);
    if(errors.length>0){
        swal({
            'title': '提示',
            'text':errors[0],
            'type':'error',
            'confirmButtonText':'确定'
        })
    }

    var showOnly = "{{ $showOnly }}" || false;
        if(showOnly) {
            $('input').attr('disabled', true);
        }

</script>
@endpush