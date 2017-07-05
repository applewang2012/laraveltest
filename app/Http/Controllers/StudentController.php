<?php
namespace App\Http\Controllers;
use App\Member;
use App\StudentORMModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use test\Mockery\SubclassWithFinalWakeup;

class StudentController extends Controller{
    public function test1 (){
//        $studnents = DB::select('select * from student');
//        var_dump($studnents);

//        $bool = DB::insert('insert into student(name, age)VALUES (?,?)',['tom',28]);
//        var_dump($bool);

//        $update = DB::update('update student set age = ? where name = ?',[108, 'tom']);
//        var_dump($update);

//        $studnents = DB::select('select * from student where name = ?',['jackay']);
//        var_dump($studnents);

       $studnents = DB::delete('delete from student where id > ?',[2]);
        var_dump($studnents);

    }
    public function infowithid ($id){
        return 'member-info-id-'.$id;
    }

    public function infoview (){
        //return view('member-info');
        return view('member/member-dir-info', ['name'=>'爱国者','age'=>18]);
    }

    public function testMemberModel (){
        return Member::getMember();
    }
        //插入
    public  function query1(){
//        $bool = DB::table('student')->insert(['name'=>'patriot','age'=>30]);
//        var_dump($bool);
        //插入多条
        $status = DB::table('student')->insert([['name'=>'patriot1','age'=>31],
            ['name'=>'patriot2','age'=>32],
            ['name'=>'patriot3','age'=>33]]);
        var_dump($status);
    }
        //更新
    public function query2(){

//        $num = DB::table('student')
//            ->where('name', 'patriot1')
//            ->update(['age'=>100]);
//        var_dump($num);
        //自增自减
//        $num = DB::table('student')->increment('age', 3); //自增3
//        var_dump($num);

        $num = DB::table('student')
            ->where('id', 3)
            ->decrement('age', 3,['name'=>'chian']); //自减3,同时修改name的值
        var_dump($num);
    }

    //删除
    public function query3(){
//        $num = DB::table('student')
//            ->where('id', 1)
//            ->delete();
//        var_dump($num);

      //  DB::table('student')->truncate(); //全部删除，谨慎使用
    }

    //查询
    public function query4(){
        //$stu = DB::table('student')->get();
//        $stu = DB::table('student')
//            ->orderBy('id','desc')
//            ->first();  //first 获取第一条数据
       // dd($stu);
        //where
//        $stuwhere = DB::table('student')
//            ->where('id','>=', 2)
//            ->get();
        //where加多个条件
//        $stuwhere = DB::table('student')
//            ->whereRaw('id >= ? and age > ?',[2, 32])
//            ->get();
        //pluck
//        $stuwhere = DB::table('student')
//            ->pluck('age', 'name');  //返回name列
//        $stuwhere = DB::table('student')
//            ->lists('name');
        //select
        $stuwhere = DB::table('student')
            ->select('id','name','age')
            ->get();
        dd($stuwhere);
        //chunk
        echo'<pre>';
//        DB::table('student')
//            ->orderBy('id')
//            ->chunk(2, function($students) {  //每次查询两条
//                var_dump($students);
//               // return false; //查询结束
//            });
       // dd($stuwhere);
    }
    //聚合函数
    public function query5(){
        //$num = DB::table('student')->count();
        //$num = DB::table('student')->max('age');  //min 最小
       // $num = DB::table('student')->avg('age');
        $num = DB::table('student')->sum('age');
        var_dump($num);
    }

    public function section1(){

        $students = StudentORMModel::get();
        $name = 'jerry and tom';
        $arr = ['tom','jerry'];
        return view('member.section1',[
            'paramname'=>$name, 'arry'=>$arr, 'students'=>$students]);
    }

    public function urlTest(){
        return 'urlTest';
    }
    //晋级篇
    public function request1(Request $request){
        //1，取值
        //echo $request->input('name');
       // echo $request->input('sex', '未知');
        //判断是否有值
//        if ($request->has('name')){
//            echo $request->input('name');
//        }else{
//            echo '无该参数';
//        }
        //取所有参数
//        $res = $request->all();
//        dd($res);
        //判断请求类型
//        echo $request->method(); //返回GET
//       if ($request->isMethod('GET')){
//            echo 'Yes';
//       }else{
//            echo 'No';
//       }
        //判断是否ajax请求
//        $res = $request->ajax();
//        dump($res);
        //判断理由是否满足student/*这样规则
//        $res = $request->is('student/*');
//        var_dump($res);
        //获取当前url
        echo $request->url();
    }


