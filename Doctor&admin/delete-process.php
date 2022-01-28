<?php
include_once "dbconfig.php";
$sql = "DELETE FROM book WHERE Username='" . $_GET["Username"] . "'";
if (mysqli_query($conn, $sql)) {
    header( "Refresh:0; url=deletebooking.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>