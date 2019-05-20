<?php
	include("connectDatabase.php");

	$postInsert = "INSERT INTO forum (poster_id, poster_name, post) VALUES('" .
	$_POST["id"] . "', '" .
	$_POST["name"] . "', '" .
	$_POST["post"] . "')";

	$result = mysqli_query($connect, $postInsert);
	header("Location: /BookExchange/forums.php");
?>
