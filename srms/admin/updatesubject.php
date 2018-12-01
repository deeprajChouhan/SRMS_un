<?php
    session_start();
    if(isset($_GET['q'])) $id = $_GET['q'];
    $_SESSION['operation_sem'] = $id;
    echo $_SESSION['operation_sem'];
?>