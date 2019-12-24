<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    function getLogin(){

        return view('backend.login');
    }
    function PostLogin(LoginRequest $r){
        if($r->email=='admin@gmail.com'&&$r->password=='123456'){
            session()->put('email',$r->email);
             return redirect('admin');
        }else{
            return redirect('login')->withInput();
        }




    }
    function Logout(){
        session()->forget('email');
        return redirect('login');
    }
}
