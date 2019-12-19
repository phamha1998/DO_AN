<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Homecontroller extends Controller
{
    function getIndex () {
       return view('frontend.index');

    }
    function getAbout () {
        echo "Đây là trang Thoogn tin trang web";

    }
    function  getContact() {
        echo "Đây là trang liên hệ";

    }

}
