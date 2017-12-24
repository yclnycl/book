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
Route::group(['namespace'=>'Home'], function () {
    Route::get('/', "IndexController@Index");
    Route::get('book/buy/{id}', "IndexController@buyBook");
    Route::get('order', "IndexController@order");
    Route::post('book/buy', "IndexController@postBookBuy");
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');






Route::group(['prefix' => 'manage', 'namespace'=>'Manage'], function () {
    Route::get('/', "LoginController@Index");
    Route::post('login/post', "LoginController@loginPost");
    Route::get('index', "IndexController@Index");
    Route::get('book/add/{id?}', "IndexController@bookAdd");
    Route::post('book/add', "IndexController@postBookAdd");
    Route::post('book/del', "IndexController@postBookDel");
    Route::get('order', "IndexController@order");
});