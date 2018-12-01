<?php
  error_reporting(0);
  session_start();
  if(isset($_SESSION['username'])){
    
  }else{
    echo "<script>window.location.assign('index.php?error=0');</script>";
  }
  include 'getTeacherData.php';
  $userid = $_SESSION['username'];
  $object = new Teacher;
  $teacher = $object->getDetails($userid);
  $_SESSION['subject'] = $teacher['subject'];
  $_SESSION['sem'] = $teacher['sem'];
  $_SESSION['subject_name'] = $teacher['subject_name'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/angular.js"></script>
    <style>
    a{
      font-size:30px;
    }
    .side{
      box-shadow: 0px 4px 2px 4px #888888;
    }
    </style>
    <title></title>
  </head>
  <body >
  <?php
          $count = $object->getSubjectCount($teacher['name']);
          $subjects = $object->getSubjects($teacher['name']);
    ?>
    
    
      <div col-md-12 col-lg-12>
      <div class="col-md-4">
      <div class="w3-sidebar w3-bar-block side" style="height:100%;width:100%;margin-right:2000px;background-color:#008080;"> 
      <div class="w3-bar-item">
        <center><img src="images/mam.png" style="border-radius:50%;" height="250px" width="250px" responsive></span>
        <center>
        <h1><?php echo $teacher['name'];?></h1>
          <h2>Sem  <?php echo "<strong>".$teacher['sem']."</strong>";?></h2>
          <h3>Subject   <?php echo "<strong>".$teacher['subject']."</strong>";?></h3>
        </center></div>
        <a href="teacher1.php" class="w3-bar-item w3-button">Home</a>
        <a href="#" class="w3-bar-item w3-button">Attendence</a>
        <a href="teacher1.php?id=2" class="w3-bar-item w3-button"> Master Timetable</a>
        <a href="teacher1.php?id=1" class="w3-bar-item w3-button">Subject Marks</a>
        <a href="teacher1.php?id=4" class="w3-bar-item w3-button">Tutorials</a>
        <a href="teacher1.php?id=5" class="w3-bar-item w3-button">Assignments</a>
        <?php
        if($count > 1){
          while($count != 0){
            $count--;
        ?>
            <a onclick="changeSubject('<?php echo $subjects[$count]?>')" id="<?php echo $subjects[$count]?>" class="w3-bar-item w3-button"><?php echo $subjects[$count];?></a>
        <?php
      }
    }
      ?>
        <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
      </div>
      </div>
      <div clas="col-md-6"></div>
      <div class="col-md-6">
      <?php
      if(isset($_GET['id'])){
        $id = $_GET['id'];
        if($id == 2){
          include_once 'Timetable/timetable.php';
        }
        else if($id == 1){
            include 'marks.php';
        }
        else if($id == 3){
          include 'Nmarks.php';
        }
        else if($id == 4){
          ?>
          <div class="tutorials" ng-app="body-app" ng-controller="bodyCtrl">
          <input type="button" style="float:right;" name="submit" value="Edit" ng-click="editMarks()" class="btn btn-danger"></p>
          <h1><?php echo $_SESSION['subject'];?> Tutorials</h1>
          <table class="table table-bordered table-condensed table-hover" style="overflow-y:">
            <tr>
            <td><strong>Roll no</strong></td>
            <td><strong>Name</strong></td>
            <td><strong>Tutorials Submited</strong></td>
            </tr>
            <tr ng-repeat="x in marks">
              <td>{{x.roll}}</td>
              <td>{{x.name}}</td>
              <td>{{x.tutorials}}</td>
            <tr>
          </table>
      </div>
      <?php
        }else if($id == 5){
          ?>
          <div class="tutorials" ng-app="body-app" ng-controller="bodyCtrl">
          <input type="button" style="float:right;" name="submit" value="Edit" ng-click="editMarks()" class="btn btn-danger"></p>
          <h1><?php echo $_SESSION['subject'];?> Assignments</h1>
          <table class="table table-bordered table-condensed table-hover">
            <tr>
            <td><strong>Roll no</strong></td>
            <td><strong>Name</strong></td>
            <td><strong>Assignment Submited</strong></td>
            </tr>
            <tr ng-repeat="x in marks">
              <td>{{x.roll}}</td>
              <td>{{x.name}}</td>
              <td>{{x.assign}}</td>
            <tr>
          </table>
      </div>
      <?php
        }
      }else{
          include 'timetable.php';
      ?>
        <?php } ?>
      </div>
      </div>
    </div>
    </div>
  </body>
</html>
<script>
function changeSubject(sub){
  window.location.assign("changeSession.php?id=2@"+sub);
}
var app = angular.module("body-app",[]);
app.controller("bodyCtrl",function($scope,$http){
  $scope.subject = "<?php echo $_SESSION['subject'];?>";
  $http.post("getMarksData.php?getSub="+$scope.subject)
  .then(function(response){$scope.marks = response.data.records;});
  $scope.editMarks = function(){window.location.assign("Nmarks.php");}
});
</script>