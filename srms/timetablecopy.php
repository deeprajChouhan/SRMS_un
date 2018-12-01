<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="Year-Buttons col-md-12 col-lg-12">
      <button class="col-md-4 col-lg-4 year-button" id="second_button" onclick="displaySecond()" >2ndyear</button>
      <button class="col-md-4 col-lg-4 year-button" id="third_button" onclick="displayThird()" >3rdyear</button>
      <button class="col-md-4 col-lg-4 year-button" id="fourth_button" onclick="displayFourth()">4thyear</button>
    </div>
    <div class="clearfix"></div>
    <H1><FONT COLOR="DARKCYAN"><CENTER>COLLEGE  TIME  TABLE</FONT></H1>
    <table border="3" align="center" width="1500">
    <tr>
     <td align="center" height="40">
     <td align="center"><font color="blue" >10.30-11.30
     <td align="center"><font color="blue" >11.30-12.30
     <td align="center"><font color="blue" >12.30-1.30
     <td align="center"><font color="blue" >2.30-3.30
     <td align="center"><font color="blue" >3.30-4.30
     <td align="center"><font color="blue" >4.30-5.30
    </tr>
      <div><form method="POST">
        <table  id="2ndyear" style="overflow:scroll;" class="table table-responsive table-bordered">
        <?php
        error_reporting(0);

        /*
        error_reporting(0);

          $semester = [3,4,5,6,7,8];
          for($i=0;$i<6;$i++){
            if($semester[$i] == $currentSem){

            }
          }
        */?>
          <?php
          include 'connection.php';
          $day = ['monday','tuesday','wednesday','thusday','friday','saturday'];
          for($i=0;$i<6;$i++){
          $sql = "SELECT * FROM lectures WHERE sem='3' AND days='$day[$i]'";
          $res = mysqli_query($conn,$sql);

          $lecs = [];
          while($row = mysqli_fetch_array($res)){
            echo "
            <tr rowsize=''>
             <td align='center'><font color='blue' height='80'>".$row['days']."
             <td align='center'height='8  0' id='cell1'><select value='".$row['lec1']."' id='".$row['id']."' onchange='change1(".$row['id'].")'>
            <option selected='selected value='".$row['lec1']."'>--sub--</option>
             <option value='DC'>DC</option>
             <option value='EIT'>EIT</option>
             <option value='DEFM'>DEFM</option>
             <option value='M3'>M3</option>
             <option value='PLDC'>PLDC</option>
              </select>
              <select  id = '".($row['id']+50)."'  name='".$row['sem']."".$day[$i]."lec1'></select><br><br>
              <input value='".$row['lec1']."'></br>


              <td align='center'height='80' id='cell2'><select id='".($row['id']+100)."' onchange='change2(".$row['id'].")' >
              <option>--sub--</option>
              <option value='DC'>DC</option>
              <option value='EIT'>EIT</option>
              <option value='DEFM'>DEFM</option>
              <option value='M3'>M3</option>
              <option value='PLDC'>PLDC</option>
              </select>
              <select id = '".($row['id']+150)."'  name='".$row['sem']."".$day[$i]."lec2'></select><br><br><input value='".$row['lec2']."'></br></br>

             <td align='center'height='100' id='cell3'><select id='".($row['id']+200)."' onchange='change3(".$row['id'].")' >
              <option>--sub--</option>
              <option value='DC'>DC</option>
              <option value='EIT'>EIT</option>
              <option value='DEFM'>DEFM</option>
              <option value='M3'>M3</option>
              <option value='PLDC'>PLDC</option>
              </select>
              <select id = '".($row['id']+250)."'  name='".$row['sem']."".$day[$i]."lec3'></select><br><br><input value='".$row['lec3']."'></br>

             <td align='center'height='80' id='cell4'><select id='".($row['id']+300)."' onchange='change4(".$row['id'].")' >
              <option>--sub--</option>
              <option value='DC'>DC</option>
              <option value='EIT'>EIT</option>
              <option value='DEFM'>DEFM</option>
              <option value='M3'>M3</option>
              <option value='PLDC'>PLDC</option>
              </select>
              <select id = '".($row['id']+350)."'  name='".$row['sem']."".$day[$i]."lec4'></select><br><br><input value='".$row['lec4']."'></br>

             <td align='center'height='80' id='cell5'><select id='".($row['id']+400)."' onchange='change5(".$row['id'].")' >
              <option>--sub--</option>
              <option value='DC'>DC</option>
              <option value='EIT'>EIT</option>
              <option value='DEFM'>DEFM</option>
              <option value='M3'>M3</option>
              <option value='PLDC'>PLDC</option>
              </select>
              <select id = '".($row['id']+450)."'  name='".$row['sem']."".$day[$i]."lec5'></select><br><br><input value='".$row['lec5']."'></br>
             <td align='center' height='80' id='cell6'><select id='".($row['id']+500)."' onchange='change6(".$row['id'].")' >
              <option>--sub--</option>
              <option value='DC'>DC</option>
              <option value='EIT'>EIT</option>
              <option value='DEFM'>DEFM</option>
              <option value='M3'>M3</option>
              <option value='PLDC'>PLDC</option>
              </select>
              <select id = '".($row['id']+550)."'  name='".$row['sem']."".$day[$i]."lec6'></select><br><br><input value='".$row['lec6']."'></br>
            </tr>";
              
             
        
        if(isset($_POST['submit'])){
          if($_POST[$row['sem']."".$day[$i]."lec1"]){
                $lec1 = $_POST[$row['sem']."".$day[$i]."lec1"];
               }else{
                $lec1=$row['lec1'];
               }

               if($_POST[$row['sem']."".$day[$i]."lec2"]){
                $lec2 = $_POST[$row['sem']."".$day[$i]."lec2"];
               }else{
                $lec2=$row['lec2'];
               }

               if($_POST[$row['sem']."".$day[$i]."lec3"]){
                $lec3 = $_POST[$row['sem']."".$day[$i]."lec13"];
               }else{
                $lec3=$row['lec3'];
               }

               if($_POST[$row['sem']."".$day[$i]."lec4"]){
                $lec4 = $_POST[$row['sem']."".$day[$i]."lec4"];
               }else{
                $lec4=$row['lec4'];
               }

               if($_POST[$row['sem']."".$day[$i]."lec5"]){
                $lec5 = $_POST[$row['sem']."".$day[$i]."lec5"];
               }else{
                $lec15=$row['lec5'];
               }

               if($_POST[$row['sem']."".$day[$i]."lec6"]){
                $lec6 = $_POST[$row['sem']."".$day[$i]."lec6"];
               }else{
                $lec6=$row['lec6'];
               }

               
               $sql_update = "UPDATE lectures SET lec1 = '$lec1',lec2 = '$lec2',lec3 = '$lec3',lec4 = '$lec4',lec5 = '$lec5',lec6 = '$lec6' WHERE sem= '3' AND days = '$day[$i]'";
               if($conn->query($sql_update) === TRUE){
                 header("Location:timetablecopy.php");

               }else{
                 echo "error updating 2nd year";
               }
             }
           }
}
        ?>
      </table>

      </div>
        <table  id="3rdyear" style="display:none;overflow:scroll;" class="table table-responsive table-bordered">
          <?php
          include 'connection.php';
          $day = ['monday','tuesday','wednesday','thusday','friday','saturday'];
          for($i=0;$i<6;$i++){
          $sql = "SELECT * FROM lectures WHERE sem='5' AND days='$day[$i]'";
          $res = mysqli_query($conn,$sql);
          $lecs = [];
          while($row = mysqli_fetch_array($res)){
            echo "
             <tr rowsize=''>
             <td align='center'><font color='blue' height='80'>".$row['days']."
             <td align='center'height='8  0' id='cell1'><select value='".$row['lec1']."' id='".$row['id']."' onchange='change1(".$row['id'].")'>
            <option selected='selected value='".$row['lec1']."'>--sub--</option>
             <option value='SE'>SE</option>
             <option value='IEED'>IEED</option>
             <option value='DAA'>DAA</option>
             <option value='SP'>SP</option>
             <option value='CG'>CG</option>
             <option value='JP'>JP</option>
              </select>
              <select  id = '".($row['id']+50)."'  name='".$row['sem']."".$day[$i]."lec1'></select><br><br>
              <input value='".$row['lec1']."'></br>


              <td align='center'height='80' id='cell2'><select id='".($row['id']+100)."' onchange='change2(".$row['id'].")' >
              <option selected='selected value='".$row['lec2']."'>--sub--</option>
             <option value='SE'>SE</option>
             <option value='IEED'>IEED</option>
             <option value='DAA'>DAA</option>
             <option value='SP'>SP</option>
             <option value='CG'>CG</option>
             <option value='JP'>JP</option>
             </select>
              <select id = '".($row['id']+150)."'  name='".$row['sem']."".$day[$i]."lec2'></select><br><br><input value='".$row['lec2']."'></br></br>

             <td align='center'height='100' id='cell3'><select id='".($row['id']+200)."' onchange='change3(".$row['id'].")' >
              <option selected='selected value='".$row['lec3']."'>--sub--</option>
             <option value='SE'>SE</option>
             <option value='IEED'>IEED</option>
             <option value='DAA'>DAA</option>
             <option value='SP'>SP</option>
             <option value='CG'>CG</option>
             <option value='JP'>JP</option>
              </select>
              <select id = '".($row['id']+250)."'  name='".$row['sem']."".$day[$i]."lec3'></select><br><br><input value='".$row['lec3']."'></br>

             <td align='center'height='80' id='cell4'><select id='".($row['id']+300)."' onchange='change4(".$row['id'].")' >
              <option selected='selected value='".$row['lec4']."'>--sub--</option>
             <option value='SE'>SE</option>
             <option value='IEED'>IEED</option>
             <option value='DAA'>DAA</option>
             <option value='SP'>SP</option>
             <option value='CG'>CG</option>
             <option value='JP'>JP</option>
              </select>
              <select id = '".($row['id']+350)."'  name='".$row['sem']."".$day[$i]."lec4'></select><br><br><input value='".$row['lec4']."'></br>

             <td align='center'height='80' id='cell5'><select id='".($row['id']+400)."' onchange='change5(".$row['id'].")' >
              <option selected='selected value='".$row['lec5']."'>--sub--</option>
             <option value='SE'>SE</option>
             <option value='IEED'>IEED</option>
             <option value='DAA'>DAA</option>
             <option value='SP'>SP</option>
             <option value='CG'>CG</option>
             <option value='JP'>JP</option>
              </select>
              <select id = '".($row['id']+450)."'  name='".$row['sem']."".$day[$i]."lec5'></select><br><br><input value='".$row['lec5']."'></br>
             <td align='center' height='80' id='cell6'><select id='".($row['id']+500)."' onchange='change6(".$row['id'].")' >
              <option selected='selected value='".$row['lec6']."'>--sub--</option>
             <option value='SE'>SE</option>
             <option value='IEED'>IEED</option>
             <option value='DAA'>DAA</option>
             <option value='SP'>SP</option>
             <option value='CG'>CG</option>
             <option value='JP'>JP</option>
              </select>
              <select id = '".($row['id']+550)."'  name='".$row['sem']."".$day[$i]."lec6'></select><br><br><input value='".$row['lec6']."'></br>
            </tr>";
              
             
        
        if(isset($_POST['submit'])){
          if($_POST[$row['sem']."".$day[$i]."lec1"]){
                $lec1 = $_POST[$row['sem']."".$day[$i]."lec1"];
               }else{
                $lec1=$row['lec1'];
               }

               if($_POST[$row['sem']."".$day[$i]."lec2"]){
                $lec2 = $_POST[$row['sem']."".$day[$i]."lec2"];
               }else{
                $lec2=$row['lec2'];
               }

               if($_POST[$row['sem']."".$day[$i]."lec3"]){
                $lec3 = $_POST[$row['sem']."".$day[$i]."lec13"];
               }else{
                $lec3=$row['lec3'];
               }

               if($_POST[$row['sem']."".$day[$i]."lec4"]){
                $lec4 = $_POST[$row['sem']."".$day[$i]."lec4"];
               }else{
                $lec4=$row['lec4'];
               }

               if($_POST[$row['sem']."".$day[$i]."lec5"]){
                $lec5 = $_POST[$row['sem']."".$day[$i]."lec5"];
               }else{
                $lec15=$row['lec5'];
               }

               if($_POST[$row['sem']."".$day[$i]."lec6"]){
                $lec6 = $_POST[$row['sem']."".$day[$i]."lec6"];
               }else{
                $lec6=$row['lec6'];
               }

               
               $sql_update = "UPDATE lectures SET lec1 = '$lec1',lec2 = '$lec2',lec3 = '$lec3',lec4 = '$lec4',lec5 = '$lec5',lec6 = '$lec6' WHERE sem= '5' AND days = '$day[$i]'";
               if($conn->query($sql_update) === TRUE){
                 header("Location:timetablecopy.php");
               }else{
                 
               }
              }
          }
        }


        ?>
        </table>

           <table  id="4thyear" style="display:none;overflow:scroll;" class="table table-responsive table-bordered">
          <?php
          include 'connection.php';
          $day = ['monday','tuesday','wednesday','thusday','friday','saturday'];
          for($i=0;$i<6;$i++){
          $sgt6ql = "SELECT * FROM lectures WHERE sem='7' AND days='$day[$i]'";
          $res = mysqli_query($conn,$sql);
          $lecs = [];
          while($row = mysqli_fetch_array($res)){
            echo "
             <tr rowsize=''>
             <td align='center'><font color='blue' height='80'>".$row['days']."
             <td align='center'height='8  0' id='cell1'><select value='".$row['lec1']."' id='".$row['id']."' onchange='change1(".$row['id'].")'>
            <option selected='selected value='".$row['lec1']."'>--sub--</option>
             <option value='DC'>DC</option>
             <option value='EIT'>EIT</option>
             <option value='DEFM'>DEFM</option>
             <option value='M3'>M3</option>
             <option value='PLDC'>PLDC</option>
              </select>
              <select  id = '".($row['id']+50)."'  name='".$row['sem']."".$day[$i]."lec1'></select><br><br>
              <input value='".$row['lec1']."'></br>


              <td align='center'height='80' id='cell2'><select id='".($row['id']+100)."' onchange='change2(".$row['id'].")' >
              <option>--sub--</option>
              <option value='DC'>DC</option>
              <option value='EIT'>EIT</option>
              <option value='DEFM'>DEFM</option>
              <option value='M3'>M3</option>
              <option value='PLDC'>PLDC</option>
              </select>
              <select id = '".($row['id']+150)."'  name='".$row['sem']."".$day[$i]."lec2'></select><br><br><input value='".$row['lec2']."'></br></br>

             <td align='center'height='100' id='cell3'><select id='".($row['id']+200)."' onchange='change3(".$row['id'].")' >
              <option>--sub--</option>
              <option value='DC'>DC</option>
              <option value='EIT'>EIT</option>
              <option value='DEFM'>DEFM</option>
              <option value='M3'>M3</option>
              <option value='PLDC'>PLDC</option>
              </select>
              <select id = '".($row['id']+250)."'  name='".$row['sem']."".$day[$i]."lec3'></select><br><br><input value='".$row['lec3']."'></br>

             <td align='center'height='80' id='cell4'><select id='".($row['id']+300)."' onchange='change4(".$row['id'].")' >
              <option>--sub--</option>
              <option value='DC'>DC</option>
              <option value='EIT'>EIT</option>
              <option value='DEFM'>DEFM</option>
              <option value='M3'>M3</option>
              <option value='PLDC'>PLDC</option>
              </select>
              <select id = '".($row['id']+350)."'  name='".$row['sem']."".$day[$i]."lec4'></select><br><br><input value='".$row['lec4']."'></br>

             <td align='center'height='80' id='cell5'><select id='".($row['id']+400)."' onchange='change5(".$row['id'].")' >
              <option>--sub--</option>
              <option value='DC'>DC</option>
              <option value='EIT'>EIT</option>
              <option value='DEFM'>DEFM</option>
              <option value='M3'>M3</option>
              <option value='PLDC'>PLDC</option>
              </select>
              <select id = '".($row['id']+450)."'  name='".$row['sem']."".$day[$i]."lec5'></select><br><br><input value='".$row['lec5']."'></br>
             <td align='center' height='80' id='cell6'><select id='".($row['id']+500)."' onchange='change6(".$row['id'].")' >
              <option>--sub--</option>
              <option value='DC'>DC</option>
              <option value='EIT'>EIT</option>
              <option value='DEFM'>DEFM</option>
              <option value='M3'>M3</option>
              <option value='PLDC'>PLDC</option>
              </select>
              <select id = '".($row['id']+550)."'  name='".$row['sem']."".$day[$i]."lec6'></select><br><br><input value='".$row['lec6']."'></br>
            </tr>";
              
             
        
        if(isset($_POST['submit'])){
          if($_POST[$row['sem']."".$day[$i]."lec1"]){
                $lec1 = $_POST[$row['sem']."".$day[$i]."lec1"];
               }else{
                $lec1=$row['lec1'];
               }

               if($_POST[$row['sem']."".$day[$i]."lec2"]){
                $lec2 = $_POST[$row['sem']."".$day[$i]."lec2"];
               }else{
                $lec2=$row['lec2'];
               }

               if($_POST[$row['sem']."".$day[$i]."lec3"]){
                $lec3 = $_POST[$row['sem']."".$day[$i]."lec13"];
               }else{
                $lec3=$row['lec3'];
               }

               if($_POST[$row['sem']."".$day[$i]."lec4"]){
                $lec4 = $_POST[$row['sem']."".$day[$i]."lec4"];
               }else{
                $lec4=$row['lec4'];
               }

               if($_POST[$row['sem']."".$day[$i]."lec5"]){
                $lec5 = $_POST[$row['sem']."".$day[$i]."lec5"];
               }else{
                $lec5=$row['lec5'];
               }

               if($_POST[$row['sem']."".$day[$i]."lec6"]){
                $lec6 = $_POST[$row['sem']."".$day[$i]."lec6"];
               }else{
                $lec6=$row['lec6'];
               }

               
               $sql_update = "UPDATE lectures SET lec1 = '$lec1',lec2 = '$lec2',lec3 = '$lec3',lec4 = '$lec4',lec5 = '$lec5',lec6 = '$lec6' WHERE sem= '7' AND days = '$day[$i]'";
               if($conn->query($sql_update) === TRUE){
                 header("Location:timetablecopy.php");
               }else{
                 
               }
              }
          }
        }
        ?>
        </table>
        <input type="submit" name="submit" value="CONFIRM" class="btn btn-danger" onclick="alert1()" >
        <input type="submit" name="submit" value="UPDATE" class="btn btn-danger" >
      </form>
      </div>
      <script type="text/javascript">
        var carsAndModels = {};
        carsAndModels['DC'] = ['-select-', 'DC-T','DC-TU'];
        carsAndModels['EIT'] = ['-select-','EIT-T','EIT-TU'];
        carsAndModels['DEFM'] =['-select-','DEFM-T','DEFM-TU','DEFM-P'];
        carsAndModels['PLDC']=['-select-','PLDC-T','PLDC-TU','PLDC-P'];
        carsAndModels['M3']=['-select-','M3-T','M3-TU',];
        carsAndModels['Others']=[''];
        carsAndModels['JP']=['-select-','JAVA-T','JAVA-TU','JAVA-P'];
        carsAndModels['IEED']=['-select-','IEED-T','IEED-TU',];
        carsAndModels['DAA']=['-select-','DAA-T','DAA-TU'];
        carsAndModels['SE']=['-select-','SE-T','SE-TU','SE-P'];
        carsAndModels['CG']=['-select-','CG-T','CG-TU','CG-P'];
        carsAndModels['SP']=['-select-','SP-T','SP-TU'];

      function change1(id){

          //var idd =id;
         // document.getElementById("demo").innerHTML=idd;
          var subList = document.getElementById(id);
          var list = document.getElementById((id+50));
          var selCar = subList.options[subList.selectedIndex].value;
          while (list.options.length) {
            list.remove(0);
          }
          var cars = carsAndModels[selCar];
          if (cars) {
            var i;
            for (i = 0; i < cars.length; i++) {
            //   if(i==0){
            //   var car = new Option(cars[i],1);
            //   list.options.add(car);
            // }else{
              var car = new Option(cars[i],cars[i]);
            //}
              list.options.add(car);
            }
           }
         }
       
        function change2(id){

          //var idd =id;
         // document.getElementById("demo").innerHTML=idd;
          var subList = document.getElementById(id+100);
          var list = document.getElementById((id+150));
          var selCar = subList.options[subList.selectedIndex].value;
          while (list.options.length) {
           list.remove(0);
           }
          var cars = carsAndModels[selCar];
          if (cars) {
             var i;
             for (i = 0; i < cars.length; i++) {
               var car = new Option(cars[i], cars[i]);
              list.options.add(car);
            }
          }
        }
        function change3(id){

          //var idd =id;
         // document.getElementById("demo").innerHTML=idd;
          var subList = document.getElementById(id+200);
          var list = document.getElementById((id+250));
          var selCar = subList.options[subList.selectedIndex].value;
          while (list.options.length) {
           list.remove(0);
           }
          var cars = carsAndModels[selCar];
          if (cars) {
             var i;
             for (i = 0; i < cars.length; i++) {
               var car = new Option(cars[i], cars[i]);
              list.options.add(car);
            }
          }
        }

        function change4(id){

          //var idd =id;
         // document.getElementById("demo").innerHTML=idd;
          var subList = document.getElementById(id+300);
          var list = document.getElementById((id+350));
          var selCar = subList.options[subList.selectedIndex].value;
          while (list.options.length) {
           list.remove(0);
           }
          var cars = carsAndModels[selCar];
          if (cars) {
             var i;
             for (i = 0; i < cars.length; i++) {
               var car = new Option(cars[i], cars[i]);
              list.options.add(car);
            }
          }
        }

        function change5(id){

          //var idd =id;
         // document.getElementById("demo").innerHTML=idd;
          var subList = document.getElementById(id+400);
          var list = document.getElementById((id+450));
          var selCar = subList.options[subList.selectedIndex].value;
          while (list.options.length) {
           list.remove(0);
           }
          var cars = carsAndModels[selCar];
          if (cars) {
             var i;
             for (i = 0; i < cars.length; i++) {
               var car = new Option(cars[i], cars[i]);
              list.options.add(car);
            }
          }
        }

        function change6(id){

          //var idd =id;
         // document.getElementById("demo").innerHTML=idd;
          var subList = document.getElementById(id+500);
          var list = document.getElementById((id+550));
          var selCar = subList.options[subList.selectedIndex].value;
          while (list.options.length) {
           list.remove(0);
           }
          var cars = carsAndModels[selCar];
          if (cars) {
             var i;
             for (i = 0; i < cars.length; i++) {
               var car = new Option(cars[i], cars[i]);
              list.options.add(car);
            }
          }
        }



        function displaySecond(){
        var x = document.getElementById("2ndyear");
        if (x.style.display === "none") {
              x.style.display = "block";
              document.getElementById('3rdyear').style.display = "none";
              document.getElementById('4thyear').style.display = "none";
              document.getElementById('second_button').style.background = "skyblue";
              document.getElementById('third_button').style.background = "none";
              document.getElementById('fourth_button').style.background = "none";
        }else{
              x.style.display = "none";
                document.getElementById('third_button').style.background = "none";
                document.getElementById('3rdyear').style.display = "none";
                document.getElementById('4thyear').style.display = "none";
                document.getElementById('2ndyear').style.display = "none";
                document.getElementById('fourth_button').style.background = "none";
                document.getElementById('second_button').style.background="none";
          }
        }
        function displayThird(){
          var x = document.getElementById("3rdyear");
          if (x.style.display === "none") {
                x.style.display = "block";
                document.getElementById('2ndyear').style.display = "none";
                document.getElementById('4thyear').style.display = "none";
                document.getElementById('third_button').style.background = "skyblue";
                document.getElementById('second_button').style.background = "none";
                document.getElementById('fourth_button').style.background = "none";
          }else{
                x.style.display = "none";
                document.getElementById('third_button').style.background = "none";
                document.getElementById('3rdyear').style.display = "none";
                document.getElementById('4thyear').style.display = "none";
                document.getElementById('2ndyear').style.display = "none";
                document.getElementById('fourth_button').style.background = "none";
                document.getElementById('second_button').style.background="none";
            }
          }
          function displayFourth(){
            var x = document.getElementById("4thyear");
          if (x.style.display === "none") {
                x.style.display = "block";
                document.getElementById('2ndyear').style.display = "none";
                document.getElementById('3rdyear').style.display = "none";
                document.getElementById('fourth_button').style.background = "skyblue";
                document.getElementById('second_button').style.background = "none";
                document.getElementById('third_button').style.background = "none";
          }else{
                x.style.display = "none";
                document.getElementById('third_button').style.background = "none";
                document.getElementById('3rdyear').style.display = "none";
                document.getElementById('4thyear').style.display = "none";
                document.getElementById('2ndyear').style.display = "none";
                document.getElementById('fourth_button').style.background = "none";
                document.getElementById('second_button').style.background="none";
            }
        }
        function alert1(){
          alert("are you sure");
        }
      </script>
  </body>
</html>