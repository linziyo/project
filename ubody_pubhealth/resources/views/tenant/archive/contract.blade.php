@extends('tenant.layout')

@section('css')
    <link href="{{ asset('assets/select2/css/select2.min.css') }}" rel="stylesheet"/>
@endsection

@section('content_header')
    <h1>档案详情</h1>
@endsection
<style type="text/css">
    .mailbox-read-message {
        width: 98%;
        border: 1px solid #d8dde3;
        padding-right: 10px;
    }
    .jiben-box {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .message {
        padding-left: 14px;
    }
    .message p {
        color: #292929;
        font-size: 14px;
    }
    .message-img {
        height: 70px;
        width: 70px;
        border-radius: 50%;
        background-size: cover;
        border: 1px solid #d8dde3;
        float: left;
        margin-left: 14px;
    }
    .main-ul {
        list-style: none;
    }
    .main-message {
        padding-left: 10%;
    }
    .main-ul li {
        color: #292929;
    }
    .li-first {
        font-size: 12px;
    }
    .li-p {
        padding-right: 20px;
        font-size: 16px
    }
    .li-p1{
        padding-right: 20px;
        font-size: 14px
    }
    .li-illness {
        font-size: 14px;
        border: 1px solid #d8dde3;
        padding: 6px 8px;
        margin-right: 6px;
        border-radius: 4px;
    }
    .li-second {
        padding-top: 26px;
        padding-bottom: 20px;
    }
    .li-record {
        padding-right: 18px;
        font-size: 14px;
    }
    .li-four {
        font-size: 14px
    }
    .li-recordgl {
        font-size: 14px;
        border: 1px solid #d8dde3;
        padding: 10px 24px;
        margin-right: 24px;
        border-radius: 6px;
    }

    .qianyue {
        color:#292929;
        font-size: 14px;
        border: 1px solid #d8dde3;
        border-radius: 4px;
        padding: 10px 26px;
    }
    .qy-message {
        position: absolute;
        top: 36px;
        right: 4%;
    }
    .yuqi {
        color:#292929;
        font-size: 14px;
        border: 1px solid #d8dde3;
        border-radius: 4px;
        padding: 10px 26px;
    }
    .yq-message {
        position: absolute;
        top: 92px;
        right: 4%;
    }
    .chart{
        height:350px;
        width: 98%;
        border: 1px solid #d8dde3;
        padding-right: 10px;
        margin-bottom: 10px;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">综合评价</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">健康建档</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ URL::action('Tenant\ArchiveController@show', $model->id) }}"> 基本信息</a></li>
                        <li><a href="{{ URL::action('Tenant\ArchiveController@getArchivesHealth', $model->id) }}"> 体检数据</a></li>
                    </ul>
                </div>
            </div>
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">健康评估</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">健康指导</h3>


                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{ URL::action('Tenant\ArchiveController@show', $model->id) }}"> 签约</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">健康干预</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#"> 随访记录</a></li>
                        <li><a href="#"> 双向转诊记录</a></li>
                    </ul>
                </div>
            </div>
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">健康评价</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#"> 健康效应</a></li>
                        <li><a href="#"> 健康效益</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body">
                    {{--<div class="box-header">--}}
                        {{--<ul>--}}
                            {{--@if(isset($health['alcohol']) && $health['alcohol'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--酒精浓度 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'alcohol']) }}"--}}
                                                    {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['alcohol'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>酒精浓度值:{{ $health['alcohol'][0]['Alcohol'] }}% </span>--}}
                                            {{--<span class="ml10">参考标准:20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['bloodFat']) && $health['bloodFat'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--血脂 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'bloodFat']) }}"--}}
                                                  {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['bloodFat'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>总胆固醇:{{ $health['bloodFat'][0]['TChol'] }}</span>--}}
                                            {{--<span class="ml10">参考标准:2.86-5.98mmol/L </span><br>--}}
                                            {{--<span>高密度脂蛋白:{{ $health['bloodFat'][0]['HdlChol'] }}</span>--}}
                                            {{--<span class="ml10">参考标准:0.94-2.0mmol/L </span><br>--}}
                                            {{--<span>甘油三酯:{{ $health['bloodFat'][0]['Trig'] }}</span>--}}
                                            {{--<span class="ml10">参考标准:0.56-1.7mmol/L </span><br>--}}
                                            {{--<span>低密度脂蛋白:{{ $health['bloodFat'][0]['CalcLdl'] }}</span>--}}
                                            {{--<span class="ml10">参考标准:2.07-3.12mmol/L </span><br>--}}
                                            {{--<span>血脂比值:{{ $health['bloodFat'][0]['TcHdl'] }}</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['bloodOxygen']) && $health['bloodOxygen'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--血氧 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'bloodOxygen']) }}"--}}
                                                  {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['bloodOxygen'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>血氧值:{{ $health['bloodOxygen'][0]['Oxygen'] }}% </span>--}}
                                            {{--<span class="ml10">参考标准:95% </span><br>--}}
                                            {{--<span>血氧列表值:{{ $health['bloodOxygen'][0]['OxygenList'] }} </span>--}}
                                            {{--<span class="ml10">脉率值:{{ $health['bloodOxygen'][0]['Bpm'] }} </span><br>--}}
                                            {{--<span>脉率列表值:{{ $health['bloodOxygen'][0]['BpmList'] }} </span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['bloodPressure']) && $health['bloodPressure'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--血压 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'bloodPressure']) }}"--}}
                                                  {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['bloodPressure'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>收缩压:{{ $health['bloodPressure'][0]['HighPressure'] }} </span>--}}
                                            {{--<span class="ml10">参考标准:60-89mmHg </span><br>--}}
                                            {{--<span>舒张压:{{ $health['bloodPressure'][0]['LowPressure'] }} </span>--}}
                                            {{--<span class="ml10">参考标准:90-139mmHg </span><br>--}}
                                            {{--<span>脉搏:{{ $health['bloodPressure'][0]['Pulse'] }} </span>--}}
                                            {{--<span class="ml10">参考标准:60-100mmHg </span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['bloodSugar']) && $health['bloodSugar'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--血糖 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'bloodSugar']) }}"--}}
                                                  {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['bloodSugar'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--@if($health['bloodSugar'][0]['BloodsugarType'] == 1)--}}
                                                {{--<span>空腹血糖:{{ $health['bloodSugar'][0]['BloodSugar'] }}</span>--}}
                                                {{--<span class="ml10">参考标准:3.9-6.1mmol/L</span><br>--}}
                                            {{--@elseif($health['bloodSugar'][0]['BloodsugarType'] == 2)--}}
                                                {{--<span>餐后血糖:{{ $health['bloodSugar'][1]['BloodSugar'] }}</span>--}}
                                                {{--<span class="ml10">参考标准:7.8-11.1mmol/L</span><br>--}}
                                            {{--@else--}}
                                                {{--<span>随机血糖:{{ $health['bloodSugar'][2]['BloodSugar'] }}</span>--}}
                                                {{--<span class="ml10">参考标准:<11.1mmol/L</span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['bMD']) && $health['bMD'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--骨密度 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'bMD']) }}"--}}
                                                   {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['bMD'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>T值:{{ $health['bMD'][0]['TSCORE'] }} </span>--}}
                                            {{--<span class="ml10">参考标准:>-1</span><br>--}}
                                            {{--<span>Z值:{{ $health['bMD'][0]['ZSCORE'] }} </span>--}}
                                            {{--<span class="ml10">参考标准:大于等于1</span><br>--}}
                                            {{--<span>骨质OI指数:{{ $health['bMD'][0]['OI'] }} </span>--}}
                                            {{--<span>骨质BQI指数:{{ $health['bMD'][0]['BQI'] }} </span><br>--}}
                                            {{--<span>超声声速:{{ $health['bMD'][0]['SOS'] }}(m/s) </span>--}}
                                            {{--<span>成人百分比:{{ $health['bMD'][0]['YOUNG_ADULT'] }} </span><br>--}}
                                            {{--<span>年龄百分比:{{ $health['bMD'][0]['AGE_MATCHED'] }} </span>--}}
                                            {{--<span>BUA:{{ $health['bMD'][0]['BUA'] }} </span><br>--}}
                                            {{--<span>预期发生骨质疏松的年龄:{{ $health['bMD'][0]['EOA'] }} </span>--}}
                                            {{--<span>相对骨折风险:{{ $health['bMD'][0]['RRF'] }} </span><br>--}}
                                            {{--<span>骨骼的生理年龄:{{ $health['bMD'][0]['PAB'] }} </span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['cardiovascular']) && $health['cardiovascular'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--心血管功能 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'cardiovascular']) }}"--}}
                                                     {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['cardiovascular'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>心脏功能:{{$health['cardiovascular'][0]['HeartFunction1']}} </span>--}}
                                            {{--<span class="ml10">心血管状况:{{$health['cardiovascular'][0]['VascularCondition1']}} </span><br>--}}
                                            {{--<span>心脏功能-简化数据:{{$health['cardiovascular'][0]['HeartFunction2']}} </span>--}}
                                            {{--<span class="ml10">心血管状况-简化数据:{{$health['cardiovascular'][0]['VascularCondition2']}} </span><br>--}}
                                            {{--<span>SV:{{$health['cardiovascular'][0]['SV']}} </span>--}}
                                            {{--<span class="ml10">CO:{{$health['cardiovascular'][0]['CO']}} </span><br>--}}
                                            {{--<span>HOV:{{$health['cardiovascular'][0]['HOV']}} </span>--}}
                                            {{--<span class="ml10">CMBV:{{$health['cardiovascular'][0]['CMBV']}} </span><br>--}}
                                            {{--<span>TPR:{{$health['cardiovascular'][0]['TPR']}} </span>--}}
                                            {{--<span class="ml10">PAWP:{{$health['cardiovascular'][0]['PAWP']}} </span><br>--}}
                                            {{--<span>N:{{$health['cardiovascular'][0]['N']}} </span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['chol']) && $health['chol'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--总胆固醇 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'chol']) }}"--}}
                                                    {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['chol'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>检测结果:{{ $health['chol'][0]['Chol'] }} </span>--}}
                                            {{--<span class="ml10">参考标准:2.86～5.98mmol/L</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['ecg']) && $health['ecg'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--远程心电 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'ecg']) }}"--}}
                                                    {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['ecg'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>心率:{{ $health['ecg'][0]['Hr'] }} </span>--}}
                                            {{--@if($health['member'][0]['Sex'] == 1)--}}
                                                {{--<span>参考标准:50-95 </span><br>--}}
                                            {{--@else--}}
                                                {{--<span>参考标准:55-95 </span><br>--}}
                                            {{--@endif--}}
                                            {{--<span>心电图数据:{{ $health['ecg'][0]['EcgData'] }} </span>--}}
                                            {{--<span>增益:{{ $health['ecg'][0]['nGain'] }} </span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['fat']) && $health['fat'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--脂肪 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'fat']) }}"--}}
                                                  {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['fat'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>体脂占比:{{ $health['fat'][0]['FatRate'] }}% </span>--}}
                                            {{--<span class="ml10">体脂肪量:{{ $health['fat'][0]['Fat'] }}kg </span><br>--}}
                                            {{--<span>非脂肪量:{{ $health['fat'][0]['ExceptFat'] }}kg </span>--}}
                                            {{--<span class="ml10">体水占比:{{ $health['fat'][0]['WaterRate'] }}% </span><br>--}}
                                            {{--<span>水含量:{{ $health['fat'][0]['Water'] }}kg </span>--}}
                                            {{--<span class="ml10">矿物质:{{ $health['fat'][0]['Minerals'] }}kg </span><br>--}}
                                            {{--<span>蛋白质含量:{{ $health['fat'][0]['Protein'] }}kg </span>--}}
                                            {{--<span class="ml10">细胞内液:{{ $health['fat'][0]['Fic'] }}kg </span><br>--}}
                                            {{--<span>细胞外液:{{ $health['fat'][0]['Foc'] }}kg </span>--}}
                                            {{--<span class="ml10">肌肉量:{{ $health['fat'][0]['Muscle'] }}kg </span><br>--}}
                                            {{--<span>脂肪调节:{{ $health['fat'][0]['FatAdjust'] }}kg </span>--}}
                                            {{--<span class="ml10">体重调节:{{ $health['fat'][0]['WeightAdjust'] }}kg </span><br>--}}
                                            {{--<span>基础代谢:{{ $health['fat'][0]['BasicMetabolism'] }}kg </span>--}}
                                            {{--<span class="ml10">内脏脂肪等级:{{ $health['fat'][0]['Viscera'] }} </span><br>--}}
                                            {{--<span>骨骼量:{{ $health['fat'][0]['Bmc'] }}kg </span>--}}
                                            {{--<span class="ml10">肌肉率:{{ $health['fat'][0]['MuscleRate'] }}% </span><br>--}}
                                            {{--<span>躯干肌肉量:{{ $health['fat'][0]['QuganMuscle'] }}kg </span>--}}
                                            {{--<span class="ml10">躯干脂肪量:{{ $health['fat'][0]['QuganFat'] }}kg </span><br>--}}
                                            {{--<span>左腿肌肉量:{{ $health['fat'][0]['ZuotuiMuscle'] }}kg </span>--}}
                                            {{--<span class="ml10">左臂肌肉量:{{ $health['fat'][0]['ZuobiMuscle'] }}kg </span><br>--}}
                                            {{--<span>右臂肌肉量:{{ $health['fat'][0]['YoubiMuscle'] }}kg </span>--}}
                                            {{--<span class="ml10">右腿肌肉量:{{ $health['fat'][0]['YoutuiMuscle'] }}kg </span><br>--}}
                                            {{--<span>左臂脂肪量:{{ $health['fat'][0]['ZuobiFat'] }}kg </span>--}}
                                            {{--<span class="ml10">左腿脂肪量:{{ $health['fat'][0]['ZuotuiFat'] }}kg </span><br>--}}
                                            {{--<span>右臂脂肪量:{{ $health['fat'][0]['YoubiFat'] }}kg </span>--}}
                                            {{--<span class="ml10">右腿脂肪量:{{ $health['fat'][0]['YoutuiFat'] }}kg </span><br>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['hb']) && $health['hb'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--血红蛋白 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'hb']) }}"--}}
                                                    {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['hb'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--@if($health['member'][0]['Sex'] == 1)--}}
                                                {{--<span>血红蛋白值:{{ $health['hb'][0]['Hb'] }}mmol/L </span>--}}
                                                {{--<span class="ml10">参考标准:7.45-9.93mmol/L </span><br>--}}
                                                {{--<span>红细胞比容:{{ $health['hb'][0]['Hct'] }}mmol/L </span>--}}
                                                {{--<span class="ml10">参考标准:40%-50% </span>--}}
                                            {{--@else--}}
                                                {{--<span>血红蛋白值:{{ $health['hb'][0]['Hb'] }}mmol/L </span>--}}
                                                {{--<span class="ml10">参考标准:6.83-9.31mmol/L </span><br>--}}
                                                {{--<span>红细胞比容:{{ $health['hb'][0]['Hct'] }}mmol/L </span>--}}
                                                {{--<span class="ml10">参考标准:37%-48% </span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['height']) && $health['height'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--身高体重 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'height']) }}"--}}
                                                    {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['height'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>身高:{{ $health['height'][0]['Height'] }}cm </span>--}}
                                            {{--<span class="ml10">体重:{{ $health['height'][0]['Weight'] }}kg </span><br>--}}
                                            {{--<span>BMI:{{ $health['height'][0]['BMI'] }} </span>--}}
                                            {{--<span class="ml10">理想体重:{{ $health['height'][0]['IdealWeight'] }}kg </span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['lung']) && $health['lung'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--肺活量 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'lung']) }}"--}}
                                                   {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['lung'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--@if($health['member'][0]['Sex'] == 1)--}}
                                                {{--<span>肺活量:{{ $health['lung'][0]['Lung'] }}ml </span>--}}
                                                {{--<span class="ml10">参考标准:>3470ml </span><br>--}}
                                                {{--<span>用力肺活量:{{ $health['lung'][0]['FVC'] }} </span>--}}
                                                {{--<span class="ml10">参考标准:>3062ml </span><br>--}}
                                            {{--@else--}}
                                                {{--<span>肺活量:{{ $health['lung'][0]['Lung'] }}ml </span>--}}
                                                {{--<span class="ml10">参考标准:>2440ml </span><br>--}}
                                                {{--<span>用力肺活量:{{ $health['lung'][0]['FVC'] }} </span>--}}
                                                {{--<span class="ml10">参考标准:>2266ml </span><br>--}}
                                            {{--@endif--}}
                                            {{--<span>用力呼气1秒量:{{ $health['lung'][0]['PEF'] }} </span>--}}
                                            {{--<span class="ml10">25% 肺活量时的用力呼气流速:{{ $health['lung'][0]['FEF25'] }} </span><br>--}}
                                            {{--<span>75% 肺活量时的用力呼气流速:{{ $health['lung'][0]['FEF75'] }} </span><br>--}}
                                            {{--<span>25% 肺活量到75%肺活量之间的平均呼气流速:{{ $health['lung'][0]['FEF2575'] }} </span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['minFat']) && $health['minFat'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--人体成分(脂肪) <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'minFat']) }}"--}}
                                                        {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['minFat'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>身高:{{ $health['minFat'][0]['Height'] }}cm </span>--}}
                                            {{--<span class="ml10">体重:{{ $health['minFat'][0]['Weight'] }} </span><br>--}}
                                            {{--<span>体脂肪率:{{ $health['minFat'][0]['FatRate'] }}% </span>--}}
                                            {{--<span class="ml10">基础代谢:{{ $health['minFat'][0]['BasicMetabolism'] }}</span><br>--}}
                                            {{--<span>BMI:{{ $health['minFat'][0]['Bmi'] }} </span>--}}
                                            {{--<span class="ml10">体质指数:{{ $health['minFat'][0]['Physique'] }}</span><br>--}}
                                            {{--<span>体型:{{ $health['minFat'][0]['Shape'] }} </span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['pEEcg']) && $health['pEEcg'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--12导心电 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'pEEcg']) }}"--}}
                                                     {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['pEEcg'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>心率值:{{ $health['pEEcg'][0]['Hr'] }}次/分 </span>--}}
                                            {{--<span>P 轴:{{ $health['pEEcg'][0]['PAxis'] }} </span><br>--}}
                                            {{--<span>QRS 轴:{{ $health['pEEcg'][0]['QRSAxis'] }}次/分 </span>--}}
                                            {{--<span>T 轴:{{ $health['pEEcg'][0]['TAxis'] }} </span><br>--}}
                                            {{--<span>PR 间期:{{ $health['pEEcg'][0]['PR'] }} </span>--}}
                                            {{--<span>QRS 时限:{{ $health['pEEcg'][0]['QRS'] }} </span><br>--}}
                                            {{--<span>QT 间期:{{ $health['pEEcg'][0]['QT'] }} </span>--}}
                                            {{--<span>QTc 间期:{{ $health['pEEcg'][0]['QTc'] }} </span><br>--}}
                                            {{--<span>RV5 幅度:{{ $health['pEEcg'][0]['RV5'] }} </span>--}}
                                            {{--<span>SV1 幅度:{{ $health['pEEcg'][0]['SV1'] }} </span><br>--}}
                                            {{--<span>心电图数据:{{ $health['pEEcg'][0]['EcgData'] }} </span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['temperature']) && $health['temperature'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--体温 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'temperature']) }}"--}}
                                                  {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['temperature'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>体温值:{{ $health['temperature'][0]['Temperature'] }}℃ </span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['uricAcid']) && $health['uricAcid'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--血尿酸 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'uricAcid']) }}"--}}
                                                   {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['uricAcid'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>尿酸值:{{ $health['uricAcid'][0]['Ua'] }} </span><br>--}}
                                            {{--<span>参考标准:(男性:0.21～0.43mmol/L 女性:0.16～0.36mmol/L 儿童:0.12～0.33mmol/L) </span><br>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['urinalysis']) && $health['urinalysis'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--尿液分析 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'urinalysis']) }}"--}}
                                                    {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['urinalysis'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>尿胆原:{{ $health['urinalysis'][0]['URO'] }} </span>--}}
                                            {{--<span>潜血:{{ $health['urinalysis'][0]['BLD'] }} </span><br>--}}
                                            {{--<span>胆红素:{{ $health['urinalysis'][0]['BIL'] }} </span>--}}
                                            {{--<span>酮体:{{ $health['urinalysis'][0]['KET'] }} </span><br>--}}
                                            {{--<span>白细胞:{{ $health['urinalysis'][0]['LEU'] }} </span>--}}
                                            {{--<span>葡萄糖:{{ $health['urinalysis'][0]['GLU'] }} </span><br>--}}
                                            {{--<span>蛋白质:{{ $health['urinalysis'][0]['PRO'] }} </span>--}}
                                            {{--<span>酸碱度:{{ $health['urinalysis'][0]['PH'] }} </span><br>--}}
                                            {{--<span>亚硝酸盐:{{ $health['urinalysis'][0]['NIT'] }} </span>--}}
                                            {{--<span>比重:{{ $health['urinalysis'][0]['SG'] }} </span><br>--}}
                                            {{--<span>维生素:{{ $health['urinalysis'][0]['VC'] }} </span>--}}
                                            {{--<span>微白蛋白:{{ $health['urinalysis'][0]['MAL'] }} </span><br>--}}
                                            {{--<span>肌酐:{{ $health['urinalysis'][0]['CR'] }} </span>--}}
                                            {{--<span>钙离子:{{ $health['urinalysis'][0]['UCA'] }} </span><br>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if(isset($health['whr']) && $health['whr'])--}}
                                {{--<li>--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-top">--}}
                                            {{--腰臀比 <a href="{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'whr']) }}"--}}
                                                   {{--data-toggle="modal" data-target="#ajax" class="btn btn-success btn-xs">[更多数据]</a>--}}
                                        {{--</div>--}}
                                        {{--@if($health['whr'][0]['health_analysis'] === false)--}}
                                            {{--<div class="card-middle text-success">正常</div>--}}
                                        {{--@else--}}
                                            {{--<div class="card-middle text-fail">非正常</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="card-bottom">--}}
                                            {{--<span>腰围:{{ $health['whr'][0]['Waistline'] }} </span>--}}
                                            {{--<span class="ml10">臀围:{{ $health['whr'][0]['Hipline'] }} </span><br>--}}
                                            {{--<span>腰臀比:{{ $health['whr'][0]['Whr'] }} </span>--}}
                                            {{--@if($health['member'][0]['Sex'] == 1)--}}
                                                {{--<span class="ml10">参考标准(腰臀比):≤90% </span>--}}
                                            {{--@else--}}
                                                {{--<span class="ml10">参考标准(腰臀比):≤80% </span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>

    <div class="modal fade" id="ajax">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
@stop

@push('js')
<script type="text/javascript" src="{{ asset('/assets/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/echarts.min.js') }}"></script>
@if(isset($health['alcohol'][0]['health_analysis']) && $health['alcohol'][0]['health_analysis'] == true)
    <script type="text/javascript">
        var alcohol = echarts.init(document.getElementById('alcohol_chart'));
        alcohol_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['酒精浓度值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'酒精浓度值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        alcohol.setOption(alcohol_data);
    </script>
    <script type="text/javascript">
        $(function(){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'alcohol']) }}",{'asynchronous':1},function(data){
                var alcohol_key = new Array();
                var alcohol_value = new Array();
                if(data){
                    for(var i=0;i<data.length;i++){
                        alcohol_key.push(data[i].MeasureTime);
                        alcohol_value.push(data[i].Alcohol);
                    }
                }
                alcohol_data.xAxis.data = alcohol_key;
                alcohol_data.series[0].data = alcohol_value;
                alcohol.setOption(alcohol_data);
            });
        });
    </script>
