<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Hospital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

<br><br><br><br>
<center>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  CID:<input type="number" name="cid" required>
  <br>
  Name: <input type="text" name="name" required>
  <br>
  Address: <input type="text" name="address" required>
  <br>
  City: <input type="text" name="town" required>
  <br>
  State: 
  <select name="city" required>
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
  <br>
  Contact no.: <input type="number" name="contact" maxlength="12" minlength="8" required>
  <br>
  <button type="submit" name="Submit">REGISTER</button>
</form>
</font></b>
</center>
<?php


function newclinic()
{
	include 'dbconfig.php';
		$cid=$_POST['cid'];
		$name=$_POST['name'];
		$town=$_POST['town'];
		$city=$_POST['city'];
		$contact=$_POST['contact'];
		$address=$_POST['address'];
		$sql = "INSERT INTO clinic (CID, Name, Address, Town, City, Contact) VALUES ('$cid','$name','$address','$town','$city','$contact')";

	if (mysqli_query($conn, $sql)) 
	{
		echo "<h2>Record created successfully!!</h2>";
    echo'<META HTTP-EQUIV="Refresh" Content="3;">';
	
	} 
	else
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
function checkcid()
{
	include 'dbconfig.php';
	$cid=$_POST['cid'];
	$sql= "SELECT * FROM clinic WHERE cid = '$cid'";

	$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)!=0)
       {
			echo"<b><br>CID already exists!!";
       }
	else 
		if(isset($_POST['Submit']))
	{ 
		newclinic();
	}

	
}
if(isset($_POST['Submit']))
{
	if(!empty($_POST['cid'])&&!empty($_POST['name'])&&!empty($_POST['address'])&&!empty($_POST['town'])&&!empty($_POST['city']) && !empty($_POST['contact']))
			checkcid();
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

