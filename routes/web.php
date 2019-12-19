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
    Route::get('','frontend\Controller@getCart' );

});
//produtc
Route::group(['prefix' => 'product'], function () {
    Route::get('detail','frontend\Controller@getDetail' );
    Route::get('shop','frontend\Controller@getShop' );

});
//checkout
Route::group(['prefix' => 'checkout'], function () {
    Route::get('','frontend\Controller@getCheckout' );
    Route::get('complete','frontend\Controller@getComplete' );

});

//abaut
Route::get('about','frontend\Controller@getAbout' );
//contact
Route::get('contact','frontend\Controller@getContact' );