@endif
@if(isset($health['bloodFat'][0]['health_analysis']) && $health['bloodFat'][0]['health_analysis'] == true)
    <script type="text/javascript">
        var bloodFat = echarts.init(document.getElementById('bloodFat_chart'));
        bloodFat_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['总胆固醇','高密度脂蛋白','甘油三酯','低密度脂蛋白','血脂比值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'总胆固醇',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'高密度脂蛋白',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'甘油三酯',
                    type:'line',

                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'低密度脂蛋白',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'血脂比值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        bloodFat.setOption(bloodFat_data);
    </script>
    <script type="text/javascript">
        $(function(){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'bloodFat']) }}",{'asynchronous':1},function(data){
                var bloodFat_key = new Array();
                var bloodFat_TChol = new Array();
                var bloodFat_HdlChol = new Array();
                var bloodFat_Trig = new Array();
                var bloodFat_CalcLdl = new Array();
                var bloodFat_TcHdl = new Array();
                if(data){
                    for(var i=0;i<data.length;i++){
                        bloodFat_key.push(data[i].MeasureTime);
                        bloodFat_TChol.push(data[i].TChol);
                        bloodFat_HdlChol.push(data[i].HdlChol);
                        bloodFat_Trig.push(data[i].Trig);
                        bloodFat_CalcLdl.push(data[i].CalcLdl);
                        bloodFat_TcHdl.push(data[i].TcHdl);
                    }
                }
                bloodFat_data.xAxis.data = bloodFat_key;
                bloodFat_data.series[0].data = bloodFat_TChol;
                bloodFat_data.series[1].data = bloodFat_HdlChol;
                bloodFat_data.series[2].data = bloodFat_Trig;
                bloodFat_data.series[3].data = bloodFat_CalcLdl;
                bloodFat_data.series[4].data = bloodFat_TcHdl;
                bloodFat.setOption(bloodFat_data);
            });
        });
    </script>
