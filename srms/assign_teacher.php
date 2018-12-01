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
  <script>

  	</script>
  <style>
  /* Style inputs, select elements and textareas */
  body {
     background-color:#212F3D;
  }
  h1   {color: white;}

</style>
</head>
  <body>
  <div id="ex1">
    <center>
   <h1>New Teacher</h1>
 </center>
  <div class="container">
  <form method="POST">
    <div class="row">
      <div class="col-25">
        <label for="usrname">UserName</label>
      </div>
      <div class="col-75">
        <input type="text" id="usrname" name="username" placeholder="Your name.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="pass">Password</label>
      </div>
      <div class="col-75">
        <input type="password" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password" placeholder="password." required>
      </div>
    </div>

<div class="row">
  <div class="col-25">
    <label for="nme">Name</label>
  </div>
  <div class="col-75">
    <input type="text" id="nme" name="name" placeholder="Your name.." required>
  </div>
</div>
<div class="row">
  <div class="col-25">
    <label for="nme">Position</label>
  </div>

  <div class="col-75">
  	<select name = "position">
  <option value="">--Position--</option>
  <option value="practicalteacher" >practical incharge</option>
  <option value="classteacher" >class teacher</option>
  <option value="subjectteacher">subject teacher</option>
</select>
	</div>
</div>
   <div class="row">
      <div class="col-25">
        <label for="pass">Semester</label>
      </div>
      <div class="col-75">
<select id="car" onchange="changeSubject()" name="sem">
  <option value="">--Select Semester--</option>
  <option value="3">3rd Semester</option>
  <option value="4">4rd Semester</option>
  <option value="5">5rd Semester</option>
  <option value="6">6rd Semester</option>
  <option value="7">7th Semester</option>
  <option value="8">8th Semester</option>
</select>
<select id = "carmodel" name="sub"></select>
<?php
$thirdsem = [ 'DC','DEFM','EIT','M3','PLDC'];
$fourthsem =  ['ADS', 'CAO','DMGT', 'OOM', 'TOC'];
$fifthsem = ['CG','DAA', 'JAVA', 'SE','SP'];
$sixthsem = ['CN','OS','DBMS','IP','FE'];
$seventhsem = ['DWM','CSS','AI','MC','MS','BI','CD','STQA','CGC','DSP','DFIT'];
$eightsem = ['DS','GAP','ES','DIP','PR','ML','CS','CC','EERP','WSN'];
 ?>
<script>
var carsAndModels = {};
carsAndModels['3'] = [ 'DC','DEFM','EIT','M3','PLDC'];
carsAndModels['4'] = ['ADS', 'CAO','DMGT', 'OOM', 'TOC'];
carsAndModels['5'] = ['CG','DAA', 'JAVA', 'SE','SP'];
carsAndModels['6'] =['CN','OS','DBMS','IP','FE'];
carsAndModels['7']=['DWM','CSS','AI','MC','MS','BI','CD','STQA','CGC','DSP','DFIT'];
carsAndModels['8']=['DS','GAP','ES','DIP','PR','ML','CS','CC','EERP','WSN'];

function changeSubject() {
    var carList = document.getElementById("car");
    var modelList = document.getElementById("carmodel");
    var selCar = carList.options[carList.selectedIndex].value;
    while (modelList.options.length) {
        modelList.remove(0);
    }
    var cars = carsAndModels[selCar];
    if (cars) {
        var i;
        for (i = 0; i < cars.length; i++) {
            var car = new Option(cars[i],i );
            modelList.options.add(car);
        }
    }
}
</script>
<div class="col-md-6 text-center"><br>
<input type="submit" id="singlebutton" name="submit" value="Submit" class="btn btn-primary"/>
<?php
  include 'connection.php';
  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $sem = $_POST['sem'];
    $sub = $_POST['sub'];
    echo $username,$password,$name,$position,$sem,$sub;
    if($sem == '3'){$subject = $thirdsem[$sub];}
    else if($sem == '4'){$subject = $fourthsem[$sub];}
    else if($sem == '5'){$subject = $fifthsem[$sub];}
    else if($sem == '6'){$subject = $sixthsem[$sub];}
    else if($sem == '7'){$subject = $seventhsem[$sub];}
    else if($sem == '8'){$subject = $eightsem[$sub];}
    $sql_insert = "INSERT INTO teachers (username,password,name,sem,subject,position) VALUES ('$username','$password','$name','$sem','$subject','$position')";
    if($conn->query($sql_insert) === TRUE){
      echo "successfully created record";
    }
  }
 ?>
</div>
</form>
</body>
</html>
