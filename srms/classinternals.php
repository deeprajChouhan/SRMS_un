<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
    <?php include 'sidebar.php'; ?>
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
        <td>Internals</td>
      </tr>
      <?php
        $sem = $_SESSION['sem'];
        include 'connection.php';
        $sql_info = "SELECT * FROM students WHERE sem = '$sem'";
        $res_info = mysqli_query($conn,$sql_info);
        while($row_info = mysqli_fetch_array($res_info)){
            $studentid = $row_info['rollno'];
            $studentname = $row_info['name'];
            echo "<tr>
              <td style='width:90px;'>".$studentid."</td>
              <td style='width:90px;'>".$studentname."</td>
              <td><table class='table table-condensed table-bordered table-hovered'>
              <tr><td>Subjects</td><td><table class='table table-bordered'><tr><td>Sesional 1</td><td>Internals</td><tr></table></td>
              <td><table class='table table-bordered'><tr><td>Sesional 2</td><td>Internals</td><tr></table></td>
              <td><table class='table table-bordered'><tr><td>PUT</td><td>Internals</td><tr></table></td></td>
              <td>Attendence</td><td>Ethics</td><td>Total</td>
            </tr>";
              $sql_subjects = "SELECT * FROM subjects WHERE semester = '$sem'";
              $res_subjects = mysqli_query($conn,$sql_subjects);
              while($row_subjects = mysqli_fetch_array($res_subjects)){
              $subject = $row_subjects['subject'];
              $sql_marks = "SELECT * FROM marks WHERE studentid = '$studentid' AND subjectid = '$subject'";
                    $res_marks = mysqli_query($conn,$sql_marks);
                    while($row_marks = mysqli_fetch_array($res_marks)){
                        $sesional1 = $row_marks['sesional1'];$sesional2 = $row_marks['sesional2'];$put = $row_marks['put'];$assign = $row_marks['assign'];$tut = $row_marks['tut'];
                        include 'markspolicy.php';
                        echo "
                            <tr>
                                <td>".$subject."</td>
                                <td ><table class='table table-bordered'><tr><td>".$sesional1."</td><td>".$intses1."</td><tr></table></td>
                                <td><table class='table table-bordered'><tr><td>".$sesional2."</td><td>".$intses2."</td><tr></table></td>
                                <td><table class='table table-bordered'><tr><td>".$put."</td><td>".$intput."</td><tr></table></td>
                                <td><input type='text' name='attendence'></td>
                                <td><input type='text' name='Ethics'></td>

                                </tr>
                        ";
                    }
            }
            echo "</table></td></tr>";
        }

      ?>
    </table>
    <script type="text/javascript">

        function fnExcelReport(tableId)
{
  var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableId);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    var filename = filename?filename+'.xls':'excel_data.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}
    </script>
  </body>
</html>