@endif
@if(isset($health['bloodOxygen'][0]['health_analysis']) && $health['bloodOxygen'][0]['health_analysis'] == true)
    <script type="text/javascript">
        var bloodOxygen = echarts.init(document.getElementById('bloodOxygen_chart'));
        bloodOxygen_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['血氧值','血氧列表值','脉率值','脉率列表值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'血氧值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'血氧列表值',
                    type:'line',
                    data:[0]
                },
                {
                    name:'脉率值',
                    type:'line',
                    data:[0]
                },
                {
                    name:'脉率列表值',
                    type:'line',
                    data:[0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        bloodOxygen.setOption(bloodOxygen_data);
    </script>
    <script type="text/javascript">
        $(function(){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'bloodOxygen']) }}",{'asynchronous':1},function(data){
                var bloodOxygen_key = new Array();
                var bloodOxygen_Oxygen = new Array();
                var bloodOxygen_OxygenList = new Array();
                var bloodOxygen_Bpm = new Array();
                var bloodOxygen_BpmList = new Array();
                if(data){
                    for(var i=0;i<data.length;i++){
                        bloodOxygen_key.push(data[i].MeasureTime);
                        bloodOxygen_Oxygen.push(data[i].Oxygen);
                        bloodOxygen_OxygenList.push(data[i].OxygenList);
                        bloodOxygen_Bpm.push(data[i].Bpm);
                        bloodOxygen_BpmList.push(data[i].BpmList);
                    }
                }
                bloodOxygen_data.xAxis.data = bloodOxygen_key;
                bloodOxygen_data.series[0].data = bloodOxygen_Oxygen;
                bloodOxygen_data.series[1].data = bloodOxygen_OxygenList;
                bloodOxygen_data.series[2].data = bloodOxygen_Bpm;
                bloodOxygen_data.series[3].data = bloodOxygen_BpmList;
                bloodOxygen.setOption(bloodOxygen_data);
            });
        });
    </script>
