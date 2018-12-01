<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>TEACHERS PANNEL</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!DOCTYPE html>
  <html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  body {font-family: Arial, Helvetica, sans-serif;}
  * {box-sizing: border-box;}

  .input-container {
      display: -ms-flexbox; /* IE10 */
      display: flex;
      width: 100%;
      margin-bottom: 15px;
  }

  .icon {
      padding: 10px;
      background: dodgerblue;
      color: white;
      min-width: 50px;
      text-align: center;
  }

  .input-field {
      width: 100%;
      padding: 10px;
      outline: none;
  }

  .input-field:focus {
      border: 2px solid dodgerblue;
  }
  .wrapper {
    text-align: center;
}

  /* Set a style for the submit button */
  .btn {
      background-color: dodgerblue;
      color: white;
      padding: 15px 20px;
      border: none;
      top:30%;
      cursor: pointer;
      width: 20%;
      opacity: 0.9;
      margin-left: 50%;
      margin-top:0px;
  }

  .btn:hover {
      opacity: 1;
  }
  label {
    padding: 12px 12px 12px 0;
    display: inline-block;
    text-align:center;
    line-height: 150%;
    font-size: 1em;
  }
  .wrapper {
    text-align: center;
}

  body{

   background-image: url("img2.jpg");
     background-size: cover;
     background-color: #A3E4D7  ;
  }


  </style>
  </head>
  <body>
  <form action="" style="max-width:500px;margin:auto" method="GET">
    <h2>Login</h2>

    <div class="input-container">
      <i class="fa fa-user icon"></i>
      <input class="input-field" type="text" placeholder="Username" name="usrnm" required>
    </div>


    <div class="input-container">
      <i class="fa fa-key icon"></i>
      <input class="input-field" type="password" placeholder="Password" name="psw" required>
    </div>
    <div class="wrapper">
    <button type="submit" name="submit" class="btn">Submit</button>
  </div>
  <?php
  include 'connection.php';
    if(isset($_GET['submit'])){
      $username = $_GET['usrnm'];
      $password = $_GET['psw'];
     $sql = "SELECT username,password,position FROM teachers WHERE username = '$username'";
      $res = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_array($res)){
        echo $row['username']."-".$row['password']."-".$row['position'];
        if($row['username'] == $username && $row['password'] == $password && $row['position'] == "admin"){
          header("Location:admin_profile.php");
        }
      }
    }
   ?>
  </form>

  </body>
  </html>
