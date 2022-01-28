<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search-Hospital</title>
    
  </head>
<?php include "dbconfig.php"; ?>
<script>
function getTown(val) {
	$.ajax({
	type: "POST",
	url: "get_town.php",
	data:'countryid='+val,
	success: function(data){
		$("#town-list").html(data);
	}
	});
}
function getClinic(val) {
	$.ajax({
	type: "POST",
	url: "getclinic.php",
	data:'townid='+val,
	success: function(data){
		$("#clinic-list").html(data);
	}
	});
}
function getDoctorday(val) {
	$.ajax({
	type: "POST",
	url: "getdoctordaybooking.php",
	data:'cid='+val,
	success: function(data){
		$("#doctor-list").html(data);
	}
	});
}
</script>

<body style="background-image:url(images/cover11.jpg)">
<?php
include "nav.php";
?>
	<form action="hlocateus.php" method="post">
	<div class="sucontainer" style="background-image:url(images/cover.jpg)">

		<label style="font-size:20px" >State:</label><br>
		<select name="city" id="city-list" class="demoInputBox"  onChange="getTown(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select State</option>
		<?php
		$sql1="SELECT distinct(city) FROM clinic";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["city"]; ?>"><?php echo $rs["city"]; ?></option>
		<?php
		}
		?>
		</select>
        <br>
	
		<label style="font-size:20px" >City:</label><br>
		<select id="town-list" name="Town" onChange="getClinic(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select City</option>
		</select><br>
		
		<label style="font-size:20px" >Hospital:</label><br>
		<select id="clinic-list" name="Clinic" onChange="getDoctorday(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Hospital</option>
		</select><br>
		<div class="container">
			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
		</div>
<?php


if(isset($_POST['submit']))
{
		include 'dbconfig.php';
		if(!empty($_POST['Clinic'])){
		$cid=$_POST['Clinic'];
		$sql1 = "Select * from Clinic where cid=$cid";
		$result1=mysqli_query($conn, $sql1);  
		$row1 = mysqli_fetch_array($result1);
		$sql2 = "Select name,gender,specialization,contact from doctor where did in (select did from doctor_availability where cid=$cid);";
		$result2=mysqli_query($conn, $sql2);  
		$row2 = mysqli_fetch_array($result2);
		echo "<label><b>Hospital Name:".$row1['name']."</b><br><b>Address:<b>".$row1['address']."<br><b>Contact:<b>".$row1['contact']."</label>"; 
		}
		else
		{
			echo"Enter a valid name.";
		}
}
?>
	</form>
</body>
</html>



<!-- assets -->    
<link rel="stylesheet" href="assets/css/side.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/source.bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/index1.css" rel="stylesheet">
 