@endif
@if(isset($health['bloodPressure'][0]['health_analysis']) && $health['bloodPressure'][0]['health_analysis'] == true)
    <script type="text/javascript">
        var blood_pressure = echarts.init(document.getElementById('blood_pressure_chart'));
        blood_pressure_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['收缩压','舒张压','脉搏']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'收缩压',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'舒张压',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'脉搏',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        blood_pressure.setOption(blood_pressure_data);
    </script>
    <script type="text/javascript">
        $(function(){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'bloodPressure']) }}",{'asynchronous':1},function(data){
                var blood_pressure_key = new Array();
                var blood_pressure_high = new Array();
                var blood_pressure_low = new Array();
                var blood_pressure_pulse = new Array();
                if(data){
                    for(var i=0;i<data.length;i++){
                        blood_pressure_key.push(data[i].MeasureTime);
                        blood_pressure_high.push(data[i].HighPressure);
                        blood_pressure_low.push(data[i].LowPressure);
                        blood_pressure_pulse.push(data[i].Pulse);
                    }
                }
                blood_pressure_data.xAxis.data = blood_pressure_key;
                blood_pressure_data.series[0].data = blood_pressure_high;
                blood_pressure_data.series[1].data = blood_pressure_low;
                blood_pressure_data.series[2].data = blood_pressure_pulse;
                blood_pressure.setOption(blood_pressure_data);
            });
        });
    </script>
