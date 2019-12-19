<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Routing\RouteGroup;

//fontends
Route::get('', 'frontend\HomeController@getIndex');
//cart
Route::group(['prefix' => 'cart'], function () {
    Route::get('','frontend\CartController@getCart' );
});
//Product
Route::group(['prefix' => 'product'], function () {
    Route::get('detail','frontend\ProductController@getDetail' );
    Route::get('shop','frontend\ProductController@getShop' );
});
//checkout
Route::group(['prefix' => 'checkout'], function () {
    Route::get('','frontend\CheckoutController@getCheckout' );
    Route::get('complete','frontend\CheckoutController@getComplete' );
});
//About
Route::get('about','frontend\Homecontroller@getAbout' );
//Contact
Route::get('contact','frontend\Homecontroller@getContact' );



//backend
Route::get('login', 'backend\LoginController@getLogin');
Route::group(['prefix' => 'admin'], function () {
    //admin
    Route::get('', 'backend\IndexController@getIndex');
    //comment
    Route::get('comment', 'backend\IndexController@getComment');
    Route::get('editcomment', 'backend\IndexController@getEditComment');
    //Attr
    Route::group(['prefix' => 'attr'], function () {
        Route::get('', 'backend\AttrController@getAttr');
        Route::get('edit', 'backend\AttrController@getEditAttr');
        
    });
    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'backend\CategoryController@getCategory');
        Route::get('edit', 'backend\CategoryController@getEditCategory');
        Route::get('editvalue', 'backend\CategoryController@getEditValue');

        
    });
    //order
    Route::group(['prefix' => 'order'], function () {
        Route::get('', 'backend\OrderController@getOrder');
        Route::get('detail', 'backend\OrderController@getDetailOrder');
        Route::get('processed', 'backend\OrderController@getProcessed');
        
    });
    //product
    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'backend\ProductController@getListProduct');
        Route::get('add', 'backend\ProductController@getAddProduct');
        Route::get('edit', 'backend\ProductController@getEditProduct');
       
        
    });
    //variant
    Route::group(['prefix' => 'variant'], function () {
        Route::get('add', 'backend\VariantController@getAddVariant');
        Route::get('edit', 'backend\VariantController@getEditVariant');
        
    });

    
});



