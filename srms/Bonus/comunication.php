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
<button ng-click="update()" class="btn btn-danger">Update</button>
<table id="seminarSheet" class="table table-bordered ">
  <tr ng-repeat="data in marks">
    <td>{{data.roll}}</td>
    <td>{{data.name}}</td>
    <td><input type="text" ng-blur="update_data(data.name,data.roll,data.com1,data.com2,data.certificacte,data.total)" ng-model="data.com1"></td>
    <td><input type="text" ng-blur="update_data(data.name,data.roll,data.com1,data.com2,data.certificacte,data.total)" ng-model="data.com2"></td>
    <td><input type="text" ng-blur="update_data(data.name,data.roll,data.com1,data.com2,data.certificacte,data.total)" ng-model="data.certificacte"></td>
    <td><input type="text" ng-blur="update_data(data.name,data.roll,data.com1,data.com2,data.certificacte,data.total)" ng-model="data.total"></td>
  </tr>
</table>
<script>
var app = angular.module("myapp",[]);
app.controller("myCtrl",function($scope,$http){
  $scope.items = [];
  $http.post("getData.php?id=13").
  then(function(response) {
    $scope.marks = response.data.records;
  });
  $scope.update_data = function(name,roll,com1,com2,certificate,total){
      $scope.name = name;$scope.rollno = roll;$scope.com1 = com1;$scope.com2 = com2;$scope.certificate = certificate;$scope.total = total;
      $scope.data_send = {
        'name':$scope.name,
        'roll':$scope.rollno,
        'com1':$scope.com1,
        'com2':$scope.com2,
        'certificacte':$scope.certificate,
        'total':$scope.total
      };
      $scope.items.push($scope.data_send);
      $scope.count = $scope.items.length;
      $scope.string = JSON.stringify($scope.items);
    };
    $scope.update = function(){
      window.location.assign("update.php?id=13@"+$scope.string);
    };
});
</script>
