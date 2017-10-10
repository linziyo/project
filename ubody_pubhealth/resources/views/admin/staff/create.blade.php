<form class="form" action="{{URL::action('Admin\\StaffController@store')}}" method="post" enctype="multipart/form-data">
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加用户到管理员</h4>
    </div>
    {{csrf_field()}}
    {!! Form::hidden('user_id',null,['id'=>'user_id']) !!}
    <input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('user_name', '医生手机号码', ['class'=>'control-label']) !!}
            <div class="input-group">
                {!! Form::text('mobile', '', ['id'=>'mobile','class'=>'form-control','placeholder'=>'医生手机号码']) !!}
                <span class="input-group-btn">
                {!! Form::button('搜索',['id'=>'btnSearch','class'=>'btn btn-info btn-flat','data-loading-text'=>'Loading...']) !!}
            </span>
            </div>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('community_hospital_id', '社区医院', ['class'=>'control-label']) !!}
            <span class="help-block"></span>
            <select name="community_hospital_id" class='form-control'>
                @if(!empty($hospitals))
                @foreach($hospitals as $hospital)
                <option value="{{$hospital->id}}">{{ $hospital->name }} </option>
                @endforeach
                @endif
            </select>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        {!! Form::button('关闭',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
        {!! Form::submit('保存', ['class'=>'btn btn-primary']) !!}
    </div>
</form>

<script type="text/javascript">
    $(function () {
        $("#btnSearch").on('click', function () {
            var mobile = $('#mobile').val();
            if(!mobile)
            {
                alert('请输入手机号码');
            }else{
                var $btn = $(this).button('loading');

                var request_url = "{{URL::action('Admin\\DoctorController@create')}}";
            $.get(request_url, {'mobile': mobile}, function (data) {
                $btn.button('reset');
                if (data.success) {
                    $('#user_id').val(data.userid);
                    $("#btnSearch").parent().parent().parent().addClass('has-success');
                }
                else{
                    alert('请输入正确的手机号码');
                }
            })};
        });

    });
</script>