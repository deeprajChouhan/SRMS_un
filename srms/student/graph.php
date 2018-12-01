
<?php
 include_once 'connection.php';
 include 'fetch_data.php';
 $rollno = $_SESSION['roll'];
 $column = new column;
 $subjects = $column->getSubjects($_SESSION['sem']);
 $a = array();
 for($i=0;$i<sizeof($subjects);$i++){
     $columns = $column->getColumnName($subjects[$i]);
     $sql = "select $columns from students where rollno = '$rollno'";
     $res = $conn->query($sql);
     $row = $res->fetch_array();
     echo $array = $row[$columns];
     $array = explode(",",$array);
     print_r($array);
     $sesional1 = $array[1];
     $sesional2 = $array[2];
     $sesional3 = $array[3];
    
$dataPoints = array(
    array("x"=> $sesional1, "y"=> 40,"indexLabel"=> "Sessional1"),
    array("x"=> $sesional2, "y"=> 40,"indexLabel"=> "Sessional2"),
    array("x"=> $sesional3, "y"=> 40,"indexLabel"=> "Sessional3")
);	
array_push($a,$dataPoints);
 }

?>  
<script>
window.onload = function () {
 <?php 
    for($i=0;$i<sizeof($a);$i++){   
 ?>
var chart<?php echo $i;?> = new CanvasJS.Chart("chartContainer<?php echo $i;?>", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Marks in <?php echo $subjects[$i];?>"
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($a[$i], JSON_NUMERIC_CHECK); ?>
	}]
});
chart<?php echo $i;?>.render();;
<?php } ?>
}
</script>
</head>
<body>
    <?php 
        for($i=0;$i<sizeof($subjects);$i++){
            ?>
    <div id="chartContainer<?php echo $i;?>" style="height: 370px; width: 100%;"></div>            
            <?php
        }
    ?>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html> 