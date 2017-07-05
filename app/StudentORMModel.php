<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class StudentORMModel extends Model{
    const SEX_UN = 10;
    const SEX_BOY = 11;
    const SEX_GRIL = 12;
   //指定表名
    protected $table = 'student';
    //指定id
    protected $primaryKey = 'id';
    //自动维护时间戳 false 不维护，数据库中需要有created-at和updated_at两列
    public $timestamps = true;
    //指定允许批量赋值的字段
    protected $fillable = ['name','age','sex'];

//    protected function getDateFormat()
//    {
//        return time();
//    }

//    protected function asDateTime($value)
//    {
//        return $value;
//    }

    public function sexFunction($ind = null){ /*默认为空*/
        $arr = [
            self::SEX_UN => '未知1',
            self::SEX_BOY => '男',
            self::SEX_GRIL => '女',
        ];
        if ($ind != null){
            return array_key_exists($ind, $arr) ? $arr[$ind] : $arr[self::SEX_UN];
        }
        return $arr;
    }
}