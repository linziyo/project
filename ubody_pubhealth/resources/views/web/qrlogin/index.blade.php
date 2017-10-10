@extends('layouts.app')

@section('content')
    <div class="container text-center">
        {!! QrCode::size(300)->generate(Request::url()) !!}
        <p>使用手机扫描二维码登录</p>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        function check() {
            $.get("{{URL::action('Web\QRLoginController@check')}}", function () {
                window.setTimeout(check, 2000);
            });
        }
        $(function () {
            check();
        })
    </script>
@stop