<?php
session_start();
include '../connection.php';
include 'fetch_data.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
class connection{
    function getConnection(){
        return new mysqli("localhost","root","","srms");
    }
}
class students extends student{
    function getStudentMarks(){
        $outp = "";
        $sem = $_SESSION['sem'];
        $data = student::getMarks($_SESSION['sem']);
        $data1 = student::getStudent($_SESSION['sem']);
        $sub = new subject;
        $subjects = $sub->getSubjects($_SESSION['sem']);
        for($i=0;$i<sizeof($data1);$i++){
            $mark = explode("@",$data[$i]);
            $student_details = explode(",",$data1[$i]);
            if($outp != ""){$outp .= ",";}
            $outp .= '{"name":"'.trim($student_details[1]).'","roll":"'.trim($student_details[0]).'"';
            $bonus_marks = student::getBonusMarks($_SESSION['sem'],$student_details[0]);
            $bonus = student::getBonus($_SESSION['sem'],$student_details[0]);
            $outp .= ',"bonus":"'.$bonus.'"';
            $bonus_marks_array = explode(",",$bonus_marks);
            for($j=0;$j<sizeof($mark);$j++){
                $bonus = $bonus - $bonus_marks_array[$j];
                $marks = explode(",",$mark[$j]);
                $total = $marks[6] + $marks[7] + $marks[8];
                $totals = $total + $bonus_marks_array[$j];
                $outp .= ',"'.$subjects[$j].'":"'.$total.'","'.$subjects[$j].'B":"'.$bonus_marks_array[$j].'","col'.$j.'":"'.$j.''.$subjects[$j].'","comboTotal'.$subjects[$j].'":"'.$totals.'"';
            }
            $outp .= ',"bonusR":"'.$bonus.'"';
            $outp .= '}';
            }
            $outp = '{"records":['.$outp.']}';
            echo $outp;
    }
}
$obj = new students;
$obj->getStudentMarks();
?>