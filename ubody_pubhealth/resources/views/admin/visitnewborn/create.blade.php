<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>新生儿家庭访视记录</title>
    <link rel="stylesheet" type="text/css" href="../css/table.css"/>
    <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/project3.css" />
</head>

<body>
{!! Form::open(array('action'=>'Admin\\VisitNewbornController@store', 'method'=>'post', 'class'=>'getForm','enctype'=>'multipart/form-data')) !!}
<h2 style="text-align: center;">新生儿家庭访视记录表</h2>
    <div class="container">
        <input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>

        <div class="form-group">
            {!! Form::label('name', '姓名', ['class'=>'col-sm-2 control-label']) !!}
            {!! Form::text('name', '', ['id'=>'exampleInputName2','class'=>'form-control','placeholder'=>'请输入姓名']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('sex', '性别', ['class'=>'col-sm-2 control-label']) !!}
            {!! Form::radio('sex', '1'),'男' !!}
            {!! Form::radio('sex', '2'),'女' !!}
            {!! Form::radio('sex', '3'),'未说明的性别' !!}
            {!! Form::radio('sex', '4'),'未知的性别' !!}

            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">父亲</label>
            <div class="col-sm-10">
            <label>
                <span style="font-weight: initial;">姓名</span>
                <label>
                    {!! Form::text('father_name','', ['id'=>'father_name','class'=>'form-control','placeholder'=>'请输入父亲姓名','style'=>"width:200px"]) !!}
                </label>
            </label>
            <label>
            <span style="font-weight: initial;">联系电话</span>
            <label>
                {!! Form::text('father_phone_number', '', ['id'=>'father_phone_number','class'=>'form-control','placeholder'=>'请输入父亲联系电话','style'=>"width:200px"]) !!}
            </label>
            </label><br />
            <label>
                <span style="font-weight: initial;">职业</span>
                <label>
                    {!! Form::text('father_job', '', ['id'=>'father_job','class'=>'form-control','placeholder'=>'请输入从事职业','style'=>"width:200px"]) !!}
                </label>
            </label>
            <label>
                <span style="font-weight: initial;">出生日期</span>
                <label>
                    {!! Form::text('father_birthday', '', ['id'=>'father_birthday','class'=>'form-control','placeholder'=>'请输入父亲出生日期','style'=>"width:200px"]) !!}
                </label>
            </label>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('mother_name', '母亲', ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                <label>
                    <span style="font-weight: initial;">姓名</span>
                    <label>
                        {!! Form::text('mother_name', '', ['id'=>'mother_name','class'=>'form-control','placeholder'=>'请输入母亲姓名','style'=>"width:200px"]) !!}
                    </label>
                </label>
                <label>
                    <span style="font-weight: initial;">联系电话</span>
                    <label>
                        {!! Form::text('mother_phone_number', '', ['id'=>'mother_phone_number','class'=>'form-control','placeholder'=>'请输入母亲联系电话','style'=>"width:200px"]) !!}
                    </label>
                </label><br />
                <label>
                    <span style="font-weight: initial;">职业</span>
                    <label>
                        {!! Form::text('mother_job', '', ['id'=>'mother_job','class'=>'form-control','placeholder'=>'请输入从事职业','style'=>"width:200px"]) !!}
                    </label>
                </label>
                <label>
                    <span style="font-weight: initial;">出生日期</span>
                    <label>
                        {!! Form::text('mother_birthday', '', ['id'=>'mother_birthday','class'=>'form-control','placeholder'=>'请输入母亲出生日期','style'=>"width:200px"]) !!}
                    </label>
                </label>
            </div>
        </div>


        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">母亲妊娠期患病情况</label>
            <div class="col-sm-10" style="margin-top:6px;">
                <label>
                    @foreach(\App\Models\VisitNewborn::$pregnancyDisease as $key=>$item)
                    {!! Form::checkbox('pregnancy_disease',$key),$item!!}
                    @endforeach
                </label>

            </div></br>


            <div class="form-group">
                <label for="exampleInputName2" class="col-sm-2 control-label">出生孕周</label>
                <div class="col-sm-10" style="margin-top:6px;">

                    <label style="width:246px;">
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="请输入新生儿出生时母亲怀孕周数" style="width:240px;"/>
                    </label>


                </div></br>

        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">助产机构名称</label>
            <div class="col-sm-10" id="week">

                <label>
                    <label>
                        {!! Form::text('midwifery_institution', '', ['id'=>'midwifery_institution','class'=>'form-control','placeholder'=>'请输入助产机构名称']) !!}
                    </label>
                </label><br />
                <span style="font-weight: initial;">出生情况&nbsp;&nbsp;</span>
                <label class="label_color">

                    @foreach(\App\Models\VisitNewborn::$midwiferyMode as $key=>$value)
                        <label class="label_color">
                            {!! Form::checkbox('midwifery_mode',$key),$value!!}
                        </label>
                    @endforeach
                </label>
            </div>
            </div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">新生儿窒息</label>
            <div class="col-sm-10" style="margin-top:6px;">


                <label>

                    @foreach(\App\Models\VisitNewborn::$asphyxia_neonate as $key=>$value)

                        {!! Form::radio('asphyxia_neonate',$key),$value!!}
                    @endforeach
                </label>

            </div></br>
            <label for="exampleInputName2" class="col-sm-2 control-label">畸形</label>
            <div class="col-sm-10" style="margin-top:6px;">
                @foreach(\App\Models\VisitNewborn::$deformity as $key=>$value)

                    {!! Form::radio('deformity',$key),$value!!}
                @endforeach
                <label>
                    {!! Form::text('deformity', '', ['id'=>'aother','class'=>'form-control','placeholder'=>'若有畸形，请输入畸形情况']) !!}
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">新生儿听力筛查</label>
            <div class="col-sm-10" style="margin-top:6px;">
                <label>

                    @foreach(\App\Models\VisitNewborn::$hearingScreening as $key=>$value)

                        {!! Form::radio('hearing_screening',$key),$value!!}
                    @endforeach
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">新生儿疾病筛查</label>
            <div class="col-sm-10" style="margin-top:6px;">

                <label>

                    @foreach(\App\Models\VisitNewborn::$diseaseScreening as $key=>$value)

                        {!! Form::radio('disease_screening',$key),$value!!}
                    @endforeach
                </label>
            </div>
        </div>





        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">新生儿体重</label>
            <div class="col-sm-10" style="margin-top: -2px;">
                <label>
                    <span style="font-weight: initial;">出生体重</span>
                    <label style="width:172px;">
                        {!! Form::text('birth_weight', '', ['id'=>'birth_weight','class'=>'form-control','placeholder'=>'请输入出生体重']) !!}
                    </label>
                    <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">kg</p></label>
                </label>
                <label>
                    <span style="font-weight: initial;">目前体重</span>
                    <label style="width:172px;">
                        {!! Form::text('weight', '', ['id'=>'weight','class'=>'form-control','placeholder'=>'请输入目前体重']) !!}
                    </label>
                    <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">kg</p></label>
                </label>
                <label>
                    <span style="font-weight: initial;">出生身长</span>
                    <label style="width:172px;">
                        {!! Form::text('birth_height', '', ['id'=>'birth_height','class'=>'form-control','placeholder'=>'请输入出生身长']) !!}
                    </label>
                    <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">cm</p></label>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">喂养方式</label>
            <div class="col-sm-10" style="margin-top:6px;">
                    <label class="label_color">
                        @foreach(\App\Models\VisitNewborn::$feedingPatterns as $key=>$value)

                        {!! Form::radio('feeding_patterns',$key),$value!!}
                        @endforeach
                    </label><br /><br />
            </div>
        </div>
        {{--@foreach(\App\Models\VisitNewborn::$feedingPatterns as $item)--}}
            {{--{!! Form::radio('feeding_patterns',$item)!!}--}}
        {{--@endforeach--}}

        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">吃奶量</label>
            <div class="col-sm-10" style="margin-top: -2px;">
                <label style="width:229px;">
                    {!! Form::text('feeding_amount', '', ['id'=>'feeding_amount','class'=>'form-control','placeholder'=>'请输入每次吃奶量']) !!}
                </label>
                <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">mL/次</p></label>
                <label>
                    <span>吃奶次数</span>
                    <label style="width:212px;">
                        {!! Form::text('feeding_frequency', '', ['id'=>'feeding_frequency','class'=>'form-control','placeholder'=>'请输入每日吃奶次数']) !!}
                    </label>
                    <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">次/日</p></label>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">体温</label>
            <div class="col-sm-10" style="margin-top: -2px;">
                <label>
                    <label style="width:178px;">
                        {!! Form::text('temperature', '', ['id'=>'temperature','class'=>'form-control','placeholder'=>'请输入新生儿体温']) !!}
                    </label>
                    <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">℃</p></label>
                </label>
                <label>
                    <span>心率</span>
                    <label style="width:178px;">
                        {!! Form::text('heart_rate', '', ['id'=>'heart_rate','class'=>'form-control','placeholder'=>'请输入新生儿心率']) !!}
                    </label>
                    <label><p style="font-size: 16px;font-weight: initial;margin-right: 20px;">次/分钟</p></label>
                </label>
                <label>
                    <span>呼吸频率</span>
                    <label style="width:178px;">
                        {!! Form::text('breathing_rate', '', ['id'=>'breathing_rate','class'=>'form-control','placeholder'=>'请输入呼吸频率']) !!}
                    </label>
                    <label><p style="font-size: 16px;font-weight: initial;">次/分钟</p></label>
                </label>
            </div>
        </div>
   <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">面色</label>
            <div class="col-sm-10">

                @foreach(\App\Models\VisitNewborn::$color_face as $key=>$value)

                    {!! Form::radio('color_face',$key),$value!!}
                @endforeach
                <label>
                    {!! Form::text('color_face', '', ['id'=>'breathing_rate','class'=>'form-control','placeholder'=>'请输入其他情况']) !!}
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">面黄疸部位</label>
            <div class="col-sm-10" style="margin-top: 6px;">

                @foreach(\App\Models\VisitNewborn::$jaundiceParts as $key=>$value)
                    <label class="label_color">
                        {!! Form::checkbox('jaundice_parts',$key),$value!!}
                    </label>
                @endforeach

            </div>
        </div>


        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">前囟</label>
            <div class="col-sm-10" id="week">
                <label>
                    <label style="width:227px;">
                        {!! Form::text('bregma', '', ['id'=>'bregma','class'=>'form-control','placeholder'=>'请输入前囟数值']) !!}
                    </label>
                    <label><p style="font-size: 16px;font-weight: initial;">cm<sup>2</sup></p></label>
                </label><br />
            </div>
        </div>




        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">眼睛</label>
            <div class="col-sm-10" style="margin-top: 6px;">
                <label class="label_color">

                    @foreach(\App\Models\VisitNewborn::$eye as $key=>$value)

                        {!! Form::radio('eye',$key),$value!!}
                    @endforeach

                </label>

                <label>
                    &nbsp;&nbsp;&nbsp;<span>四肢活动度</span>
                    <label class="label_color">


                        @foreach(\App\Models\VisitNewborn::$limb_mobility as $key=>$value)

                            {!! Form::radio('limb_mobility',$key),$value!!}
                        @endforeach

                    </label>
                    <label class="label_color"></label>&nbsp;
                </label>
                <label>
                    &nbsp;&nbsp;&nbsp;<span>耳外观</span>
                    <label class="label_color">


                        @foreach(\App\Models\VisitNewborn::$ear as $key=>$value)

                            {!! Form::radio('ear',$key),$value!!}
                        @endforeach


                       </label>&nbsp;&nbsp;
                </label>
                <label>
                    &nbsp;&nbsp;&nbsp;<span>颈部包块</span>
                    <label class="label_color">

                        @foreach(\App\Models\VisitNewborn::$cervical_mass as $key=>$value)
                            {!! Form::radio('cervical_mass',$key),$value!!}
                        @endforeach
                    </label>

                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">鼻</label>
            <div class="col-sm-10" style="margin-top: 6px;">
                <label class="label_color">
                    @foreach(\App\Models\VisitNewborn::$nose as $key=>$value)
                        {!! Form::radio('nose',$key),$value!!}
                    @endforeach

                    </label>
                <label>
                    &nbsp;&nbsp;&nbsp;<span>皮肤</span>

                    <label class="label_color">
                        @foreach(\App\Models\VisitNewborn::$skin as $key=>$value)
                            {!! Form::radio('skin',$key),$value!!}
                        @endforeach</label>
                </label>
                <label>
                    &nbsp;&nbsp;&nbsp;<span>肛门</span>

                    <label class="label_color">
                        @foreach(\App\Models\VisitNewborn::$portal_fissure as $key=>$value)
                            {!! Form::radio('portal_fissure',$key),$value!!}
                        @endforeach</label>

                    {{--</label>&nbsp;--}}

                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">心肺听诊</label>
            <div class="col-sm-10" style="margin-top: 6px;">
                <label class="label_color">


                    @foreach(\App\Models\VisitNewborn::$cardiopulmonary_auscu as $key=>$value)
                        {!! Form::radio('cardiopulmonary_auscultation',$key),$value!!}
                    @endforeach
                </label>
                <label>
                    &nbsp;&nbsp;&nbsp;<span>胸部</span>

                    <label class="label_color">

                        @foreach(\App\Models\VisitNewborn::$chest as $key=>$value)
                            {!! Form::radio('chest',$key),$value!!}
                        @endforeach
                    </label>
                </label>
                <label>
                    &nbsp;&nbsp;&nbsp;<span>腹部触诊</span>
                    <label class="label_color">
                        @foreach(\App\Models\VisitNewborn::$abdominal_touch as $key=>$value)
                            {!! Form::radio('abdominal_touch',$key),$value!!}
                        @endforeach
                    </label>
                </label>
                <label>
                    &nbsp;&nbsp;&nbsp;<span>脊柱</span>
                    <label class="label_color">

                        @foreach(\App\Models\VisitNewborn::$spine as $key=>$value)
                            {!! Form::radio('spine',$key),$value!!}
                        @endforeach
                    </label>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">外生殖器</label>
            <div class="col-sm-10" style="margin-top: 6px;">
                <label class="label_color">
                    @foreach(\App\Models\VisitNewborn::$aedea as $key=>$value)
                        {!! Form::radio('aedea',$key),$value!!}
                    @endforeach
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">脐带</label>
            <div class="col-sm-10">

                @foreach(\App\Models\VisitNewborn::$umbilicalCord as $key=>$value)
                    <label class="label_color">
                        {!! Form::checkbox('umbilical_cord',$key),$value!!}
                    </label>
                @endforeach

            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">转诊建议</label>
            <div class="col-sm-10" id="fayu_pingjia">
                <label>
                    <label class="label_color">
                        @foreach(\App\Models\VisitNewborn::$referral_recommendations as $key=>$value)
                            {!! Form::radio('referral_recommendations',$key),$value!!}
                        @endforeach
                    </label>
                </label><br />
                <label>
                </label>
                <label>
                    <span>原因&nbsp;&nbsp;</span>
                    <label>
                        {!! Form::text('referral_recommendations', '', ['id'=>'belly','class'=>'form-control','placeholder'=>'请输入转诊原因', 'style'=>"width:200px"]) !!}
                    </label>
                </label>
                <label>
                    <span>机构及科室&nbsp;&nbsp;</span>
                    <label>
                        {!! Form::text('keshi', '', ['id'=>'belly','class'=>'form-control','placeholder'=>'请输入机构及科室', 'style'=>"width:200px"]) !!}
                    </label>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputName2" class="col-sm-2 control-label">指导</label>
            <div class="col-sm-10" id="fayu_pingjia">

                    @foreach(\App\Models\VisitNewborn::$guides as $key=>$value)
                        <label class="label_color">
                            {!! Form::checkbox('guide',$key),$value!!}
                        </label>
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
                <div style="clear: both;"></div>
    </div>
    </div>
    <div class="modal-footer" style="text-align:center;">
        {!! Form::button('取消',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
        {!! Form::submit('提交', ['class'=>'btn btn-primary']) !!}
    </div>
{{ Form::close() }}
</body>
<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('assets/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('laravalid/jquery.validate.laravalid.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $('.getForm').validate({onkeyup: false});
    });
</script>
