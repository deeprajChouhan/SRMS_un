<!DOCTYPE html>
<html lang="en">
<head>
	  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
		<script src="../js/angular.js"></script>
    <title>Document</title>
    <script src="../js/download.js"></script>
</head>
<body ng-app="myapp" ng-controller="myCtrl">
<button ng-click="send_update()">Update</button>
<table id="seminarSheet" class="table table-bodered table-responsive">
  <tr>
    <td>rollno</td>
    <td>name</td>
    <td>Other Institute</td>
    <td>Marks<br>out of 2</td>
    <td>NIT/IIT/IISC/Government Institute</td>
    <td>Marks<br>out of 5</td>
  </tr>
	<tr ng-repeat="x in marks">
		<td>{{x.roll}}</td>
    <td>{{x.name}}</td>
    <td><input type="text" ng-blur="update_data(x.name,x.roll,x.other,x.out1,x.gov,x.out2,x.total)" ng-model="x.other"></td>
    <td><input type="text" ng-blur="update_data(x.name,x.roll,x.other,x.out1,x.gov,x.out2,x.total)" ng-model="x.out1"></td>
    <td><input type="text" ng-blur="update_data(x.name,x.roll,x.other,x.out1,x.gov,x.out2,x.total)" ng-model="x.gov"></td>
    <td><input type="text" ng-blur="update_data(x.name,x.roll,x.other,x.out1,x.gov,x.out2,x.total)" ng-model="x.out2"></td>
	</tr>
</table>
<script>
var app = angular.module('myapp', []);
app.controller('myCtrl', function($scope, $http) {
    $scope.items = [];
    $http.post("getData.php?id=1")
    .then(function (response) {$scope.marks = response.data.records;});
    $scope.update_data = function(name,roll,other,out1,gov,out2,total){
      $scope.name = name;$scope.rollno = roll,$scope.other =other;
      $scope.out1 = out1;$scope.gov = gov;$scope.out2 = out2;
      var val1 = Number($scope.out1);var val2 = Number($scope.out2);
      $scope.total = val1 + val2;
      $scope.data_send = {
        'name': $scope.name,
        'roll': $scope.rollno,
        'other': $scope.other,
        'out1': $scope.out1,
        'gov': $scope.gov,
        'out2': $scope.out2,
        'total': $scope.total
      };
      $scope.items.push($scope.data_send);
      $scope.count = $scope.items.length;
      $scope.string = JSON.stringify($scope.items);
    };
      $scope.send_update = function(){
        window.location.assign("update.php?id=2@"+$scope.string);
      };

});
</script>
