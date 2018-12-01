<?php 
    include '../connection.php';
    if(isset($_GET['q'])) $id = $_GET['q'];
    $sql = "select sem from students where session = '$id'";
    $res = $conn->query($sql);
    $row = $res->fetch_array();
    echo $row['sem'];
?>