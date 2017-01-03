<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!--BOOTSTRAP-->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!--BOOTSTRAP-->
	<style>
	#myfile{
		width: 30.0vw;
	}
	.form-control:not(#myfile){
    -webkit-border-radius: 0.3vw;
    -moz-border-radius: 0.3vw ;
    border-radius: 0.3vw ;
    border-width: 0.3vw 0.0vw 0.3vw 0.0vw;
    padding: 0.3vw;
	margin-left: 0.0vw;
	width: 30.0vw;
	
	}
	label{
		color: #FFFF99;
		//lightyellow
		font:family: Arial;
		font-size: 1.2vw;
	}
	.w3-red{
		font:family: Arial;
		font-size: 1.0vw;
		font-weight: bold;
		border-style: solid;
		border-color: crimson;
			
	}
	</style>
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <title>User Add Form</title>
    </head>
    <body>
	<div class="col-sm-8 col-sm-offset-1 w3-container w3-red">
	<?php $messages = $errors->all('<p style="color:yellow">:message</p>');
	?>
	@foreach($messages as $m)
	{!!$m!!}
	@endforeach
	
{!!Form::open(['url' => 'add_user', 'enctype'=>"multipart/form-data", 'method' => 'post'])!!}	
	 {{ csrf_field() }}
	<div class="row">
	<div class="col-md-7 col-md-offset-4">
	<h3>{{$msg}}</h3>
	</div>
	</div>
	<br>
	<br>
	<!--I use my Application Service Provider directive-->
	<div class="row">
	<div class="col-md-3 col-md-offset-1">
	@label("nume:")
	</div>
	<div class="col-md-7">
	@input("name")
	</div>
	</div>
	<br>
	
	<div class="row">
	<div class="col-md-3 col-md-offset-1">
	@label("email:")
	</div>
	<div class="col-md-7">
	@email("email")
	</div>
	</div>
	<br>
	
    <div class="row">
	<div class="col-md-3 col-md-offset-1">
	@label("adress:")
	</div>
	<div class="col-md-7">
	@textarea("adress")
	</div>    
	</div>
	<br>
	
	<div class="row">
	<div class="col-md-3 col-md-offset-1">
	@label("photo:")
	</div>
	<div class="col-md-7">
	@file("photo")
	</div>
	</div>
	<br>

	<div class="row">
	<div class="col-md-3 col-md-offset-1">
	@label("age:")
	</div>
	<div class="col-md-7">
	{{ Form::select('age', ['Under 18', '19 to 30', 'Over 30'],null, ['class' => 'form-control']) }}
	</div>
	</div>
	
	<br>
	
	
	<div class="row">
	<div class="col-md-3 col-md-offset-1">
	@label("gender:")
	</div>
	<div class="col-md-7">
	male
	{{Form::radio('gender', 'male', true)}}
	female
	{{Form::radio('gender', 'female')}}
	</div>
	</div>
	<br>
	
	<div class="row">
	<div class="col-md-3 col-md-offset-1">
	@label("activities:")
	</div>
	<div class="col-md-7">
	programmer
	{{Form::checkbox('programmer', 'programmer', false)}}
	web designer
	{{Form::checkbox('designer', 'designer',true)}}
	</div>
	</div>
	<br>
	
	<div class="row">
	<div class="col-md-3 col-md-offset-4">
	{{Form::submit('Add user!',['class'=>'form-control btn-primary'])}}
	</div>
	</div>
	<br>
	
	
	{{Form::close()}}
	</div>
	</body>
</html>
