<?php
    include_once '../connection.php';
    session_start();
    if(isset($_GET['id'])){
        $branchid = $_GET['id'];
    }
    $res_branch = $conn->query("select * from branches where fullname = '$branchid'");
    $row_branch = $res_branch->fetch_assoc();
    $_SESSION['branch_name'] =  $row_branch['name'];
    $_SESSION['branch_students'] =  $row_branch['students'];
    $_SESSION['branch_teachers'] =  $row_branch['teachers'];
    $_SESSION['branch_timetable'] =  $row_branch['timetable'];
    echo "<script>window.location.assign('index.php?id=login')</script>";
?>