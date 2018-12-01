<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"> </script>

      <body style="background-color:#B6B6B4">
        <script type='text/javascript'>
        function openNav() {
            document.getElementById("mySidenav").style.width = "50%";
        }
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
          showInput();
        </script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
          <style>
          </style>
    </head>
    <body>
      <div style="clear: both;">
            <p class="alignleft"><a style="border:none;background-color:none;" href="teacher.php">
            <span class="glyphicon glyphicon-circle-arrow-left"></span>
          </a>
            </p>
            <p class="center"><center><h2><strong><font face = "Verdana" color="black" ><?php echo $studentid; ?></font></strong></h2></center>
            </p>
        </div>

      <?php   include 'connection.php';
        session_start();
        $subjectId = $_SESSION['subject'];
        $sem = $_SESSION['sem'];
        $sqls = "SELECT put,sesional1,sesional2,tut,assign FROM marks WHERE studentid = '$studentid' AND subjectid = '$subjectId'";
        $ress = mysqli_query($conn,$sqls);
        while($rows = mysqli_fetch_array($ress)){
                 $sesional1 = $rows['sesional1'];
                 $sesional2 = $rows['sesional2'];
                 $put = $rows['put'];
                 $assign = $rows['assign'];
                 $tut = $rows['tut'];
         } ?>
         <div class="col-sm-12 col-md-12 col-lg-12">
                     <hr>
            <div  class="col-md-6 col-lg-6 col-sm-6" style="overflow:hidden;">
            <?php 
            echo $studentid,$subjectId;
              $sql_select = "SELECT * FROM marks WHERE studentid = '$studentid' AND subjectid = '$subjectId'AND sem = '$sem'";
              $res_select = mysqli_query($conn,$sql_select);
              while($row_select = mysqli_fetch_array($res_select)){
                $sesional1 = $row_select['sesional1'];
                $sesional2 = $row_select['sesional2'];
                $put = $row_select['put'];
                $assign = $row_select['assign'];
                $tut = $row_select['tut'];
              }
              echo $sesional1,$sesional2,$put,$tut,$assign;
            ?>
              <form  method="POST">
                <div class="container">
                  <label for="S1marks"><b>Sessional 1</b></label>
                  <input type="text" class = "feilds" value="<?php echo $sesional1; ?>" id="user_input" name="S1marks" >
                <br><br><br>
                  <label for="S2marks"><b>Sessional 2</b></label>
                  <input type="text" class="feilds" value="<?php echo $sesional2; ?>" id="user_input1" name="S2marks" >
                <br><br><br>
                   <label for="Pmarks"><b>PUT</b></label>
                  <input  type="text" class="feilds" value="<?php echo $put; ?>" id="user_input2" name="PUT" >
                <br><br><br>
                <label for="Pmarks"><b>Tutorial</b></label>
                  <input id="tbox" type="number" class="feilds" min="0" max="6" value="<?php echo $tut; ?>" id="user_input3" name="tutorial" >
                  <br><br><br>
                  <label for="Pmarks"><b>Assignment</b></label>
                  <input id="tbox" type="number" class="feilds" min="0" max="3" id="user_input4" value="<?php echo $assign; ?>" name="Assignment" >
                </div><hr>
              <input  type="submit" name="submit" style="padding:10px font-size: 18pt; height: 40px; width:280px;" class="btn btn-success" onclick="showInput()"></center><br/>
              </form>
            </div>
      </center>
      <div id="table-wrapper">
             <div class="col-sm-6 col-md-6 col-lg-6" id="table-scroll">
               <table class="table table-bordered" style="overflow:scroll;">
                 <?php
                  $sql1 = "SELECT * FROM students WHERE sem = '$sem'";
                  $result = mysqli_query($conn,$sql1);
                 while ($rows = mysqli_fetch_array($result)) {
                   $roll = $rows['rollno'];
                   $name = $rows['name'];
                   echo "<tr><td><div id='".$name."'><a href='teacher.php?roll=$roll'>$roll->$name</a></div></td></tr>";
                   $sql_subjects = "SELECT * FROM marks WHERE subjectid='$subjectId' AND studentid = '$roll'";
                  $res_subject = mysqli_query($conn,$sql_subjects);
                  while($row_subject = mysqli_fetch_array($res_subject)){
                    echo "<tr><td><div style='display:none;' id='".$roll."'>
                    <ul>
                      <li>Sesional1->".$row_subject['sesional1']."</li>
                      <li>Sesional2->".$row_subject['sesional2']."</li>
                      <li>PUT->".$row_subject['put']."</li>
                      <li>Asign->".$row_subject['assign']."</li>
                      <li>TUT->".$row_subject['tut']."</li>
                    </ul>
                  </div></td></tr>";
                  echo "
                      <script>
                        document.getElementById('".$name."').onmouseover = function(){
                           document.getElementById('".$roll."').style.display = 'block';
                        }
                        document.getElementById('".$name."').onmouseout = function(){
                          document.getElementById('".$roll."').style.display = 'none';
                        }
                      </script>
                  ";
                }
                 }?>
               </table>
               </div>

           </div>

         </div>


<?php
      error_reporting(0);
      include 'connection.php';
      if(isset($_POST['submit'])){
        $sessional1Marks = $_POST['S1marks'];
        $sessional2Marks = $_POST['S2marks'];
        $putmarks = $_POST['PUT'];
        $tutorial = $_POST['tutorial'];
        $assignment = $_POST['Assignment'];
        $subjectid = $_SESSION['subject'];
       $sql_update = "UPDATE marks SET sesional1 = '$sessional1Marks',
              sesional2 = '$sessional2Marks',put = '$putmarks'
              ,tut = '$tutorial',assign = '$assignment' WHERE studentid = '$studentid' AND subjectid = '$subjectid'";
      if($conn->query($sql_update) === TRUE){
                echo "inserted";
              }else{
                echo "Error updating record: " . $conn->error;
              }
      }
 ?>
      </body>
    </html>
