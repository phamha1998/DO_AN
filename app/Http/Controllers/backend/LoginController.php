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
        
        
    }
}
