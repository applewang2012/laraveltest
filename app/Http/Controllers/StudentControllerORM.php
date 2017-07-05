<?php
namespace App\Http\Controllers;
use App\Member;
use App\StudentORMModel;
use Illuminate\Support\Facades\DB;

class StudentControllerORM extends Controller{
    public function orm1(){
        //all
       // $stu = StudentORMModel::all();
      // $stu = StudentORMModel::find(1);
        //findorFail() 查不到抛异常
       // $stu = StudentORMModel::findOrFail(1);
        //get
        //$stu = StudentORMModel::get();
//        $stu = StudentORMModel::where('id','>','1001')
//            ->orderBy('age', 'desc')
//            ->first();
//        echo '<pre>'; //每次返回2条记录，通过echo分开
//        StudentORMModel::chunk(2,function($stu){
//            var_dump($stu);
//        });
        //聚合函数
       // $stu = StudentORMModel::count();
        $stu = StudentORMModel::where('id', '>', 10)
        ->max('age');
       var_dump($stu);//
    }
    //保存
    public function orm2(){
        //使用模型新增数据
//        $student = new StudentORMModel();
//        $student->name = 'chenyi';
//        $student->age = 2;
//        $bool = $student->save();  //created-at 和 updated_at数据表中必须一样才能插入
//        $student = StudentORMModel::find(4);
//        echo date('Y-m-d H:i:s', $student->created_at);
        //dd($bool);

        //使用create 新增数据
//        $stu = StudentORMModel::create(['name'=>'chenyi1', 'age'=>3]);
//        dd($stu);
        //firstOrCreate以属性查找，没有则新增
        $stu = StudentORMModel::firstOrCreate(
            ['name'=>'chenyi2', 'age'=>5]
        );
        //firstOrNew以属性查找，若没有则生成实例，要保存调用save方法
        $student = StudentORMModel::firstOrNew(
            ['name'=>'chenyi2', 'age'=>5]
        );
        $stu = $student->save();
        dd($stu);
    }
    //更新数据
    public function orm3(){
//        $stu = StudentORMModel::find(10);
//        $stu->name = 'kitty';
//        $boolean = $stu->save();
//        var_dump($boolean);
        //批量更新
        $num = StudentORMModel::where('id','>', 10)->update(['age'=>9]);
        var_dump($num);
    }

    //删除数据
    public function orm4(){
//        $student = StudentORMModel::find(15);
//        $bool = $student->delete();
//        var_dump($bool);
        //通过逐渐删除
       // $delete = StudentORMModel::destroy(20);
       // $delete = StudentORMModel::destroy(21,22);  //两条记录
       // $delete = StudentORMModel::destroy([21,22]);  //数组
       // var_dump($delete);
        //删除指定条件
        $delte = StudentORMModel::where(
            'age','>=',33
        )->delete();
        var_dump($delte);
    }
}
