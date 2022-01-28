<!DOCTYPE html>
<html lang="en">
<?php include "dbconfig.php";?>
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cancel Appointment</title>


  </head>

<?php include "dbconfig.php"; ?>
<?php
include "nav2.php";
?>

<body style="background-image: url('images/signup3.jpg');">
<center>
	<form action="cancelbookingpatient.php" method="post">
		
	<div class="sucontainer">
		<label style="font-size:20px" >Select Appointment to Cancel:</label><br>
		<select name="appointment" id="appointment-list" class="demoInputBox"  style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Appointment</option>
		<?php
		session_start();
		$username=$_SESSION['username'];
		$date= date('Y-m-d');
		$sql1="SELECT * from book where username='".$username."'and status not like 'Cancelled by Patient' and DOV >='$date'";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) {
			$sql2="select * from doctor where did=".$rs["DID"];
			$results2=$conn->query($sql2);
				while($rs2=$results2->fetch_assoc()) {
					$sql3="select * from clinic where cid=".$rs["CID"];
					$results3=$conn->query($sql3);
		while($rs3=$results3->fetch_assoc()) {
			
		?>
		<option value="<?php echo $rs["Timestamp"]; ?>"><?php echo "Patient: ".$rs["Fname"]." Date: ".$rs["DOV"]." -Dr.".$rs2["name"]."&nbsp; -Hospital: ".$rs3["name"]." -Town: ".$rs3["town"]." - Booked on:".$rs["Timestamp"]; ?></option>
		<?php
		}
		}
		}
		?>
		</select>
		

			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
	</form>
	</center>
	<?php
if(isset($_POST['submit']))
{
		$username=$_SESSION['username'];
		$timestamp=$_POST['appointment'];
		$updatequery="update book set Status='Cancelled by Patient' where username='$username' and timestamp= '$timestamp'";
				if (mysqli_query($conn, $updatequery)) 
				{
							echo "Appointment Cancelled successfully..!!<br>";
							echo'<META HTTP-EQUIV="Refresh" Content="1;">';

				} 
				else
				{
					echo "Error: " . $updatequery . "<br>" . mysqli_error($conn);
				}

}
?>
</body>
</html>

<script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/source.bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/index1.css" rel="stylesheet">
	<link href="assets/css/cancel.css" rel="stylesheet">