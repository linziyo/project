<html>
<head>
    <title>建档</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="//cdn.bootcss.com/weui/1.1.2/style/weui.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/jquery-weui/1.0.1/css/jquery-weui.min.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="bd">
        <div class="page__bd">
            <div class="weui-grids">
                <template v-for="archive in archives">
                    <div class="weui-grid js_grid">
                        <a :href="'/pad/archives/' + archive.id " class="weui-media-box weui-media-box_appmsg"
                           v-if="archive.id">
                            <div class="weui-media-box__hd">
                                <img class="weui-media-box__thumb" src="{{ asset('/images/default_avatar.jpg') }}"/>
                            </div>
                            <div class="weui-media-box__bd">
                                <h4 class="weui-media-box__title">@{{ archive.real_name }}</h4>
                                <div class="weui-media-box__desc">@{{ archive.sex }} @{{ archive.birthday }}岁
                                    <p>@{{ archive.id_code }}</p></div>
                            </div>
                        </a>
                        <a :href="'/pad/archives/create'" class="weui-media-box weui-media-box_appmsg" v-else>
                            <div class="weui-media-box__hd">
                                <img class="weui-media-box__thumb" src="{{ asset('/images/default_avatar.jpg') }}"/>
                            </div>
                            <div class="weui-media-box__bd">
                                <h4 class="weui-media-box__title">@{{ archive.real_name }}</h4>
                                <div class="weui-media-box__desc">@{{ archive.sex }} @{{ archive.birthday }}岁
                                    <p>@{{ archive.id_code }}</p></div>
                            </div>
                        </a>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.bootcss.com/vue/2.4.1/vue.min.js"></script>
<script src="//cdn.bootcss.com/vue-resource/1.3.4/vue-resource.min.js"></script>
<script src="//cdn.bootcss.com/vue-router/2.7.0/vue-router.min.js"></script>
<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
<script>
    var vue = new Vue({
        http: {
            headers: {'Authorization': 'Bearer ' + JSON.parse(window.localStorage.getItem('token')).access_token}
        },
        el: "#app",
        data: {
            archives: []
        },
        created: function () {
            this.$http.get('{{ URL::action('Api\ArchiveController@index') }}').then(function (response) {
                this.archives = response.data.data;
//                this.onIDCard({
//                    id_code: '111111111111',
//                    real_name: '张三',
//                    nation: '民族',
//                    address: '户籍地址',
//                    birthday: '2007-07-07',
//                    sex: '男',
//                    organization: '签发机关',
//                    start_date: '有效期开始',
//                    end_date: '有效期结束',
//                    avatar: '头像base64编码'
//                });
            });
        },
        methods: {
            submit: function (data) {

            },
            onIDCard: function (data) {
                this.archives.splice(0, this.archives.length - 1, data);
            }
        }
    });

    function onIDCard(data) {
        vue.onIDCard(data);
    }
</script>
</body>
</html>