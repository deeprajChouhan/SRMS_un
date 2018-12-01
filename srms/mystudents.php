<!DOCTYPE html>
<?php session_start();?>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/download.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
function myFunction() {
  var input, filter, table, tr, td, i,tdd;
  input = document.getElementById("search_index");
  //document.getElementById("myInput").innerHTML = input.value;
  filter = input.value.toUpperCase();
  table = document.getElementById("marksTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
   // tdd=tr[i+1].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
     //   tdd[i].style.display="";
      } else {
        tr[i].style.display = "none";
       // tdd[i+1].style.display="none";
      }
    }
  }
}
</script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <p class="alignleft"><a style="border:none;background-color:none;" href="classteacher1.php">
            <span class="glyphicon glyphicon-circle-arrow-left"></span>
          </a>
            </p>
    <div class="col-sm-12 col-md-12 col-lg-12" style="padding:25px;">
      <div class="col-sm-8 col-md-8 col-lg-8">
        <div class="form-group">
  				<div class="search-box" >
  					<span >Search</span>
              <input type="text" onkeyup="myFunction()" name="search-box" id="search_index"  style="width:100%;padding:8px;border:0.5px blue solid;border-radius:5px;" placeholder="Search Name or Roll no.......">
          </div>
  			</div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
        <button name="button" class="btn btn-success col-md-2 col-lg-2" style="border-radius:50%;font-size:25px;float:right;" onclick="fnExcelReport('marksTable')">
        <center><span class="glyphicon glyphicon-download-alt"></span></center>
      </button>
      </div>
		</div>
    <div class="clearfix"></div>
    <table class="table table-condensed table-bordered table-hovered" id="marksTable">
      <tr>
        <td>Roll No</td>
        <td>Name</td>
        <td>Marks</td>
      </tr>
      <?php
        $sem = $_SESSION['sem'];
        include 'connection.php';
         $sql_subjects = "SELECT * FROM subjects WHERE semester = '$sem'";
        $res_subjects = mysqli_query($conn,$sql_subjects);
        $subid_array = [];
        while($row_subjects = mysqli_fetch_array($res_subjects)){
          $subject = $row_subjects['subject'];
          $subid = $row_subjects['sub_no'];
           $subid;
          array_push($subid_array,$subid);
        }
              ($subid_array);
              $count = sizeof($subid_array);
              $count = $count - 1;
              $sql_info = "SELECT * FROM students WHERE sem = '$sem'";
              $res_info = mysqli_query($conn,$sql_info);
                while($row_info = mysqli_fetch_array($res_info)){
                  $count = sizeof($subid_array);
                    $studentid = $row_info['rollno'];
                    $count = $count - 1;
                    $studentname = $row_info['name'];
                    echo "<tr>
                      <td>".$studentid."</td>
                      <td>".$studentname."</td>
                      <td><table class='table table-condensed table-bordered table-hovered'>
                      <tr><td>Subject</td><td>Sesional 1</td><td>Internal 1</td><td>Sesional 2</td><td>Internal 2</td><td>Sessional 3</td><td>Internal 3</td></tr>";
                  while($count != 0){
                    $marks = $row_info[$subid_array[$count]];
                    $mark = explode(",",$marks);
                    echo "
                    <div id='$studentid'>
                        <tr>
                          <td>".$mark[0]."</td>
                          <td>".$mark[1]."</td>
                          <td>".$mark[6]."</td>
                          <td>".$mark[2]."</td>
                          <td>".$mark[7]."</td>
                          <td>".$mark[3]."</td>
                          <td>".$mark[8]."</td>
                        </tr>
                        </div>
                    ";
                    $count--;
                  }
                  echo "</table></td>";
                }
                echo "</tr>";



      ?>
    </table>
  </body>
</html>
