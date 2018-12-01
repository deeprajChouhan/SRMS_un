<?php
session_start();
include '../connection.php';
$q = $_GET['q'];
$array = json_decode($q,true);
echo $day =  $array[0]['day'];
echo $type =  $array[0]['type'];
echo $lec = $array[0]['lecture'];
$sem = $_SESSION['selected_sem'];
$sql_select = "select * from lectures where sem = '$sem'";
$res_select = $conn->query($sql_select);
$row_select = $res_select->fetch_array();
$timetable = $row_select['timetable'];
$timetable = json_decode($timetable,TRUE);
$lecture = explode("*",$timetable[$day]);
    $lecture_cell = explode(",",$lecture[$lec]);
    $lecture_cell[1] = $type;
$update_cell = implode(",",$lecture_cell);
$lecture[$lec] = $update_cell;
$update_day =  implode("*",$lecture);
$timetable[$day] = $update_day;
$timetable_update = json_encode($timetable);
$sql_update = "update lectures set timetable = '$timetable_update'";
$conn->query($sql_update);
?>