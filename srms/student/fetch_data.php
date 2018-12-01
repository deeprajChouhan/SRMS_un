<?php
    class subject{
        function getSubjects($sem){
            include '../connection.php';
            $branch = $_SESSION['branch_name'];
            $sql_getStudentColoumn = "select * from subjects where semester='$sem' and branch = '$branch'";
            $res_subject = $conn->query($sql_getStudentColoumn);
            $column_array = array();
            while($row = $res_subject->fetch_array()){
                $column = $row['sub_no'];
                array_push($column_array,$column);
            }
            $length = sizeof($column_array);
            $subjects = array();
            for($i=0;$i<$length;$i++){   
             $sql_getSubject = "select * from subjects where semester = '$sem' and sub_no = '$column_array[$i]'";
            $result = $conn->query($sql_getSubject);
            while($row = $result->fetch_array()){
                array_push($subjects,$row['subject']);
             $row['subject'];
            }
            }
            return $subjects;
        }
    }
    class column extends subject{
        function getColumnName($subject){
            include '../connection.php';
            $sem = $_SESSION['sem'];
            
            $sql_getSubject = "select * from subjects where subject = '$subject' and semester = '$sem'";
            $result = $conn->query($sql_getSubject);
            while($row = $result->fetch_array()){
                $column_name = $row['sub_no'];
            }
            $column_name;
            return $column_name;
        }
    }
    class internal extends column{
        function getInternals($rollno){
            include '../connection.php';
            $outp = "";
           $subjects = subject::getSubjects($_SESSION['sem']);
           $count = sizeof($subjects);
            for($i=0;$i<$count;$i++){
            $column = column::getColumnName($subjects[$i]);
            $branch_students = $_SESSION['branch_students'];
            $sql_get_studentData = "select $column from $branch_students where rollno = '$rollno'";
            $result = $conn->query($sql_get_studentData);
            while($row = $result->fetch_array()){
                $data = $row[$column];    
                if($outp != ""){$outp .= "@";}
                $outp .= $data;
                }
            }
            return $outp;
        }
    }
    class student extends internal{
        function getMarks($sem){
            include '../connection.php';
            $outp = ""; 
            $branch_students = $_SESSION['branch_students'];
            $sql_getStudent = "select name,rollno from $branch_students where sem = '$sem'";
            $result = $conn->query($sql_getStudent);
            while($row = $result->fetch_array()){
                $roll = $row['rollno'];
                $marks = internal::getInternals($roll);
                if($outp != ""){$outp .= "|";}
                $outp .= $marks;
            }
                $outp = explode("|",$outp);
                return $outp;
        }
        function getStudent($sem){
            $out = "";
            include '../connection.php';
            $branch_students = $_SESSION['branch_students'];
            $sql_student = "select name,rollno from $branch_students where sem = '$sem'";
            $result = $conn->query($sql_student);
            while($row = $result->fetch_array()){
                $roll = $row['rollno'];
                $name = $row['name'];
                if($out != ""){$out .= "|";}
                $out .= "".$roll.",".$name."";
            }
            $out = explode("|",$out);
            return $out;
        }
        function getCount($sem){
            include '../connection.php';
            $count = 0;
            $branch_students = $_SESSION['branch_students'];
            $sql_getCount = "select rollno from $branch_students where sem = '$sem'";
            $result = $conn->query($sql_getCount);
            while($row = $result->fetch_array()){
                $count = $count + 1;
            }
            return $count;
        }
        function getBonusMarks($sem,$roll){
            include '../connection.php';
            $branch_students = $_SESSION['branch_students'];
            $sql = "select bonus from $branch_students where sem = '$sem' and rollno = '$roll'";
            $res = $conn->query($sql);
            $row = $res->fetch_assoc();
            return $row['bonus'];
        }
        function getBonus($sem,$roll){
            error_reporting(0);
            include '../connection.php';
            $branch_students = $_SESSION['branch_students'];
            $sql_total_bonus = "select * from $branch_students where sem='$sem' and rollno='$roll'";
            $res = $conn->query($sql_total_bonus);
            $row = $res->fetch_assoc();
            $student_name = $row['name'];
            $student_roll = $row['rollno'];
            $data_seminar = $row['seminar'];
            $data_participation = $row['participation'];
            $data_publication =$row['publication'];
            $data_sports = $row['sports'];
            $data_tech1 = $row['tech1'];
            $data_tech2 = $row['tech2'];
            $data_hobby = $row['hobby'];
            $data_nptel = $row['nptel'];
            $data_skill = $row['skill'];
            $data_aptitude = $row['aptitude'];
            $data_internet = $row['internet'];
            $data_comunication = $row['comunication'];
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
            $total = $array_data_seminar['total']+
            $array_data_publication['total']+
            $array_data_participation['total']+
            $array_data_hobby['total']+
            $array_data_skill['total']+
            $array_data_tech1['total']+
            $array_data_sports['total']+
            $array_data_tech2['total']+
            $array_data_nptel['total']+
            $array_data_internet['total']+
            //$array_data_aptitude['total']+
            +$array_data_comunication['total'];
            if($total > 25){$total = 25;}
            return $total;
        }
    }
?>