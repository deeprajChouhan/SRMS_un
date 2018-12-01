<?php
  session_start();
  include 'connection.php';
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
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/angular.js"></script>
    <style>
    a{
      font-size:30px;
    }
    .side{
      box-shadow: 0px 4px 2px 4px #888888;
    }
    .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    right: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
    </style>
    <title></title>
  </head>
  <body >
  <?php
          $count = $object->getSubjectCount($teacher['name']);
          $subjects = $object->getSubjects($teacher['name']);
          $students = $_SESSION['branch_students'];
    ?>
    
    
      <div col-md-12 col-lg-12>
      <div class="col-md-4">
      <div class="w3-sidebar w3-bar-block side" style="width:25%;margin-right:2000px;background-color:#008080;"> 
      <div class="w3-bar-item">
        <center><img src="images/mam.png" style="border-radius:50%;" height="250px" width="250px" responsive></span>
        <center>
        <h1><?php echo $teacher['name'];?></h1>
        <h2>HOD IT Dept</h2>
        </center></div>
        <a href="hod1.php" class="w3-bar-item w3-button">Home</a>
        <a href="#" class="w3-bar-item w3-button">Attendence</a>
        <a href="hod1.php?id=2" class="w3-bar-item w3-button"> Master Timetable</a>
        <a href="teacher1.php" class="w3-bar-item w3-button">My Subject</a>
        <a href="hod1.php?id=3" class="w3-bar-item w3-button">Add Teacher</a>
        <a onclick="openNav()" class="w3-bar-item w3-button">Bonus Marks</a>
        <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php 
    $sql_session = "select * from session";
    $res_session = $conn->query($sql_session);
    while($row_session = $res_session->fetch_array()){
      $session = $row_session['session'];
      $sql = "select sem from $students where session = '$session'";
      $res = $conn->query($sql);
      $row = $res->fetch_assoc();
      echo "<a href='changeSession.php?id=3@".$row['sem']."'>".$row['sem']." Semester</a>";
  ?>
  <?php } ?>
</div>
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
            include 'timetable.php';
        }
        else if($id == 1){
            include 'marks.php';
        }
        else if($id == 3){
            include 'assign_teacher.php';
        }
        else if($id == 4){
            
          ?>
      <?php
        }else if($id == 5){
          ?>
      <?php
        }
      }else{
          echo "<center><strong><h1>Department Teachers</h1></strong></center><hr/>";
          $sql_select_teachers = "select * from teachers group by name,username having count(*) = 1";
          $res = $conn->query($sql_select_teachers);
          echo "<div class='col-md-12 col-lg-12'>
            <div class='col-md-7 col-lg-7'><center><h3><strong>Name</strong></h3></center></div>
            <div class='col-md-3 col-lg-3'><h3><strong>Semester</strong></h3></div>
          </div>";
          while($row = $res->fetch_array()){
            $check = $row['password'];
            if(!$check == " "){
                continue;
            }
            else if($row['name'] == "ADMIN"){
                continue;
            }
            else{
                echo "
                <div class='list col-md-12 col-lg-12' onclick='displayAsign(".$row['name'].");' style='margin:2%;margin:5px;'>
                <center>
                <div class='col-md-7'><a href='taskteacher.php?name=".$row['name']."'>".$row['name']."</a></div>
                <div class='col-md-2'>".$row['sem']."</div>
                <div class='col-md-2'>-></div>
                </center>
                </div>
                ";
            }
          }
        }
      ?>
      </div>
      </div>
    </div>
    </div>
  </body>
</html>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
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