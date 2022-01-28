

<!DOCTYPE html>
<html lang="en">

  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign in</title>


  </head>

  <body style="background-image: url('images/signup3.jpg');">


  <?php
include "nav1.php";
?>

    <!-- Sign In Form-->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="wrap">
                <p class="form-title">
                    Sign In</p>
                <form class="login" method="post" action="docmsignin.php">
                <input type="text" name="uname" placeholder="Username" required />
                <input type="password" name="pass" placeholder="Password" required />
                <input type="submit" name="submit" value="Sign In" class="btn btn-success btn-sm"  />
            
                </form>
            </div>
        </div>
    </div>
   
</div>


  </body>

</html>   
<?php 
function SignIn() 
{ 
include 'dbconfig.php';


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

    
<!-- assets -->    

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/source.bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/sign_in.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/index1.css" rel="stylesheet">
    <link href="assets/css/signin2.css" rel="stylesheet">
  
 