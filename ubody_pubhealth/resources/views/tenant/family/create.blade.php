<form class="form" action="{{URL::action('Tenant\\DoctorController@store')}}" method="post">
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">创建医生信息</h4>
    </div>
    <input type="hidden" id="user_id" name="user_id" />
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label" for="user_name">医生名称</label>
            <input class="form-control" style="display:inline;width:50%;" id="mobile" name="mobile" placeholder="医生手机号码"/>
            <a id="doctor_search" class="btn btn-primary">搜索</a>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="community_id">所属社康</label>
            <select class="form-control" id="community_id" name="community_id">
                @foreach($list as $community)
                    <option value="{{ $community->id }}">{{ $community->name }}</option>
                @endforeach
            </select>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="avatar">医生头像</label>
            <input class="form-control" id="avatar" name="avatar" placeholder="医生头像"/>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="duty">职务</label>
            <input class="form-control" id="duty" name="duty" placeholder="职务" />
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="title">职称</label>
            <input class="form-control" id="title" name="title" placeholder="职称" />
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="specialty">专业</label>
            <input class="form-control" id="specialty" name="specialty" placeholder="专业" />
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="skills">技能</label>
            <input class="form-control" id="skills" name="skills" placeholder="技能" />
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="working_time">从业时间</label>
            <input class="form-control" id="working_time" name="working_time" placeholder="从业时间" />
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="consult">咨询时间</label>
            <input class="form-control" id="consult" name="consult" placeholder="咨询时间" />
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="description">医生介绍</label>
            <textarea class="form-control" id="description" name="description" placeholder="医生介绍"></textarea>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>
<script type="text/javascript">
    $(function(){
        $('#doctor_search').click(function(){
            var mobile = $('#mobile').val();
            var request_url = "{{URL::action('Tenant\\DoctorController@create')}}";
            $.get(request_url,{'mobile':mobile},function(data){
                if(data.success){
                    $('#user_id').val(data.userid);
                    alert('success');
                }else{
                    alert('false');
                }
            });
        });
    });
</script>