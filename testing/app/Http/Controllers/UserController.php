<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class UserController extends Controller
{
     protected function getAdd_user()
	 {
		 $data=array("msg"=>"This form is a User Add example");
		 return view('user.add')->with($data);
	 }
		 
}
