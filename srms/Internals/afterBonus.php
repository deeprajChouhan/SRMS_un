<?php
    session_start();
    include 'fetch_data.php';
    include '../connection.php';
    $student_object = new student;
    $student_list = $student_object->getStudent($_SESSION['sem']);
    $subject_object = new subject;
    $subject_list = $subject_object->getSubjects($_SESSION['sem']);
    $student_count = $student_object->getCount($_SESSION['sem']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/angular.js"></script>
    <script src="../js/download.js"></script>
    <title>Document</title>
</head>
<body ng-app="mainApp" ng-controller="myCtrl">

<p class="alignleft"><a style="border:none;background-color:none;" href="../classteacher1.php">
            <span class="glyphicon glyphicon-circle-arrow-left"></span>
          </a>
            </p>
    <table class="table table-bordered table-condensed table-hover"> 
        <tr>
            <td><strong>Roll No</strong></td>
            <td><strong>Name</strong></td>
            <?php
            for($j=0;$j<sizeof($subject_list);$j++){
                echo "<td><strong>".$subject_list[$j]."<br>TH(20)</strong></td>";
            }
            ?>
            <td style="background-color:yellow;"><strong>Bonus</strong></td>
            <?php
            for($j=0;$j<sizeof($subject_list);$j++){
                echo "<td><strong>".$subject_list[$j]."<br>TH(20)</strong></td>";
            }
            ?>
            <td style="background-color:yellow;">Bonus Remaining</td>
        </tr>
            <tr ng-repeat="x in bonus">
                <td>{{x.roll}}</td>
                <td>{{x.name}}</td>
                <?php
                    for($i=0;$i<sizeof($subject_list);$i++){
                        echo "<td>{{x.".$subject_list[$i]."}}</td>";
                    }                
                ?>
                <td style="background-color:yellow;">{{x.bonus}}</td>
                <?php
                    for($i=0;$i<sizeof($subject_list);$i++){
                        echo "<td>{{x.comboTotal".$subject_list[$i]."}}</td>";
                    }
                ?>
                <td style="background-color:yellow;">{{x.bonusR}}</td>
            </tr>
    </table>
</body>
<script>
var app = angular.module("mainApp",[]);
app.controller("myCtrl",function($http,$scope){
    $http.post('fetch_marks.php').then(
        function(response){
            $scope.bonus = response.data.records;
        }
    );
});
</script>
</html>