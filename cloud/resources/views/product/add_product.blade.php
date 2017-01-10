<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		
		<!--JQUERY-THE FIRST LIBRARY!!!-->
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<!--JQUERY-->
		
		<!--BOOTSTRAP-->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!--BOOTSTRAP-->
		
        <title>Add product</title>
    </head>
    <body>
	<div class="row">
	<div class="col-md-7 col-md-offset-4">

	</div>
	</div>
	<br>
	<br>
	
	<div class="row">
	<div class="col-md-3 col-md-offset-1">
	Product name:
	</div>
	<div class="col-md-7">
	{{ Form::input('text', 'product_name', null, ['class' => 'form-control','id'=>'product_name']) }}
	</div>
	</div>
	<br>
	
	<div class="row">
	<div class="col-md-3 col-md-offset-1">
	Quantity in stock:
	</div>
	<div class="col-md-7">
	{{ Form::input('text', 'quantity_in_stock', null, ['class' => 'form-control', 'id'=>'quantity_in_stock']) }}
	</div>
	</div>
	<br>
	

	
	<div class="row">
	<div class="col-md-3 col-md-offset-1">
	Product price:
	</div>
	<div class="col-md-7">
	{{ Form::input('text', 'product_price', null, ['class' => 'form-control','id'=>'product_price']) }}
	</div>
	</div>
	<br>
	

	<div class="row">
	<div class="col-md-3 col-md-offset-1"
	</div>
	<div class="col-md-7">
	{{ Form::input('hidden', 'date', Carbon\Carbon::now(), ['class' => 'form-control','id'=>'date']) }}
	</div>
	</div>
	<br>
	
	
	<div class="row">
	<div class="col-md-3 col-md-offset-4">
	
	 <input type="button" class="btn-primary" value="send data" id="add" />
	 
	<script type="text/javascript">
	
	$(document).ready(function() {

    $('#add').click(function () {
	window.alert("click");
   var product_name = $('#product_name').val();
   var quantity_in_stock = $('#quantity_in_stock').val();
   var product_price = $('#product_price').val();
   var date = $('#date').val();
   alert(product_name);
           
   $.ajax({
         type: "POST",
         url: "{{route('post_product')}}",
         dataType: "json",
		 data: {
            product_name: product_name,
			quantity_in_stock: quantity_in_stock,
			product_price: product_price,
			date: date
         },
         success: function(response){
			alert(response);         
		 },
		 error: function(xhr){
        alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
			}
         });
	return false;
	  });
	});
	</script>
	</div>
	</div>
	</div>
	<br>
  	
	</div>
	</body>
</html>
