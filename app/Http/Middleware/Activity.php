<?php

namespace App\Http\Middleware;
use Closure;

class Activity
{
//    //前置
//    public function handle($request,Closure   $next){
//        if (time() < strtotime('2017-06-12')){
//            return redirect('activity0');
//        }
//
//        return $next($request);
//    }

    public function handle($request,Closure $next){


       $repose =  $next($request);
        var_dump($repose);

        //l逻辑
        echo '我是后置操作';
    }
}
