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
	<button ng-click="update()" class="btn btn-danger" style="float:right;">Update</button>
<table id="seminarSheet" class="table table-bordered ">
  <tr>
  <td>rollno</td>
  <td>name</td>
  <td>Certificate category</td>
  <td>Marks</td>
  <td>Total marks on <br> Certificate</td>
  </tr>
  <tr ng-repeat="data in marks">
    <td>{{data.roll}}</td>
    <td>{{data.name}}</td>
    <td><input type="text" ng-blur="sendData(data.name,data.roll,data.category,data.marks,data.total)" ng-model="data.category"></td>
    <td><input type="text" ng-blur="sendData(data.name,data.roll,data.category,data.marks,data.total)" ng-model="data.marks"></td>
    <td><input type="text" ng-blur="sendData(data.name,data.roll,data.category,data.marks,data.total)" ng-model="data.total"></td>
  </tr>
</table>
<script>
var app = angular.module("myapp",[]);
app.controller("myCtrl",function($scope,$http){
	$scope.items = [];
  $http.post("getData.php?id=3").
  then(function(response) {
    $scope.marks = response.data.records;
  });
	$scope.sendData = function(name,roll,category,marks,total){
	$scope.name = name;$scope.roll = roll;$scope.category = category;$scope.mark = marks;$scope.total = total;
	$scope.dataSend = {
		"name":$scope.name,
		"roll":$scope.roll,
		"category":$scope.category,
		"marks":$scope.mark,
		"total":$scope.total
	};
		$scope.items.push($scope.dataSend);
		$scope.count = $scope.items.length;
		$scope.string = JSON.stringify($scope.items);
	};
	$scope.update = function(){
		window.location.assign("update.php?id=8@"+$scope.string);
	}
});
</script>
