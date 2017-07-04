<?php
namespace App\Http\Controllers;
use App\Member;

class MemberController extends Controller{
    public function infonoid (){
        return 'member-info';
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
}
