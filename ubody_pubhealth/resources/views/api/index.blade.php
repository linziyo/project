<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>接口文档</title>
    <script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <style type="text/css">
        .docs{
            overflow: hidden;
            height: auto;
            width: 80%;
            background: #efeff4;
            margin: 0 auto;
        }
        .docs>.top{
            height: 65px;
            line-height: 65px;
            text-align: center;
            font-size: 32px;
            color:#00a29a;
            background: #ffffff;
            margin: 0 10px;
            margin-top: 10px;
            border: 1px solid #e5e5e5;
        }
        .nav{
            overflow: hidden;
            height: auto;
            margin: 10px 0px 10px 10px;
            background: #ffffff;
            width: 19%;
            float: left;
        }
        .nav ul {
          padding:0px 10px;
        }
        .nav ul li{
          list-style: none;
          line-height: 18px;
          display: block;
          padding: 5px 0px;
        }
        .nav ul li a{
          font-size: 18px;
          font-weight: bolder;
          padding-right: 10px;
          color: #777;
          text-decoration: none;
        }
        .nav ul li ul li a{
          font-size: 16px;
          padding-left: 10px;
          padding-right: 10px;
          color: #999;
          text-decoration: none;
          font-weight: normal;
        }
        .content{
            overflow: hidden;
            height: auto;
            margin: 10px;
            background: #ffffff;
            width: 78%;
            float: left;
        }
        .article{
            overflow: hidden;
            height: auto;
            margin: 10px;
            background: #ffffff;
        }
        .article>.title{
            font-size: 20px;
        }
        .article p{
            color:#333333;
        }
        .article pre {
            margin: 1em 0;
            font-stretch: normal;
            font-size: 14px;
            background-color: #eee;
            border: 1px solid #ddd;
            padding: 5px;
            line-height: 1.5em;
            color: #444;
            overflow: auto;
            -webkit-box-shadow: rgba(0,0,0,0.07) 0 1px 2px inset;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }
        .article pre code {
            padding: 0 !important;
            font-size: 14px !important;
            background-color: #eee !important;
            border: none !important;
            text-decoration: none;
        }
        .article pre code a{
          text-decoration: none;
        }
        .article code {
            font-size: 14px !important;
            background-color: #f8f8ff !important;
            color: #444 !important;
            padding: 0.2em !important;
            border: 1px solid #dedede !important;
        }
        #to_top{
          width: 50px;
          height: 48px;
          line-height: 48px;
          right: 50px;
          bottom: 50px;
          padding:10px;
          font:14px/20px arial;
          text-align:center;
          background:grey;
          z-index: 99999999;
          position:absolute;
          cursor:pointer;
          color:#fff;
          border-top-left-radius: 10px;
          border-top-right-radius: 10px;
          border-bottom-right-radius: 10px;
          border-bottom-left-radius: 10px;
        }

    </style>
  <script>
      window.onload = function(){
          var oTop = document.getElementById("to_top");
          var screenw = document.documentElement.clientWidth || document.body.clientWidth;
          var screenh = document.documentElement.clientHeight || document.body.clientHeight;
//          oTop.style.left = screenw - oTop.offsetWidth +"px";
          oTop.style.top = screenh - oTop.offsetHeight + "px";
          window.onscroll = function(){
              var scrolltop = document.documentElement.scrollTop || document.body.scrollTop;
              oTop.style.top = screenh - oTop.offsetHeight + scrolltop +"px";
          }
          oTop.onclick = function(){
              document.documentElement.scrollTop = document.body.scrollTop =0;
          }
      }

  </script>
</head>
<body>
<div class="docs">
<div class="top">接口文档</div>
<div class="nav">
  <ul>
    <li>
      <a href="#体检接口">体检接口</a>
      <ul>
        <li><a href="#上传体检数据">上传体检数据</a> </li>
        <li><a href="#设备下所有的体检数据">设备下所有的体检数据</a> </li>
        <li><a href="#当前用户最近一次体检数据">当前用户最近一次体检数据</a> </li>
        <li><a href="#获取体检趋势图信息">获取体检趋势图信息</a> </li>
      </ul>
    </li>
    <li>
        <a href="#pad端接口">pad端接口</a>
        <ul>
          <li><a href="#用户登录">用户登录</a></li>
          <li><a href="#档案列表">档案列表</a></li>
          <li><a href="#添加档案">添加档案</a></li>
          <li><a href="#档案详情">档案详情</a></li>
          <li><a href="#修改档案">修改档案</a></li>
          <li><a href="#获取创建签约数据">获取创建签约数据</a></li>
          <li><a href="#添加签约">添加/修改签约</a></li>
          <li><a href="#当前医生今日要随访记录">当前医生今日要随访记录</a></li>
          <li><a href="#添加老年人随访">添加老年人随访</a></li>
          <li><a href="#查看老年人随访记录">查看老年人随访记录</a></li>
          <li><a href="#修改老年人随访">修改老年人随访
            </a></li>
        </ul>
    </li>
    <li>
      <a href="#微信端接口文档">微信端接口</a>
      <ul>
        <li><a href="#绑定档案">用户绑定档案</a> </li>
        <li><a href="#修改用户基本信息">修改用户基本信息</a> </li>
        <li><a href="#用户基础档案">用户基础档案</a> </li>
        <li><a href="#签约服务">签约服务</a> </li>
        <li><a href="#体检列表">体检列表</a> </li>
      </ul>
    </li>
  </ul>
</div>
<div class="content">
<div class="article">
<h3 id="体检接口">体检接口</h3>
<p class="title"><a href="#" id="上传体检数据">上传体检数据</a></p>
<p>请求说明</p>
<pre>
HTTP请求方式：<code>POST</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/healths</a></code>
</pre>
<p>成功返回示例</p>
<pre class="prettyprint" >
<code>{
  "id": 7,
  "created_at": {
    "date": "2017-08-30 10:40:40.000000",
    "timezone_type": 3,
    "timezone": "Asia/Shanghai"
  }
}</code>
</pre>

