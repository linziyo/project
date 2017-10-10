@extends('layouts.app')

@section('content')
<style>
    body{
        margin:0px;
        height:100%;
    }
    .all{
        width:100%;
        overflow:hidden;
        background-size:cover;
        vertical-align: middle;
        height:auto;
        position: relative;
    }
    .all .pinggu{
        position: absolute;
        width:204px;
        height:115px;
        background-size:cover;
        top:25%;
        left:68.5%;
    }
    .all .pinggu img{
        width:100%;
        height: auto;
    }
    .all img{
        width:100%;
        height: 100%;
    }
    .all .pingjia{
        top:25%;
        left:21%;
    }
    .all .ganyu{
        top:50%;
        left:32%;
    }
    .all .zhidao{
        top:50%;
        left:58%;
    }
    .all .dangan{
        top:1%;
        left:45%;
    }
    .all .kongzhipingtai{
        position: absolute;
        width:64px;
        height:61px;
        background-size:cover;
        top:62%;
        left:48.5%;
    }
    .all .kongzhipingtai img{
        width:100%;
        height: auto;
    }
    .all .weijiwei{
        top:47.5%;
        left:48.5%;
    }
    .all .yishengtwo{
        top:35%;
        left:48.5%;
    }
    .all .ziwojiankang{
        top:23%;
        left:48.5%;
    }
    .all .yiyuan{
        top:39%;
        left:66%;
    }
    .all .shekang{
        top:39%;
        left:32%;
    }
    .all .yisheng{
        top:20%;
        left:35%;
    }
    .all .nvsheng{
        top:20%;
        left:62%;
    }
    @media screen and (min-width:1300px){
        .all{
            height:100%;
        }

    }
    @media screen and (max-width:1050px){
        .all{
            /*margin-top:30%;*/
        }
        /*.all .pinggu{
            left:70%;
            top: 12%;
        }*/
        .all .pinggu img{
            width:34%;
        }
        /*.all .dangan{
            left: 46%;
            top:1%;
        }*/
        .all .dangan img{
            width:34%;
        }
        /*.all .pingjia{
            top:12%;
            left:21%;
        }*/
        .all .pingjia img{
            width:34%;
        }
        /*.all .ganyu{
            top:24%;
            left:32%;
        }*/
        .all .ganyu img{
            width:34%;
        }
        /*.all .zhidao{
            top:24%;
            left:60%;
        }*/
        .all .zhidao img{
            width:34%;
        }

        /*.all .kongzhipingtai{
            top:28%;
            left:48.5%;
        }*/
        .all .kongzhipingtai img{
            width:45%;
        }
        /*.all .shekang{
            top:18%;
            left:31.5%;
        }*/
        .all .shekang img{
            width:45%;
        }
        /*.all .yiyuan{
            top:18%;
            left:65%;
        }*/
        .all .yiyuan img{
            width:45%;
        }
        /*.all .ziwojiankang{
            top:10%;
            left:48.5%;
        }*/
        .all .ziwojiankang img{
            width:45%;
        }
        /*.all .yishengtwo{
            top:17%;
            left:48.5%;
        }*/
        .all .yishengtwo img{
            width:45%;
        }
        /*.all .weijiwei{
            top:22.5%;
            left:48.5%;
        }*/
        .all .weijiwei img{
            width:45%;
        }

        /*.all .yisheng {
            top:9.5%;
            left:34.5%;
        }*/
        .all .yisheng img{
            width:45%;
        }
        /*.all .nvsheng {
            top:9.5%;
            left:61.5%;
        }*/
        .all .nvsheng img{
            width:45%;
        }


    }
    @media screen and (max-width:420px) {
        .all{
            /*margin-top:50%;*/
        }
        /*.all .pinggu{
            left: 68%;
            top: 8%;
        }*/
        .all .pinggu img{
            width: 22%;
        }
        /*.all .dangan{
            left: 45%;
            top:0.5%;
        }*/
        .all .dangan img{
            width: 22%;
        }
        /*.all .pingjia{
            top:8%;
            left:21%;
        }*/
        .all .pingjia img{
            width: 22%;
        }
        /*.all .ganyu{
            top:18%;
            left:32%;
        }*/
        .all .ganyu img{
            width: 22%;
        }
        /*.all .zhidao{
            top:18%;
            left:58%;
        }*/
        .all .zhidao img{
            width: 22%;
        }

        /*.all .kongzhipingtai{
            top:21.5%;
            left:48%;
        }*/
        .all .kongzhipingtai img{
            width: 28%;
        }
        /*.all .shekang{
            top:13%;
            left:31.5%;
        }*/
        .all .shekang img{
            width: 28%;
        }
        /*.all .ziwojiankang{
            top:8%;
            left:48%;
        }*/
        .all .ziwojiankang img{
            width: 28%;
        }
        /*.all .yishengtwo{
            top:12.5%;
            left:48%;
        }*/
        .all .yishengtwo img{
            width: 28%;
        }
        /*.all .weijiwei{
            top:16.5%;
            left:48%;
        }*/
        .all .weijiwei img{
            width: 28%;
        }

        /*.all .yisheng {
            top:7%;
            left:34.5%;
        }*/
        .all .yisheng img{
            width: 28%;
        }
        /*.all .nvsheng {
            top:7%;
            left:61.5%;
        }*/
        .all .nvsheng img{
            width: 28%;
        }

    }
