<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;

class UserController extends Controller
{
    function getListUser(){
        return view('backend.user.listuser');
    }
    function getAddUser(){
        return view('backend.user.adduser');
    }
    function PostAddUser(AddUserRequest $r){


    }
    function PostEditUser(EditUserRequest $r){


    }
    function getEditUser(){
        return view('backend.user.edituser');
    }
}
