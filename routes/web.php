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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home','Admin\NewsController@add');

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
});

Route::group(['prefix' => 'admin'], function(){
     Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
     Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
     Route::get('news/create', 'Admin\NewsController@add');
     Route::post('news/create', 'Admin\NewsController@create'); # 追記
});


Route::group(['prefix => ‘admin', 'middleware' => 'auth'], function(){
     Route::get('profile/create','Admin\ProfileController@add');
     Route::get('profile/edit' , 'Admin\ProfileController@edit');
});


Route::group(['prefix' => 'admin'], function() {
     Route::post('profile/create', 'Admin\ProfileController@create'); 
});


Route::group(['prefix' => 'admin'], function() {
     Route::post('profile/edit', 'Admin\ProfileController@update'); 
});

