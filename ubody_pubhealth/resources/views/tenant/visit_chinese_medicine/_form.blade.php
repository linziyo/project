<div class="box box-primary" style="overflow: hidden;">
    <form class="form-horizontal" id="form" style="padding-bottom:60px;" action="{{ $actionUrl?$actionUrl:'' }}" method="post" onsubmit="return preSubmit()">
        <input type="hidden" name="archive_id" value="{{ $archive_id }}"/>
        @if(str_contains(route::currentRouteName(),'edit'))
            {!! method_field('PUT') !!}
        @endif
        {{ csrf_field() }}
        <div class="container">

<h4><label for="">请根据近一年的体验和感觉，回答以下问题。</label></h4>
<div class="panel panel-default">
    <div class="panel-heading">(1)您精力充沛吗？（指精神头足，乐于做事）</div>
    <div class="panel-body radio_score pinghe_choose">
        <label><input data-rule-required="true" data-msg-required="请填写energy." type="radio" name="energy" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写energy." type="radio" name="energy" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写energy." type="radio" name="energy" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写energy." type="radio" name="energy" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写energy." type="radio" name="energy" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(2)您容易疲乏吗？（指体力如何，是否稍微活动一下或做一点家务劳动就感到累）</div>
    <div class="panel-body radio_score qixu_choose pinghe_choose">
        <label><input data-rule-required="true" data-msg-required="请填写tired." type="radio" name="exhausted" value="1" data-value-one="5" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写tired." type="radio" name="exhausted" value="2" data-value-one="4">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写tired." type="radio" name="exhausted" value="3" data-value-one="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写tired." type="radio" name="exhausted" value="4" data-value-one="2">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写tired." type="radio" name="exhausted" value="5" data-value-one="1">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(3)您容易气短，呼吸短促，接不上气吗？</div>
    <div class="panel-body radio_score qixu_choose">
        <label><input data-rule-required="true" data-msg-required="请填写breathing." type="radio" name="breathing" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写breathing." type="radio" name="breathing" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写breathing." type="radio" name="breathing" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写breathing." type="radio" name="breathing" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写breathing." type="radio" name="breathing" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(4)您说话声音低弱无力吗?（指说话没有力气）</div>
    <div class="panel-body radio_score qixu_choose pinghe_choose">
        <label><input data-rule-required="true" data-msg-required="请填写voice." type="radio" name="voice" value="1" data-value-one="5" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写voice." type="radio" name="voice" value="2" data-value-one="4">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写voice." type="radio" name="voice" value="3" data-value-one="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写voice." type="radio" name="voice" value="4" data-value-one="2">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写voice." type="radio" name="voice" value="5" data-value-one="1">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(5)您感到闷闷不乐、情绪低沉吗?（指心情不愉快，情绪低落）</div>
    <div class="panel-body radio_score qiyu_choose pinghe_choose">
        <label><input data-rule-required="true" data-msg-required="请填写emotion." type="radio" name="emotion" value="1" data-value-one="5" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写emotion." type="radio" name="emotion" value="2" data-value-one="4">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写emotion." type="radio" name="emotion" value="3" data-value-one="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写emotion." type="radio" name="emotion" value="4" data-value-one="2">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写emotion." type="radio" name="emotion" value="5" data-value-one="1">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(6)您容易精神紧张、焦虑不安吗?（指遇事是否心情紧张）</div>
    <div class="panel-body radio_score qiyu_choose">
        <label><input data-rule-required="true" data-msg-required="请填写mental-stress." type="radio" name="mental" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写mental-stress." type="radio" name="mental" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写mental-stress." type="radio" name="mental" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写mental-stress." type="radio" name="mental" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写mental-stress." type="radio" name="mental" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(7)您因为生活状态改变而感到孤独、失落吗？</div>
    <div class="panel-body radio_score qiyu_choose">
        <label><input data-rule-required="true" data-msg-required="请填写lonely." type="radio" name="loneliness" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写lonely." type="radio" name="loneliness" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写lonely." type="radio" name="loneliness" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写lonely." type="radio" name="loneliness" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写lonely." type="radio" name="loneliness" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(8)您容易感到害怕或受到惊吓吗?</div>
    <div class="panel-body radio_score qiyu_choose">
        <label><input data-rule-required="true" data-msg-required="请填写fear." type="radio" name="fear" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写fear." type="radio" name="fear" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写fear." type="radio" name="fear" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写fear." type="radio" name="fear" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写fear." type="radio" name="fear" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(9)您感到身体超重不轻松吗?(感觉身体沉重)[BMI 指数=体重（kg）/身高 2（m）]</div>
    <div class="panel-body radio_score tanshi_choose">
        <label><input data-rule-required="true" data-msg-required="请填写overWeight." type="radio" name="over_weight" value="1" required>&nbsp;没有(根本不/从来没有)[BMI<24]</label>
        <label><input data-rule-required="true" data-msg-required="请填写overWeight." type="radio" name="over_weight" value="2">&nbsp;很少(有一点/偶尔)[24<=BMI<25]</label>
        <label><input data-rule-required="true" data-msg-required="请填写overWeight." type="radio" name="over_weight" value="3">&nbsp;有时(有些/少数时间)[25<=BMI<26]</label>
        <label><input data-rule-required="true" data-msg-required="请填写overWeight." type="radio" name="over_weight" value="4">&nbsp;经常(相当/多数时间)[26<=BMI<28]</label>
        <label><input data-rule-required="true" data-msg-required="请填写overWeight." type="radio" name="over_weight" value="5">&nbsp;总是(非常/每天)[28<=BMI]</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(10)您眼睛干涩吗?</div>
    <div class="panel-body radio_score yinxu_choose">
        <label><input data-rule-required="true" data-msg-required="请填写dryEyes." type="radio" name="dry" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写dryEyes." type="radio" name="dry" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写dryEyes." type="radio" name="dry" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写dryEyes." type="radio" name="dry" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写dryEyes." type="radio" name="dry" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(11)您手脚发凉吗?（不包含因周围温度低或穿的少导致的手脚发冷）</div>
    <div class="panel-body radio_score yangxu_choose">
        <label><input data-rule-required="true" data-msg-required="请填写coldHands." type="radio" name="cold" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写coldHands." type="radio" name="cold" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写coldHands." type="radio" name="cold" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写coldHands." type="radio" name="cold" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写coldHands." type="radio" name="cold" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(12)您胃脘部、背部或腰膝部怕冷吗？（指上腹部、背部、腰部或膝关节等，有一处或多处怕冷）</div>
    <div class="panel-body radio_score yangxu_choose">
        <label><input data-rule-required="true" data-msg-required="请填写stomachBackWaist." type="radio" name="fear_cold" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写stomachBackWaist." type="radio" name="fear_cold" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写stomachBackWaist." type="radio" name="fear_cold" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写stomachBackWaist." type="radio" name="fear_cold" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写stomachBackWaist." type="radio" name="fear_cold" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(13)您比一般人耐受不了寒冷吗？（指比别人容易害怕冬天或是夏天的冷空调、电扇等）</div>
    <div class="panel-body radio_score yangxu_choose pinghe_choose">
        <label><input data-rule-required="true" data-msg-required="请填写coldResistant." type="radio" name="tolerance_cold" value="1" data-value-one="5" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写coldResistant." type="radio" name="tolerance_cold" value="2" data-value-one="4">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写coldResistant." type="radio" name="tolerance_cold" value="3" data-value-one="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写coldResistant." type="radio" name="tolerance_cold" value="4" data-value-one="2">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写coldResistant." type="radio" name="tolerance_cold" value="5" data-value-one="1">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(14)您容易患感冒吗?（指每年感冒的次数</div>
    <div class="panel-body radio_score">
        <label><input data-rule-required="true" data-msg-required="请填写catchCold." type="radio" name="have_cold" value="1" required>&nbsp;没有(根本不/从来没有)[一年<2次]</label>
        <label><input data-rule-required="true" data-msg-required="请填写catchCold." type="radio" name="have_cold" value="2">&nbsp;很少(有一点/偶尔)[一年感冒2-4次] </label>
        <label><input data-rule-required="true" data-msg-required="请填写catchCold." type="radio" name="have_cold" value="3">&nbsp;有时(有些/少数时间)[一年感冒5-6次]</label>
        <label><input data-rule-required="true" data-msg-required="请填写catchCold." type="radio" name="have_cold" value="4">&nbsp;经常(相当/多数时间)[一年感冒8次以上]</label>
        <label><input data-rule-required="true" data-msg-required="请填写catchCold." type="radio" name="have_cold" value="5">&nbsp;总是(非常/每天)[几乎每月]</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(15)您没有感冒时也会鼻塞、流鼻涕吗?</div>
    <div class="panel-body radio_score tebing_choose">
        <label><input data-rule-required="true" data-msg-required="请填写nasalCongestion." type="radio" name="stuffy_nose" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写nasalCongestion." type="radio" name="stuffy_nose" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写nasalCongestion." type="radio" name="stuffy_nose" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写nasalCongestion." type="radio" name="stuffy_nose" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写nasalCongestion." type="radio" name="stuffy_nose" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(16)您有口粘口腻，或睡眠打鼾吗？</div>
    <div class="panel-body radio_score  tanshi_choose">
        <label><input data-rule-required="true" data-msg-required="请填写sleepSnoring." type="radio" name="snore" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写sleepSnoring." type="radio" name="snore" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写sleepSnoring." type="radio" name="snore" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写sleepSnoring." type="radio" name="snore" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写sleepSnoring." type="radio" name="snore" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(17)您容易过敏(对药物、食物、气味、花粉或在季节交替、气候变化时)吗？</div>
    <div class="panel-body radio_score tebing_choose">
        <label><input data-rule-required="true" data-msg-required="请填写allergicPollen." type="radio" name="allergy" value="1" required>&nbsp;没有(根本不/从来没有)[从来没有]</label>
        <label><input data-rule-required="true" data-msg-required="请填写allergicPollen." type="radio" name="allergy" value="2">&nbsp;很少(有一点/偶尔)[一年1、2次] </label>
        <label><input data-rule-required="true" data-msg-required="请填写allergicPollen." type="radio" name="allergy" value="3">&nbsp;有时(有些/少数时间)[一年3、4次]</label>
        <label><input data-rule-required="true" data-msg-required="请填写allergicPollen." type="radio" name="allergy" value="4">&nbsp;经常(相当/多数时间)[一年5、6次]</label>
        <label><input data-rule-required="true" data-msg-required="请填写allergicPollen." type="radio" name="allergy" value="5">&nbsp;总是(非常/每天)[每次遇到上述原因都过敏]</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(18)您的皮肤容易起荨麻疹吗? (包括风团、风疹块、风疙瘩)</div>
    <div class="panel-body radio_score tebing_choose">
        <label><input data-rule-required="true" data-msg-required="请填写urticaria." type="radio" name="urticaria" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写urticaria." type="radio" name="urticaria" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写urticaria." type="radio" name="urticaria" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写urticaria." type="radio" name="urticaria" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写urticaria." type="radio" name="urticaria" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(19)您的皮肤在不知不觉中会出现青紫瘀斑、皮下出血吗?（指皮肤在没有外伤的情况下出现青一块紫一块的情况）</div>
    <div class="panel-body radio_score xieyu_choose">
        <label><input data-rule-required="true" data-msg-required="请填写ecchymosis." type="radio" name="ecchymosis" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写ecchymosis." type="radio" name="ecchymosis" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写ecchymosis." type="radio" name="ecchymosis" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写ecchymosis." type="radio" name="ecchymosis" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写ecchymosis." type="radio" name="ecchymosis" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(20)您的皮肤一抓就红，并出现抓痕吗?（指被指甲或钝物划过后皮肤的反应）</div>
    <div class="panel-body radio_score tebing_choose">
        <label><input data-rule-required="true" data-msg-required="请填写scratching." type="radio" name="scratch" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写scratching." type="radio" name="scratch" value="2" required>&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写scratching." type="radio" name="scratch" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写scratching." type="radio" name="scratch" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写scratching." type="radio" name="scratch" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(21)您皮肤或口唇干吗?</div>
    <div class="panel-body radio_score yinxu_choose">
        <label><input data-rule-required="true" data-msg-required="请填写dryLips." type="radio" name="skin_dry" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写dryLips." type="radio" name="skin_dry" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写dryLips." type="radio" name="skin_dry" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写dryLips." type="radio" name="skin_dry" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写dryLips." type="radio" name="skin_dry" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(22)您有肢体麻木或固定部位疼痛的感觉吗？</div>
    <div class="panel-body radio_score xieyu_choose">
        <label><input data-rule-required="true" data-msg-required="请填写fixedSitePain." type="radio" name="pain" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写fixedSitePain." type="radio" name="pain" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写fixedSitePain." type="radio" name="pain" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写fixedSitePain." type="radio" name="pain" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写fixedSitePain." type="radio" name="pain" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(23)您面部或鼻部有油腻感或者油亮发光吗?（指脸上或鼻子）</div>
    <div class="panel-body radio_score shire_choose">
        <label><input data-rule-required="true" data-msg-required="请填写greasyFace." type="radio" name="greasy" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写greasyFace." type="radio" name="greasy" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写greasyFace." type="radio" name="greasy" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写greasyFace." type="radio" name="greasy" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写greasyFace." type="radio" name="greasy" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(24)您面色或目眶晦黯，或出现褐色斑块/斑点吗?</div>
    <div class="panel-body radio_score xieyu_choose">
        <label><input data-rule-required="true" data-msg-required="请填写brownPatches." type="radio" name="face_speckle" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写brownPatches." type="radio" name="face_speckle" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写brownPatches." type="radio" name="face_speckle" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写brownPatches." type="radio" name="face_speckle" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写brownPatches." type="radio" name="face_speckle" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(25)您有皮肤湿疹、疮疖吗？</div>
    <div class="panel-body radio_score shire_choose">
        <label><input data-rule-required="true" data-msg-required="请填写eczema." type="radio" name="eczema" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写eczema." type="radio" name="eczema" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写eczema." type="radio" name="eczema" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写eczema." type="radio" name="eczema" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写eczema." type="radio" name="eczema" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(26)您感到口干咽燥、总想喝水吗？</div>
    <div class="panel-body radio_score yinxu_choose">
        <label><input data-rule-required="true" data-msg-required="请填写dryThroat." type="radio" name="throat_dry" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写dryThroat." type="radio" name="throat_dry" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写dryThroat." type="radio" name="throat_dry" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写dryThroat." type="radio" name="throat_dry" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写dryThroat." type="radio" name="throat_dry" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(27)您感到口苦或嘴里有异味吗?（指口苦或口臭）</div>
    <div class="panel-body radio_score shire_choose">
        <label><input data-rule-required="true" data-msg-required="请填写bitterTaste." type="radio" name="mouse_smell" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写bitterTaste." type="radio" name="mouse_smell" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写bitterTaste." type="radio" name="mouse_smell" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写bitterTaste." type="radio" name="mouse_smell" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写bitterTaste." type="radio" name="mouse_smell" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(28)您腹部肥大吗?（指腹部脂肪肥厚）</div>
    <div class="panel-body radio_score  tanshi_choose">
        <label><input data-rule-required="true" data-msg-required="请填写abdominalHypertrophy." type="radio" name="fat_abdomen" value="1" required>&nbsp;[腹围80cm，相当于2.4尺]</label>
        <label><input data-rule-required="true" data-msg-required="请填写abdominalHypertrophy." type="radio" name="fat_abdomen" value="2">&nbsp;[腹围80-85cm，相当于2.4-2.55尺尺] </label>
        <label><input data-rule-required="true" data-msg-required="请填写abdominalHypertrophy." type="radio" name="fat_abdomen" value="3">&nbsp;[腹围86-90cmcm，相当于2.56-2.7尺]</label>
        <label><input data-rule-required="true" data-msg-required="请填写abdominalHypertrophy." type="radio" name="fat_abdomen" value="4">&nbsp;[腹围1-105cm，相当于2.71-3.15尺]</label>
        <label><input data-rule-required="true" data-msg-required="请填写abdominalHypertrophy." type="radio" name="fat_abdomen" value="5">&nbsp;[腹围>105cm，相当于3.15尺]</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(29)您吃(喝)凉的东西会感到不舒服或者怕吃(喝)凉的东西吗？（指不喜欢吃凉的食物，或吃了凉的食物后会不舒服）</div>
    <div class="panel-body radio_score yangxu_choose">
        <label><input data-rule-required="true" data-msg-required="请填写cool." type="radio" name="fear_cold_food" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写cool." type="radio" name="fear_cold_food" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写cool." type="radio" name="fear_cold_food" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写cool." type="radio" name="fear_cold_food" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写cool." type="radio" name="fear_cold_food" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(30)您有大便黏滞不爽、解不尽的感觉吗?(大便容易粘在马桶或便坑壁上)</div>
    <div class="panel-body radio_score shire_choose">
        <label><input data-rule-required="true" data-msg-required="请填写constipation." type="radio" name="shit_ache" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写constipation." type="radio" name="shit_ache" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写constipation." type="radio" name="shit_ache" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写constipation." type="radio" name="shit_ache" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写constipation." type="radio" name="shit_ache" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(31)您容易大便干燥吗?</div>
    <div class="panel-body radio_score yinxu_choose">
        <label><input data-rule-required="true" data-msg-required="请填写dryStool." type="radio" name="shit_dry" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写dryStool." type="radio" name="shit_dry" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写dryStool." type="radio" name="shit_dry" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写dryStool." type="radio" name="shit_dry" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写dryStool." type="radio" name="shit_dry" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(32)您舌苔厚腻或有舌苔厚厚的感觉吗?（如果自我感觉不清楚可由调查员观察后填写）</div>
    <div class="panel-body radio_score  tanshi_choose">
        <label><input data-rule-required="true" data-msg-required="请填写greasyFur." type="radio" name="tongue_thick" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写greasyFur." type="radio" name="tongue_thick" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写greasyFur." type="radio" name="tongue_thick" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写greasyFur." type="radio" name="tongue_thick" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写greasyFur." type="radio" name="tongue_thick" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">(33)您舌下静脉瘀紫或增粗吗？（可由调查员辅助观察后填写）</div>
    <div class="panel-body radio_score xieyu_choose">
        <label><input data-rule-required="true" data-msg-required="请填写sublingualVeins." type="radio" name="vein_thick" value="1" required>&nbsp;没有(根本不/从来没有)</label>
        <label><input data-rule-required="true" data-msg-required="请填写sublingualVeins." type="radio" name="vein_thick" value="2">&nbsp;很少(有一点/偶尔) </label>
        <label><input data-rule-required="true" data-msg-required="请填写sublingualVeins." type="radio" name="vein_thick" value="3">&nbsp;有时(有些/少数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写sublingualVeins." type="radio" name="vein_thick" value="4">&nbsp;经常(相当/多数时间)</label>
        <label><input data-rule-required="true" data-msg-required="请填写sublingualVeins." type="radio" name="vein_thick" value="5">&nbsp;总是(非常/每天)</label>
    </div>
</div>
<div class="panel panel-default health-type">
    <div class="panel-heading"><label>体质类型------气虚质</label></div>
    <div class="panel-heading">体质辨识</div>
    <div class="panel-body">
        <label>得分</label>
        <label><input class="form-control" type="text" name="qixu_score"  value="" readonly="readonly"></label>
        <label>分</label><br />
        <label><input type="radio" name="qixu_level"  value="1"></label>
        <label>是</label>
        <label><input type="radio" name="qixu_level"  value="2"></label>
        <label>倾向是</label>
        <label><input type="radio" name="qixu_level"  value="3"></label>
        <label>否</label>
    </div>
    <div class="panel-heading">中医药保健</div>
    <div class="panel-body">
        <label><input type="checkbox" name="qixu_healthcare[]" value="1">&nbsp;情志调摄</label>
        <label><input type="checkbox" name="qixu_healthcare[]" value="2">&nbsp;饮食调养</label>
        <label><input type="checkbox" name="qixu_healthcare[]" value="3">&nbsp;起居调摄</label>
        <label><input type="checkbox" name="qixu_healthcare[]" value="4">&nbsp;运动保健</label>
        <label><input type="checkbox" name="qixu_healthcare[]" value="5">&nbsp;穴位保健</label><br />
        <label><input type="checkbox" name="qixu_healthcare[]" value="6">&nbsp;其他</label>
        <label><input class="form-control" type="text" name="qixu_other" value=""></label>
    </div>
</div>
<div class="panel panel-default  health-type">
    <div class="panel-heading"><label>体质类型------阳虚质</label></div>
    <div class="panel-heading">体质辨识</div>
    <div class="panel-body isYangXu">
        <label>得分</label>
        <label><input class="form-control" type="text" readonly="readonly" name="yangxu_score" name="one" value=""></label>
        <label>分</label><br />
        <label><input type="radio" name="yangxu_level" value="1" ></label>
        <label>是</label>
        <label><input type="radio" name="yangxu_level" value="2" ></label>
        <label>倾向是</label>
        <label><input type="radio" name="yangxu_level" value="3" ></label>
        <label>否</label>
    </div>
    <div class="panel-heading">中医药保健</div>
    <div class="panel-body">
        <label><input type="checkbox" name="yangxu_healthcare[]" value="1">&nbsp;情志调摄</label>
        <label><input type="checkbox" name="yangxu_healthcare[]" value="2">&nbsp;饮食调养</label>
        <label><input type="checkbox" name="yangxu_healthcare[]" value="3">&nbsp;起居调摄</label>
        <label><input type="checkbox" name="yangxu_healthcare[]" value="4">&nbsp;运动保健</label>
        <label><input type="checkbox" name="yangxu_healthcare[]" value="5">&nbsp;穴位保健</label><br />
        <label><input type="checkbox" name="yangxu_healthcare[]" value="6">&nbsp;其他</label>
        <label><input class="form-control" type="text" name="yangxu_other" value=""></label>
    </div>
</div>
<div class="panel panel-default  health-type">
    <div class="panel-heading"><label>体质类型------阴虚质</label></div>
    <div class="panel-heading">体质辨识</div>
    <div class="panel-body isYinXu">
        <label>得分</label>
        <label><input class="form-control" type="text" readonly="readonly" name="yinxu_score"  value=""></label>
        <label>分</label><br />
        <label><input type="radio" name="yinxu_level" value="1" ></label>
        <label>是</label>
        <label><input type="radio" name="yinxu_level" value="2" ></label>
        <label>倾向是</label>
        <label><input type="radio" name="yinxu_level" value="3" ></label>
        <label>否</label>
    </div>
    <div class="panel-heading">中医药保健</div>
    <div class="panel-body">
        <label><input type="checkbox" name="yinxu_healthcare[]" value="1" >&nbsp;情志调摄</label>
        <label><input type="checkbox" name="yinxu_healthcare[]" value="2">&nbsp;饮食调养</label>
        <label><input type="checkbox" name="yinxu_healthcare[]" value="3">&nbsp;起居调摄</label>
        <label><input type="checkbox" name="yinxu_healthcare[]" value="4">&nbsp;运动保健</label>
        <label><input type="checkbox" name="yinxu_healthcare[]" value="5">&nbsp;穴位保健</label><br />
        <label><input type="checkbox" name="yinxu_healthcare[]" value="6">&nbsp;其他</label>
        <label><input class="form-control" type="text" name="yinxu_other" value=""></label>
    </div>
</div>
<div class="panel panel-default  health-type">
    <div class="panel-heading"><label>体质类型------痰湿质</label></div>
    <div class="panel-heading">体质辨识</div>
    <div class="panel-body isTanShiZhi">
        <label>得分</label>
        <label><input class="form-control" type="text" readonly="readonly" name="tanshi_score"  value=""></label>
        <label>分</label><br />
        <label><input type="radio" name="tanshi_level" value="1" ></label>
        <label>是</label>
        <label><input type="radio" name="tanshi_level" value="2" ></label>
        <label>倾向是</label>
        <label><input type="radio" name="tanshi_level" value="3" ></label>
        <label>否</label>
    </div>
    <div class="panel-heading">中医药保健</div>
    <div class="panel-body">
        <label><input type="checkbox" name="tanshi_healthcare[]" value="1" >&nbsp;情志调摄</label>
        <label><input type="checkbox" name="tanshi_healthcare[]" value="2">&nbsp;饮食调养</label>
        <label><input type="checkbox" name="tanshi_healthcare[]" value="3">&nbsp;起居调摄</label>
        <label><input type="checkbox" name="tanshi_healthcare[]" value="4">&nbsp;运动保健</label>
        <label><input type="checkbox" name="tanshi_healthcare[]" value="5">&nbsp;穴位保健</label><br />
        <label><input type="checkbox" name="tanshi_healthcare[]" value="6">&nbsp;其他</label>
        <label><input class="form-control" type="text" name="tanshi_other" value=""></label>
    </div>
</div>
<div class="panel panel-default  health-type">
    <div class="panel-heading"><label>体质类型------湿热质</label></div>
    <div class="panel-heading">体质辨识</div>
    <div class="panel-body isShiReZhi">
        <label>得分</label>
        <label><input class="form-control" type="text" readonly="readonly" name="shire_score" value=""></label>
        <label>分</label><br />
        <label><input type="radio" name="shire_level" value="1" ></label>
        <label>是</label>
        <label><input type="radio" name="shire_level" value="2" ></label>
        <label>倾向是</label>
        <label><input type="radio" name="shire_level" value="3" ></label>
        <label>否</label>
    </div>
    <div class="panel-heading">中医药保健</div>
    <div class="panel-body">
        <label><input type="checkbox" name="shire_healthcare[]" value="1" >&nbsp;情志调摄</label>
        <label><input type="checkbox" name="shire_healthcare[]" value="2">&nbsp;饮食调养</label>
        <label><input type="checkbox" name="shire_healthcare[]" value="3">&nbsp;起居调摄</label>
        <label><input type="checkbox" name="shire_healthcare[]" value="4">&nbsp;运动保健</label>
        <label><input type="checkbox" name="shire_healthcare[]" value="5">&nbsp;穴位保健</label><br />
        <label><input type="checkbox" name="shire_healthcare[]" value="6">&nbsp;其他</label>
        <label><input class="form-control" type="text" name="shire_other" value=""></label>
    </div>
</div>
<div class="panel panel-default  health-type">
    <div class="panel-heading"><label>体质类型------血瘀质</label></div>
    <div class="panel-heading">体质辨识</div>
    <div class="panel-body isXueYuZhi">
        <label>得分</label>
        <label><input class="form-control" readonly="readonly" type="text" name="xieyu_score" value=""></label>
        <label>分</label><br />
        <label><input type="radio" name="xieyu_level" value="1" ></label>
        <label>是</label>
        <label><input type="radio" name="xieyu_level" value="2" ></label>
        <label>倾向是</label>
        <label><input type="radio" name="xieyu_level" value="3" ></label>
        <label>否</label>
    </div>
    <div class="panel-heading">中医药保健</div>
    <div class="panel-body">
        <label><input type="checkbox" name="xieyu_healthcare[]" value="1" >&nbsp;情志调摄</label>
        <label><input type="checkbox" name="xieyu_healthcare[]" value="2">&nbsp;饮食调养</label>
        <label><input type="checkbox" name="xieyu_healthcare[]" value="3">&nbsp;起居调摄</label>
        <label><input type="checkbox" name="xieyu_healthcare[]" value="4">&nbsp;运动保健</label>
        <label><input type="checkbox" name="xieyu_healthcare[]" value="5">&nbsp;穴位保健</label><br />
        <label><input type="checkbox" name="xieyu_healthcare[]" value="6">&nbsp;其他</label>
        <label><input class="form-control" type="text" name="xieyu_other" value=""></label>
    </div>
</div>
<div class="panel panel-default  health-type">
    <div class="panel-heading">体质类型------气郁质</div>
    <div class="panel-heading">体质辨识</div>
    <div class="panel-body">
        <label>得分</label>
        <label><input class="form-control" readonly="readonly" type="text" name="qiyu_score" value=""></label>
        <label>分</label><br />
        <label><input type="radio" name="qiyu_level" value="1" ></label>
        <label>是</label>
        <label><input type="radio" name="qiyu_level" value="2" ></label>
        <label>倾向是</label>
        <label><input type="radio" name="qiyu_level" value="3" ></label>
        <label>否</label>
    </div>
    <div class="panel-heading">中医药保健</div>
    <div class="panel-body">
        <label><input type="checkbox" name="qiyu_healthcare[]" value="1" >&nbsp;情志调摄</label>
        <label><input type="checkbox" name="qiyu_healthcare[]" value="2">&nbsp;饮食调养</label>
        <label><input type="checkbox" name="qiyu_healthcare[]" value="3">&nbsp;起居调摄</label>
        <label><input type="checkbox" name="qiyu_healthcare[]" value="4">&nbsp;运动保健</label>
        <label><input type="checkbox" name="qiyu_healthcare[]" value="5">&nbsp;穴位保健</label><br />
        <label><input type="checkbox" name="qiyu_healthcare[]" value="6">&nbsp;其他</label>
        <label><input class="form-control" type="text" name="qiyu_other" value=""></label>
    </div>

</div>
<div class="panel panel-default  health-type">
    <div class="panel-heading">体质类型------特禀质</div>
    <div class="panel-heading">体质辨识</div>
    <div class="panel-body isTeLingZhi">
        <label>得分</label>
        <label><input class="form-control" type="text" readonly="readonly" name="tebing_score" value=""></label>
        <label>分</label><br />
        <label><input type="radio" name="tebing_level" value="1" ></label>
        <label>是</label>
        <label><input type="radio" name="tebing_level" value="2" ></label>
        <label>倾向是</label>
        <label><input type="radio" name="tebing_level" value="3" ></label>
        <label>否</label>
    </div>
    <div class="panel-heading">中医药保健</div>
    <div class="panel-body">
        <label><input type="checkbox" name="tebing_healthcare[]" value="1" >&nbsp;情志调摄</label>
        <label><input type="checkbox" name="tebing_healthcare[]" value="2">&nbsp;饮食调养</label>
        <label><input type="checkbox" name="tebing_healthcare[]" value="3">&nbsp;起居调摄</label>
        <label><input type="checkbox" name="tebing_healthcare[]" value="4">&nbsp;运动保健</label>
        <label><input type="checkbox" name="tebing_healthcare[]" value="5">&nbsp;穴位保健</label><br />
        <label><input type="checkbox" name="tebing_healthcare[]" value="6">&nbsp;其他</label>
        <label><input class="form-control" type="text" name="tebing_other" value=""></label>
    </div>
</div>
<div class="panel panel-default  health-type">
    <div class="panel-heading">体质类型------平和质</div>
    <div class="panel-heading">体质辨识</div>
    <div class="panel-body">
        <label>得分</label>
        <label><input class="form-control" readonly="readonly" type="text" name="pinghe_score" value=""></label>
        <label>分</label><br />
        <label><input type="radio" name="pinghe_level" value="1" ></label>
        <label>是</label>
        <label><input type="radio" name="pinghe_level" value="2" ></label>
        <label>基本是</label>
        <label><input type="radio" name="pinghe_level" value="3" ></label>
        <label>否</label>
    </div>
    <div class="panel-heading">中医药保健</div>
    <div class="panel-body">
        <label><input type="checkbox" name="pinghe_healthcare[]" value="1" >&nbsp;情志调摄</label>
        <label><input type="checkbox" name="pinghe_healthcare[]" value="2">&nbsp;饮食调养</label>
        <label><input type="checkbox" name="pinghe_healthcare[]" value="3">&nbsp;起居调摄</label>
        <label><input type="checkbox" name="pinghe_healthcare[]" value="4">&nbsp;运动保健</label>
        <label><input type="checkbox" name="pinghe_healthcare[]" value="5">&nbsp;穴位保健</label><br />
        <label><input type="checkbox" name="pinghe_healthcare[]" value="6">&nbsp;其他</label>
        <label><input class="form-control" type="text" name="pinghe_other" value=""></label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">填表日期
        <label><input class="form-control date" type="text" name="form_date" value="" required></label>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">医生签名
        <label><input class="form-control" type="text" name="doctor_name" value="" required></label>
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
    if(data != ''){
        data = JSON.parse(data);
        $('.panel-body').each(function(index,el){
            if(index < 33) {
                var tag_name = $(this).find('input').eq(0).attr('name');
                if(data[tag_name] && data[tag_name]>0) {
                    $('input[name=' + tag_name + '][value='+data[tag_name]+']').prop('checked',true);
                }
            }
        });

        $('.health-type').each(function(index,el){
            var obj1 =$(this).find('.panel-body').eq(0);
            //分数
            var score_name = obj1.find(':text').attr('name');
            if(data[score_name]){
                $('input[name='+score_name+']').val(data[score_name]);
            }
            //程度
            var level_name = obj1.find(':radio').eq(0).attr('name');
            if(data[level_name]){
                $('input[name='+level_name+'][value='+data[level_name]+']').prop('checked',true);
            }
            //保健
            var obj2 =$(this).find('.panel-body').eq(1);
            var health_name = obj2.find(':checkbox').eq(0).attr('name');
            var point = health_name.indexOf('[');
            var care_name = health_name.substr(0,point);
            if(data[care_name]){
                $.each(data[care_name],function(index,value){
                    $('input[name="'+health_name+'"][value='+value+']').prop('checked',true);
                    if(value == 6){
                        var other_name = obj2.find(':text').attr('name');
                        if(data[other_name]){
                            obj2.find(':text').val(data[other_name]);
                        }
                    }
                });

            }
        });
        $('input[name=form_date]').val(data.form_date);
        $('input[name=doctor_name]').val(data.doctor_name);

    }


    var type = ['qixu','yangxu','yinxu','tanshi','shire','xieyu','qiyu','tebing','pinghe'];
    $(function(){

        $(".date").datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            'language': 'zh-CN'
        });

        $('.radio_score label input').on('click',function(e){
            var divObj = $(this).parent().parent('div');
            $.each(type,function(index,value){
                var tag = value+'_choose';
                if(divObj.hasClass(tag)){
                    score(value);
                }
            });
        })

    });

    function score(tag) {

        var chooseTag = '.'+tag+'_choose';
        var score = 0;
        $(chooseTag).find('input:radio:checked').each(function(){
            var value = $(this).val();
            if(tag == 'pinghe'){
                value = 6-parseInt(value);
            }
            score = score+parseInt(value);

        });
        var scoreTag = tag+'_score';
        $("input[name="+scoreTag+"]").val(score);
        var levelTag = tag+'_level';

        var totalScore = 0;
        if(tag == 'pinghe'){
            $.each(type,function(index,value){
                if(value != 'pinghe'){
                    var tempTag = tag+'_score';
                    totalScore = totalScore + parseInt($("input[name="+tempTag+"]").val());
                }
            });
            if(score >= 17 && totalScore <=8){
                $("input[name="+levelTag+"][value=1]").prop('checked',true);
            }else if(score>=17 && totalScore <= 10) {
                $("input[name="+levelTag+"][value=2]").prop('checked',true);
            }else {
                $("input[name="+levelTag+"][value=3]").prop('checked',true);
            }
        }else {
            if(score >= 11){
                $("input[name="+levelTag+"][value=1]").prop('checked',true);
            }else if(score>=9 && score <= 10) {
                $("input[name="+levelTag+"][value=2]").prop('checked',true);
            }else {
                $("input[name="+levelTag+"][value=3]").prop('checked',true);
            }
        }



    }

    var preSubmit = function() {
        var flag = true;
        $.each(type,function(index,value){
           var key = value+'_healthcare[]';
            if($('[name="'+key+'"]:checked').length == 0){
                swal({
                    'title': '提示',
                    'text':'中医药保健至少选一项',
                    'type':'error',
                    'confirmButtonText':'确定'
                })
                flag = false;return;
            }
        });
        return flag;
    }

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
</script>
@endpush