<br/>
<p class="title"><a href="#" id="设备下所有的体检数据">设备下所有的体检数据</a></p>
<p>请求说明</p>
<pre>
HTTP请求方式：<code>POST</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/healths/health_list</a></code>
</pre>
<p>提交参数</p>
<pre>
<code>{
  "MachineId":"SKT817080011", 	//设备编号
  "DeviceType":"SK-T8"	        //设备类型
}</code>
</pre>
<p>失败返回示例</p>
<pre class="prettyprint" >
<code>{
  "code":403,
  "message":"The device does not exist"
}</code>
</pre>

<p>成功返回示例</p>
<pre class="prettyprint" >
<code>{
  "code": 200,
  "message": "success",
  "health_list": [
    {
      "id": 1,
      "MachineId": "SKT817080011",
      "UnitNo": null,
      "UnitName": null,
      "MacAddr": "00:0E:C4:D1:B0:B0",
      "RecordNo": "1708001120170901171106",
      "MeasureTime": "2017-09-01 17:11:06",
      "DeviceType": "SK-T8",
      "LoginType": "1",
      "member": {
        "id": 1,
        "health_id": 1,
        "Name": "李四",
        "Mobile": "13751118218",
        "IdCode": "342122197909248266",
        "Age": "37",
        "Sex": "0",
        "Address": "安徽省临泉县高塘乡郭桥行政村小庄１号",
        "Birthday": "1979-09-24",
        "UserIcon": null,
        "Nation": "汉",
        "StartDate": "2014/9/29 0:00:00",
        "EndDate": "2034/9/29 0:00:00",
        "Department": "临泉县公安局",
        "BarCode": "",
        "IcCode": "",
        "SocialCode": "",
        "UserID": ""
      }
    },
    {
      "id": 2,
      "MachineId": "SKT817080011",
      "UnitNo": null,
      "UnitName": null,
      "MacAddr": "00:0E:C4:D1:B0:B0",
      "RecordNo": "1708001120170901171106",
      "MeasureTime": "2017-09-01 17:11:06",
      "DeviceType": "SK-T8",
      "LoginType": "1",
      "member": {
        "id": 2,
        "health_id": 2,
        "Name": "张丽2",
        "Mobile": "13751118218",
        "IdCode": "342122197909248266",
        "Age": "37",
        "Sex": "0",
        "Address": "安徽省临泉县高塘乡郭桥行政村小庄１号",
        "Birthday": "1979-09-24",
        "UserIcon": null,
        "Nation": "汉",
        "StartDate": "2014/9/29 0:00:00",
        "EndDate": "2034/9/29 0:00:00",
        "Department": "临泉县公安局",
        "BarCode": "",
        "IcCode": "",
        "SocialCode": "",
        "UserID": ""
      }
    },
  ],
  "devices": {
    "id": 5,
    "type": "SK-T8",
    "created_at": "2017-09-08 09:56:33",
    "updated_at": "2017-09-08 09:56:33",
    "community_hospital_id": 1,
    "code": "SKT817080011",
    "deleted_at": null,
    "tenant_id": 1
  }
}</code>
</pre>

<br/>
<p class="title"><a href="#" id="当前用户最近一次体检数据">当前用户最近一次体检数据</a></p>
<p>请求说明</p>
<pre>
HTTP请求方式：<code>GET</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/healths/last_time_healths</a></code>
</pre>

<p>失败返回示例</p>
<pre class="prettyprint" >
<code>{
  "code":403,
  "message":"失败信息"
}</code>
</pre>

  <p>成功返回示例</p>
  <pre class="prettyprint" >
<code>{
  "code": 200,
  "message": "success",
  "data": {
    "alcohol": [],
    "bloodFat": [],
    "bloodOxygen": [],
    "bloodPressure": [
      {
        "id": 34,
        "health_id": 34,
        "HighPressure": "106",
        "LowPressure": "66",
        "Pulse": "86",
        "Result": "0",
        "created_at": "2017-09-08 17:00:09",
        "updated_at": "2017-09-08 17:00:09",
        "deleted_at": null,
        "health_analysis": true
      }
    ],
    "bloodSugar": [],
    "bMD": [],
    "cardiovascular": [],
    "chol": [],
    "ecg": [],
    "fat": [
      {
        "id": 34,
        "health_id": 34,
        "FatRate": "26.9",
        "Fat": "14.6",
        "ExceptFat": "39.8",
        "WaterRate": "53.5",
        "Water": "29.1",
        "Minerals": "1.4",
        "Protein": "8.1",
        "Fic": "19.4",
        "Foc": "9.7",
        "Muscle": "37.2",
        "FatAdjust": "-1",
        "WeightAdjust": "-1",
        "MuscleAdjust": "0",
        "BasicMetabolism": "1213",
        "Viscera": "9",
        "Bmc": "2.6",
        "MuscleRate": "",
        "QuganMuscle": "21.0",
        "QuganFat": "6.9",
        "ZuotuiMuscle": "6.5",
        "ZuobiMuscle": "1.5",
        "YoubiMuscle": "1.7",
        "YoutuiMuscle": "6.5",
        "ZuobiFat": "1.0",
        "ZuotuiFat": "2.8",
        "YoubiFat": "1.1",
        "YoutuiFat": "2.8",
        "Result": "1",
        "created_at": "2017-09-08 17:00:09",
        "updated_at": "2017-09-08 17:00:09",
        "deleted_at": null,
        "health_analysis": false
      }
    ],
    "hb": [],
    "height": [
      {
        "id": 34,
        "health_id": 34,
        "Height": "161.5",
        "Weight": "54.4",
        "BMI": "20.9",
        "IdealWeight": "53.5",
        "Result": "0",
        "created_at": "2017-09-08 17:00:09",
        "updated_at": "2017-09-08 17:00:09",
        "deleted_at": null,
        "health_analysis": false
      }
    ],
    "lung": [],
    "minFat": [],
    "pEEcg": [],
    "temperature": [
      {
        "id": 34,
        "health_id": 34,
        "Temperature": "36.6",
        "Result": "0",
        "created_at": "2017-09-08 17:00:09",
        "updated_at": "2017-09-08 17:00:09",
        "deleted_at": null,
        "health_analysis": false
      }
    ],
    "uricAcid": [],
    "urinalysis": [],
    "whr": [
      {
        "id": 34,
        "health_id": 34,
        "Waistline": "27",
        "Hipline": "29",
        "Whr": "93.1",
        "Result": "1",
        "created_at": "2017-09-08 17:00:09",
        "updated_at": "2017-09-08 17:00:09",
        "deleted_at": null,
        "health_analysis": true
      }
    ],
    "member": [
      {
        "id": 34,
        "health_id": 34,
        "Name": "韦佳雷",
        "Mobile": "452731199209120337",
        "IdCode": "452731199209120337",
        "Age": "37",
        "Sex": "0",
        "Address": "安徽省临泉县高塘乡郭桥行政村小庄１号",
        "Birthday": "1979-09-24",
        "UserIcon": null,
        "Nation": "汉",
        "StartDate": "2014/9/29 0:00:00",
        "EndDate": "2034/9/29 0:00:00",
        "Department": "临泉县公安局",
        "BarCode": "",
        "IcCode": "",
        "SocialCode": "",
        "UserID": ""
      }
    ]
  }
}</code>
</pre>