    public function session1(Request $request){
        //http request seesion()
       // $request->session()->put('key1','value1');
       // $request->session()->put('key2','value2');
       // Session::put('key4','value4');
       // echo $request->session()->get('key4');
       // Session::put(['key5'=>'value5']);
        //把数据放到session数组中
//        Session::push('student','tom');
//        Session::push('student','jerry');
//        Session::push('student','tickey');
    }
    public function session2(Request $request){
        //echo $request->session()->get('key1');
        //echo $request->session()->get('key5', 'default'); //不存在取默认值
        //$res = Session::get('student','default');
        //var_dump($res);

//        $res = Session::pull('student','default'); //取出数据，并删除
//        var_dump($res);
//        if (Session::has('key11')){
//            $res = Session::all();
//            dd($res);
//        }
        Session::forget('key1');  //删除key  Session::flush() 删除所有
        $res = Session::all();
            dd($res);
    }

    public function response(){
        $data=[
            'errorCode'=> 0,
            'errMsg'=>'success',
            'data'=>'sean',

        ];
        //响应json
       // return response()->json($data);
        //重定向
        //return redirect('redirect');
       // return redirect('redirect')->with('msg1','重定向');
        //或者
       // return redirect()->action('StudentController@redirectFunction')->with('mssage','重定向数据2');

        return redirect()->route('as redirect')->with('msg','快速数据');
    }

    public function redirectFunction(Request $request){

       // return 'redirect function ';
       // return Session::get('mssage','default msg');
       //return Session::get('msg','default msg');
        return redirect()->back(); //返回上一级
    }

    public function activity0(){
        return '活动即将开始，敬请期待';
    }

    public function activity1(){
        return '活动已经开始1，谢谢参与1';
    }

    public function activity2(){
        return '活动已经开始2，谢谢参与2';
    }

    public function index(){
        //$students = StudentORMModel::get();
        //分页
        $students = StudentORMModel::paginate(8);
        return view('student.index',['students' => $students,]);
    }
    //tia
    public function create(Request $request){
        $student = new StudentORMModel();
        if ($request->method('POST')){

//            $this->validate($request,[
//                'Student.name'=>'required|min:2|max:20',
//                'Student.age'=>'required|integer',
//                'Student.sex'=>'required|integer',
//                ],[
//                'required'=>':attibute 为必填项',
//                'min'=>':attibute 长度不符合要求',
//                'integer'=>':attibute 必须为整数',
//                ],[
//                'Student.name'=>'姓名',
//                'Student.age'=>'年龄',
//                'Student.sex'=>'性别',
//            ]);

//            $data = $request->input('studennt');
//            if (StudentORMModel::create($data)){
//                return redirect('student/index');
//            }else{
//                return redirect()->back();
//            }
        }
        return view('student.create', [
            'studentmodle'=>$student]
        );
    }
    //保存添加
    public function save(Request $request){
        //1，控制器验证
        $this->validate($request,[
            'name'=>'required|min:2|max:20',
            'age'=>'required|integer',
            'sex'=>'required|integer',
        ],[
                'required'=>':attribute 为必填项',
                'min'=>':attribute 长度不符合要求',
                'integer'=>':attribute 必须为整数',
                ],[
                'name'=>'姓名',
                'age'=>'年龄',
                'sex'=>'性别',
            ]);
        //2,Validator类验证
        $data = $request->input('studennt');
        $student = new StudentORMModel();
        $student->name = $request->get('name');
        $student->age = $request->get('age');
        $student->sex = $request->get('sex');
        if ($student->save()){
            return redirect('student/index')->with('success','添加信息成功');
        }else{
            return redirect()->back();
        }

        //return view('save');
    }
//request第一个参数不会影响路由
   public function update(Request $request, $id){

       $stu = StudentORMModel::find($id);
//       if ($request->isMethod('POST')){
//          dd($request->isMethod('POST'));
//           $stu->name = $request->get('name');
//           $stu->age = $request->get('age');
//           $stu->sex = $request->get('sex');
//           if ($stu->save){
//
//               return redirect('student/index')->with('success','修改信息成功-'.$id);
//           }
//       }
        return view('student.update',[
            'studentmodle'=>$stu,
        ]);
   }
}
