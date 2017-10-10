<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>1~8个月儿童健康检查记录表</title>
    <link rel="stylesheet" type="text/css" href="../css/table.css"/>
    <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/project3.css" />
</head>

<body>
{!! Form::open(array('action'=>'Admin\\VisitKidsController@store', 'method'=>'post', 'class'=>'getForm','enctype'=>'multipart/form-data')) !!}
    <h2 style="text-align: center;">1～8月龄儿童健康检查记录表</h2>
    <div class="container">
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">姓名</label>
            <div class="col-sm-10">
                {!! Form::text('name', '', ['id'=>'exampleInputName2','class'=>'form-control','placeholder'=>'请输入姓名']) !!}
                {{--<input type="text" class="form-control" id="exampleInputName2" placeholder="请输入姓名">--}}
            </div>
        </div>
        <input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>

        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">月龄/随访日期</label>
            <div class="col-sm-10">
                <select name="age" class="col-sm-4">
                    <option onclick="switchItem1('1')">满月</option>
                    <option onclick="switchItem1('3')">3月龄</option>
                    <option onclick="switchItem1('6')">6月龄</option>
                    <option onclick="switchItem1('8')">8月龄</option>
                </select>
                <input type="text" class="form-control" id="exampleInputName2" placeholder="请输入随访日期">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">体重/身长/头围</label>
            <div class="col-sm-10">
                <label style="width:156px">
                    {!! Form::text('name', '', ['id'=>'exampleInputName2','class'=>'form-control','placeholder'=>'请输入体重(kg)']) !!}
                </label>
                <label>
                    <p style="font-size: 16px;font-weight: initial;margin-right: 20px;">kg</p>
                </label>
                <label style="width:156px">
                    {!! Form::text('height', '', ['style'=>"width:156px",'id'=>'exampleInputName2','class'=>'form-control','placeholder'=>'请输入身长(cm)']) !!}
                </label>
                <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">cm</p></label>
                <label style="width:156px">
                    {!! Form::text('head_size', '', ['style'=>"width:156px",'id'=>'exampleInputName2','class'=>'form-control','placeholder'=>'请输入头围(cm)']) !!}
                </label>
                <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">cm</p></label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">体格检查</label>
            <!--满月-->
            <div class="col-sm-10" id="tige_jiancha" style="display: show;">
                {!! Form::label('face_color', '面色', ['class'=>'mianse','for'=>'exampleInputName2']) !!} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {!! Form::radio('face_color', '红润'),'红润' !!}
                {!! Form::radio('face_color', '黄染'),'黄染' !!}
                {!! Form::radio('face_color', '其他'),'其他' !!}
                {!! Form::label('skin', '皮肤', ['class'=>'mianse','for'=>'exampleInputName2']) !!}
                {!! Form::radio('skin', '未见异常'),'未见异常' !!}
                {!! Form::radio('skin', '异常'),'异常' !!}
                {!! Form::label('bregma', '前卤', ['class'=>'mianse','for'=>'exampleInputName2']) !!}
                {!! Form::radio('bregma', '闭合'),'闭合' !!}
                {!! Form::radio('bregma', '未闭'),'未闭' !!}
                <label style="width:206px">
                    {!! Form::text('name', '', ['id'=>'exampleInputName2','class'=>'form-control','placeholder'=>'若未闭合，请输入未闭合值','style'=>'width:206px']) !!}
                </label>
                <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">cm<sup>2</sup></p></label> <br /><br />
                {!! Form::label('cervical_mass', '颈部包块', ['class'=>'','for'=>'exampleInputName2']) !!}
                {!! Form::radio('cervical_mass', '有'),'有' !!}
                {!! Form::radio('cervical_mass', '无'),'无' !!}
                {!! Form::label('eye', '眼睛', ['class'=>'pifu','for'=>'exampleInputName2']) !!}
                {!! Form::radio('eye', '未见异常'),'未见异常' !!}
                {!! Form::radio('eye', '异常'),'异常' !!}
                {!! Form::label('ear', '耳', ['class'=>'pifu','for'=>'exampleInputName2']) !!}
                {!! Form::radio('ear', '未见异常'),'未见异常' !!}
                {!! Form::radio('ear', '异常'),'异常' !!}
                {!! Form::label('mouth', '口腔', ['class'=>'pifu','for'=>'exampleInputName2']) !!}
                {!! Form::radio('mouth', '未见异常'),'未见异常' !!}
                {!! Form::radio('mouth', '异常'),'异常' !!}<br /><br />
                {!! Form::label('hearing', '听力', ['class'=>'pifu','for'=>'exampleInputName2']) !!}
                {!! Form::radio('hearing', '未见异常'),'未见异常' !!}
                {!! Form::radio('hearing', '异常'),'异常' !!}
                {!! Form::label('chest', '胸部', ['class'=>'','for'=>'exampleInputName2']) !!}
                {!! Form::radio('chest', '未见异常'),'未见异常' !!}
                {!! Form::radio('chest', '异常'),'异常' !!}
                {!! Form::label('abdomen', '腹部', ['class'=>'','for'=>'exampleInputName2']) !!}
                {!! Form::radio('abdomen', '未见异常'),'未见异常' !!}
                {!! Form::radio('abdomen', '异常'),'异常' !!}
                {!! Form::label('navel', '脐部', ['class'=>'','for'=>'exampleInputName2']) !!}
                {!! Form::radio('navel', '未脱'),'未脱' !!}
                {!! Form::radio('navel', '脱落'),'脱落' !!}
                {!! Form::radio('navel', '脐部有渗出'),'脐部有渗出' !!}
                {!! Form::radio('navel', '其他'),'其他' !!}
                <br /><br />
                {!! Form::label('limb_mobility', '四肢', ['class'=>'','for'=>'exampleInputName2']) !!}
                {!! Form::radio('limb_mobility', '未见异常'),'未见异常' !!}
                {!! Form::radio('limb_mobility', '异常'),'异常' !!}
                {!! Form::label('hemoglobin', '血红蛋白', ['class'=>'','for'=>'exampleInputName2']) !!}
                {!! Form::radio('hemoglobin', '未见异常'),'未见异常' !!}
                {!! Form::radio('hemoglobin', '异常'),'异常' !!} <br /><br />
            </div>
            <!--3月-->
            {!! Form::label('rickets_symptom', '可疑佝偻病症状', ['class'=>'','for'=>'exampleInputName2']) !!}
            <label class="label_color">{!! Form::radio('rickets_symptom', '无'),'无' !!}</label>
            <label class="label_color"> {!! Form::radio('rickets_symptom', '夜惊'),'夜惊' !!}</label>
            <label class="label_color">{!! Form::radio('rickets_symptom', '多汗'),'多汗' !!}</label>
            <label class="label_color">{!! Form::radio('rickets_symptom', '烦躁'),'烦躁' !!}</label>
            {!! Form::label('rickets_sign', '可疑佝偻病体征', ['class'=>'','for'=>'exampleInputName2']) !!}
            <label class="label_color">{!! Form::radio('rickets_sign', '无'),'无' !!}</label>
            <label class="label_color"> {!! Form::radio('rickets_sign', '颅骨软化'),'颅骨软化' !!}</label>
            {!! Form::label('aedea', '肛门/外生殖器', ['class'=>'','for'=>'exampleInputName2']) !!}
            <label class="label_color">{!! Form::radio('aedea', '未见异常'),'未见异常' !!}</label>
            <label class="label_color"> {!! Form::radio('aedea', '异常'),'异常' !!}</label>
            </div>

            </div>
        </div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">户外活动</label>
    <div class="col-sm-10">
        <label style="width:206px;">
            {!! Form::text('outdoor_activity', '', ['style'=>"width:156px",'id'=>'exampleInputName2','class'=>'form-control','placeholder'=>'请输入是否参加户外活动']) !!}

        </label>
        <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">小时/日</p></label>
    </div>
