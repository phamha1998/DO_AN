<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\product;


class Homecontroller extends Controller
{
    function getIndex () {
        $data['product_feat']=product::where('featured',1)->where('img','<>','no-img.jpg')->take(4)->get();
        $data['product_new']=product::orderby('created_at',"DESC")->where('img','<>','no-img.jpg')->take(8)->get();

       return view('frontend.index',$data);

    }
    function getAbout () {
        return view('frontend.about');

    }
    function  getContact() {
        return view('frontend.contact');

    }

}
