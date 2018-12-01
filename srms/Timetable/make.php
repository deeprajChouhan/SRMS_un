<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="../js/angular.js"></script>
  </head>
  <body ng-app="myapp" ng-controller="myCtrl">
    <div class="Year-Buttons col-md-12 col-lg-12">
      
    </div>
    <div class="clearfix"></div>
    <H1><FONT COLOR="DARKCYAN"><CENTER>COLLEGE  TIME  TABLE</FONT></H1>
    <table border="3" align="center" width="1500" class="table table-condensed">
    <tr>
     <td align="center" height="20">
     <td align="center"><font color="blue" >10.30-11.30
     <td align="center"><font color="blue" >11.30-12.30
     <td align="center"><font color="blue" >12.30-1.30
     <td align="center"><font color="blue" >2.30-3.30
     <td align="center"><font color="blue" >3.30-4.30
     <td align="center"><font color="blue" >4.30-5.30
    </tr>
      <div><form method="post">
        <table  id="2ndyear" style="overflow:scroll;" class="table table-responsive table-bordered">
        <?php/*
          $semester = [3,4,5,6,7,8];
          for($i=0;$i<6;$i++){
            if($semester[$i] == $currentSem){

            }
          }
        */?>
          <?php
          include '../connection.php';
          $selected_sem = $_SESSION['selected_sem'];
          $branch_name = $_SESSION['branch_name'];
          $day = ['monday','tuesday','wednesday','thusday','friday','saturday'];
          for($j=0;$j<6;$j++){
            $sql = "SELECT * FROM lectures WHERE sem='$selected_sem' AND days='$day[$j]'";
            $res = mysqli_query($conn,$sql);
            $lecs = [];
            while($row = mysqli_fetch_array($res)){
              echo "
              <tr rowsize=''>
              <td align='center'><font color='blue' height='80'>".$row['days']."
              </td>";
              include_once 'Internals/fetch_data.php';
              $obj = new subject;
              $subjects = $obj->getSubjects($_SESSION['selected_sem']);
              for($k=0;$k<6;$k++){
              echo "<td><select name='subject' id='$k' onchange='changeBack(this.value)'>";
              for($i=0;$i<sizeof($subjects);$i++){
                echo "
                      <option value='".$subjects[$i]."'>
                    ".$subjects[$i]."
                      </option>
                ";
              }
              echo "</select>";
              echo "<select onchange='changeBack(this.value)'>
              <option value='t'>Theory Lecture</option>
              <option value='tut'>Tutorial</option>
              <option value='t+p'>Theory + Practical</option>
              <option value='e'>Extra</option>
            </select>";
            echo "<input type='text' placeholder='enter room name or number' name='room'/>";
            
          }

             echo "</td>";
             echo "</tr>";
             
              }
          }
        ?>
      </table>
      </div>
        <input type="submit" name="submit" value="UPDATE" class="btn btn-danger"/>
      </form>
      </div >
      <script>
        function changeBack(str){
            alert(str);
        }
        var app = angular.module("myapp",[]);
        app.controller("myCtrl",function($http,$scope){
          
        });
      </script>
  </body>
</html>
