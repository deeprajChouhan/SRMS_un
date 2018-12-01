<?php
       session_start();
    $branch_students = $_SESSION['branch_students'];

    echo "<h1>Please Wait...........................</h1>";
    include 'connection.php';
    $sem = $_SESSION['sem'];
    $id = $_GET['id'];
    $data_recived = explode("@",$id);
    $subject = $data_recived[0];
    $sql_get_subjectData = "select * from subjects where subject = '$subject' and semester = '$sem'";
    $res_get_subjectData = mysqli_query($conn,$sql_get_subjectData);
    while($row_get_subjectData = mysqli_fetch_array($res_get_subjectData)){
        echo $subject_column = $row_get_subjectData['sub_no'];
    }
    $marks = json_decode($data_recived[1],true);
    $length = count($marks);
    for($i=0;$i<$length;$i++){
        $name = $marks[$i]['name'];$rollno = $marks[$i]['roll'];
        $sesional1 = $marks[$i]['sesional1'];$sesional2 = $marks[$i]['sesional2'];$sesional3 = $marks[$i]['sesional3'];$assign = $marks[$i]['assign'];$tut = $marks[$i]['tut'];
        include 'markspolicy.php';
        $data_insert = "".$subject.",".$sesional1.",".$sesional2.",".$sesional3.",".$tut.",".$assign.",".$intses1.",".$intses2.",".$intses3.",0";
        echo $sql = "UPDATE $branch_students SET $subject_column = '$data_insert' WHERE rollno = '$rollno'";
        if($conn->query($sql) === TRUE){
            if($_SESSION['pos'] == "classteacher"){
                echo "<script>window.location.assign('classteacher1.php?id=1');</script>";  
            }else{
              echo "<script>window.location.assign('teacher1.php?id=1');</script>";
            }
        }
    }
?>