<br/>
<p class="title"><a href="#" id="获取体检趋势图信息">获取体检趋势图信息</a></p>
<p>请求说明</p>
<pre>
HTTP请求方式：<code>POST</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/healths/list_details</a></code>
</pre>
  <p>提交参数</p>
  <pre class="prettyprint" >
<code>{
  "id_code":"452731199209120337",	//身份证号
  "health_type":"bloodFat",		//体检类型
  "startTime":"2017-09-01",	    //选填
  "endTime":"2017-09-02"		//选填
  }</code>
</pre>

  <p>返回示例</p>
  <pre class="prettyprint" >
<code>{
  "code": 200,
  "message": "success",
  "data": [
    {
      "id": 1,
      "health_id": 1,
      "TChol": "12",
      "HdlChol": "12",
      "Trig": null,
      "TcHdl": "12",
      "CalcLdl": "12",
      "Result": "1",
      "created_at": "2017-09-08 09:47:55",
      "updated_at": "2017-09-08 09:47:55",
      "deleted_at": null,
      "MachineId": "SKT817080011",
      "UnitNo": null,
      "UnitName": null,
      "MacAddr": "00:0E:C4:D1:B0:B0",
      "RecordNo": "1708001120170901171106",
      "MeasureTime": "2017-09-02 17:11:06",
      "DeviceType": "SK-T8",
      "LoginType": "1",
      "content": "{...}"
    },
    {
      "id": 7,
      "health_id": 7,
      "TChol": "11",
      "HdlChol": "11",
      "Trig": "11",
      "TcHdl": "11",
      "CalcLdl": "11",
      "Result": "1",
      "created_at": "2017-09-08 10:35:20",
      "updated_at": "2017-09-08 10:35:20",
      "deleted_at": null,
      "MachineId": "SKT817080011",
      "UnitNo": null,
      "UnitName": null,
      "MacAddr": "00:0E:C4:D1:B0:B0",
      "RecordNo": "1708001120170901171106",
      "MeasureTime": "2017-09-01 17:11:06",
      "DeviceType": "SK-T8",
      "LoginType": "1",
      "content": "{...}"
    }
  ]
}</code>
</pre>

<br/>
<h3 id="pad端接口">pad端接口</h3>
<p class="title"><a href="#用户登录" id="用户登录">用户登录</a></p>
<p>请求说明</p>
<pre>
HTTP请求方式：<code>POST</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/login</a></code></pre>

<p>提交参数</p>
<pre>
<code>{
"username":13370185092,    //手机号（必选）
"password":13370185092     //密码（必选）
}</code>
</pre>

<p>登陆失败</p>
<pre>
<code>{
"code": 403,
"message": "登录失败：账号或密码错误."
}</code>
</pre>

<p>登录成功</p>
<pre class="prettyprint" >
<code>{
  "token_type": "Bearer",
  "expires_in": 1296000,
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjVjYmQwNDRjOTdiZGIwNGQzYzgzZThjZjVkNDMwZDhhMDc3ZTUwOWJkZjkzNWY3OTU3OGVmMDEzNDg3OTM4ZTExZmNhYTAxYmJlY2E1NDU4In0.eyJhdWQiOiIzIiwianRpIjoiNWNiZDA0NGM5N2JkYjA0ZDNjODNlOGNmNWQ0MzBkOGEwNzdlNTA5YmRmOTM1Zjc5NTc4ZWYwMTM0ODc5MzhlMTFmY2FhMDFiYmVjYTU0NTgiLCJpYXQiOjE1MDQwNjAxMTIsIm5iZiI6MTUwNDA2MDExMiwiZXhwIjoxNTA1MzU2MTEyLCJzdWIiOiIxMCIsInNjb3BlcyI6W119.ljCE0cIFEUK4xfqvw3OcmftcZbaQFDwDkytf-2Dv94U0cqF0eYlZ4uQK0bwe5LJTzoTHS2-eziytAPklShHf3cPHBSlySzYwsIypwEDsIsGpP1xOdLZel3hEogu-OpIBItzBDEXwNYr4jd6wd-PlqtaGiFpEeXU4QXqM9j_DQrsHdvEeBaoP_SyDWctMWgYVX0-YflUN8ELOAe-OjIIqPnLp5z9zi8Zn7nB16tCm1mRi46JTZgdfCcoGfo_0kR8Nbs7qP-FmcYqdZzpK6AqX_zY80Q0mNUNrwqUUWOXuZvu0Ucod9Wg5KovJ8oC0j1U9QMbQrWKkbhEO4Ad8IKXD-Y9R9rY7MjseT8ShzsQkxnNDlqN1O4Ymlpayib7EABLV9i76jPyh3s2mDuSLwYGLx6VCYS4RZVsDeBF-P1tdBI_ODeIk0aK04fKByoZwHSl92tG_0KuWXh9948ow99urxfcWZxpQxj15xvzv1eV1gLdKoFCzHBN6AloXRlcorl-Lb35K_MYGjzDIp2OToNL2mWCZLJ6s3uKQy3wuaT6WWqJnPXL_PEq6oMCv9gvLmKjVu9cb2-_laa6WJZvshnW_BTv_8mqbEvDydkoQnu4swG96V_A-J2z7ieJq4z_iPAqIe4PoTyaxW-6ejYb-OLIZj5jHMj-bIdyyVqDtNcK8aQ8",
  "refresh_token": "def502000ca0a6f463009ddd33bf26dbcd5dd796c8b845f63ab415ccfd365164f09afb7542552481d1f251dacfc2557cbf99e65d10111d8124ebf0aec41520e75608de8b6fa7f3e59e8bece76dc8dcda063cc0c87eeb76dad53ba62df5431a9c3b1ec8d931d2b5401c638e1bb10a800a7bd87523d0420600966bb9f1a7b5ae3ba7e3e1698680cf587d0fd343d801fc5fdef49811c6300fadd96fa6a2d5694e1462fef767392d5244ec331e08d110ac2e4cea252249b022e287bd9445ad055e7d3ad8df57ec24c9b49e1d88558ac75fab30b424ca79693298b819290f5bd00342d90c040c27e864b5cf657bb8447d645446d9a8a55d900fd26c2fbdfa99e887fcbfd96f86594c5fd2bbc7c587f6132b5dbfd4b9b51d7f78b67ae8a168493cde7190b692b6c06c28a493f70c45664a185129966bb65ec94671cda122da11269f2de5fd015a1f9dc62307379b8e575a29326bb9333dfeb1063d411dae2a8d98fb8cbbfc"
}</code>
</pre>
{{--/*****************************/--}}
<br/>
<p class="title"><a href="#档案列表" id="档案列表">档案列表</a></p>
<p>请求说明</p>
<pre>
HTTP请求方式：<code>GET</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/archives </a></code></pre>

