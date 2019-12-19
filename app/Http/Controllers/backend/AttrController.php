<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttrController extends Controller
{
    function getAttr () {
        return view('backend.attr.attr');
            
    }
    function getEditAttr () {
        return view('backend.attr.editattr');
            
    }
}
