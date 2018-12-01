<?php
class Teacher{
  
  function getDetails($userid){
    include 'connection.php';
    $branch_teachers = $_SESSION['branch_teachers']; 
    $sql_get_teacherData = "select * from $branch_teachers where username = '$userid'";
    $result_getData = $conn->query($sql_get_teacherData);
    
     while($rs = $result_getData->fetch_array()){
            $name = $rs['name'];
            $sem = $rs['sem'];
            $subject = $rs['subject'];
            $data_array = array('name'=>$name,'sem'=>$sem,'subject'=>$subject);
          }
          return $data_array;
    }
    function getSubjectCount($name){
      include 'connection.php'; 
      $count = 0;
      $branch_teachers = $_SESSION['branch_teachers'];
      $sql_get_teacherData = "select * from $branch_teachers where name = '$name'";
      $result_getData = $conn->query($sql_get_teacherData);
      while($rs = $result_getData->fetch_array()){
         $count = $count + 1; 
      }
      return $count;
    }
    function getSubjects($name){
      include 'connection.php'; 
      $subject = [];
      $branch_teachers = $_SESSION['branch_teachers'];
      $sql_get_teacherData = "select * from $branch_teachers where name = '$name'";
      $result_getData = $conn->query($sql_get_teacherData);
      while($rs = $result_getData->fetch_array()){
         array_push($subject,$rs['subject']);
      }
      return $subject;
    }
}
 ?>
