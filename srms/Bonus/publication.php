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
<button ng-click="update_data()" class="btn btn-danger">Update</button>
<table class="table table-bordered">
  <tr>
    <td>rollno</td>
    <td>name</td>
    <td>National</td>
    <td>Marks<br>out of 3</td>
    <td>International</td>
    <td>Marks<br>out of 5</td>
    <td>Total Marks</td>
  </tr>
  <tr ng-repeat="x in marks">
    <td>{{x.roll}}</td>
    <td>{{x.name}}</td>
    <td><input type="text" ng-blur="send_update(x.name,x.roll,x.national,x.out1,x.inter,x.out2,x.total)" ng-model="x.national"></td>
    <td><input type="text" ng-blur="send_update(x.name,x.roll,x.national,x.out1,x.inter,x.out2,x.total)" ng-model="x.out1"></td>
    <td><input type="text" ng-blur="send_update(x.name,x.roll,x.national,x.out1,x.inter,x.out2,x.total)" ng-model="x.inter"></td>
    <td><input type="text" ng-blur="send_update(x.name,x.roll,x.national,x.out1,x.inter,x.out2,x.total)" ng-model="x.out2"></td>
    <td><input type="text" ng-blur="send_update(x.name,x.roll,x.national,x.out1,x.inter,x.out2,x.total)" ng-model="x.out2"></td>
  </tr>
</table>
<script>
var app = angular.module('myapp', []);
app.controller('myCtrl', function($scope, $http) {
    $scope.items = [];
    $http.post("getData.php?id=2")
    .then(function (response) {$scope.marks = response.data.records;});
    $scope.send_update = function(name,roll,national,out1,inter,out2,total){
      $scope.name = name;$scope.roll = roll;
      $scope.national = national;$scope.out1 = out1;$scope.inter = inter;$scope.out2 = out2;$scope.total = total;
      $scope.data_send = {
        'name':$scope.name,
        'roll':$scope.roll,
        'national':$scope.national,
        'out1':$scope.out1,
        'inter':$scope.inter,
        'out2':$scope.out2,
        'total':$scope.total
      };
      $scope.items.push($scope.data_send);
      $scope.count = $scope.items.length;
      $scope.string = JSON.stringify($scope.items);
    };
    $scope.update_data = function(){
      window.location.assign("update.php?id=3@"+$scope.string);
    };
});
</script>
