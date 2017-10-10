{!! Form::open(['action'=>'Tenant\\ArticleController@store', 'id'=>'create_article_form', 'enctype'=>'multipart/form-data']) !!}
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">创建文章信息</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            {!! Form::label('title','标题',['class'=>'control-label']) !!}
            {!! Form::text('title', '', ['id'=>'title','class'=>'form-control','placeholder'=>'标题']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('image', '图片', ['class'=>'control-label']) !!}
            {!! Form::file('image',['id'=>'image','class'=>'form-control','placeholder'=>'图片']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            {!! Form::label('content','内容',['class'=>'control-label']) !!}
            {!! Form::textarea('content',null,['id'=>'content','class'=>'form-control','placeholder'=>'内容']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        {!! Form::button('关闭',['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
        {!! Form::submit('保存', ['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
<script type="text/javascript">
    $('#create_article_form').validate({onkeyup: false});
</script>