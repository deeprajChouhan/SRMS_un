<?php
    include '../connection.php';
    if(isset($_GET['id'])) $sem = $_GET['id'];
    $id = explode("@",$_GET['id']);
    $sem = $id[0];
    $name = $id[1];
   echo  $sql_table = 'select * from sheets where name = "timetable" ';
    $res_table = $conn->query($sql_table);
    $row_table = $res_table->fetch_array();
    $table = explode("@",$row_table['sheet']);
    $sheet = $row_table['sheet'];
    $sql_insert = "insert into lectures (id,name,sem,timetable) values (NULL,'$name','$sem','$sheet')";
    $conn->query($sql_insert);    
    echo "<script>window.location.assign('../admin/admin_profile.php');</script>";
        
?>