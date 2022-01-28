<?php
include_once "dbconfig.php";
$result = mysqli_query($conn,"SELECT * FROM book");
?>

<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delete Booking</title>
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

    border-collapse: collapse;
	border: 4px solid black;
	font-size: 25px;
    width: 90%;
    padding: 10px;
    text-align:center;
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
<?php
include "nav2.php";
?>	

<body style="background-image:url('images/signup3.jpg')">
<br>
<br>
<br>
<br>


<center>
    <table>
        <tr>
        <th><center>User Name</center></th>
		<th><center>Name</center></th>
		<th><center>Date Of Visit</center></th>
		<th><center>Time stamp</center></th>
		<th><center>Status</center></th>
        <th><center>Action</center></th>
        </tr>
        <?php
        $i=0;
        while($row = mysqli_fetch_array($result)) {
        ?>
        <tr class="<?php if(isset($classname)) echo $classname;?>">
        <td><?php echo $row["Username"]; ?></td>
        <td><?php echo $row["Fname"]; ?></td>
        <td><?php echo $row["DOV"]; ?></td>
        <td><?php echo $row["Timestamp"]; ?></td>
        <td><?php echo $row["Status"]; ?></td>
        <td><a href="delete-process.php?Username=<?php echo $row["Username"]; ?>">Delete</a></td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </table>
    </center>
    </body>
    </html>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/source.bootstrap.min.js"></script>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
<link href="assets/css/index1.css" rel="stylesheet">