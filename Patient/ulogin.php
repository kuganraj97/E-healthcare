<!DOCTYPE html>
<html lang="en">

  <head>

  <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/index1.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <title>E-Healthcare</title>
    
  </head>
  <body style="background-color:white;">
  <nav class="navbar navbar-expand-lg navbar-dark bg-blue fixed-top">
    <div class="container">
      <a class="navbar-brand" href="ulogin.php" style="font-family: Impact ,sans serif">
              
          
              E-Healthcare
 
</a>
<div class="container" >
	<form method="post">
      <button type="button" onclick="window.location.href='book.php'" >Book Appointment</button>
	  <button type="button" onclick="window.location.href='viewpatientappointments.php'" >Show Appointments</button>
	  <button type="submit" name="cancel" >Cancel Booking</button>
	</form>
    </div>
      

		<ul class="nav navbar-nav navbar-right">
    <li class="dropdown" >
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class='fas fa-user-alt'></i><span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="cover.php">Log Out</a></li>
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
if(isset($_POST['cancel']))
{
	header( "Refresh:1; url=cancelbookingpatient.php"); 
}
if(isset($_POST['logout']))
{
	session_unset();
	session_destroy();
	header( "Refresh:1; url=cover.php"); 
}
?>
</body>
</html>

<!-- assets -->    

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/source.bootstrap.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
<link href="assets/css/ulogin.css" rel="stylesheet">
<link href="assets/css/index1.css" rel="stylesheet">
