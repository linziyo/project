@extends('tenant.layout')

@section('css')
    <link href="{{ asset('assets/select2/css/select2.min.css') }}" rel="stylesheet"/>
@endsection

@section('content_header')
    <h1>创建档案</h1>
@endsection

@section('content')
    <form class="form-horizontal" action="{{URL::action('Tenant\\ArchiveController@store')}}" method="post">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">档案详情</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">姓名</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="real_name" name="real_name" type="text"
                               placeholder="请输入姓名"/>
                    </div>
                    <div class="col-sm-2">
                        <label class="checkbox-inline"><input type="checkbox" name="is_register" value="1"/>
                            本辖区户籍</label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">身份证号码</label>
                    <div class="col-sm-6">
                        <input class="form-control" id="id_code" name="id_code" type="text" placeholder="请输入身份证号码"/>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="birthday">出生日期/性别</label>
                    <div class="col-sm-2">
                        <div class="input-group date">
                            <input class="form-control" id="birthday" name="birthday" type="text" placeholder="请输入出生日期"
                                   readonly/>
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline"><input type="radio" name="sex" value="0" checked="checked"/>
                            未知的性别</label>
                        <label class="radio-inline"><input type="radio" name="sex" value="1"/> 男</label>
                        <label class="radio-inline"><input type="radio" name="sex" value="2"/> 女</label>
                        <label class="radio-inline"><input type="radio" name="sex" value="9"/> 未说明的性别</label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">本人电话/工作单位</label>
                    <div class="col-sm-2">
                        <input class="form-control" id="mobile" name="mobile" type="text" placeholder="请输入本人电话"/>
                    </div>
                    <div class="col-sm-4">
                        <input class="form-control" id="work_unit" name="work_unit" type="text" placeholder="请输入工作单位"/>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">联系人</label>
                    <div class="col-sm-2">
                        <input class="form-control" id="contact_name" name="contact_name" type="text"
                               placeholder="请输入联系人姓名"/>
                    </div>
                    <div class="col-sm-4">
                        <input class="form-control" id="contact_mobile" name="contact_mobile" type="text"
                               placeholder="请输入联系人电话"/>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">紧急联系人</label>
                    <div class="col-sm-2">
                        <input class="form-control" id="emergency_contact_name" name="emergency_contact_name"
                               type="text"
                               placeholder="请输入紧急联系人姓名"/>
                    </div>
                    <div class="col-sm-4">
                        <input class="form-control" id="emergency_contact_mobile" name="emergency_contact_mobile"
                               type="text"
                               placeholder="请输入紧急联系人电话"/>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">家庭电话/家庭住址</label>
                    <div class="col-sm-2">
                        <input class="form-control" id="phone_number" name="phone_number" type="text"
                               placeholder="请输入家庭电话"/>
                    </div>
                    <div class="col-sm-4">
                        <input class="form-control" id="address" name="address" type="text" placeholder="请输入家庭住址"/>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">民族/文化程度/职业</label>
                    <div class="col-sm-2">
                        <select class="form-control" name="nation" id="nation">
                            <option value="">请选择民族</option>
                            <option value="阿昌族">阿昌族</option>
                            <option value="白族">白族</option>
                            <option value="保安族">保安族</option>
                            <option value="布朗族">布朗族</option>
                            <option value="布依族">布依族</option>
                            <option value="朝鲜族">朝鲜族</option>
                            <option value="达斡尔族">达斡尔族</option>
                            <option value="傣族">傣族</option>
                            <option value="德昂族">德昂族</option>
                            <option value="东乡族">东乡族</option>
                            <option value="侗族">侗族</option>
                            <option value="独龙族">独龙族</option>
                            <option value="俄罗斯族">俄罗斯族</option>
                            <option value="鄂伦春族">鄂伦春族</option>
                            <option value="鄂温克族">鄂温克族</option>
                            <option value="高山族">高山族</option>
                            <option value="仡佬族">仡佬族</option>
                            <option value="哈尼族">哈尼族</option>
                            <option value="哈萨克族">哈萨克族</option>
                            <option value="汉族" selected>汉族</option>
                            <option value="赫哲族">赫哲族</option>
                            <option value="回族">回族</option>
                            <option value="基诺族">基诺族</option>
                            <option value="京族">京族</option>
                            <option value="景颇族">景颇族</option>
                            <option value="柯尔克孜族">柯尔克孜族</option>
                            <option value="拉祜族">拉祜族</option>
                            <option value="黎族">黎族</option>
                            <option value="傈僳族">傈僳族</option>
                            <option value="珞巴族">珞巴族</option>
                            <option value="满族">满族</option>
                            <option value="毛南族">毛南族</option>
                            <option value="门巴族">门巴族</option>
                            <option value="蒙古族">蒙古族</option>
                            <option value="苗族">苗族</option>
                            <option value="仫佬族">仫佬族</option>
                            <option value="纳西族">纳西族</option>
                            <option value="怒族">怒族</option>
                            <option value="普米族">普米族</option>
                            <option value="羌族">羌族</option>
                            <option value="撒拉族">撒拉族</option>
                            <option value="畲族">畲族</option>
                            <option value="水族">水族</option>
                            <option value="塔吉克族">塔吉克族</option>
                            <option value="塔塔尔族">塔塔尔族</option>
                            <option value="土家族">土家族</option>
                            <option value="土族">土族</option>
                            <option value="佤族">佤族</option>
                            <option value="维吾尔族">维吾尔族</option>
                            <option value="乌孜别克族">乌孜别克族</option>
                            <option value="锡伯族">锡伯族</option>
                            <option value="瑶族">瑶族</option>
                            <option value="彝族">彝族</option>
                            <option value="裕固族">裕固族</option>
                            <option value="藏族">藏族</option>
                            <option value="壮族">壮族</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control" name="nation" id="nation">
                            <option value="">请选择文化程度</option>
                            <option value="1">研究生</option>
                            <option value="2">大学本科</option>
                            <option value="3">大学专科和专科学校</option>
                            <option value="4">中等专业学校</option>
                            <option value="5">技工学校</option>
                            <option value="6">高中</option>
                            <option value="7">初中</option>
                            <option value="8">小学</option>
                            <option value="9">文盲或半文盲</option>
                            <option value="10">不详</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control" name="nation" id="nation">
                            <option value="">请选择职业</option>
                            <option value="0">国家机关、党群组织、企业、事业单位负责人</option>
                            <option value="1">专业技术人员</option>
                            <option value="2">办事人员和有关人员</option>
                            <option value="3">商业、服务业人员</option>
                            <option value="4">农、林、牧、渔、水利业生产人员</option>
                            <option value="5">生产、运输设备操作人员及有关人员</option>
                            <option value="6">军人</option>
                            <option value="7">不便分类的其他从业人员</option>
                            <option value="8">无职业</option>
                        </select>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">血型</label>
                    <div class="col-sm-3">
                        <label class="radio-inline"><input type="radio" name="blood_group" value="1"/> A型</label>
                        <label class="radio-inline"><input type="radio" name="blood_group" value="2"/> B型</label>
                        <label class="radio-inline"><input type="radio" name="blood_group" value="3"/> O型</label>
                        <label class="radio-inline"><input type="radio" name="blood_group" value="4"/> AB型</label>
                        <label class="radio-inline"><input type="radio" name="blood_group" value="5" checked="checked"/>
                            不详</label>
                    </div>
                    <div class="col-sm-3">
                        <label class="radio-inline"><input type="radio" name="blood_group_rh" value="1"/> RH 阴性</label>
                        <label class="radio-inline"><input type="radio" name="blood_group_rh" value="2"/> RH 阳性</label>
                        <label class="radio-inline"><input type="radio" name="blood_group_rh" value="3"
                                                           checked="checked"/> 不详</label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">婚姻状况</label>
                    <div class="col-sm-6">
                        <label class="radio-inline"><input type="radio" name="marital_status" value="1"/> 未婚</label>
                        <label class="radio-inline"><input type="radio" name="marital_status" value="2"/> 已婚</label>
                        <label class="radio-inline"><input type="radio" name="marital_status" value="3"/> 丧偶</label>
                        <label class="radio-inline"><input type="radio" name="marital_status" value="4"/> 离异</label>
                        <label class="radio-inline"><input type="radio" name="marital_status" value="5"/>
                            未说明的婚姻状况</label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">其他说明</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" placeholder="请输入其他说明" rows="3"></textarea>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">医疗费用支付方式</label>
                    <div class="col-sm-6">
                        <label class="checkbox-inline"><input type="checkbox" name="payment_mode" value="1"/> 城镇职工基本医疗保险</label>
                        <label class="checkbox-inline"><input type="checkbox" name="payment_mode" value="2"/> 城镇居民基本医疗保险</label>
                        <label class="checkbox-inline"><input type="checkbox" name="payment_mode" value="3"/>
                            新型农村合作医疗</label>
                        <label class="checkbox-inline"><input type="checkbox" name="payment_mode" value="4"/>
                            贫困救助</label>
                        <label class="checkbox-inline"><input type="checkbox" name="payment_mode" value="5"/>
                            商业医疗保险</label>
                        <label class="checkbox-inline"><input type="checkbox" name="payment_mode" value="6"/>
                            全公费</label>
                        <label class="checkbox-inline"><input type="checkbox" name="payment_mode" value="7"/>
                            全自费</label>
                        <label class="checkbox-inline"><input type="checkbox" name="payment_mode" value="8"/> 其他</label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">药物过敏史</label>
                    <div class="col-sm-6">
                        <label class="checkbox-inline"><input type="checkbox" name="allergy" value="1"/> 无</label>
                        <label class="checkbox-inline"><input type="checkbox" name="allergy" value="2"/> 青霉素</label>
                        <label class="checkbox-inline"><input type="checkbox" name="allergy" value="3"/> 磺胺</label>
                        <label class="checkbox-inline"><input type="checkbox" name="allergy" value="4"/> 链霉素</label>
                        <label class="checkbox-inline"><input type="checkbox" name="allergy" value="5"/> 其他</label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">暴露史</label>
                    <div class="col-sm-6">
                        <label class="checkbox-inline"><input type="checkbox" name="expose" value="1"/> 无</label>
                        <label class="checkbox-inline"><input type="checkbox" name="expose" value="2"/> 化学品</label>
                        <label class="checkbox-inline"><input type="checkbox" name="expose" value="3"/> 毒物</label>
                        <label class="checkbox-inline"><input type="checkbox" name="expose" value="4"/> 射线</label>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">既往史 疾病</label>
                    <div class="col-sm-6">
                        <table class="table table-bordered table-hover table-striped">
                            <tbody>
                            <tr>
                                <td>
                                    <select class="form-control" name="medical[]">
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
                                </td>
                                <td>
                                    <input type="text" placeholder="确诊时间" class="form-control"/>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">删除</button>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3"><a href="#" class="btn btn-default">添加</a></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">既往史 手术</label>
                    <div class="col-sm-6">
                        <table class="table table-bordered table-hover table-striped">
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" placeholder="名称" class="form-control"/>
                                </td>
                                <td>
                                    <input type="text" placeholder="时间" class="form-control"/>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">删除</button>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3"><a href="#" class="btn btn-default">添加</a></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">既往史 外伤</label>
                    <div class="col-sm-6">
                        <table class="table table-bordered table-hover table-striped">
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" placeholder="名称" class="form-control"/>
                                </td>
                                <td>
                                    <input type="text" placeholder="时间" class="form-control"/>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">删除</button>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3"><a href="#" class="btn btn-default">添加</a></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">既往史 输血</label>
                    <div class="col-sm-6">
                        <table class="table table-bordered table-hover table-striped">
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" placeholder="名称" class="form-control"/>
                                </td>
                                <td>
                                    <input type="text" placeholder="时间" class="form-control"/>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">删除</button>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3"><a href="#" class="btn btn-default">添加</a></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-sm-4"><span class="help-block"></span></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="image">家族史</label>
                <div class="col-sm-6">
                    <table class="table table-bordered table-hover table-striped">
                        <tbody>
                        <tr>
                            <td>
                                <input type="text" placeholder="关系" class="form-control"/>
                            </td>
                            <td>
                                <select class="form-control" name="medical[]">
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
                            </td>
                            <td>
                                <input type="text" placeholder="确诊时间" class="form-control"/>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger">删除</button>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="4"><a href="#" class="btn btn-default">添加</a></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="image">遗传病史</label>
                <div class="col-sm-6">
                    <input type="text" placeholder="疾病名称" class="form-control"/>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="image">残疾情况</label>
                <div class="col-sm-6">
                    <select class="form-control select2" multiple="multiple">
                        <option value="1">无残疾</option>
                        <option value="2">视力残疾</option>
                        <option value="3">听力残疾</option>
                        <option value="4">言语残疾</option>
                        <option value="5">肢体残疾</option>
                        <option value="6">智力残疾</option>
                        <option value="7">精神残疾</option>
                    </select>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="image">生活环境 厨房排风设施</label>
                <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" name="device" value="1"/> 无</label>
                    <label class="radio-inline"><input type="radio" name="device" value="2"/> 油烟机</label>
                    <label class="radio-inline"><input type="radio" name="device" value="3"/> 换气扇</label>
                    <label class="radio-inline"><input type="radio" name="device" value="4"/> 烟囱</label>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="image">生活环境 燃料类型</label>
                <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" name="fuel" value="1"/> 液化气</label>
                    <label class="radio-inline"><input type="radio" name="fuel" value="2"/> 煤</label>
                    <label class="radio-inline"><input type="radio" name="fuel" value="3"/> 天然气</label>
                    <label class="radio-inline"><input type="radio" name="fuel" value="4"/> 沼气</label>
                    <label class="radio-inline"><input type="radio" name="fuel" value="5"/> 柴火</label>
                    <label class="radio-inline"><input type="radio" name="fuel" value="6"/> 其他</label>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="image">生活环境 饮水</label>
                <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" name="drink" value="1"/> 自来水</label>
                    <label class="radio-inline"><input type="radio" name="drink" value="2"/> 经净化过滤的水</label>
                    <label class="radio-inline"><input type="radio" name="drink" value="3"/> 井水</label>
                    <label class="radio-inline"><input type="radio" name="drink" value="4"/> 河湖水</label>
                    <label class="radio-inline"><input type="radio" name="drink" value="5"/> 塘水</label>
                    <label class="radio-inline"><input type="radio" name="drink" value="5"/> 其他</label>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="image">生活环境 厕所</label>
                <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" name="wc" value="1"/> 卫生厕所</label>
                    <label class="radio-inline"><input type="radio" name="wc" value="2"/> 一格或二格粪池式</label>
                    <label class="radio-inline"><input type="radio" name="wc" value="3"/> 马桶</label>
                    <label class="radio-inline"><input type="radio" name="wc" value="4"/> 露天粪坑</label>
                    <label class="radio-inline"><input type="radio" name="wc" value="5"/> 简易棚厕</label>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="image">生活环境 禽兽栏</label>
                <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" name="inhuman" value="1"/> 无</label>
                    <label class="radio-inline"><input type="radio" name="inhuman" value="2"/> 单设</label>
                    <label class="radio-inline"><input type="radio" name="inhuman" value="3"/> 室内</label>
                    <label class="radio-inline"><input type="radio" name="inhuman" value="4"/> 室外</label>
                </div>
                <div class="col-sm-4"><span class="help-block"></span></div>
            </div>
            <div class="box-footer">
                <div class="form-actions col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">提交</button>
                    <a href="{{ URL::action('Tenant\ArchiveController@index') }}" class="btn btn-default">返回</a>
                </div>
            </div>
        </div>
    </form>
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