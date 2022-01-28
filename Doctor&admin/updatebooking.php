<?php
include_once "dbconfig.php";
?>

<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Change Booking Status</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/index1.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<style>
table{

    border-collapse: collapse;
	border: 4px solid black;
	font-size: 18px;
    width: 90%;
    padding: 20px 20px 20px 20px;
    text-align:center;
    margin-left: auto;
  margin-right: auto;
   
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
    text-align:center;

}



input[type=text], input[type=password], input[type=email] ,input[type=date], input[type=number]  {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    text-align: center;
    align: center;
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
    transition-duration: 0.4s;
    cursor: pointer;
    margin: 0;
  position: absolute;
  top: 70%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>
<?php
include "nav2.php";
?>	

<body style="background-image:url('images/signup3.jpg')">
<br>
<br>
<br>
<br>
<form action="updatebooking.php"  method="post"> 
				<table>
				<tr>
				<th><center>UserName<center></th>
				<th><center>First Name<center></th>
				<th><center>DOV<center></th>
				<th><center>Timestamp<center></th>
				<th><center>Status<center></th>
				</tr>
<?php
{
$sql="SELECT * FROM book ";
$result = $conn->query($sql); 

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo  '<td><input type="text" name="username[]" id="username" value="'.$row["Username"].'" readonly></td>'
    .'<td><input type="text" name="fname[]" id="fname" value="'.$row["Fname"].'" readonly></td>'
    .'<td><input type="date" name="dov[]" id="dov" value="'.$row["DOV"].'" readonly></td>'
    .'<td><input type="text" name="timestamp[]" id="timestamp" value="'.$row["Timestamp"].'" readonly></td>'
    .'<td><input type="text" name="status[]" id="status" value="'.$row["Status"].'"></td></tr>' ;
    echo "</tr>";
}
?>
</table>	
<br>
<br>
<button type="submit" name="submit2" value="Submit">Submit Changes</button></form>
<?php
}
require_once("dbconfig.php");
			if(isset($_POST['submit2']))
		{
			$usrnm=$_POST["username"];
			$fnm=$_POST["fname"];
			$tmstmp=$_POST["timestamp"];
			$stts=$_POST["status"];
			$dt=$_POST["dov"];
			$n=count($usrnm);
			for($j=0;$j<$n;$j++)
			{	
				$updatequery="update book set Status='$stts[$j]' where username='$usrnm[$j]' and timestamp='$tmstmp[$j]'";
				if (mysqli_query($conn, $updatequery)) 
				{
							echo "$fnm[$j] : Status updated successfully..!!<br>";
                            echo'<META HTTP-EQUIV="Refresh" Content="2;">';

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
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/source.bootstrap.min.js"></script>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
<link href="assets/css/index1.css" rel="stylesheet">