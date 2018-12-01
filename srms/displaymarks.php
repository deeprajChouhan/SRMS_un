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
  <script language="JavaScript">
<style media="screen">
  *{font-family: font1;}

</style>

  <body>
 <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div id="ex1">
<span class="tablehead">Marks and Submission</span>
<table class="table table-hovered table-responsive " class="displaymarks">
<tr>
<td><p>Subjecs</p><td>
<td><p>Sesional1</p></td>
<td><p>Sesional2</p></td>
<td><p>put</p></td>
<td><p>Assignment</p></td>
<td><p>Tutorial</p><td>
</tr>
<?php
    session_start();
    //$year = $_SESSION['year'];
    $rollno = $_SESSION['roll'];
    /*include 'connection.php';
    if($year == "2"){
      $sql_info = "SELECT name,rollno FROM 4thsem16";
      $res_info = mysqli_query($conn,$sql_info);
      $subject = ['EIT,','DC','DMGT','DEFM','ADS','TOC'];

    }
    if($year == "3"){
      $sql_info = "SELECT name,rollno FROM 6thsem15";
      $res_info = mysqli_query($conn,$sql_info);
      $subject = ['JAVA','CG','SP','SE','ECO','DAA'];

    }*/
    $subject = ['JAVA','CG','SP','SE','ECO','DAA'];
             $sqls = "SELECT * FROM 6thsem15 WHERE rollno = '$rollno'";
              $res_info = mysqli_query($conn,$sqls);
              while($row_info = mysqli_fetch_array($res_info)){
                $studentid = $row_info['rollno'];
                $studentname = $row_info['name'];
                for($i=0;$i<6;$i++){
                  $sql_marks = "SELECT sesional1,sesional2,put,assign,tut FROM subjectsfourth WHERE studentid = '$studentid' AND subjectid = '$subject[$i]'";
                  $res_marks = mysqli_query($conn,$sql_marks);
                  while($row_marks = mysqli_fetch_array($res_marks)){
                    echo "
                      <tr>
                        <td>".$row_marks['sesional1']."</td>
                        <td>".$row_marks['sesional2']."</td>
                        <td>".$row_marks['put']."</td>
                        <td>".$row_marks['assign']."</td>
                        <td>".$row_marks['tut']."</td>
                      </tr>
                    ";    
                  }
                }
              }

    ?>

</table>
</div>
  </body>
</html>
