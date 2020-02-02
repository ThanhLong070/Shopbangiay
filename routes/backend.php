<?php 

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => 'CheckAdmin'], function () {

  Route::get('/','BackendControllers@admin')->name('backend');
  Route::get('/order','BackendControllers@order')->name('order');
  Route::get('/order_items','BackendControllers@order_items')->name('order_items');
  // Route::get('/login','BackendControllers@login')->name('login');
  // Route::post('/login','BackendControllers@post_login')->name('admin');
  // Route::get('/logout','BackendControllers@logout')->name('logout');
  Route::resources([
    'category' => 'CategoryController',
    'product' => 'ProductController',
    'user' => 'UserController',
  ]);
});
 Route::resources([
    'checkout' =>'Backend\CheckoutController',
  ]);