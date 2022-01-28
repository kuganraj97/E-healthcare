<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript"></script>
<body>
<?php
require_once("dbconfig.php");
	$query ="SELECT * FROM doctor WHERE Specialization = '" . $_POST["specializationid"] . "'";
	$results = $conn->query($query);
?>
	<option value="">Select Specialization</option>
<?php
	while($rs=$results->fetch_assoc()) {
?>
	<option value="<?php echo $rs["did"];?>"><?php echo $rs["name"]; ?></option>
<?php

}
?>
</body>
</html>