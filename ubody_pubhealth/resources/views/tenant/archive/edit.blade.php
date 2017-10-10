@extends('tenant.layout')

@section('css')
    <link href="{{ asset('assets/select2/css/select2.min.css') }}" rel="stylesheet"/>
@endsection

@section('content_header')
    <h1>修改档案</h1>
@endsection

@section('content')
    <form class="form-horizontal"
          id="formArchive" method="post" action="{{ URL::action('Tenant\ArchiveController@update', $model->id) }}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PUT">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">档案详情</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label col-sm-2">档案编号</label>
                    <div class="col-sm-2">
                        <label class="control-label">{{ $model->code }}</label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="community_id">社区</label>
                    <div class="col-sm-2">
                        {{ Form::select('community_id',$communities,$model->community_id,['class'=>'form-control']) }}
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="real_name">姓名</label>
                    <div class="col-sm-4">
                        {!! Form::text('real_name', $model->real_name, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-2">
                        <label class="checkbox-inline">
                            {!! Form::checkbox('is_register', $model->is_register,($model->is_register == 1)) !!}
                            本辖区户籍
                        </label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="id_code">身份证号码</label>
                    <div class="col-sm-6">
                        {!! Form::text('id_code', $model->id_code, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="birthday">出生日期/性别</label>
                    <div class="col-sm-2">
                        <div class="input-group date">
                            {!! Form::text('birthday', $model->birthday, ['class'=>'form-control','readonly'=>'readonly']) !!}
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            {!! Form::radio('sex', '0', ($model->sex == 0)) !!}
                            未知的性别
                        </label>
                        <label class="radio-inline">
                            {!! Form::radio('sex', '1', ($model->sex == 1)) !!}
                            男
                        </label>
                        <label class="radio-inline">
                            {!! Form::radio('sex', '2', ($model->sex == 2)) !!}
                            女
                        </label>
                        <label class="radio-inline">
                            {!! Form::radio('sex', '9', ($model->sex == 9)) !!}
                            未说明的性别
                        </label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="mobile">本人电话/工作单位</label>
                    <div class="col-sm-2">
                        {!! Form::text('mobile', $model->mobile, ['class'=>'form-control','placeholder'=>'请输入本人电话']) !!}
                    </div>
                    <div class="col-sm-4">
                        {!! Form::text('work_unit', $model->work_unit, ['class'=>'form-control','placeholder'=>'请输入工作单位']) !!}
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="contact_name">联系人</label>
                    <div class="col-sm-2">
                        {!! Form::text('contact_name', $model->contact_name, ['class'=>'form-control','placeholder'=>'请输入联系人姓名']) !!}
                    </div>
                    <div class="col-sm-4">
                        {!! Form::text('contact_mobile', $model->contact_mobile, ['class'=>'form-control','placeholder'=>'请输入联系人电话']) !!}
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="emergency_contact_name">紧急联系人</label>
                    <div class="col-sm-2">
                        {!! Form::text('emergency_contact_name', $model->emergency_contact_name, ['id'=>'emergency_contact_name','class'=>'form-control','placeholder'=>'请输入紧急联系人姓名']) !!}
                    </div>
                    <div class="col-sm-4">
                        {!! Form::text('emergency_contact_mobile', $model->emergency_contact_mobile, ['id'=>'emergency_contact_mobile','class'=>'form-control','placeholder'=>'请输入紧急联系人电话']) !!}
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="phone_number">家庭电话/家庭住址</label>
                    <div class="col-sm-2">
                        {!! Form::text('phone_number', $model->phone_number, ['class'=>'form-control','placeholder'=>'请输入家庭电话']) !!}
                    </div>
                    <div class="col-sm-4">
                        {!! Form::text('address', $model->address, ['class'=>'form-control','placeholder'=>'请输入家庭住址']) !!}
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nation">民族/文化程度/职业</label>
                    <div class="col-sm-2">
                        <select class="form-control" name="nation">
                            <option value="">请选择民族</option>
                            <option value="阿昌族" {{ $model->nation == '阿昌族' ? 'selected' : '' }}>阿昌族</option>
                            <option value="白族" {{ $model->nation == '白族' ? 'selected' : '' }}>白族</option>
                            <option value="保安族" {{ $model->nation == '保安族' ? 'selected' : '' }}>保安族</option>
                            <option value="布朗族" {{ $model->nation == '布朗族' ? 'selected' : '' }}>布朗族</option>
                            <option value="布依族" {{ $model->nation == '布依族' ? 'selected' : '' }}>布依族</option>
                            <option value="朝鲜族" {{ $model->nation == '朝鲜族' ? 'selected' : '' }}>朝鲜族</option>
                            <option value="达斡尔族" {{ $model->nation == '达斡尔族' ? 'selected' : '' }}>达斡尔族</option>
                            <option value="傣族" {{ $model->nation == '傣族' ? 'selected' : '' }}>傣族</option>
                            <option value="德昂族" {{ $model->nation == '德昂族' ? 'selected' : '' }}>德昂族</option>
                            <option value="东乡族" {{ $model->nation == '东乡族' ? 'selected' : '' }}>东乡族</option>
                            <option value="侗族" {{ $model->nation == '侗族' ? 'selected' : '' }}>侗族</option>
                            <option value="独龙族" {{ $model->nation == '独龙族' ? 'selected' : '' }}>独龙族</option>
                            <option value="俄罗斯族" {{ $model->nation == '俄罗斯族' ? 'selected' : '' }}>俄罗斯族</option>
                            <option value="鄂伦春族" {{ $model->nation == '鄂伦春族' ? 'selected' : '' }}>鄂伦春族</option>
                            <option value="鄂温克族" {{ $model->nation == '鄂温克族' ? 'selected' : '' }}>鄂温克族</option>
                            <option value="高山族" {{ $model->nation == '高山族' ? 'selected' : '' }}>高山族</option>
                            <option value="仡佬族" {{ $model->nation == '仡佬族' ? 'selected' : '' }}>仡佬族</option>
                            <option value="哈尼族" {{ $model->nation == '哈尼族' ? 'selected' : '' }}>哈尼族</option>
                            <option value="哈萨克族" {{ $model->nation == '哈萨克族' ? 'selected' : '' }}>哈萨克族</option>
                            <option value="汉族" {{ $model->nation == '汉族' ? 'selected' : '' }}>汉族</option>
                            <option value="赫哲族" {{ $model->nation == '赫哲族' ? 'selected' : '' }}>赫哲族</option>
                            <option value="回族" {{ $model->nation == '回族' ? 'selected' : '' }}>回族</option>
                            <option value="基诺族" {{ $model->nation == '基诺族' ? 'selected' : '' }}>基诺族</option>
                            <option value="京族" {{ $model->nation == '京族' ? 'selected' : '' }}>京族</option>
                            <option value="景颇族" {{ $model->nation == '景颇族' ? 'selected' : '' }}>景颇族</option>
                            <option value="柯尔克孜族" {{ $model->nation == '柯尔克孜族' ? 'selected' : '' }}>柯尔克孜族</option>
                            <option value="拉祜族" {{ $model->nation == '拉祜族' ? 'selected' : '' }}>拉祜族</option>
                            <option value="黎族" {{ $model->nation == '黎族' ? 'selected' : '' }}>黎族</option>
                            <option value="傈僳族" {{ $model->nation == '傈僳族' ? 'selected' : '' }}>傈僳族</option>
                            <option value="珞巴族" {{ $model->nation == '珞巴族' ? 'selected' : '' }}>珞巴族</option>
                            <option value="满族" {{ $model->nation == '满族' ? 'selected' : '' }}>满族</option>
                            <option value="毛南族" {{ $model->nation == '毛南族' ? 'selected' : '' }}>毛南族</option>
                            <option value="门巴族" {{ $model->nation == '门巴族' ? 'selected' : '' }}>门巴族</option>
                            <option value="蒙古族" {{ $model->nation == '蒙古族' ? 'selected' : '' }}>蒙古族</option>
                            <option value="苗族" {{ $model->nation == '苗族' ? 'selected' : '' }}>苗族</option>
                            <option value="仫佬族" {{ $model->nation == '仫佬族' ? 'selected' : '' }}>仫佬族</option>
                            <option value="纳西族" {{ $model->nation == '纳西族' ? 'selected' : '' }}>纳西族</option>
                            <option value="怒族" {{ $model->nation == '怒族' ? 'selected' : '' }}>怒族</option>
                            <option value="普米族" {{ $model->nation == '普米族' ? 'selected' : '' }}>普米族</option>
                            <option value="羌族" {{ $model->nation == '羌族' ? 'selected' : '' }}>羌族</option>
                            <option value="撒拉族" {{ $model->nation == '撒拉族' ? 'selected' : '' }}>撒拉族</option>
                            <option value="畲族" {{ $model->nation == '畲族' ? 'selected' : '' }}>畲族</option>
                            <option value="水族" {{ $model->nation == '水族' ? 'selected' : '' }}>水族</option>
                            <option value="塔吉克族" {{ $model->nation == '塔吉克族' ? 'selected' : '' }}>塔吉克族</option>
                            <option value="塔塔尔族" {{ $model->nation == '塔塔尔族' ? 'selected' : '' }}>塔塔尔族</option>
                            <option value="土家族" {{ $model->nation == '土家族' ? 'selected' : '' }}>土家族</option>
                            <option value="土族" {{ $model->nation == '土族' ? 'selected' : '' }}>土族</option>
                            <option value="佤族" {{ $model->nation == '佤族' ? 'selected' : '' }}>佤族</option>
                            <option value="维吾尔族" {{ $model->nation == '维吾尔族' ? 'selected' : '' }}>维吾尔族</option>
                            <option value="乌孜别克族" {{ $model->nation == '乌孜别克族' ? 'selected' : '' }}>乌孜别克族</option>
                            <option value="锡伯族" {{ $model->nation == '锡伯族' ? 'selected' : '' }}>锡伯族</option>
                            <option value="瑶族" {{ $model->nation == '瑶族' ? 'selected' : '' }}>瑶族</option>
                            <option value="彝族" {{ $model->nation == '彝族' ? 'selected' : '' }}>彝族</option>
                            <option value="裕固族" {{ $model->nation == '裕固族' ? 'selected' : '' }}>裕固族</option>
                            <option value="藏族" {{ $model->nation == '藏族' ? 'selected' : '' }}>藏族</option>
                            <option value="壮族" {{ $model->nation == '壮族' ? 'selected' : '' }}>壮族</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        {!! Form::select('education', \App\Models\Archive::$educations, $model->education, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::select('job', \App\Models\Archive::$jobs, $model->job, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="blood_group">血型</label>
                    <div class="col-sm-2">
                        {!! Form::select('blood_group', \App\Models\Archive::$bloodGroups, $model->blood_group, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::select('blood_group_rh', \App\Models\Archive::$bloodGroupRHs, $model->blood_group_rh, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="marital_status">婚姻状况</label>
                    <div class="col-sm-2">
                        {!! Form::select('marital_status', \App\Models\Archive::$maritalStatus, $model->marital_status, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="description">其他说明</label>
                    <div class="col-sm-6">
                        {!! Form::textarea('description', $model->description, ['id'=>'description', 'class'=>'form-control', 'rows'=>'3','placeholder'=>'请输入其他说明']) !!}
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">医疗费用支付方式</label>

                    <div class="col-sm-6">
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 1, array_has($paymentlist,1)) !!}
                            城镇职工基本医疗保险</label>
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 2, array_has($paymentlist,2)) !!}
                            城镇居民基本医疗保险</label>
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 3, array_has($paymentlist,3)) !!}
                            新型农村合作医疗</label>
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 4, array_has($paymentlist,4)) !!}
                            贫困救助</label>
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 5, array_has($paymentlist,5)) !!}
                            商业医疗保险</label>
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 6, array_has($paymentlist,6)) !!}
                            全公费</label>
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 7, array_has($paymentlist,7)) !!}
                            全自费</label>
                        <label class="checkbox-inline">{!! Form::checkbox('payment_mode', 8, array_has($paymentlist,8)) !!}
                            其他</label>
                        <label class="checkbox-inline">
                            @if(array_has($paymentlist,8))
                                {!! Form::text('payment_mode_content',$paymentlist[8],['class'=>'form-control','placeholder'=>'其他支付方式']) !!}
                            @else
                                {!! Form::text('payment_mode_content',null,['class'=>'form-control','disabled'=>'disabled','placeholder'=>'其他支付方式']) !!}
                            @endif
                        </label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('allergy','药物过敏史',['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-6">
                        <label class="checkbox-inline">
                            {!! Form::checkbox('allergy', 1, array_has($allergylist,1)) !!} 无
                        </label>
                        <label class="checkbox-inline">
                            {!! Form::checkbox('allergy', 2, array_has($allergylist,2)) !!} 青霉素
                        </label>
                        <label class="checkbox-inline">
                            {!! Form::checkbox('allergy', 3, array_has($allergylist,3)) !!} 磺胺
                        </label>
                        <label class="checkbox-inline">
                            {!! Form::checkbox('allergy', 4, array_has($allergylist,4)) !!} 链霉素
                        </label>
                        <label class="checkbox-inline">
                            {!! Form::checkbox('allergy', 5, array_has($allergylist,5)) !!} 其他
                        </label>
                        <label class="checkbox-inline">
                            @if(array_has($allergylist,5))
                                {!! Form::text('allergy_content', $allergylist[5], ['class'=>'form-control','placeholder'=>'过敏药物']) !!}
                            @else
                                {!! Form::text('allergy_content', null, ['class'=>'form-control','placeholder'=>'过敏药物','disabled'=>'disabled']) !!}
                            @endif
                        </label>
                    </div>
                    <div class="col-md-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">暴露史</label>
                    <div class="col-sm-6">
                        <label class="checkbox-inline">{!! Form::checkbox('expose', 1, in_array(1, $exposelist)) !!} 无</label>
                        <label class="checkbox-inline">{!! Form::checkbox('expose', 2, in_array(2, $exposelist)) !!} 化学品</label>
                        <label class="checkbox-inline">{!! Form::checkbox('expose', 3, in_array(3, $exposelist)) !!} 毒物</label>
                        <label class="checkbox-inline">{!! Form::checkbox('expose', 4, in_array(4, $exposelist)) !!} 射线</label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('disease_value','既往史 疾病',['class'=>'control-label col-sm-2']) !!}
                    <div id="diseaseWrapper" class="col-sm-6">
                        @foreach($model->diseases as $key=>$disease)
                        <div class="row">
                            <div class="col-md-3">
                                {!! Form::select('disease_value',[1=>'无',2=>'高血压',3=>'糖尿病',4=>'冠心病',5=>'慢性阻塞性肺疾病',6=>'恶性肿瘤',7=>'脑卒中',8=>'严重精神障碍',
                                9=>'结核病',10=>'肝炎',11=>'其他法定传染病',12=>'职业病',13=>'其他'], $disease->value, ['id'=>'disease_value','class'=>'form-control']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::text('disease_content', (isset($disease->content)?$disease->content:null), ['class'=>'form-control', 'placeholder'=>'疾病内容', 'disabled'=>'disabled']) !!}
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    {!! Form::text('disease_confirmed_at', (isset($disease->confirmed_at)?$disease->confirmed_at:null), ['class'=>'form-control date', 'placeholder'=>'确诊时间', 'disabled'=>'disabled','readonly']) !!}
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-flat"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                @if($key > 0)
                                    <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
                                @else
                                    <button type="button" class="btn btn-default btn-flat btn-block append"
                                        data-source="#tplDisease" data-target="#diseaseWrapper">添加
                                    </button>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('injury_value','既往史 外伤',['class'=>'control-label col-sm-2']) !!}
                    <div id="injuryWrapper" class="col-sm-6">
                        @foreach($model->injuries as $key=>$injurie)
                        <div class="row">
                            <div class="col-md-3">
                                {!! Form::select('injury_value',[1=>'无',2=>'有'], $injurie->value, ['id'=>'injury_value','class'=>'form-control']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::text('injury_content', (isset($injurie->content)?$injurie->content:null), ['class'=>'form-control','placeholder'=>'疾病内容','disabled'=>'disabled']) !!}
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    {!! Form::text('injury_confirmed_at', (isset($injurie->confirmed_at)?$injurie->confirmed_at:null), ['class'=>'form-control date','placeholder'=>'确诊时间','disabled'=>'disabled','readonly']) !!}
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-flat"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-2">
                            @if($key > 0)
                                <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
                            @else
                                <button type="button" class="btn btn-default btn-flat btn-block append"
                                    data-source="#tplInjury" data-target="#injuryWrapper">添加
                                </button>
                            @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('operation_value','既往史 手术',['class'=>'control-label col-sm-2']) !!}
                    <div id="operationWrapper" class="col-sm-6">
                        @foreach($model->operations as $key=>$operation)
                        <div class="row">
                            <div class="col-md-3">
                                {!! Form::select('operation_value',[1=>'无',2=>'有'], $operation->value, ['id'=>'operation_value','class'=>'form-control']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::text('operation_content', (isset($operation->content)?$operation->content:null), ['class'=>'form-control','placeholder'=>'疾病内容','disabled'=>'disabled']) !!}
                            </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                {!! Form::text('operation_confirmed_at', (isset($operation->confirmed_at)?$operation->confirmed_at:null), ['class'=>'form-control date','placeholder'=>'确诊时间','disabled'=>'disabled','readonly']) !!}
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-flat"><i class="fa fa-calendar"></i></button>
                                </span>
                            </div>
                        </div>
                            <div class="col-md-2">
                            @if($key>0)
                                <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
                            @else
                                <button type="button" class="btn btn-default btn-flat btn-block append"
                                    data-source="#tplOperation" data-target="#operationWrapper"> 添加
                                </button>
                            @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('transfusion_value','既往史 输血',['class'=>'control-label col-sm-2']) !!}
                    <div id="transfusionWrapper" class="col-sm-6">
                        @foreach($model->transfusions as $key=>$transfusion)
                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::select('transfusion_value',[1=>'无',2=>'有'], $transfusion->value, ['id'=>'transfusion_value','class'=>'form-control']) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::text('transfusion_content', (isset($transfusion->content)?$transfusion->content:null), ['class'=>'form-control','placeholder'=>'疾病内容','disabled'=>'disabled']) !!}
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        {!! Form::text('transfusion_confirmed_at', (isset($transfusion->confirmed_at)?$transfusion->confirmed_at:null), ['class'=>'form-control date','placeholder'=>'确诊时间','disabled'=>'disabled','readonly']) !!}
                                        <span class="input-group-btn">
                                        <button type="button" class="btn btn-flat">
                                        <i class="fa fa-calendar"></i>
                                            </button>
                                    </span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    @if($key > 0)
                                        <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
                                    @else
                                        <button type="button" class="btn btn-default btn-flat btn-block append"
                                                data-source="#tplTransfusion" data-target="#transfusionWrapper"> 添加
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>

                <div class="form-group">
                    {!! Form::label('family_relationship','家族史',['class'=>'control-label col-sm-2']) !!}
                    <div id="familyWrapper" class="col-sm-6">
                        @foreach($model->families as $key=>$family)
                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::select('family_relationship',['父亲'=>'父亲','母亲'=>'母亲','兄弟姐妹'=>'兄弟姐妹','子女'=>'子女'],$family->relationship,['class'=>'form-control']) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::select('family_value',[1=>'无',2=>'高血压',3=>'糖尿病',4=>'冠心病',5=>'慢性阻塞性肺疾病',6=>'恶性肿瘤',7=>'脑卒中',8=>'严重精神障碍',
                                                                        9=>'结核病',10=>'肝炎',11=>'先天性畸形',12=>'其他'], $family->value, ['class'=>'form-control']) !!}
                                </div>
                                <div class="col-md-4">
                                    @if($family->value == 12)
                                        {!! Form::text('family_content', $family->content, ['class'=>'form-control', 'placeholder'=>'其他']) !!}
                                    @else
                                        {!! Form::text('family_content', null, ['class'=>'form-control','disabled'=>'disabled','placeholder'=>'其他']) !!}
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    @if($key > 0)
                                        <button type="button" class="btn btn-default btn-flat btn-block" onclick="removeItem(this)">删除</button>
                                    @else
                                        <button type="button" class="btn btn-default btn-flat btn-block append"
                                                data-source="#tplFamily" data-target="#familyWrapper">添加
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>

                <div class="form-group">
                    {!! Form::label('hereditary_disease', '遗传病史', ['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-6">
                        <label class="checkbox-inline">
                            {!! Form::checkbox('hereditary_disease', 1, ($model->hereditaryDisease?($model->hereditaryDisease->value == 1):false)) !!} 无
                        </label>
                        <label class="checkbox-inline">
                            {!! Form::checkbox('hereditary_disease', 2, ($model->hereditaryDisease?($model->hereditaryDisease->value == 2):false)) !!} 有
                        </label>
                        <label class="checkbox-inline">
                            @if($model->hereditaryDisease && $model->hereditaryDisease->value == 2)
                                {!! Form::text('hereditary_disease_content', $model->hereditaryDisease->content, ['class'=>'form-control','placeholder'=>'请输入遗传病']) !!}
                            @else
                                {!! Form::text('hereditary_disease_content', null, ['class'=>'form-control','placeholder'=>'请输入遗传病','disabled'=>'disabled']) !!}
                            @endif
                        </label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('disability', '残疾情况', ['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-6">
                        <label class="checkbox-inline">{!! Form::checkbox('disability', 1, in_array(1, $disabilitylist)) !!} 无残疾</label>
                        <label class="checkbox-inline">{!! Form::checkbox('disability', 2, in_array(2, $disabilitylist)) !!} 视力残疾</label>
                        <label class="checkbox-inline">{!! Form::checkbox('disability', 3, in_array(3, $disabilitylist)) !!} 听力残疾</label>
                        <label class="checkbox-inline">{!! Form::checkbox('disability', 4, in_array(4, $disabilitylist)) !!} 言语残疾</label>
                        <label class="checkbox-inline">{!! Form::checkbox('disability', 5, in_array(5, $disabilitylist)) !!} 肢体残疾</label>
                        <label class="checkbox-inline">{!! Form::checkbox('disability', 6, in_array(6, $disabilitylist)) !!} 智力残疾</label>
                        <label class="checkbox-inline">{!! Form::checkbox('disability', 7, in_array(7, $disabilitylist)) !!} 精神残疾</label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    {!! Form::label('living_kitchen', '生活环境', ['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-md-3">
                                {!! Form::select('living_kitchen',[''=>'-厨房排风设施-',1=>'无',2=>'油烟机',3=>'换气扇',4=>'烟囱'],$model->livingKitchen?$model->livingKitchen->value:null,['class'=>'form-control']) !!}
                            </div>
                            <div class="col-md-2">
                                {!! Form::select('living_fuel',[''=>'-燃料类型-',1=>'液化气',2=>'煤',3=>'天然气',4=>'沼气',5=>'柴火',6=>'其他'],$model->livingFuel?$model->livingFuel->value:null,['class'=>'form-control']) !!}
                            </div>
                            <div class="col-md-2">
                                {!! Form::select('living_water',[''=>'-饮水-',1=>'自来水',2=>'经净化过滤的水',3=>'井水',4=>'河湖水',5=>'塘水',6=>'其他'],$model->livingWater?$model->livingWater->value:null,['class'=>'form-control']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::select('living_toilet',[''=>'-厕所-',1=>'卫生厕所',2=>'一格或二格粪池式',3=>'马桶',4=>'露天粪坑',5=>'简易棚厕'],$model->livingToilet?$model->livingToilet->value:null,['class'=>'form-control']) !!}
                            </div>
                            <div class="col-md-2">
                                {!! Form::select('living_fence',[''=>'-禽畜栏-',1=>'无',2=>'单设',3=>'室内',4=>'室外'],$model->livingFence?$model->livingFence->value:null,['class'=>'form-control']) !!}
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
            </div>
        </div>
    </form>
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
            <input type="text" placeholder="疾病内容" name="disease_content" class="form-control" disabled />
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" placeholder="确诊时间" name="disease_confirmed_at"
                       class="date form-control" disabled readonly/>
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
                    '_method': $("input[name=_method]").val(),
                    '_token': $("input[name=_token]").val(),
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
                    'emergency_contact_name': $("#emergency_contact_name").val(),
                    'emergency_contact_mobile': $("#emergency_contact_mobile").val(),
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
                $.post("{{ URL::action('Tenant\ArchiveController@update', $model->id) }}", postData, function(data){
                    if(data.errorCode == 0){
                        $.toast('更新成功',{type:'success'});
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
                $(this).parent().parent().find("input").removeAttr('required');
                $(this).parent().parent().find("input").val('');
            }
            date();
        });
        //家庭史
        $('body').on('change','select[name=family_value]',function(){
            var content = $(this).find('option').eq($(this).val()-1).text();
            $(this).parent().parent().find("input").removeAttr('disabled').eq(0).val(content);
        });
        //去除初始化的disabled
        $('select[name=disease_value],select[name=injury_value],select[name=operation_value],select[name=transfusion_value]').each(function(){
            if($(this).val() != 1){
                $(this).parent().parent().find('input').removeAttr('disabled');
            }
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