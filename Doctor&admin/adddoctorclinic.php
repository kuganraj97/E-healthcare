<?php
  session_start();
  require_once 'dbconfig.php';
  ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Assign Doctor to Clinic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/index2.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/adminside2.css"> 

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>

function getState(val) {
	$.ajax({
	type: "POST",
	url: "getclinic.php",
	data:'city='+val,
	success: function(data){
		$("#clinic-list").html(data);
	}
	});
}
function getDoctorRegion(val) {
	$.ajax({
	type: "POST",
	url: "getdoctorregion.php",
	data:'city='+val,
	success: function(data){
		$("#doctor-list").html(data);
	}
	});
}

</script>
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<div class="sucontainer" >
<label style="font-size:20px" >State:</label>
		<select name="city" id="city-list" class="demoInputBox"  onChange="getState(this.value);getDoctorRegion(this.value);" style="width:100%;height:35px;border-radius:9px" >
		<option value="">Select State</option>
		<?php
		include 'dbconfig.php';
		$sql1="SELECT distinct City FROM clinic";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["City"]; ?>"><?php echo $rs["City"]; ?></option>
		<?php
		}
		?>
		</select>
        
	
		<label style="font-size:20px" >Hospital:</label>
		<select id="clinic-list" name="clinic" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Hospital</option>
		</select><br>
		
		<label style="font-size:20px" >Doctor:</label>
		<select name="doctor" id="doctor-list" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Doctor</option>
		</select><br>
		<br>
		<label style="font-size:20px" ><br>
		Available Days<br>
		<table>
		<tr><td>Monday:</td><td><input type="checkbox" value="Monday" name="daylist[]"/></td></tr>
		<tr><td>Tuesday:</td><td><input type="checkbox" value="Tuesday" name="daylist[]"/></td></tr>
		<tr><td>Wednesday:</td><td><input type="checkbox" value="Wednesday" name="daylist[]"/></td></tr>
		<tr><td>Thursday:</td><td><input type="checkbox" value="Thursday" name="daylist[]"/></td></tr>
		<tr><td>Friday:</td><td><input type="checkbox" value="Friday" name="daylist[]"/></td></tr>
		<tr><td>Saturday:</td><td><input type="checkbox" value="Saturday" name="daylist[]"/></td></tr>
		</table><br>
		Availability&nbsp;(24 hour Format):<br>
		<br>From: &nbsp;<input type="time" name="starttime"><br>
		<br>&nbsp; &nbsp;To: &nbsp; <input type="time" name="endtime"> 
		
		</label>
		<button name="Submit" type="submit">Submit</button>
	</div>
	</form>
	</center>
	<?php


if(isset($_POST['Submit']))
{
		include 'dbconfig.php';
		$cid=$_POST['clinic'];
		$did=$_POST['doctor'];
		$starttime=$_POST['starttime'];
		$endtime=$_POST['endtime'];
		
		foreach($_POST['daylist'] as $daylist)
		{
				$sql = "INSERT INTO doctor_availability (CID, DID, Day, Starttime, Endtime) VALUES ('$cid','$did','$daylist','$starttime','$endtime')";
				if (mysqli_query($conn, $sql)) 
				{
					echo "&nbsp;Record created successfully!&nbsp;";
					echo'<META HTTP-EQUIV="Refresh" Content="3;">';
				} 
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
		}
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
