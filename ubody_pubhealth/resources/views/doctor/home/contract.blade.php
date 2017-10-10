<div class="weui-search-bar" id="searchBar">
    <form class="weui-search-bar__form">
        <div class="weui-search-bar__box">
            <i class="weui-icon-search"></i>
            <input type="search" class="weui-search-bar__input" id="searchInput" placeholder="搜索"
                   required="">
            <a href="javascript:" class="weui-icon-clear" id="searchClear"></a>
        </div>
        <label class="weui-search-bar__label" id="searchText">
            <i class="weui-icon-search"></i>
            <span>搜索</span>
        </label>
    </form>
    <a href="javascript:" class="weui-search-bar__cancel-btn" id="searchCancel">取消</a>
</div>


<div class="weui-tab">
    <div class="weui-navbar">
        <a class="weui-navbar__item weui-bar__item--on" href="#signTab1">待确认</a>
        <a class="weui-navbar__item" href="#signTab2">已签约</a>
    </div>
    <div class="weui-tab__bd">
        <div id="signTab1" class="weui-tab__bd-item weui-tab__bd-item--active">111</div>
        <div id="signTab2" class="weui-tab__bd-item">222</div>
    </div>
</div>