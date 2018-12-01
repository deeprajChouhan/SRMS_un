<?php
session_start();
include '../connection.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
error_reporting(0);
$uniqueid = $_GET['id'];
$sem = $_SESSION['sem'];
$sql_data_1 = "select * from students where sem = '$sem'";
$result_data = mysqli_query($conn,$sql_data_1);
$out_sheet_data = "";
while($rs = mysqli_fetch_array($result_data,MYSQLI_ASSOC)) {
    $id = $rs['id'];
    $student_name = $rs['name'];
    $student_roll = $rs['rollno'];
    $data_seminar = $rs['seminar'];
    $data_participation = $rs['participation'];
    $data_publication =$rs['publication'];
    $data_sports = $rs['sports'];
    $data_tech1 = $rs['tech1'];
    $data_tech2 = $rs['tech2'];
    $data_hobby = $rs['hobby'];
    $data_nptel = $rs['nptel'];
    $data_skill = $rs['skill'];
    $data_aptitude = $rs['aptitude'];
    $data_internet = $rs['internet'];
    $data_comunication = $rs['comunication'];
    $array_data_seminar = json_decode($data_seminar,true);
    $array_data_participation = json_decode($data_participation,true);
    $array_data_publication = json_decode($data_publication,true);
    $array_data_sports = json_decode($data_sports,true);
    $array_data_tech1 = json_decode($data_tech1,true);
    $array_data_tech2 = json_decode($data_tech2,true);
    $array_data_hobby = json_decode($data_hobby,true);
    $array_data_nptel = json_decode($data_nptel,true);
    $array_data_skill = json_decode($data_skill,true);
    $array_data_internet = json_decode($data_internet,true);
    $array_data_aptitude = json_decode($data_aptitude,true);
    $array_data_comunication = json_decode($data_comunication,true);
    if($uniqueid == 0){
      if ($out_sheet_data != "") {$out_sheet_data .= ",";}
        $out_sheet_data .= '{"roll":"'.trim($student_roll).'",';
        $out_sheet_data .= '"name":"'.trim($student_name). '",';
        $out_sheet_data .= '"faculty":"'.$array_data_seminar['faculty'].'",';
        $out_sheet_data .= '"seminar":"'.$array_data_seminar['seminar'].'",';
        $out_sheet_data .= '"total":"'.$array_data_seminar['total'].'"}';
      }
      if($uniqueid == 1){
    if($out_sheet_data != ""){$out_sheet_data .= ",";}
    $out_sheet_data .= '{"roll":"'.trim($student_roll).'",';
    $out_sheet_data .= '"name":"'.trim($student_name).'",';
    $out_sheet_data .= '"other":"'.trim($array_data_participation['other']).'",';
    $out_sheet_data .= '"out1":"'.trim($array_data_participation['out1']).'",';
    $out_sheet_data .= '"gov":"'.trim($array_data_participation['gov']).'",';
    $out_sheet_data .= '"out2":"'.trim($array_data_participation['out2']).'",';
      $out_sheet_data .= '"total":"'.trim($array_data_participation['out1'] + $array_data_participation['out2']).'"}';
  }
  if($uniqueid == 2){
    if($out_sheet_data != ""){$out_sheet_data .= ",";}
    $out_sheet_data .= '{"roll":"'.trim($student_roll).'",';
    $out_sheet_data .= '"name":"'.trim($student_name).'",';
    $out_sheet_data .= '"national":"'.trim($array_data_publication['National']).'",';
    $out_sheet_data .= '"out1":"'.trim($array_data_publication['out1']).'",';
    $out_sheet_data .= '"inter":"'.trim($array_data_publication['Inter']).'",';
    $out_sheet_data .= '"out2":"'.trim($array_data_publication['out2']).'",';
    $out_sheet_data .= '"total":"'.trim($array_data_publication['total']).'"}';
  }
  if($uniqueid == 3){
    if($out_sheet_data != ""){$out_sheet_data .= ",";}
    $out_sheet_data .= '{"roll":"'.trim($student_roll).'",';
    $out_sheet_data .= '"name":"'.trim($student_name).'",';
    $out_sheet_data .= '"category":"'.($array_data_sports['Category']).'",';
    $out_sheet_data .= '"marks":"'.trim($array_data_sports['Marks']).'",';
    $out_sheet_data .= '"total":"'.($array_data_sports['Marks']).'"}';
  }
  if($uniqueid == 4){
    if($out_sheet_data != ""){$out_sheet_data .= ",";}
    $out_sheet_data .= '{"roll":"'.trim($student_roll).'",';
    $out_sheet_data .= '"name":"'.trim($student_name).'",';
    $out_sheet_data .= '"category":"'.trim($array_data_tech1['Category']).'",';
    $out_sheet_data .= '"marks":"'.trim($array_data_tech1['Marks']).'",';
    $out_sheet_data .= '"total":"'.trim($array_data_tech1['total']).'"}';
  }
  if($uniqueid == 5){
    if($out_sheet_data != ""){$out_sheet_data .= ",";}
    $out_sheet_data .= '{"roll":"'.trim($student_roll).'",';
    $out_sheet_data .= '"name":"'.trim($student_name).'",';
    $out_sheet_data .= '"category":"'.trim($array_data_tech2['Category']).'",';
    $out_sheet_data .= '"marks":"'.trim($array_data_tech2['Marks']).'",';
    $out_sheet_data .= '"total":"'.trim($array_data_tech2['total']).'"}';

  }
  if($uniqueid == 6){
    if($out_sheet_data != ""){$out_sheet_data .= ",";}
    $out_sheet_data .= '{"roll":"'.trim($student_roll).'",';
    $out_sheet_data .= '"name":"'.trim($student_name).'",';
    $out_sheet_data .= '"miniproject":"'.trim($array_data_hobby['miniproject']).'",';
    $out_sheet_data .= '"poster":"'.trim($array_data_hobby['poster']).'",';
    $out_sheet_data .= '"total":"'.trim($array_data_hobby['total']).'"}';
  }
  if($uniqueid == 7){
    if($out_sheet_data != ""){$out_sheet_data .= ",";}
    $out_sheet_data .= '{"roll":"'.trim($student_roll).'",';
    $out_sheet_data .= '"name":"'.trim($student_name).'",';
    $out_sheet_data .= '"attendence":"'.trim($array_data_nptel['attendence']).'",';
    $out_sheet_data .= '"total":"'.trim($array_data_nptel['total']).'"}';
  }
  if($uniqueid == 8){
    if($out_sheet_data != ""){$out_sheet_data .= ",";}
    $out_sheet_data .= '{"roll":"'.trim($student_roll).'",';
    $out_sheet_data .= '"name":"'.trim($student_name).'",';
    $out_sheet_data .= '"attendence":"'.trim($array_data_skill['attendence']).'",';
    $out_sheet_data .= '"evaluation":"'.trim($array_data_skill['evaluation']).'",';
    $out_sheet_data .= '"total":"'.trim($array_data_skill['total']).'"}';
  }
  if($uniqueid == 9){
    if($out_sheet_data != ""){$out_sheet_data .= ",";}
    $out_sheet_data .= '{"roll":"'.trim($student_roll).'",';
    $out_sheet_data .= '"name":"'.trim($student_name).'",';
    $out_sheet_data .= '"attendence":"'.trim($array_data_internet['attendence']).'",';
    $out_sheet_data .= '"evaluation":"'.trim($array_data_internet['evaluation']).'",';
    $out_sheet_data .= '"total":"'.trim($array_data_internet['total']).'"}';
  }
  if($uniqueid == 11){
    if($out_sheet_data != ""){$out_sheet_data .= ",";}
    $total = $array_data_seminar['total'] +
    $array_data_publication['total']+$array_data_participation['total']+
    $array_data_hobby['total']+$array_data_skill['total']+
    $array_data_tech1['total']+$array_data_sports['total']+
    $array_data_tech2['total']+$array_data_nptel['total']+$array_data_internet['total']+
    $array_data_aptitude['total']+$array_data_comunication['total'];
    $out_sheet_data .= '{"roll":"'.trim($student_roll).'",';
    $out_sheet_data .= '"name":"'.trim($student_name).'",';
    $out_sheet_data .= '"total_seminar":"'.trim($array_data_seminar['total']).'",';
    $out_sheet_data .= '"total_participation":"'.$array_data_participation['total'].'",';
    $out_sheet_data .= '"total_publication":"'.$array_data_publication['total'].'",';
    $out_sheet_data .= '"total_hobby":"'.$array_data_hobby['total'].'",';
    $out_sheet_data .= '"total_skill":"'.$array_data_skill['total'].'",';
    $out_sheet_data .= '"total_tech1":"'.$array_data_tech1['total'].'",';
    $out_sheet_data .= '"total_sports":"'.$array_data_sports['total'].'",';
    $out_sheet_data .= '"total_tech2":"'.$array_data_tech2['total'].'",';
    $out_sheet_data .= '"total_nptel":"'.$array_data_nptel['total'].'",';
    $out_sheet_data .= '"total_apti":"'.$array_data_aptitude['total'].'",';
    $out_sheet_data .= '"total_comm":"'.$array_data_comunication['total'].'",';
    $out_sheet_data .= '"total":"'.$total.'",';
    if($total > 25){$total = 25;}
    $out_sheet_data .= '"final_total":"'.$total.'",';
    $out_sheet_data .= '"total_internet":"'.$array_data_internet['total'].'"}';
  }
  if($uniqueid == 12){
    if($out_sheet_data != ""){$out_sheet_data .= ",";}
    $out_sheet_data .= '{"roll":"'.trim($student_roll).'",';
    $out_sheet_data .= '"name":"'.trim($student_name).'",';
    $out_sheet_data .= '"apti1":"'.trim($array_data_aptitude['apti1']).'",';
    $out_sheet_data .= '"apti2":"'.trim($array_data_aptitude['apti2']).'",';
    $out_sheet_data .= '"certificate":"'.trim($array_data_aptitude['certificate']).'",';
    $total = $array_data_aptitude['apti1'] + $array_data_aptitude['apti2'] + $array_data_aptitude['certificate'];
    $out_sheet_data .= '"total":"'.$total.'"}';
  }
  if($uniqueid == 13){
    if($out_sheet_data != ""){$out_sheet_data .= ",";}
    $out_sheet_data .= '{"roll":"'.trim($student_roll).'",';
    $out_sheet_data .= '"name":"'.trim($student_name).'",';
    $out_sheet_data .= '"com1":"'.trim($array_data_comunication['com1']).'",';
    $out_sheet_data .= '"com2":"'.trim($array_data_comunication['com2']).'",';
    $out_sheet_data .= '"certificacte":"'.trim($array_data_comunication['certificacte']).'",';
    $total = $array_data_comunication['com1'] + $array_data_comunication['com2'] + $array_data_comunication['certificacte'];
    $out_sheet_data .= '"total":"'.$total.'"}';
  }
}
$out_sheet_data = '{"records":['.$out_sheet_data.']}';
echo $out_sheet_data;

 ?>
