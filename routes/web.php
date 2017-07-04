<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('basic1', function(){
   return view('welcome');
});

Route::post('basic2', function(){
   return 'Basic2 test post ';
});
//多请求路由
Route::match(['get', 'post'], 'multy',function(){
   return 'multy1';
});

Route::any('multy2',function(){
   return 'multy2';
});
//路由参数  http://laravel54test.com/user/100
//Route::get('user/{id}', function($id){
//    return 'User-id-'.$id;
//});
//user后面还有参数时选id,没有参数时走name,
//where时正则表达式，a-z时走name，否则走id
//Route::get('user/{name?}', function($name='jacky'){
//    return 'User-name-'.$name;
//})->where('name', '[A-Za-z]+');

//Route::get('user/{name?}/{id}', function($name='jacky', $id){
//    return 'User-name-'.$name.' -id-'.$id;
//})->where(['name'=>'[A-Za-z]+', 'id'=>'[0-9]+']);

//路由别名
Route::get('user/member_center',['as'=>'center', function(){
    //return 'member_center';
    return route('center');
}]);

//路由群组
Route::group(['prefix'=>'member'], function(){
    Route::any('multy2',function(){
        return 'member-multy2';
    });
    Route::any('multy3',function(){
        return 'member-multy3';
    });
    Route::any('multy4',function(){
        return 'member-multy4';
    });

});

Route::get('member/info', 'MemberController@infonoid');
//另一种方法
//Route::get('member/info', ['uses'=>'MemberController#infonoid']);
//带参数
Route::any('member/{id}',['uses'=>'MemberController@infowithid'])->where('id','[0-9]+');

Route::get('member/view', 'MemberController@infoview');

Route::get('member/model', 'MemberController@testMemberModel');

Route::any('test1',['uses'=>'StudentController@test1']);

Route::get('query1', 'StudentController@query1');

Route::any('query2', 'StudentController@query2');

Route::any('query3', 'StudentController@query3');

Route::any('query4', 'StudentController@query4');

Route::any('query5', 'StudentController@query5');

Route::any('orm1', 'StudentControllerORM@orm1');

Route::any('orm2', 'StudentControllerORM@orm2');

Route::any('orm3', 'StudentControllerORM@orm3');

Route::any('orm4', 'StudentControllerORM@orm4');

Route::any('section1', 'StudentController@section1');

Route::any('url', ['as'=>'url', 'uses'=>'StudentController@urlTest']);

Route::any('request1', 'StudentController@request1');

//添加中间建
Route::group(['middleware'=>['web']],function(){}

);
Route::any('session1',['uses'=>'StudentController@session1']);
Route::any('session2',['uses'=>'StudentController@session2']);




Route::any('response',['uses'=>'StudentController@response']);
Route::any('redirect',[
    'as'=>'as redirect',
    'uses'=>'StudentController@redirectFunction']);
//宣传页面
Route::any('activity0',['uses'=>'StudentController@activity0']);
//活动页面
Route::group(['middleware'=>['activity']],function(){
    Route::any('activity1',['uses'=>'StudentController@activity1']);
    Route::any('activity2',['uses'=>'StudentController@activity2']);
});


Route::get('student/index',['uses'=>'StudentController@index']);
Route::any('student/create',['uses'=>'StudentController@create']);
Route::any('student/save',['uses'=>'StudentController@save']);
Route::any('student/update/{id}',['uses'=>'StudentController@update']);