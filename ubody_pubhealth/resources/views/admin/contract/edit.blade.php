<form class="getForm" action="{{URL::action('Admin\\ContractController@update', $model->id)}}" method="post">
    {{csrf_field()}}
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">签约</h4>
    </div>
    <input type="hidden" name="_method" value="PUT"/>
    <input type="hidden" name="tenant_id" value="{{$model["tenant_id"]}}"/>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('name', '名称', ['class'=>'control-label']) !!}
            {!! Form::text('name',$model->name, ['id'=>'name','class'=>'form-control','placeholder'=>'名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('address', '价格', ['class'=>'control-label']) !!}
            {!! Form::text('address',$model->price, ['id'=>'address','class'=>'form-control','placeholder'=>'地址']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('start_time', '服务开始时间', ['class'=>'control-label']) !!}
            {!! Form::date('start_time',$model->start_time, ['id'=>'start_time','class'=>'form-control ','placeholder'=>'咨询时间']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('end_time', '服务结束时间', ['class'=>'control-label']) !!}
            {!! Form::date('end_time',$model->end_time, ['id'=>'end_time','class'=>'form-control ','placeholder'=>'咨询时间']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="status">状态值</label><br/>
            {!! Form::select('status',array('1' => '待审核','2' => '已审核',
             ),['class'=>'form-control'],['id'=>'status'])!!}
            <span class="help-block"></span>
        </div>
        <div class="modal-footer">
            {!! Form::button('关闭',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
            {!! Form::submit('保存', ['class'=>'btn btn-primary']) !!}
        </div>
    </div>

</form>
<script src="{{ asset('assets/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('laravalid/jquery.validate.laravalid.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $('.getForm').validate({onkeyup: false});
    });
</script>