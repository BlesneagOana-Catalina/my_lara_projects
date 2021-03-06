<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
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
		
		
		
		
		
		
		<!--BOOTSTRAP DATA TABLES-->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.1.3/css/autoFill.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js">
		<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.0/css/rowReorder.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.foundation.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.jqueryui.min.css">
		
		
		<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/autofill/2.1.3/js/dataTables.autoFill.min.js"></script>
		<script src="ttps://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
		<script src="https://cdn.datatables.net/colreorder/1.3.2/js/dataTables.colReorder.min.js"></script>
		<script src="https://cdn.datatables.net/rowreorder/1.2.0/js/dataTables.rowReorder.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.13/js/dataTables.foundation.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.13/js/dataTables.jqueryui.min.js"></script>
		<script src="//code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
		
		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css">
		<link rel="stylesheet" href="../../extensions/Editor/css/editor.dataTables.min.css">
		
		
		
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
	<script src="../../extensions/Editor/js/dataTables.editor.min.js"></script>
	
		
		
		<!--BOOTSTRAP DATA TABLES-->
		
	
		
		
		<script type="text/javascript">
		(function( factory ){
    if ( typeof define === 'function' && define.amd ) {
        // AMD
        define( ['jquery', 'datatables.net'], function ( $ ) {
            return factory( $, window, document );
        } );
    }
    else if ( typeof exports === 'object' ) {
        // CommonJS
        module.exports = function (root, $) {
            if ( ! root ) {
                root = window;
            }
 
            if ( ! $ || ! $.fn.dataTable ) {
                $ = require('datatables.net')(root, $).$;
            }
 
            return factory( $, root, root.document );
        };
    }
    else {
        // Browser
        factory( jQuery, window, document );
    }
}(function( $, window, document, undefined ) {
'use strict';
 
// Unique value allowing multiple absolute ordering use cases on a single page.
var _unique = 0;
 
// Function to encapsulate code that is common to both the string and number
// ordering plug-ins.
var _setup = function ( values ) {
    if ( ! $.isArray( values ) ) {
        values = [ values ];
    }
 
    var o = {
        name: 'absoluteOrder'+(_unique++),
        alwaysTop: {},
        alwaysBottom: {}
    };
 
    // In order to provide performance, the symbols that are to be looked for
    // are stored as parameter keys in an object, allowing O(1) lookup, rather
    // than O(n) if it were in an array.
    for ( var i=0, ien=values.length ; i<ien ; i++ ) {
        var conf = values[i];
 
        if ( typeof conf === 'string' ) {
            o.alwaysTop[ conf ] = true;
        }
        else if ( conf.position === undefined || conf.position === 'top' ) {
            o.alwaysTop[ conf.value ] = true;
        }
        else {
            o.alwaysBottom[ conf.value ] = true;
        }
    }
 
    // Ascending ordering method
    o.asc = function ( a, b, isNumber ) {
        if ( o.alwaysTop[ a ] || o.alwaysBottom[ b ] ) {
            return -1;
        }
        else if ( o.alwaysBottom[ a ] || o.alwaysTop[ b ] ) {
            return 1;
        }
 
        if ( isNumber ) {
            // Cast as a number if required
            if ( typeof a === 'string' ) {
                a = a.replace(/[^\d\-\.]/g) * 1;
            }
            if ( typeof b === 'string' ) {
                b = b.replace(/[^\d\-\.]/g) * 1;
            }
        }
 
        return ((a < b) ? -1 : ((a > b) ? 1 : 0));
    };
 
    // Descending ordering method
    o.desc = function ( a, b, isNumber ) {
        if ( o.alwaysTop[ a ] || o.alwaysBottom[ b ] ) {
            return -1;
        }
        else if ( o.alwaysBottom[ a ] || o.alwaysTop[ b ] ) {
            return 1;
        }
 
        if ( isNumber ) {
            if ( typeof a === 'string' ) {
                a = a.replace(/[^\d\-\.]/g) * 1;
            }
            if ( typeof b === 'string' ) {
                b = b.replace(/[^\d\-\.]/g) * 1;
            }
        }
 
        return ((a < b) ? 1 : ((a > b) ? -1 : 0));
    };
 
    return o;
};
 
// String based ordering
$.fn.dataTable.absoluteOrder = function ( values ) {
    var conf = _setup( values );
 
    $.fn.dataTable.ext.type.order[ conf.name+'-asc' ] = conf.asc;
    $.fn.dataTable.ext.type.order[ conf.name+'-desc' ] = conf.desc;
 
    // Return the name of the sorting plug-in that was created so it can be used
    // with the `columns.type` parameter. There is no auto-detection here.
    return conf.name;
};
 
// Number based ordering - strips out everything but the number information
$.fn.dataTable.absoluteOrderNumber = function ( values ) {
    var conf = _setup( values );
 
    $.fn.dataTable.ext.type.order[ conf.name+'-asc' ] = function ( a, b ) {
        return conf.asc( a, b, true );
    };
    $.fn.dataTable.ext.type.order[ conf.name+'-desc' ] = function ( a, b ) {
        return conf.asc( a, b, true );
    };
 
    return conf.name;
};
 
 
}));
 
 
 
