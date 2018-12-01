<?php 
    include '../connection.php';
    session_start();
    $branch = $_SESSION['branch_name'];
    $sem = $_SESSION['operation_sem'];
    if(isset($_GET['q'])) $id = $_GET['q'];
    $json_array = json_decode($id,true);
    $initials = $json_array['initials'];
    $name = $json_array['name'];
    $id = $json_array['subid'];
    $sql = "insert into subjects (id,subject,semester,sub_no,subject_name,branch) values (NULL,'$initials',$sem,'$id','$name','$branch')";
    $conn->query($sql);
?>