<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TEACHERS PANNEL</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php if (isset($_GET['roll'])) {
      $studentid = $_GET['roll'];
      include 'insertin.php';
    ?><?php }else{ ?>
    <div class="sidetext">
      <?php
    session_start();
    include 'connection.php';
      if(isset($_GET['id'])){$USER = $_GET['id'];}
      else{$USER = $_SESSION['username'];}
      $USER = $_GET['id'];
      $_SESSION['id'] = $USER;
      $sql = "SELECT * FROM teachers WHERE username = '$USER'";
      $res = mysqli_query($conn,$sql);
      while ($row = mysqli_fetch_array($res)) {
          $teacher = $row['name'];
          $sem = $row['sem'];
          $subject = $row['subject'];
          $pos = $row['position'];
          $_SESSION['subject'] = $subject;
          $_SESSION['sem'] = $sem;
          $_SESSION['pos'] = $pos;
      }
     ?>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <table border="0">
      </form>
        <?php
        $sql1 = "SELECT * FROM students WHERE sem = '$sem'";
        $result = mysqli_query($conn,$sql1);
          while ($rows = mysqli_fetch_array($result)) {
            $roll = $rows['rollno'];
            $name = $rows['name'];
            $subjectId = $_SESSION['subject'];
            $_SESSION['studentroll'] = $roll;
            echo "<tr><td><div id='".$name."'><a href='teacher.php?roll=$roll'>$roll->$name</a></div></td></tr>";
             $sql_subjects = "SELECT * FROM marks WHERE subjectid='$subjectId' AND studentid = '$roll'";
            $res_subjects = mysqli_query($conn,$sql_subjects);
            while($row_subjects = mysqli_fetch_array($res_subjects)){
              echo "<tr><td><div style='display:block;' id='".$roll."'>
              <ul>
                <li>Sesional1->".$row_subjects['sesional1']."</li>
                <li>Sesional2->".$row_subjects['sesional2']."</li>
                <li>PUT->".$row_subjects['put']."</li>
                <li>Asign->".$row_subjects['assign']."</li>
                <li>TUT->".$row_subjects['tut']."</li>
              </ul>
            </div></td></tr>";
            /*echo "
                <script>
                  document.getElementById('".$name."').onmouseover = function(){
                     document.getElementById('".$roll."').style.display = 'block';
                  }
                  document.getElementById('".$name."').onmouseout = function(){
                    document.getElementById('".$roll."').style.display = 'none';
                  }
                </script>
            ";*/
          }
        }


       ?></table>
</div>
<script type="text/javascript">


</script>
<script>
function openOptions(){}
function closeOptions(){}
function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
function openSheets(){
  document.getElementById("mySidenav1").style.width="40%";
}
function closeSheets(){
  document.getElementById("mySidenav1").style.width="0%";
}
</script>
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-lg-12 jumbotron" style="background-attachment:fixed;">
        <div class="col-md-8 col-lg-8 col-sm-12"><span style="font-size:45px;font-family:font1;">
          <form action="logout.php"  method="POST">
            <input type="submit" name="logout" value="Logout" class="btn btn-danger"/>
          </form>
          <center><img src="images/mam.png" style="border-radius:50%;" height="250px" width="250px" responsive></center></span></div>
        <div class="col-md-4 col-lg-4 col-sm-12" >
          <table class="table">
            <?php
              $sql_teacher = "SELECT * FROM teachers WHERE name = '$teacher'";
              $res_teacher = mysqli_query($conn,$sql_teacher);
              $count = mysqli_num_rows($res_teacher);
              if($count == 1){
            ?>
            <tr><td><span style="font-size:45px;font-family:font1;"><strong><?php echo $teacher; ?></strong></span></td></tr>
            <tr><td><span style="font-size:45px;font-family:font1;"><strong>Sem  <?php echo $_SESSION['sem'];?></strong>
            </span></td></tr>
            <tr><td><span style="font-size:45px;font-family:font1;"><strong><?php echo $subject ?></strong></span></td></tr>
          <?php }else{ ?>
            <?php ?>
            <form method="POST">
            <tr><td><span style="font-size:45px;font-family:font1;"><strong><?php echo $teacher; ?></strong></span></td></tr>
            <tr><td><span style="font-size:45px;font-family:font1;"><strong>Sem  <select name="sem"><?php
            while($row_teacher  = mysqli_fetch_array($res_teacher)){
              $sem = $row_teacher['sem'];
              echo "<option>".$sem."</option>";
            }
             ?></select></strong>
            </span></td></tr>
            <tr><td><span style="font-size:45px;font-family:font1;"><strong>Subject <select name="sub"><?php
            $res_teach = mysqli_query($conn,$sql_teacher);
            while($row_teach  = mysqli_fetch_array($res_teach)){
              $subject = $row_teach['subject'];
              echo "<option>".$subject."</option>";
            }
             ?></select></strong></span></td></tr>
             <tr><td><input type="submit" name="submit" value="Change Class" class="btn btn-primary"></td></tr>
             <?php
               if(isset($_POST['submit'])){
                 $select_subject = $_POST['sub'];
                 $sql2 = "SELECT username FROM teachers WHERE name = '$teacher' AND subject = '$select_subject'";
                 $res2 = mysqli_query($conn,$sql2);
                 while($row2 = mysqli_fetch_array($res2)){
                   $usera = $row2['username'];
                   echo "<script>window.location.assign('teacher.php?id=".$usera."');</script>";
                 }
               }
             ?>
          <?php } ?>
        </form>
          </table>
                </div></div>
                <div class="clearfix"></div>
                <div class="actions col-md-12">
                <span class="card col-25" style="font-size:30px;cursor:pointer" onclick="openNav()" style="background-color:#7ec0ee;margin-left:0px;"><center>Students</center></span>
                <span class="card col-25 " style="background-color:#FFFF66 "><center>Attendence</center></span>
                <span class="card col-25" style="background-color:#FF9999 "><center><a href="timetable.php?tname=$teacher">Lectures</a></center></span><div class="clearfix"></div>
                <span class="card col-25" style="background-color:#FFFF99"><center><a onclick="openMyclass()">My Class</a></center></span>
                <span class="card col-25" style="font-size:30px;cursor:pointer" style="background-color:#7ec0ee;margin-left:0px;"><center><span onclick="openSheets()">Class Bonus</a></center></span>
                <span class="card col-25 " style="background-color:#FFFF66 "><center><a href="marks.php">Subject Marks</a></center></span><div class="clearfix"></div>
                
            </div>
            <script type="text/javascript">
              function openMyclass(){
                  document.getElementById("mySidenav2").style.width = "25%";
              }
              function closeMyclass(){
                document.getElementById("mySidenav2").style.width = "0%";
              }
              function showMarks(id){
                  window.location.assign("changeSession.php?id="+id+"@1");
              }
            </script>
            <div class="sidenav" id="mySidenav2">
              <a href="javascript:void(0)" class="closebtn" onclick="closeMyclass()">&times;</a>
              <table>
                <?php
                  $sql_select_subject = "select * from subjects where semester = '$sem'";
                  $res_select_subject = mysqli_query($conn,$sql_select_subject);
                  while($row_select_subject = mysqli_fetch_array($res_select_subject)){
                ?>
                <tr><td><a onclick="showMarks('<?php echo $row_select_subject['subject']; ?>')"><?php echo $row_select_subject['subject']."(Marks)"; ?></a></td></tr>
              <?php } ?>
              </table>
            </div>
            <div id="mySidenav1" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeSheets()">&times;</a>
              <table>
                <tr>
                  <td><a href="Bonus/Nseminar.php">Seminar</a></td>
                </tr>
                <tr>
                  <td><a href="Bonus/Nparticipation.php">Participation</td>
                </tr>
                <tr>
                  <td><a href="Bonus/Npublication.php">Publication</td>
                </tr>
                <tr>
                  <td>
                    <a href="Bonus/Nsports.php">Sports</a>
                  </td>
                </tr>
                <tr><td><a href="Bonus/Ntech1.php">Technical_competition 1</a></td></tr>
                <tr><td><a href="Bonus/Ntech2.php">Technical_competition 2</a></td></tr>
                <tr><td><a href="Bonus/Nhobby.php">Hobby</a></td></tr>
                <tr><td><a href="Bonus/Ninternet.php">Internet</a></td></tr>
                <tr><td><a href="Bonus/Nskill.php">Skill</a></td></tr>
                <tr><td><a href="Bonus/Nnptel.php">Nptel</a></td></tr>
                <tr><td><a href="Bonus/bonus.php">Bonus Sheet</a></td></tr>
              </table>
            </div>
      </div>
 </div>
<?php } ?>
  </body>
</html>
<center>
