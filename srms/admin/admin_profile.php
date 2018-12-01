<?php
  include_once '../connection.php';
  if(isset($_GET['id'])){
    $view_id = $_GET['id'];
  }
  session_start();
  if(isset($_SESSION['username'])){
   
  }else{
    echo "<script>window.location.assign('index.php?error=0');</script>";
  }
  $_SESSION['branch'] = "IT";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
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

.wrapper {
  margin: 0 auto;
  padding: 40px;
  max-width: 800px;
}

.row {
  display: table-row;
  background: #f6f6f6;
}
.row:nth-of-type(odd) {
  background: #e9e9e9;
}
.row.header {
  font-weight: 900;
  color: #ffffff;
  background: #ea6153;
}
.row.green {
  background: #27ae60;
}
.row.blue {
  background: #2980b9;
}
@media screen and (max-width: 580px) {
  .row {
    padding: 4px 0 2px;
    display: block;
  }
  .row.header {
    padding: 0;
    height: 6px;
  }
  .row.header .cell {
    display: block;
  }
  .row .cell {
    margin-bottom: 10px;
  }
  .row .cell:before {
    margin-bottom: 3px;
    content: attr(data-title);
    min-width: 98px;
    font-size: 10px;
    line-height: 10px;
    font-weight: bold;
    text-transform: uppercase;
    color: #969696;
    display: block;
  }
}

