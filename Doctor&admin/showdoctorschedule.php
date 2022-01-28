<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Show Doctor Schedule</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/admin2.css"> 

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
table{
    width: 88%;
    border-collapse: collapse;
	border: 0px solid black;
    padding: 4px;
	font-size: 23px;
}

th{
border: 4px solid black;
	background-color: #00cc99;
    color: grey;
	text-align: left;
}
tr,td{
	border: 4px solid black;
	background-color: white;
    color: black;
}
</style>

</head>
<body background= "images/signup3.jpg">
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
<center>
<?php
session_start();
$con = mysqli_connect('localhost','root','','ehealthcare');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM doctor_availability order by DID,CID ASC";
$result = mysqli_query($con,$sql);
echo "<br><br><br><table>
<tr>
<th><center>CID</center></th>
<th><center>Hospital Name</center></th>
<th><center>DID</center></th>
<th><center>Doctor Name</center></th>
<th><center>Day</center></th>
<th><center>Time</center></th>
</tr>";
while($row = mysqli_fetch_array($result))
{
	$sql1="SELECT * from doctor where DID=".$row["did"];
	$result1= mysqli_query($con,$sql1);
	while($row1= mysqli_fetch_array($result1))
	{
	$sql2="SELECT * from clinic where CID=".$row["cid"];
	$result2= mysqli_query($con,$sql2);
	while($row2= mysqli_fetch_array($result2))
	{
    echo "<tr>";
	echo "<td>" . "<center>". $row['cid'] . "</center>". "</td>";
    echo "<td>". "<center>" . $row2['name']."-".$row2['town'] . "</center>". "</td>";
	echo "<td>" . "<center>". $row['did'] . "</center>". "</td>";
    echo "<td>" . "<center>". $row1['name'] . "</center>". "</td>";
	echo "<td>" . "<center>". $row['day'] . "</center>". "</td>";
    echo "<td>" . "<center>". $row['starttime']."-".$row['endtime']. "</center>". "</td>";
    echo "</tr>";
	}
	}
}
echo "</table>";
mysqli_close($con);
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=alogin.php"); 
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
