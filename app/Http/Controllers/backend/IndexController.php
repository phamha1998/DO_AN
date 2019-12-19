<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    function getIndex () {
        return view('backend.index');
    
    }
    function getComment () {
        return view('backend.comment');
    
    }
    function getEditComment () {
        return view('backend.editcomment');
    
    }
}
