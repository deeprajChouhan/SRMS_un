<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Document</title>
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
</head>
<body>

		<?php
					$branch_students = $_SESSION['branch_students'];
		            $pos = $_SESSION['pos'];
		            $sem = $_SESSION['sem'];
		            $subjectid = $_SESSION['subject'];
								$id = $_SESSION['id'];
		?>
		<?php include 'sidebar.php' ?>
		</div>
    <div class="col-md-12 col-lg-12"></div><form method="post">
    <h1 style="font-family:font;margin:35px;" class="col-md-5">Sem<?php echo $sem."   ";?><?php echo $subjectid."   ";?>Internal Marks Sheet</h1>
    <p style="float:right;" class="col-md-3 col-lg-4" style=""><button name="button" class="btn btn-success"  onclick="fnExcelReport('markstable')">Download</button></p>
    <div class="clearfix"></div>
    <table class="table table-bordered table-responsive" id="markstable">
        <tr>
            <td>Roll no</td>
            <td>Name</td>
            <td><table class='table table-bordered'><tr><td>Sesional 1</td><td>Internals</td><tr></table></td>
            <td><table class='table table-bordered'><tr><td>Sesional 2</td><td>Internals</td><tr></table></td>
            <td><table class='table table-bordered'><tr><td>Sesional 3</td><td>Internals</td><tr></table></td>
        </tr>
            <?php
            if($pos != 'hod'){
                include 'connection.php';
								$sql_get_subjectData = "select * from subjects where subject = '$subjectid' and semester = '$sem'";
						    $res_get_subjectData = mysqli_query($conn,$sql_get_subjectData);
						    while($row_get_subjectData = mysqli_fetch_array($res_get_subjectData)){
						        $subject_column = $row_get_subjectData['sub_no'];
						    }
                $sql_student = "SELECT name,rollno,$subject_column FROM $branch_students WHERE sem = '$sem'";
                $res_student = mysqli_query($conn,$sql_student);
                while($row_student = mysqli_fetch_array($res_student)){
														$fetch_data_of_subject = $row_student[$subject_column];
														$subject_array = explode(",",$fetch_data_of_subject);
														$sesional1 = $subject_array[1];$sesional2 = $subject_array[2];$sesional3 = $subject_array[3];
														$intses1 = $subject_array[6];$intses2 = $subject_array[7];$intses3 = $subject_array[8];

                            echo "
                            <tr>
                                <td>".$row_student['rollno']."</td>
                                <td>".$row_student['name']."</td>
                                <td ><table class='table table-bordered'><tr><td>".$sesional1."</td><td>".$intses1."</td><tr></table></td>
                                <td><table class='table table-bordered'><tr><td>".$sesional2."</td><td>".$intses2."</td><tr></table></td>
                                <td><table class='table table-bordered'><tr><td>".$sesional3."</td><td>".$intses3."</td><tr></table></td>
                            </tr>
                        ";
                        }
                    }

            	else{
            }
            ?>
        </form>
    </table>
</body>
</html>
