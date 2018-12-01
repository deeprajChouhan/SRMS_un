<!DOCTYPE html>
<html lang="en">
<head>
	  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script src="../js/angular.js"></script>
    <title>Document</title>
    <script src="../js/download.js"></script>
</head>
<?php
  session_start();
  $sem = $_SESSION['sem'];
?>
<body ng-app="myapp" ng-controller="myCtrl">
<?php include 'sidebar.php';?>
<form method="post">
  <input type="submit" name="download" value="Download" class="btn btn-success" onclick="fnExcelReport('seminarSheet')" style="float:right;"/>
  <input type="submit" name="update" value="Edit" style="float:right;" onclick="changeSheet()" class="btn btn-danger"/>
<table id="seminarSheet" class="table table-bodered table-responsive"><center>
  <h1>S. B. Jain Institute of Technology, Management & Research, Nagpur</h1>
  <h3>Department of Information Technology </h3>
  <h3>Winter 2017</h3>
  <h3>Semester: - Sem<?php echo " ".$sem; ?></h3>
  <h3>Participation Sheet</h3>
</center>
  <tr>
    <td>rollno</td>
    <td>name</td>
    <td>Other Institute</td>
    <td>Marks<br>out of 2</td>
    <td>NIT/IIT/IISC/Government Institute</td>
    <td>Marks<br>out of 5</td>
    <td>Total marks on all certificate</td>
  </tr>
  <tr ng-repeat="x in marks">
    <td>{{x.roll}}</td>
    <td>{{x.name}}</td>
    <td>{{x.other}}</td>
    <td>{{x.out1}}</td>
    <td>{{x.gov}}</td>
    <td>{{x.out2}}</td>
    <td>{{x.total}}</td>
  </tr>
</table>
<script>
var app = angular.module('myapp', []);
app.controller('myCtrl', function($scope, $http) {
    $http.post("getData.php?id=1")
    .then(function (response) {$scope.marks = response.data.records;});
});
function changeSheet(){
  window.location.assign("participation.php");
}
</script>
