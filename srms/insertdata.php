<?php
    include 'connection.php';
/*
    $sql = "SELECT name,rollno FROM 6thsem15";
    $res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($res)){
      $studentroll = $row['rollno'];
      $studentname = $row['name'];
        $sql1 = "INSERT INTO students (name,rollno,password,sem) VALUES ('$studentname','$studentroll','$studentroll',5)";
        if ($conn->query($sql1) === TRUE) {
          echo "inserted";
        }
    }*/
   /* $subject = ['CN','OS','DMS','IP','FE'];
    for($i=0;$i<5;$i++){
      $subjectid = $subject[$i];
      $sql = "INSERT INTO subjects (subject,semester) VALUES ('$subjectid',6)";
      if ($conn->query($sql) === TRUE) {
        echo "inserted";
      }
    }*//*
    $i=0;
    $subno = ['sub1','sub2','sub3','sub4','sub5','sub6'];
    $sql_student = "SELECT rollno FROM students WHERE sem = 5";

    $res_student = mysqli_query($conn,$sql_student);

    while($row_student = mysqli_fetch_array($res_student)){
      $sql_subject = "SELECT subject FROM subjects WHERE semester = 5";
      $res_subject = mysqli_query($conn,$sql_subject);
      $studentid = $row_student['rollno'];
        while($row_subject = mysqli_fetch_array($res_subject)){
          $subjectid = $row_subject['subject'];
          $sql_insert = "INSERT INTO marks (studentid,subjectid,subno)
          VALUES ('$studentid','$subjectid','$subno[$i]')";
          $i = $i + 1;
        if($conn->query($sql_insert) === TRUE)
        {echo "inserted";}
        }
        $i=0;
    }*/
    /*$sql_student = "select *from students where sem = '5'";
    $res_student = mysqli_query($conn,$sql_student);
    while($row_student = mysqli_fetch_array($res_student)){
      $student = $row_student['rollno'];
      echo $sql_marks = "UPDATE marks set sem = 5 WHERE studentid = '$student'";
      if($conn->query($sql_marks) === TRUE){
        echo "inserted";
      }else{
        echo $conn->error;
      }
    }
    /*$3rdSem ={'M3','PLDC','EIT','DEFM','DC'};
$4thSem ={'M4','ADS','OOM','TOC','CAO'};
$6thSem ={'CN','OS','DMS','IP','FE'};
$7THSem ={'DWN','CSS','AI','{'MC'.'MS','BI,'CD'},{'STQA','CGC','DSP','DFIT'}}
$8THSem ={'DS','GAP',{'ES','DIP','PR','ML'},{'CS','CC','EERP','WSN'}}*/

//marks
/*
$sql_subject = "select subject from subjects where semester = '3'";
$res_subject = mysqli_query($conn,$sql_subject);
$outp= "";
while($row_subjects = mysqli_fetch_array($res_subject)){
  $subject = $row_subjects['subject'];
  $outp .= ",".$subject;
}
print_r($out);
echo $out[0].",".$out[1].",".$out[2].",".$out[3];
$i = 0;
while($row_subjects = mysqli_fetch_array($res_subject)){
  $id = $row_subjects['count(id)'];
  while($id != 0){
     $value = $out[$id].",0,0,0,0,0";
     $sql = "ALTER TABLE students ADD sub".$id." VARCHAR(255) NOT NULL AFTER sem";
     $sql_update = "update students set sub".$id." = '$value' where sem = '3'";
    if($conn->query($sql) === TRUE){echo "inserted";}
    $id--;
  }
}/*print_r($data);
$data = explode(":",$data);
echo sizeof($data);
for($i=0;$i<sizeof($data);$i++){
  $data1 = explode(",",$data[$i]);
  if($data1[0] == "PLDC"){
    echo "...".$data1[1].",".$data1[2].",".$data1[3].",".$data1[4].",".$data1[5];
  }
}*/
//bonus
$sql_subjects = "select subject,sub_no from subjects where semester = '3'";
$res_subjects = mysqli_query($conn,$sql_subjects);
while($row_subjects = mysqli_fetch_array($res_subjects)){
  $subno = $row_subjects['sub_no'];
  $subject = $row_subjects['subject'];
  echo $sql_students = "select $subno from students where sem = '3'";
  $res_students = mysqli_query($conn,$sql_students);
  while($row_students = mysqli_fetch_array($res_students)){
     $subject_no = $row_students[$subno];
     $subject_array = explode(",",$subject_no);
     $subject_array = "$subject,0,0,0,0,0,0,0,0,0";        
     $sql_insert = "update students set $subno = '$subject_array' where sem='3'";
     if($conn->query($sql_insert) === TRUE){
       echo "inserted";
     }
    }    
}  
?>
