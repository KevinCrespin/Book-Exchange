<?php
	include("connectDatabase.php");

	$userInsert = "INSERT INTO users (name, email) VALUES ('" .
	$_POST["name"] . "', '" .
	$_POST["email"] . "')";

	$result = mysqli_query($connect, $userInsert);
	header("Location: /BookExchange/login.html");
?>