@endif
@if(isset($health['bloodSugar'][0]['health_analysis']) && $health['bloodSugar'][0]['health_analysis'] == true)
    <script type="text/javascript">
        var bloodSugar = echarts.init(document.getElementById('bloodSugar_chart'));
        bloodSugar_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['空腹血糖','餐后血糖','随机血糖']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'空腹血糖',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'餐后血糖',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'随机血糖',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        bloodSugar.setOption(bloodSugar_data);
    </script>
    <script type="text/javascript">
        $(function(){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'bloodSugar']) }}",{'asynchronous':1},function(data){
                var bloodSugar_key = new Array();
                var bloodSugar_BloodSugar_1 = new Array();
                var bloodSugar_BloodSugar_2 = new Array();
                var bloodSugar_BloodSugar_3 = new Array();
                if(data){
                    for(var i=0;i<data.length;i++){
                        var BloodSugar_1 = 0;
                        var BloodSugar_2 = 0;
                        var BloodSugar_3 = 0;
                        if(data[i].BloodsugarType == 1){
                            BloodSugar_1 = data[i].BloodSugar;
                            bloodSugar_BloodSugar_1.push(BloodSugar_1);
                        }else if(data[i].BloodsugarType == 2) {
                            BloodSugar_2 = data[i].BloodSugar;
                            bloodSugar_BloodSugar_2.push(BloodSugar_2);
                        }else{
                            BloodSugar_3 = data[i].BloodSugar;
                            bloodSugar_BloodSugar_3.push(BloodSugar_3);
                        }
                        bloodSugar_key.push(data[i].MeasureTime);
                    }
                }
                bloodSugar_data.xAxis.data = bloodSugar_key;
                bloodSugar_data.series[0].data = bloodSugar_BloodSugar_1;
                bloodSugar_data.series[1].data = bloodSugar_BloodSugar_2;
                bloodSugar_data.series[2].data = bloodSugar_BloodSugar_3;
                bloodSugar.setOption(bloodSugar_data);
            });
        });
    </script>
