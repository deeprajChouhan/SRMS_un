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
<table id="seminarSheet" class="table table-bordered ">
  <tr>
    <td>rollno</td>
    <td>name</td>
    <td>Marks by faculty<br>out of 25</td>
    <td>subject seminar marks<br>out of 5</td>
    <td>Rounding value<br>out of 5</td>
  </tr><form  method="post">
    <input type="submit" style="float:right;" class="btn btn-danger" name="submit" value="Update" ng-click="send_update()">
	<tr ng-repeat="x in marks">
		<td>{{x.roll}}</td>
		<td>{{x.name}}</td>
		<td><input type="text" ng-blur="update(x.roll,x.name,x.faculty,x.seminar,x.total)"  ng-model="x.faculty" /></td>
		<td><input type="text" ng-blur="update(x.roll,x.name,x.faculty,x.seminar,x.total)"  ng-model="x.seminar"/></td>
		<td><input type="text" ng-blur="update(x.roll,x.name,x.faculty,x.seminar,x.total)"  ng-model="x.total"/></td>
  </tr>
</table>
{{items}}
<script>
var app = angular.module('myapp', []);
app.controller('myCtrl', function($scope, $http) {
    $scope.items = [];
    $http.post("getData.php?id=0")
    .then(function (response) {$scope.marks = response.data.records;});
    $scope.update = function(roll,name,faculty,seminar,total){
        $scope.name = name;$scope.roll = roll;$scope.faculty = faculty;$scope.seminar = seminar;$scope.total = total;
        $scope.data_send = {
          'name': $scope.name,
          'roll': $scope.roll,
          'faculty': $scope.faculty,
          'seminar': $scope.seminar,
          'total': $scope.total
        };
        $scope.items.push($scope.data_send);
        $scope.count = $scope.items.length;
        $scope.string = JSON.stringify($scope.items);
    };
    $scope.send_update = function(){
      window.location.assign("update.php?id=1@"+$scope.string);
    }
});
</script>
</form>
