<?php

use Illuminate\Support\Facades\Route;

Route::get('/', "HomeController@showIndex");
Route::get('/register', "UserController@showRegister");
Route::post('/make-register', "UserController@makeRegister");
Route::get('/login', 'UserController@showLogin')->name('login');
Route::post('/make-login', "UserController@makeLogin");
Route::get('/category/{id}', "CategoryController@showCategory");
Route::get('/product/{id}', "ProductController@showProduct");
Route::get('/search', "ProductController@search");


Route::middleware('auth')->group(function() {
    Route::post('/addToCart', "ProductController@addToCart");
    Route::get('/checkout', 'OrderController@showCheckout');

    Route::get('/make-order', 'OrderController@makeOrder');
});

// dashboard/home
// dashboard/users
// dashboard/orders




Route::middleware('AdminAuth')->group(function() {
    Route::prefix('dashboard')->group(function() {
        Route::get('/login', 'Dashboard\AuthController@showLogin')->withoutMiddleware('AdminAuth');
        Route::post('/make-login', 'Dashboard\AuthController@makeLogin')->withoutMiddleware('AdminAuth');
        Route::get('/home', "Dashboard\HomeController@showHome");
        Route::get('/users', "Dashboard\UserController@showUsers");
        Route::get('/user/{id}', "Dashboard\UserController@showOneUser");
        Route::get('/delete-user/{id}', "Dashboard\UserController@deleteUser");
        Route::get('/edit-user/{id}', "Dashboard\UserController@showEditUser");
        Route::post('/make-edit-user/{id}', "Dashboard\UserController@makeEditUser");
    });
});

