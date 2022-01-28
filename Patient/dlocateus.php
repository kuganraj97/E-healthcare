<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search-Disease</title>
    
  </head>
  <?php include "dbconfig.php"; ?>
<script>
function getdisease(val) {
	$.ajax({
	type: "POST",
	url: "getdisease.php",
	data:'categoriesid='+val,
	success: function(data){
		$("#named-list").html(data);
	}
	});
}

</script>

<body style="background-image:url(images/cover11.jpg)">
<?php
include "nav.php";
?>
	<form action="dlocateus.php" method="post">
	<div class="sucontainer" style="background-image:url(images/cover.jpg)">

		<label style="font-size:20px" >Categories:</label><br>
		<select name="categories" id="categories-list" class="demoInputBox"  onChange="getdisease(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Category</option>
		<?php
		$sql1="SELECT distinct(categories) FROM disease";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["categories"]; ?>"><?php echo $rs["categories"]; ?></option>
		<?php
		}
		?>
		</select>
        <br>
	
		<label style="font-size:20px" >Disease:</label><br>
		<select id="named-list" name="Named"  style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Disease</option>
		</select><br>

		<div class="container">
			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
		</div>
<?php


if(isset($_POST['submit']))

{
		include 'dbconfig.php';
		if(!empty($_POST['Named'])){
		$bid=$_POST['Named'];
		$sql1 = "Select * from disease where bid=$bid";

		$result1=mysqli_query($conn, $sql1);  
		$row1 = mysqli_fetch_array($result1);
	
		echo "<label><b> Categories&nbsp:&nbsp&nbsp".$row1['categories']."</b><br><b>Disease&nbsp:&nbsp&nbsp<b>".$row1['named']."<br><b>Symptoms&nbsp:&nbsp&nbsp<b><br>".$row1['symptoms']."<br><b>Overview&nbsp:&nbsp&nbsp<b><br>".$row1['description']."</label>"; 
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
    <link href="assets/css/footer.css" rel="stylesheet">
    <link href="assets/css/index1.css" rel="stylesheet">
    