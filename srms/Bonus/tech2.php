<!DOCTYPE html>
<html lang="en">
<head>
	  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script src="../js/angular.js"></script>
    <title>Document</title>
    <script src="../js/download.js">
    </script>
</head>
<body ng-app="myapp" ng-controller="myCtrl">
	<button type="button" class="btn btn-danger" style="float:right;" ng-click="update()">Update</button>
	{{items}}
<table id="seminarSheet" class="table table-bordered ">
  <tr ng-repeat="x in marks">
    <td>{{x.roll}}</td>
    <td>{{x.name}}</td>
    <td><input type="text" ng-blur="send_data(x.name,x.roll,x.category,x.marks,x.total)" ng-model="data.category"></td>
    <td><input type="text" ng-blur="send_data(x.name,x.roll,x.category,x.marks,x.total)" ng-model="data.marks"></td>
    <td><input type="text" ng-blur="send_data(x.name,x.roll,x.category,x.marks,x.total)" ng-model="data.total"></td>
  </tr>
</table>
<script>
var app = angular.module("myapp",[]);
app.controller("myCtrl",function($scope,$http){
	$scope.items = [];
  $http.post("getData.php?id=5").
  then(function(response) {
    $scope.marks = response.data.records;
  });
	$scope.send_data = function(name,roll,category,mark,total){
		$scope.name = name;$scope.roll = roll;$scope.category = category;$scope.mark = mark;$scope.total = total;
		$scope.data = {
			"roll":$scope.roll,
			"name":$scope.name,
			"category":$scope.category,
			"marks":$scope.marks,
			"total":$scope.total
		};
		$scope.items.push($scope.data);
		$scope.count = $scope.items.length;
		$scope.string = JSON.stringify($scope.data);
	};
	$scope.update = function(){
		window.location.assign("update.php?id=9@"+$scope.string);
	};
});
</script>
