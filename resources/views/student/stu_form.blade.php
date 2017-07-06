<form class="form-horizontal" method="post" action="{{url('/student/save')}}">
    {{csrf_field()}} {{--方法二，添加这句话--}}
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">姓名</label>
        <div class="col-sm-5">
            <input type="text" name="name" class="form-control" value="{{old('name') ? old('name') : $studentmodle->name}}"
                   id="name" placeholder="请输入学生姓名">
            {{--value="{{old('name')}}"数据保存作用--}}
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first()}}</p>
            {{--另一种错误提示--}}
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">年龄</label>
        <div class="col-sm-5">
            <input type="text" name="age" class="form-control"
                   value="{{old('age') ? old('age') : $studentmodle->age}}"
                   id="age" placeholder="请输入学生年龄">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">年龄只能整数</p>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">性别</label>
        <div class="col-sm-5">
            @foreach($studentmodle->sexFunction() as $ind=>$val)
                <label class="radio-inline">
                    <input type="radio" name="sex" name="sex"
                           {{'sex' == $ind ? 'checked' : ''}}
                           value={{$ind}}>{{$val}}
                </label>
            @endforeach
            {{--<label class="radio-inline">
                <input type="radio" name="sex" name="sex" value="11">男
            </label>
            <label class="radio-inline">
                <input type="radio" name="sex" name="sex" value="12">女
            </label>--}}
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">请选择性别</p>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>