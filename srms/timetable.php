<!DOCTYPE html>
<html lang="en">
<head>
   <title>time table</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>

      </style>
</head>
<body>
  <div class="backBtn">
    
  </div>
  <H1><FONT COLOR="DARKCYAN"><CENTER>COLLEGE  TIME  TABLE</FONT></H1>
  <table border="3" align="center" width="1000" class="table table-responsive">
  <tr>
   <td align="center" height="40">
   <td align="center"><font color="blue" >10.30-11.30
   <td align="center"><font color="blue" >11.30-12.30
   <td align="center"><font color="blue" >12.30-1.30
   <td align="center"><font color="blue" >2.30-3.30
   <td align="center"><font color="blue" >3.30-4.30
   <td align="center"><font color="blue" >4.30-5.30
  </tr>
  <?php
  $subject = $_SESSION['subject'];
  $year = $_SESSION['sem'];
  include 'connection.php';
  $day = ['monday','tuesday','wednessday','thusday','friday','saturday'];
  $sql = "SELECT * FROM lectures WHERE sem='$year'";
  $res = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($res);
    $timetable = $row['timetable'];
    $timetable = json_decode($timetable,TRUE);
    for($i=0;$i<6;$i++){
      
    echo "
    <tr rowsize=''>
     <td align='center'><font color='blue' height='80'>".$day[$i]."";
      $lecture = explode("*",$timetable[$day[$i]]);
      for($k=0;$k<sizeof($lecture);$k++){
         $lecture_cell = explode(",",$lecture[$k]);
     echo "<div ><td  align='center'height='80'><strong>".$lecture_cell[0]."</strong> <br>";
        if($lecture_cell[1] == "t") echo "Theory";
        if($lecture_cell[1] == "t_p") echo "Theory & practical";
        if($lecture_cell[1] == "tut") echo "Tutorial";
        if($lecture_cell[1] == "e") echo "Extra";
     echo "<br>".$lecture_cell[2]."</div></td>
     ";
    }
    echo "</tr>";
  } ?>
</body>
</html>
