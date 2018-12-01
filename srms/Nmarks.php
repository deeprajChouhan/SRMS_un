<!DOCTYPE html>
<html lang="en">
<head>
	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="js/angular.js"></script>
    <script scr="js/download.js"></script>
</head>
<?php
            session_start();
            $pos = $_SESSION['pos'];
            $sem = $_SESSION['sem'];
            $subjectid = $_SESSION['subject'];
?>

<body ng-app="myapp" ng-controller="myCtrl">
<div class="backBtn">
</div>
    <div class="col-md-12 col-lg-12"></div><form method="post">
    <h1 style="font-family:font;margin:35px;" class="col-md-5">Sem<?php echo $sem."   ";?><?php echo $subjectid."   ";?> Marks Sheet</h1>
    <p style="float:right;" calss="col-md-4 col-lg-4">
    <input type="button" name="submit" value="Update" ng-click="updateMarks()" class="btn btn-danger"></p>
    <div class="clearfix"></div>
    <table class="table table-bordered responsive" id="markstable" responsive>
        <tr>
            <td><strong>Roll no</strong></td>
            <td><strong>Name</strong></td>
            <td><strong>Sesional1</strong></td>
            <td><strong>Sesional2</strong></td>
            <td><strong>Sesional3</strong></td>
            <td><strong>Tutorial</strong></td>
            <td><strong>Assignment</strong></td>
        </tr>
         <tr ng-repeat="x in details">
            <td>{{x.roll}}</td>
            <td>{{x.name}}</td>
            <td><input type="text" ng-model="x.sesional1" ng-blur="sendMarks(x.roll,x.name,x.sesional1,x.sesional2,x.sesional3,x.tutorials,x.assign)"></td>
            <td><input type="text" ng-model="x.sesional2" ng-blur="sendMarks(x.roll,x.name,x.sesional1,x.sesional2,x.sesional3,x.tutorials,x.assign)"></td>
            <td><input type="text" ng-model="x.sesional3" ng-blur="sendMarks(x.roll,x.name,x.sesional1,x.sesional2,x.sesional3,x.tutorials,x.assign)"></td>
            <td><input type="text" ng-model="x.tutorials" ng-blur="sendMarks(x.roll,x.name,x.sesional1,x.sesional2,x.sesional3,x.tutorials,x.assign)"></td>
            <td><input type="text" ng-model="x.assign" ng-blur="sendMarks(x.roll,x.name,x.sesional1,x.sesional2,x.sesional3,x.tutorials,x.assign)"></td>
         </tr>
        </form>
    </table>
    
    <script>
        var app = angular.module("myapp",[]);
        app.controller("myCtrl",function($scope,$http){
            $scope.subject = "<?php echo $subjectid;?>";
            $scope.marks = [];
               $scope.id = "<?php echo $subjectid; ?>";
           $http.post("getMarksData.php?getSub="+$scope.id).then(function(response){$scope.details = response.data.records;});
           $scope.sendMarks = function(roll,name,sesional1,sesional2,sesional3,tutorials,assign){
                    $scope.roll = roll;$scope.name = name;$scope.sesional1 = sesional1;$scope.sesional2 = sesional2;$scope.sesional3 = sesional3;
                    $scope.tutorials = tutorials;$scope.assign = assign;
                    $scope.dataSend = {
                        "roll":$scope.roll,
                        "name":$scope.name,
                        "sesional1":$scope.sesional1,
                        "sesional2":$scope.sesional2,
                        "sesional3":$scope.sesional3,
                        "tut":$scope.tutorials,
                        "assign":$scope.assign
                    };
                    $scope.marks.push($scope.dataSend);
                    $scope.count = $scope.marks.length;
                    $scope.string = JSON.stringify($scope.marks);
           };
           $scope.updateMarks = function(){
               window.location.assign("updateMarks.php?id="+$scope.subject+"@"+$scope.string);
           }
        });
    </script>
</body>
</html>
