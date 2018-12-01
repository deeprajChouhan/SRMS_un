<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body><?php 
          $pos = $_SESSION['pos'];
   ?>
    <div class="backBtn">
      <p class="alignleft"><button onclick = "openNav()" style="border:none;background-color:none;border-radius:50%;">
      <span class="glyphicon glyphicon-circle-arrow-left"></span>
    </button>
      </p>
      <div id="mySidenav" class="sidenav" style="right: 1;left:0;">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <?php if($pos == "classteacher"){ ?>
        <table border="0" class="col-75">
          <tr><td><a href="<?php echo "classteacher.php?id=$id"; ?>">Home</a></td></tr>
          <tr><td>Students</td></tr>
          <tr><td ><a href="timetable.php">Lectures</a></td></tr>
          <tr><td><a href="marks.php">Subject Marks</a></td></tr>
          <tr><td><a href="internals.php">Subject Internals</a></td></tr>
          <tr><td><a href="mystudents.php">Class Marks</a></td></tr>
          <tr><td><a href="classinternals.php">Class Internals</a></td></tr>
          <tr><td><span onclick="showSheets()">Bonus</span></td></tr>
        </table>
      <?php }else if($pos == "subjectteacher"){ ?>
        <table border="0">
          <tr><td><a href="<?php echo "teacher.php?id=$id"; ?>">Home</a></td></tr>
          <tr><td>Students</td></tr>
          <tr><td><a href="timetable.php">Lectures</td></tr>
          <tr><td><a href="marks.php">Subject Marks</td></tr>
          <tr><td><a href="internals.php">Subject Internals</td></tr>
        </table>
      <?php } ?>
    </div>
  </body>
</html>
<script type="text/javascript">

function openNav() {
    document.getElementById("mySidenav").style.width = "55%";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
