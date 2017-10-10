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
        <a class="weui-navbar__item weui-bar__item--on" href="#subTab1">未建档</a>
        <a class="weui-navbar__item" href="#subTab2">已建档</a>
        <a class="weui-navbar__item" href="#subTab3">待确认</a>
    </div>
    <div class="weui-tab__bd">
        <div id="subTab1" class="weui-tab__bd-item weui-tab__bd-item--active">111</div>
        <div id="subTab2" class="weui-tab__bd-item">222</div>
        <div id="subTab3" class="weui-tab__bd-item">333</div>
    </div>
</div>