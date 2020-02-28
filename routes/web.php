<?php
//Cart

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cart'], function(){
   	    Route::get('add/{id}','CartController@add')->name('cart.add');
   	    Route::get('remove/{id}','CartController@remove')->name('cart.remove');
   	    Route::get('update/{id}','CartController@update')->name('cart.update');
   	    Route::get('clear','CartController@clear')->name('cart.clear');
   });
//

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
require_once 'backend.php';
require_once 'frontend.php';

Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
});

Route::resource("category", "Backend\CategoryController");
Route::resource("product", "Backend\ProductController");
Route::resource("user", "Backend\UserController");
Route::resource("slide", "Backend\SlideController");
Route::resource("checkout", "Backend\CheckoutController");
