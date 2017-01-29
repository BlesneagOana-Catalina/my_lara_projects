<!DOCTYPE html>
<html ng-app="myApp">
<head>
<!--JQUERY-THE FIRST LIBRARY!!!-->
		<script
  src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
  integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc="
  crossorigin="anonymous"></script>
  		<!--BOOTSTRAP-->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!--BOOTSTRAP-->
         
		 <!--AngularJS--->
		 <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>
		<!--AngularJS--->  
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfkZygd_yts6VBGtXKcd4krFxV-QHenBg"
    async defer></script>
<style>
#map-canvas{
	height: 400px;
	width: 700px;
	border: 2px solid red;
}
</style>
<script>

var myApp=angular.module("myApp",[]);
myApp.directive("myMaps",function($http){
	return{
		restrict:"E",
		template:"<div></div>",
		replace:true,
		link:function(scope, element, attrs){
			var locations=[];
			var myLatLng=new google.maps.LatLng(45.9432, 24.9668 );
			
			var parameter = JSON.stringify({'id':'1'});
			$http.post('{{route('post_data')}}', parameter)
                      .success(function(data, status, headers, config) {     
						alert("Success");
						alert(data);
						locations=data;
                  })
			.error(function(data, status, headers, config) {
        
			locations = [
      ['DESCRIPTION', 41.926979,12.517385, 3],
      ['DESCRIPTION', 41.914873,12.506486, 2],
      ['DESCRIPTION', 41.918574,12.507201, 1]
    ];
			});
		

 

    var map = new google.maps.Map(element, {
      zoom: 15,
      center: new google.maps.LatLng(41.923, 12.513), 
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    
var bounds = new google.maps.LatLngBounds();
var infowindow = new google.maps.InfoWindow();    

for (i = 0; i < locations.length; i++) {  
  var marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    map: map
  });

  //extend the bounds to include each marker's position
  bounds.extend(marker.position);

  google.maps.event.addListener(marker, 'click', (function(marker, i) {
    return function() {
      infowindow.setContent(locations[i][0]);
      infowindow.open(map, marker);
    }
  })(marker, i));
}

//now fit the map to the newly inclusive bounds
map.fitBounds(bounds);

//(optional) restore the zoom level after the map is done scaling
var listener = google.maps.event.addListener(map, "idle", function () {
    map.setZoom(4);
    google.maps.event.removeListener(listener);
});
			


		
				
			
		}
		
	};
});


   



</script>

</head>
<body>
<my-maps id='map-canvas'></my-maps>
</body>
</html>