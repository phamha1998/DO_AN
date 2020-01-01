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
Route::get('login', 'backend\LoginController@getLogin')->middleware('CheckLogout');
Route::post('login', 'backend\LoginController@PostLogin');
Route::get('logout','backend\LoginController@getLogout');


Route::group(['prefix' => 'admin','middleware'=>'CheckLogin'], function () {
    //admin
    Route::get('', 'backend\IndexController@getIndex');
    //user
   Route::group(['prefix' => 'user'], function () {
    Route::get('', 'backend\UserController@getListUser');
    Route::get('add', 'backend\UserController@getAddUser');
    Route::post('add', 'backend\UserController@PostAddUser');
    Route::get('edit/{id}', 'backend\UserController@getEditUser');
    Route::post('edit/{idUser}', 'backend\UserController@PostEditUser');

   });

    //comment

    Route::get('comment', 'backend\IndexController@getComment');
    Route::get('editcomment', 'backend\IndexController@getEditComment');

    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'backend\CategoryController@getCategory');
        Route::post('', 'backend\CategoryController@PostCategory');
        Route::get('edit/{id}', 'backend\CategoryController@getEditCategory');
        Route::post('edit/{id}', 'backend\CategoryController@PostEditCategory');
        Route::get('del/{id}', 'backend\CategoryController@DelCategory');



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
        Route::get('edit/{id}', 'backend\ProductController@getEditProduct');
        Route::get('del/{id}', 'backend\ProductController@DelProduct');
        Route::post('edit/{id}', 'backend\ProductController@PostEditProduct');
        //variant
        Route::get('add-variant/{id}', 'backend\ProductController@getAddVariant');
        Route::post('add-variant/{id}', 'backend\ProductController@PostAddVariant');
        Route::get('edit-variant/{id}', 'backend\ProductController@getEditVariant');
        Route::post('edit-variant/{id}', 'backend\ProductController@PostEditVariant');
        Route::get('del-variant/{id}', 'backend\ProductController@DelVariant');
        //attr
        Route::get('detail-attr', 'backend\ProductController@getAttr');
        Route::post('add-attr', 'backend\ProductController@AddAttr');

        
        Route::get('edit-attr/{id}', 'backend\ProductController@getEditAttr');
        Route::post('edit-attr/{id}', 'backend\ProductController@PostEditAttr');
        Route::get('del-attr/{id}', 'backend\ProductController@DelAttr');
        
        
        //edit-value
        Route::post('add-value', 'backend\ProductController@AddValue');
        Route::get('edit-value/{id}', 'backend\ProductController@getEditValue');
        Route::get('del-value/{id}', 'backend\ProductController@DelValue');
        Route::post('edit-value/{id}', 'backend\ProductController@PostEditValue');
       
    });
});



