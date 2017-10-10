{!! Form::open(array('action'=>'Admin\\ContractController@store', 'method'=>'post', 'class'=>'getForm','enctype'=>'multipart/form-data')) !!}
<div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">签约</h4>
    </div>
    <input type="hidden" name="tenant_id" value="{{$tenant["id"]}}"/>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('name', '名称', ['class'=>'control-label']) !!}
            {!! Form::text('name', '', ['id'=>'name','class'=>'form-control','placeholder'=>'名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">所属机构</label><br />
            {!!  Form::select('organization_id', $list,null,['class'=>'form-control'])!!}
            <span class="help-block"></span>
        </div>
        <input type="hidden" name="id" value="$model->id"/>

        <div class="form-group">

            {!! Form::label('address', '地址', ['class'=>'control-label']) !!}
            {!! Form::text('address', '', ['id'=>'address','class'=>'form-control','placeholder'=>'地址']) !!}
            <span class="help-block"></span>
        </div>

        <div class="form-group">
            {{--{!! Form::label('community_hospital_id', '添加服务包', ['class'=>'control-label']) !!}<br>--}}
{{--            {!! Form::select('package_id', $package,null,['class'=>'form-control']) !!}--}}
            <span class="help-block"></span>
        </div>


        <div class="form-group">

            {!! Form::label('price', '签约价格', ['class'=>'control-label']) !!}
            {!! Form::text('price', '', ['id'=>'price','class'=>'form-control','placeholder'=>'地址']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">

            {!! Form::label('image', '图片', ['class'=>'control-label']) !!}

            {!! Form::file('image',['id'=>'image','class'=>'form-control','placeholder'=>'图片']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('start_time', '服务开始时间', ['class'=>'control-label']) !!}
            {!! Form::date('start_time', '', ['id'=>'start_time','class'=>'form-control ','placeholder'=>'咨询时间']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('end_time', '服务结束时间', ['class'=>'control-label']) !!}
            {!! Form::date('end_time', '', ['id'=>'end_time','class'=>'form-control ','placeholder'=>'咨询时间']) !!}
            <span class="help-block"></span>
        </div>
        {{--<div class="form-group">--}}

            {{--{!! Form::label('contract', '服务结束时间', ['class'=>'control-label']) !!}<br />--}}
            {{--{!! Form::date('end_time') !!}--}}

            {{--<span class="help-block"></span>--}}
        {{--</div>--}}
        <div class="form-group">
            <label class="control-label" for="status">状态值</label><br/>
            @foreach(\App\Models\Contract::$status as $key=>$value)

                {!! Form::radio('status',$key),$value!!}
            @endforeach
           {{--{!! Form::select('status', array('1' => '待审核 ','2' => '已审核',--}}
            {{--),['class'=>'form-control'],['id'=>'status'])!!}--}}

            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        {!! Form::button('取消签约',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
        {!! Form::submit('立即签约', ['class'=>'btn btn-primary']) !!}
    </div>
{{ Form::close() }}
<script src="{{ asset('assets/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('laravalid/jquery.validate.laravalid.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $('.getForm').validate({onkeyup: false});
    });
</script>