<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\product;
use Cart;

class CartController extends Controller
{
    function getCart () {
      $data['cart']=cart::content();
      $data['total']=cart::total(0,'','.');
      return view('frontend.cart.cart',$data);

    }
    function getAddCart (request $r) {
      $product=product::find($r->id_product);
      Cart::add([
        
          [ 'id' => $product->product_code,
            'name' =>$product->name,
            'qty' => $r->quantity,
            'price' => getprice($product, $r->attr),
            'weight' => 0,
            'options' => ['img' => $product->img,'attr'=>$r->attr]],
      ]);
     
      
      return redirect('product/cart');

    }
}
