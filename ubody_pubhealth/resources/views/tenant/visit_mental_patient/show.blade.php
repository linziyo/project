@extends('tenant.layout')
@push('css')
<link rel="stylesheet" type="text/css" href="/css/table.css"/>
@endpush
@section('content_header')
    <h1>严重精神障碍患者随访服务记录表</h1>
@stop

@section('content')
    <div class="box box-primary">
        <form class="form-horizontal" id="formArchive" method="post"  style="padding-bottom:50px;">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="archive_id" value="{{$model->archive_id}}">
            <div class="container">
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">姓名</label>
                    <div class="col-sm-8">
                        {!! Form::text('real_name', \App\Models\Archive::findOrFail($model->archive_id)->real_name, ['id'=>'real_name','class'=>'form-control', 'placeholder'=>'请输入姓名','disabled'=>'disabled']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">随访日期</label>
                    <div class="col-sm-5">
                        <div class="input-group date">
                            {!! Form::text('visited_at', $model->visited_at, ['id'=>'visited_at','class'=>'form-control','placeholder'=>'请输入出生日期', 'readonly'=>'true']) !!}
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">随访方式</label>
                    <div class="col-sm-4 healthy" style="margin-top:6px;">
                        <label class="label_color">{!! Form::radio('visit_mode', 1, $model->visit_mode == 1) !!} &nbsp;门诊 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::radio('visit_mode', 2, $model->visit_mode == 2) !!} &nbsp;家庭 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::radio('visit_mode', 3, $model->visit_mode == 3) !!} &nbsp;电话 </label>&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">若失访，原因</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        @if(isset($model->lost_visit))
                            <label class="label_color">{!! Form::radio('lost_visit', 1, $model->lost_visit == 1) !!}&nbsp;外出打工   </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('lost_visit', 2, $model->lost_visit == 2) !!}&nbsp;迁居他处   </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('lost_visit', 3, $model->lost_visit == 3) !!}&nbsp;走失   </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('lost_visit', 4, $model->lost_visit == 4) !!}&nbsp;连续 3 次未到访   </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('lost_visit', 5, $model->lost_visit == 5) !!}&nbsp;其他   </label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">{!! Form::radio('lost_visit', 1, false) !!}&nbsp;外出打工   </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('lost_visit', 2, false) !!}&nbsp;迁居他处   </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('lost_visit', 3, false) !!}&nbsp;走失   </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('lost_visit', 4, false) !!}&nbsp;连续 3 次未到访   </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('lost_visit', 5, false) !!}&nbsp;其他   </label>&nbsp;&nbsp;&nbsp;
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">如死亡，日期和原因</label>
                    <div class="col-sm-5">
                        <div class="input-group date">
                            {!! Form::text('death_at', $model->deaths->death_at, ['id'=>'death_at','class'=>'form-control','placeholder'=>'请输入出生日期', 'readonly'=>'true']) !!}
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="chear" style="clear: both;"></div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8 healthy" style="margin-top:6px;">
                        <p class="mt10">死亡原因</p>
                        @if(isset($model->deaths->cause_death))
                            <label class="label_color">	{!! Form::radio('cause_death', 1, $model->deaths->cause_death == 1) !!} &nbsp;躯体疾病  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 2, $model->deaths->cause_death == 2) !!} &nbsp;自杀  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 3, $model->deaths->cause_death == 3) !!} &nbsp;他杀  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 4, $model->deaths->cause_death == 4) !!} &nbsp;意外  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 5, $model->deaths->cause_death == 5) !!} &nbsp;精神疾病相关并发症  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 6, $model->deaths->cause_death == 6) !!} &nbsp;其他  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 7, $model->deaths->cause_death == 7) !!} &nbsp;传染病和寄生虫病  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 8, $model->deaths->cause_death == 8) !!} &nbsp;肿瘤  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 9, $model->deaths->cause_death == 9) !!} &nbsp;心脏病  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 10, $model->deaths->cause_death == 10) !!} &nbsp;脑血管病  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 11, $model->deaths->cause_death == 11) !!} &nbsp;呼吸系统疾病  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 12, $model->deaths->cause_death == 12) !!} &nbsp;消化系统疾病  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 13, $model->deaths->cause_death == 13) !!} &nbsp;其他疾病  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 14, $model->deaths->cause_death == 14) !!} &nbsp;不详  </label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">	{!! Form::radio('cause_death', 1, false) !!} &nbsp;躯体疾病  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 2, false) !!} &nbsp;自杀  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 3, false) !!} &nbsp;他杀  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 4, false) !!} &nbsp;意外  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 5, false) !!} &nbsp;精神疾病相关并发症  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 6, false) !!} &nbsp;其他  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 7, false) !!} &nbsp;传染病和寄生虫病  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 8, false) !!} &nbsp;肿瘤  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 9, false) !!} &nbsp;心脏病  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 10, false) !!} &nbsp;脑血管病  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 11, false) !!} &nbsp;呼吸系统疾病  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 12, false) !!} &nbsp;消化系统疾病  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 13, false) !!} &nbsp;其他疾病  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('cause_death', 14, false) !!} &nbsp;不详  </label>&nbsp;&nbsp;&nbsp;
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">危险性评估</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        @if(isset($model->risk_assessment))
                            <label class="label_color">{!! Form::radio('risk_assessment', 0, $model->risk_assessment == 0) !!}&nbsp;0 级  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('risk_assessment', 1, $model->risk_assessment == 1) !!}&nbsp;1 级  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('risk_assessment', 2, $model->risk_assessment == 2) !!}&nbsp;2 级  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('risk_assessment', 3, $model->risk_assessment == 3) !!}&nbsp;3 级  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('risk_assessment', 4, $model->risk_assessment == 4) !!}&nbsp;4 级  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('risk_assessment', 5, $model->risk_assessment == 5) !!}&nbsp;5 级  </label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">{!! Form::radio('risk_assessment', 0, false) !!}&nbsp;0 级  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('risk_assessment', 1, false) !!}&nbsp;1 级  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('risk_assessment', 2, false) !!}&nbsp;2 级  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('risk_assessment', 3, false) !!}&nbsp;3 级  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('risk_assessment', 4, false) !!}&nbsp;4 级  </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('risk_assessment', 5, false) !!}&nbsp;5 级  </label>&nbsp;&nbsp;&nbsp;
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">目前症状</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        <label class="label_color">{!! Form::checkbox('symptom', 1, array_has($symptomlist,1)) !!} 幻觉</label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::checkbox('symptom', 2, array_has($symptomlist,2)) !!} 交流困难</label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::checkbox('symptom', 3, array_has($symptomlist,3)) !!} 猜疑</label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::checkbox('symptom', 4, array_has($symptomlist,4)) !!} 喜怒无常</label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::checkbox('symptom', 5, array_has($symptomlist,5)) !!} 行为怪异</label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::checkbox('symptom', 6, array_has($symptomlist,6)) !!} 兴奋话多</label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::checkbox('symptom', 7, array_has($symptomlist,7)) !!} 伤人毁物</label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::checkbox('symptom', 8, array_has($symptomlist,8)) !!} 悲观厌世</label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::checkbox('symptom', 9, array_has($symptomlist,9)) !!} 无故外走</label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::checkbox('symptom', 10, array_has($symptomlist,10)) !!} 自语自笑</label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::checkbox('symptom', 11, array_has($symptomlist,11)) !!} 孤僻懒散</label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::checkbox('symptom', 12, array_has($symptomlist,12)) !!} 其他</label>&nbsp;&nbsp;&nbsp;
                        @if(array_has($symptomlist,12))
                            <input type="text" class="form-control text_long" name="symptom_content" value="{{$symptomlist[12]}}" placeholder="请输入其他" disabled="disabled" />
                        @else
                            <input type="text" class="form-control text_long" name="symptom_content" value="" placeholder="请输入其他" disabled="disabled" />
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">自知力</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        @if(isset($model->insight))
                            <label class="label_color">	{!! Form::radio('insight', 1, $model->insight == 1) !!} &nbsp;自知力完全</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('insight', 2, $model->insight == 2) !!} &nbsp;自知力不全</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('insight', 3, $model->insight == 3) !!} &nbsp;自知力缺失</label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">	{!! Form::radio('insight', 1, false) !!} &nbsp;自知力完全</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('insight', 2, false) !!} &nbsp;自知力不全</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">	{!! Form::radio('insight', 3, false) !!} &nbsp;自知力缺失</label>&nbsp;&nbsp;&nbsp;
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">睡眠情况</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        @if(isset($model->sleep))
                            <label class="label_color">{!! Form::radio('sleep', 1, $model->sleep == 1) !!}&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('sleep', 2, $model->sleep == 2) !!}&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('sleep', 3, $model->sleep == 3) !!}&nbsp;较差</label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">{!! Form::radio('sleep', 1, false) !!}&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('sleep', 2, false) !!}&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('sleep', 3, false) !!}&nbsp;较差</label>&nbsp;&nbsp;&nbsp;
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">饮食情况</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        @if(isset($model->diet))
                            <label class="label_color">{!! Form::radio('diet', 1, $model->diet == 1) !!}&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('diet', 2, $model->diet == 2) !!}&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('diet', 3, $model->diet == 3) !!}&nbsp;较差</label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">{!! Form::radio('diet', 1, false) !!}&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('diet', 2, false) !!}&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('diet', 3, false) !!}&nbsp;较差</label>&nbsp;&nbsp;&nbsp;
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">社会功能情况/个人生活料理</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        @if(isset($model->social_functions->personal_life))
                            <label class="label_color">{!! Form::radio('personal_life', 1,  $model->social_functions->personal_life == 1) !!}&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('personal_life', 2,  $model->social_functions->personal_life == 2) !!}&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('personal_life', 3,  $model->social_functions->personal_life == 3) !!}&nbsp;较差</label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">{!! Form::radio('personal_life', 1,  false) !!}&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('personal_life', 2,  false) !!}&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('personal_life', 3,  false) !!}&nbsp;较差</label>&nbsp;&nbsp;&nbsp;
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">社会功能情况/家务劳动</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        @if(isset($model->social_functions->housework))
                            <label class="label_color">{!! Form::radio('housework', 1, $model->social_functions->housework == 1) !!}&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('housework', 2, $model->social_functions->housework == 2) !!}&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('housework', 3, $model->social_functions->housework == 3) !!}&nbsp;较差</label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">{!! Form::radio('housework', 1, false) !!}&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('housework', 2, false) !!}&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('housework', 3, false) !!}&nbsp;较差</label>&nbsp;&nbsp;&nbsp;
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">社会功能情况/生产劳动及工作</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        @if(isset($model->social_functions->productive_labor))
                            <label class="label_color">{!! Form::radio('productive_labor', 1, $model->social_functions->productive_labor == 1) !!}&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('productive_labor', 2, $model->social_functions->productive_labor == 2) !!}&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('productive_labor', 3, $model->social_functions->productive_labor == 3) !!}&nbsp;较差</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('productive_labor', 4, $model->social_functions->productive_labor == 4) !!}&nbsp;此项不适用</label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">{!! Form::radio('productive_labor', 1, false) !!}&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('productive_labor', 2, false) !!}&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('productive_labor', 3, false) !!}&nbsp;较差</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('productive_labor', 4, false) !!}&nbsp;此项不适用</label>&nbsp;&nbsp;
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">社会功能情况/学习能力</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        @if(isset($model->social_functions->learning_ability))
                            <label class="label_color">{!! Form::radio('learning_ability', 1, $model->social_functions->learning_ability == 1) !!}&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('learning_ability', 2, $model->social_functions->learning_ability == 2) !!}&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('learning_ability', 3, $model->social_functions->learning_ability == 3) !!}&nbsp;较差</label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">{!! Form::radio('learning_ability', 1, false) !!}&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('learning_ability', 2, false) !!}&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('learning_ability', 3, false) !!}&nbsp;较差</label>&nbsp;&nbsp;&nbsp;
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">社会功能情况/社会人际交往</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        @if(isset($model->social_functions->interpersonal))
                            <label class="label_color">{!! Form::radio('interpersonal', 1, $model->social_functions->interpersonal == 1) !!}&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('interpersonal', 2, $model->social_functions->interpersonal == 2) !!}&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('interpersonal', 3, $model->social_functions->interpersonal == 3) !!}&nbsp;较差</label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">{!! Form::radio('interpersonal', 1, false) !!}&nbsp;良好</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('interpersonal', 2, false) !!}&nbsp;一般</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('interpersonal', 3, false) !!}&nbsp;较差</label>&nbsp;&nbsp;&nbsp;
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">危险行为 </label>
                    <div class="col-sm-10 healthy ">
                        @if(isset($model->dangerous_action[1]))
                            <label class="label_color col-sm-2" style="float:left;padding-left: 0;">
                                {!! Form::checkbox('minor_trouble', 1, $model->dangerous_action[1]['value']==1,['data-name'=>'nothing' ]) !!} &nbsp;轻度滋事
                            </label>
                            <input type="text" class="form-control text_long ml15" name="minor_trouble_content" value="{{$model->dangerous_action[1]['content']}}" placeholder="请输入轻度滋事 " disabled="disabled"><span>&nbsp;次</span>
                        @else
                            <label class="label_color col-sm-2" style="float:left;padding-left: 0;">
                                {!! Form::checkbox('minor_trouble', 1, false,['data-name'=>'nothing' ]) !!} &nbsp;轻度滋事
                            </label>
                            <input type="text" class="form-control text_long ml15" name="minor_trouble_content" value="" placeholder="请输入轻度滋事 " disabled="disabled"><span>&nbsp;次</span>
                        @endif
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10 healthy mt10">
                        @if(isset($model->dangerous_action[2]))
                            <label class="label_color col-sm-2" style="float:left;padding-left: 0;">
                                {!! Form::checkbox('trouble', 2, $model->dangerous_action[2]['value']==2,['data-name'=>'nothing' ]) !!} &nbsp;肇事
                            </label>
                            <input type="text" class="form-control text_long ml15" name="trouble_content" value="{{$model->dangerous_action[2]['content']}}" placeholder="请输入肇事 " disabled="disabled"><span>&nbsp;次</span>
                        @else
                            <label class="label_color col-sm-2" style="float:left;padding-left: 0;">
                                {!! Form::checkbox('trouble', 2, false,['data-name'=>'nothing' ]) !!}&nbsp;肇事
                            </label>
                            <input type="text" class="form-control text_long ml15" name="trouble_content" placeholder="请输入肇事 " disabled="disabled"><span>&nbsp;次</span>
                        @endif
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10 healthy mt10">
                        @if(isset($model->dangerous_action[3]))
                            <label class="label_color col-sm-2" style="float:left;padding-left: 0;">
                                {!! Form::checkbox('crime', 3, $model->dangerous_action[3]['value']==3,['data-name'=>'nothing' ]) !!}&nbsp;肇祸
                            </label>
                            <input type="text" class="form-control text_long ml15" name="crime_content" value="{{$model->dangerous_action[3]['content']}}" placeholder="请输入肇祸  " disabled="disabled"><span>&nbsp;次</span>
                        @else
                            <label class="label_color col-sm-2" style="float:left;padding-left: 0;">
                                {!! Form::checkbox('crime', 3,false,['data-name'=>'nothing' ]) !!}&nbsp;肇祸
                            </label>
                            <input type="text" class="form-control text_long ml15" name="crime_content" placeholder="请输入肇祸  " disabled="disabled"><span>&nbsp;次</span>
                        @endif
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10 healthy mt10">
                        @if(isset($model->dangerous_action[4]))
                            <label class="label_color col-sm-2" style="float:left;padding-left: 0;">
                                {!! Form::checkbox('other_harmful', 4, $model->dangerous_action[4]['value'] == 4,['data-name'=>'nothing' ]) !!}&nbsp;其他危害行为
                            </label>
                            <input type="text" class="form-control text_long ml15" name="other_harmful_content" value="{{$model->dangerous_action[4]['content']}}" placeholder="请输入其他危害行为 " disabled="disabled"><span>&nbsp;次</span>
                        @else
                            <label class="label_color col-sm-2" style="float:left;padding-left: 0;">
                                {!! Form::checkbox('other_harmful', 4, false,['data-name'=>'nothing' ]) !!}&nbsp;其他危害行为
                            </label>
                            <input type="text" class="form-control text_long ml15" name="other_harmful_content" placeholder="请输入其他危害行为 " disabled="disabled"><span>&nbsp;次</span>
                        @endif
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10 healthy mt10">
                        @if(isset($model->dangerous_action[5]))
                            <label class="label_color col-sm-2" style="float:left;padding-left: 0;">
                                {!! Form::checkbox('self_injury', 5, $model->dangerous_action[5]['value'] == 5,['data-name'=>'nothing' ]) !!}&nbsp;自伤
                            </label>
                            <input type="text" class="form-control text_long ml15" name="self_injury_content" value="{{$model->dangerous_action[5]['content']}}" placeholder="请输入自伤" disabled="disabled"><span>&nbsp;次</span>
                        @else
                            <label class="label_color col-sm-2" style="float:left;padding-left: 0;">
                                {!! Form::checkbox('self_injury', 5, false,['data-name'=>'nothing' ]) !!}&nbsp;自伤
                            </label>
                            <input type="text" class="form-control text_long ml15" name="self_injury_content" placeholder="请输入自伤" disabled="disabled"><span>&nbsp;次</span>
                        @endif
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10 healthy mt10">
                        @if(isset($model->dangerous_action[6]))
                            <label class="label_color col-sm-2" style="float:left;padding-left: 0;">
                                {!! Form::checkbox('attempted_suicide', 6, $model->dangerous_action[6]['value'] == 6,['data-name'=>'nothing' ]) !!}&nbsp;自杀未遂
                            </label>
                            <input type="text" class="form-control text_long ml15" name="attempted_suicide_content" value="{{$model->dangerous_action[6]['content']}}" placeholder="请输入自杀未遂 " disabled="disabled"><span>&nbsp;次</span>
                        @else
                            <label class="label_color col-sm-2" style="float:left;padding-left: 0;">
                                {!! Form::checkbox('attempted_suicide', 6, false,['data-name'=>'nothing' ]) !!}&nbsp;自杀未遂
                            </label>
                            <input type="text" class="form-control text_long ml15" name="attempted_suicide_content" placeholder="请输入自杀未遂 " disabled="disabled"><span>&nbsp;次</span>
                        @endif
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10 healthy mt10">
                        @if(isset($model->dangerous_action[7]))
                            <label class="label_color col-sm-2" style="float: left;padding-left: 0;">
                                {!! Form::checkbox('tige', 7, true) !!}&nbsp;无
                            </label>
                        @else
                            <label class="label_color col-sm-2" style="float: left;padding-left: 0;">
                                {!! Form::checkbox('tige', 7, false) !!}&nbsp;无
                            </label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">两次随访期间关锁情况</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        @if(isset($model->two_visit))
                            <label class="label_color">{!! Form::radio('two_visit', 1, $model->two_visit == 1) !!}&nbsp;无关锁</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('two_visit', 2, $model->two_visit == 2) !!}&nbsp;关锁</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('two_visit', 3, $model->two_visit == 3) !!}&nbsp;关锁已解除</label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">{!! Form::radio('two_visit', 1, false) !!}&nbsp;无关锁</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('two_visit', 2, false) !!}&nbsp;关锁</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('two_visit', 3, false) !!}&nbsp;关锁已解除</label>&nbsp;&nbsp;&nbsp;
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">两次随访期间住院情况</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        @if(isset($model->two_hospitalizations->two_hospitalization))
                            <label class="label_color">{!! Form::radio('two_hospitalization', 1, $model->two_hospitalizations->two_hospitalization == 1) !!}&nbsp;未住院 </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('two_hospitalization', 2, $model->two_hospitalizations->two_hospitalization == 2) !!}&nbsp;目前正在住院  </label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">{!! Form::radio('two_hospitalization', 1, false) !!}&nbsp;未住院 </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('two_hospitalization', 2, false) !!}&nbsp;目前正在住院  </label>&nbsp;&nbsp;&nbsp;
                        @endif
                        <br />
                        <div class="col-sm-5" style="padding-left: 0;">
                            <div class="input-group date">
                                {!! Form::text('hospital_date', $model->two_hospitalizations->hospital_date, ['id'=>'hospital_date','class'=>'form-control','placeholder'=>'请输入住院日期', 'readonly'=>'true']) !!}
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="control-label col-sm-2">实验室检查</label>
                    <div class="col-sm-6">
                        @if(isset($model->laboratory_examinations->laboratory_examination ))
                            <label class="label_color">
                                {!! Form::checkbox('laboratory_examination', 1, $model->laboratory_examinations->laboratory_examination == 1) !!} 无
                            </label>
                            <label class="label_color">
                                {!! Form::checkbox('laboratory_examination', 2, $model->laboratory_examinations->laboratory_examination == 2) !!} 有
                            </label>
                        @else
                            <label class="label_color">
                                {!! Form::checkbox('laboratory_examination', 1, false) !!} 无
                            </label>
                            <label class="label_color">
                                {!! Form::checkbox('laboratory_examination', 2, false) !!} 有
                            </label>
                        @endif
                        <label class="label_color">
                            <input class="form-control" placeholder="请输入有哪些药物不良反应" name="laboratory_examination_content" value="{{$model->laboratory_examinations->laboratory_examination_content}}" type="text" disabled="disabled">
                        </label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">用药依从性</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        @if(isset($model->medication_compliance ))
                            <label class="label_color">{!! Form::radio('medication_compliance', 1, $model->medication_compliance == 1) !!}&nbsp; 按医嘱规律用药</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('medication_compliance', 2, $model->medication_compliance == 2) !!}&nbsp; 间断用药</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('medication_compliance', 3, $model->medication_compliance == 3) !!}&nbsp; 不用药</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('medication_compliance', 4, $model->medication_compliance == 4) !!}&nbsp; 医嘱勿需用药</label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">{!! Form::radio('medication_compliance', 1, false) !!}&nbsp; 按医嘱规律用药</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('medication_compliance', 2, false) !!}&nbsp; 间断用药</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('medication_compliance', 3, false) !!}&nbsp; 不用药</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('medication_compliance', 4, false ) !!}&nbsp; 医嘱勿需用药</label>&nbsp;&nbsp;&nbsp;
                        @endif
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="control-label col-sm-2">药物不良反应</label>
                    <div class="col-sm-6">
                        @if(isset($model->adverse_drugs->adverse_drug))
                            <label class="label_color">
                                {!! Form::radio('adverse_drug', 1, $model->adverse_drugs->adverse_drug == 1) !!} 无
                            </label>
                            <label class="label_color">
                                {!! Form::radio('adverse_drug', 2, $model->adverse_drugs->adverse_drug == 2) !!} 有
                            </label>
                            <label class="label_color">
                                {!! Form::radio('adverse_drug', 3, $model->adverse_drugs->adverse_drug == 3) !!} 此项不适用
                            </label>
                        @else
                            <label class="label_color">
                                {!! Form::radio('adverse_drug', 1, false) !!} 无
                            </label>
                            <label class="label_color">
                                {!! Form::radio('adverse_drug', 2, false) !!} 有
                            </label>
                            <label class="label_color">
                                {!! Form::radio('adverse_drug', 3, false) !!} 此项不适用
                            </label>
                        @endif
                        <label class="label_color">
                            <input class="form-control" placeholder="请输入有哪些药物不良反应" name="adverse_drug_content" value="{{$model->adverse_drugs->adverse_drug_content}}" type="text" disabled="disabled">
                        </label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">治疗效果</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        @if(isset($model->treatment_effect))
                            <label class="label_color">{!! Form::radio('treatment_effect', 1,  $model->treatment_effect == 1) !!}&nbsp; 痊愈</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('treatment_effect', 2,  $model->treatment_effect == 2) !!}&nbsp; 好转</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('treatment_effect', 3,  $model->treatment_effect == 3) !!}&nbsp; 无变化</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('treatment_effect', 4,  $model->treatment_effect == 4) !!}&nbsp; 加重</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('treatment_effect', 5,  $model->treatment_effect == 5) !!}&nbsp; 此项不适用</label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">{!! Form::radio('treatment_effect', 1,  false) !!}&nbsp; 痊愈</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('treatment_effect', 2,  false) !!}&nbsp; 好转</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('treatment_effect', 3,  false) !!}&nbsp; 无变化</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('treatment_effect', 4,  false) !!}&nbsp; 加重</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('treatment_effect', 5,  false) !!}&nbsp; 此项不适用</label>&nbsp;&nbsp;&nbsp;
                        @endif
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">是否转诊</label>
                    <div class="col-sm-10 healthy">
                        @if(isset($model->referrals->referral))
                            <label class="label_color">{!! Form::radio('referral', 1, $model->referrals->referral == 1) !!}&nbsp;否 </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('referral', 2, $model->referrals->referral == 2) !!}&nbsp;是 </label>&nbsp;&nbsp;&nbsp;<br />
                        @else
                            <label class="label_color">{!! Form::radio('referral', 1, false) !!}&nbsp;否 </label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('referral', 2, false) !!}&nbsp;是 </label>&nbsp;&nbsp;&nbsp;<br />
                        @endif
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 healthy pddright0">
                        {!! Form::text('referral_reason', $model->referrals->referral_reason, ['id'=>'referral_reason','class'=>'form-control', 'placeholder'=>'请输入转诊原因' ]) !!}
                    </div>
                    <div class="col-sm-5 healthy pddright0">
                        {!! Form::text('organization_department', $model->referrals->organization_department, ['id'=>'organization_department','class'=>'form-control', 'placeholder'=>'请输入转诊机构及科别' ]) !!}
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">用药情况</label>
                    <div id="medicationSituationWrapper" class="col-md-10">
                        @foreach($model->medication_situations as $key=>$medications)
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="medication_name" value="{{$medications->medication_name}}" id="medication_name" placeholder="请输入药物名称 " />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control text_long ml15" name="medication_time" value="{{$medications->medication_time}}" id="" placeholder="请输入用法用量每日多少次 " />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="medication_dosage" value="{{$medications->medication_dosage}}" id="" placeholder="请输入用法用量每日多少" />
                                </div>
                                <div class="col-md-2">
                                    @if($key > 0)
                                        <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
                                    @else
                                        <button type="button" class="btn btn-default btn-flat btn-block append" data-source="#tplOperation" data-target="#medicationSituationWrapper"> 添加  </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">用药指导</label>
                    <div id="medicationInstructionWrapper" class="col-md-10">
                        @foreach($model->medication_instructions as $key=>$medications)
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="medications_name"  value="{{$medications->medications_name}}" id="medications_name" placeholder="请输入药物名称 " />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control text_long ml15" name="medications_time"  value="{{$medications->medications_time}}" id="medications_time" placeholder="请输入用法用量每日多少次 " />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="medications_dosage" value="{{$medications->medications_dosage}}"  id="medications_dosage" placeholder="请输入用法用量每日多少" />
                                </div>
                                <div class="col-md-2">
                                    @if($key > 0)
                                        <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
                                    @else
                                        <button type="button" class="btn btn-default btn-flat btn-block append" data-source="#tplOperation" data-target="#medicationInstructionWrapper"> 添加  </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">康复措施</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        <label class="label_color">{!! Form::checkbox('rehabilitation_measures', 1, array_has($rehabilitationlist,1)) !!}&nbsp;生活劳动能力 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::checkbox('rehabilitation_measures', 2, array_has($rehabilitationlist,2)) !!}&nbsp;职业训练 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::checkbox('rehabilitation_measures', 3, array_has($rehabilitationlist,3)) !!}&nbsp;学习能力 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::checkbox('rehabilitation_measures', 4, array_has($rehabilitationlist,4)) !!}&nbsp;社会交往 </label>&nbsp;&nbsp;&nbsp;
                        <label class="label_color">{!! Form::checkbox('rehabilitation_measures', 5, array_has($rehabilitationlist,5)) !!}&nbsp;其他 </label>&nbsp;&nbsp;&nbsp;<br />
                        @if(array_has($rehabilitationlist,5))
                            <input type="text" class="form-control text_long mt10" name="rehabilitation_measures_content" value="{{$rehabilitationlist[5]}}" disabled="disabled" id="" placeholder="请输入其他康复措施" />
                        @else
                            <input type="text" class="form-control text_long mt10" name="rehabilitation_measures_content" value="" disabled="disabled" id="" placeholder="请输入其他康复措施" />
                        @endif
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">本次随访分类</label>
                    <div class="col-sm-10 healthy" style="margin-top:6px;">
                        @if(isset($model->visit_classification))
                            <label class="label_color">{!! Form::radio('visit_classification', 1, $model->visit_classification == 1) !!}&nbsp;不稳定</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('visit_classification', 2, $model->visit_classification == 2) !!}&nbsp;基本稳定</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('visit_classification', 3, $model->visit_classification == 3) !!}&nbsp;稳定</label>&nbsp;&nbsp;&nbsp;
                        @else
                            <label class="label_color">{!! Form::radio('visit_classification', 1, false) !!}&nbsp;不稳定</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('visit_classification', 2, false) !!}&nbsp;基本稳定</label>&nbsp;&nbsp;&nbsp;
                            <label class="label_color">{!! Form::radio('visit_classification', 3, false) !!}&nbsp;稳定</label>&nbsp;&nbsp;&nbsp;
                        @endif
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">下次随访日期</label>
                    <div class="col-sm-5">
                        <div class="input-group date">
                            {!! Form::text('next_visited_at', $model->next_visited_at , ['id'=>'next_visited_at','class'=>'form-control','placeholder'=>'请填写下次随访日期', 'readonly'=>'true']) !!}
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2" class="col-sm-2 control-label">随访医生签名</label>
                    <div class="col-sm-10">
                        {!! Form::text('visit_doctor_signature', $model->visit_doctor_signature , ['id'=>'visit_doctor_signature','class'=>'form-control', 'placeholder'=>'请填写随访医生签名' ]) !!}
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-actions col-sm-10 col-sm-offset-2">
                        <input type="submit" value="提交" class="btn btn-primary"/>
                        <a href="javascript:void(history.back())" class="btn btn-default">返回</a>
                        {{--<a href="{{ URL::action('Tenant\ArchiveController@index') }}" class="btn btn-default">返回</a>--}}
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="modal fade" id="ajax">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
@stop

