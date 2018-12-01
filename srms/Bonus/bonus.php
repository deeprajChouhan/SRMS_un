<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
		<script src="../js/angular.js"></script>
    <title>Document</title>
    <script src="../js/download.js"></script>
    <style>
        td{
            align:center;
        }
    </style>
</head>
<body ng-app="myapp" ng-controller="myCtrl">
<div >
    <button onclick="fnExcelReport('bonus')" class="btn btn-success" style="margin-bottom:25px;">Download</button>
    <table style="overflow-x:auto;" id="bonus" class="table table-bordered table-hover table-condensed">
        <tr>
            <td>Rollno</td>
            <td>Name</td>
            <td style="color:red;font-size:20px;">Aptitude marks<table class="table table-bordered"><tr><td>out_of<br>5</td></tr></table></td>
            <td style="color:red;font-size:20px;">Seminar<table class="table table-bordered"><tr><td>out_of<br>5</td></tr></table></td>
            <td style="color:red;font-size:20px;">Communication Marks<table class="table table-bordered"><tr><td>out_of<br>5</td></tr></table></td>
            <td style="color:red;font-size:20px;">NPTEL<table class="table table-bordered"><tr><td>out_of<br>10</td></tr></table></td>
            <td style="color:red;font-size:20px;">Skill<br>Enhancement<br>Program<table class="table table-bordered"><tr><td>out_of<br>5</td></tr></table></td>
            <td style="color:red;font-size:20px;">Internet<br>hour<br>activities<table class="table table-bordered"><tr><td>out_of<br>5</td></tr></table></td>
            <td style="color:red;font-size:20px;">Participation<br>in<br>workshop<table class="table table-bordered"><tr><td>out_of<br>7</td></tr></table></td>
            <td style="color:red;font-size:20px;">Paper Publications<table class="table table-bordered"><tr><td>out_of<br>8</td></tr></table></td></td>
            <td style="color:red;font-size:20px;">University winner<br>in sports </td>
            <td style="color:red;font-size:20px;">Technical <br>Competition<br>(IIT/NIT/IISC/Gov)</td>
            <td style="color:red;font-size:20px;">Technical Competition<br>regional level</td>
            <td style="color:red;font-size:20px;">Hobby Hour Activity<table class="table table-bordered"><tr><td>out_of<br>8</td></tr></table></td>
            <td>Total Bonus Marks</td>
            <td>Total Bonus<br>Rounded up<br>to 25</td>
        </tr>
        <tr ng-repeat="x in marks">
            <td>{{x.roll}}</td>
            <td>{{x.name}}</td>
            <td style="background-color:yellow;">{{x.total_apti}}</td>
            <td style="background-color:yellow;">{{x.total_seminar}}</td>
            <td style="background-color:yellow;">{{x.total_comm}}</td>
            <td style="background-color:yellow;">{{x.total_nptel}}</td>
            <td style="background-color:yellow;">{{x.total_skill}}</td>
            <td style="background-color:yellow;">{{x.total_internet}}</td>
            <td style="background-color:yellow;">{{x.total_participation}}</td>
            <td style="background-color:yellow;">{{x.total_publication}}</td>
            <td style="background-color:yellow;">{{x.total_sports}}</td>
            <td style="background-color:yellow;">{{x.total_tech1}}</td>
            <td style="background-color:yellow;">{{x.total_tech2}}</td>
            <td style="background-color:yellow;">{{x.total_hobby}}</td>
            <td style="background-color:yellow;">{{x.total}}</td>
            <td style="background-color:yellow;">{{x.final_total}}</td>
        </tr>
    </table>
    </div>
    <script>
    var app = angular.module("myapp",[]);
    app.controller("myCtrl",function($scope,$http){
        $http.post("getData.php?id=11")
        .then(function (response) {$scope.marks = response.data.records;});
        $scope.getRound = function(total){
            if(total > 25){
                $scope.final_total = 25;
            }else{
                $scope.final_total = total;
            }
        }
    });
    </script>
</body>
</html>