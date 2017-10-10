@extends('tenant.layout')

@section('css')
    <link href="{{ asset('assets/select2/css/select2.min.css') }}" rel="stylesheet"/>
    <link href="https://cdn.bootcss.com/select2-bootstrap-css/1.4.6/select2-bootstrap.css" rel="stylesheet">
@endsection

@section('content_header')
    <h1>健康体检表</h1>
@endsection

@section('content')
    <div id="app">
        <div class="box box-info">
            <form class="form-horizontal" method="post">
                <div class="box-header with-border">
                </div>
                <div class="box-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">基本信息</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2">姓名</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="请输入姓名"
                                           v-model="archive.real_name"/>
                                </div>
                                <label class="control-label col-sm-2">编号</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="请输入档案编号"
                                           v-model="archive.code"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">责任医生</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="请输入姓名"/>
                                </div>
                                <label class="control-label col-sm-2">体检日期</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="请输入责任医生"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">症状</label>
                                <div class="col-sm-10">
                                    <p>
                                        <select id="symptoms" multiple="multiple" class="control-form select2" style="width:100%">
                                            <option value="1">无症状</option>
                                            <option value="2">头痛</option>
                                            <option value="3">头晕</option>
                                            <option value="4">心悸</option>
                                            <option value="5">胸闷</option>
                                            <option value="6">胸痛</option>
                                            <option value="7">慢性咳嗽</option>
                                            <option value="8">咳痰</option>
                                            <option value="9">呼吸困难</option>
                                        </select>
                                    </p>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="1" v-model="symptoms"/>&nbsp;无症状
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="2" v-model="symptoms"/>&nbsp;头痛
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="3" v-model="symptoms"/>&nbsp;头晕
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="4" v-model="symptoms"/>&nbsp;心悸
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="5" v-model="symptoms"/>&nbsp;胸闷
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="6" v-model="symptoms"/>&nbsp;胸痛
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="7" v-model="symptoms"/>&nbsp;慢性咳嗽
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="8" v-model="symptoms"/>&nbsp;咳痰
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="9" v-model="symptoms"/>&nbsp;呼吸困难
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="10" v-model="symptoms"/>&nbsp;多饮
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="11" v-model="symptoms"/>&nbsp;多尿
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="12" v-model="symptoms"/>&nbsp;体重下降
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="13" v-model="symptoms"/>&nbsp;乏力
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="14" v-model="symptoms"/>&nbsp;关节肿痛
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="15" v-model="symptoms"/>&nbsp;视力模糊
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="16" v-model="symptoms"/>&nbsp;手脚麻木
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="17" v-model="symptoms"/>&nbsp;尿急
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="18" v-model="symptoms"/>&nbsp; 尿痛
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="19" v-model="symptoms"/>&nbsp;便秘
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="20" v-model="symptoms"/>&nbsp;腹泻
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="21" v-model="symptoms"/>&nbsp;恶心呕吐
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="22" v-model="symptoms"/>&nbsp; 眼花
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="23" v-model="symptoms"/>&nbsp;耳鸣
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="24" v-model="symptoms"/>&nbsp;乳房胀痛
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="symptom" value="25" v-model="symptoms"/>&nbsp;其他
                                    </label>
                                    <input class="other" type="text" name="" id="" placeholder="请输入其他症状"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">一般情况</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2">体温</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="请输入体温"
                                               v-model="common.temperature"/>
                                        <span class="input-group-addon">℃</span>
                                    </div>
                                </div>
                                <label class="control-label col-sm-2">脉率</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="请输入脉率"
                                               v-model="common.pulse_rate"/>
                                        <span class="input-group-addon">次/分</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">呼吸频率</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="请输入呼吸频率"
                                               v-model="common.breathing_rate"/>
                                        <span class="input-group-addon">次/分</span>
                                    </div>
                                </div>
                                <label class="control-label col-sm-2">血压</label>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="左侧"
                                               v-model="common.blood_pressure.left.systolic"/>
                                        <span class="input-group-addon">mmHg</span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="右侧"
                                               v-model="common.blood_pressure.left.diastolic"/>
                                        <span class="input-group-addon">mmHg</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">身高</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="请输入身高"
                                               v-model="common.height"/>
                                        <span class="input-group-addon">cm</span>
                                    </div>
                                </div>
                                <label class="control-label col-sm-2">体重</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="请输入体重"
                                               v-model="common.weight"/>
                                        <span class="input-group-addon">Kg</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">腰围</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="请输入腰围"
                                               v-model="common.waistline"/>
                                        <span class="input-group-addon">cm</span>
                                    </div>
                                </div>
                                <label class="control-label col-sm-2">体质指数(BMI)</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="请输入体质指数(BMI)"
                                               v-model="bmi"/>
                                        <span class="input-group-addon">Kg/㎡</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading"> 老年人</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2">健康状态自我评估*</label>
                                <div class="col-sm-10">
                                    <label class="radio-inline">
                                        <input type="radio" name="health_assessment" value="1"
                                               v-model="oldPeople.health_assessment"/> 满意
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="health_assessment" value="2"
                                               v-model="oldPeople.health_assessment"/> 基本满意
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="health_assessment" value="3"
                                               v-model="oldPeople.health_assessment"/> 说不清楚
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="health_assessment" value="4"
                                               v-model="oldPeople.health_assessment"/> 不太满意
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="health_assessment" value="5"
                                               v-model="oldPeople.health_assessment"/> 不满意
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">生活自理能力自我评估*</label>
                                <div class="col-sm-10">
                                    <label class="radio-inline">
                                        <input type="radio" name="self_care_assessment" value="1"
                                               v-model="oldPeople.self_care_assessment"/>&nbsp;可自理（0～3 分）
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="self_care_assessment" value="2"
                                               v-model="oldPeople.self_care_assessment"/>&nbsp;轻度依赖（4～8 分)
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="self_care_assessment" value="3"
                                               v-model="oldPeople.self_care_assessment"/>&nbsp;中度依赖（9～18 分)
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="self_care_assessment" value="4"
                                               v-model="oldPeople.self_care_assessment"/>&nbsp;不能自理（≥19 分）
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">认知功能*</label>
                                <div class="col-sm-10">
                                    <label class="radio-inline">
                                        <input type="radio" name="cognitive_function" value="1"
                                               v-model="oldPeople.cognitive_function"/> 粗筛阴性
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="cognitive_function" value="2"
                                               v-model="oldPeople.cognitive_function.value"/> 粗筛阳性， 简易智力状态检查，总分
                                        <input class="inputText" type="text" name="cognitive_function_result"
                                               v-model="oldPeople.cognitive_function.result"/>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">情感状态*</label>
                                <div class="col-sm-10">
                                    <label class="radio-inline">
                                        <input type="radio" name="affective_state" value="1"
                                               v-model="oldPeople.affective_state"/> 粗筛阴性
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="affective_state" value="2"
                                               v-model="oldPeople.affective_state.value"/> 粗筛阳性， 简易智力状态检查，总分
                                        <input class="inputText" type="text" name="affective_state_result"
                                               v-model="oldPeople.affective_state.result"/>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">生活方式</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="exercise_rate">体育锻炼</label>
                                <div class="col-sm-2">
                                    <select name="exercise_rate" class="form-control" v-model="lifestyle.exercise.rate">
                                        <option disabled value="">请选择锻炼频率</option>
                                        <option value="1">每天</option>
                                        <option value="2">每周一次以上</option>
                                        <option value="3">偶尔</option>
                                        <option value="4">不锻炼</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">每次时间</span>
                                        <input type="text" class="form-control" placeholder="每次锻炼时间"
                                               name="lifestyle_exercise_rate" v-model="lifestyle.exercise.duration"/>
                                        <span class="input-group-addon">分</span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">持续时间</span>
                                        <input type="text" class="form-control" placeholder="坚持锻炼时间"
                                               name="lifestyle_exercise_continued"
                                               v-model="lifestyle.exercise.continued"/>
                                        <span class="input-group-addon">年</span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">锻炼方式</span>
                                        <input type="text" class="form-control" placeholder="锻炼方式"
                                               name="lifestyle_exercise_mode" v-model="lifestyle.exercise.mode"/>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">饮食习惯</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="lifestyle_eating_habits" value="1"
                                               v-model="lifestyle.eating_habits"/> 荤素均衡
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="lifestyle_eating_habits" value="2"
                                               v-model="lifestyle.eating_habits"/>荤食为主
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="lifestyle_eating_habits" value="3"
                                               v-model="lifestyle.eating_habits"/>素食为主
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="lifestyle_eating_habits" value="4"
                                               v-model="lifestyle.eating_habits"/> 嗜盐
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="lifestyle_eating_habits" value="5"
                                               v-model="lifestyle.eating_habits"/> 嗜油
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="lifestyle_eating_habits" value="6"
                                               v-model="lifestyle.eating_habits"/> 嗜糖
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">吸烟情况</label>
                                <div class="col-sm-2">
                                    <select class="form-control" v-model="lifestyle.smoking.status">
                                        <option disabled value="">选择吸烟情况</option>
                                        <option value="1">从不吸烟</option>
                                        <option value="2">已戒烟</option>
                                        <option value="3">吸烟</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">日吸烟量</span>
                                        <input type="text" class="form-control" placeholder="日吸烟量"
                                               v-model="lifestyle.smoking.amount"/>
                                        <span class="input-group-addon">支</span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">开始年龄</span>
                                        <input type="text" class="form-control" placeholder="开始吸烟年龄"
                                               v-model="lifestyle.smoking.first_age"/>
                                        <span class="input-group-addon">岁</span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">戒烟年龄</span>
                                        <input type="text" class="form-control" placeholder="戒烟年龄"
                                               v-model="lifestyle.smoking.quit_age"/>
                                        <span class="input-group-addon">岁</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">饮酒情况</label>
                                <div class="col-sm-2">
                                    <select class="form-control" v-model="lifestyle.drinking.rate">
                                        <option disabled value="">选择饮酒频率</option>
                                        <option value="1">从不</option>
                                        <option value="2">偶尔</option>
                                        <option value="3">经常</option>
                                        <option value="4">每天</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">日饮酒量</span>
                                        <input type="text" class="form-control" placeholder="日饮酒量"
                                               v-model="lifestyle.drinking.amount"/>
                                        <span class="input-group-addon">两</span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">开始年龄</span>
                                        <input type="text" class="form-control" placeholder="开始饮酒年龄"
                                               v-model="lifestyle.drinking.first_age"/>
                                        <span class="input-group-addon">岁</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="lifestyle.drinking_drunkenness"
                                               v-model="lifestyle.drinking.drunkenness"/> 一年内是否醉酒
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" id="lifestyle_drinking_quit"
                                                   name="lifestyle_drinking_quit"
                                                   v-model="lifestyle.drinking.quit">
                                        </span>
                                        <label for="lifestyle_drinking_quit" class="input-group-addon">已戒酒</label>
                                        <input type="text" class="form-control" placeholder="戒酒年龄"
                                               :disabled="lifestyle.drinking.quit === false"
                                               v-model="lifestyle.drinking.quit_age"/>
                                        <span class="input-group-addon">岁</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">饮酒种类</label>
                                <div class="col-sm-4">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="lifestyle_drinking_kinds" value="1"
                                               v-model="lifestyle.drinking.kinds"/> 白酒
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="lifestyle_drinking_kinds" value="2"
                                               v-model="lifestyle.drinking.kinds"/> 啤酒
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="lifestyle_drinking_kinds" value="3"
                                               v-model="lifestyle.drinking.kinds"/> 红酒
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="lifestyle_drinking_kinds" value="4"
                                               v-model="lifestyle.drinking.kinds"/> 黄酒
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="lifestyle_drinking_kinds" value="5"
                                               v-model="lifestyle.drinking.kinds"/> 其他
                                    </label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="lifestyle_drinking_kinds"
                                           v-if="lifestyle.drinking.kinds"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">职业病危害因素接触史</label>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" v-model="lifestyle.occupational.sicked"/>
                                        </span>
                                        <input type="text" class="form-control"
                                               :disabled="lifestyle.occupational.sicked === false"
                                               v-model="lifestyle.occupational.work_type" placeholder="工种"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="lifestyle_occupational_work_age"
                                               :disabled="lifestyle.occupational.sicked === false"
                                               v-model=" lifestyle.occupational.work_age" placeholder="从业时间"/>
                                        <span class="input-group-addon">年</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">粉尘</span>
                                        <input type="text" class="form-control"
                                               v-model="lifestyle.occupational.kinds.powder.name"/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox"
                                                   v-model="lifestyle.occupational.kinds.powder.protected"/>
                                        </span>
                                        <input type="text" class="form-control"
                                               :disabled="lifestyle.occupational.kinds.powder.protected === false"
                                               v-model="lifestyle.occupational.kinds.powder.protection"
                                               placeholder="有防护措施"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">放射物质</span>
                                        <input type="text" class="form-control"
                                               v-model="lifestyle.occupational.kinds.radiation.name"/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox"
                                                   v-model="lifestyle.occupational.kinds.radiation.protected"/>
                                        </span>
                                        <input type="text" class="form-control"
                                               :disabled="lifestyle.occupational.kinds.radiation.protected === false"
                                               v-model="lifestyle.occupational.kinds.radiation.protection"
                                               placeholder="有防护措施"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">物理因素</span>
                                        <input type="text" class="form-control"
                                               v-model="lifestyle.occupational.kinds.physical.name"/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"
                                                                               v-model="lifestyle.occupational.kinds.physical.protected"/></span>
                                        <input type="text" class="form-control"
                                               :disabled="lifestyle.occupational.kinds.physical.protected === false"
                                               v-model="lifestyle.occupational.kinds.physical.protection"
                                               placeholder="有防护措施"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">化学物质</span>
                                        <input type="text" class="form-control"
                                               v-model="lifestyle.occupational.kinds.chemical.name"/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"
                                                                               v-model="lifestyle.occupational.kinds.chemical.protected"/></span>
                                        <input type="text" class="form-control"
                                               :disabled="lifestyle.occupational.kinds.chemical.protected === false"
                                               v-model="lifestyle.occupational.kinds.chemical.protection"
                                               placeholder="有防护措施"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">其他</span>
                                        <input type="text" class="form-control"
                                               v-model="lifestyle.occupational.kinds.other.name"/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"
                                                                               v-model="lifestyle.occupational.kinds.other.protected"/></span>
                                        <input type="text" class="form-control"
                                               :disabled="lifestyle.occupational.kinds.other.protected === false"
                                               v-model="lifestyle.occupational.kinds.other.protection"
                                               placeholder="有防护措施"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading"> 脏器功能</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2">口腔</label>
                                <div class="col-sm-2">
                                    <select class="form-control" v-model="organ.mouth.lip">
                                        <option disabled value="">口唇状况</option>
                                        <option value="1">红润</option>
                                        <option value="2">苍白</option>
                                        <option value="3">发绀</option>
                                        <option value="4">皲裂</option>
                                        <option value="5">疱疹</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control" v-model="organ.mouth.pharynx">
                                        <option disabled value="">咽部状况</option>
                                        <option value="1">无充血</option>
                                        <option value="2">充血</option>
                                        <option value="3">淋巴滤泡增生</option>
                                    </select>
                                </div>
                                <label class="control-label col-sm-1">齿列</label>
                                <div class="col-sm-5">
                                    <label class="checkbox-inline"><input type="checkbox" name="organ_mouth_dentition"
                                                                          value="1" v-model="organ.mouth.dentition"/> 正常</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="organ_mouth_dentition"
                                                                          value="2" v-model="organ.mouth.dentition"/> 缺齿</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="organ_mouth_dentition"
                                                                          value="3" v-model="organ.mouth.dentition"/> 龋齿</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="organ_mouth_dentition"
                                                                          value="4" v-model="organ.mouth.dentition"/>
                                        义齿(假牙)</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">视力</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="organ_eye_left"
                                           v-model="organ.eye.left" placeholder="请输入左眼视力"/>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="organ_eye_right"
                                           v-model="organ.eye.right" placeholder="请输入右眼视力"/>
                                </div>
                                <label class="control-label col-sm-1">矫正视力</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="organ_eye_corrected_left"
                                           v-model="organ.eye.corrected.left" placeholder="请输入左眼视力"/>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="organ_eye_corrected_right"
                                           v-model="organ.eye.corrected.right" placeholder="请输入左眼视力"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">听力</label>
                                <div class="col-sm-10">
                                    <label class="radio-inline">
                                        <input type="radio" name="organ_hearing" :checked="organ.hearing === true"
                                               value="1"/>&nbsp;听见
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="organ_hearing" :checked="organ.hearing===false"
                                               value="2"/>&nbsp;听不清或无法听见
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">运动功能</label>
                                <div class="col-sm-10">
                                    <label class="radio-inline">
                                        <input type="radio" name="organ_movement" :checked="organ.movement === true"
                                               value="1"/>&nbsp;可顺利完成
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="organ_movement" :checked="organ.movement===false"
                                               value="2"/>&nbsp;无法独立完成任何一个动作
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">查体</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2">眼底*</label>
                                <div class="col-sm-2">
                                    <label class="checkbox-inline"><input type="checkbox" value=""/> 异常</label>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="" id="" placeholder="请输入异常"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">皮肤</label>
                                <div class="col-sm-8">
                                    <label class="radio-inline">
                                        <input type="radio" value=""/> 正常
                                    </label>
                                    <label class="radio-inline"><input type="radio" value=""/> 潮红</label>
                                    <label class="radio-inline"><input type="radio" value=""/> 苍白</label>
                                    <label class="radio-inline"><input type="radio" value=""/> 发绀</label>
                                    <label class="radio-inline"><input type="radio" value=""/> 黄染</label>
                                    <label class="radio-inline"><input type="radio" value=""/> 色素沉着</label>
                                    <label class="radio-inline"><input type="radio" value=""/> 其他</label>
                                    <label class="radio-inline"><input type="text" class="form-control" name="" id=""
                                                                       placeholder="请输入其它"/></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">巩膜</label>
                                <div class="col-sm-10">
                                    <label class="radio-inline"> <input type="radio" value=""/>&nbsp;正常 </label>
                                    <label class="radio-inline"> <input type="radio" value=""/>&nbsp;黄染 </label>
                                    <label class="radio-inline"> <input type="radio" value=""/>&nbsp;充血 </label>
                                    <label class="radio-inline"> <input type="radio" value=""/>&nbsp;其他&nbsp;
                                    </label>
                                    <label class="radio-inline"> <input type="text" class="form-control" name="" id=""
                                                                        placeholder="请输入其它"/></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">淋巴结</label>
                                <div class="col-sm-10">
                                    <label class="radio-inline"> <input type="radio" value=""/> 未触及 </label>
                                    <label class="radio-inline"> <input type="radio" value=""/> 锁骨上 </label>
                                    <label class="radio-inline"> <input type="radio" value=""/> 腋窝 </label>
                                    <label class="radio-inline"> <input type="radio" value=""/> 其他 </label>
                                    <label class="radio-inline"> <input type="text" class="form-control" name="" id=""
                                                                        placeholder="请输入其它"/> </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">肺</label>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox" value=""/> </span>
                                        <input type="text" value="" placeholder="呼吸音异常" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="checkbox-inline"><input type="checkbox" value=""/> 桶状胸</label>
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control">
                                        <option>罗音</option>
                                        <option value="1">无</option>
                                        <option value="2">干罗音</option>
                                        <option value="3">湿罗音</option>
                                        <option value="4">其他</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" value="" placeholder="呼吸音异常" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">心脏</label>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="" id="" placeholder="心率"/>
                                        <span class="input-group-addon">次/分</span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control">
                                        <option>心率</option>
                                        <option value="1">齐</option>
                                        <option value="2">不齐</option>
                                        <option value="3">绝对不齐</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox" value=""/></span>
                                        <input type="text" class="form-control" name="" id="" placeholder="有杂音"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">腹部</label>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"/></span>
                                        <input type="text" class="form-control" name="" id="" placeholder="压痛"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"/></span>
                                        <input type="text" class="form-control" name="" id="" placeholder="包块"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"/></span>
                                        <input type="text" class="form-control" name="" id="" placeholder="肝大"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"/></span>
                                        <input type="text" class="form-control" name="" id="" placeholder="脾大"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"/></span>
                                        <input type="text" class="form-control" name="" id="" placeholder="移动性浊音"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">下肢水肿/</label>
                                <div class="col-sm-10">
                                    <label class="radio-inline"> <input type="radio" value="" name="oo"/> 无 </label>
                                    <label class="radio-inline"> <input type="radio" value="" name="oo"/> 单侧 </label>
                                    <label class="radio-inline"> <input type="radio" value="" name="oo"/> 双侧不对称 </label>
                                    <label class="radio-inline"> <input type="radio" value="" name="oo"/> 双侧对称 </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">足背动脉搏动*</label>
                                <div class="col-sm-10">
                                    <label class="radio-inline"> <input type="radio" value=""/>&nbsp;未触及 </label>
                                    <label class="radio-inline"> <input type="radio" value=""/>&nbsp;触及双侧对称 </label>
                                    <label class="radio-inline"> <input type="radio" value=""/>&nbsp;触及左侧弱或消失 </label>
                                    <label class="radio-inline"> <input type="radio" value=""/>&nbsp;触及右侧弱或消失 </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">肛门指诊*</label>
                                <div class="col-sm-2">
                                    <select class="form-control">
                                        <option>未及异常</option>
                                        <option>未及异常</option>
                                        <option>触痛</option>
                                        <option>包块</option>
                                        <option>前列腺异常</option>
                                        <option>其他</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="" id="" placeholder="其他"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">乳腺*</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline"><input type="checkbox" value="1"/> 未见异常</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="2"/> 乳房切除</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="3"/> 异常泌乳</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="4"/> 乳腺包块</label>
                                    <label class="checkbox-inline"><input type="checkbox" value="5"/> 其他</label>
                                    <label class="checkbox-inline"><input type="text" class="form-control" name="" id=""
                                                                          placeholder="其他"/></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">妇科*</label>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"/></span>
                                        <input type="text" class="form-control" name="" id="" placeholder="外阴异常"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"/></span>
                                        <input type="text" class="form-control" name="" id="" placeholder="阴道异常"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"/></span>
                                        <input type="text" class="form-control" name="" id="" placeholder="宫颈异常"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"/></span>
                                        <input type="text" class="form-control" name="" id="" placeholder="宫体异常"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"/></span>
                                        <input type="text" class="form-control" name="" id="" placeholder="附件异常"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">其他*</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">辅助检查</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2">血常规*</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">血红蛋白</span>
                                        <input type="text" class="form-control" name="" placeholder="请输入血红蛋白"/>
                                        <span class="input-group-addon">g/L</span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">白细胞</span>
                                        <input type="text" class="form-control" name="" placeholder="请输入白细胞"/>
                                        <span class="input-group-addon">×10<sup>9</sup>/L</span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">血小板</span>
                                        <input type="text" class="form-control" name="" placeholder="血小板"/>
                                        <span class="input-group-addon">×10<sup>9</sup>/L</span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">其他</span>
                                        <input type="text" class="form-control" name="" placeholder="其他"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">尿常规*</label>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">尿蛋白</span>
                                        <input type="text" class="form-control text_long" name="" id=""
                                               placeholder="尿蛋白"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">尿糖</span>
                                        <input type="text" class="form-control text_long" name="" id=""
                                               placeholder="尿糖"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">尿酮体</span>
                                        <input type="text" class="form-control text_long" name="" id=""
                                               placeholder="尿酮体"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">尿潜血</span>
                                        <input type="text" class="form-control text_long" name="" id=""
                                               placeholder="尿潜血"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">其他</span>
                                        <input type="text" class="form-control text_long" name="" id=""
                                               placeholder="其他"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">空腹血糖*</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="" placeholder="请输入空腹血糖"/>
                                        <span class="input-group-addon">mmol/L</span>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="" placeholder="请输入空腹血糖"/>
                                        <span class="input-group-addon">mmol/dL</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">心电图*</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"/></span>
                                        <input type="text" class="form-control" name="" placeholder="请输入空腹血糖"/>
                                        <span class="input-group-btn">
                                        <input type="button" value="上传图片" class="btn btn-default"/>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">尿微量白蛋白*</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="" placeholder="请输入尿微量白蛋白"/>
                                        <span class="input-group-addon">mg/dL</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">大便潜血*</label>
                                <div class="col-sm-6">
                                    <label class="radio-inline"><input type="radio" value="1"/> 阴性</label>
                                    <label class="radio-inline"><input type="radio" value="2"/> 阳性</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">糖化血红蛋白*</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="" id=""/>
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">乙型肝炎表面抗原*</label>
                                <div class="col-sm-10">
                                    <label class="radio-inline"><input type="radio" name="" id=""/>&nbsp;阴性</label>
                                    <label class="radio-inline"><input type="radio" name="" id=""/>&nbsp;阳性</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">肝功能*</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">血清谷丙转氨酶</span>
                                        <input type="text" class="form-control" name="" placeholder="请输入血清谷丙转氨酶"/>
                                        <span class="input-group-addon">U/L</span>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">血清谷草转氨酶</span>
                                        <input type="text" class="form-control" name="" placeholder="请输入血清谷草转氨酶"/>
                                        <span class="input-group-addon">U/L</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3 col-sm-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">白蛋白</span>
                                        <input type="text" class="form-control" name="" placeholder="请输入白蛋白"/>
                                        <span class="input-group-addon">g/L</span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">总胆红素</span>
                                        <input type="text" class="form-control" name="" placeholder="请输入总胆红素"/>
                                        <span class="input-group-addon">μmol/L</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">结合胆红素</span>
                                        <input type="text" class="form-control" name="" placeholder="请输入结合胆红素"/>
                                        <span class="input-group-addon">μmol/L</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">肾功能*</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">血清肌酐</span>
                                        <input type="text" class="form-control" name="" placeholder="请输入血清肌酐"/>
                                        <span class="input-group-addon">μmol/L</span>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">血尿素</span>
                                        <input type="text" class="form-control" name="" placeholder="请输入血尿素"/>
                                        <span class="input-group-addon">mmol/L</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5 col-sm-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">血钾浓度</span>
                                        <input type="text" class="form-control" name="" placeholder="请输入血钾浓度"/>
                                        <span class="input-group-addon">mmol/L</span>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">血钠浓度</span>
                                        <input type="text" class="form-control" name="" placeholder="请输入血钠浓度"/>
                                        <span class="input-group-addon">mmol/L</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">血脂*</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">总胆固醇</span>
                                        <input type="text" class="form-control" name="" placeholder="请输入总胆固醇"/>
                                        <span class="input-group-addon">mmol/L</span>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">甘油三酯</span>
                                        <input type="text" class="form-control" name="" placeholder="请输入甘油三酯"/>
                                        <span class="input-group-addon">mmol/L</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5 col-sm-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">血清低密度脂蛋白胆固醇</span>
                                        <input type="text" class="form-control" name="" placeholder="请输入血清低密度脂蛋白胆固醇"/>
                                        <span class="input-group-addon">mmol/L</span>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">血清高密度脂蛋白胆固醇</span>
                                        <input type="text" class="form-control" name="" placeholder="请输入血清高密度脂蛋白胆固醇"/>
                                        <span class="input-group-addon">mmol/L</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">胸部X线片*</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox" value="2"/></span>
                                        <input type="text" class="form-control" name="" placeholder="异常"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">B超*</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">腹部B超</span>
                                        <span class="input-group-addon"><input type="checkbox" value="2"/></span>
                                        <input type="text" class="form-control" name="" placeholder="异常"/>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">其他</span>
                                        <span class="input-group-addon"><input type="checkbox" value="2"/></span>
                                        <input type="text" class="form-control" name="" placeholder="异常"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">宫颈涂片*</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox" value="2"/></span>
                                        <input type="text" class="form-control" name="" placeholder="异常"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">其他*</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="" placeholder="其他"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">现存主要健康问题</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2">脑血管疾病</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline"> <input type="checkbox" value="1"/>&nbsp;未发现 </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value="2"/>&nbsp;缺血性卒中
                                    </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value="3"/>&nbsp;脑出血 </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value="4"/>&nbsp;蛛网膜下腔出血
                                    </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value="5"/>&nbsp;短暂性脑缺血发作
                                    </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value="6"/>&nbsp;其他 </label>
                                    <label class="checkbox-inline"> <input type="text" class="form-control" name=""
                                                                           id=""
                                                                           placeholder="请输入其他"/></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">肾脏疾病</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;未发现 </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;糖尿病肾病
                                    </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;肾功能衰竭
                                    </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;急性肾炎 </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;慢性肾炎 </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;其他 </label>
                                    <label class="checkbox-inline"> <input type="text" class="form-control" name=""
                                                                           id=""
                                                                           placeholder="请输入其他"/></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">心脏疾病</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;未发现 </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;心肌梗死 </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;心绞痛 </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;冠状动脉血运重建
                                    </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;充血性心力衰竭
                                    </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;心前区疼痛
                                    </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;其他 </label>
                                    <label class="checkbox-inline">
                                        <input type="text" class="form-control" name="" id="" placeholder="请输入其他"/>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">血管疾病</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;未发现 </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;夹层动脉瘤
                                    </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;动脉闭塞性疾病
                                    </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;其他 </label>
                                    <label class="checkbox-inline"> <input type="text" class="form-control" name=""
                                                                           id=""
                                                                           placeholder="请输入其他"/></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">眼部疾病</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;未发现 </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;视网膜出血或渗
                                    </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;视乳头水肿
                                    </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;白内障 </label>
                                    <label class="checkbox-inline"> <input type="checkbox" value=""/>&nbsp;其他 </label>
                                    <label class="checkbox-inline"> <input type="text" class="form-control" name=""
                                                                           id=""
                                                                           placeholder="请输入其他"/></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">神经系统疾病</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"/></span>
                                        <input type="text" class="form-control" name="" id="" placeholder="请输入其他"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">其他系统疾病</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><input type="checkbox"/></span>
                                        <input type="text" class="form-control" name="" id="" placeholder="请输入其他"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">住院治疗情况</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2">住院史</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="" placeholder="入院日期"/>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="" placeholder="出院日期"/>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="" placeholder="原因"/>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="" placeholder="医疗机构名称"/>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="" placeholder="病案号"/>
                                                <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="" placeholder="入院日期"/>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="" placeholder="出院日期"/>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="" placeholder="原因"/>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="" placeholder="医疗机构名称"/>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="" placeholder="病案号"/>
                                                <span class="input-group-addon"><i class="fa fa-remove"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">家庭病床史</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="" placeholder="建床日期"/>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="" placeholder="撤床日期"/>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="" placeholder="原因"/>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="" placeholder="医疗机构名称"/>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="" placeholder="病案号"/>
                                                <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="" placeholder="建床日期"/>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="" placeholder="撤床日期"/>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="" placeholder="原因"/>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="" placeholder="医疗机构名称"/>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="" placeholder="病案号"/>
                                                <span class="input-group-addon"><i class="fa fa-remove"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">主要用药情况</div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>药物名称</th>
                                    <th>用法</th>
                                    <th>用量</th>
                                    <th>用药时间</th>
                                    <th>服药依从性</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="text" class="form-control"/></td>
                                    <td><input type="text" class="form-control"/></td>
                                    <td><input type="text" class="form-control"/></td>
                                    <td><input type="text" class="form-control"/></td>
                                    <td><input type="text" class="form-control"/></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">非免疫规划预防接种史
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>名称</th>
                                    <th>接种日期</th>
                                    <th>接种机构</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><input type="text" class="form-control"/></td>
                                    <td><input type="text" class="form-control"/></td>
                                    <td><input type="text" class="form-control"/></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">健康评价</div>
                        <div class="panel-body healthy">
                            <ul class="list-unstyled">
                                <li>
                                    <div class="input-group">
                                        <span class="input-group-addon">体检异常</span>
                                        <input type="text" class="form-control"/>
                                        <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">健康指导</div>
                        <div class="panel-body healthy">
                            <label class="checkbox-inline">
                                <input type="checkbox"/>&nbsp;纳入慢性病患者健康管理
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox"/>&nbsp;建议复查
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox"/>&nbsp;建议转诊
                            </label>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <label for="name">健康指导/危险因素控制</label>
                        </div>
                        <div class="panel-body healthy">
                            <label class="input-group">
                                <span class="input-group-addon"><input type="checkbox"/></span>
                                <span class="input-group-addon">戒烟</span>
                                <span class="form-conrol"></span>
                            </label>
                            <label class="input-group">
                                <span class="input-group-addon"><input type="checkbox"/></span>
                                <span class="input-group-addon">健康饮酒</span>
                                <span class="form-conrol"></span>
                            </label>
                            <label class="input-group">
                                <span class="input-group-addon"><input type="checkbox"/></span>
                                <span class="input-group-addon">饮食</span>
                                <span class="form-conrol"></span>
                            </label>
                            <label class="input-group">
                                <span class="input-group-addon"><input type="checkbox"/></span>
                                <span class="input-group-addon">锻炼</span>
                                <span class="form-conrol"></span>
                            </label>
                            <label class="input-group">
                                <span class="input-group-addon"><input type="checkbox"/></span>
                                <span class="input-group-addon">减体重</span>
                                <input type="text" class="form-control" placeholder="请输入减体重目标"/>
                                <span class="input-group-addon">Kg</span>
                            </label>
                            <label class="input-group">
                                <span class="input-group-addon"><input type="checkbox"/></span>
                                <span class="input-group-addon">接种疫苗</span>
                                <input type="text" class="form-control" placeholder="请输入减体重目标"/>
                            </label>
                            <label class="input-group">
                                <span class="input-group-addon"><input type="checkbox"/></span>
                                <span class="input-group-addon">其他</span>
                                <input type="text" class="form-control" placeholder="请输入其他"/>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-actions col-sm-offset-2">
                        <input type="submit" value="提交" class="btn btn-primary"/>
                        <a href="{{ URL::action('Tenant\ArchiveController@index') }}"
                           class="btn btn-default">返回</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
