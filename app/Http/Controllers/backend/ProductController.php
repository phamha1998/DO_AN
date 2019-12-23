<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Http\Requests\{AddProductRequest,EditProductRequest};

class ProductController extends Controller
{
    function getAddProduct () {
        return view('backend.product.addproduct');

    }
    function  PostAddProduct(AddProductRequest $r) {


    }
    function  PostEditProduct(EditProductRequest $r) {


    }
    function getEditProduct () {
        return view('backend.product.editproduct');

    }
    function getListProduct () {
        return view('backend.product.listproduct');

    }
    //attr
    function getAttr () {
        return view('backend.attr.attr');

    }
    function getEditAttr () {
        return view('backend.attr.editattr');

    }
    //variant
    function getAddVariant () {
        return view('backend.variant.addvariant');

    }
    function getEditVariant () {
        return view('backend.variant.editvariant');

    }
    //edit-value
    function getEditValue () {
        return view('backend.variant.editvalue');

    }
}
