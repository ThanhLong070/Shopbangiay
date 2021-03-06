<?php
use Illuminate\Support\Facades\Route;

Route::get('/','Frontend\HomeController@index')->name('home');

Route::get('/main','Frontend\HomeController@main')->name('main');


Route::get('/about','Frontend\HomeController@about')->name('about');

Route::get('/product-details','HomeController@product')->name('product-details');

 Route::get('/checkout','Frontend\HomeController@checkout')->name('checkout');

Route::get('/cart','Frontend\HomeController@cart')->name('cart');

Route::get('/confirmation','Frontend\HomeController@confirmation')->name('confirmation');

Route::get('/login-home','Frontend\HomeController@login')->name('login-home'); 

Route::get('/tracking','Frontend\HomeController@tracking')->name('tracking');

// Route::get('/contact','Frontend\HomeController@contact')->name('contact');

Route::get('/{slug}.php','Frontend\HomeController@view')->name('view');

Route::get('/contact', 'Frontend\HomeController@getContactUs')->name('getContactUs');

Route::post('/contact', 'Frontend\HomeController@postContactUS')->name('postContactUS');

Route::get('/thuong-hieu/{id}', 'Frontend\HomeController@getBrand')->name('getBrand');

Route::get('/loc-gia', 'Frontend\HomeController@filterPrice')->name('filter');

Route::get('/tim-kiem', 'Frontend\HomeController@getSearch')->name('search');