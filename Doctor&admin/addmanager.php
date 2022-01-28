<?php
  session_start();
  require_once 'dbconfig.php';
  ?>

  <!-- Navigation -->
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/index2.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/admin2.css"> 

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-red fixed-top">
    <div class="container">
    <a class="navbar-brand" href="mainpage.php" style="font-family: Impact ,sans serif">
              
          
              E-Healthcare Admin
 
                </i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="nav navbar-nav">
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Doctor<span class="caret"></span></a>
      <ul class="dropdown-menu">
      <li><a href="adddoctor.php">Add Doctor</a></li>
     <li> <a href="deletedoctor.php">Delete Doctor</a></li>
      <li><a href="showdoctor.php">Show Doctor</a></li>
	 <li> <a href="showdoctorschedule.php">Show Doctor Schedule</a></li>
          </ul>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Hospital<span class="caret"></span></a>
      <ul class="dropdown-menu">
      <li> <a href="addclinic.php">Add Hospital</a></li>
      <li><a href="deleteclinic.php">Delete Hospital</a></li>
      <li><a href="adddoctorclinic.php">Assign Doctor to Hospital</a></li>
      <li><a href="addmanagerclinic.php">Assign Manager to Hospital</a></li>
      <li><a href="deletedoctorclinic.php">Delete Doctor from Hospital</a></li>
      <li><a href="deletemanagerclinic.php">Delete Manager from Hospital</a></li>
      <li><a href="showclinic.php">Show Hospital</a></li>
          </ul>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Manager<span class="caret"></span></a>
      <ul class="dropdown-menu">
      <li><a href="addmanager.php">Add Manager</a></li>
      <li><a href="deletemanager.php">Delete Manager</a></li>
      <li><a href="showmanager.php">Show Manager</a></li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class='fas fa-user-alt'></i><span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="alogin.php">Log out</a></li>
          </ul>



		
    </div>
  </div>
</nav>  
<br><br>
<center>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  MID:<input type="number" name="mid" required>
  <br>
  Name: <input type="text" name="name" required>
  <br>
  Gender:<br>&nbsp;
  <input type="radio" name="gender" value="female">Female&nbsp;&nbsp;
  <input type="radio" name="gender" value="male">Male&nbsp;
  <br>
  <br> DOB: <input type="date" name="dob" required>
  <br>
  Contact no.: <input type="number" name="contact" maxlength="10" minlength="10" required>
  <br>
  Address: <input type="text" name="address" required>
  <br>
  Username: <input type="text" name="username" required>
  <br>
  Password: <input type="password" name="pwd" required>
  <br>
  State: 
  <select name="region" required>
        <option value="" disabled selected>Choose option</option>
        <option value="Johor">Johor</option>
        <option value="Kedah">Kedah</option>
        <option value="Kelantan">Kelantan</option>
        <option value="Melaka">Melaka</option>
        <option value="Negeri Sembilan">Negeri Sembilan</option>
        <option value="Pahang">Pahang</option>
        <option value="Penang">Penang</option>
        <option value="Perak">Perak</option>
        <option value="Perlis">Perlis</option>
        <option value="Terangganu">Terangganu</option>
        <option value="Selangor">Selangor</option>
        <option value="Sabah">Sabah</option>
        <option value="Sarawak">Sarawak</option>
        <option value="Kuala Lumpur">Kuala Lumpur</option>
    </select>
  <br>
  <button type="submit" name="Submit">REGISTER</button>
</form>
</font></b>
</center>
<?php

function newUser()
{
	include 'dbconfig.php';
		$mid=$_POST['mid'];
		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$contact=$_POST['contact'];
		$address=$_POST['address'];
		$username=$_POST['username'];
		$password=$_POST['pwd'];
		$region=$_POST['region'];
		$sql = "INSERT INTO manager (MID, Name, Gender, DOB,Contact,Address,Username,Password,region) VALUES ('$mid','$name','$gender','$dob','$contact','$address','$username','$password','$region') ";

	if (mysqli_query($conn, $sql)) 
	{
		echo "Record created successfully!!;";
    echo'<META HTTP-EQUIV="Refresh" Content="3;">';

	} 
	else
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
function checkmid()
{
	include 'dbconfig.php';
	$mid=$_POST['mid'];
	$sql= "SELECT * FROM manager WHERE MID = '$mid'";

	$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)!=0)
       {
			echo"<b><br>MID already exists!!";
       }
	else 
		if(isset($_POST['Submit']))
	{ 
		newUser();
	}

	
}
function checkusername()
{
	include 'dbconfig.php';
	$usn=$_POST['username'];
	$sql= "SELECT * FROM manager WHERE Username = '$usn'";

	$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)!=0)
       {
			echo"<b><br>Username already exists!!";
       }
	else 
		if(isset($_POST['Submit']))
	{ 
		checkmid();
	}

	
}
if(isset($_POST['Submit']))
{
	if(!empty($_POST['mid'])&& !empty($_POST['region']) && !empty($_POST['username']) && !empty($_POST['pwd']) &&!empty($_POST['name']) &&!empty($_POST['dob'])&& !empty($_POST['gender']) &&!empty($_POST['address']) && !empty($_POST['contact']))
		checkusername();
	else
		echo "EMPTY VALUES NOT ALLOWED";
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
<link href="assets/css/index2.css" rel="stylesheet">
