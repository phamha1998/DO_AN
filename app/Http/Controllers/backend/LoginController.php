<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use DB;


class LoginController extends Controller
{
    function getLogin(){

        return view('backend.login');
    }
    function PostLogin(LoginRequest $r){
        
        $email=$r->email;
        $password=$r->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('admin');
        } else {
            return redirect()->back()->withErrors(['email'=>'Email hoặc mật khẩu không chính xác'])->withInput();
        }




    }
    function getLogout(){
        Auth::logout();
        return redirect('login');
    }
}
