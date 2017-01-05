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
        <title>User Table</title>
    </head>
    <body>	


	<div class="col-sm-8 col-sm-offset-1">
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
  
   <thead>
      <tr>
         <th>Name</th>
		 <th>Email</th>
		 <th>Adress</th>
         <th>Photo</th>
         <th>Gender</th>
         <th>Age</th>
		 <th>Programmer</th>
		 <th>Web designer</th>
		 <th>Update</th>
		 <th>Delete</th>
      </tr>
   </thead>
   <tbody>
    @foreach ($users as $user)
	<tr>      
	  <td>{{ $user->name }}</td>
	  <td>{{ $user->email }}</td>
	  <td>
	  <a class="btn btn-default" role="button" data-toggle="collapse" href="#collapseAddress{{$user->id}}" aria-expanded="false" aria-controls="collapseAddress{{$user->id}}">
	 {{ wordwrap(str_limit($user->adress,10), 10, "\t")}}
	 </a>
<div class="collapse" id="collapseAddress{{$user->id}}">
  <div class="well">
    {{$user->adress}} 
  </div>
</div>
<script type='text/javascript'>
$( document ).ready(function() {
   $('.collapse').collapse();
});
</script>

	  
	  
	  
	  
	  
	  </td>
	  
	  <td>
	
<a class="btn btn-default" role="button" data-toggle="collapse" href="#collapseExample{{$user->id}}" aria-expanded="false" aria-controls="collapseExample{{$user->id}}">
  <img src="{{asset('images/'.$user->photo)}}" alt="image" class='img-circle' style="width: 2.0vw;height: 2.0vw;"> 
</a>
<div class="collapse" id="collapseExample{{$user->id}}">
  <div class="well">
    <img src="{{asset('images/'.$user->photo)}}" alt="image" class='img-circle' style="width: 7.0vw;height: 7.0vw;"> 
  </div>
</div>
<script type='text/javascript'>
$( document ).ready(function() {
   $('.collapse').collapse();
});
</script>


	 </td>
	  <td>{{ $gender[$user->gender]}}</td>
	  <td>{{ $age[$user->age] }}</td>
	  <td>{{ $yes_no[$user->programmer] }}</td>
	  <td>{{ $yes_no[$user->designer]}}</td>
	  <td>
	  <a href='update_user'  style="color: green; font-weight:bold;">Modify</a>
	  </td>
	  <td>
	  <!-- Button HTML (to Trigger Modal) -->
	  <a href="#myModal{{$user->id}}" style="color: red; font-weight:bold;" role="button" class="btn btn-large btn-default" data-toggle="modal">Delete</a>
	  <!-- Modal HTML -->
<div id="myModal{{$user->id}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
			
		{!!Form::open(['url' => 'delete_user', 'method' => 'post'])!!}	
		 {{ csrf_field() }}
                <p>Do you want to delete user {{$user->name}}?</p>
                <p class="text-warning"><small>The user will be permanently deleted.</small></p>
			<input type="hidden" name="user" value='{{$user->id}}'>           
		   </div>
            <div class="modal-footer">
			<div class="col-md-2">
                {{Form::submit('Delete',['class'=>'form-control btn-primary'])}}
			</div>
			<div class="col-md-1">			
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
			</div>
		{{Form::close()}}
        </div>
    </div>
</div>
	  
	  </td>
	</tr>   
   @endforeach

   </tbody>
   
</table>
	</div>
	</body>
</html>