</div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">服用维生D</label>

            <div class="col-sm-10">
                {!! Form::text('intake_vitamin_d', '', ['style'=>"width:156px",'id'=>'exampleInputName2','class'=>'form-control','placeholder'=>'请输入是否服用维生D']) !!}
                <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">IU/日</p></label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">发育评估</label>
            <div class="col-sm-10" id="fayu_pingjia0" style="display: show;">
                <label>
                    {!! Form::text('grow_assessment', '', ['style'=>"width:156px",'id'=>'exampleInputName2','class'=>'form-control','placeholder'=>'发育评估']) !!}
                </label><br /><br />
            </div>
            <div class="col-sm-10" id="fayu_pingjia1" style="display:none">
                <label>
                    <input type="checkbox" value="">
                    对很大声音没有反应
                </label>
                <label>
                    <input type="checkbox" value="">
                    逗引时不发音或不会微笑
                </label>
                <label>
                    <input type="checkbox" value="">
                    不注视人脸，不追视移动人或物品
                </label>
                <label>
                    <input type="checkbox" value="">
                    俯卧时不会抬头
                </label>
            </div>
            <div class="col-sm-10" id="fayu_pingjia2" style="display:none">
                <label>
                    <input type="checkbox" value="">
                    发音少，不会笑出声
                </label>
                <label>
                    <input type="checkbox" value="">
                    不会伸手抓物
                </label>
                <label>
                    <input type="checkbox" value="">
                    紧握拳松不开
                </label>
                <label>
                    <input type="checkbox" value="">
                    不能扶坐
                </label>
            </div>
            <div class="col-sm-10" id="fayu_pingjia3" style="display:none">
                <label>
                    <input type="checkbox" value="">
                    听到声音无应答

                </label>
                <label>
                    <input type="checkbox" value="">
                    不会区分生人和熟人
                </label>
                <label>
                    <input type="checkbox" value="">
                    双手间不会传递玩具
                </label>
                <label>
                    <input type="checkbox" value="">
                    不会独坐
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">两次随机访问患病情况</label>
            <div class="col-sm-10" id="fayu_pingjia">
                <label>
                    <input type="radio" value="">&nbsp;无
                </label><br />
                <label>
                    <span>肺炎</span>
                    <label style="width:206px">
                        <input style="width:206px" type="text" class="form-control" id="exampleInputName2" placeholder="请输入是否有肺炎" />
                    </label>
                    <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">次</p></label>
                </label>
                <label>
                    <span>腹泻</span>
                    <label style="width:206px">
                        <input style="width:206px" type="text" class="form-control" id="exampleInputName2" placeholder="请输入是否腹泻" />
                    </label>
                    <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">次</p></label>
                </label>
                <label>
                    <span>外伤</span>
                    <label style="width:206px">
                        <input style="width:206px" type="text" class="form-control" id="exampleInputName2" placeholder="请输入是否有外伤" />
                    </label>
                    <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">次</p></label>
                </label>
                <label>
                    <span>其它</span>
                    <label style="width:206px">
                        <input style="width:206px" type="text" class="form-control" id="exampleInputName2" placeholder="请输入其它情况" />
                    </label>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">转诊建议</label>
            <div class="col-sm-10" id="fayu_pingjia">
                <label>
                    <label class="label_color">{!! Form::radio('referral_recommendations', '无'),'无' !!}</label>
                </label><br />
                <label>
                    <label class="label_color"> {!! Form::radio('referral_recommendations', '有'),'有' !!}</label>
                </label>
                <label id="s1">
                    <span>原因&nbsp;&nbsp;</span>
                    <label>
                        {!! Form::text('referral_recommendations', '', ['style'=>"width:156px",'id'=>'exampleInputName2','class'=>'form-control','placeholder'=>'请输入转诊建议']) !!}
                    </label>
                </label>
                <label id="s2">
                    <span>机构及科室&nbsp;&nbsp;</span>
                    <label>
                        {!! Form::text('referral_department', '', ['style'=>"width:156px",'id'=>'exampleInputName2','class'=>'form-control','placeholder'=>'请输入机构和科室']) !!}
                    </label>
                </label>
            </div>
        </div>