$(document).ready(function() {
    var type = $.fn.dataTable.absoluteOrder( [
        { value: 'Bruno Nash', always: 'top' }
    ] );
 
    var type2 = $.fn.dataTable.absoluteOrderNumber( [
        { value: 'N/A', always: 'top' }
    ] );
 
    $('#example').DataTable( {
        columnDefs: [
            { type: type, targets: 0 },
            { type: type2, targets: 3 }
        ]
    } );
} );
		</script>
	
	
		
		
		
		
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jqueryui-editable/css/jqueryui-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jqueryui-editable/js/jqueryui-editable.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>		
 <script src="assets/jquery/jquery-1.9.1.min.js"></script>  
        <script src="assets/mockjax/jquery.mockjax.js"></script>
        
        <!-- momentjs --> 
        <script src="assets/momentjs/moment.min.js"></script> 
        
        <!-- select2 --> 
        <link href="assets/select2/select2.css" rel="stylesheet">
        <script src="assets/select2/select2.js"></script>         

        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]--> 
        
         
        <!-- bootstrap 3 -->
        <link href="assets/bootstrap300/css/bootstrap.css" rel="stylesheet">
        <script src="assets/bootstrap300/js/bootstrap.js"></script>

        <!-- bootstrap-datetimepicker -->
        <link href="assets/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet">
        <script src="assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>        
        
        <!-- x-editable (bootstrap 3) -->
        <link href="assets/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
        <script src="assets/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>

        <!-- select2 bootstrap -->
        <link href="assets/select2/select2-bootstrap.css" rel="stylesheet">
       
        <!-- typeaheadjs -->
        <link href="assets/x-editable/inputs-ext/typeaheadjs/lib/typeahead.js-bootstrap.css" rel="stylesheet">
        <script src="assets/x-editable/inputs-ext/typeaheadjs/lib/typeahead.js"></script>         
        <script src="assets/x-editable/inputs-ext/typeaheadjs/typeaheadjs.js"></script>         
        
        <!-- wysihtml5 -->
        <link href="assets/x-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.3/bootstrap-wysihtml5-0.0.3.css" rel="stylesheet">  
        <script src="assets/x-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.3/wysihtml5-0.3.0.min.js"></script>  
        <script src="assets/x-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.3/bootstrap-wysihtml5-0.0.3.min.js"></script>
        <script src="assets/x-editable/inputs-ext/wysihtml5/wysihtml5-0.0.3.js"></script>
        
        <link href="assets/demo-bs3.css" rel="stylesheet">
        
        <style type="text/css">       
            #comments:hover {
                background-color: #FFFFC0;
                cursor: text; 
            }
        </style>
        
        <script>
        var f = 'bootstrap3';
        </script>

        
        <!-- address input -->
        <link href="assets/x-editable/inputs-ext/address/address.css" rel="stylesheet">
        <script src="assets/x-editable/inputs-ext/address/address.js"></script> 
        
        <script>
            var c = 'inline';
            $.fn.editable.defaults.mode = 'inline';
			$.fn.editable.defaults.params = function (params) {
			params._token = $('meta[name="csrf-token"]').attr('content');
			return params;
			};
			$.fn.editable.defaults.success = function(data) { window.alert(data); }
			$.fn.editable.defaults.error = function(xhr) {
	var info='Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText;	
	$("#error").html(info); }
            $(function(){
                $('#f').val(f);
                $('#c').val(c);
                
                $('#frm').submit(function(){
                var f = $('#f').val(); 
                 $(this).attr('action', 'demo-bs3.html');                        
                    
                });
            });
        </script>        
                
        <style type="text/css">
            body {
                padding-top: 50px;
                padding-bottom: 30px;
            }
            
            table.table > tbody > tr > td {
                height: 30px;
                vertical-align: middle;
            }
        </style>         
		
		
		
		
		
		
		
		
		
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
	window.alert("Wait...");
   var product_name = $('#product_name').val();
   var quantity_in_stock = $('#quantity_in_stock').val();
   var product_price = $('#product_price').val();
   var date = $('#date').val();
  
           
   $.ajax({
         type: "POST",
         url: "{{route('post_product')}}",
         dataType: "json",
		 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		 data: {
            product_name: product_name,
			quantity_in_stock: quantity_in_stock,
			product_price: product_price,
			date: date
         },
 		 error: function(xhr){
		var info='Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText;
       // $('#error').html(info);
	   location.reload();
			}
         });
	return false;
	  });
	});
	</script>
	</div>
	</div>
	
	<div class="row">
	<div class="col-md-3 col-md-offset-1"
	</div>
	<div class="col-md-7">
	<div id="error">
	</div>
	</div>
	</div>
	</div>
	
	
	</div>
	<br>
  	
	</div>
	
	
	
	
	
	<div class="col-sm-8 col-sm-offset-1">
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
  
   <thead>
      <tr>
         <th>Product name</th>
		 <th>Product qty</th>
		 <th>Product price</th>
		 <th>Date added</th>
		 <th>Total value number</th>
      </tr>
   </thead>
   <tbody>
   
  
    @foreach ($contents as $content)
	<tr>
	 <td width="25%">	 
	 <a href="#" id="productname{{ $content->product_name }}" data-value=''>{{ $content->product_name }}</a>
	 <script type="text/javascript">
	 $('#productname{{ $content->product_name }}').editable({
                           type:  'text',
                           pk:    '{{$content->product_name}}',
                           name:  'productname{{ $content->product_name }}',
						   url:   '{{route("modify_name")}}',  
                           title: 'Enter product name',
						    ajaxOptions: {
							type: 'post'
							}   
						   
	  });
						
						
						
//	$('#save-btn').click();					
	 </script>
	 </td>  
	  <td>{{ $content->quantity_in_stock }}</td>
	  <td>{{ $content->product_price }}</td>
	  <td> 
	 {{ $content->date }}
	  </td>
	  <td>{{ ($content->product_price)*( $content->quantity_in_stock )}}</td>
	</tr>   
   @endforeach
   </tbody>
	</table>
	<div style="font-weight: bold;">
	Total:{{$total}}
	</div>
	
	<div style="float: left; width: 50%">
                <h3>Console <small>(all ajax requests here are emulated)</small></h3> 
                <div><textarea id="console" class="form-control" rows="8" style="width: 70%" autocomplete="off"></textarea></div>
            </div>
	</div>
	 

	
	</body>
</html>
