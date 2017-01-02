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