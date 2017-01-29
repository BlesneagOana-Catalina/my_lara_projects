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
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
Route::get('/', function () {
	
	
$response = \GoogleMaps::load('geocoding')
                ->setParamByKey('address', 'Suceava')
                ->setParamByKey('components.administrative_area', 'suceava') 
                 ->get();
				 
				 

				 
 Storage::put('file.json',  $response);
				 
				 return view("welcome");
//var_dump( json_decode( $response ) );
	
	
	
});
Route::post('post_data', function (Request $request) {
	
	$id =$request->input('id');
	$data= collect(json_decode(Storage::get('file.json')));;
    return json_encode($data);
})->name('post_data');

