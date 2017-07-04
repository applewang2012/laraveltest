<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>轻松学会Laravel-@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('static/Bootstrap-3.3.5-dist/css/bootstrap.min.css')}}">
    @section('style')
        @show
</head>
{{--头部--}}
@section('header')
    <div class="jumbotron">
        <div class="container">
            <h2>轻松学会laravel</h2>
            <p>-玩转Laravel表单-</p>
        </div>
    </div>
@show
{{--中间内容区域--}}
<div class="container">
    <div class="row " style="width: 100%;">
        {{--左侧菜单区域--}}
        <div class="col-md-3" style="float: left;width: 20%;">
            @section('leftmenu')
                <div class="list-group">
                    <a href="{{'/student/index'}}" class="list-group-item
                    {{Request::getPathInfo() == '/student/index'?'active':''}}">学生列表</a>
                    <a href="{{'/student/create'}}" class="list-group-item
                    {{Request::getPathInfo() == '/student/create'?'active':''}}">新增学生</a>
                </div>
            @show
        </div>
        {{--右侧内容区域--}}
        <div class="clo-md-9" style="float: right;width: 80%">
            @yield('content')
        </div>
    </div>
</div>

{{--尾部--}}
@section('footer')
    <div class="jumbotron" style="margin: 0;">
        <div class="container">
            <span>@2016 imooc</span>
        </div>
    </div>
@show
{{--jQuery文件--}}
<script src="{{ asset('static/Bootstrap-3.3.5-dist/js/jquery-1.11.3.js')}}"></script>
    {{--/*Bootstrap javascript文件*/--}}
<script src="{{ asset('static/Bootstrap-3.3.5-dist/js/bootstrap.min.js')}}"></script>
@section('javascript')
@show
</html>
