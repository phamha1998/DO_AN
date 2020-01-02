<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\{product,category, attribute,values};

class ProductController extends Controller
{
    function getDetail ($id) {
        $data['product']=product::find($id);
        $data['product_new']=product::orderby('created_at',"DESC")->where('img','<>','no-img.jpg')->take(4)->get();
        return view('frontend.product.detail',$data);

    }
   
    function getComplete () {
        return view('frontend.product.complete');

    }

    function ListProduct( request $r){
        if($r->category)
        {
            $data['products']=category::find($r->category)->product()->where('img','<>','no-img.jpg')->paginate(3);
        }else if($r->start)
        {
            $data['products']=product::whereBetween('price',[$r->start,$r->end])->where('img','<>','no-img.jpg')->paginate(3);
        }else if($r->value)
        {
            $data['products']=values::find($r->value)->product()->where('img','<>','no-img.jpg')->paginate(3);
        }
        else{
            $data['products']=product::where('img','<>','no-img.jpg')->paginate(3);

        }
        $data['category']=category::all();
        $data['attrs']=attribute::all();
       
        return view('frontend.product.shop',$data);

    }
}
