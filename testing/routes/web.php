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
 Route::get('add_user','UserController@getAdd_user')->name('add_user');
 Route::post('add_user','UserController@postAdd_user')->name("post_user");
 
 Route::get('administrate_user','UserController@getAdministrate_user')->name('administrate_user');
 
 Route::get('update_user','UserController@getUpdate_user')->name('update_user');
 Route::post('update_user','UserController@postUpdate_user')->name("post_update_user");
 
 Route::get('delete_user','UserController@getDelete_user')->name('delete_user');
 Route::post('delete_user','UserController@postDelete_user')->name("post_delete_user");
 