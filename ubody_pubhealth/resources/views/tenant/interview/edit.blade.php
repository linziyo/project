<form class="form" action="{{URL::action('Tenant\\ArticleController@update', $model->id)}}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put">
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">修改医生信息</h4>
    </div>
    <input type="hidden" id="user_id" name="user_id" value="{{ $model->user_id }}" />
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label" for="title">标题</label>
            <input class="form-control" id="title" name="title" placeholder="标题" value="{{ $model->title }}" />
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="image">图片</label>
            <input class="form-control" id="image" name="image" placeholder="图片" value="{{ $model->image }}" />
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="content">内容</label>
            <textarea class="form-control" id="content" name="content" placeholder="内容">{{ $model->content }}</textarea>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>