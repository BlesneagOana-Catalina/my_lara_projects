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
use Illuminate\Http\Request;
use Illuminate\Support\Collection ;
Route::get('/', function () {
    return view('product.custom_directive');
});
Route::post('post_data', function (Request $request) {
	
	$id =$request->input('id');
    $number=$request->input('number');
	$data=["Suceava","Iasi","Galati"];
    return $data;
})->name('post_data');