<p>提交参数</p>
<pre>
<code>{
search:         //名字或手机号（可选）
community_id:   //社区（可选）
resident_type:  //区民类型（可选）
visit_mode:     //随访类型（可选）
age:            //年龄范围（1:0~3,2:3~10,3:11~20 ....）（可选）
}</code>
</pre>

<p>返回示例</p>
<pre class="prettyprint" >
<code>{
  "current_page": 1,
  "data": [
    {
      "id": 2,
      "community_hospital_id": 1,
      "community_id": 2,
      "doctor_id": 8,
      "code": "00000000000200000",
      "real_name": "維迦勒",
      "sex": "1",
      "birthday": "1992-09-12",
      "id_code": "452731199209120337",
      "work_unit": "優雲",
      "mobile": "13370185092",
      "contact_name": "維迦勒",
      "contact_mobile": "13370185092",
      "emergency_contact_name": "維迦勒",
      "emergency_contact_mobile": "13370185092",
      "is_register": 0,
      "nation": "汉族",
      "blood_group": "3",
      "blood_group_rh": "1",
      "education": "2",
      "job": "1",
      "marital_status": "1",
      "address": "南山深大北門",
      "phone_number": "5008800",
      "description": null,
      "status": 1,
      "checked_at": null,
      "created_at": "2017-08-22 18:00:56",
      "updated_at": "2017-08-22 18:00:56",
      "deleted_at": null,
      "tenant_id": 1,
      "age": 24,
      "contract": {
        "id": 1,
        "doctor_id": 8,
        "package_id": 2,
        "archive_id": 2,
        "images": null,
        "price": "1999.00",
        "start_time": "2017-08-24",
        "end_time": "2018-08-24",
        "status": "已审核",
        "checked_at": null,
        "tenant_id": 1
      },
      "visits": [
        {
          "id": 1,
          "archive_id": 2,
          "visited_at": "2017-08-29 00:00:00",
          "next_visited_at": null,
          "doctor_id": 8,
          "visit_type": "App\\Models\\VisitSelfCareAbility",
          "visit_mode": null
        },
        {
          "id": 2,
          "archive_id": 2,
          "visited_at": "2017-08-02 00:00:00",
          "next_visited_at": "2017-08-25 00:00:00",
          "doctor_id": 8,
          "visit_type": "App\\Models\\VisitHypertension",
          "visit_mode": 2
        }
      ]
    },
    {
      "id": 4,
      "community_hospital_id": 1,
      "community_id": 1,
      "doctor_id": 8,
      "code": "00000000000100009",
      "real_name": "测试",
      "sex": "1",
      "birthday": "1992-09-12",
      "id_code": "452731199209120335",
      "work_unit": "国人大厦",
      "mobile": "13370180592",
      "contact_name": "爱迪生",
      "contact_mobile": "13388888888",
      "emergency_contact_name": "爱迪生",
      "emergency_contact_mobile": "13388888888",
      "is_register": 0,
      "nation": "汉族",
      "blood_group": "1",
      "blood_group_rh": "1",
      "education": "1",
      "job": "1",
      "marital_status": "1",
      "address": "国外",
      "phone_number": "88888888",
      "description": null,
      "status": 1,
      "checked_at": null,
      "created_at": "2017-08-22 18:29:06",
      "updated_at": "2017-08-22 18:29:06",
      "deleted_at": null,
      "tenant_id": 1,
      "age": 24,
      "contract": null,
      "visits": []
    }
  ],
  "from": 1,
  "last_page": 1,
  "next_page_url": null,
  "path": "http://1.pubhealth.ubody.local/api/archives",
  "per_page": 20,
  "prev_page_url": null,
  "to": 2,
  "total": 2
}</code>
</pre>
    {{--/*****************************/--}}
<br/>
<p class="title"><a href="#添加档案" id="添加档案">添加档案</a></p>
<p>请求说明</p>
<pre>
HTTP请求方式：<code>POST</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/archives</a></code></pre>

<p>提交参数</p>
<pre>
<code>{
search:         //名字或手机号（可选）
community_id:   //社区（可选）
resident_type:  //区民类型（可选）
visit_mode:     //随访类型（可选）
age:            //年龄范围（1:0~3,2:3~10,3:11~20 ....）（可选）
}</code>
</pre>

<p>失败返回示例</p>
<pre class="prettyprint" >
验证失败：
<code>{
  "code": 403,
  "message": {
    "id_code": [
      "请填写id code."
    ],
    "mobile": [
      "请填写mobile."
    ]
  }
}</code>

