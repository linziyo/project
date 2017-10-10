@extends('tenant.layout')

@section('css')
    <link href="{{ asset('assets/select2/css/select2.min.css') }}" rel="stylesheet"/>
@endsection

@section('content_header')
    <h1>档案详情</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle"
                         src="{{ url('/images/default_avatar.jpg') }}" alt="User profile picture">
                    <h3 class="profile-username text-center">Nina Mcintire</h3>
                    <p class="text-muted text-center">男 80岁 汉族 非户籍</p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>身份证号码</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>本人电话</b> <a class="pull-right">13,287</a>
                        </li>
                        <li class="list-group-item">
                            <b>工作单位</b> <a class="pull-right">13,287</a>
                        </li>
                        <li class="list-group-item">
                            <b>联系人</b> <a class="pull-right">13,287</a>
                        </li>
                        <li class="list-group-item">
                            <b>紧急联系人</b> <a class="pull-right">13,287</a>
                        </li>
                        <li class="list-group-item">
                            <b>家庭电话</b> <a class="pull-right">13,287</a>
                        </li>
                        <li class="list-group-item">
                            <b>家庭住址</b> <a class="pull-right">13,287</a>
                        </li>
                        <li class="list-group-item">
                            <b>文化程度</b> <a class="pull-right">13,287</a>
                        </li>
                        <li class="list-group-item">
                            <b>职业</b> <a class="pull-right">13,287</a>
                        </li>
                        <li class="list-group-item">
                            <b>血型</b> <a class="pull-right">13,287</a>
                        </li>
                        <li class="list-group-item">
                            <b>婚姻状况</b> <a class="pull-right">13,287</a>
                        </li>
                    </ul>
                    <a href="{{ URL::action('Tenant\ArchiveController@edit', $model->id) }}"
                       class="btn btn-primary btn-block"><b>修改档案</b></a>
                    <a href="{{ URL::action('Tenant\ArchiveController@edit', $model->id) }}"
                       class="btn btn-primary btn-block"><b>审核档案</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">医疗费用支付方式</a></li>
                    <li class=""><a href="#group" data-toggle="tab" aria-expanded="false">药物过敏史</a></li>
                    <li><a href="#area" data-toggle="tab" aria-expanded="false">暴露史</a></li>
                    <li><a href="#area" data-toggle="tab" aria-expanded="false">既往史</a></li>
                    <li><a href="#area" data-toggle="tab" aria-expanded="false">家族史</a></li>
                    <li><a href="#area" data-toggle="tab" aria-expanded="false">遗传病史</a></li>
                    <li><a href="#area" data-toggle="tab" aria-expanded="false">残疾情况</a></li>
                    <li><a href="#area" data-toggle="tab" aria-expanded="false">生活环境</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="activity">
                        <div class="post">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="width:50px">编号</th>
                                    <th>名称</th>
                                    <th>手机号码</th>
                                    <th>职务</th>
                                    <th>职称</th>
                                    <th>专业</th>
                                    <th>技能</th>
                                    <th style="width:120px">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <a href="http://2.ubody.local:2080/tenant/doctors/create?community_id=1"
                                       data-toggle="modal" data-target="#ajax" class="btn btn-primary">新增医生</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="group">
                        <div class="post">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="width:50px">编号</th>
                                    <th>名称</th>
                                    <th>详情介绍</th>
                                    <th style="width:300px">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <a href="http://2.ubody.local:2080/tenant/groups/create?community_id=1"
                                       data-toggle="modal" data-target="#ajax" class="btn btn-primary">新增医组</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="area">
                        <div class="post">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="width:50px">编号</th>
                                    <th>名称</th>
                                    <th>所属社区</th>
                                    <th style="width:300px">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <a href="http://2.ubody.local:2080/tenant/areas/create?community_id=1"
                                       data-toggle="modal" data-target="#ajax" class="btn btn-primary">新增区域</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#visitor" data-toggle="tab" aria-expanded="true">随访记录</a></li>
                    <li class=""><a href="#acception" data-toggle="tab" aria-expanded="false">接诊记录</a></li>
                    <li><a href="#consultation" data-toggle="tab" aria-expanded="false">会诊记录</a></li>
                    <li><a href="#referral" data-toggle="tab" aria-expanded="false">双向转诊记录</a></li>
                    <li><a href="#health" data-toggle="tab" aria-expanded="false">体检数据</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="visitor">
                        <a href="" class="btn btn-primary">添加随访记录</a>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>随访类型</th>
                                <th>随访时间</th>
                                <th>预计下次随访时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>高血压患者随访服务记录表</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        高血压患者随访服务记录表、2型糖尿病患者随访服务记录表、严重精神障碍患者随访服务记录表、肺结核患者第一次入户随访记录表、肺结核患者随访服务记录表
                    </div>
                    <div class="tab-pane active" id="acception">
                        接诊单
                    </div>
                    <div class="tab-pane active" id="consultation">
                        会诊单
                    </div>
                    <div class="tab-pane active" id="referral">
                        转诊单
                    </div>
                    <div class="tab-pane active" id="health">
                        体检数据
                    </div>
                </div>
                新生儿家庭访视记录表、1~8月龄儿童健康检查记录表、12~30月龄儿童健康检查记录表、3~6岁儿童健康检查记录表、第一次产前检查服务记录表、第2~5次产前随访服务记录表、产后访视记录表、产后42天健康检查记录表、
                高血压患者随访服务记录表、2型糖尿病患者随访服务记录表、严重精神障碍者个人信息补充表、严重精神障碍患者随访服务记录表、肺结核患者第一次入户随访记录表、肺结核患者随访服务记录表、中老年中医药健康管理服务记录表、
                体质判定标准表、6~18月龄儿童中医药健康管理服务记录表、24-36月龄儿童中医药健康管理服务记录表、Referral letter
            </div>

            <div class="form-actions">
                <a href="" class="btn btn-primary">居民健康档案信息卡</a>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('/assets/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
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
    });
</script>
@endpush