@extends('layouts')
@section('header')
    @parent
    header
    @stop
@section('sidebar')
    sidebar
    @stop

@section('content')
    content
{{--    --}}{{--模板中输出php变量--}}{{--
    <p>{{$paramname}}</p>
    <p>{{time()}}</p>
    <p>{{date('Y-m-d H:i:s', time())}}</p>

    <p>{{in_array($paramname,$arry) ? 'true':'false'}}</p>

    <p>{{isset($paramname) ? $paramname : 'default'}}</p>  --}}{{--如果有打印，没有default--}}{{--
    <p>{{$paramname1 or 'default value'}}</p>
    --}}{{--原样输出--}}{{--
    <p>@{{ $paramname }}</p>
    --}}{{--模板中的注释--}}{{--
    --}}{{--引入子视图include--}}{{--
    @include('member.section1include',['msg'=>'我是错误信息传递'])--}}

    @if($paramname == 'sean')
        I am sean
    @elseif($paramname == 'imooc')
        I am imooc
    @else
        Who am I ?
    @endif
    <br>
    @if (in_array($paramname,$arry))
        true
    @else
        false
    @endif

    <br>
    @unless($paramname == 'sean')  {{--unless相当if的取反--}}
    I am sean !
    @endunless

    <br>
    {{--@for($i=0; $i<6; $i++)--}}
        {{--<p>{{$i}}</p>--}}
{{--    --}}{{--@endfor--}}{{--
    @foreach($students as $stu)  --}}{{--students集合，stu单个--}}{{--
    <p>{{$stu->name}}</p>
    @endforeach--}}

{{--    @forelse($students as $stu)
    <p>{{$stu->name}}</p>
    @empty
    <p>null</p>
    @endforelse--}}

    <a href="{{ url('url') }}"> urlstart()</a>
    <br>
    <a href="{{ action('StudentController@urlTest') }}"> action()</a>
    <br>
    <a href="{{ route('url') }}"> route()</a>

    @stop