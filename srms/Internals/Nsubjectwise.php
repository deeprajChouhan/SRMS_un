<?php
    session_start();
    include_once '../connection.php';
    include_once 'fetch_data.php';  
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
<body ng-app="myApp" ng-controller="myCtrl" ng-init="wait()">

<p class="alignleft"><a style="border:none;background-color:none;" href="../classteacher1.php">
            <span class="glyphicon glyphicon-circle-arrow-left"></span>
          </a>
            </p>
    <button class="btn btn-danger" style="margin-left:20%;" ng-click="send_data()">Edit</button>
    <button class="btn btn-success" style="margin-left:25%;" onclick="fnExcelReport('sheet')">Download</button>
    <p style="padding-left:40%;">Original Marks from Faculty (Out of 20)</p>
    <p style="padding-left:80%;">Marks after adding bonus Marks (Out Of 20)</p>
    <div class="clearfix"></div>
    <table class="table table-bordered table-condensed table-hover" id='sheet'>
        <tr>
            <td><strong>Roll no.</strong></td>
            <td><strong>Name</strong></td>
            <?php
                $student_object = new student;
                $subjects = $student_object->getSubjects($_SESSION['sem']);
                for($i=0;$i<sizeof($subjects);$i++){
                    echo "<td><strong>".$subjects[$i]."</strong>
                        <table class='table table-bordered'>
                            <tr><td>TH(20)</td><td>Bonus</td><td>Tot(20)</td></tr>
                        </table>
                    </td>";
                }
            ?>
            <td style="background-color:yellow;"><strong>Bonus</strong></td>
            <?php
                for($i=0;$i<sizeof($subjects);$i++){
                    echo "
                        <td><strong>".$subjects[$i]."</storng>
                        <br> TH(20)
                        </td>
                    ";
                }
            ?>
                <td style="background-color:yellow;"><strong>Bonus <br> Remaining</strong></td>
        </tr>
        <tr ng-repeat="x in marks">
                <td>{{x.roll}}</td>
                <td>{{x.name}}</td>
                    <?php
                        for($i=0;$i<sizeof($subjects);$i++){
                            echo "<td>
                                <table class='table table-bordered table-condensed'>
                                    <tr><td>{{x.".$subjects[$i]."}}</td>
                                    <td >{{x.".$subjects[$i]."B}}</td>
                                   <td>{{x.comboTotal".$subjects[$i]." }}</td>
                                    </tr>
                                </table>
                            </td>";
                        }
                    ?>
                <td style="background-color:yellow;">{{ x.bonus }}
                </td>
                <?php
                    for($i=0;$i<sizeof($subjects);$i++){
                        echo "<td>{{x.comboTotal".$subjects[$i]."}}</td>";
                    }
                ?>
                    <td style="background-color:yellow;">{{x.bonusR}}</td>
        </tr>
    </table>
    {{items}}
</body>
<script>
    var app = angular.module("myApp",[]);
    app.controller("myCtrl",function($http,$scope){
        $scope.items = [];
        $http.post('fetch_marks.php').then(function(response){
            $scope.marks = response.data.records;
        });
        $scope.wait = function(){
            alert("wait for some time");
        };
        $scope.update = function(roll,name,internal,bonus,subject){
            $scope.name = name;
            $scope.roll = roll;
            $scope.internal = internal;
            $scope.bonus = bonus;
            $scope.subject = subject;
            $scope.data_send = {
          'name': $scope.name,
          'roll': $scope.roll,
           'bonus':$scope.bonus,
           'internal':$scope.internal,
           'subject':$scope.subject
          };
          $scope.items.push($scope.data_send);
          $scope.string = JSON.stringify($scope.items);
        };
        $scope.send_data = function(){
            window.location.assign('subjectWise.php');  
        }
    });
</script>
</html>