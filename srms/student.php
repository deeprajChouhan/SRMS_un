<?php
session_start();
  if(isset($_SESSION['roll'])){

  }else{
    echo "<script>window.location.assign('index.php?error=0');</script>";
  }
?>
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
  <style>
    *{
      font-family:font1;
    }
  </style>
  </head>
  <body>
    <form action="logout.php"  method="POST">
      <input type="submit" name="logout" value="Logout" class="btn btn-danger"/>
    </form>
<?php
    include 'connection.php';
    $rollno = $_SESSION['roll'];
              $sql_info = "SELECT * FROM students WHERE rollno ='$rollno'";
              $res_info = mysqli_query($conn,$sql_info);
              $i=0;
              while($row_info = mysqli_fetch_array($res_info)){
                $studentid = $row_info['rollno'];
                $studentname = $row_info['name'];
                $sem = $row_info['sem'];
                $sub1 = explode(",",$row_info['sub1']);
                $sub2 = explode(",",$row_info['sub2']);
                $sub3 = explode(",",$row_info['sub3']);
                $sub4 = explode(",",$row_info['sub4']);
                $sub5 = explode(",",$row_info['sub5']);

                echo "
                  <div class='col-md-12 col-lg-12'>
                    <div class='col-md-6 col-lg-6'></div>
                      <div class='col-md-6 col-lg-6 studentIdentity'>
                        <span style='font-size:30px;'><strong>". $studentid."</strong></span><br>
                        <span style='font-size:30px;'><strong>". $studentname."</strong></span>
                      </div>
                    </div>
                " ;
                echo "
                <table class='table table-bordered table-responsive table-hover ' class='displaymarks'>
                <tr>
                <td><p><strong>Subjects</strong></p></td>
                <td><p><strong>Sesional1</strong></p></td>
                <td><p><strong>Sesional2</strong></p></td>
                <td><p><strong>Sesional3</strong></p></td>
                <td><p><strong>Assignment</strong></p></td>
                <td><p><strong>Tutorial</strong></p><td>
                </tr>
                ";
                echo "
                <tr>
                  <td><strong>".$sub1['0']."</strong></td>
                  <td>".$sub1['1']."</td>
                  <td>".$sub1['2']."</td>
                  <td>".$sub1['3']."</td>
                  <td>".$sub1['4']."</td>
                  <td>".$sub1['5']."</td>
                  </tr>

                  <tr>
                    <td><strong>".$sub2['0']."</strong></td>
                    <td>".$sub2['1']."</td>
                    <td>".$sub2['2']."</td>
                    <td>".$sub2['3']."</td>
                    <td>".$sub2['4']."</td>
                    <td>".$sub2['5']."</td>
                    </tr>
                    <tr>
                      <td><strong>".$sub3['0']."</storng></td>
                      <td>".$sub3['1']."</td>
                      <td>".$sub3['2']."</td>
                      <td>".$sub3['3']."</td>
                      <td>".$sub3['4']."</td>
                      <td>".$sub3['5']."</td>
                      </tr>
                      <tr>
                        <td><strong>".$sub4['0']."</strong></td>
                        <td>".$sub4['1']."</td>
                        <td>".$sub4['2']."</td>
                        <td>".$sub4['3']."</td>
                        <td>".$sub4['4']."</td>
                        <td>".$sub4['5']."</td>
                        </tr>
                        <tr>
                          <td><strong>".$sub5['0']."</strong></td>
                          <td>".$sub5['1']."</td>
                          <td>".$sub5['2']."</td>
                          <td>".$sub5['3']."</td>
                          <td>".$sub5['4']."</td>
                          <td>".$sub5['5']."</td>
                          </tr>
                ";
              }
    ?>
   <?php
    class subject{
        function getSubjects($sem){
            include 'connection.php';
            $branch = $_SESSION['branch_name'];
            $sql_getStudentColoumn = "select * from subjects where semester='$sem' and branch = '$branch'";
            $res_subject = $conn->query($sql_getStudentColoumn);
            $column_array = array();
            while($row = $res_subject->fetch_array()){
                $column = $row['sub_no'];
                array_push($column_array,$column);
            }
            $length = sizeof($column_array);
            $subjects = array();
            for($i=0;$i<$length;$i++){   
             $sql_getSubject = "select * from subjects where semester = '$sem' and sub_no = '$column_array[$i]'";
            $result = $conn->query($sql_getSubject);
            while($row = $result->fetch_array()){
                array_push($subjects,$row['subject']);
             $row['subject'];
            }
            }
            return $subjects;
        }
    }
    class column extends subject{
        function getColumnName($subject){
            include 'connection.php';
            $sem = $_SESSION['sem'];
            
            $sql_getSubject = "select * from subjects where subject = '$subject' and semester = '$sem'";
            $result = $conn->query($sql_getSubject);
            while($row = $result->fetch_array()){
                $column_name = $row['sub_no'];
            }
            $column_name;
            return $column_name;
        }
    }
    class internal extends column{
        function getInternals($rollno){
            include 'connection.php';
            $outp = "";
           $subjects = subject::getSubjects($_SESSION['sem']);
           $count = sizeof($subjects);
            for($i=0;$i<$count;$i++){
            $column = column::getColumnName($subjects[$i]);
            $branch_students = $_SESSION['branch_students'];
            $sql_get_studentData = "select $column from $branch_students where rollno = '$rollno'";
            $result = $conn->query($sql_get_studentData);
            while($row = $result->fetch_array()){
                $data = $row[$column];    
                if($outp != ""){$outp .= "@";}
                $outp .= $data;
                }
            }
            return $outp;
        }
    }
    class student extends internal{
        function getMarks($sem){
            include 'connection.php';
            $outp = ""; 
            $branch_students = $_SESSION['branch_students'];
            $sql_getStudent = "select name,rollno from $branch_students where sem = '$sem'";
            $result = $conn->query($sql_getStudent);
            while($row = $result->fetch_array()){
                $roll = $row['rollno'];
                $marks = internal::getInternals($roll);
                if($outp != ""){$outp .= "|";}
                $outp .= $marks;
            }
                $outp = explode("|",$outp);
                return $outp;
        }
        function getStudent($sem){
            $out = "";
            include 'connection.php';
            $branch_students = $_SESSION['branch_students'];
            $sql_student = "select name,rollno from $branch_students where sem = '$sem'";
            $result = $conn->query($sql_student);
            while($row = $result->fetch_array()){
                $roll = $row['rollno'];
                $name = $row['name'];
                if($out != ""){$out .= "|";}
                $out .= "".$roll.",".$name."";
            }
            $out = explode("|",$out);
            return $out;
        }
        function getCount($sem){
            include 'connection.php';
            $count = 0;
            $branch_students = $_SESSION['branch_students'];
            $sql_getCount = "select rollno from $branch_students where sem = '$sem'";
            $result = $conn->query($sql_getCount);
            while($row = $result->fetch_array()){
                $count = $count + 1;
            }
            return $count;
        }
        function getBonusMarks($sem,$roll){
            include 'connection.php';
            $branch_students = $_SESSION['branch_students'];
            $sql = "select bonus from $branch_students where sem = '$sem' and rollno = '$roll'";
            $res = $conn->query($sql);
            $row = $res->fetch_assoc();
            return $row['bonus'];
        }
        function getBonus($sem,$roll){
            error_reporting(0);
            include 'connection.php';
            $branch_students = $_SESSION['branch_students'];
            $sql_total_bonus = "select * from $branch_students where sem='$sem' and rollno='$roll'";
            $res = $conn->query($sql_total_bonus);
            $row = $res->fetch_assoc();
            $student_name = $row['name'];
            $student_roll = $row['rollno'];
            $data_seminar = $row['seminar'];
            $data_participation = $row['participation'];
            $data_publication =$row['publication'];
            $data_sports = $row['sports'];
            $data_tech1 = $row['tech1'];
            $data_tech2 = $row['tech2'];
            $data_hobby = $row['hobby'];
            $data_nptel = $row['nptel'];
            $data_skill = $row['skill'];
            $data_aptitude = $row['aptitude'];
            $data_internet = $row['internet'];
            $data_comunication = $row['comunication'];
            $array_data_seminar = json_decode($data_seminar,true);
            $array_data_participation = json_decode($data_participation,true);
            $array_data_publication = json_decode($data_publication,true);
            $array_data_sports = json_decode($data_sports,true);
            $array_data_tech1 = json_decode($data_tech1,true);
            $array_data_tech2 = json_decode($data_tech2,true);
            $array_data_hobby = json_decode($data_hobby,true);
            $array_data_nptel = json_decode($data_nptel,true);
            $array_data_skill = json_decode($data_skill,true);
            $array_data_internet = json_decode($data_internet,true);
            $array_data_aptitude = json_decode($data_aptitude,true);
            $array_data_comunication = json_decode($data_comunication,true);
            $total = $array_data_seminar['total']+
            $array_data_publication['total']+
            $array_data_participation['total']+
            $array_data_hobby['total']+
            $array_data_skill['total']+
            $array_data_tech1['total']+
            $array_data_sports['total']+
            $array_data_tech2['total']+
            $array_data_nptel['total']+
            $array_data_internet['total']+
            //$array_data_aptitude['total']+
            +$array_data_comunication['total'];
            if($total > 25){$total = 25;}
            return $total;
        }
    }
