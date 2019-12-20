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
Route::post('login', 'backend\LoginController@PostLogin');
Route::group(['prefix' => 'admin'], function () {
    //admin
    Route::get('', 'backend\IndexController@getIndex');
    //comment
    Route::get('comment', 'backend\IndexController@getComment');
    Route::get('editcomment', 'backend\IndexController@getEditComment');

    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'backend\CategoryController@getCategory');
        Route::post('', 'backend\CategoryController@PostCategory');
        Route::get('edit', 'backend\CategoryController@getEditCategory');



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
        Route::post('add', 'backend\ProductController@PostAddProduct');
        Route::get('edit', 'backend\ProductController@getEditProduct');
        //variant
        Route::get('add-variant', 'backend\ProductController@getAddVariant');
        Route::get('edit-variant', 'backend\ProductController@getEditVariant');
        //attr
        Route::get('detail-attr', 'backend\ProductController@getAttr');
        Route::get('edit-attr', 'backend\ProductController@getEditAttr');
        //edit-value
        Route::get('edit-value', 'backend\ProductController@getEditValue');
    });
});



