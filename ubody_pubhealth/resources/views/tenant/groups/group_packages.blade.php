<form class="form" action="{{URL::action('Tenant\\GroupController@postGroupPackages', $model->id)}}" method="post">
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加服务包</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <th>设置数据包</th>
                </thead>
                <tbody>
                @foreach($package as $package)
                    <tr>
                        <td>
                            <label class="checkbox-inline">
                                @if(in_array($package->id, $list))
                                    <input type="checkbox" class="checkbox" name="package[]" value="{{ $package->id }}" checked="checked"/>{{ $package->name }}
                                @else
                                    <input type="checkbox" class="checkbox" name="package[]" value="{{ $package->id }}"/>{{ $package->name }}
                                @endif
                            </label>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>