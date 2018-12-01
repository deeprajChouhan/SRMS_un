<!DOCTYPE html>
<html>
<head>
	<title>hod page</title>
	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
	session_start();
	include 'connection.php'; ?>

		 <script type="text/javascript">
		 function displayAsign(name){
			 document.location = "asign.php?name="+name;
		 }
			function openTeachers(){
				document.getElementById('actions').style.display="none";
				document.getElementById('teachers').style.transition = "1s";
				document.getElementById('teachers').style.display = "block";
				document.getElementById('teachers').style.height = "100%";
				document.getElementById('closeBtn').style.display = "block";
			}
			function closeTeacher(){
				document.getElementById('teachers').style.display = "none";
				document.getElementById('teachers').style.transition = "10s";
				document.getElementById('actions').style.display="block";

			}
		 </script>
</div>
	<div class="container-fluid">
	<div class="row">
		<div class="jumbotron col-md-12 col-lg-12">
			<div class="col-md-7 col-lg-7">
				<span><center><img src="images/mam.png" style="border-radius:50%;margin-left:70px;" height="25%" width="25%" responsive/></center></span>
			</div>
			<?php
				$pos = $_SESSION['pos'];
				//$id = $_SESSION['id'];
				$hodName = $_SESSION['tname'];
				$sql = "SELECT * FROM teachers WHERE name = '$hodName'";
				$res = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($res)){
					$name = $row['name'];
					$username = $row['username'];
				 }
			?>
			<div class="col-md-5 col-lg-5"><center>
				<span style="font-family:font1;font-size:55px;word-spacing:5px;"><strong>HOD IT DEPT<strong></span><br>
				<span style="font-family:font1;font-size:40px;text-decoration: underline;"><?php echo $hodName; ?></span>

			<form action="logout.php"  method="POST">
					<input type="submit" name="logout" value="Logout" class="btn btn-danger" style="width:30%;float:right;margin-left:10%;"/>
				</form></strong>
			</center></div></div>
			<div class="clearfix"></div>
			<!..Teachers List..>
			<div class="clearfix"></div>
			<div class="actions col-md-12" id="actions">
				<span class="card col-25" style="font-size:30px;cursor:pointer" onclick="openTeachers()" style="background-color:#7ec0ee;margin-left:0px;"><center>Teachers</center></span>
				<span class="card col-25 " style="background-color:#FFFF66 "><center>Attendence</center></span>
				<span class="card col-25" style="background-color:#FF9999 "><center><?php echo"<a href='createtimetable.php?tname=$pos'>Timetable</a>";  ?></center></span>
				<div class="clearfix"></div>
				<span class="card col-25" style="background-color:#FFFF99"><center><a href="admin_login.php">Admin</a></center></span>
				<span class="card col-25" style="font-size:30px;cursor:pointer" style="background-color:#7ec0ee;margin-left:0px;"><center>Bonus</center></span>
				<span class="card col-25 " style="background-color:#FFFF66 "><center>Internals</center></span>
				<div class="clearfix"></div>
				<span class="card col-25" style="background-color:#FF9999 "><center><a href="teacher1.php">My Subject</a></center></span>
				<span class="card col-25" style="background-color:#FFFF99"><center><a href="assign_teacher.php">New Teacher</a></center></span>
			</div>
			<div class="col-md-12 col-lg-12" id="teachers" style="display:none;width:95%;border-radius:5px;border:0px;font-family: font1;font-size: 25px;padding:5px;background-color:#003366;color:white;">
		<div class="close" style="float:right;">

		<a href="javascript:void(0)" id="closeBtn" class="closebtn" onclick="closeTeacher()" style="display:none;color:white;">&times;</a>
		</div>
				<center>
					<div class='col-md-2'>Sr no</div>
					<div class='col-md-7'>Name</div>
					<div class='col-md-3'>Subject</div>
				</center>
			<?php
				$sql = "SELECT * FROM teachers WHERE name != 'ADMIN'";
				$res = mysqli_query($conn,$sql);
				$srno = 1;
				while($row = mysqli_fetch_array($res)){
					$tname = $row['name'];
					$tsem = $row['sem'];
					$tsub = $row['subject'];
					$pos = $row['position'];
					if($pos != "hod"){
					echo "
						<div class='list col-md-12 col-lg-12' onclick='displayAsign(".$tname.");' style='margin:2%;margin:5px;'>
						<center>
						<div class='col-md-1'>".$srno."</div>
						<div class='col-md-7'><a href='taskteacher.php?name=".$tname."'>".$tname."</a></div>
						<div class='col-md-2'>".$tsub."</div>
						<div class='col-md-2'>-></div>
						</center>
						</div>";
					}
					$srno++;
				}

			 ?>
</div>
			<center></center>
</div>
	</div>
</body>
</html>
