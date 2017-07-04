@extends('common.stulayouts')
@section('content')
    @include('common.validator')
    <div class="panel panel-default">
        <div class="panel-heading">更新学生</div>
        <div class="panel-body">
            {{--post验证不通过时关闭token 方法，方法一 ，在Kernel.php中 注释 App\Http\Middleware\VerifyCsrfToken--}}
            @include('student.stu_form')
        </div>
    </div>
@stop