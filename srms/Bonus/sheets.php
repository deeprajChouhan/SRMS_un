    <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"> </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://www.w3schools.com/w3css/4/w3.css">

  <style>
    *{
      font-family:font1;
    }.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 6px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;

}
.button5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}

.button5:hover {
    background-color: #555555;
    color: white;
    margin-top: 1px;
    margin-right: 2px;

}

.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);

}
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    font-size: 14px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 160px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 20px;
    font-size: 14px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color:black;
    width: 140px;
    background-color: white;
}

.main {
    margin-left: 160px; /* Same as the width of the sidenav */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}
   div{
        padding: 5px;
    }

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}

  </style>
  </head>
  <body ng-app="myApp">

    </form></div>
<div class="clearfix"></div>
     <div class="sidenav">
       <div><div class="w3-sidebar w3-light-gray w3-bar-block" style="width:25%">
<h3 class="w3-bar-item" style="color:white ;">SHEETS</h3>
  <div class="new-btn"></div>
   <button type="button" class="btn btn-default"  style="width:40%";>Edit</button>
    <button type="button"  class="btn btn-default" style="margin-left:40%;" style="width:40%";>Download</button>
  </div>
  <a href="#!red">Sheet1</a>
  <a href="#!green">Sheet2</a>
  <a href="#!blue">Sheet3</a>
  <a href="#">Sheet4</a>
  <a href="#">Sheet5</a>
  <a href="#">Sheet6</a>
  <a href="#">Sheet7</a>
  <a href="#">Sheet8</a>
</div>
</div>
<div class="col-md-8"><div ng-view></div></div>


<script>
var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "main.php"
    })
    .when("/red", {
        templateUrl : "Nseminar.php"
    })
    .when("/green", {
        templateUrl : "Nskill.php"
    })
    .when("/blue", {
        templateUrl : "sports.php"
    });
});
</script>

  </body>
  </html>
