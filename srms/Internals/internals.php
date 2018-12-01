<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table class="table table-bordered table-condensed table-hover">
<tr>
    <td><strong>Name</strong></td>
    <td><strong>Rollno</strong></td>
    <?php   
    include 'fetch_data.php';
    $object = new student;
    $object_subject = new subject;
    $subjects = $object_subject->getSubjects('3');
    $marks = $object->getMarks('3');
    $count_subject = sizeof($subjects);
    for($j=0;$j<$count_subject;$j++){
        echo "<td><table class='table table-bordered'><tr><td><strong>".$subjects[$j]."</strong></td></tr>
            <tr><td>Sesional1</td><td>Sesional2</td><td>Sesional3</td><td>Atendence</td><td style='background-color:yellow;'>Total</td></tr></table></td>";
    }
    echo "</tr>";
    $marks = $object->getMarks('3');
    $count = $object->getCount('3');
    $students = $object->getStudent('3');
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