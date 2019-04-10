<?php

//Backend Route
Route::prefix('admin')->group(function (){


    Route::middleware('auth:admin')->group(function (){

//Dashboard

        Route::get('/','DashboardController@index');

//products

        Route::resource('/products','ProductController');


//orders

        Route::resource('/orders','OrderController');

        Route::get('/confirm/{id}','OrderController@confirm')->name('orders.confirm');
        Route::get('/pending/{id}','OrderController@pending')->name('orders.pending');


//User
        Route::resource('/users','UsersController');


        Route::get('/logout','AdminUserController@logout');
    });



    Route::get('/login','AdminUserController@index');
    Route::post('/login','AdminUserController@store');

});

//Front Route

Route::get('/home','front\HomeController@index');
Route::get('/user/register','front\RegistrationController@index');
Route::post('/user/register','front\RegistrationController@store');

// User Login Route

Route::get('/user/login','Front\SessionsController@index');
Route::post('/user/login','Front\SessionsController@store');

// User logout

Route::get('/user/logout','Front\SessionsController@logout');

Route::get('/user/profile','Front\UserProfileController@index');
Route::get('/user/order/{id}','Front\UserProfileController@show');

//cart


Route::get('/cart','Front\CartController@index');
Route::post('/cart','Front\CartController@store')->name('cart');
Route::patch('/cart/update/{product}','Front\CartController@update')->name('cart.update');
Route::delete('/cart/remove/{product}','Front\CartController@destroy')->name('cart.destroy');
Route::post('/cart/saveLater/{product}','Front\CartController@saveLater')->name('cart.saveLater');

//Save For Later

Route::delete('/saveLater/destroy/{product}','Front\SaveLaterController@destroy')->name('saveLater.destroy');
Route::post('/cart/moveToCart/{product}','Front\SaveLaterController@moveToCart')->name('moveToCart');


//Check Out

Route::get('/checkout','Front\CheckoutController@index');
Route::post('/checkout','Front\CheckoutController@store')->name('checkout');



Route::get('/empty',function (){

    Cart::instance('default')->destroy();

});





