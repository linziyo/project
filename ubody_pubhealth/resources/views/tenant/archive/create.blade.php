@extends('tenant.layout')

@section('css')
    <link href="{{ asset('assets/select2/css/select2.min.css') }}" rel="stylesheet"/>
@endsection

@section('content_header')
    <h1>创建档案</h1>
@endsection

@section('content')
    <div class="box box-info">
    <form class="form-horizontal" id="formArchive" method="post">

            <div class="box-header with-border">
                <h3 class="box-title">档案详情</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('community_id','社区',['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-2">{!! Form::select('community_id', $list, null, ['id'=>'community_id', 'class'=>'form-control']) !!}</div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('title', '姓名', ['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-4">{!! Form::text('real_name', null, ['id'=>'real_name','class'=>'form-control', 'placeholder'=>'请输入姓名']) !!}</div>
                    <div class="col-sm-2">
                        <label class="checkbox-inline">{{ Form::checkbox('is_register', 1) }}本辖区户籍</label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('image', '身份证号码', ['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-6">{!! Form::text('id_code', null, ['id'=>'id_code', 'class'=>'form-control', 'placeholder'=>'请输入身份证号码']) !!}</div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('birthday', '出生日期/性别', ['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-2">
                        <div class="input-group date">
                            {!! Form::text('birthday', null, ['id'=>'birthday','class'=>'form-control','placeholder'=>'请输入出生日期', 'readonly'=>'true']) !!}
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline">{!! Form::radio('sex', 0, true) !!} 未知的性别</label>
                        <label class="radio-inline">{!! Form::radio('sex', 1, false) !!} 男</label>
                        <label class="radio-inline">{!! Form::radio('sex', 2, false) !!} 女</label>
                        <label class="radio-inline">{!! Form::radio('sex', 9, false) !!} 未说明的性别</label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('image', '本人电话/工作单位', ['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-2">{!! Form::text('mobile', null, ['id'=>'mobile', 'class'=>'form-control', 'placeholder' => '请输入本人电话']) !!}</div>
                    <div class="col-sm-4">{!! Form::text('work_unit',null,['id'=>'work_unit', 'class'=>'form-control', 'placeholder' => '请输入工作单位']) !!}</div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('image', '联系人', ['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-2">{!! Form::text('contact_name',null,['id'=>'contact_name','class'=>'form-control','placeholder'=>'请输入联系人姓名']) !!}</div>
                    <div class="col-sm-4">{!! Form::text('contact_mobile',null,['id'=>'contact_mobile','class'=>'form-control','placeholder'=>'请输入联系人电话']) !!}</div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('image', '紧急联系人', ['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-2">{!! Form::text('emergency_contact_name',null,['id'=>'emergency_contact_name','class'=>'form-control','placeholder'=>'请输入紧急联系人姓名']) !!}</div>
                    <div class="col-sm-4">
                        {!! Form::text('emergency_contact_mobile',null,['id'=>'emergency_contact_mobile','class'=>'form-control','placeholder'=>'请输入紧急联系人电话']) !!}
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('image', '家庭电话/家庭住址', ['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-2">{!! Form::text('phone_number',null,['id'=>'phone_number','class'=>'form-control','placeholder'=>'请输入家庭电话']) !!}</div>
                    <div class="col-sm-4">{!! Form::text('address',null,['id'=>'address','class'=>'form-control','placeholder'=>'请输入家庭住址']) !!}</div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('image', '民族/文化程度/职业', ['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-2">
                        {!! Form::select('nation',[''=>'请选择民族','阿昌族'=>'阿昌族','白族'=>'白族','保安族'=>'保安族','布朗族'=>'布朗族','朝鲜族'=>'朝鲜族','达斡尔族'=>'达斡尔族','傣族'=>'傣族',
                            '德昂族'=>'德昂族','东乡族'=>'东乡族','侗族'=>'侗族','独龙族'=>'独龙族','俄罗斯族'=>'俄罗斯族','鄂伦春族'=>'鄂伦春族','鄂温克族'=>'鄂温克族','高山族'=>'高山族','仡佬族'=>'仡佬族',
                            '哈尼族'=>'哈尼族','哈萨克族'=>'哈萨克族','汉族'=>'汉族','赫哲族'=>'赫哲族','回族'=>'回族','基诺族'=>'基诺族','京族'=>'京族','景颇族'=>'景颇族','柯尔克孜族'=>'柯尔克孜族',
                            '拉祜族'=>'拉祜族','黎族'=>'黎族','傈僳族'=>'傈僳族','珞巴族'=>'珞巴族','满族'=>'满族','毛南族'=>'毛南族','门巴族'=>'门巴族','蒙古族'=>'蒙古族','苗族'=>'苗族','仫佬族'=>'仫佬族',
                            '怒族'=>'怒族','普米族'=>'普米族','羌族'=>'羌族','撒拉族'=>'撒拉族','畲族'=>'畲族','水族'=>'水族','塔吉克族'=>'塔吉克族','塔塔尔族'=>'塔塔尔族','土家族'=>'土家族',
                            '土族'=>'土族','佤族'=>'佤族','维吾尔族'=>'维吾尔族','乌孜别克族'=>'乌孜别克族','锡伯族'=>'锡伯族','瑶族'=>'瑶族','彝族'=>'彝族','裕固族'=>'裕固族','藏族'=>'藏族','壮族'=>'壮族'],
                            '汉族',['id'=>'nation','class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::select('education',[''=>'请选择文化程度',1=>'研究生',2=>'大学本科',3=>'大学专科和专科学校',4=>'中等专业学校',5=>'技工学校',6=>'高中',7=>'初中',8=>'小学',9=>'文盲或半文盲',10=>'不详'],
                            null,['id'=>'education','class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::select('job',[''=>'请选择职业', 0=>'国家机关、党群组织、企业、事业单位负责人', 1=>'专业技术人员', 2=>'办事人员和有关人员', 3=>'商业、服务业人员', 4=>'农、林、牧、渔、水利业生产人员',
                            5=>'生产、运输设备操作人员及有关人员', 6=>'军人', 7=>'不便分类的其他从业人员', 8=>'无职业'], null, ['id'=>'job','class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="blood_group">血型</label>
                    <div class="col-sm-2">
                        {!! Form::select('blood_group', \App\Models\Archive::$bloodGroups, null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::select('blood_group_rh', \App\Models\Archive::$bloodGroupRHs, null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="marital_status">婚姻状况</label>
                    <div class="col-sm-2">
                        {!! Form::select('marital_status', \App\Models\Archive::$maritalStatus, null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('image', '其他说明', ['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-6">
                        {!! Form::textarea('description',null,['id'=>'description','class'=>'form-control','placeholder'=>'请输入其他说明','rows'=>3]) !!}
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('image', '医疗费用支付方式', ['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-6">
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 1, false) !!}
                            城镇职工基本医疗保险</label>
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 2, false) !!}
                            城镇居民基本医疗保险</label>
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 3, false) !!}
                            新型农村合作医疗</label>
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 4, false) !!} 贫困救助</label>
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 5, false) !!} 商业医疗保险</label>
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 6, false) !!} 全公费</label>
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 7, false) !!} 全自费</label>
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 8, false) !!} 其他</label>
                        <label class="checkbox-inline">
                            {!! Form::text('payment_mode_content',null,['class'=>'form-control','placeholder'=>'其他支付方式','disabled'=>'disabled']) !!}
                        </label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('image', '药物过敏史', ['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-6">
                        <label class="checkbox-inline">{!! Form::checkbox('allergy', 1, false) !!} 无</label>
                        <label class="checkbox-inline">{!! Form::checkbox('allergy', 2, false) !!} 青霉素</label>
                        <label class="checkbox-inline">{!! Form::checkbox('allergy', 3, false) !!} 磺胺</label>
                        <label class="checkbox-inline">{!! Form::checkbox('allergy', 4, false) !!} 链霉素</label>
                        <label class="checkbox-inline">{!! Form::checkbox('allergy', 5, false) !!} 其他</label>
                        <label class="checkbox-inline">
                            <input type="text" name="allergy_content" class="form-control" placeholder="过敏药物"
                                   disabled="disabled">
                        </label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('image', '暴露史', ['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-6">
                        <label class="checkbox-inline">{!! Form::checkbox('expose', 1, false) !!} 无</label>
                        <label class="checkbox-inline">{!! Form::checkbox('expose', 2, false) !!} 化学品</label>
                        <label class="checkbox-inline">{!! Form::checkbox('expose', 3, false) !!} 毒物</label>
                        <label class="checkbox-inline">{!! Form::checkbox('expose', 4, false) !!} 射线</label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('image', '既往史 疾病', ['class'=>'control-label col-sm-2']) !!}
                    <div id="diseaseWrapper" class="col-sm-6">
                        <div class="row">
                            <div class="col-md-3">
                                {!! Form::select('disease_value',[1=>'无',2=>'高血压',3=>'糖尿病',4=>'冠心病',5=>'慢性阻塞性肺疾病',6=>'恶性肿瘤',7=>'脑卒中',8=>'严重精神障碍',
                                                 9=>'结核病',10=>'肝炎',11=>'其他法定传染病',12=>'职业病',13=>'其他'],null,['id'=>'diseases_value','class'=>'form-control']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::text('disease_content',null,['id'=>'disease_content','class'=>'form-control','placeholder'=>'疾病内容','disabled'=>'disabled']) !!}
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    {!! Form::text('disease_confirmed_at',null,['class'=>'form-control date','placeholder'=>'确诊时间','disabled'=>'disabled','readonly']) !!}
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-flat">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default btn-flat btn-block append"
                                        data-source="#tplDisease" data-target="#diseaseWrapper">添加
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('image', '既往史 外伤', ['class'=>'control-label col-sm-2']) !!}
                    <div id="injuryWrapper" class="col-sm-6">
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control" id="injury_value" name="injury_value">
                                    <option value="1">无</option>
                                    <option value="2">有</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                {!! Form::text('injury_content',null,['class'=>'form-control','placeholder'=>'名称','disabled'=>'disabled']) !!}
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    {!! Form::text('injury_confirmed_at',null,['class'=>'form-control date','placeholder'=>'确诊时间','disabled'=>'disabled','readonly']) !!}
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-flat">
                                        <i class="fa fa-calendar"></i>
                                            </button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default btn-flat btn-block append"
                                        data-source="#tplInjury" data-target="#injuryWrapper">添加
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('image', '既往史 手术', ['class'=>'control-label col-sm-2']) !!}
                    <div id="operationWrapper" class="col-sm-6">
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control" id="operation_value" name="operation_value">
                                    <option value="1">无</option>
                                    <option value="2">有</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                {!! Form::text('operation_content',null,['class'=>'form-control','placeholder'=>'名称','disabled'=>'disabled']) !!}
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    {!! Form::text('operation_confirmed_at',null,['class'=>'form-control date','placeholder'=>'确诊时间','disabled'=>'disabled','readonly']) !!}
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-flat">
                                        <i class="fa fa-calendar"></i>
                                            </button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default btn-flat btn-block append"
                                        data-source="#tplOperation" data-target="#operationWrapper"> 添加
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('image', '既往史 输血', ['class'=>'control-label col-sm-2']) !!}
                    <div id="transfusionWrapper" class="col-sm-6">
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control" id="transfusion_value" name="transfusion_value">
                                    <option value="1">无</option>
                                    <option value="2">有</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                {!! Form::text('transfusion_content',null,['class'=>'form-control','placeholder'=>'名称','disabled'=>'disabled']) !!}
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    {!! Form::text('transfusion_confirmed_at',null,['class'=>'form-control date','placeholder'=>'确诊时间','disabled'=>'disabled','readonly']) !!}
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-flat">
                                        <i class="fa fa-calendar"></i>
                                            </button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default btn-flat btn-block append"
                                        data-source="#tplTransfusion" data-target="#transfusionWrapper"> 添加
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('image', '家族史', ['class'=>'control-label col-sm-2']) !!}
                <div id="familyWrapper" class="col-sm-6">
                    <div class="row">
                        <div class="col-md-3">
                            {!! Form::select('family_relationship',['父亲'=>'父亲','母亲'=>'母亲','兄弟姐妹'=>'兄弟姐妹','子女'=>'子女'],null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::select('family_value',[1=>'无',2=>'高血压',3=>'糖尿病',4=>'冠心病',5=>'慢性阻塞性肺疾病',6=>'恶性肿瘤',7=>'脑卒中',8=>'严重精神障碍',9=>'结核病',
                                            10=>'肝炎',11=>'先天性畸形',12=>'其他'],null,['id'=>'families_value','class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::text('family_content',null,['class'=>'form-control','placeholder'=>'其他','disabled'=>'disabled']) !!}
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-default btn-flat btn-block append"
                                    data-source="#tplFamily" data-target="#familyWrapper">添加
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                {!! Form::label('image','遗传病史',['class'=>'control-label col-sm-2']) !!}
                <div class="col-sm-6">
                    <label class="checkbox-inline">
                        {!! Form::checkbox('hereditary_disease',1,false) !!} 无
                    </label>
                    <label class="checkbox-inline">
                        {!! Form::checkbox('hereditary_disease',2,false) !!} 有
                    </label>
                    <label class="checkbox-inline">
                        {!! Form::text('hereditary_disease_content', null, ['class'=>'form-control', 'placeholder'=>'请输入遗传病', 'disabled'=>'disabled']) !!}
                    </label>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                {!! Form::label('image','残疾情况',['class'=>'control-label col-sm-2']) !!}
                <div class="col-sm-6">
                    <label class="checkbox-inline">{!! Form::checkbox('disability', 1, false) !!} 无残疾</label>
                    <label class="checkbox-inline">{!! Form::checkbox('disability', 2, false) !!} 视力残疾</label>
                    <label class="checkbox-inline">{!! Form::checkbox('disability', 3, false) !!} 听力残疾</label>
                    <label class="checkbox-inline">{!! Form::checkbox('disability', 4, false) !!} 言语残疾</label>
                    <label class="checkbox-inline">{!! Form::checkbox('disability', 5, false) !!} 肢体残疾</label>
                    <label class="checkbox-inline">{!! Form::checkbox('disability', 6, false) !!} 智力残疾</label>
                    <label class="checkbox-inline">{!! Form::checkbox('disability', 7, false) !!} 精神残疾</label>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="livingKitchen">生活环境</label>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-md-3">
                            {!! Form::select('living_kitchen',[''=>'-厨房排风设施-',1=>'无',2=>'油烟机',3=>'换气扇',4=>'烟囱'],false,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-2">
                            {!! Form::select('living_fuel',[''=>'-燃料类型-',1=>'液化气',2=>'煤',3=>'天然气',4=>'沼气',5=>'柴火',6=>'其他'],false,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-2">
                            {!! Form::select('living_water',[''=>'-饮水-',1=>'自来水',2=>'经净化过滤的水',3=>'井水',4=>'河湖水',5=>'塘水',6=>'其他'],false,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::select('living_toilet',[''=>'-厕所-',1=>'卫生厕所',2=>'一格或二格粪池式',3=>'马桶',4=>'露天粪坑',5=>'简易棚厕'],false,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-2">
                            {!! Form::select('living_fence',[''=>'-禽畜栏-',1=>'无',2=>'单设',3=>'室内',4=>'室外'],false,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="box-footer">
                <div class="form-actions col-sm-10 col-sm-offset-2">
                    <input type="submit" value="提交" class="btn btn-primary"/>
                    <a href="{{ URL::action('Tenant\ArchiveController@index') }}" class="btn btn-default">返回</a>
                </div>
            </div>

    </form>
    </div>
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('/assets/select2/js/select2.full.min.js') }}"></script>
<script id="tplDisease" type="text/template">
    <div class="row">
        <div class="col-md-3">
            <select class="form-control" id="disease_value" name="disease_value">
                <option value="1">无</option>
                <option value="2">高血压</option>
                <option value="3">糖尿病</option>
                <option value="4">冠心病</option>
                <option value="5">慢性阻塞性肺疾病</option>
                <option value="6">恶性肿瘤</option>
                <option value="7">脑卒中</option>
                <option value="8">严重精神障碍</option>
                <option value="9">结核病</option>
                <option value="10">肝炎</option>
                <option value="11">其他法定传染病</option>
                <option value="12">职业病</option>
                <option value="13">其他</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" placeholder="疾病内容" name="disease_content" class="form-control" disabled/>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" placeholder="确诊时间" name="disease_confirmed_at" class="date form-control" disabled readonly/>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-flat">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
            </div>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
        </div>
    </div>
</script>
<script id="tplInjury" type="text/template">
    <div class="row">
        <div class="col-md-3">
            <select class="form-control" id="injury_value" name="injury_value">
                <option value="1">无</option>
                <option value="2">有</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" placeholder="名称" name="injury_content" class="form-control" disabled/>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" placeholder="确诊时间" name="injury_confirmed_at"
                       class="form-control date" disabled readonly />
                <span class="input-group-btn">
                    <button type="button" class="btn btn-flat">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
            </div>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
        </div>
    </div>
</script>
<script id="tplOperation" type="text/template">
    <div class="row">
        <div class="col-md-3">
            <select class="form-control" id="operation_value" name="operation_value">
                <option value="1">无</option>
                <option value="2">有</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" placeholder="名称" name="operation_content" class="form-control" disabled/>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" placeholder="确诊时间" name="operation_confirmed_at"
                       class="form-control date" disabled readonly/>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-flat">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
            </div>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
        </div>
    </div>
</script>
<script id="tplTransfusion" type="text/template">
    <div class="row">
        <div class="col-md-3">
            <select class="form-control" id="transfusion_value" name="transfusion_value">
                <option value="1">无</option>
                <option value="2">有</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" placeholder="名称" name="transfusion_content" class="form-control" disabled/>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" placeholder="确诊时间" name="transfusion_confirmed_at"
                       class="form-control date" disabled readonly/>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-flat">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
            </div>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
        </div>
    </div>
</script>
<script id="tplFamily" type="text/template">
    <div class="row">
        <div class="col-md-3">
            <select class="form-control" name="family_relationship" id="family_relationship">
                <option value="父亲">父亲</option>
                <option value="母亲">母亲</option>
                <option value="兄弟姐妹">兄弟姐妹</option>
                <option value="子女">子女</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-control" name="family_value" id="family_value">
                <option value="1">无</option>
                <option value="2">高血压</option>
                <option value="3">糖尿病</option>
                <option value="4">冠心病</option>
                <option value="5">慢性阻塞性肺疾病</option>
                <option value="6">恶性肿瘤</option>
                <option value="7">脑卒中</option>
                <option value="8">严重精神障碍</option>
                <option value="9">结核病</option>
                <option value="10">肝炎</option>
                <option value="11">先天性畸形</option>
                <option value="12">其他</option>
            </select>
        </div>
        <div class="col-md-4">
            <input type="text" placeholder="其他" name="family_content" class="form-control" disabled/>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-default btn-flat btn-block remove" onclick="removeItem(this)">删除
            </button>
        </div>
    </div>
</script>
<script type="text/javascript">
    function removeItem(obj) {
        $(obj).parent().parent().remove();
    }

    $(function () {
        $("#formArchive").validate({
            rules: {
                community_id: 'required',
                real_name: 'required',
                id_code: 'required',
                birthday: 'required',
                sex: 'required',
                mobile: 'required',
                work_unit: 'required',
                contact_name: 'required',
                contact_mobile: 'required',
                emergency_contact_name: 'required',
                emergency_contact_mobile: 'required',
                phone_number: 'required',
                address: 'required',
                nation: 'required',
                education: 'required',
                job: 'required',
                blood_group: 'required',
                blood_group_rh: 'required',
                marital_status: 'required',
                payment_mode: 'required',
                allergy: 'required',
                expose: 'required',
                family_relationship: 'required',
                family_value: 'required',
                hereditary_disease: 'required',
                disability: 'required',
                living_kitchen: 'required',
                living_fuel: 'required',
                living_water: 'required',
                living_toilet: 'required',
                living_fence: 'required'
            },
            submitHandler: function (form) {
                var postData = {
                    'community_id': $("select[name=community_id]").val(),
                    'real_name': $("input[name=real_name]").val(),
                    'is_register': ($("input[name=is_register]").prop('checked'))?1:0,
                    'id_code': $("input[name=id_code]").val(),
                    'birthday': $("input[name=birthday]").val(),
                    'sex': $("input[name=sex]:checked").val(),
                    'mobile': $("input[name=mobile]").val(),
                    'work_unit': $("input[name=work_unit]").val(),
                    'contact_name': $("input[name=contact_name]").val(),
                    'contact_mobile': $("input[name=contact_mobile]").val(),
                    'emergency_contact_name': $("input[name=emergency_contact_name]").val(),
                    'emergency_contact_mobile': $("input[name=emergency_contact_mobile]").val(),
                    'phone_number': $("input[name=phone_number]").val(),
                    'address': $("input[name=address]").val(),
                    'nation': $("select[name=nation]").val(),
                    'education': $("select[name=education]").val(),
                    'job': $("select[name=job]").val(),
                    'blood_group': $("select[name=blood_group]").val(),
                    'blood_group_rh': $("select[name=blood_group_rh]").val(),
                    'description': $("#description").val(),
                    'marital_status': $("select[name=marital_status]").val(),
                    'paymentModes': $("input[name=payment_mode]:checked").map(function (index, element) {
                                    return this.value == 8 ? {
                                        'value': this.value,
                                        'content': $("input[name=payment_mode_content]").val()
                                    } : {'value': this.value};
                                }).get(),
                    'allergies': $("input[name=allergy]:checked").map(function (index, element) {
                                    return this.value == 5 ? {
                                        'value': this.value,
                                        'content': $("input[name=allergy_content]").val()
                                    } : {'value': this.value};
                                }).get(),
                    'exposes': $("input[name=expose]:checked").map(function (index, element) {
                                    return {'value': this.value};
                                }).get(),
                    'diseases': $("#diseaseWrapper").find('.row').map(function (index, element) {
                                    return {
                                        'value': $(this).find("select[name=disease_value]").val(),
                                        'content': $(this).find("input[name=disease_content]").val(),
                                        'confirmed_at': $(this).find("input[name=disease_confirmed_at]").val()
                                    };
                                }).get(),
                    'injuries': $("#injuryWrapper").find('.row').map(function (index, element) {
                                    return {
                                        'value': $(this).find("select[name=injury_value]").val(),
                                        'content': $(this).find("input[name=injury_content]").val(),
                                        'confirmed_at': $(this).find("input[name=injury_confirmed_at]").val()
                                    };
                                }).get(),
                    'operations': $("#operationWrapper").find('.row').map(function (index, element) {
                                        return {
                                            'value': $(this).find("select[name=operation_value]").val(),
                                            'content': $(this).find("input[name=operation_content]").val(),
                                            'confirmed_at': $(this).find("input[name=operation_confirmed_at]").val()
                                        };
                                    }).get(),
                    'transfusions': $("#transfusionWrapper").find('.row').map(function (index, element) {
                                        return {
                                            'value': $(this).find("select[name=transfusion_value]").val(),
                                            'content': $(this).find("input[name=transfusion_content]").val(),
                                            'confirmed_at': $(this).find("input[name=transfusion_confirmed_at]").val()
                                        };
                                    }).get(),
                    'families': $("#familyWrapper").find('.row').map(function (index, element) {
                                    return {
                                        'relationship': $(this).find("select[name=family_relationship]").val(),
                                        'value': $(this).find("select[name=family_value]").val(),
                                        'content': $(this).find("input[name=family_content]").val()
                                    };
                                }).get(),
                    'disabilities': $("input[name=disability]:checked").map(function (index, element) {
                                        return {'value': this.value};
                                    }).get(),
                    'hereditaryDiseases': $("input[name=hereditary_disease]:checked").map(function (index, element) {
                                        return this.value == 2 ? {
                                            'value': this.value,
                                            'content': $("input[name=hereditary_disease_content]").val()
                                        } : {'value': this.value};
                                    }).get(),
                    'livingKitchen': [{'value': $("select[name='living_kitchen']").val()}],
                    'livingFuel': [{'value': $("select[name='living_fuel']").val()}],
                    'livingWater': [{'value': $("select[name='living_water']").val()}],
                    'livingToilet': [{'value': $("select[name='living_toilet']").val()}],
                    'livingFence': [{'value': $("select[name='living_fence']").val()}]
                };

                $.post("{{ URL::action('Tenant\ArchiveController@store') }}", postData, function(data){
                    if(data.errorCode == 0){
                        $.toast('创建成功',{type:'success'});
                        window.location.href = "{{ URL::action('Tenant\ArchiveController@index') }}"
                    }else if(data.errorCode == 403) {
                        $.toast('身份证'+$('input[name=id_code]').val()+'已经创建档案',{type:'danger'});
                    }else {
                        $.toast('未知错误',{type:'danger'});
                    }
                });
                return false;
            }
        });

        date();

        $('.select2').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });

        $("input[name=id_code]").change(function () {
            if ($(this).val().length == 18) {
                $("input[name=birthday]").val($(this).val().substr(6, 4) + '-' + $(this).val().substr(10, 2) + "-" + $(this).val().substr(12, 2));
                if ($(this).val().substr(16, 1) / 2 == 0) {
                    $("input[name=sex][value='2']").prop('checked', true);
                } else {
                    $("input[name=sex][value='1']").prop('checked', true);
                }
            } else if ($(this).val().length == 15) {
                $("input[name=birthday]").val('19' + $(this).val().substr(6, 2) + '-' + $(this).val().substr(8, 2) + "-" + $(this).val().substr(8, 2));
                if ($(this).val().substr(14, 1) / 2 == 0) {
                    $("input[name=sex][value='2']").prop('checked', true);
                } else {
                    $("input[name=sex][value='1']").prop('checked', true);
                }
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
        $("input[type=checkbox][name=expose]").change(function () {
            if ($(this).val() == 1) {
                if ($(this).is(':checked')) {
                    $("input[name=expose]").not(":first").prop('checked', false).attr('disabled', 'disabled');
                } else {
                    $("input[name=expose]").not(":first").removeAttr('disabled');
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
        $('.form-control').change(function () {
            if ($(this).children('option:selected').val() == 12) {
                $("input[name=family_disease_content]").removeAttr('disabled');
            } else {
                $("input[name=family_disease_content]").attr('disabled', 'disabled');
            }
        });
        //既往史
        $('body').on('change','select[name=disease_value],select[name=injury_value],select[name=operation_value],select[name=transfusion_value]',function(){
            if ($(this).val() != 1) {
                var content = $(this).find('option').eq($(this).val()-1).text();
                $(this).parent().parent().find("input").removeAttr('disabled');
                $(this).parent().parent().find("input").attr('required',true).eq(0).val(content);
            } else {
                $(this).parent().parent().find("input").attr('disabled', 'disabled');
                $(this).parent().parent().find("input").val('');
                $(this).parent().parent().find("input").removeAttr('required');
            }
            date();
        });
        //家庭史
        $('body').on('change','select[name=family_value]',function(){
            var content = $(this).find('option').eq($(this).val()-1).text();
            $(this).parent().parent().find("input").removeAttr('disabled').eq(0).val(content);
        });
    });
    //时间初始化
    var date = function () {
        $(".date").datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            'language': 'zh-CN'
        });
    }
</script>
@endpush