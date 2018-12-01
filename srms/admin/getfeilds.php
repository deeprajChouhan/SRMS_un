<?php
    session_start();
    include '../connection.php';
    $sem =  $_SESSION['operation_sem'];
    $branch = $_SESSION['branch_name'];
    echo "<table>";
    if(isset($_GET['q'])) $num = $_GET['q'];
    for($i=0;$i<$num;$i++){
        echo "<tr>";
        echo "<td><input type='text' placeholder='Subject Initials' id='".$i."init' ></td>";
            echo "<td><input type='text' placeholder='Subject Name' id='".$i."subname'></td>";
            echo "<td>";
            echo "<td><select name='".$i."colname' onchange='addsubject(this.value)'>";
            echo "<option>Subject ID</option>";
            for($j=1;$j<=$num;$j++){
                echo "<option value='sub".$j."/".$i."init/".$i."subname'>sub".$j."</option>";
            }
            echo "</select></td>";
            echo "<td>";
            
            echo "</tr>";
    }
    echo "<tr><td><input type='submit' value='submit' class='btn btn-success'></td></tr>";
    echo "</table>";
?>
<script>
</script>