@endif
@if(isset($health['chol'][0]['health_analysis']) && $health['chol'][0]['health_analysis'] == true)
    <script type="text/javascript">
        var chol = echarts.init(document.getElementById('chol_chart'));
        chol_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['总胆固醇值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'总胆固醇值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        chol.setOption(chol_data);
    </script>
    <script type="text/javascript">
        $(function(){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'chol']) }}",{'asynchronous':1},function(data){
                var chol_key = new Array();
                var chol_value = new Array();
                if(data){
                    for(var i=0;i<data.length;i++){
                        chol_key.push(data[i].MeasureTime);
                        chol_value.push(data[i].Chol);
                    }
                }
                chol_data.xAxis.data = chol_key;
                chol_data.series[0].data = chol_value;
                chol.setOption(chol_data);
            });
        });
    </script>
@endif
@if(isset($health['ecg'][0]['health_analysis']) && $health['ecg'][0]['health_analysis'] == true)
    <script type="text/javascript">
        var ecg = echarts.init(document.getElementById('ecg_chart'));
        ecg_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['心率']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'心率',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        ecg.setOption(ecg_data);
    </script>
    <script type="text/javascript">
        $(function(){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'ecg']) }}",{'asynchronous':1},function(data){
                var ecg_key = new Array();
                var ecg_value = new Array();
                if(data){
                    for(var i=0;i<data.length;i++){
                        ecg_key.push(data[i].MeasureTime);
                        ecg_value.push(data[i].Hr);
                    }
                }
                ecg_data.xAxis.data = ecg_key;
                ecg_data.series[0].data = ecg_value;
                ecg.setOption(ecg_data);
            });
        });
    </script>
