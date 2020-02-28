<?php


use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => 'CheckAdmin'], function () {

//  Route::get('/','BackendControllers@admin')->name('backend');
//  Route::get('/order','BackendControllers@order')->name('order');
//  Route::get('/order_items','BackendControllers@order_items')->name('order_items');
  Route::get('/option','OptionController@index')->name('option.index');
  Route::post('/option','OptionController@update')->name('option.update');
  Route::get('/', 'OrderController@report')->name('backend');
  // Route::get('/login','BackendControllers@login')->name('login');
  // Route::post('/login','BackendControllers@post_login')->name('admin');
  // Route::get('/logout','BackendControllers@logout')->name('logout');
//  Route::resources([
//    'category' => 'CategoryController',
//    'product' => 'ProductController',
//    'user' => 'UserController',
//    'slide' => 'SlideController',
//  ]);

    Route::post('product-ajax', 'ProductController@ajax')->name('product.ajax');

    Route::post('order-ajax', 'OrderController@ajax')->name('order.ajax');
    Route::get('order', 'OrderController@getIndex')->name('order.index');
    Route::get('order/edit/{id}', 'OrderController@edit')->name('order.edit');
    Route::post('order/update/{id}', 'OrderController@update')->name('order.update');
    Route::post('order/report', 'OrderController@dataReport')->name('filterReport');
    Route::get('order/chua-xu-ly', 'OrderController@chuaXuLy')->name('chuaXuLy');

});
 Route::resources([
    'checkout' =>'Backend\CheckoutController',
  ]);