<!DOCTYPE html>
<html lang="en">
<?php include "dbconfig.php";?>
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Book Appointment</title>


  </head>
  
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

function getDay(val) {
	var cidval=document.getElementById("clinic-list").value;
	var didval=document.getElementById("doctor-list").value;
	$.ajax({
	type: "POST",
	url: "getDay.php",
	data:'date='+val+'&cidval='+cidval+'&didval='+didval,
	success: function(data){
		$("#datestatus").html(data);
	}
	});
}

</script>

<?php
include "nav2.php";
?>

<body style="background-image: url('images/signup3.jpg');">

	<form action="book.php" method="post">
	<div class="sucontainer" style="background-image:url(images/cover.jpg)">
		<label><b>Name:</b></label><br>
		<input type="text" placeholder="Enter Patient's Name" name="fname" required><br>
		
		<label><b>Gender</b></label><br>
		<input type="radio" name="gender" value="female">Female&nbsp;
		&nbsp;
		<input type="radio" name="gender" value="male">Male&nbsp;
		&nbsp;
		<input type="radio" name="gender" value="other">Other<br><br>
	
		<label style="font-size:20px" >State:</label><br>
		<select name="city" id="city-list" class="demoInputBox"  onChange="getTown(this.value);" style="width:100%;height:35px;border-radius:9px" required>
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
		<select id="town-list" name="Town" onChange="getClinic(this.value);" style="width:100%;height:35px;border-radius:9px" required>
		<option value="">Select City</option>
		</select><br>
		
		<label style="font-size:20px" >Hospital:</label><br>
		<select id="clinic-list" name="Clinic" onChange="getDoctorday(this.value);" style="width:100%;height:35px;border-radius:9px" required>
		<option value="">Select Hospital</option>
		</select><br>
		
		<label style="font-size:20px" >Doctor:</label><br>
		<select id="doctor-list" name="Doctor" onChange="getDate(this.value);" style="width:100%;height:35px;border-radius:9px" required>
		<option value="">Select Doctor</option>
		</select><br>
		
		
		<label><b>Date of Visit:</b></label><br>
		<input type="date" name="dov" onChange="getDay(this.value);" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d',strtotime('+7 day'));?>" required><br><br>
		<div id="datestatus"> </div>
		
		<div class="container">
			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
		</div>
	</div>
<?php

if(isset($_POST['submit']))
{
		
		include 'dbconfig.php';
		$fname=$_POST['fname'];
		$gender=$_POST['gender'];
		$username=$_SESSION['username'];
		$cid=$_POST['Clinic'];
		$did=$_POST['Doctor'];
		$dov=$_POST['dov'];
		$status="Booking Registered.Wait for the update";
		$timestamp=date('Y-m-d H:i:s');
		$sql = "INSERT INTO book (Username,Fname,Gender,CID,DID,DOV,Timestamp,Status) VALUES ('$username','$fname','$gender','$cid','$did','$dov','$timestamp','$status') ";
		if(!empty($_POST['fname'])&&!empty($_POST['gender'])&&!empty($_SESSION['username'])&&!empty($_POST['Clinic'])&&!empty($_POST['Doctor']) && !empty($_POST['dov']))
		{
			$checkday = strtotime($dov);
			$compareday = date("l", $checkday);
			$flag=0;
			require_once("dbconfig.php");
			$query ="SELECT * FROM doctor_availability WHERE DID = '" .$did. "' AND CID='".$cid."'";
			$results = $conn->query($query);
			while($rs=$results->fetch_assoc())
			{
				if($rs["day"]==$compareday)
				{
					$flag++;
					break;
				}
			}
			if($flag==0)
			{
				echo "<h2>Choose date, as Doctor Unavailable on ".$compareday."</h2>";
			}
			else
			{
				if (mysqli_query($conn, $sql)) 
				{
						echo "<h2>Appointment Fixed!!</h2>";
						echo'<META HTTP-EQUIV="Refresh" Content="1;">';
				} 
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
		else
		{
			echo "Enter data properly!!!!";
		}
}
?>
	</form>
</body>
</html>

<script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/source.bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/index1.css" rel="stylesheet">
	<link href="assets/css/booking.css" rel="stylesheet">