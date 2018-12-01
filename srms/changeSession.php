<?php
  session_start();
  include 'connection.php';
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $id = explode("@",$id);
    if($id[1] == 1){
    $_SESSION['subject'] = $id[0];
    echo "<script>window.location.assign('internals.php?edit=0');</script>";
    }
    if($id[0] == 2){
      $sql = "select username from teachers where subject = '$id[1]'";
      $res = $conn->query($sql);
      while($rs = $res->fetch_array()){
        $username = $rs['username'];
        $_SESSION['username'] = $username;
        if($_SESSION['pos'] == "classteacher"){
          echo "<script>window.location.assign('classteacher1.php');</script>";  
        }
        echo "<script>window.location.assign('teacher1.php');</script>";
      }
    }
    if($id[0] == 3){
      $_SESSION['sem'] = $id[1];
      echo "<script>window.location.assign('Internals/afterBonus.php')</script>";
    }
  }
 ?>
