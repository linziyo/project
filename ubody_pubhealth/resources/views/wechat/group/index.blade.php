@extends('wechat.layout')
@section('css')
@stop

@section('wechat_content')
    <div class="weui-pull-to-refresh__layer">
        <div class='weui-pull-to-refresh__arrow'></div>
        <div class='weui-pull-to-refresh__preloader'></div>
        <div class="down">下拉刷新</div>
        <div class="up">释放刷新</div>
        <div class="refresh">正在刷新</div>
    </div>

    <div id="health_list">
        @foreach($list as $model)
            <div class="weui-cells">
                <a class="weui-cell weui-cell_access"
                   href="{{ URL::action('Wechat\HealthController@show', $model->id) }}">
                    <div class="weui-cell__bd">
                        <p>{{ $model->Member->Name }}</p>
                    </div>
                    <div class="weui-cell__ft">{{ $model->MeasureTime }}</div>
                </a>
            </div>
        @endforeach
    </div>
@stop

@section('js')
    <script type="text/template">
    </script>

    <script type="text/javascript">
        $(function () {
            $(document.body).pullToRefresh().on('pull-to-refresh', function () {
                $.alert('hehe');
            });
        })
    </script>
@stop