@section('js')

    <script type="text/javascript">
        function removeItem(obj) {
            $(obj).parent().parent().remove();
        }

        $(function () {
            $("#formArchive").validate({
                rules: {
                    visited_at: 'required',
                    visit_mode: 'required',
                    lost_visit: 'required',
                    risk_assessment: 'required',
                    insight: 'required',
                    sleep: 'required',
                    diet: 'required',
                    two_visit: 'required',
                    medication_compliance: 'required',
                    treatment_effect: 'required',
                    rehabilitation_measures: 'required',
                    visit_classification: 'required',
                    next_visited_at: 'required',
                    visit_doctor_signature: 'required'
                },
                submitHandler: function (form) {
                    var postData = {
                        '_method': $("input[name=_method]").val(),
                        '_token': $("input[name=_token]").val(),
                        'archive_id': $("input[name=archive_id]").val(),
                        'visited_at': $("input[name=visited_at]").val(),
                        'visit_mode': $("input[name=visit_mode]:checked").val(),
                        'lost_visit': $("input[name=lost_visit]:checked").val(),
                        'death':{
                            'death_at': $("input[name=death_at]").val(),
                            'cause_death': $("input[name=cause_death]:checked").val(),
                        },
                        'risk_assessment': $("input[name=risk_assessment]:checked").val(),
                        'symptom': $("input[name=symptom]:checked").map(function (index, element) {
                            return this.value == 12 ? {
                                    'value': this.value,
                                    'content': $("input[name=symptom_content]").val()
                                } : {'value': this.value,'content':'' };
                        }).get(),
                        'insight': $("input[name=insight]:checked").val(),
                        'sleep': $("input[name=sleep]:checked").val(),
                        'diet': $("input[name=diet]:checked").val(),
                        'social_function':{
                            'personal_life': $("input[name=personal_life]:checked").val(),
                            'housework': $("input[name=housework]:checked").val(),
                            'productive_labor': $("input[name=productive_labor]:checked").val(),
                            'learning_ability': $("input[name=learning_ability]:checked").val(),
                            'interpersonal': $("input[name=interpersonal]:checked").val(),
                        },
                        'two_visit': $("input[name=two_visit]:checked").val(),
                        'two_hospitalization':{
                            'two_hospitalization': $("input[name=two_hospitalization]:checked").val(),
                            'hospital_date': $("input[name=hospital_date]").val(),
                        },
                        'laboratory_examination':{
                            'laboratory_examination': $("input[name=laboratory_examination]:checked").val(),
                            'laboratory_examination_content': $("input[name=laboratory_examination_content]").val(),
                        },
                        'medication_compliance': $("input[name=medication_compliance]:checked").val(),
                        'adverse_drug':{
                            'adverse_drug': $("input[name=adverse_drug]:checked").val(),
                            'adverse_drug_content': $("input[name=adverse_drug_content]").val(),
                        },
                        'referral':{
                            'referral': $("input[name=referral]:checked").val(),
                            'referral_reason': $("input[name=referral_reason]").val(),
                            'organization_department': $("input[name=organization_department]").val(),
                        },
                        'treatment_effect': $("input[name=treatment_effect]:checked").val(),
                        'rehabilitation_measures': $("input[name=rehabilitation_measures]:checked").map(function (index, element) {
                            return this.value == 5 ? {
                                    'value': this.value,
                                    'content': $("input[name=rehabilitation_measures_content]").val()
                                } : {'value': this.value,'content':'' };
                        }).get(),

                        'visit_classification': $("input[name=visit_classification]:checked").val(),
                        'next_visited_at': $("input[name=next_visited_at]").val(),
                        'visit_doctor_signature': $("input[name=visit_doctor_signature]").val(),

                        'medication_situation': $("#medicationSituationWrapper").find('.row').map(function (index, element) {
                            return {
                                'medication_name': $(this).find("input[name=medication_name]").val(),
                                'medication_dosage': $(this).find("input[name=medication_dosage]").val(),
                                'medication_time': $(this).find("input[name=medication_time]").val()
                            };
                        }).get(),
                        'medication_instruction': $("#medicationInstructionWrapper").find('.row').map(function (index, element) {
                            return {
                                'medications_name': $(this).find("input[name=medications_name]").val(),
                                'medications_dosage': $(this).find("input[name=medications_dosage]").val(),
                                'medications_time': $(this).find("input[name=medications_time]").val()
                            };
                        }).get(),
                        'minor_trouble': $("input[name=minor_trouble]:checked").map(function (index, element) {
                            return this.value == 1? {
                                    'value': this.value,
                                    'content': $("input[name=minor_trouble_content]").val()
                                } : {'value': this.value};
                        }).get(),
                        'trouble': $("input[name=trouble]:checked").map(function (index, element) {
                            return this.value == 2? {
                                    'value': this.value,
                                    'content': $("input[name=trouble_content]").val()
                                } : {'value': this.value};
                        }).get(),
                        'crime': $("input[name=crime]:checked").map(function (index, element) {
                            return this.value == 3? {
                                    'value': this.value,
                                    'content': $("input[name=crime_content]").val()
                                } : {'value': this.value};
                        }).get(),
                        'other_harmful': $("input[name=other_harmful]:checked").map(function (index, element) {
                            return this.value == 4? {
                                    'value': this.value,
                                    'content': $("input[name=other_harmful_content]").val()
                                } : {'value': this.value};
                        }).get(),
                        'self_injury': $("input[name=self_injury]:checked").map(function (index, element) {
                            return this.value == 5? {
                                    'value': this.value,
                                    'content': $("input[name=self_injury_content]").val()
                                } : {'value': this.value};
                        }).get(),
                        'attempted_suicide': $("input[name=attempted_suicide]:checked").map(function (index, element) {
                            return this.value == 6? {
                                    'value': this.value,
                                    'content': $("input[name=attempted_suicide_content]").val()
                                } : {'value': this.value};
                        }).get(),
                        'tige': $("input[name=tige]:checked").map(function (index, element) {
                            return this.value == 7? {
                                    'value': this.value
                                } : {'value': this.value};
                        }).get(),


                    };

                    $.post("{{ URL::action('Tenant\VisitMentalPatientController@update',$model->id) }}", postData, function(data){
                        if(data.errorCode == 0){
                            window.location.href = "{{ URL::action('Tenant\ArchiveController@show',$model->archive_id) }}"
                        }
                    });
                    return false;
                }
            });

            $(".date").datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true,
                'language': 'zh-CN'
            });


            $("input[name=id_code]").change(function () {
                if ($(this).val().length == 18) {
                    $("input[name=follow-up-date]").val($(this).val().substr(6, 4) + '-' + $(this).val().substr(10, 2) + "-" + $(this).val().substr(12, 2));
                } else if ($(this).val().length == 15) {
                    $("input[name=follow-up-date]").val('19' + $(this).val().substr(6, 2) + '-' + $(this).val().substr(8, 2) + "-" + $(this).val().substr(8, 2));
                }
            });

            $("input[name=contact_name]").change(function () {
                $("input[name=emergency_contact_name]").val($(this).val());
            });

            $("input[name=contact_mobile]").change(function () {
                $("input[name=emergency_contact_mobile]").val($(this).val());
            });

            $("input[type=checkbox][name=payment_mode]:last").change(function () {
                if ($(this).is(':checked')) {
                    $("input[name=payment_mode_content]").removeAttr('disabled');
                } else {
                    $("input[name=payment_mode_content]").attr('disabled', 'disabled');
                }
            });
            $("input[type=checkbox][name=payment_mode]:last").change(function () {
                if ($(this).is(':checked')) {
                    $("input[name=symptom_content]").removeAttr('disabled');
                } else {
                    $("input[name=symptom_content]").attr('disabled', 'disabled');
                }
            });
            $("input[type=checkbox][name=minor_trouble]:last").change(function () {
                if ($(this).is(':checked')) {
                    $("input[name=minor_trouble_content]").removeAttr('disabled');
                } else {
                    $("input[name=minor_trouble_content]").attr('disabled', 'disabled');
                }
            });
            $("input[type=checkbox][name=trouble]:last").change(function () {
                if ($(this).is(':checked')) {
                    $("input[name=trouble_content]").removeAttr('disabled');
                } else {
                    $("input[name=trouble_content]").attr('disabled', 'disabled');
                }
            });
            $("input[type=checkbox][name=crime]:last").change(function () {
                if ($(this).is(':checked')) {
                    $("input[name=crime_content]").removeAttr('disabled');
                } else {
                    $("input[name=crime_content]").attr('disabled', 'disabled');
                }
            });
            $("input[type=checkbox][name=other_harmful]:last").change(function () {
                if ($(this).is(':checked')) {
                    $("input[name=other_harmful_content]").removeAttr('disabled');
                } else {
                    $("input[name=other_harmful_content]").attr('disabled', 'disabled');
                }
            });
            $("input[type=checkbox][name=self_injury]:last").change(function () {
                if ($(this).is(':checked')) {
                    $("input[name=self_injury_content]").removeAttr('disabled');
                } else {
                    $("input[name=self_injury_content]").attr('disabled', 'disabled');
                }
            });
            $("input[type=checkbox][name=attempted_suicide]:last").change(function () {
                if ($(this).is(':checked')) {
                    $("input[name=attempted_suicide_content]").removeAttr('disabled');
                } else {
                    $("input[name=attempted_suicide_content]").attr('disabled', 'disabled');
                }
            });
            $("input[name=allergy]").change(function () {
                if ($(this).val() == 1) {
                    if ($(this).is(':checked')) {
                        $("input[name=allergy]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                        $("input[name=allergy_content]").attr('disabled', 'disabled').empty();
                    } else {
                        $("input[type=checkbox][name=allergy]").not(":first").removeAttr('disabled');
                    }
                }
                if ($(this).val() == 5) {
                    if ($(this).is(':checked')) {
                        $("input[name=allergy_content]").removeAttr('disabled');
                    } else {
                        $("input[name=allergy_content]").attr('disabled', 'disabled');
                    }
                }
            });
            $("input[name= symptom]").change(function () {
                if ($(this).val() == 12) {
                    if ($(this).is(':checked')) {
                        $("input[name=symptom_content]").removeAttr('disabled');
                    } else {
                        $("input[name=symptom_content]").attr('disabled', 'disabled');
                    }
                }
            });
            $("input[name=minor_trouble]").change(function () {
                if ($(this).val() == 0) {
                    if ($(this).is(':checked')) {
                        $("input[name=minor_trouble_content]").removeAttr('disabled');
                    } else {
                        $("input[name=minor-trouble_content]").attr('disabled', 'disabled');
                    }
                }
            });
            $("input[name=trouble]").change(function () {
                if ($(this).val() == 0) {
                    if ($(this).is(':checked')) {
                        $("input[name=trouble_content]").removeAttr('disabled');
                    } else {
                        $("input[name=trouble_content]").attr('disabled', 'disabled');
                    }
                }
            });
            $("input[name=crime]").change(function () {
                if ($(this).val() == 0) {
                    if ($(this).is(':checked')) {
                        $("input[name=crime_content]").removeAttr('disabled');
                    } else {
                        $("input[name=crime_content]").attr('disabled', 'disabled');
                    }
                }
            });
            $("input[name=other_harmful]").change(function () {
                if ($(this).val() == 0) {
                    if ($(this).is(':checked')) {
                        $("input[name=other-harmful_content]").removeAttr('disabled');
                    } else {
                        $("input[name=other-harmful_content]").attr('disabled', 'disabled');
                    }
                }
            });
            $("input[name=self_injury_content]").change(function () {
                if ($(this).val() == 0) {
                    if ($(this).is(':checked')) {
                        $("input[name=self_injury_content]").removeAttr('disabled');
                    } else {
                        $("input[name=self_injury_content]").attr('disabled', 'disabled');
                    }
                }
            });
            $("input[name=attempted_suicide]").change(function () {
                if ($(this).val() == 0) {
                    if ($(this).is(':checked')) {
                        $("input[name=attempted_suicide_content]").removeAttr('disabled');
                    } else {
                        $("input[name=attempted_suicide_content]").attr('disabled', 'disabled');
                    }
                }
            });
            $("input[type=checkbox][name=expose]").change(function () {
                if ($(this).val() == 1) {
                    if ($(this).is(':checked')) {
                        $("input[name=expose]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                    } else {
                        $("input[name=expose]").not(":first").removeAttr('disabled');
                    }
                }
            });
            $("input[type=checkbox][name=adverse_drug]").change(function () {
                if ($(this).val() == 2) {
                    if ($(this).is(':checked')) {
                        $("input[name=adverse_drug_content]").removeAttr('disabled');
                    } else {
                        $("input[name=adverse_drug_content]").attr('disabled', 'disabled');
                    }
                }
                if ($(this).val() == 1){
                    if ($(this).is(':checked')) {
                        $("input[name=adverse_drug]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                    } else {
                        $("input[name=adverse_drug]").not(":first").removeAttr('disabled');
                    }
                }
            });
            $(".append").click(function () {
                $($(this).attr('data-target')).append($($(this).attr('data-source')).html());
            });
            $("input[name=disability]").change(function () {
                if ($(this).val() == 1) {
                    if ($(this).is(':checked')) {
                        $("input[name=disability]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                    } else {
                        $("input[name=disability]").not(":first").removeAttr('disabled');
                    }
                }
            });
            $("input[type=checkbox][name=hereditary_disease]").change(function () {
                if ($(this).val() == 2) {
                    if ($(this).is(':checked')) {
                        $("input[name=hereditary_disease_content]").removeAttr('disabled');
                    } else {
                        $("input[name=hereditary_disease_content]").attr('disabled', 'disabled');
                    }
                }
                if ($(this).val() == 1){
                    if ($(this).is(':checked')) {
                        $("input[name=hereditary_disease]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                    } else {
                        $("input[name=hereditary_disease]").not(":first").removeAttr('disabled');
                    }
                }
            });
            $("input[type=checkbox][name=laboratory_examination]").change(function () {
                if ($(this).val() == 2) {
                    if ($(this).is(':checked')) {
                        $("input[name=laboratory_examination_content]").removeAttr('disabled');
                    } else {
                        $("input[name=laboratory_examination_content]").attr('disabled', 'disabled');
                    }
                }
                if ($(this).val() == 1){
                    if ($(this).is(':checked')) {
                        $("input[name=laboratory_examination]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                    } else {
                        $("input[name=laboratory_examination]").not(":first").removeAttr('disabled');
                    }
                }
            });
            $("input[type=checkbox][name=tige]").click(function () {
                if ($(this).val() == 7){
                    if ($(this).is(':checked')) {
                        $("input[data-name=nothing]").attr('disabled', 'disabled');
                    } else {
                        $("input[data-name=nothing]").removeAttr('disabled');
                    }
                }
            });
            $("input[type=radio][name=adverse_drug]").change(function () {
                if ($(this).val() == 2) {
                    if ($(this).is(':checked')) {
                        $("input[name=adverse_drug_content]").removeAttr('disabled');
                    } else {
                        $("input[name=adverse_drug_content]").attr('disabled', 'disabled');
                    }
                }
            });
            $("input[type=checkbox][name=rehabilitation_measures]").change(function () {
                if ($(this).val() == 5) {
                    if ($(this).is(':checked')) {
                        $("input[name=rehabilitation_measures_content]").removeAttr('disabled');
                    } else {
                        $("input[name=rehabilitation_measures_content]").attr('disabled', 'disabled');
                    }
                }
            });
            $('.form-control').change(function () {
                if ($(this).children('option:selected').val() == 12) {
                    $("input[name=family_disease_content]").removeAttr('disabled');
                } else {
                    $("input[name=family_disease_content]").attr('disabled', 'disabled');
                }
            });
            $("#disease_value").change(function () {
                if ($(this).val() != 1) {
                    $("input[name=disease_content]").removeAttr('disabled');
                    $("input[name=disease_confirmed_at]").removeAttr('disabled');
                } else {
                    $("input[name=disease_content]").attr('disabled', 'disabled');
                    $("input[name=disease_confirmed_at]").attr('disabled', 'disabled');
                }
            });
            $("#injury_value").change(function () {
                if ($(this).val() != 1) {
                    $("input[name=injury_content]").removeAttr('disabled');
                    $("input[name=injury_confirmed_at]").removeAttr('disabled');
                } else {
                    $("input[name=injury_content]").attr('disabled', 'disabled');
                    $("input[name=injury_confirmed_at]").attr('disabled', 'disabled');
                }
            });
            $("#operation_value").change(function () {
                if ($(this).val() != 1) {
                    $("input[name=operation_content]").removeAttr('disabled');
                    $("input[name=operation_confirmed_at]").removeAttr('disabled');
                } else {
                    $("input[name=operation_content]").attr('disabled', 'disabled');
                    $("input[name=operation_confirmed_at]").attr('disabled', 'disabled');
                }
            });
            $("#transfusion_value").change(function () {
                if ($(this).val() != 1) {
                    $("input[name=transfusion_content]").removeAttr('disabled');
                    $("input[name=transfusion_confirmed_at]").removeAttr('disabled');
                } else {
                    $("input[name=transfusion_content]").attr('disabled', 'disabled');
                    $("input[name=transfusion_confirmed_at]").attr('disabled', 'disabled');
                }
            });

        });
    </script>

    <script id="tplOperation" type="text/template">
        <div class="row">
            <div class="col-sm-3">
                <input type="text" class="form-control" name="medication_name" id="" placeholder="请输入药物名称 " />
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control text_long ml15" name="medication_time" id="" placeholder="请输入用法用量每日多少次 " />
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="medication_dosage" id="" placeholder="请输入用法用量每日多少" />
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
            </div>
        </div>
    </script>
    <script id="tplOperations" type="text/template">
        <div class="row">
            <div class="col-sm-3">
                <input type="text" class="form-control" name="medications_name" id="" placeholder="请输入药物名称 " />
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control text_long ml15" name="medications_time" id="" placeholder="请输入用法用量每日多少次 " />
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="medications_dosage" id="" placeholder="请输入用法用量每日多少" />
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
            </div>
        </div>
    </script>

    <script type="text/javascript">
        $(function(){
            $('input').attr('disabled',true);
        })
    </script>
@stop