身份证重复：
<code>{
"code": 403,
"message": "repeat id_code"
}</code>
</pre>

<p>成功返回示例</p>
<pre class="prettyprint" >
<code>{
"id": 7,
"created_at": {
"date": "2017-08-30 10:40:40.000000",
"timezone_type": 3,
"timezone": "Asia/Shanghai"
},
"code": 201,
"message": "repeat id_code"
}</code>
</pre>

{{--/*****************************/--}}
<br/>
<p class="title"><a href="#档案详情" id="档案详情">档案详情</a></p>
<p>请求说明</p>
<pre>
HTTP请求方式：<code>GET</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/archives/{id}</a></code></pre>

<p>失败返回示例</p>
<pre class="prettyprint" >
<code>{
"code": 403,
"message": "not find"
}</code>
</pre>

<p>成功返回示例</p>
<pre class="prettyprint" >
<code>{
  "id": 2,
  "community_hospital_id": 1,
  "community_id": 2,
  "doctor_id": 8,
  "code": "00000000000200000",
  "real_name": "維迦勒",
  "sex": "1",
  "birthday": "1992-09-12",
  "id_code": "452731199209120337",
  "work_unit": "優雲",
  "mobile": "13370185092",
  "contact_name": "維迦勒",
  "contact_mobile": "13370185092",
  "emergency_contact_name": "維迦勒",
  "emergency_contact_mobile": "13370185092",
  "is_register": 0,
  "nation": "汉族",
  "blood_group": "3",
  "blood_group_rh": "1",
  "education": "2",
  "job": "1",
  "marital_status": "1",
  "address": "南山深大北門",
  "phone_number": "5008800",
  "description": null,
  "status": 1,
  "checked_at": null,
  "created_at": "2017-08-22 18:00:56",
  "updated_at": "2017-08-22 18:00:56",
  "deleted_at": null,
  "tenant_id": 1,
  "age": 24,
  "payment_modes": [
    {
      "value": "1",
      "content": null,
      "display_value": "城镇职工基本医疗保险"
    },
    {
      "value": "2",
      "content": null,
      "display_value": "城镇居民基本医疗保险"
    },
    {
      "value": "3",
      "content": null,
      "display_value": "新型农村合作医疗"
    },
    {
      "value": "5",
      "content": null,
      "display_value": "商业医疗保险"
    }
  ],
  "allergies": [
    {
      "value": "2",
      "content": null,
      "display_value": "青霉素"
    },
    {
      "value": "4",
      "content": null,
      "display_value": "链霉素"
    },
    {
      "value": "5",
      "content": "毒藥",
      "display_value": "其他"
    }
  ],
  "exposes": [
    {
      "value": "3",
      "display_value": "毒物"
    }
  ],
  "diseases": [
    {
      "value": "1",
      "content": null,
      "confirmed_at": null,
      "display_value": "无"
    }
  ],
  "operations": [
    {
      "value": "1",
      "content": null,
      "confirmed_at": null,
      "display_value": "无"
    }
  ],
  "injuries": [
    {
      "value": "1",
      "content": null,
      "confirmed_at": null,
      "display_value": "无"
    }
  ],
  "transfusions": [
    {
      "value": "1",
      "content": null,
      "confirmed_at": null,
      "display_value": "无"
    }
  ],
  "families": [
    {
      "relationship": "父亲",
      "value": "1",
      "content": null,
      "display_value": "无"
    }
  ],
  "hereditary_disease": {
    "value": "1",
    "content": null,
    "display_value": "无"
  },
  "disabilities": [
    {
      "value": "2",
      "display_value": "视力残疾"
    },
    {
      "value": "3",
      "display_value": "听力残疾"
    },
    {
      "value": "4",
      "display_value": "言语残疾"
    }
  ],
  "living_kitchen": {
    "value": "1",
    "display_value": "无"
  },
  "living_fuel": {
    "value": "1",
    "display_value": "液化气"
  },
  "living_water": {
    "value": "1",
    "display_value": "自来水"
  },
  "living_toilet": {
    "value": "1",
    "display_value": "卫生厕所"
  },
  "living_fence": {
    "value": "2",
    "display_value": "单设"
  },
  "contract": {
    "id": 1,
    "doctor_id": 8,
    "package_id": 2,
    "archive_id": 2,
    "images": null,
    "price": "1999.00",
    "start_time": "2017-08-24",
    "end_time": "2018-08-24",
    "status": "已审核",
    "checked_at": null,
    "tenant_id": 1
  },
  "doctor": {
    "id": 8,
    "user_id": 10,
    "community_hospital_id": 1,
    "avatar": null,
    "duty": null,
    "title": null,
    "specialty": null,
    "skills": "全科医生",
    "working_time": null,
    "consult": null,
    "description": null,
    "created_at": null,
    "updated_at": null,
    "deleted_at": null,
    "tenant_id": 1
  },
  "visits": [
    {
      "id": 2,
      "archive_id": 2,
      "visited_at": "2017-08-02 00:00:00",
      "next_visited_at": "2017-08-25 00:00:00",
      "doctor_id": 8,
      "visit_type": "App\\Models\\VisitHypertension",
      "visit_mode": 2
    },
    {
      "id": 1,
      "archive_id": 2,
      "visited_at": "2017-08-29 00:00:00",
      "next_visited_at": null,
      "doctor_id": 8,
      "visit_type": "App\\Models\\VisitSelfCareAbility",
      "visit_mode": null
    }
  ]
}</code>
</pre>
  {{--/*****************************/--}}
<br/>
<p class="title"><a href="#" id="修改档案">修改档案</a></p>
<p>请求说明</p>
<pre>
HTTP请求方式：<code>PUT</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/archives/{id}</a></code></pre>

<p>失败返回示例</p>
<pre class="prettyprint" >
<code>{
"code": 403,
"message": "repeat id_code"
}</code>
</pre>

<p>成功返回示例</p>
<pre class="prettyprint" >
<code>{
  "updated_at": {
    "date": "2017-08-30 15:07:57.000000",
    "timezone_type": 3,
    "timezone": "Asia/Shanghai"
  },
  "code": 200,
  "message": "success"
}</code>
</pre>

