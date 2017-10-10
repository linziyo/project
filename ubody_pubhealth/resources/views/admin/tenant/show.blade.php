@extends('admin.tenantLayout')

@section('content_header')
    <h1>{{ $model->name }}</h1>
@stop

@section('tenant_content')
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header"><h3 class="box-title">建档率</h3></div>
                        <div class="box-body"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header"><h3 class="box-title">签约率</h3></div>
                        <div class="box-body"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $(function () {
        });
    </script>
@stop