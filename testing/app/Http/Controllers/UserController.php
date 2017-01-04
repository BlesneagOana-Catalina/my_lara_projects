<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
     protected function getAdd_user()
	 {
		 $data=array("msg"=>"This form is a User Add example",'success'=>'','path'=>'');
		 return view('user.add')->with($data);
	 }
	 protected function postAdd_user(AddUserRequest $request){
	 $messages = array('min' => 'Campul :attribute este format din prea putine litere!',
            'max' => 'Campul :attribute este format din prea multe litere!',
            'required' => 'Campul :attribute este necesar!',
			'integer'=>'Campul :attribute nu este un intreg!',
        );
        $validation = Validator::make(Input::all(), $request->rules(), $messages);
        if ($validation->fails()) {
            return Redirect::to('user.add')->withErrors($validation);
        } else {
			
			
		$imageName = time().'.'.$request->photo->getClientOriginalExtension();
				$request->photo->move(public_path('images'), $imageName);
		$user = \App\User::create(
                             array(
									'name'=>Input::get('name'),
									'email'=>Input::get('email'),
									'adress'=>Input::get('adress'),
									'photo'=>$imageName,
									'age'=>Input::get('age'),
									'gender'=>(Input::get('gender')=="male"?"M":"F"),
									'programmer'=>(Input::get('programmer')=='programmer'?true:false),
									'designer'=>(Input::get('designer')=='designer'?true:false),				
                ));
				$user->save(); 
				

			$data=array("msg"=>"This form is a User Add example",'success'=>'Image Uploaded successfully.','path'=>$imageName);
			return view('user.add')->with($data);
    		
             
	 }
	 }
	  protected function getAdministrate_user()
	 {
		 $yes_no=array(0=>'no',1=>'yes');
		 $gender=array('M'=>'Male','F'=>'Female');
		 $age=array(0=>"Under 18 years old",1=>"Between 19 and 30 years old",2=>"Above 30 years old");
		 $data=array("users"=> DB::table('users')->get(),"yes_no"=>$yes_no,"age"=>$age,'gender'=>$gender);
		 return view('user.show')->with($data);
	 }
		 
}
