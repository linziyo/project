@extends('doctor.tab')
@section('css')
    <link href="{{ url('/assets/jqweuix/css/jqweuix.css') }}" rel="stylesheet"/>
@stop

@section('content')
    <div class="weui-tab">
        <div class="weui-navbar">
            <a href="#tab1" class="weui-navbar__item weui-bar__item--on">待确认({{ $confirming }})</a>
            <a href="#tab2" class="weui-navbar__item">已签约({{ $confirmed }})</a>
        </div>
        <div class="weui-tab__bd">
            <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
                <div class="weui-pull-to-refresh__layer">
                    <div class='weui-pull-to-refresh__arrow'></div>
                    <div class='weui-pull-to-refresh__preloader'></div>
                    <div class="down">下拉刷新</div>
                    <div class="up">释放刷新</div>
                    <div class="refresh">正在刷新</div>
                </div>

                <div class="users"></div>

                <div class="weui-loadmore weui-loadmore_line weui-hidden tips">
                    <span class="weui-loadmore__tips">暂无数据</span>
                </div>

                <div class="weui-loadmore weui-loadmore_line weui-loadmore_dot  weui-hidden">
                    <span class="weui-loadmore__tips">点击加载</span>
                </div>
            </div>
            <div id="tab2" class="weui-tab__bd-item">
                <div class="weui-pull-to-refresh__layer">
                    <div class='weui-pull-to-refresh__arrow'></div>
                    <div class='weui-pull-to-refresh__preloader'></div>
                    <div class="down">下拉刷新</div>
                    <div class="up">释放刷新</div>
                    <div class="refresh">正在刷新</div>
                </div>

                <div class="users"></div>

                <div class="weui-loadmore weui-loadmore_line weui-hidden tips">
                    <span class="weui-loadmore__tips">暂无数据</span>
                </div>

                <div class="weui-loadmore weui-loadmore_line weui-loadmore_dot  weui-hidden">
                    <span class="weui-loadmore__tips">点击加载</span>
                </div>
            </div>

        </div>
    </div>
@stop

@push('js')
<script id="userDetails" type="text/template">
    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__bd">
            <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                <div class="weui-media-box__hd">
                    <img src="{{ url('/images/default_avatar.jpg') }}" style="width:48px;height:48px"/>
                </div>
                <div class="weui-media-box__bd">
                    <h4 class="weui-media-box__title"><%:=real_name%></h4>
                    <h6 class="weui-media-box__desc">手机号:<%:=mobile%></h6>
                    <h6 class="weui-media-box__desc">身份证:<%:=id_code%></h6>
                    {{--<p class="weui-media-box__desc"></p>--}}
                </div>
                <div class="weui-media-box__desc">查看档案</div>
                <%if(status == 1){%>
                <a href="{{ URL::action('Doctor\ContractController@detail') }}?aid=<%:=aid%>"><div class="weui-media-box__desc">确认</div></a>
                <%}else{%>
                <a href="{{ URL::action('Doctor\ContractController@detail') }}?aid=<%:=aid%>"><div class="weui-media-box__desc">签约信息</div></a>
                <%}%>
            </a>
        </div>
    </div>
</script>
<script type="text/javascript">
    var page_tab1 = 1;
    var page_tab2 = 1;
    var isLoading = false;
    function renderUserDetails(user,tab) {
        var content = $("#userDetails").html();
        $(tab).find('.users').append(template(content, user));
    }

    function render(result,type) {
        var tab = '';
        if(type == 2){
            page_tab2 = result.current_page;
            tab = '#tab2';
        }else {
            page_tab1 = result.current_page;
            tab = '#tab1';
        }

        if (result.last_page == result.current_page) {
            $(tab).destroyInfinite();
            $(tab).find('.weui-loadmore_dot').hide();
            $(tab).find('.tips span').text('加载完毕');
            $(tab).find('.tips').show();
//            $(".weui-loadmore").remove();
        }else if(result.current_page < result.last_page) {
            $(tab).find('.weui-loadmore_dot').show();
            $(tab).find('.tips').hide();
        }else {
            $(tab).find('.weui-loadmore_dot').hide();
            $(tab).find('.tips span').text('暂无数据');
            $(tab).find('.tips').show();
        }
        for (var i = 0; i < result.data.length; i++) {
            renderUserDetails(result.data[i],tab);
        }
    }

    function loadData(url, callback) {
        $.get(url, callback);
    }

    function refresh(type) {
        loadData("{{ URL::action('Doctor\ContractController@query') }}?type="+type, function (result) {
           if(type ==2){
                $('#tab2').pullToRefreshDone();
                $("#tab2").find('.users').empty();
                page_tab2 = 1;
                render(result,type);
            }else {
                $('#tab1').pullToRefreshDone();
                $("#tab1").find('.users').empty();
                page_tab1 = 1;
                render(result,type);
            }

        });
    }

    function loadMore(type,page) {
        loadData("{{ URL::action('Doctor\ContractController@query') }}?page=" + page+'&type='+type, function (result) {
            render(result);
        });
    }

    $(function () {
        $("#tab1").pullToRefresh().on("pull-to-refresh", function () {
            refresh(1);
        }).on('infinite', function () {
            if(isLoading) return;
            isLoading = true;
            loadMore(1,page_tab1);
            isLoading = false;
        });

        $("#tab2").pullToRefresh().on("pull-to-refresh", function () {
            refresh(2);
        }).on('infinite', function () {
            if(isLoading) return;
            isLoading = true;
            loadMore(2,page_tab2);
            isLoading = false;

        });

        refresh(1);
        refresh(2);
    });
</script>
@endpush