@endif
@if(isset($health['fat'][0]['health_analysis']) && $health['fat'][0]['health_analysis'] == true)
    <script type="text/javascript">
        var fat = echarts.init(document.getElementById('fat_chart'));
        fat_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['体脂占比','基础代谢']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'体脂占比',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'基础代谢',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        fat.setOption(fat_data);
    </script>
    <script type="text/javascript">
        $(function(){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'fat']) }}",{'asynchronous':1},function(data){
                var fat_key = new Array();
                var fat_FatRate = new Array();
                var fat_BasicMetabolism = new Array();
                if(data){
                    for(var i=0;i<data.length;i++){
                        fat_key.push(data[i].MeasureTime);
                        fat_FatRate.push(data[i].FatRate);
                        fat_BasicMetabolism.push(data[i].BasicMetabolism);
                    }
                }
                fat_data.xAxis.data = fat_key;
                fat_data.series[0].data = fat_FatRate;
                fat_data.series[0].data = fat_BasicMetabolism;
                fat.setOption(fat_data);
            });
        });
    </script>
@endif
@if(isset($health['hb'][0]['health_analysis']) && $health['hb'][0]['health_analysis'] == true)
    <script type="text/javascript">
        var hb = echarts.init(document.getElementById('hb_chart'));
        hb_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['血红蛋白值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'血红蛋白值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        hb.setOption(hb_data);
    </script>
    <script type="text/javascript">
        $(function(){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'hb']) }}",{'asynchronous':1},function(data){
                var hb_key = new Array();
                var hb_value = new Array();
                if(data){
                    for(var i=0;i<data.length;i++){
                        hb_key.push(data[i].MeasureTime);
                        hb_value.push(data[i].Hb);
                    }
                }
                hb_data.xAxis.data = hb_key;
                hb_data.series[0].data = hb_value;
                hb.setOption(hb_data);
            });
        });
    </script>
@endif
@if(isset($health['height'][0]['health_analysis']) && $health['height'][0]['health_analysis'] == true)
    <script type="text/javascript">
        var height = echarts.init(document.getElementById('height_chart'));
        height_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['身高值','体重值','BMI值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'身高值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'体重值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'BMI值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        height.setOption(height_data);
    </script>
    <script type="text/javascript">
        $(function(){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'height']) }}",{'asynchronous':1},function(data){
                var height_key = new Array();
                var height_Height = new Array();
                var height_Weight = new Array();
                var height_BMI = new Array();
                if(data){
                    for(var i=0;i<data.length;i++){
                        height_key.push(data[i].MeasureTime);
                        height_Height.push(data[i].Height);
                        height_Weight.push(data[i].Weight);
                        height_BMI.push(data[i].BMI);
                    }
                }
                height_data.xAxis.data = height_key;
                height_data.series[0].data = height_Height;
                height_data.series[1].data = height_Weight;
                height_data.series[2].data = height_BMI;
                height.setOption(height_data);
            });
        });
    </script>
@endif
@if(isset($health['lung'][0]['health_analysis']) && $health['lung'][0]['health_analysis'] == true)
    <script type="text/javascript">
        var lung = echarts.init(document.getElementById('lung_chart'));
        lung_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['肺活量','用力肺活量']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'肺活量',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'用力肺活量',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        lung.setOption(lung_data);
    </script>
    <script type="text/javascript">
        $(function(){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'lung']) }}",{'asynchronous':1},function(data){
                var lung_key = new Array();
                var lung_Lung = new Array();
                var lung_FVC = new Array();
                var lung_PEF  = new Array();
                var lung_FEF25 = new Array();
                var lung_FEF75 = new Array();
                var lung_FEF2575 = new Array();
                if(data){
                    for(var i=0;i<data.length;i++){
                        lung_key.push(data[i].MeasureTime);
                        lung_Lung.push(data[i].Lung);
                        lung_FVC.push(data[i].FVC);
                        lung_PEF.push(data[i].PEF);
                        lung_FEF25.push(data[i].FEF25);
                        lung_FEF75.push(data[i].FEF75);
                        lung_FEF2575.push(data[i].FEF2575);
                    }
                }
                lung_data.xAxis.data = lung_key;
                lung_data.series[0].data = lung_Lung;
                lung_data.series[1].data = lung_FVC;
                lung.setOption(lung_data);
            });
        });
    </script>
