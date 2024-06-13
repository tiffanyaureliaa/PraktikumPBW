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

Route::group(['middleware' => ['guest']], function() {
    Route::get("/", "PageController@login")->name('login');
    Route::post("/login", "AuthController@ceklogin");
});

Route::group(['middleware' => ['auth']], function() {
    Route::get("/user", "PageController@formedituser");
    Route::post("/updateuser", "PageController@updateuser");
    Route::get("/logout", "AuthController@ceklogout");
    Route::get("/home", "PageController@home");
    Route::get('/make_up', 'pageController@makeup');
    Route::get("/make_up/add-form", "PageController@formaddmakeup");
    Route::post("/save", "PageController@savemakeup");
    Route::get("/make_up/edit-form/{id}", "PageController@formeditmakeup");
    Route::put("/update/{id}", "PageController@updatemakeup");
    Route::get("/delete/{id}", "PageController@deletemakeup");
});

