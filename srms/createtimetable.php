<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="js/angular.js"></script>
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
          include 'connection.php';
          $selected_sem = $_SESSION['selected_sem'];
          $branch_name = $_SESSION['branch_name'];
          $day = ['monday','tuesday','wednessday','thusday','friday','saturday'];
          $type = ['t','tut','t_p','e'];
            $sql = "SELECT * FROM lectures WHERE sem='$selected_sem'";
            $res = mysqli_query($conn,$sql);
            $lecs = [];
            $row = mysqli_fetch_array($res);
              $timetable = $row['timetable'];
              $timetable = json_decode($timetable,TRUE);
              for($j=0;$j<sizeof($timetable);$j++){
              $lecture = explode("*",$timetable[$day[$j]]);
              echo "
              <tr rowsize=''>
              <td align='center'><font color='blue' height='80'>".$day[$j]."
              </td>";
              include_once 'Internals/fetch_data.php';
              $obj = new subject;
              $subjects = $obj->getSubjects($_SESSION['selected_sem']);
              for($k=0;$k<sizeof($lecture);$k++){
              $lecture_cell = explode(",",$lecture[$k]);
              echo "<td><input type='text' placeholder='Room->".$lecture_cell[2]."' id='room".$k.$day[$j]."' name='room' />";
              echo "<select name='subject' id='$k' onchange='changeBack(this.value)'>";
              for($i=0;$i<sizeof($subjects);$i++){
                if($subjects[$i] == $lecture_cell[0]){
                  echo "
                  <option value='".$subjects[$i]."/".$day[$j]."/".$k."' selected>
                  ".$subjects[$i]."
                    </option>
                  ";
                }else{
                echo "
                      <option value='".$subjects[$i]."/".$day[$j]."/".$k."/room".$k.$day[$j]."'>
                    ".$subjects[$i]."
                      </option>
                ";
                }
              }
              echo "</select>";
              echo "<select onchange='changeBack1(this.value)'>";
              for($a=0;$a<sizeof($type);$a++){
                if($lecture_cell[1] == $type[$a]){
                  echo "<option value='".$day[$j]."/".$k."/".$type[$a]."' selected>".$type[$a]."</option>";
                }else{
                  echo "<option value='".$day[$j]."/".$k."/".$type[$a]."'>".$type[$a]."</option>";
                }
              }echo "</select>";
            
            
          }

             echo "</td>";
             echo "</tr>";
             
              }
        ?>
      </table>
      <table>
        <?php
          while($row = mysqli_fetch_array($res)){
            $timetable = $row['timetable'];
            $timetable = explode("@",$timetable);
          }
        ?>
      </table>
      </div>
        <input type="submit" name="submit" value="UPDATE" class="btn btn-danger"/>
      </form>
      </div >
      <script>
        function changeBack(str1){
          var items = [];
            var res = str1.split("/");
            var room = document.getElementById(res[3]).value;
            var len = res.length;
            var dataSend = {
              'subject' : res[0],
              'day' : res[1],
              'lecture' : res[2],
              'room' : room
            };
            
            items.push(dataSend);
            var string_send = JSON.stringify(items);
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  
              }
            };
            xmlhttp.open("GET","../Timetable/update.php?q="+string_send,true);
            xmlhttp.send();
      }
      function changeBack1(str1){
        var items = [];
            var res = str1.split("/");
            var len = res.length;
            var datasend = {
              'day' : res[0],
              'lecture' : res[1],
              'type' : res[2]
            };
            items.push(datasend);
            var string_send = JSON.stringify(items);
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  
              }
            };
            xmlhttp.open("GET","../Timetable/update1.php?q="+string_send,true);
            xmlhttp.send();
      }
        </script>
  </body>
</html>