?> 
<?php
 include_once 'connection.php';
 $rollno = $_SESSION['roll'];
 $column = new column;
 $subjects = $column->getSubjects($_SESSION['sem']);
 $a = array();
 for($i=0;$i<sizeof($subjects);$i++){
     $columns = $column->getColumnName($subjects[$i]);
     $sql = "select $columns from students where rollno = '$rollno'";
     $res = $conn->query($sql);
     $row = $res->fetch_array();
     $array = $row[$columns];
     $array = explode(",",$array);

     $sesional1 = $array[1];
     $sesional2 = $array[2];
     $sesional3 = $array[3];
    
$dataPoints = array(
    array("x"=> $sesional1, "y"=> 40,"indexLabel"=> "Sessional1"),
    array("x"=> $sesional2, "y"=> 40,"indexLabel"=> "Sessional2"),
    array("x"=> $sesional3, "y"=> 40,"indexLabel"=> "Sessional3")
);	
array_push($a,$dataPoints);
 }

?>  
<script>
window.onload = function () {
 <?php 
    for($i=0;$i<sizeof($a);$i++){  
      
 ?>
var chart<?php echo $i;?> = new CanvasJS.Chart("chartContainer<?php echo $i;?>", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Marks in <?php echo $subjects[$i];?>"
	},
	data: [{
		type: "bar", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($a[$i], JSON_NUMERIC_CHECK); ?>
	}]
});
chart<?php echo $i;?>.render();;
<?php } ?>
}
</script>
</head>
<body>
    <?php 
        for($i=0;$i<sizeof($subjects);$i++){
            ?>
    <div id="chartContainer<?php echo $i;?>" style="height: 370px; width: 100%;"></div>            
            <?php
        }
    ?>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html> 
  </body>
</html>
