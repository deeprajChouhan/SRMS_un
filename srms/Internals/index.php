<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/download.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p class="alignleft"><a style="border:none;background-color:none;" href="../classteacher1.php">
            <span class="glyphicon glyphicon-circle-arrow-left"></span>
          </a>
            </p>
            <p>
                <button style="margin-left:10%;" class = "btn btn-success" onclick="fnExcelReport('internal')">Download</button>
            </p>
<table class="table table-bordered table-condensed table-hover" id="internal">
<tr>
    <td><strong>Name</strong></td>
    <td><strong>Rollno</strong></td>
    <?php   
    include 'fetch_data.php';
    $object = new student;
    $object_subject = new subject;
    $subjects = $object_subject->getSubjects($_SESSION['sem']);
    $marks = $object->getMarks($_SESSION['sem']);
    $count_subject = sizeof($subjects);
    for($j=0;$j<$count_subject;$j++){
        echo "<td><table class='table table-bordered'><tr><td><strong>".$subjects[$j]."</strong></td></tr>
            <tr><td>Sesional1<br>Internals<br>Out of 5</td><td>Sesional2<br>Internals<br>Out of 5</td><td>Sesional3<br>Internals<br>Out of 5</td><td>Atendence<br>Out of 5</td><td style='background-color:yellow;'>Total<br>Out of 20</td></tr></table></td>";
    }
    echo "</tr>";
    $marks = $object->getMarks($_SESSION['sem']);
    $count = $object->getCount($_SESSION['sem']);
    $students = $object->getStudent($_SESSION['sem']);
    for($i=0;$i<$count;$i++){
        $student = explode(",",$students[$i]);
        $marks_array = explode("@",$marks[$i]);
        echo  "<tr><td>".$student[1]."</td><td>".$student[0]."</td>";
        $count_marks_array = sizeof($marks_array);
        for($j=0;$j<$count_marks_array;$j++){
        $mark = explode(",",$marks_array[$j]);
        $total = $mark[6] + $mark[7] + $mark[8];
        echo "<td>
            <table class='table table-bordered'>
                <tr><td>".$mark[6]."</td><td>".$mark[7]."</td><td>".$mark[8]."</td><td></td><td style='background-color:yellow;'>".$total."</td></tr>
            </table>
        </td>";
        }
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>