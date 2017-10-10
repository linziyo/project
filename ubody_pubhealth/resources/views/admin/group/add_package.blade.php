<style>
    .doctor-group{
        font-size:16px;
        color:#333333;
        margin-bottom: 5px;
    }
    .doctor-group>label{
        margin-right: 5px;
        font-weight: normal;
    }
    .doctor-group>label>.oooo{
        width:14px;
        height:14px;
        margin-right:5px;
    }
</style>
<form class="form" action="{{URL::action('Admin\\GroupController@group_package')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加服务包</h4>
    </div>
    <input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
    <input type="hidden" name="group_id" value="{{$id}}"/>

    <div class="modal-body">
        <div class="form-group doctor-group">
        {!! Form::label('doctor_id', '添加服务包', ['class'=>'control-label']) !!}<br/>


        @foreach($data  as $v)
        <label>{!! Form::checkbox('package_id[]',$v->id,in_array($v->id,$package_id), ['class'=>'oooo']),$v->name!!}</label>

        @endforeach

        <span class="help-block"></span>
        </div>
    <div class="modal-footer">
        {!! Form::button('关闭',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
        {!! Form::submit('保存', ['class'=>'btn btn-primary']) !!}
    </div>
</form>

<script type="text/javascript">
</script>
