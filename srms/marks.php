<!DOCTYPE html>
<html lang="en">
<head>
    
	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="js/angular.js"></script>
    <script scr="js/download.js"></script>
</head>
<?php   
        
            $pos = $_SESSION['pos'];
            $sem = $_SESSION['sem'];
            $subjectid = $_SESSION['subject'];
?>
<body ng-app="myapp" ng-controller="myCtrl">
<div class="backBtn">
</div>
    <div class="col-md-12 col-lg-12"></div><form method="post">
    <h1 style="font-family:font;margin:35px;" class="col-md-5">Sem<?php echo $sem."   ";?><?php echo $subjectid."   ";?> Marks Sheet</h1>
    <p style="float:right;" class="col-md-3 col-lg-4" style=""><button name="button" class="btn btn-success"  onclick="fnExcelReport('markstable')">Download</button></p>
    <p style="float:right;" calss="col-md-4 col-lg-4">
			<?php if(!isset($_GET['edit'])){ ?>
		<input type="button" name="submit" value="Edit" ng-click="editMarks()" class="btn btn-danger"></p>
	<?php } ?>
    <div class="clearfix"></div>
    <table class="table table-bordered table-responsive" id="markstable">
        <tr>
            <td>Roll no</td>
            <td>Name</td>
            <td>Sesional1</td>
            <td>Sesional2</td>
            <td>Sesional3</td>
        </tr>
         <tr ng-repeat="x in details">
            <td>{{x.roll}}</td>
            <td>{{x.name}}</td>
            <td>{{x.sesional1}}</td>
            <td>{{x.sesional2}}</td>
            <td>{{x.sesional3}}</td>
         </tr>
        </form>
    </table>

    <script>
        var app = angular.module("myapp",[]);
        app.controller("myCtrl",function($scope,$http){
               $scope.id = "<?php echo $subjectid; ?>";
           $http.post("getMarksData.php?getSub="+$scope.id).then(function(response){$scope.details = response.data.records;});
           $scope.editMarks = function(){window.location.assign("Nmarks.php");}
        });
    </script>
</body>
</html>
