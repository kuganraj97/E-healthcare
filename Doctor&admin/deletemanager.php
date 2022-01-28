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
    <title>Delete Manager</title>
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
</nav><br><br>  

<center>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  <br><br>
Enter MID:<br><?php
				require_once('dbconfig.php');
				$manager_result = $conn->query('select * from manager');
				?><br><br>
				<center>
				<select name="mid">
				<option value="">---Select MID---</option>
				<?php
				if ($manager_result->num_rows > 0) {
				while($row = $manager_result->fetch_assoc()) {
				?>
				<option value="<?php echo $row["mid"]; ?>"><?php echo $row["mid"]; ?></option>
				<?php
					}
					}
				?><br>
<br></select></center>
			<button type="submit" name="Submit1">Delete by MID</button><br><br>
			<br>---------OR---------<br>
			<br><br>
Select Name:<br><?php
				require_once('dbconfig.php');
				$manager_result = $conn->query('select * from manager order by MID ASC');
				?><br><br>
				<center>
				<select name="managername">
				<option value="">---Select Name---</option>
				<?php
				if ($manager_result->num_rows > 0) {
				while($row = $manager_result->fetch_assoc()) {
				?>
				<option value="<?php echo $row["mid"]; ?>"><?php echo $row["name"]; ?></option>
				<?php
					}
					}
				?><br>
<br></select></center>
				
<br><button type="submit" name="Submit2">Delete by Name</button>
</form>			
<?php
include 'dbconfig.php';
if(isset($_POST['Submit1']))
{
	$mid=$_POST['mid'];
	$sql = "DELETE FROM manager WHERE MID= $mid ";
	$sql1="update clinic set MID=0 where MID=$mid";
	if (mysqli_query($conn, $sql))
		{
		echo "Record deleted successfully.";
		echo'<META HTTP-EQUIV="Refresh" Content="3;">';
		
		}
	else
		{
			echo "Error deleting record: " . mysqli_error($conn);
		}
				if (mysqli_query($conn, $sql1)) 
				{
							echo "";
							
				} 
				else
				{
					echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
				}
				
}
if(isset($_POST['Submit2']))
{
	$mid=$_POST['managername'];
	$sql = "DELETE FROM manager WHERE mid = $mid ";
	$sql1="update clinic set MID=0 where MID=$mid";
	if (mysqli_query($conn, $sql))
		{
		echo "Record deleted successfully.";
		echo'<META HTTP-EQUIV="Refresh" Content="3;">';
		
		}
	else
		{
			echo "Error deleting record: " . mysqli_error($conn);
		}
				
				if (mysqli_query($conn, $sql1)) 
				{
							echo "Record reseted!!";
						
				} 
				else
				{
					echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
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
