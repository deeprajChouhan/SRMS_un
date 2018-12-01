<?php
    class column{
        function getColumn($subject){
            include '../connection.php';
            $sql = "select sub_no from subjects where subject = '$subject'";
            $res = $conn->query($sql);
            $row = $res->fetch_assoc();
            return $row['sub_no'][3];
        }
    }
    include '../connection.php';
    if(isset($_GET['id'])){
        echo $id = $_GET['id'];
        $bonus_marks = json_decode($id,true);
        sizeof($bonus_marks);
        for($i=0;$i<sizeof($bonus_marks);$i++){
            $name = $bonus_marks[$i]['name'];
            $roll = $bonus_marks[$i]['roll'];
            $internal = $bonus_marks[$i]['internal'];
            $bonus = $bonus_marks[$i]['bonus'];
            $subject = $bonus_marks[$i]['subject'];
            $object = new column;
            echo $subject;
            $column = $subject[0];
            echo $sql = "select bonus from students where rollno = '$roll'";
            $res = $conn->query($sql);
            $row = $res->fetch_array();
            $bonus_array = explode(",",$row['bonus']);
            $bonus_array[$column] = $bonus;
            $outp = "";
            for($j=0;$j<sizeof($bonus_array);$j++){
                 if($outp != ""){$outp .= ",";}
                 $outp .= $bonus_array[$j];
            }
            echo $sql_update = "update students set bonus = '$outp' where rollno = '$roll'";
            if($conn->query($sql_update)){echo "<script>window.location.assign('subjectWise.php')</script>";}
        }
    }
?>