<form class="form"  method="post"  action="{{URL::action('Admin\\GroupController@update', $model->id)}}">
    <input type="hidden" name="tenant_id" value="{{$model->tenant_id}}"/>
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT"/>
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">修改医组</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('name', '名称', ['class'=>'control-label']) !!}
            {!! Form::text('name', $model->name, ['id'=>'name','class'=>'form-control','placeholder'=>'名称']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="community_hospital_id">简称</label>
            <select name="community_hospital_id" id="community_hospital_id" class="form-control">
                @foreach($list as $organization)
                    @if($model->community_hospital_id === $organization->id)
                        <option value="{{ $organization->id }}" selected>{{ $organization->name }}</option>
                    @else
                        <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                    @endif

                @endforeach
            </select>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">简介</label>
            <textarea name="description" class="form-control">{{ $model->description }}</textarea>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        {!! Form::button('关闭',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
        {!! Form::submit('保存', ['class'=>'btn btn-primary']) !!}
    </div>
</form>
<script src="{{ asset('assets/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('laravalid/jquery.validate.laravalid.js') }}"></script>
<script type="text/javascript">
    $('.form').validate({onkeyup: false});
</script>