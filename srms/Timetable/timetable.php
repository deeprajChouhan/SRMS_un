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
    <strong>
  <div class="backBtn">
    
  </div>

    <?php
         
          $pos = $_SESSION['pos'];
     ?>
  <H1><FONT COLOR="DARKCYAN"><CENTER>COLLEGE  TIME  TABLE</FONT></H1>
  <table border="3" align="center" width="1000" class="table table-responsive table-condensed table-hovered">
  <tr>
   <td align="center" height="40">
   <td align="center"><font color="red" >Semester
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
  $day = ['Monday','','','Tuesday','','','Wednesday','','','Thursday','','','Friday','','','Saturday','',''];
  $day1 =['','Monday','','','Tuesday','','','Wednesday','','','Thursday','','','Friday','','','Saturday',''];
  $day2 =['','','Monday','','','Tuesday','','','Wednesday','','','Thursday','','','Friday','','','Saturday'];
  for($i=0;$i<18;$i++){
      if($i%3==0){
  $sql = "SELECT * FROM lectures WHERE sem='3' AND days='$day[$i]'";
  $res = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($res)){
    echo "
    <tr rowsize=''>
     <td align='center'  style='background-color:#F4F6F6;'><font color='blue' height='50' align='bottom'>".$row['days']."
     <td style='background-color:#F4F6F6;'><font color='#E59866'>3rdSem
     <div ><td id='cell1".$row['id']."".$row['days']."' align='center'height='50'>".$row['lec1']."</div><br>
     <div ><td id='cell2".$row['id']."".$row['days']."' align='center'height='50'>".$row['lec2']."</div><br>
     <div ><td id='cell3".$row['id']."".$row['days']."' align='center'height='50'>".$row['lec3']."</div><br>
     <div ><td id='cell4".$row['id']."".$row['days']."' align='center'height='50'>".$row['lec4']."</div><br>
     <div ><td id='cell5".$row['id']."".$row['days']."' align='center'height='50'>".$row['lec5']."</div><br>
     <div ><td id='cell6".$row['id']."".$row['days']."' align='center' height='50'>".$row['lec6']."</div><br>
    </tr>";
  }
      }
if($i%3==1){
      $sql = "SELECT * FROM lectures WHERE sem='5' AND days='$day1[$i]'";
  $res = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($res)){
    echo "
    <tr rowsize='' style='background-color:powderblue;'>
     <td align='bottom'  style='background-color:#F4F6F6;'></td>
     <td style='background-color:#F4F6F6;'><font color='#922B21' >5th sem
     <div ><td id='cell1".$row['id']."".$row['days']."' align='center'height='50'>".$row['lec1']."</div><br>
     <div ><td id='cell2".$row['id']."".$row['days']."' align='center'height='50'>".$row['lec2']."</div><br>
     <div ><td id='cell3".$row['id']."".$row['days']."' align='center'height='50'>".$row['lec3']."</div><br>
     <div ><td id='cell4".$row['id']."".$row['days']."' align='center'height='50'>".$row['lec4']."</div><br>
     <div ><td id='cell5".$row['id']."".$row['days']."' align='center'height='50'>".$row['lec5']."</div><br>
     <div ><td id='cell6".$row['id']."".$row['days']."' align='center' height='50'>".$row['lec6']."</div><br>
    </tr>";
  }
    }
 if($i%3==2) {
  $sql = "SELECT * FROM lectures WHERE sem='7' AND days='$day2[$i]'";
  $res = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($res)){
    echo "
    <tr rowsize='' style='background-color:#CCD1D1;'>
     <td align='center'  style='background-color:#F4F6F4;'></td>
     <td style='background-color:#F4F6F6;'><font color='red'>7th Sem
     <div ><td id='cell1".$row['id']."".$row['days']."' align='center'height='50'>".$row['lec1']."</div><br>
     <div ><td id='cell2".$row['id']."".$row['days']."' align='center'height='50'>".$row['lec2']."</div><br>
     <div ><td id='cell3".$row['id']."".$row['days']."' align='center'height='50'>".$row['lec3']."</div><br>
     <div ><td id='cell4".$row['id']."".$row['days']."' align='center'height='50'>".$row['lec4']."</div><br>
     <div ><td id='cell5".$row['id']."".$row['days']."' align='center'height='50'>".$row['lec5']."</div><br>
     <div ><td id='cell6".$row['id']."".$row['days']."' align='center' height='50'>".$row['lec6']."</div><br>
    </tr>";
  }
      }

      
      
      
   /* if($row['lec1'] == $subject){
      echo "<script type='text/javascript'>document.getElementById('cell1".$row['id']."".$row['days']."').style.color = 'red';</script>";
    }
 if($row['lec2'] == $subject){
      echo "<script type='text/javascript'>document.getElementById('cell2".$row['id']."".$row['days']."').style.color = 'red';</script>";
    }

    if($row['lec3'] == $subject){
      echo "<script type='text/javascript'>document.getElementById('cell3".$row['id']."".$row['days']."').style.background-color = 'red';</script>";
    }

    if($row['lec4'] == $subject){
      echo "<script type='text/javascript'>document.getElementById('cell4".$row['id']."".$row['days']."').style.color = 'red';</script>";
    }

    if($row['lec5'] == $subject){
      echo "<script type='text/javascript'>document.getElementById('cell5".$row['id']."".$row['days']."').style.color = 'red';</script>";
    }

    if($row['lec6'] == $subject){
      echo "<script type='text/javascript'>document.getElementById('cell6".$row['id']."".$row['days']."').style.color = 'red';</script>";
    }*/
  

} ?>
       </strong>
</body>
</html>