@endif
@if(isset($health['minFat'][0]['health_analysis']) && $health['minFat'][0]['health_analysis'] == true)
    <script type="text/javascript">
        var minFat = echarts.init(document.getElementById('minFat_chart'));
        minFat_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['体型','体质指数']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'体型',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'体质指数',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        minFat.setOption(minFat_data);
    </script>
    <script type="text/javascript">
        $(function(){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'minFat']) }}",{'asynchronous':1},function(data){
                var minFat_key = new Array();
                var minFat_Shape = new Array();
                var minFat_Physique = new Array();

                if(data){
                    for(var i=0;i<data.length;i++){
                        minFat_key.push(data[i].MeasureTime);
                        minFat_Shape.push(data[i].Shape);
                        minFat_Physique.push(data[i].Physique);
                    }
                }
                minFat_data.xAxis.data = minFat_key;
                minFat_data.series[0].data = minFat_Shape;
                minFat_data.series[1].data = minFat_Physique;
                minFat.setOption(minFat_data);
            });
        });
    </script>
@endif
@if(isset($health['temperature'][0]['health_analysis']) && $health['temperature'][0]['health_analysis'] == true)
    <script type="text/javascript">
        var temperature = echarts.init(document.getElementById('temperature_chart'));
        temperature_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['体温值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'体温值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        temperature.setOption(temperature_data);
    </script>
    <script type="text/javascript">
        $(function(){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'temperature']) }}",{'asynchronous':1},function(data){
                var temperature_key = new Array();
                var temperature_value = new Array();

                if(data){
                    for(var i=0;i<data.length;i++){
                        temperature_key.push(data[i].MeasureTime);
                        temperature_value.push(data[i].Temperature);
                    }
                }
                temperature_data.xAxis.data = temperature_key;
                temperature_data.series[0].data = temperature_value;
                temperature.setOption(temperature_data);
            });
        });
    </script>
@endif
@if(isset($health['uricAcid'][0]['health_analysis']) && $health['uricAcid'][0]['health_analysis'] == true)
    <script type="text/javascript">
        var uricAcid = echarts.init(document.getElementById('uricAcid_chart'));
        uricAcid_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['尿酸值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'尿酸值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        uricAcid.setOption(uricAcid_data);
    </script>
    <script type="text/javascript">
        $(function(){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'uricAcid']) }}",{'asynchronous':1},function(data){
                var uricAcid_key = new Array();
                var uricAcid_value = new Array();

                if(data){
                    for(var i=0;i<data.length;i++){
                        uricAcid_key.push(data[i].MeasureTime);
                        uricAcid_value.push(data[i].Ua);
                    }
                }
                uricAcid_data.xAxis.data = uricAcid_key;
                uricAcid_data.series[0].data = uricAcid_value;
                uricAcid.setOption(uricAcid_data);
            });
        });
    </script>
@endif
@if(isset($health['whr'][0]['health_analysis']) && $health['whr'][0]['health_analysis'] == true)
    <script type="text/javascript">
        var whr = echarts.init(document.getElementById('whr_chart'));
        whr_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['腰围','臀围','腰臀比']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'腰围',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'臀围',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'腰臀比',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        whr.setOption(whr_data);
    </script>
    <script type="text/javascript">
        $(function(){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$model->id_code,'HealthType'=>'whr']) }}",{'asynchronous':1},function(data){
                var whr_key = new Array();
                var whr_Waistline = new Array();
                var whr_Hipline = new Array();
                var whr_Whr = new Array();

                if(data){
                    for(var i=0;i<data.length;i++){
                        whr_key.push(data[i].MeasureTime);
                        whr_Waistline.push(data[i].Waistline);
                        whr_Hipline.push(data[i].Hipline);
                        whr_Whr.push(data[i].Whr);
                    }
                }
                whr_data.xAxis.data = whr_key;
                whr_data.series[0].data = whr_Waistline;
                whr_data.series[1].data = whr_Hipline;
                whr_data.series[2].data = whr_Whr;
                whr.setOption(whr_data);
            });
        });
    </script>
@endif

<script type="text/javascript">
    $(function () {
        $('#ajax').on('hidden.bs.modal', function (e) {
            $(this).removeData("bs.modal");
        });

        $("#birthday").datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            'language': 'zh-CN'
        });
        $('.select2').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });

        $("#id_code").change(function () {
            $("#birthday").val($(this).val());
        });

        $("#contact_name").change(function () {
            $("#emergency_contact_name").val($(this).val());
        });

        $("#contact_mobile").change(function () {
            $("#emergency_contact_mobile").val($(this).val());
        });

        $('.btn-danger').click(function(){
            if(confirm('确定要删除')){
                $.post($(this).attr('href'),{'_method':'delete'},function(data){
                    if(data.success){
                        window.location.reload();
                    }
                });
            }
            return false;
        });
    });
</script>
@endpush