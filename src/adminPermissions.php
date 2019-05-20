<?php
    include("connectDatabase.php");
    
    $getAdminQuery = "SELECT is_admin FROM users WHERE email='" . $_GET["email"] . "' AND name='" . $_GET["name"] . "';";
    $queryResult = mysqli_query($connect, $getAdminQuery);
    $isAdmin = null;

    while($rowAdmin = mysqli_fetch_assoc($queryResult)){
        $isAdmin = $rowAdmin["is_admin"];
    }

    if ($isAdmin == 1) {
        $updateQuery = "UPDATE users SET is_admin = " . 0 . " where email='" . $_GET["email"] . "' AND name='" . $_GET["name"] . "'";
        mysqli_query($connect, $updateQuery);
    }

    if ($isAdmin == 0) {
        $updateQuery = "UPDATE users SET is_admin = " . 1 . " where email='" . $_GET["email"] . "' AND name='" . $_GET["name"] . "'";
        mysqli_query($connect, $updateQuery);
    }

    header("Location: /BookExchange/admin.php");
?>