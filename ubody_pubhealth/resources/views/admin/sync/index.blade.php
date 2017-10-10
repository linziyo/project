@extends('adminlte::page')

@section('content_header')
    <h1>角色管理</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <a href="{{ URL::action("Admin\\RoleController@create") }}" data-toggle="modal" data-target="#ajax"
               class="btn btn-primary">添加</a>
        </div>
        <div class="box-body">
        </div>
        <div class="box-footer">
        </div>
    </div>

    <div class="modal fade" id="ajax">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $(function () {
            $('#ajax').on('hidden.bs.modal', function (e) {
                $(this).removeData("bs.modal");
            })
        });
    </script>
@stop