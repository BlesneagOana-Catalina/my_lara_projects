<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon; 
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    protected function addProduct(){
	$contents=null;
	$exists = \Storage::exists('file.json');
	if($exists)
	{
	$contents = collect(json_decode(Storage::get('file.json')));
	$data=array("contents"=>$contents);
    return view('add')->with($data);
	}else{
		$data=array("contents"=>collect(null));
		return view('product/add_product',$data);
	}
	}
	 protected function showProducts(){
	 // Storage::put('file.json',  json_encode(array(Input::all())));
	  return "success";
	}
 }
