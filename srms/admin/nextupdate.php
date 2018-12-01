<?php
    session_start();
    include '../connection.php';
    $sem = $_SESSION['batch_update'];
    $students = $_SESSION['branch_students'];
    echo $sem;
    $branch = $_SESSION['branch_name'];
    echo $sql = "select * from subjects where semester = '$sem' and branch = '$branch'";
    $res = $conn->query($sql);
    while($row = $res->fetch_array()){
        $column = $row['sub_no'];
        $value = $row['subject'].",0,0,0,0,0,0,0,0,0";
        echo $sql_insert = "update $students set $column = '$value' where sem = $sem";
        $conn->query($sql_insert);
    }
    echo $sql_students = "select * from $students where sem = $sem";
    $res = $conn->query($sql_students);
    while($row = $res->fetch_array()){
        $roll = $row['rollno'];
        $sql_sheets = "select * from sheets";
        $res_sheets = $conn->query($sql_sheets);
        while($row_sheets = $res_sheets->fetch_array()){
            $column_name = $row_sheets["name"];
            $sheet = $row_sheets["sheet"];
            if($sheet == 'timetable') break;
            echo $sql_update = "update $students set $column_name = '$sheet' where rollno = '$roll'";
            $conn->query($sql_update);
        }
    }
    echo "<script>window.location.assign('admin_profile.php')</script>";
?>