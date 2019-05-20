<?php
	include("connectDatabase.php");

    $userBalanceQuery = "SELECT balance FROM users WHERE email='" . $_GET["email"] . "';";
    $userBalanceObject = mysqli_query($connect, $userBalanceQuery);
    $userBalanceArray = mysqli_fetch_assoc($userBalanceObject);
    
    $b = $userBalanceArray["balance"] + 100;

	$uIBQuery = "UPDATE users SET balance = '" . $b . "' WHERE email='" . $_GET["email"] . "'";
    $uIBObject = mysqli_query($connect, $uIBQuery);
    
	header("Location: /BookExchange/admin.php");
?>
