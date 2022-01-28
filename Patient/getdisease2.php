<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
require_once("dbconfig.php");
<?php

$sql = "SELECT * FROM disease"; 
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
	echo "<option value='".$row['id']."'>".$row['category']."</option>";
}
?>

?>
</body>
</html>