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

    <style>
table {
    width:100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color: #fff;
}
table#t01 th {
    background-color: black;
    color: white;
}
td{
  width:100px;
}

body {font-family: Arial, Helvetica, sans-serif;}


/* Modal Content/Box */
.modal-content {
    background-color: grey;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 50%;
  /* Could be more or less, depending on screen size */
}

</style>

  </head>
  <body>
    <center>
            <table id="t01">
              <tr>
              <th> <b>Username
               <th> <b>Subject
                <th><b>Semester
              </tr>
            </table>
            <br>
            <b>

    <?php
        include 'connection.php';
        $tname = $_GET['name'];
        $sql_select = "SELECT * FROM teachers WHERE name = '$tname'";
        $res_select = mysqli_query($conn,$sql_select);
        while($row_select = mysqli_fetch_array($res_select)){
          $username = $row_select['username'];
          $subject = $row_select['subject'];
          $sem = $row_select['sem'];
          echo "
            <table >
              <tr>
                 <td style='color:red;' >".$username."</td>
                 <td style='color:red;'>".$subject."</td>
                 <td style='color:red;'>".$sem."</td>
              </tr>
            </table>
            <br>
          ";
        }
    ?>
  </table></center>
  <hr>
    <form method="post" class="modal-content">
      <?php $tname = $_GET['name'];
          echo "<center><mark><b>Assign Class to $tname</b><br /><br>";
       ?>
       <input type="text" name="username" placeholder="Give a username"/>
      <select id="car" onchange="changeSubject()" name="sem">
        <option value="">--Select Semester--</option>
        <option value="3">3rd Semester</option>
        <option value="4">4rd Semester</option>
        <option value="5">5rd Semester</option>
        <option value="6">6rd Semester</option>
        <option value="7">7th Semester</option>
        <option value="8">8th Semester</option>
      </select>
      <select id = "carmodel" name="sub"></select></center>
      <?php
      $thirdsem = [ 'DC','DEFM','EIT','M3','PLDC'];
      $fourthsem =  ['ADS', 'CAO','DMGT', 'OOM', 'TOC'];
      $fifthsem = ['CG','DAA', 'JAVA', 'SE','SP'];
      $sixthsem = ['CN','OS','DBMS','IP','FE'];
      $seventhsem = ['DWM','CSS','AI','MC','MS','BI','CD','STQA','CGC','DSP','DFIT'];
      $eightsem = ['DS','GAP','ES','DIP','PR','ML','CS','CC','EERP','WSN'];
       ?>
      <script>
      var carsAndModels = {};
      carsAndModels['3'] = [ 'DC','DEFM','EIT','M3','PLDC'];
      carsAndModels['4'] = ['ADS', 'CAO','DMGT', 'OOM', 'TOC'];
      carsAndModels['5'] = ['CG','DAA', 'JAVA', 'SE','SP'];
      carsAndModels['6'] =['CN','OS','DBMS','IP','FE'];
      carsAndModels['7']=['DWM','CSS','AI','MC','MS','BI','CD','STQA','CGC','DSP','DFIT'];
      carsAndModels['8']=['DS','GAP','ES','DIP','PR','ML','CS','CC','EERP','WSN'];

      function changeSubject() {
          var carList = document.getElementById("car");
          var modelList = document.getElementById("carmodel");
          var selCar = carList.options[carList.selectedIndex].value;
          while (modelList.options.length) {
              modelList.remove(0);
          }
          var cars = carsAndModels[selCar];
          if (cars) {
              var i;
              for (i = 0; i < cars.length; i++) {
                  var car = new Option(cars[i],i );
                  modelList.options.add(car);
              }
          }
      }
      </script>
      <center><input type="submit" id="singlebutton" name="submit" value="Submit" class="btn btn-primary" style="margin-top:5%;"/></center>
      <?php
        include 'connection.php';
        if(isset($_POST['submit'])){
          $uname = $_POST['username'];
          $sem = $_POST['sem'];
          $sub = $_POST['sub'];
          if($sem == '3'){$subject = $thirdsem[$sub];}
          else if($sem == '4'){$subject = $fourthsem[$sub];}
          else if($sem == '5'){$subject = $fifthsem[$sub];}
          else if($sem == '6'){$subject = $sixthsem[$sub];}
          else if($sem == '7'){$subject = $seventhsem[$sub];}
          else if($sem == '8'){$subject = $eightsem[$sub];}

          $sql = "INSERT INTO teachers (username,name,sem,subject,position) VALUES ('$uname','$tname','$sem','$subject','subjectteacher')";
          if($conn->query($sql) === TRUE){
            echo "successfully created record";
          }else{
            echo "error";
          }
        }
?>
    </form>
  </body>
</html>
