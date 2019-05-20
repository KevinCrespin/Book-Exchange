<?php
	include("connectDatabase.php");

	if ($_GET["holdstatus"] == "Active") {
		$holdStatus = "Hold";
	} else {
		$holdStatus = "Active";
	}
	$uHSQuery = "UPDATE users SET hold_status = '" . $holdStatus . "' WHERE email='" . $_GET["email"] . "';";
	$uIBObject = mysqli_query($connect, $uHSQuery);

	header("Location: /BookExchange/admin.php");
?>