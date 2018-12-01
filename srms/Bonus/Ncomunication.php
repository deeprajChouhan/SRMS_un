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
<?php
  session_start();
  $sem = $_SESSION['sem'];
?>
<body ng-app="myapp" ng-controller="myCtrl">
<?php include 'sidebar.php';?>
<form method="post">
  <input type="submit" name="download" value="Download" class="btn btn-success" onclick="fnExcelReport('seminarSheet')" style="float:right;"/>
  <input type="submit" name="edit" value="Edit" onclick="changeSheet()" style="float:right;" class="btn btn-danger"/></form>
<table id="seminarSheet" class="table table-bordered "><center>
  <h1>S. B. Jain Institute of Technology, Management & Research, Nagpur</h1>
  <h3>Department of Information Technology </h3>
  <h3>Winter 2017</h3>
  <h3>Semester: - Sem<?php echo " ".$sem; ?></h3>
  <h3>Communication Test</h3>
</center>
  <tr>
    <td>rollno</td>
    <td>name</td>
    <td>Comunication 1<br>out of 1</td>
    <td>Comunication 2<br>out of 1</td>
    <td>Comunication Certification<br>out of 3</td>
    <td>Total</td>
  </tr>
  </td>
	 <tr ng-repeat="x in marks">
		 <td>{{x.roll}}</td>
		 <td>{{x.name}}</td>
		 <td>{{x.com1}}</td>
         <td>{{x.com2}}</td>
         <td>{{x.certificacte}}</td>
		 <td>{{x.total}}</td>
	 </tr>
</table>
<script>
var app = angular.module('myapp', []);
app.controller('myCtrl', function($scope, $http) {
    $http.post("getData.php?id=13")
    .then(function (response) {$scope.marks = response.data.records;});
});
function changeSheet(){window.location.assign("comunication.php");}
</script>
