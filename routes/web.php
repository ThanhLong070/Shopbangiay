<?php

// Index

Route::get('/','HomeController@index')->name('home');

Route::get('/main','HomeController@main')->name('main');


Route::get('/about','HomeController@about')->name('about');

Route::get('/product-details','HomeController@product')->name('product-details');

Route::get('/checkout','HomeController@checkout')->name('checkout');

Route::get('/cart','HomeController@cart')->name('cart');

Route::get('/confirmation','HomeController@confirmation')->name('confirmation');

Route::get('/login-home','HomeController@login')->name('login-home'); 

Route::get('/tracking','HomeController@tracking')->name('tracking');

Route::get('/contact','HomeController@contact')->name('contact');

 Route::get('/{slug}.html','HomeController@view')->name('view');

// Index

//Backend

Route::get('/dashboard','BackendControllers@admin')->name('backend');
Route::get('/login','BackendControllers@login')->name('login');
Route::post('/login','BackendControllers@post_login')->name('admin');
Route::get('/logout','BackendControllers@logout')->name('logout');
Route::get('/order','BackendControllers@order')->name('order');



//Route::resource('product', 'ProductController');
//Route::resource('category', 'CategoryController');

Route::resources([
    'category' => 'CategoryController',
    'product' => 'ProductController',
    'user' => 'UserController',
    'checkout' =>'CheckoutController'
]);

//Backend

//Cart
   Route::group(['prefix' => 'cart'], function(){
   	    Route::get('add/{id}','CartController@add')->name('cart.add');
   	    Route::get('remove/{id}','CartController@remove')->name('cart.remove');
   	    Route::get('update/{id}','CartController@update')->name('cart.update');
   	    Route::get('clear','CartController@clear')->name('cart.clear');
   });
//