<br/>
<p class="title"><a href="#" id="获取创建签约数据">获取创建签约数据</a></p>
<p>创建签约时获取档案信息和服务包信息</p>
<p>请求说明</p>
<pre>
HTTP请求方式：<code>POST</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/contracts/info</a></code></pre>

<p>提交参数</p>
<pre class="prettyprint" >
<code>{
    "archive_id":"2"
}</code>
</pre>

<p>失败返回示例</p>
<pre class="prettyprint" >
<code>{
"code": 403,
"message": "The Archive does not find by archive_id:"
}</code>
</pre>
  <p>成功返回示例</p>
  <pre class="prettyprint" >
<code>{
  "archive": {
    "id": 2,
    "community_hospital_id": 1,
    "community_id": 2,
    "doctor_id": 8,
    "code": "00000000000200000",
    "real_name": "維迦勒",
    "sex": "1",
    "birthday": "1992-09-12",
    "id_code": "452731199209120337",
    "work_unit": "優雲",
    "mobile": "13370185092",
    "contact_name": "維迦勒",
    "contact_mobile": "13370185092",
    "emergency_contact_name": "維迦勒",
    "emergency_contact_mobile": "13370185092",
    "is_register": 0,
    "nation": "汉族",
    "blood_group": "3",
    "blood_group_rh": "1",
    "education": "2",
    "job": "1",
    "marital_status": "1",
    "address": "南山深大北門",
    "phone_number": "5008800",
    "description": null,
    "status": 1,
    "checked_at": null,
    "created_at": "2017-08-22 18:00:56",
    "updated_at": "2017-08-22 18:00:56",
    "deleted_at": null,
    "tenant_id": 1,
    "age": 24
  },
  "packages": [
    {
      "id": 1,
      "name": "普通服务包",
      "community_hospital_id": 1,
      "character": "小儿、老年",
      "requirement": "体检",
      "management_objective": "体检并预防",
      "price": "998.00",
      "created_at": "2017-08-24 15:08:50",
      "updated_at": "2017-08-24 15:08:50",
      "deleted_at": null,
      "tenant_id": 1
    },
    {
      "id": 2,
      "name": "VIP服务包",
      "community_hospital_id": 1,
      "character": "体弱儿童、老人",
      "requirement": "体检",
      "management_objective": "检查并给出合理调养方案",
      "price": "1999.00",
      "created_at": "2017-08-24 15:10:34",
      "updated_at": "2017-08-24 15:10:34",
      "deleted_at": null,
      "tenant_id": 1
    }
  ]
  "code": 200,
  "message": "success"
}</code>
</pre>

<br/>
<p class="title"><a href="#" id="添加签约">添加/修改签约</a></p>
<p>通过提交的archive_id判断该档案是否已添加签约，有则修改，无则添加</p>
<p>请求说明</p>
<pre>
HTTP请求方式：<code>POST</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/contracts</a></code></pre>

<p>失败返回示例</p>
<pre class="prettyprint" >
<code>{
"code": 403,
"message": "repeat id_code"
}</code>
</pre>
  <p>成功返回示例</p>
  <pre class="prettyprint" >
<code>{
  "id": 7,
  "created_at": {
    "date": "2017-08-30 10:40:40.000000",
    "timezone_type": 3,
    "timezone": "Asia/Shanghai"
  },
  "code": 201,
"message": "success"
}</code>
</pre>

  <br/>
  <p class="title"><a href="#" id="当前医生今日要随访记录">当前医生今日要随访记录</a></p>
  <p>请求说明</p>
  <pre>
HTTP请求方式：<code>GET</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/visits</a></code></pre>

  <p>返回示例</p>
  <pre class="prettyprint" >
<code>{
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "archive_id": 2,
      "visited_at": "2017-08-29 00:00:00",
      "next_visited_at": null,
      "doctor_id": 8,
      "visit_type": "App\\Models\\VisitSelfCareAbility",
      "visit_mode": null
    },
    {
      "id": 2,
      "archive_id": 2,
      "visited_at": "2017-08-02 00:00:00",
      "next_visited_at": "2017-08-25 00:00:00",
      "doctor_id": 8,
      "visit_type": "App\\Models\\VisitHypertension",
      "visit_mode": 2
    },

  ],
  "from": 1,
  "last_page": 1,
  "next_page_url": null,
  "path": "http://192.168.1.188:8001/api/visits",
  "per_page": 20,
  "prev_page_url": null,
  "to": 2,
  "total": 2
}</code>
</pre>

<br/>
<p class="title"><a href="#" id="添加老年人随访">添加老年人随访</a></p>
<p>请求说明</p>
<pre>
HTTP请求方式：<code>POST</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/visits/selfcare_ability</a></code></pre>

<p>失败返回示例</p>
<pre class="prettyprint" >
<code>{
  "code": 403,
  "message": {
    "id_code": [
      "请填写id code."
    ],
    "mobile": [
      "请填写mobile."
    ]
  }
}</code>
</pre>
  <p>成功返回示例</p>
  <pre class="prettyprint" >
<code>{
  "id": 7,
  "created_at": {
    "date": "2017-08-30 10:40:40.000000",
    "timezone_type": 3,
    "timezone": "Asia/Shanghai"
  },
  "code": 201,
  "message": "repeat id_code"
}</code>
</pre>

<br/>
<p class="title"><a href="#" id="查看老年人随访记录">查看老年人随访记录</a></p>
<p>请求说明</p>
<pre>
HTTP请求方式：<code>POST</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/visits/selfcare_ability/{id}</a></code>
注:{id}为visit_id
</pre>

  <p>失败返回示例</p>
  <pre class="prettyprint" >
<code>{
  "code": 403,
  "message": {
    The VisitSelfCareAbility does not find by visit_id:1
  }
}</code>
</pre>
  <p>成功返回示例</p>
  <pre class="prettyprint" >
