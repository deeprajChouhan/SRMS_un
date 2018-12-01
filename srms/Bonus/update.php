<h1>Please Wait.........</h1>
<?php
  error_reporting(0);
  include '../connection.php';
  if(isset($_GET['id'])){
    $value = $_GET['id'];
    $value = explode("@",$value);
    $uniqueid = $value[0];
    $value_array = json_decode($value[1],true);
    $length = count($value_array);
    if($uniqueid == 1){
      for($i=0;$i<$length;$i++){
        $name = $value_array[$i]['name'];$rollno = $value_array[$i]['roll'];
        $internal = '{"faculty":"'.$value_array[$i]['faculty'].'","seminar":"'.$value_array[$i]['seminar'].'","total":"'.$value_array[$i]['total'].'"}';
        $sql = "UPDATE students SET seminar = '$internal' WHERE rollno = '$rollno'";
        if($conn->query($sql) === TRUE){}
      }
      echo "<script>window.location.assign('Nseminar.php')</script>";
    }
    else if($uniqueid == 2){
      for($i=0;$i<$length;$i++){
        $name = $value_array[$i]['name'];$rollno = $value_array[$i]['roll'];
        $internal = '{"other":"'.$value_array[$i]['other'].'","out1":"'.$value_array[$i]['out1'].'",
                      "gov":"'.$value_array[$i]['gov'].'","out2":"'.$value_array[$i]['out2'].'",
                      "total":"'.$value_array[$i]['total'].'"}';
        $sql = "update students set participation = '$internal' where rollno = '$rollno'";
        if($conn->query($sql) === TRUE){}
      }
      echo "<script>window.location.assign('Nparticipation.php')</script>";
    }
    else if($uniqueid == 3){
      for($i=0;$i<$length;$i++){
        $name = $value_array[$i]['name'];$rollno = $value_array[$i]['roll'];
        $internal = '{"National":"'.$value_array[$i]['national'].'","out1":"'.$value_array[$i]['out1'].'",
                      "Inter":"'.$value[$i]['inter'].'","out2":"'.$value[$i]['out2'].'","total":"'.$value[$i]['total'].'"}';
        $sql = "UPDATE students set publication = '$internal' WHERE rollno = '$rollno'";
        if($conn->query($sql) === TRUE){}
      }
      echo "<script>window.location.assign('Npublication.php')</script>";
    }
    else if($uniqueid == 4){
      for($i=0;$i<$length;$i++){
        $name = $value_array[$i]['name'];$rollno = $value_array[$i]['roll'];
        $internal = '{"miniproject":"'.$value_array[$i]['mini'].'","poster":"'.$value_array[$i]['poster'].'","total":"'.$value_array[$i]['total'].'"}';
        $sql = "update students set hobby = '$internal' where rollno = '$rollno'";
        if($conn->query($sql) === true){}
      }
      echo "<script>window.location.assign('Nhobby.php')</script>";
    }
    else if($uniqueid == 5){
      for($i=0;$i<$length;$i++){
        $name = $value_array[$i]['name'];$rollno = $value_array[$i]['roll'];
        $internal = '{"attendence":"'.$value_array[$i]['attendence'].'","evaluation":"'.$value_array[$i]['evaluation'].'","total":"'.$value_array[$i]['total'].'"}';
        $sql = "update students set internet = '$internal' where rollno = '$rollno'";
        if($conn->query($sql) === true){}
      }
      echo "<script>window.location.assign('Ninternet.php')</script>";
    }
    else if($uniqueid == 6){
      for($i=0;$i<$length;$i++){
        $name = $value_array[$i]['name'];$rollno = $value_array[$i]['roll'];
        $internal = '{"attendence":"'.$value_array[$i]['attendence'].'","evaluation":"'.$value_array[$i]['evaluation'].'","total":"'.$value_array[$i]['total'].'"}';
        $sql = "update students set skill = '$internal' where rollno = '$rollno'";
        if($conn->query($sql) === true){}
      }
      echo "<script>window.location.assign('Nskill.php')</script>";
    }
    else if($uniqueid == 7){
      for($i=0;$i<$length;$i++){
        $name = $value_array[$i]['name'];$rollno = $value_array[$i]['roll'];
        $internal = '{"Category":"'.$value_array[$i]['category'].'","Marks":"'.$value_array[$i]['marks'].'","total":"'.$value_array[$i]['marks'].'"}';
        $sql = "update students set tech1 = '$internal' where rollno = '$rollno'";
        if($conn->query($sql) === true){echo "<script>window.location.assign('Ntech1.php')</script>";}
      }
      }
      else if($uniqueid == 8){
        for($i=0;$i<$length;$i++){
          $name = $value_array[$i]['name'];$rollno = $value_array[$i]['roll'];
          $internal = '{"Category":"'.$value_array[$i]['category'].'","Marks":"'.$value_array[$i]['marks'].'","total":"'.$value_array[$i]['marks'].'"}';
          $sql = "update students set sports = '$internal' where rollno = '$rollno'";
          if($conn->query($sql) === true){echo "<script>window.location.assign('Nsports.php')</script>";}
        }
      }
      else if($uniqueid == 9){
        for($i=0;$i<$length;$i++){
          $name = $value_array[$i]['name'];$rollno = $value_array[$i]['roll'];
          $internal = '{"Category":"'.$value_array[$i]['category'].'","Marks":"'.$value_array[$i]['marks'].'","total":"'.$value_array[$i]['marks'].'"}';
          $sql = "update students set tech2 = '$internal' where rollno = '$rollno'";
          if($conn->query($sql) === true){echo "<script>window.location.assign('Ntech2.php')</script>";}
        }
      }
      else if($uniqueid == 10){
        for($i=0;$i<$length;$i++){
          $name = $value_array[$i]['name'];$rollno = $value_array[$i]['roll'];
          $internal = '{"attendence":"'.$value_array[$i]['attendence'].'","total":"'.$value_array[$i]['total'].'"}';
          $sql = "update students set nptel = '$internal' where rollno = '$rollno'";
          if($conn->query($sql) === true){echo "<script>window.location.assign('Nnptel.php')</script>";}
        }
      }
      else if($uniqueid == 12){
          for($i=0;$i<$length;$i++){
            $name = $value_array[$i]['name'];$rollno = $value_array[$i]['roll'];
            $internal = '{"apti1":"'.$value_array[$i]['apti1'].'","apti2":"'.$value_array[$i]['apti2'].'","certificate":"'.$value_array[$i]['certificate'].'","total":"'.$value_array[$i]['total'].'"}';
            echo $sql = "update students set aptitude = '$internal' where rollno = '$rollno'";
            if($conn->query($sql) === true){echo "<script>window.location.assign('Naptitude.php');</script>";}
          }
      }
      else if($uniqueid == 13){
        for($i=0;$i<$length;$i++){
          $name = $value_array[$i]['name'];$rollno = $value_array[$i]['roll'];
          $total_com = $value_array['com1']+$value_array['com2']+$value_array['certificacte'];
          $internal = '{"com1":"'.$value_array[$i]['com1'].'","com2":"'.$value_array[$i]['com2'].'","certificacte":"'.$value_array[$i]['certificacte'].'","total":"'.$total_com.'"}';
          echo $sql = "update students set comunication = '$internal' where name = '$name'";
        if($conn->query($sql) === true){echo "<script>window.location.assign('Ncomunication.php');</script>";}
        }
    }
  }
?>
