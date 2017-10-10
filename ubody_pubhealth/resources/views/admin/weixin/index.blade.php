@extends('adminlte::page')

@section('content_header')
    <h1>微信授权</h1>
@stop

@section('content')
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