<code>{
  "data": {
    "id": 1,
    "archive_id": 2,
    "doctor_id": 8,
    "visit_mode": null,
    "visit_id": 1,
    "meal": 2,
    "comb_wash": 3,
    "dressing": 3,
    "toilets": 2,
    "activity": 2,
    "created_at": "2017-08-29 11:58:52",
    "updated_at": "2017-08-29 11:58:52",
    "deleted_at": null,
    "tenant_id": 1
  },
  "code": 203,
  "message": "success"
}</code>
</pre>

<br/>
<p class="title"><a href="#" id="修改老年人随访">修改老年人随访</a></p>
<p>请求说明</p>
<pre>
HTTP请求方式：<code>POST</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/visits/selfcare_ability/{id}</a></code>
</pre>

  <p>失败返回示例</p>
  <pre class="prettyprint" >
<code>{
  "code": 403,
  "message": {
    "mobile": [
      "请填写mobile."
    ]
  }
}</code>
</pre>
  <p>成功返回示例</p>
  <pre class="prettyprint" >
<code>{
  "updated_at": {
    "date": "2017-08-30 16:00:43.000000",
    "timezone_type": 3,
    "timezone": "Asia/Shanghai"
  },
  "code": 200,
  "message": "success"
}</code>
</pre>

<br/>
  <h3>微信端接口</h3>
<p class="title"><a href="#" id="绑定档案">用户绑定档案</a></p>
<p>请求说明</p>
<pre>
HTTP请求方式：<code>POST</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/health_wechat/bind</a></code>
</pre>
<p>提交参数</p>
<pre>
<code>{
  "name":"xxx",                   //名字
  "id_code":"45273119920912033x"  //身份证号
  "mobile":"13370185090"          //手机号
}</code>
</pre>
<p>失败返回示例</p>
<pre class="prettyprint" >
后台没有找到该身份证号的档案
<code>{
  "code": 403,
  "message": The Archive does not find by id_code:45273119920912033x
}</code>

录入身份证和名字以后台不匹配
<code>{
  "code": 403,
  "message": 录入信息以后台不匹配，请核查！
}</code>
</pre>
  <p>成功返回示例</p>
  <pre class="prettyprint" >
<code>{
  "status": 1,
  "code": 200,
  "message": "信息匹配正确，档案已绑定"
}</code>
</pre>

  <br/>
  <p class="title"><a href="#" id="修改用户基本信息">修改用户基本信息</a></p>
  <p>请求说明</p>
  <pre>
HTTP请求方式：<code>POST</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/health_wechat/user_info</a></code>
</pre>
  <p>提交参数</p>
  <pre>
<code>{
  "name":"xxx", //名字
  "sex":"1"     //性别
  "age":"25"    //年龄
}</code>
</pre>
  <p>失败返回示例</p>
  <pre class="prettyprint" >
<code>{
  "code": 403,
  "message": The User does not find by id_code:45273119920912033x
}</code>
</pre>
  <p>成功返回示例</p>
  <pre class="prettyprint" >
<code>{
  "status": 1,
  "code": 200,
  "message": "信息匹配正确，档案已绑定"
}</code>
</pre>

  <br/>
  <p class="title"><a href="#" id="用户基础档案">用户基础档案</a></p>
  <p>请求说明</p>
  <pre>
HTTP请求方式：<code>GET</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/health_wechat/archive/{id_code}</a></code>
</pre>
  <p>失败返回示例</p>
  <pre class="prettyprint" >
<code>{
  "code": 403,
  "message": The Archive does not find by id_code:45273119920912033x
}</code>
</pre>
  <p>成功返回示例</p>
  <pre class="prettyprint" >
<code>{
  "code": 200,
  "message": "success",
  "data": {
    "id": 1,
    "community_hospital_id": 1,
    "community_id": 2,
    "doctor_id": 8,
    "code": "00000000000200000",
    "real_name": "韦佳雷",
    "sex": "1",
    "birthday": "1992-09-12",
    "id_code": "452731199209120337",
    "work_unit": "优云平台",
    "mobile": "13370185092",
    "contact_name": "韦佳雷",
    "contact_mobile": "13370185092",
    "emergency_contact_name": "韦佳雷",
    "emergency_contact_mobile": "13370185092",
    "is_register": 0,
    "nation": "汉族",
    "blood_group": "3",
    "blood_group_rh": "1",
    "education": "2",
    "job": "1",
    "marital_status": "1",
    "address": "深圳宝安区臣田村",
    "phone_number": "5008008",
    "description": null,
    "status": 1,
    "checked_at": null,
    "created_at": "2017-09-11 17:00:31",
    "updated_at": "2017-10-19 17:00:31",
    "deleted_at": null,
    "tenant_id": 1,
    "doctor_name": "韦佳雷",
    "groups": [],
    "age": 25,
    "payment_modes": [
      {
        "value": "1",
        "content": null,
        "display_value": "城镇职工基本医疗保险"
      }
    ],
    "allergies": [
      {
        "value": "2",
        "content": null,
        "display_value": null
      }
    ],
    "exposes": [
      {
        "value": "2",
        "display_value": "化学品"
      }
    ],
    "diseases": [
      {
        "value": "13",
        "content": "高血糖",
        "confirmed_at": "2010-09-01",
        "display_value": "其他"
      }
    ],
    "injuries": [
      {
        "value": "1",
        "content": null,
        "confirmed_at": null,
        "display_value": "无"
      }
    ],
    "operations": [
      {
        "value": "1",
        "content": null,
        "confirmed_at": null,
        "display_value": "无"
      }
    ],
    "transfusions": [
      {
        "value": "1",
        "content": null,
        "confirmed_at": null,
        "display_value": "无"
      }
    ],
    "families": [
      {
        "relationship": "父亲",
        "value": "1",
        "content": null,
        "display_value": "无"
      }
    ],
    "hereditary_disease": {
      "value": "1",
      "content": null,
      "display_value": "无"
    },
    "disabilities": [
      {
        "value": "1",
        "display_value": "无残疾"
      }
    ],
    "living_kitchen": {
      "value": "3",
      "display_value": "换气扇"
    },
    "living_fuel": {
      "value": "1",
      "display_value": "液化气"
    },
    "living_water": {
      "value": "1",
      "display_value": "自来水"
    },
    "living_toilet": {
      "value": "1",
      "display_value": "卫生厕所"
    },
    "living_fence": {
      "value": "2",
      "display_value": "单设"
    },
    "doctor": {
      "id": 8,
      "user_id": 10,
      "community_hospital_id": 1,
      "avatar": null,
      "duty": null,
      "title": null,
      "specialty": null,
      "skills": "全科医生",
      "working_time": null,
      "consult": null,
      "description": null,
      "created_at": null,
      "updated_at": null,
      "deleted_at": null,
      "tenant_id": 1,
      "user": {
        "id": 10,
        "tenant_id": 1,
        "name": "weijialei",
        "email": null,
        "mobile": "13370185092",
        "email_verified": 0,
        "mobile_verified": 1,
        "real_name": "韦佳雷",
        "id_code": "452731199209120337",
        "avatar": null,
        "sex": 0,
        "date_of_birth": null,
        "address": null
      }
    },
    "contract": {
      "id": 1,
      "doctor_id": 8,
      "package_id": 1,
      "archive_id": 1,
      "images": null,
      "price": "1999.00",
      "start_time": "2017-09-07",
      "end_time": "2018-09-07",
      "status": 2,
      "checked_at": null,
      "tenant_id": 1,
      "doctor": {
        "id": 8,
        "user_id": 10,
        "community_hospital_id": 1,
        "avatar": null,
        "duty": null,
        "title": null,
        "specialty": null,
        "skills": "全科医生",
        "working_time": null,
        "consult": null,
        "description": null,
        "created_at": null,
        "updated_at": null,
        "deleted_at": null,
        "tenant_id": 1,
        "groups": []
      }
    }
  }
}</code>
</pre>

  <br/>
  <p class="title"><a href="#" id="签约服务">签约服务</a></p>
  <p>请求说明</p>
  <pre>
