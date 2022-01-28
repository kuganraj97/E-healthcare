<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript"></script>
<body>
<?php
require_once("dbconfig.php");
	$query ="SELECT * FROM doctor WHERE Region = '" . $_POST["regionid"] . "'";
	$results = $conn->query($query);
?>
	<option value="">Select State</option>
<?php
	while($rs=$results->fetch_assoc()) {
?>
	<option value="<?php echo $rs["specialization"];?>"><?php echo $rs["specialization"]; ?></option>
<?php

}
?>
</body>
</html>