@extends('doctor.tab')
@section('css')
    <link href="{{ url('/assets/jqweuix/css/jqweuix.css') }}" rel="stylesheet"/>
@stop

@section('content')

    <div class="weui-search-bar" id="searchBar">
        <form class="weui-search-bar__form">
            <div class="weui-search-bar__box">
                <i class="weui-icon-search"></i>
                <input type="search" class="weui-search-bar__input" id="searchInput" placeholder="搜索" required="" onpropertychange="search()" oninput="search()">
                <a href="javascript:" class="weui-icon-clear" id="searchClear" ></a>
            </div>
            <label class="weui-search-bar__label" id="searchText">
                <i class="weui-icon-search"></i>
                <span>搜索</span>
            </label>
        </form>
        <a href="javascript:" class="weui-search-bar__cancel-btn" id="searchCancel" >取消</a>
    </div>

    <div class="weui-tab">
        <div class="weui-navbar">
            <a href="#tab1" class="weui-navbar__item weui-bar__item--on">待审核(<span id="confirmingTotal">{{ $confirming }}</span>)</a>
            <a href="#tab2" class="weui-navbar__item">已建档(<span id="confirmedTotal">{{ $confirmed }}</span>)</a>
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
            <a href="{{ URL::action('Doctor\ArchiveController@center') }}?aid=<%:=id%>" class="weui-media-box weui-media-box_appmsg weui-cell_access weui-cell_link">
                <div class="weui-media-box__hd">
                    <img src="{{ url('/images/default_avatar.jpg') }}" style="width:48px;height:48px"/>
                </div>
                <div class="weui-media-box__bd">
                    <h4 class="weui-media-box__title">姓名:<%:=real_name%></h4>
                    <h6 class="weui-media-box__desc">手机号:<%if(mobile){%><%:=mobile%><%}else{%>无<%}%></h6>
                    <h6 class="weui-media-box__desc">身份证:<%if(id_code){%><%:=id_code%><%}else{%>无<%}%></h6>
                </div>
                <%if(type==2){%>
                <%if(contract_status == 0){%>
                <div class="weui-media-box__desc">未签约</div>
                <%}else if(contract_status == 1){%>
                <div class="weui-media-box__desc">已预约</div>
                <%}else if(contract_status == 2){%>
                <div class="weui-media-box__desc">已签约</div>
                <%}%>
                <%}%>

                <span class="weui-cell__ft"></span>

            </a>
        </div>
    </div>
</script>
<script type="text/javascript">
    var page_tab1 = 1;
    var page_tab2 = 1;
    var isLoading = false;
    function renderUserDetails(archive,tab) {
        var content = $("#userDetails").html();
        $(tab).find('.users').append(template(content, archive));
    }

    function render(result,type) {
        let len = result.data.length;
        var tab = '';
        if(type == 2){
            page_tab2 = result.current_page;
            tab = '#tab2';
            $('#confirmedTotal').text(len);
        }else {
            page_tab1 = result.current_page;
            tab = '#tab1';
            $('#confirmingTotal').text(len);
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
        for (var i = 0; i < len; i++) {
            result.data[i].type = type;
            renderUserDetails(result.data[i],tab);
        }
    }

    function loadData(url, callback) {
//        $.get(url, callback);
        $.ajax({
            type:'GET',
            async:false,
            data:{},
            url:url,
            dataType:'json',
            success:callback,
            error:function(data){
                console.log(data);
            }
        })
    }

    function refresh(type) {
        let searchname = $.trim($('#searchInput').val());
        loadData("{{ URL::action('Doctor\ArchiveController@query') }}?type="+type+"&searchname="+searchname, function (result) {
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
        let searchname = $.trim($('#searchInput').val());
        loadData("{{ URL::action('Doctor\ArchiveController@query') }}?page=" + page+'&type='+type+"&searchname="+searchname, function (result,type) {
            render(result,type);
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

    var search = function(){
            refresh(1);
            refresh(2);
    }
</script>
@endpush