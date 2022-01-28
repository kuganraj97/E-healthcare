<!DOCTYPE html>
<html>



<?php
  session_start();
  require_once 'dbconfig.php';
  ?>

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Healthcare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/index1.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
  <body style="background-color:white;">
  <nav class="navbar navbar-expand-lg navbar-dark bg-blue fixed-top">
    <div class="container">
      <a class="navbar-brand" href="cover.php" style="font-family: Impact ,sans serif">
              
          
              E-Healthcare
 
</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="nav navbar-nav">
          <li><a href="cover.php">Home </a> </li>
          <li><a href="about_us.php">About Us</a> </li>
		  <li><a href="contact_us.php">Contact Us</a> </li>
		  <li><a href="news.php">News</a></li>
		  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Search<span class="caret"></span></a>
      <ul class="dropdown-menu">
          <li><a href="locateus.php">Doctor</a></li>
		  <li><a href="hlocateus.php">Hospital</a></li>
      <li><a href="dlocateus.php">Disease</a></li>
		 
          </ul>

            </ul>
          </li>
        </ul>

		<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class='fas fa-user-alt'></i><span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="signup.php">Sign up</a></li>
		  <li><a href="sign_in.php">Sign in</a></li>
          </ul>


		
    </div>
  </div>
</nav>  


<header>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="carousel-item item active">
      <img style="height:500px; width:100%;" src="images/cover1.jpg" alt="picture 1">
    </div>

    <div class="carousel-item item">
      <img src="images/cover6.jpg" style="height:500px; width:100%;" alt="picture 2">
    </div>

    <div class="carousel-item item">
      <img src="images/m1.jpg" alt="picture 3" style="height:500px; width:100%;">
    </div>
  </div>



  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</header>



<!-- Page Content -->
<section class="py-5">
  <div class="container">
    <h3>E-Healthcare</h3>
    <p> We provide online doctor booking service for our customers to reduce patient's waiting time in hospital.</p>


  </div>
</section>


<?php
include "footer.php";
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
<link href="assets/css/halfslider.css" rel="stylesheet">
<link href="assets/css/index1.css" rel="stylesheet">
<link href="assets/css/footer.css" rel="stylesheet">
