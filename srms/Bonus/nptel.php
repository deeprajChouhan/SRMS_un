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
<button ng-click="updateData()" class="btn btn-danger" style="float:right;">Update</button>
<table id="seminarSheet" class="table table-bordered ">
  <tr ng-repeat="x in marks">
    <td>{{x.roll}}</td>
    <td>{{x.name}}</td>
    <td><input ng-blur="update(x.roll,x.name,x.attendence,x.total)" ng-model="x.attendence"></td>
    <td><input ng-blur="update(x.roll,x.name,x.attendence,x.total)" ng-model="x.total"></td>
  </tr>
</table>
<script>
var app = angular.module("myapp",[]);
app.controller("myCtrl",function($scope,$http){
  $scope.items = [];
  $http.post("getData.php?id=7").
  then(function(response) {
    $scope.marks = response.data.records;
  });
  $scope.update = function(roll,name,attendence,total){
    $scope.roll = roll;$scope.name = name;$scope.attend = attendence;$scope.total = total;
    $scope.dataSend = {
      'name':$scope.name,
      'roll':$scope.roll,
      'total':$scope.total,
      'attendence':$scope.attend     
    };
        $scope.items.push($scope.dataSend);
        $scope.count = $scope.items.length;
        $scope.string = JSON.stringify($scope.items);
  };
  $scope.updateData = function(){
    window.location.assign("update.php?id=10@"+$scope.string);
  }
});
</script>
