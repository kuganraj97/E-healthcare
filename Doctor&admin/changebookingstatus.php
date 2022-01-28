<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Appointment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/index1.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head><?php include "dbconfig.php"; ?>
<style>
table{
    width: 100%;
    border-collapse: collapse;
	border: 4px solid black;
    padding: 10px;
	font-size: 25px;
}

th{
border: 1px solid black;
	background-color: rgb(12, 176, 255);
    color: white;
	text-align: center;
}
tr,td{
	border: 1px solid black;
	background-color: white;
    color: black;
	font-size: 16pt;
}

.sucontainer{
	padding: 12px;
	position:absolute;
	left:10px;
	right:10px;
	top: 20%;
	border:2px solid white;
	border-collapse:collapse;
	background:rgb(12, 176, 255);
}

input[type=text], input[type=password], input[type=email] ,input[type=date], input[type=number]  {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
button
{
	border-radius:12px;
    background-color:grey;
    border: solid black;
	border-radius: 12px;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}
</style>


<body style="background-image:url('images/signup3.jpg')">
<?php
include "nav2.php";
?>	
<br><br><br>

<form action="changebookingstatus.php" method="post">
	<div class="sucontainer" style="background-image:url(images/cover.jpg)">

		<label style="font-size:20px" >&nbsp;Doctor:</label><br>
		<select name="doctor" id="doctor-list" class="demoInputBox" style="width:100%;height:35px;border-radius:9px, padding: left 10px;" required>
		<option value="">Select Doctor</option>
		<?php
		session_start();
		$mid=$_SESSION['mgrid'];
		$sql1="SELECT * FROM doctor where did in(select did from doctor_availability where cid in (select cid from manager_clinic where mid=$mid));";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["did"]; ?>"><?php echo $rs["name"]; ?></option>
		<?php
		}
		?>
		</select>
        <br><br>

		<label style="font-size:20px"><b>&nbsp;Date:</b></label><br>
		<input type="date" name="dateselected" required><br><br>
		<br>

		<div class="container">
			<button type="submit" style="position:center" name="submit" value="Submit">&nbsp;Submit</button>
		</div>

		<br>
			</form>
<?php
if(isset($_POST['submit']))
{
		
		include 'dbconfig.php';
		$did=$_POST['doctor'];
		$cid=1;
		$dateselected=$_POST['dateselected'];
		$sql1 = "select * from book where DOV='". $_POST['dateselected']."' AND DID= $did AND CID= $cid order by Timestamp ASC";
		 $results1=$conn->query($sql1); 
			require_once("dbconfig.php");
?>			
				<form action="changebookingstatus.php" method="post">; 
				<table>
				
				<tr>
				<th>User Name</th>
				<th>Name</th>
				<th>Date Of Visit</th>
				<th>Time stamp</th>
				<th>Status</th>
			
				</tr>

<?php
			while($rs1=$results1->fetch_assoc())
			{
				echo "<tr>";
					echo  '<td><input type="text" name="username[]" id="username" value="'.$rs1["Username"].'" readonly></td>'
					.'<td><input type="text" name="fname[]" id="fname" value="'.$rs1["Fname"].'" readonly></td>'
					.'<td><input type="date" name="dov[]" id="dov" value="'.$rs1["DOV"].'" readonly></td>'
					.'<td><input type="text" name="timestamp[]" id="timestamp" value="'.$rs1["Timestamp"].'" readonly></td>'
					.'<td><input type="text" name="status[]" id="status" value="'.$rs1["Status"].'" readonly></td></tr>' ;
					
			} 
		
		
		
?>		

			</table>	<br><break><br><break>
				
<?php

}

	
?>
	
</body>
</html>
<!-- assets -->    

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/source.bootstrap.min.js"></script>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
<link href="assets/css/index1.css" rel="stylesheet">