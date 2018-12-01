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
  <script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
  <style>
  /* Style inputs, select elements and textareas */
  input[type=text], select, textarea{
    width: 80%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;
  }
  input[type=password], select, textarea{
    width: 80%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;
  }
  #ex1 {

     background-image: url("back9.jpg");
     background-size: cover;
     background-color: #cccccc;
  }

  /* Style the label to display next to the inputs */
  label {
    padding: 12px 12px 12px 0;
    display: inline-block;
    text-align:center;
    line-height: 150%;
    font-size: 1em;
  }

  /* Style the submit button */
  input[type=submit] {
    background-color: 	#5F9EA0;
    color: black;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
  }

  /* Style the container */
  .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }

  /* Floating column for labels: 25% width */
  .col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
  }

  /* Floating column for inputs: 75% width */
  .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
      width: 100%;
      margin-top: 0;
    }

  }
  .dropbtn {
    background-color: #3498DB;
    color: white;
    padding: 16px;
    font-size: 12px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #2980B9;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd}

.show {display:block;}
</style>
</head>
<body>
  <body>
  <div id="ex1">
    <center>
   <h1>New Login</h1>
 </center>
  <div class="container">
  <form action="action_page.php">
    <div class="row">
      <div class="col-25">
        <label for="usrname">UserName</label>
      </div>
      <div class="col-75">
        <input type="text" id="usrname" name="username" placeholder="Your name.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="pass">Password</label>
      </div>
      <div class="col-75">
        <input type="password" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password" placeholder="password." required>
      </div>
    </div>
</form>
<div class="row">
  <div class="col-25">
    <label for="nme">Name</label>
  </div>
  <div class="col-75">
    <input type="text" id="nme" name="name" placeholder="Your name.." required>
  </div>
</div>
<div class="row">
  <div class="col-25">
      <label for="myDropdown">Select Semester</label>
</div>
<div class="dropdown">
  <div class="col-75">
<button onclick="myFunction()" class="dropbtn">semester</button>
  <div id="myDropdown" class="dropdown-content">
    <a>3rd Semester</a>
    <a>4th Semester</a>
    <a >5th Semester</a>

  </div>
</div>
</div>
</div>
<div class="row">
  <div class="col-25">
      <label for="myDropdown">Subjects</label>
    </div>
      <div class="dropdown">
        <div class="col-75">
      <button onclick="myFunction()" class="dropbtn">SUbjects</button>
        <div id="myDropdown" class="dropdown-content">
          <a>2nd Year</a>
          <a>3rd Year</a>
          <a >4th Year</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
          <label for="myDropdown">Position</label>
    </div>
    <div class="dropdown">
      <div class="col-75">
    <button onclick="myFunction()" class="dropbtn">Select</button>
      <div id="myDropdown" class="dropdown-content">
        <a>hod</a>
          <a>classteacher</a>
            <a>subjectteacher</a>

      </div>
    </div>
  </div>

</body>
</html>
