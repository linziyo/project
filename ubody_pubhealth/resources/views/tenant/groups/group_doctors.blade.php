<form class="form" action="{{URL::action('Tenant\\GroupController@postGroupDoctors', $group->id)}}" method="post">
    <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">创建医组关系</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>设置医组成员</th>
                </tr>
                </thead>
                <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>
                            <label class="checkbox-inline">
                                @if(in_array($doctor->id, $list))
                                <input type="checkbox" class="checkbox" name="doctor[]" value="{{ $doctor->id }}" checked="checked"/>{{ $doctor->user->real_name }}
                                @else
                                <input type="checkbox" class="checkbox" name="doctor[]" value="{{ $doctor->id }}"/>{{ $doctor->user->real_name }}
                                @endif
                            </label>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>设置队长</th>
                </tr>
                </thead>
                <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>
                            <label class="radio-inline">
                                @if(isset($leader[$doctor->id]) && $leader[$doctor->id]==1)
                                    <input type="radio" class="radio" name="is_leader" value="{{ $doctor->id }}" checked="checked" />{{ $doctor->user->real_name }}
                                @else
                                    <input type="radio" class="radio" name="is_leader" value="{{ $doctor->id }}"/>{{ $doctor->user->real_name }}
                                @endif
                            </label>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="submit" class="btn btn-primary">保存</button>
        </div>
    </div>
</form>

@push('js')
<script type="text/javascript">
    $(function () {

    });
</script>
@endpush