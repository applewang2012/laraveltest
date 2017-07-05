@extends('common.stulayouts')
@section('content')
    @include('common.validator')
    <div class="panel panel-default">
        <div class="panel-heading">新增学生</div>
        <div class="panel-body">
            @include('student.stu_form')
            {{--post验证不通过时关闭token 方法，方法一 ，在Kernel.php中 注释 App\Http\Middleware\VerifyCsrfToken--}}

        </div>
    </div>
    @stop