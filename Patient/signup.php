
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign Up</title>
    
  </head>

  <body style="background-image: url('images/signup3.jpg');">

  <nav class="navbar navbar-expand-lg navbar-dark bg-red fixed-top">
    <div class="container">
      <a class="navbar-brand" href="cover.php" style="font-family: Impact ,sans serif">E-Healthcare</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="nav navbar-nav navbar-right">
          <li><a href="cover.php">Back Home</a></li>
          </ul>


		
    </div>
  </div>
</nav>   
<br>
<br>
<br>
<center>
<form action="signup.php" method="post">
	<div class="sucontainer">
      
		<label><b>Name:</b></label><br>
		<input type="text" placeholder="Enter Full Name" name="fname" required><br>
	
		<label><b>Date of Birth:</b></label><br>
		<input type="date" name="dob" required><br><br>
	
		<label><b>Gender</b></label><br>
		<input type="radio" name="gender" value="female">Female
		&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="male">Male
		&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="other">Other<br><br>
		
		<label><b>Contact No:</b></label><br>
		<input type="tel" placeholder="Contact Number" name="contact"  onkeypress="return isNumberKey(event)"required><br>
		<script>
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;

	return true;
}
</script>
		
		<label><b>Username:</b></label><br>
		<input type="text" placeholder="Create Username" name="username" required><br>
		
		<label><b>Email:</b></label><br>
		<input type="email" placeholder="Enter Email" name="email" required><br>

		<label><b>Password:</b></label><br>
		<input type="password" placeholder="Enter Password" name="pwd" id="p1" required><br>

		<label><b>Repeat Password:</b></label><br>
		<input type="password" placeholder="Repeat Password" name="pwdr" id="p2" required><br>
		<p style="color:blue">By creating an account you agree to our <a href="#" style="color:blue">Terms & Conditions</a>.</p><br>

	    <button type="submit" name="signup">Sign Up</button><br>
		<br>
		<a href="sign_in.php" style="color:blue">Already have an account?</a>
</div>		
</form>
</center>

  <?php

function newUser()
{
		include 'dbconfig.php';
		$name=$_POST['fname'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$contact=$_POST['contact'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['pwd'];
		$prepeat=$_POST['pwdr'];
		$sql = "INSERT INTO Patient (Name, Gender, DOB,Contact,Email,Username,Password) VALUES ('$name','$gender','$dob','$contact','$email','$username','$password') ";

	if (mysqli_query($conn, $sql)) 
	{
		echo "<h2>Record created successfully!! Redirecting to sign in page....</h2>";
		header( "Refresh:3; url=sign_in.php");

	} 
	else
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
function checkusername()
{
	include 'dbconfig.php';
	$username=$_POST['username'];
	$sql= "SELECT * FROM Patient WHERE Username = '$username'";

	$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)!=0)
		{
			echo"<b><br>Username already exists!!";
		}
		else if($_POST['pwd']!=$_POST['pwdr'])
		{
			echo"Passwords dont match";
		}
		else if(isset($_POST['signup']))
		{ 
			newUser();
		}

	
}
if(isset($_POST['signup']))
{
	if(!empty($_POST['username']) && !empty($_POST['pwd']) &&!empty($_POST['fname']) &&!empty($_POST['dob'])&& !empty($_POST['gender']) &&!empty($_POST['email']) && !empty($_POST['contact']))
			checkusername();
}
?>

</form>



    <!-- Footer -->


  </body>


</html>


<!-- assets -->    
  
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/source.bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/index1.css" rel="stylesheet">
	<link href="assets/css/signup.css" rel="stylesheet">
    
 