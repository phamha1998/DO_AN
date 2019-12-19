<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Http\Requests\AddProductRequest;

class ProductController extends Controller
{
    function getAddProduct () {
        return view('backend.product.addproduct');
            
    }
    function  PostAddProduct() {
        
            
    }
    function getEditProduct () {
        return view('backend.product.editproduct');
            
    }
    function getListProduct () {
        return view('backend.product.listproduct');
            
    }
}
