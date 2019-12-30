<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Http\Requests\{AddProductRequest,EditProductRequest,AddAttrRequest,AddValueRequest};
 use App\Http\Requests\EditAttrRequest;
 use App\models\{product,attribute};

class ProductController extends Controller
{
    function getAddProduct () {
        $data['attrs']=attribute::all();
        return view('backend.product.addproduct',$data);

    }
    function  PostAddProduct(AddProductRequest $r) {


    }
    function  PostEditProduct(EditProductRequest $r) {


    }
    function getEditProduct () {
        return view('backend.product.editproduct');

    }
    function getListProduct () {
        
        $data['products']=product::paginate(3);

        return view('backend.product.listproduct',$data);

    }
    //attr
    function getAttr () {
        $data['attrs']=attribute::all();


        return view('backend.attr.attr',$data);

    }
    function getEditAttr ($id) {
        $data['attr']=attribute::find($id);

        return view('backend.attr.editattr',$data);


    }
    function PostEditAttr(EditAttrRequest $r, $id){
        
    }
    

    //attr-post
    function AddAttr(AddAttrRequest $r){
        

    }
    //variant
    function getAddVariant () {
        return view('backend.variant.addvariant');

    }
    function getEditVariant () {
        return view('backend.variant.editvariant');

    }
    
     //add -value
     function AddValue(AddValueRequest $r){


    }
    //edit-value
    function getEditValue () {
        return view('backend.variant.editvalue');

    }
   
}
