<?php
    include '../connection.php';
    session_start();
    if(isset($_GET['id'])) $id = $_GET['id'];
    $id = explode('@',$id);
    print_r($id);
    $branch = $_SESSION['branch_name'];
    $students = $_SESSION['branch_students'];
    echo $sql_select = "select * from subjects where semester = '$id[1]' and branch = '$branch'";
    $res_select = $conn->query($sql_select);
    while($row_select = $res_select->fetch_array()){
        $column = $row_select['sub_no'];
        echo $sql_query_delete = "ALTER TABLE students DROP COLUMN $column";
        $conn->query($sql_query_delete);
    }
    $sql_select = "select * from subjects where semester = '$id[2]' and branch = '$branch'";
    $res_select = $conn->query($sql_select);
    while($row_select = $res_select->fetch_array()){
        $column = $row_select['sub_no'];
        echo $sql_query_add = "ALTER TABLE `students`  ADD `$column` VARCHAR(255) NOT NULL  AFTER `sem`";
        $conn->query($sql_query_add);
    }
    echo $sql = "update $students set sem = '$id[2]' where session = '$id[0]'";
    $conn->query($sql);
    $_SESSION['batch_update'] = $id[2];
    echo "<script>window.location.assign('admin_profile.php?id=2')</script>";
    /*crete column
ALTER TABLE table_name
ADD column_name datatype;

delete column
ALTER TABLE table_name
DROP COLUMN column_name;
*/
?>