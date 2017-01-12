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
	$total=0;
	foreach($contents as $content)
	{
		$total+=($content->product_price)*( $content->quantity_in_stock );
	}
	$data=array("total"=>$total,"contents"=>$contents->sortBy("product_name"));
    return view('product/add_product')->with($data);
	}else{
		$data=array("total"=>null,"contents"=>collect(null));
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
	
	protected function changeName(Request $r){
	 $exists = Storage::exists('file.json');
	if($exists)
	{
	 $name=$r->pk;
	 $contents = collect(json_decode(Storage::get('file.json')));
	 //$vals=$contents->push(Input::all());	
	 $selected=$contents->where("name",$name)->first();
	 $selected->product_name=Input::get();	
	  Storage::put('file.json',  json_encode($contents));
	  return "success";
	}
	}
	
	
 }
