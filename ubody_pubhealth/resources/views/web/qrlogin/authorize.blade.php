@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ URL::action('Web\QRLoginController@postAuthorize') }}">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">确认授权</button>
                <button type="submit" class="btn btn-primary">拒绝</button>
            </div>
        </form>
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