.cell {
  padding: 6px 12px;
  display: table-cell;
}
@media screen and (max-width: 580px) {
  .cell {
    padding: 2px 16px;
    display: block;
  }
}
.form-container {
   width:85vw;
  height:auto;
  margin:0 auto;
}
.card-title {
  text-align:center;
}
    </style>
    <title></title>
  </head>
  <body>
  <div col-md-12 col-lg-12>
      <div class="col-md-4">
      <div class="w3-sidebar w3-bar-block side" style="width:25%;margin-right:2000px;background-color:#008080;"> 
      <div class="w3-bar-item">
        <center><img src="../images/mam.png" style="border-radius:50%;" height="250px" width="250px" responsive></span>
        <center>
        <h1>Admin Pannel</h1>
        </center></div>
        <a href="admin_profile.php" class="w3-bar-item w3-button">Home</a>
        <a href="admin_profile.php?id=0" class="w3-bar-item w3-button">Tables</a>
        <a href="admin_profile.php?id=1" class="w3-bar-item w3-button">Create Batch</a>
        <a href="admin_profile.php?id=2" class="w3-bar-item w3-button">Update Batch</a>
        <a href="admin_profile.php?id=3" class="w3-bar-item w3-button">Student Update</a>
        <a href="admin_profile.php?id=4" class="w3-bar-item w3-button">Create Timetables</a>
        <a href="admin_profile.php?id=5" class="w3-bar-item w3-button">Add Subjects</a>
        <a href="../logout.php" class="w3-bar-item w3-button">Logout</a>
      </div>
      </div>
      <div class="col-md-6"></div>
      <center>
      <div class="col-md-8" style="margin-left:25%;">
        <?php 
          if(isset($view_id)){
            if($view_id == 1){
              include 'createbatch.php';
            }
            if($view_id == 5){
              $branch = $_SESSION['branch_name'];
              ?>
                
                <form action="" method="post">
                    <table>
                      <tr>
                        <td>Select Semester</td>
                        <td><select name="sem" id="select_sem" style="padding:5%;padding-right:60%;margin-top:20%;margin-bottom:20%;" onchange="getsem(this.value)">
                            <?php 
                              $sql_sem = 'select * from semester';
                              $res_sem = $conn->query($sql_sem);
                              while($row_sem = $res_sem->fetch_array()){
                                echo "<option>".$row_sem['sem']."</option>";
                              }
                            ?>
                        </select></td>
                      </tr>
                      <tr>
                        <td>Number of subjects</td>
                        <td><input type="text" value="0" onchange="getfeilds(this.value)"></td>
                      </tr>
                      <tr>
                        <td><div id="feilds"></div><td>
                      </tr>
                    </table>
                </form>
                <script>
                  
    function addsubject(str){
        var res = str.split("/");
        var initID = res[1];
        var subname = res[2];
        var subID = res[0];
        var init = document.getElementById(initID).value;
        var sub = document.getElementById(subname).value;
        var dataSend = {
              'subid' : subID,
              'initials' : init,
              'name' : sub
        };   
        
        var string_send = JSON.stringify(dataSend);
        alert(string_send);
        xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  
              }
            };
        xmlhttp.open("GET","update_subject.php?q="+string_send,true);
        xmlhttp.send();
    }
                  function getfeilds(str){
                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("feilds").innerHTML = this.responseText;
                      }
                    };
                    xmlhttp.open("GET","getfeilds.php?q="+str,true);
                    xmlhttp.send();
                  }
                  function getsem(sem){
                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        
                      }
                    };
                    xmlhttp.open("GET","updatesubject.php?q="+sem,true);
                    xmlhttp.send();
                  }
                </script>
              <?php
            }
            if($view_id == 2){
              ?>
              <h2>Please Note:</h2>
              <h4>Update all your batches at once</h4>
              <form action="" method="POST">
              <select name="current_session" onchange="changeSem(this.value)">
                <?php 
                  $sql_session = "select * from session"; 
                  $res_session = $conn->query($sql_session);
                  while($row_session = $res_session->fetch_array()){
                    echo "<option>".$row_session['session']."</option>";
                  }
                ?>
              </select>
              <h6>Current Sem -></h6>
              <input type="text" name="sem" id="sem">
              <select name="upsem">
                <?php 
                  $sql_session = "select * from semester"; 
                  $res_session = $conn->query($sql_session);
                  while($row_session = $res_session->fetch_array()){
                    echo "<option>".$row_session['sem']."</option>";
                  }
                ?>
                </select><br><input type="submit" name="update_batch" value="Update Batch" class="btn btn-danger">
                <input type="submit" value="insert subjects" name="ses_update" class="btn btn-success"/>
              </form>
              <?php 
                if(isset($_POST['ses_update'])){
                  $_SESSION['batch_update'] = $_POST['upsem'];
                  echo "<script>window.location.assign('nextupdate.php')</script>";
                }
                if(isset($_POST['update_batch'])){
                 $session = $_POST['current_session'];
                   $cur_sem = $_POST['sem'];
                   $up_sem = $_POST['upsem'];
                  echo "<script>window.location.assign('updatebatch.php?id=".$session."@".$cur_sem."@".$up_sem."')</script>";
                }
              ?>
      <script>
        function changeSem(str){
          if (str == "") {
            document.getElementById("sem").value = "";
            return;
         } else { 
          xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("sem").value = this.responseText;
            }
          };
          xmlhttp.open("GET","findsem.php?q="+str,true);
          xmlhttp.send();
        }
      }
      </script>
            <?php }
            if($view_id == 21){
              ?>
                <form action="" method="post">
                  <h1>Please click the button to continue the update</h1>
                  <input type="submit" value="next" name = "next">
                  <?php
                    if(isset($_POST)){
                      echo "<script>window.location.assign('nextupdate.php')</script>";
                    }
                  ?>
                </form>
              <?php
            }
            if($view_id == 0){
                $sql = "select * from branches where name = 'IT'";
                $res = $conn->query($sql);
                $row = $res->fetch_array();
              ?>
                  <div class="wrapper">
  
  <div class="table" style="overflow-x:scroll;">
    <h1>Teachers</h1>
    <div class="row header">
      <div class="cell">
        Name
      </div>
      <div class="cell">
        Semester
      </div>
      <div class="cell">
        Subject
      </div>
      <div class="cell">
        Positions
      </div>
    </div>
    <?php  
    $sql_select_teachers = "select * from teachers group by name,username having count(*) = 1";
    $res = $conn->query($sql_select_teachers);
    while($row = $res->fetch_array()){
      $check = $row['password'];
      if(!$check == " "){
          continue;
      }
      else if($row['name'] == "ADMIN"){
          continue;
      }else{
    ?>
    <div class="row">
      <div class="cell" data-title="Name">
        <?php echo $row['name']; ?>
      </div>
      <div class="cell" data-title="Age">
        <?php echo $row['sem'];?>
      </div>
      <div class="cell" data-title="Occupation">
        <?php echo $row['subject'];?>
      </div>
      <div class="cell" data-title="Location">
        <?php echo $row['position'];?>
      </div>
    </div>
      <?php 
      }
    }
  ?>
  <div class="table">
  <h1>Sheets Active</h1>
    <div class="row header green">
      <div class="cell">
        Sheet Name
      </div>
      <div class="cell">
        Array
      </div>
    </div>
    <?php
      $sql_sheets = "select * from sheets";
      $res_sheets = $conn->query($sql_sheets);
      while($row_sheets = $res_sheets->fetch_array()){
    ?>
    <div class="row">
      <div class="cell" data-title="Product">
        <?php echo $row_sheets['name']; ?>
      </div>
      <div class="cell" data-title="Unit Price">
        <?php echo $row_sheets['sheet'];?>
      </div>
    </div>
      <?php } ?>
  
    
  <div class="table">
  <h1>Subjects</h1>
    <div class="row header red">
      <div class="cell">
        subject Name
      </div>
      <div class="cell">
        sem
      </div>
      <div class="cell">
        Initials
      </div>
    </div>
    <?php
      $branch = $_SESSION['branch_name'];
      $sql_sheets = "select * from subjects where branch = '$branch'";
      $res_sheets = $conn->query($sql_sheets);
      while($row_sheets = $res_sheets->fetch_array()){
    ?>
    <div class="row">
      <div class="cell" data-title="Product">
        <?php echo $row_sheets['subject_name']; ?>s
      </div>
      <div class="cell" data-title="Unit Price">
        <?php echo $row_sheets['semester'];?>
      </div>
      <div class="cell" data-title="Unit Price">
        <?php echo $row_sheets['subject'];?>
      </div>
    </div>
      <?php } ?>
  
  <div class="table">
        <h1>Students</h1>
    <div class="row header blue">
      <div class="cell">
        Rollno
      </div>
      <div class="cell">
        Name
      </div>
      <div class="cell">
        Semester
      </div>
      <div class="cell">
        Update
      </div>
    </div>
    <?php
    $sql_sem = "select name,rollno,sem from students";
    $res_sem = $conn->query($sql_sem);
    while($row_sem = $res_sem->fetch_array()){
  ?>
    <div class="row">
      <div class="cell" data-title="Username">
        <?php echo $row_sem['rollno'];?>
      </div>
      <div class="cell" data-title="Email">
       <?php echo $row_sem['name'];?>
      </div>
      <div class="cell" data-title="Password">
        <?php echo $row_sem['sem'];?>
      </div>
      <div class="cell">
        <button style="btn btn-success">Update</button>
      </div>
    </div>
    
    <?php } ?>
  </div>
  </center>
</div>
              <?php
            }
            if($view_id == 3){
            ?>
              <div class="form-container" style="padding-left:10%;padding-top:20%;padding-right:5%;">
<div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title">Basic Register Form Using Materialize</span>
<div class="row">
 
    <form class="col s12" id="reg-form">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" name="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
         
        </div>
        <div class="input-field col s6">
          <input id="last_name" name="last_name" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" name="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" name="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
            <?php
            }
            if($view_id == 4){
              ?>
              <form action="" method="post" id="sem">
              <table cellpadding="10%" style="margin-top:30%;">
                <tr>
                  <td>Incase of creation plz enter a name</td>
                  <td><input type="text" name="name" ></td>
                </tr>
                <tr>
                  <td>Select Semester</td>
                  <td>
                      
              <select name="sem"  style="margin:70%;margin-top:10%;margin-left:20%;padding:5px;padding-left:10px;padding-right:10px;">
                    <?php 
                      $sql_select_sem = "select * from semester";
                      $res_sem = $conn->query($sql_select_sem);
                      while($row_sem = $res_sem->fetch_array()){
                        echo "<option>".$row_sem['sem']."</option>";
                      }
                    ?>
                </select>
                  </td>
                  <td>
                    <input style="margin:100%;" type="submit" value="create" name="create" class="btn btn-success">
                    </td><td><input style="margin:100%;" type="submit" value="update" name="update" class="btn btn-danger">
                  </td>
                </tr>
              </table> 
              <?php
                if(isset($_POST['update'])){
                  $_SESSION['selected_sem'] = $_POST['sem'];
                  echo "done".$_SESSION['selected_sem'];
                  echo "<script>document.getElementById('sem').style.display = 'none'</script>";
                  
                }
                if(isset($_POST['create'])){
                  $selectedsem = $_POST['sem'];
                  $tablename = $_POST['name'];
                  echo "<script>window.location.assign('../Timetable/createtimetable.php?id=".$selectedsem."@".$tablename."')</script>";
                }
              ?>
              </form>
              <div id="timetable" >
                <?php
                if(isset($_SESSION['selected_sem'])){
                  $select_sem = $_SESSION['selected_sem'];
                }
                include_once '../createtimetable.php'; ?>
              </div>
              <?php
            }
          }
        ?>
      </div>
  </body>
<html>