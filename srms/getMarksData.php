<?php
session_start();
$branch_name = $_SESSION['branch_name'];
$branch_students = $_SESSION['branch_students'];
include 'connection.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$out_sheet_data = "";
$sem = $_SESSION['sem'];
$id = $_GET['getSub'];
$sql_get_subno = "select sub_no,subject from subjects where semester = '$sem' and branch = '$branch_name'";
$res_get_subno = mysqli_query($conn,$sql_get_subno);
$subno = "";
$subject = "";
while($row_get_subno = mysqli_fetch_array($res_get_subno)){
    if($subno != ""){$subno .= ",";}
    if($subject != ""){$subject .= ",";}
    $subno .= $row_get_subno['sub_no'];
    $subject .= $row_get_subno['subject'];
}
$subno_array = explode(",",$subno);
$subject_array = explode(",",$subject);
$subno_array_length = count($subno_array);
$sql_get_data = "select $subno,name,rollno from $branch_students where sem='$sem'";
$res_get_data = mysqli_query($conn,$sql_get_data);
$marks_send = "";
while($row_get_data = mysqli_fetch_array($res_get_data)){

    $student_name = $row_get_data['name'];
    $student_roll = $row_get_data['rollno'];
    if($marks_send != ""){$marks_send .= ",";}
    $marks_send .= '{"name":"'.trim($student_name).'","roll":"'.trim($student_roll).'",';
    for($i=0;$i<$subno_array_length;$i++){
        $selected_column = $row_get_data[$subno_array[$i]];
        $selected_column_array = explode(",",$selected_column);
        if($id == $selected_column_array[0]){
            $marks_send .= '
            "sesional1":"'.trim($selected_column_array[1]).'",
            "sesional2":"'.trim($selected_column_array[2]).'",
            "sesional3":"'.trim($selected_column_array[3]).'",
            "tutorials":"'.trim($selected_column_array[4]).'",
            "assign":"'.trim($selected_column_array[5]).'"}
            ';
        }
    }

}
$marks_send = '{"records":['.$marks_send.']}';
echo $marks_send;
?>
