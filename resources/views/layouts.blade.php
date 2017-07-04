<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>轻松学会Laravel -@yield('title')</title>
    <style>
        .header{
            width:1000px;
            height:150px;
            margin: 0 auto;
            background: #f5f5f5;
            border:1px solid #ddd;
        }
        .main{
            width:1000px;
            height:300px;
            margin:0 auto;
            margin-top:15px;
            clear: both;
        }
        .main .siderbar{
            float:left;
            width:20%;
            height:inherit;
            margin:0 auto;
            background: #f5f5f5;
            border:1px solid #ddd;
        }
        .main .content{
            float:right;
            width:75%;
            height:inherit;
            margin:0 auto;
            background: #f5f5f5;
            border:1px solid #ddd;
        }

        .footer{
            width:1000px;
            height:150px;
            margin:0 auto;
            margin-top: 15px;
            background: #f5f5f5;
            border:1px solid #ddd;
        }
    </style>
</head>
<body>
<div class="header">
    @section('header')
    头部
        show()
</div>
<div
    class="main">
    <div class="siderbar">
        @section('siderbar')
        侧边栏
            @show
        </div>
    <div class="content">
        @yield('content', '主要内容区域');

    </div>
</div>

<div class="footer">
    @section('f

    ooter');
    底部
        @show
</div>
</body>
</html> 