<div class="form-group">
    <label for="exampleInputName2" class="col-sm-2 control-label">指导</label>
    <div class="col-sm-10" id="fayu_pingjia">
        @foreach(\App\Models\VisitKids::$guides as $key=>$value)
        <label class="label_color">
                {!! Form::checkbox('guide',$key),$value!!}
        </label><br /><br />
        @endforeach
    </div>
</div>
<div class="form-group">
    {!! Form::label('visited_at', '本次访视日期', ['class'=>'col-sm-2 control-label']) !!}
    {!! Form::date('visited_at','') !!}
    <span class="help-block"></span>
</div>
<div class="form-group">
    {!! Form::label('next_visited_at', '下次访视日期', ['class'=>'col-sm-2 control-label']) !!}
    {!! Form::date('next_visited_at','') !!}
    <span class="help-block"></span>
</div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">随访医生签名</label>
            <div class="col-sm-10">
                <label><input type="text" class="form-control" id="exampleInputName2" placeholder="请输入随访医生签名" ></label>
            </div>
        </div>
    </div>

<div class="modal-footer">
    {!! Form::button('取消',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
    {!! Form::submit('提交', ['class'=>'btn btn-primary']) !!}
</div>
{{ Form::close() }}
</body>
<script type="text/javascript">
    function switchItem1(tag) {
        var s1 = document.getElementById('fayu_pingjia0');
        var s2 = document.getElementById('fayu_pingjia1');
        var s3 = document.getElementById('fayu_pingjia2');
        var s4 = document.getElementById('fayu_pingjia3');
        var s5 = document.getElementById('tige_jiancha');
        var s6 = document.getElementById('tige_jiancha1');
        var s7 = document.getElementById('tige_jiancha2');
        var s8 = document.getElementById('tige_jiancha3');
        if(tag == '1') {
            s1.style.display = '';
            s2.style.display = 'none';
            s3.style.display = 'none';
            s4.style.display = 'none';
            s5.style.display = '';
            s6.style.display = 'none';
            s7.style.display = 'none';
            s8.style.display = 'none';
        } else if(tag == '3') {
            s1.style.display = 'none';
            s2.style.display = '';
            s3.style.display = 'none';
            s4.style.display = 'none';
            s5.style.display = 'none';
            s6.style.display = '';
            s7.style.display = 'none';
            s8.style.display = 'none';
        } else if(tag == '6') {
            s1.style.display = 'none';
            s2.style.display = 'none';
            s3.style.display = '';
            s4.style.display = 'none';
            s5.style.display = 'none';
            s6.style.display = 'none';
            s7.style.display = '';
            s8.style.display = 'none';
        } else {
            s1.style.display = 'none';
            s2.style.display = 'none';
            s3.style.display = 'none';
            s4.style.display = '';
            s5.style.display = 'none';
            s6.style.display = 'none';
            s7.style.display = 'none';
            s8.style.display = '';
        }
    }
</script>

</html>