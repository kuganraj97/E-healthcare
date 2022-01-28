<!DOCTYPE html>
<html>

<body style="background-image:url(doctordesk.jpg)">

<nav class="navbar navbar-expand-lg navbar-dark bg-red fixed-top">
    <div class="container">
      <a class="navbar-brand" href="doctorindex.php">E-Healthcare</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="nav navbar-nav">
          <li><a href="doctorindex.php">Home </a> </li>
          <li><a href="about_us.php">About Us</a> </li>
		  <li><a href="contact_us.php">Contact Us</a> </li>
		  <li><a href="news.php">News</a></li>
		 
          </ul>

            </ul>
          </li>
        </ul>

		<ul class="nav navbar-nav navbar-right">
    <li><a href="mlogin.php">Doctor Login</a> </li>
          </ul>


		
    </div>
  </div>
</nav>  

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="wrap">
                <p class="form-title">
                    Sign In</p>
                <form class="login" method="post" action="docmsignin.php">
                <input type="text" name="uname" placeholder="Username" />
                <input type="password" name="pass" placeholder="Password" />
                <input type="submit" name="submit" value="Sign In" class="btn btn-success btn-sm"  />
            
                </form>
            </div>
        </div>
    </div>
   
</div>
<?php 
function SignIn() 
{ 
include 'dbconfig.php';

session_start();
if(!empty($_POST['uname']))  
{ 
	$query = mysqli_query($conn,"SELECT * FROM manager where username = '$_POST[uname]' AND password = '$_POST[pass]'");
	$row = mysqli_fetch_array($query);
	if(!empty($row['username']) AND !empty($row['password'])) 
	{ 
		$_SESSION['username'] = $row['username'];
		$_SESSION['mgrname']=$row['name'];
		$_SESSION['mgrid']=$row['mid'];
		echo "Logging you in..";
		header( "Refresh:3; url=mgrmenu.php");
	} 
	else 
	{ 
		echo "Wrong Credentials!"; 
	} 
	}
} 
	if(isset($_POST['submit'])) 
	{ 
		SignIn(); 
	} 
?>
</body>
</html>
<!-- assets -->    

<!-- <script src="assets/js/bootstrap.bundle.js"></script> -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!-- <script src="assets/js/bootstrap.js"></script> -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/source.bootstrap.min.js"></script>
<!-- <script src="assets/js/contact_us.js"></script> -->
<!-- <script src="assets/js/dropdown.js"></script> -->
<!-- <script src="assets/js/jquery.js"></script> -->
<script src="assets/js/jquery.min.js"></script>
<!-- <script src="assets/js/payment.js"></script> -->
<!-- <script src="assets/js/restaurant.js"></script> -->
<!-- <script src="assets/js/result.js"></script> -->
<!-- <script src="assets/js/review.js"></script> -->
<!-- <script src="assets/js/sign_in.js"></script> -->
<!-- <script src="assets/js/sign_up.js"></script> -->

<!-- <link href="assets/css/account_header.css" rel="stylesheet"> -->
<!-- <link href="assets/css/animate.css" rel="stylesheet"> -->
<!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
<!-- <link href="assets/css/bootstrap-grid.css" rel="stylesheet"> -->
<!-- <link href="assets/css/bootstrap-grid.min.css" rel="stylesheet"> -->
<!-- <link href="assets/css/bootstrap-reboot.css" rel="stylesheet"> -->
<!-- <link href="assets/css/bootstrap-reboot.min.css" rel="stylesheet"> -->
<!-- <link href="assets/css/checkout.css" rel="stylesheet"> -->
<!-- <link href="assets/css/check-radio.css" rel="stylesheet"> -->
<!-- <link href="assets/css/contact_us.css" rel="stylesheet"> -->
<!-- <link href="assets/css/delivery.css" rel="stylesheet"> -->
<link href="assets/css/half-slider.css" rel="stylesheet">
<link href="assets/css/index.css" rel="stylesheet">
<link href="assets/css/footer.css" rel="stylesheet">
<link href="assets/css/side.css" rel="stylesheet">
<!-- <link href="assets/css/payment.css" rel="stylesheet"> -->
<!-- <link href="assets/css/profile.css" rel="stylesheet"> -->
<!-- <link href="assets/css/result.css" rel="stylesheet"> -->
<!-- <link href="assets/css/review.css" rel="stylesheet"> -->
<!-- <link href="assets/css/sign_in.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/sign_up.css" rel="stylesheet"> -->