HTTP请求方式：<code>GET</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/health_wechat/contracts/{id_code}</a></code>
</pre>
  <p>失败返回示例</p>
  <pre class="prettyprint" >
<code>{
  "code": 403,
  "message": The Archive does not find by id_code:45273119920912033x
}</code>
</pre>
  <p>成功返回示例</p>
  <pre class="prettyprint" >
<code>{
  "code": 200,
  "message": "success",
  "data": {
    "id": 1,
    "doctor_id": 8,
    "package_id": 1,
    "archive_id": 1,
    "images": null,
    "price": "1999.00",
    "start_time": "2017-09-07",
    "end_time": "2018-09-07",
    "status": 2,
    "checked_at": null,
    "tenant_id": 1,
    "doctor_name": "韦佳雷",
    "communityHospital_name": "双佳医院",
    "package": {
      "id": 1,
      "name": "VIP服务包",
      "community_hospital_id": 1,
      "character": "老年人",
      "requirement": "体检，健康调理",
      "management_objective": "做到最好",
      "price": "1999.00",
      "created_at": "2017-09-07 16:30:47",
      "updated_at": "2017-09-07 16:30:47",
      "deleted_at": null,
      "tenant_id": 1
    },
    "doctor": {
      "id": 8,
      "user_id": 10,
      "community_hospital_id": 1,
      "avatar": null,
      "duty": null,
      "title": null,
      "specialty": null,
      "skills": "全科医生",
      "working_time": null,
      "consult": null,
      "description": null,
      "created_at": null,
      "updated_at": null,
      "deleted_at": null,
      "tenant_id": 1,
      "user": {
        "id": 10,
        "tenant_id": 1,
        "name": "weijialei",
        "email": null,
        "mobile": "13370185092",
        "email_verified": 0,
        "mobile_verified": 1,
        "real_name": "韦佳雷",
        "id_code": "452731199209120337",
        "avatar": null,
        "sex": 0,
        "date_of_birth": null,
        "address": null
      },
      "community_hospital": {
        "id": 1,
        "name": "双佳医院",
        "phone_number": null,
        "address": null,
        "image": null,
        "contract": null,
        "created_at": null,
        "updated_at": null,
        "deleted_at": null,
        "tenant_id": 1
      }
    },
    "family": [
      {
        "id": 1,
        "contract_id": 1,
        "name": "韦佳雷",
        "mobile": "13370185092",
        "relationship": "本人",
        "id_code": "452731199209120337",
        "tenant_id": 1
      },
      {
        "id": 2,
        "contract_id": 1,
        "name": "韦",
        "mobile": "15678320383",
        "relationship": "父亲",
        "id_code": "452731197006112337",
        "tenant_id": 1
      },
      {
        "id": 3,
        "contract_id": 1,
        "name": "覃",
        "mobile": "15678534715",
        "relationship": "母亲",
        "id_code": "452731197309010999",
        "tenant_id": 1
      }
    ]
  }
}</code>
</pre>

  <br/>
  <p class="title"><a href="#" id="体检列表">体检列表</a></p>
  <p>请求说明</p>
  <pre>
HTTP请求方式：<code>GET</code>
请求URL:<code><a href="#">192.168.1.188:8001/api/health_wechat/health_list/{id_code}</a></code>
</pre>
  <p>失败返回示例</p>
  <pre class="prettyprint" >
<code>{
  "code": 403,
  "message": The Archive does not find by id_code:45273119920912033x
}</code>
</pre>
  <p>成功返回示例</p>
  <pre class="prettyprint" >
<code>{
  "code": 200,
  "message": "success",
  "data": [
    {
      "MachineId": "SKT817080011",
      "UnitNo": null,
      "UnitName": null,
      "MacAddr": "00:0E:C4:D1:B0:B0",
      "RecordNo": "1708001120170901171106",
      "MeasureTime": "2017-09-02 17:11:06",
      "DeviceType": "SK-T8",
      "LoginType": "1"
    },
    {
      "MachineId": "abc",
      "UnitNo": null,
      "UnitName": null,
      "MacAddr": "00:0E:C4:D1:B0:B0",
      "RecordNo": "1708001120170901171106",
      "MeasureTime": "2017-09-01 17:11:06",
      "DeviceType": "SK-T8",
      "LoginType": "1"
    }
  ]
}</code>
</pre>


</div>
</div>
</div>
<div id="to_top">返回<br>顶部</div>
</body>
</html>
