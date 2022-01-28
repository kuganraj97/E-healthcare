<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript"></script>
<body>
<?php
require_once("dbconfig.php");
	$query ="SELECT * FROM disease WHERE Categories = '" . $_POST["categoriesid"] . "'";
	$results = $conn->query($query);
?>
	<option value="">Select Disease</option>
<?php
	while($rs=$results->fetch_assoc()) {
?>
		<option value="<?php echo $rs["bid"]; ?>"><?php echo $rs["named"]."-".$rs["categories"]."(BID-".$rs["bid"].")"; ?></option>
<?php

}
?>
</body>
</html