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
<body ng-app="myapp" ng-controller="myCtrl"><form method="post">
<button ng-click="update()" class="btn btn-danger">Update</button>
<table id="seminarSheet" class="table table-bordered ">
  <tr>
    <td>rollno</td>
    <td>name</td>
    <td>Attendence<br>Out of 2</td>
    <td>Evaluation<br>Out of 3</td>
    <td>Total<br>out of 5</td>
  </tr>
  </td>
	 <tr ng-repeat="x in marks">
		 <td>{{x.roll}}</td>
		 <td>{{x.name}}</td>
		 <td><input ng-blur="update_data(x.name,x.roll,x.attendence,x.evaluation,x.total)" type="text" ng-model="x.attendence"></td>
     <td><input ng-blur="update_data(x.name,x.roll,x.attendence,x.evaluation,x.total)" type="text" ng-model="x.evaluation"></td>
		 <td><input ng-blur="update_data(x.name,x.roll,x.attendence,x.evaluation,x.total)" type="text" ng-model="x.total"></td>
	 </tr>
</table>
{{items}}
<script>
var app = angular.module('myapp', []);
app.controller('myCtrl', function($scope, $http) {
    $scope.items = [];
    $http.post("getData.php?id=9")
    .then(function (response) {$scope.marks = response.data.records;});
    $scope.update_data = function(name,roll,attendence,evaluation,total){
      $scope.name = name;$scope.roll = roll;$scope.attendence = attendence;$scope.evaluation = evaluation;$scope.total = total;
      $scope.data_send = {
        "name":$scope.name,
        "roll":$scope.roll,
        "attendence":$scope.attendence,
        "evaluation":$scope.evaluation,
        "total":$scope.total
      };
      $scope.items.push($scope.data_send);
      $scope.count = $scope.items.length;
      $scope.string = JSON.stringify($scope.items);
    };
    $scope.update = function(){
      window.location.assign("update.php?id=5@"+$scope.string);
    }
});
</script>
