@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div id="bbb"></div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $.fn.myPlugin = function () {
            var province = document.createElement("select");
            var city = document.createElement("select");
            var district = document.createElement("select");
            var town = document.createElement("select");
            var village = document.createElement("select");

            $(province).attr('class', 'form-control').appendTo(this);
            $(city).attr('class', 'form-control').appendTo(this);
            $(district).attr('class', 'form-control').appendTo(this);
            $(town).attr('class', 'form-control').appendTo(this);
            $(village).attr('class', 'form-control').appendTo(this);

            $.get('11', function (data) {
                $(province).empty();
                for (var item in data) {
                    $(province).append("<option value='" + data[item].code + "'>" + data[item].name + "</option>");
                }
            });
//            $(this).append(province).attr('class', 'form-control');
//            $(this).append(city).attr('class', 'form-control');
//            $(this).append(district).attr('class', 'form-control');
//            $(this).append(town).attr('class', 'form-control');
//            $(this).append(village).attr('class', 'form-control');
            //在这里面,this指的是用jQuery选中的元素
            //example :$('a'),则this=$('a')
//            this.css('color', 'red');
//            $(this).append("<select class='form-control'></select>");
//            $(this).append("<select class='form-control'></select>");
//            $(this).append("<select class='form-control'></select>");
//            $(this).append("<select class='form-control'></select>");
//            $(this).append("<select class='form-control'></select>");
        }

        $(function () {
            $('#bbb').myPlugin();
        })
    </script>
@stop