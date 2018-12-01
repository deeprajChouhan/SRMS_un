<?php
session_start();
include '../connection.php';
$q = $_GET['q'];
$array = json_decode($q,true);
echo $day =  $array[0]['day'];
echo $subject =  $array[0]['subject'];
echo $lec = $array[0]['lecture'];
$room = $array[0]['room'];
$sem = $_SESSION['selected_sem'];
$sql_select = "select * from lectures where sem = '$sem'";
$res_select = $conn->query($sql_select);
$row_select = $res_select->fetch_array();
$timetable = $row_select['timetable'];
$timetable = json_decode($timetable,TRUE);
$lecture = explode("*",$timetable[$day]);
    $lecture_cell = explode(",",$lecture[$lec]);
    $lecture_cell[0] = $subject;
    $lecture_cell[2] = $room;
$update_cell = implode(",",$lecture_cell);
$lecture[$lec] = $update_cell;
$update_day =  implode("*",$lecture);
$timetable[$day] = $update_day;
$timetable_update = json_encode($timetable);
$sql_update = "update lectures set timetable = '$timetable_update'";
$conn->query($sql_update);
/*
{
    "monday": "sub1,0,0*sub2,0,0*sub3,0,0*sub4,0,0*sub5,0,0*sub6,0,0",
    "tuesday": "sub1,0,0*sub2,0,0*sub3,0,0*sub4,0,0*sub5,0,0*sub6,0,0",
    "wednessday":"sub1,0,0*sub2,0,0*sub3,0,0*sub4,0,0*sub5,0,0*sub6,0,0",
    "thusday": "sub1,0,0*sub2,0,0*sub3,0,0*sub4,0,0*sub5,0,0*sub6,0,0",
    "friday": "sub1,0,0*sub2,0,0*sub3,0,0*sub4,0,0*sub5,0,0*sub6,0,0",
    "saturday": "sub1,0,0*sub2,0,0*sub3,0,0*sub4,0,0*sub5,0,0*sub6,0,0"
}*/
?>