</style>
<body>
<div class="all" style="margin-top: -20px;">
    <img src="{{ url('/images/shouye.png') }}" usemap="#Map">
    <a href="">
        <div class="pinggu">
            <img src="{{ url('/images/pinggu.png') }}"/>
        </div>
    </a>
    <a href="">
        <div class="pinggu pingjia">
            <img src="{{ url('/images/pingjia.png') }}"/>
        </div>
    </a>
    <a href="">
        <div class="pinggu ganyu">
            <img src="{{ url('/images/ganyu.png') }}"/>
        </div>
    </a>
    <a href="">
        <div class="pinggu zhidao">
            <img src="{{ url('/images/zhidao.png') }}"/>
        </div>
    </a>
    <a href="{{ URL::action('Tenant\ArchiveController@index') }}">
        <div class="pinggu dangan">
            <img src="{{ url('/images/dangan.png') }}"/>
        </div>
    </a>
    <a href="">
        <div class="kongzhipingtai">
            <img src="{{ url('/images/kongzhipingtai.png') }}"/>
        </div>
    </a>
    <a href="">
        <div class="kongzhipingtai weijiwei">
            <img src="{{ url('/images/weijiwei.png') }}"/>
        </div>
    </a>
    <a href="">
        <div class="kongzhipingtai yishengtwo">
            <img src="{{ url('/images/yishengtwo.png') }}"/>
        </div>
    </a>
    <a href="">
        <div class="kongzhipingtai ziwojiankang">
            <img src="{{ url('/images/ziwojiankang.png') }}"/>
        </div>
    </a>
    <a href="">
        <div class="kongzhipingtai yiyuan">
            <img src="{{ url('/images/yiyuan.png') }}"/>
        </div>
    </a>
    <a href="">
        <div class="kongzhipingtai shekang">
            <img src="{{ url('/images/shekang.png') }}"/>
        </div>
    </a>
    <a href="">
        <div class="kongzhipingtai yisheng">
            <img src="{{ url('/images/yisheng.png') }}"/>
        </div>
    </a>
    <a href="">
        <div class="kongzhipingtai nvsheng">
            <img src="{{ url('/images/nvsheng.png') }}"/>
        </div>
    </a>
</div>

</body>
</html>
<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        var width = $(window).width();
        var height = $(window).height();
        $(".all").css({'width':width,'height':height}) ;
    });
</script>
@endsection
