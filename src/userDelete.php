<?php
	include("connectDatabase.php");

	$userDelete = "DELETE FROM users WHERE email = '" . $_GET["email"] . "'";
	$result = mysqli_query($connect, $userDelete);
	header("Location: /BookExchange/admin.php");
?>
