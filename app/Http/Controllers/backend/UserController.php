<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{AddUserRequest,EditUserRequest};
use App\User;

class UserController extends Controller
{
    function getListUser(){
        $data['users']=user::paginate(10);



        return view('backend.user.listuser',$data);
    }
    function getAddUser(){
        return view('backend.user.adduser');
    }
    function PostAddUser(AddUserRequest $r){
        $user= new User;
        $user->email= $r->email;
        $user->full= $r->full;
        $user->password= bcrypt($r->password);
        $user->address= $r->address;
        $user->phone= $r->phone;
        $user->level= $r->level;
        $user->save();
        return redirect('/admin/user')->with('thongbao','Đã thêm người dùng thành công');

    }
    function PostEditUser(EditUserRequest $r,$idUser){
        $user= User::find($idUser);
        $user->email= $r->email;
        $user->full= $r->full;
        $user->password= bcrypt($r->password);
        $user->address= $r->address;
        $user->phone= $r->phone;
        $user->level= $r->level;
        $user->save();
        return redirect('/admin/user')->with('thongbao','Đã Sửa người dùng thành công');





    }
    function getEditUser($id){
        $data['users']= user::find($id);

        return view('backend.user.edituser',$data);
    }
}
