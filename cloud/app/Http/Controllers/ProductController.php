<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon; 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected function addProduct(){
	$contents=null;
	$exists = Storage::exists('file.json');
	if($exists)
	{
	$contents = collect(json_decode(Storage::get('file.json')));
	$data=array("contents"=>$contents);
    return view('product/add_product')->with($data);
	}else{
		$data=array("contents"=>collect(null));
		return view('product/add_product',$data);
	}
	}
	 protected function showProducts(){
	 $exists = Storage::exists('file.json');
	if($exists)
	{
	 $contents = collect(json_decode(Storage::get('file.json')));
	 $vals=$contents->push(Input::all());	
	}
	else{
		$vals=array(Input::all());
	}
	 Storage::put('file.json',  json_encode($vals));
	  return "success";
	}
 }
