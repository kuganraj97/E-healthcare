
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search-Doctor</title>
    
  </head>

  <body>

<?php
include "nav.php";
?>


<?php include "dbconfig.php"; ?>
<script>
function getspec(val) {
	$.ajax({
	type: "POST",
	url: "getspec.php",
	data:'regionid='+val,
	success: function(data){
		$("#specialization-list").html(data);
	}
	});
}
function getdoc(val) {
	$.ajax({
	type: "POST",
	url: "getdoc.php",
	data:'specializationid='+val,
	success: function(data){
		$("#name-list").html(data);
	}
	});
}
function getDoctorday(val) {
	$.ajax({
	type: "POST",
	url: "getdoc2.php",
	data:'did='+val,
	success: function(data){
		$("#doctor-list").html(data);
	}
	});
}

</script>
<body style="background-image:url(images/cover11.jpg)">
<br><br><br>
	<form action="locateus.php" method="post"><br><br><br>
	<div class="sucontainer" style="background-image:url(images/cover.jpg)">

		<label style="font-size:20px" >State:</label><br>
		<select name="Region" id="region-list" class="demoInputBox"  onChange="getspec(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select State</option>
		<?php
		$sql1="SELECT distinct(region) FROM doctor";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["region"]; ?>"><?php echo $rs["region"]; ?></option>
		<?php
		}
		?>
		</select>
        <br>
	
		<label style="font-size:20px" >Specialization:</label><br>
		<select id="specialization-list" name="Specialization" onChange="getdoc(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Specialization</option>
		</select><br>

		<label style="font-size:20px" >Doctor:</label><br>
		<select id="name-list" name="Name" onChange="getDoctorday(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Doctor</option>
		</select><br>

		<div class="container">
			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
		</div>
<?php
if(isset($_POST['submit']))
{
		include 'dbconfig.php';
		if(!empty($_POST['Name']))
		{
			$did=$_POST['Name'];
			$sql1 = "Select * from doctor where did= $did";
			$result1=mysqli_query($conn, $sql1);  
			if($row1 = mysqli_fetch_array($result1))
			{
			echo "<hr>";
			echo "<label><b><br>Name&nbsp;&nbsp;".$row1['name']."<br>Qualification:&nbsp;&nbsp;".$row1['qualification']."<br>Hospital Name:&nbsp;&nbsp;".$row1['hname']."<br>Address:&nbsp;&nbsp;".$row1['address']."<br><b>Contact:<b>&nbsp;&nbsp;".$row1['contact']."<br><b>Gender:<b>&nbsp;&nbsp;".$row1['gender']."<br><b>Specialization:<b>&nbsp;&nbsp;".$row1['specialization']."<br></b>"."</label><br>";
			
			$sql2="select * from doctor_availability where did=".$row1["did"];
			//$sql2 = "Select name,address,contact from clinic where cid in (select cid from doctor_availability where did in(Select did from doctor where did=".$row1['did']."));";
			$result2=mysqli_query($conn, $sql2);  
			while($row2 = mysqli_fetch_array($result2))
			{
			//echo "<b>Clinic Name:".$row2['name']."</b><br><b>Address:<b>".$row2['address']."<br><b>Contact:<b>".$row2['contact'];
			echo "<label><br><b>Consultation Day:&nbsp;".$row2["day"]."<br>Time:&nbsp;&nbsp;".$row2["starttime"]."&nbsp;&nbsp; to &nbsp;&nbsp;".$row2["endtime"]."</label><br>";
			
			}
			}
			else
		{
				echo"Enter a valid name.";
		}
		}
		else
		{
				echo"Enter a valid name.";
		}
		
}

?>
</div>
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
    <link href="assets/css/footer.css" rel="stylesheet">
    <link href="assets/css/index1.css" rel="stylesheet">
