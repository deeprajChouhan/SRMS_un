<?php
  
  session_start();
  if(isset($_SESSION['username'])){
    
}else{
  echo "<script>window.location.assign('index.php?error=0');</script>";
}
  include 'getTeacherData.php';
  $userid = $_SESSION['username'];
  $object = new Teacher;
  $teacher = $object->getDetails($userid);
  $_SESSION['subject'] = $teacher['subject'];
  $_SESSION['sem'] = $teacher['sem'];
  $branch_students = $_SESSION['branch_students'];
  $branch_teachers = $_SESSION['branch_students'];
  $branch_timetable = $_SESSION['branch_timetable'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/angular.js"></script>
    <style>
    a{
      font-size:30px;
    }
    .side{
      box-shadow: 0px 4px 2px 4px #888888;
    }
    </style>
    <title></title>
  </head>
  <body>
  <?php
          $count = $object->getSubjectCount($teacher['name']);
          $subjects = $object->getSubjects($teacher['name']);
    ?>
      <div col-md-12 col-lg-12>
      <div class="col-md-4">
      <div class="w3-sidebar w3-bar-block side" style="width:25%;margin-right:2000px;background-color:#008080;">
        <div class="w3-bar-item">
        <center><img src="images/mam.png" style="border-radius:50%;" height="250px" width="250px" responsive></span>
        <center>
        <h1><?php echo $teacher['name'];?></h1>
          <h2>Sem  <?php echo "<strong>".$teacher['sem']."</strong>";?></h2>
          <h3>Subject   <?php echo "<strong>".$teacher['subject']."</strong>";?></h3>
        </center></div>
        <div class="w3-bar-item"><hr></hr></div>
        <a href="classteacher1.php" class="w3-bar-item w3-button">Home</a>
        <a href="#" class="w3-bar-item w3-button">Attendence</a>
        <a href="classteacher1.php?id=2" class="w3-bar-item w3-button">Master Timetable</a>
        <a href="classteacher1.php?id=1" class="w3-bar-item w3-button">Subject Marks</a>
        
      <div class="w3-dropdown-hover" style="margin-bottom:70px;">
  <button class="w3-button"><a href="#" class="w3-bar-item w3-button">Bonus</a></button>
  <div class="w3-dropdown-content w3-bar-block w3-border">
    <a href="Bonus/Nseminar.php" class="w3-bar-item w3-button">Seminar Sheet</a>
    <a href="Bonus/Nparticipation.php" class="w3-bar-item w3-button">Participation Sheet</a>
    <a href="Bonus/Npublication.php" class="w3-bar-item w3-button">Publication Sheet</a>
    <a href="Bonus/Nskill.php" class="w3-bar-item w3-button">Skill Enhancement</a>
    <a href="Bonus/Nnptel.php" class="w3-bar-item w3-button">NPTEL</a>
    <a href="Bonus/Ninternet.php" class="w3-bar-item w3-button">Internet Hour</a>
    <a href="Bonus/Ntech1.php" class="w3-bar-item w3-button">Technical 1</a>
    <a href="Bonus/Ntech2.php" class="w3-bar-item w3-button">Technical 2</a>
    <a href="Bonus/sports.php" class="w3-bar-item w3-button">Sports</a>
    <a href="Bonus/Naptitude.php" class="w3-bar-item w3-button">Aptitude</a>
    <a href="Bonus/Ncomunication.php" class="w3-bar-item w3-button">Comunication</a>
    <a href="Bonus/bonus.php" class="w3-bar-item w3-button">Bonus Sheet</a>
    <a href="Internals/NsubjectWise.php" class="w3-bar-item w3-button">Subject Wise Bonus Addition</a>
    <a href="Internals/afterBonus.php" class="w3-bar-item w3-button">After Bonus Addition</a>

    
    

  </div> 
  </div>
        <a href="mystudents.php" class="w3-bar-item w3-button">My Class</a>
        <a href="internals/" class="w3-bar-item w3-button">Internals</a>
       <?php
        if($count > 1){
          while($count != 0){
            $count--;
        ?>
            <a onclick="changeSubject('<?php echo $subjects[$count]?>')" id="<?php echo $subjects[$count]?>" class="w3-bar-item w3-button"><?php echo $subjects[$count];?></a>
        <?php
      }
    }
      ?>
      
        <a href="logout.php" class="w3-bar-item w3-button">Logout</a>

      </div>
      </div>
      <div clas="col-md-6"></div>
      <div class="col-md-6">
      <?php
      if(isset($_GET['id'])){
        $id = $_GET['id'];
        if($id == 2){
          include 'Timetable/timetable.php';
        }
        else if($id == 1){
          include 'marks.php';
        }
        else if($id == 3){
          include 'Nmarks.php';
        }
      }else{
        include 'timetable.php';
     ?>
      <?php } ?>
      </div>
      </div>
    </div>
    </div>
  </body>
</html>
<script>
function changeSubject(sub){
  window.location.assign("changeSession.php?id=2@"+sub);
}
</script>