<script src="//cdn.bootcss.com/vue/2.4.1/vue.min.js"></script>
<script src="//cdn.bootcss.com/vue-resource/1.3.4/vue-resource.min.js"></script>
<script src="//cdn.bootcss.com/vue-router/2.7.0/vue-router.min.js"></script>
<script src="{{ asset('/assets/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $("#symptoms").select2({
            tags: true,
            maximumSelectionLength: 3
        });
    });
    new Vue({
        el: '#app',
        data: {
            "created_at": "2017-01-01",
            "doctor": {
                "real_name": "樊声波",
            },
            "symptoms": [1, 4, 7, 2, 21, 3, 14, 13],
            "archive": {
                "code": "00000000000011111",
                "real_name": "樊声波"
            },
            "common": {
                "temperature": 36.5,
                "pulse_rate": 80,
                "breathing_rate": 20,
                "blood_pressure": {
                    "left": {"systolic": 120, "diastolic": 80},
                    "right": {"systolic": 120, "diastolic": 80}
                },
                "height": 176,
                "weight": 70,
                "waistline": 120
            },
            "oldPeople": {
                "health_assessment": 1,
                "self_care_assessment": 1,
                "cognitive_function": {"value": 2, result: 100},
                "affective_state": {"value": 2, result: 100},
            },
            "lifestyle": {
                "exercise": {
                    "rate": 1,
                    "duration": 60,
                    "continued": 5,
                    "mode": "跑步"
                },
                "eating_habits": [1, 2, 3, 4],
                "smoking": {
                    "status": 2,
                    "amount": 20,
                    "first_age": 12,
                    "quit_age": 35
                },
                "drinking": {
                    "rate": 2,
                    "amount": 0.1,
                    "quit": true,
                    "quit_age": 35,
                    "first_age": 20,
                    "drunkenness": true,
                    "kinds": [1, 2, 3, 4, 5]
                },
                "occupational": {
                    "sicked": true,
                    "work_type": "计算机",
                    "work_age": 16,
                    "kinds": {
                        "powder": {"name": "", "protected": false, "protection": ""},
                        "radiation": {"name": "", "protected": false, "protection": ""},
                        "physical": {"name": "", "protected": false, "protection": ""},
                        "chemical": {"name": "", "protected": false, "protection": ""},
                        "other": {"name": "电脑", "protected": true, "protection": "戴眼镜"}
                    }
                }
            },
            "organ": {
                "mouth": {"lip": 1, "dentition": [1], "pharynx": 1},
                "eye": {"left": 5.9, "right": 5.9, "corrected": {"left": 5.9, "right": 5.9}},
                "hearing": true,
                "movement": true
            },
            "body_check": {
                "eye_ground": {},
                "skin": {},
                "sclera": {},
                "lymph_node": {},
                "lung": {},
                "heart": {},
                "abdomen": {},
                "edema_of_lower_extremity ": {},
                "dorsalis_pedis": {},
                "porta_hepatis": {},
                "breast": {},
                "gynaecology": {    // 妇科
                    "vulva": {},
                    "vagina": {},
                    "cervix": {},
                    "corpus": {},
                    "adnexa": {}
                },
                "other": ""

            },
            "assist_check": {
                "blood": {},
                "urine": {},
                "blood_sugar": {},
                "ECG": {},
                "MALB": {},
                "FOB": {},
                "HbA1c": {},
                "HBSAG": {},
                "hepatic_function": {},
                "renal_function": {},
                "blood_fat": {},
                "C-XF": {},
                "b_scan": {},
                "pap_smear": {},
                "other": {}
            },
            "problems": {
                "cerebrovascular": {},
                "kidney": {},
                "heart": {},
                "vessel": {},
                "eye": {},
                "nervous_system": {},
                "other": {},
            },
            "hospitalization": {
                "normal": [
                    {"admission_at": "", "discharged_at": "", "reason": "", "department": "", "patient_id": ""}
                ],
                "family": [
                    {"admission_at": "", "discharged_at": "", "reason": "", "department": "", "patient_id": ""}
                ]
            },
            "medications": [
                {"name": "", "useage": "", "dosage": "", "time": "", "compliance": ""}
            ],
            "vaccinations": [
                {"name": "", "vaccinated_at": "", "department": ""}
            ],
            "assessment": [],
            "guide": {}
        },
        computed: {
            "bmi": function () {
                return (this.common.weight / Math.pow((this.common.height / 100), 2)).toFixed(2);
            }
        },
        methods: {},
        created: {}
    });
</script>
@endpush