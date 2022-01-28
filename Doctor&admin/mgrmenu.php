<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Manager Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/index1.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<style>
	 .video{
      max-width: 70%;
      max-height: 60%;
      
  }

  #myVideo {
    position: fixed;
    right: 0;
    bottom: 0;
	width:100%;
 
  }
  
  .content {
    position: fixed;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    color: #f1f1f1;
    width: 100%;
    padding: 5px;
  }
  
  #myBtn {
    width: 200px;
    font-size: 18px;
    padding: 10px;
    border: none;
    background: #000;
    color: #fff;
    cursor: pointer;
  }
  
  #myBtn:hover {
    background: #ddd;
    color: black;
  }
  



	</style>


<body style="background-image:url('images/signup3.jpg')">
<nav class="navbar navbar-expand-lg navbar-dark bg-blue fixed-top">
    <div class="container">
    <a class="navbar-brand" href="mgrmenu.php" style="font-family: Impact ,sans serif">
              
          
              E-Healthcare Manager
 
                </i></a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="nav navbar-nav">
          <li> <a href="changebookingstatus.php">View Booking </a></li>
          <li><a href="deletebooking.php">Delete Appointment</a></li>
		  <li><a href="updatebooking.php">Update Booking Status</a></li>
      
		 
          </ul>

            </ul>
          </li>
        </ul>
      

        <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class='fas fa-user-alt'></i><span class="caret"></span></a>
          <ul class="dropdown-menu">
		  <li><a><?php session_start(); echo $_SESSION['mgrname']; ?></a></li>
		  <li><a href="doctorindex.php">Log Out</a></li>
          </ul>


		
    </div>
  </div>
</nav>  

<div class="video">
<video autoplay muted loop id="myVideo">
  <source src="images/covid.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>
<div>

<div class="content">
  <p></p>
  <button id="myBtn" onclick="myFunction()">Pause</button>
</div>

<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script>


<?php
if(isset($_POST['check']))
{
		include 'dbconfig.php';
		$name=$_SESSION['user'];
		$sql = "Select * from book where name='$name'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($rows = mysqli_fetch_assoc($result)) 
			{
				echo "Username:".$rows["username"]."Name:".$rows["name"]."Date of Visit:".$rows["dov"]."Town:".$rows["town"]."<br>";
			}
		} 
		else 
		{
			echo "0 results";
		}
}
if(isset($_POST['logout']))
{
	session_unset();
	session_destroy();
	header( "Refresh:1; url=doctorindex.php"); 
}
?>
</body>
</html>
<!-- assets -->    


<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/source.bootstrap.min.js"></script>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
<link href="assets/css/index1.css" rel="stylesheet">