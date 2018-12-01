<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="icon.png" type="image" sizes="20x20">
<script type="text/javascript">
	function myFunction1() {
	    var x = document.getElementById("myTopnav");
	    if (x.className === "topnav") {
	        x.className += " responsive";
	    } else {
	        x.className = "topnav";
	    }
	}
</script>
<?php
if(isset($_GET['id'])){
      $viewid = $_GET['id'];
    }else{
      $viewid = "home";
    }
?>
 <link rel="stylesheet" type="text/css" href="response.css">
 <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="w3.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
 <script src="bootstrap.min.js"></script>
<!-- HEADER -->
<div class="container">
	<div class="row" id="header1">
		<div class="topnav" id="myTopnav">
		  <img src="logo2.png" class="logosize">
		  <a href="admin.php" id="admin">About</a>
		  <a href="javascript:void(0);" style="font-size:20px;" class="icon" onclick="myFunction1()">&#9776;</a>
		</div>
	</div>
</div>
<?php session_start();
       ?>
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-lg-12 col-sm-12"><center><span class="modify">Student Result Management System</center></span></div>
        <div class="col-md-2"></div>
    </div>
    <?php if($viewid == "home"){?>
        <form action=" " method="POST" style="margin-left:45%;margin-top:10%;display:block;" id="branch">
           <p class="feild"> <select name="branch"><option style="padding:5%;">Select Branch</option>
              <?php 
                include_once '../connection.php';
                $res = $conn->query("select * from branches");
                while($row = $res->fetch_array()){
                  echo "<option name=".$row['name']." style='padding:5%;'>".$row['fullname']."</option>";
                }
              ?>
            </select><input type="submit" name = "branchSubmit"class="btn btn-success" value="select"></p>
              <?php
                if(isset($_POST['branchSubmit'])){
                  header("Location:branch.php?id=".$_POST['branch']);
                }
              ?>
          </form>
              <?php }?>

              <?else if($viewid == "login"){?>
        <form action="" id="loginForm" style="margin-top:10%;margin-bottom:9%;"  method="POST" id="form-1" class="form-1" style="margin-top:15%;padding:35px;padding-bottom:30px;">
        <p class="field">
		<input type="text" name="username" placeholder="Username" style="font-size:25px;font-family:font1;" required/>
		<i class="icon-user icon-large"></i>
	</p>
		<p class="field">
  		<input type="password" name="password" placeholder="Password"  style="font-size:25px;font-family:font1;" required/>
  		<i class="icon-lock icon-large"></i>
	</p>
	<p class="submit">
    	<button type="submit" name="submit" style="padding:20px;"><i class="glyphicon glyphicon-arrow-right"/></i>
	</p> </button>
      </form>
              
        <!--all login-->
        <?php
            if(isset($_GET['error'])){
              echo "<center><h1 style='color:red;'>You must Login First</h1></center>";
            }
            include '../connection.php';
            if(isset($_POST['submit'])){
              $username = $_POST['username'];
              $password = $_POST['password'];
              unset($_SESSION['password']);
              $_SESSION['username'] = $username;
              $branch_students = $_SESSION['branch_students'];
              $branch_teachers = $_SESSION['branch_teachers'];
              echo $sql = "SELECT * FROM $branch_teachers WHERE username = '$username'";
              $res = mysqli_query($conn,$sql);
              $sql_student = "SELECT * FROM $branch_students WHERE rollno = '$username'";
              $res_student = mysqli_query($conn,$sql_student);
              $_SESSION['roll'] = $username;
                   while($row_student = mysqli_fetch_array($res_student)){
                     $_SESSION['sem'] = $row_student['sem'];
                     if($username == $row_student['rollno'] && $password == $row_student['rollno']){
                       header("Location:../student.php");
                     }else{
                       echo "<center><h1 style='color:red;'>Incorrect ID or Password</h1></center>";
                     }
                    }
                      while($row=mysqli_fetch_array($res)){
                        $_SESSION['tname'] = $row['name'];
                        $pos = $row['position'];
                        $_SESSION['pos'] = $pos;
                        $_SESSION['username'] = $username;
                        if($row['username'] == $username && $row['password'] == $password &&$row['position'] == 'classteacher'){
                          header("Location:../classteacher1.php");
                        }
                        elseif($row['username'] == $username && $row['password'] == $password &&$row['position'] == 'subjectteacher'){
                          header("Location:../teacher1.php");
                        }
                        elseif($row['username'] == $username && $row['password'] == $password &&$row['position'] == 'hod'){
                          header("Location:../hod1.php");
                        }
                        else{
                              echo "<center><h1 style='color:red;'>Incorrect ID or Password</h1></center>";
                           }
                        }
                     }


              //error_reporting(0);

          ?>
<br>
<!-- FOOTER -->
<div class="container">
	<div class=" col-sm-12" style="border-top: 1px solid teal;margin-top: 50px;margin-bottom: 20px;padding: 10px; color: teal">
		<div class="col-sm-4"><a href="https://www.sbjit.edu.in"><img title="S. B. Jain Institute of Technology, Management & Research" src="clglogo.png" class="img-responsive"></a></div>
		<div class="col-sm-4" style="text-align: center;">
			<h4>Follow Us On:</h4>
			<div class="col-sm-12">
			<table style="width: 80%; margin-left: 10%; margin-right: 10%;">
				<tr>
					<td><a href="https://www.facebook.com/OFFICIAL.S.B.JAIN/"><img src="facebook.png" class="img-responsive w3-btn w3-white" style="padding: 2px; border-radius: 50%; border:1px solid #ddd;" title="Facebook"></a></td>
					<td><a href="https://www.linkedin.com/in/s-b-jain-nagpur-7a65a3153"><img src="linkedin.png" class="img-responsive w3-btn w3-white" style="padding: 2px; border-radius: 50%; border:1px solid #ddd;" title="LinkedIn"></a></td>
					<td><a href="https://twitter.com/S_B_JAIN_NAGPUR?s=03"><img src="twitter.png" class="img-responsive w3-btn w3-white" style="padding: 2px; border-radius: 50%; border:1px solid #ddd;" title="Twitter"></a></td>
					<td><a href="https://www.youtube.com/channel/UCh6YlSVHhMzX_uQuEj3yAGg"><img src="youtube.png" class="img-responsive w3-btn w3-white" style="padding: 2px; border-radius: 50%; border:1px solid #ddd;" title="YouTube"></a></td>
				</tr>
			</table>
			</div>
		</div>
		<div class="col-sm-4" style="text-align: right;padding: 10px;">
			<div class="col-sm-12">
				<div class="col-sm-3"></div><div class="col-sm-9"><a href="about.php"><img src="send.png" class="img-responsive" title="Send us Message."></a></div>
			</div>
			<div class="col-sm-12" style="margin-top: 10px;">
				<div class="col-sm-3"></div><div class="col-sm-9"><img src="devlope.png" class="img-responsive"></div>
			</div>
		</div>
	</div>
</div>