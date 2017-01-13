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
	
	protected function changeName(){
	 $exists = Storage::exists('file.json');
	if($exists)
	{
	 
	  $contents = collect(json_decode(Storage::get('file.json')));
	  $old_value="";
	  $new_value="";
	  $name=Input::get("pk");
	  $value=Input::get("productname".$name);
	  foreach($contents as $content)
	  {
		  if(!is_null(Input::get("productname{{ $content->product_name }}")))
		  {
			  $old_value=$content->product_name;
			  $new_value=Input::get("productname{{ $content->product_name }}");
		  
		  }
	  }
	
	 //$vals=$contents->push(Input::all());	
	 $selected=$contents->where("product_name",$name)->all();
	 foreach($selected as $select)
	 {
	 $select->product_name=$value;	
	 }
	  Storage::put('file.json',  json_encode($contents));
	  return "success";
	}
	}
	
	
 }
