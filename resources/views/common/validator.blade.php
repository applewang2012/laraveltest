@if(count($errors))
<div class="alert alert-danger">

            <ul>
                <li>{{ $errors->first() }}</li>
            </ul>

    {{--<ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        --}}{{--<li>姓名不能为空</li>
        <li>年龄只能为整数</li>
        <li>请选择性别</li>--}}{{--
        @endforeach
    </ul>--}}
</div>
@endif