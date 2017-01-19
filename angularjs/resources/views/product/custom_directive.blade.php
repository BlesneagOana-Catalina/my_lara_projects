<!DOCTYPE html>
<html lang="en" ng-app="myApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Angular JS custom directive</title>
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
		<script>
		var app=angular.module("myApp",[]);
		app.controller("firstCtrl", function($scope,$rootScope){
		$scope.cities=["London","New York","Paris"];
		$scope.city="London";
		$scope.the_other_city="";
		
		
		$scope.$on("transmit",function(event, args){
			the_other_city = args.city;
			});
			
		$scope.setOtherCity = function(city){
		$rootScope.$broadcast("transmit",{city: city});
		}
		
		
		
		$scope.getCountry = function(city){
			switch(city){
				case "London":
					return "UK";
				case "New York":
					return "USA";	
			}
		}
		});
		app.controller("secondCtrl", function($scope, $rootScope){
		$scope.cities=["London","New York","Paris"];
		$scope.city="London";
		$scope.the_other_city="";
		
		
		$scope.$on("transmit",function(event, args){
			the_other_city = args.city;
			});
			
		$scope.setOtherCity = function(city){
		$rootScope.$broadcast("transmit",{city: city});
		}
		
		$scope.getCountry = function(city){
			switch(city){
				case "London":
					return "UK";
				case "New York":
					return "USA";	
			}
		}
		});
		</script>
  </head>
    <body >
	<div ng-controller="firstCtrl">
       <div class="well">
	   <label>Select a City :</label>
	   <select ng-options="city for city in cities" ng-model="city"> 
	   </select>
	   </div>
	   <div class="well">
	   <p>The city is: @{{city}}</p>
	   <p>The country is @{{getCountry(city)||"Unknown"}}</p>
	   <p>The other city is: @{{the_other_city}}</p>
	   <p>The other country is @{{getCountry(the_other_city)||"Unknown"}}</p>
	   </div>
	   </div>
	   
	   
	   <div ng-controller="secondCtrl">
       <div class="well">
	   <label>Select a City :</label>
	   <select ng-options="city for city in cities" ng-model="city"> 
	   </select>
	   </div>
	   <div class="well">
	   <p>The city is: @{{city}}</p>
	   <p>The country is @{{getCountry(city)||"Unknown"}}</p>
	   <p>The other city is: @{{the_other_city}}</p>
	   <p>The other country is @{{getCountry(the_other_city)||"Unknown"}}</p>
	   </div>
	   </div>
	   
	   </body>
</html>