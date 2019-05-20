<?php
    include("connectDatabase.php");

    session_start();
    unset($_SESSION[$name_email]);
    session_destroy();

    $bookDelete = "DELETE FROM cart;";
    $result = mysqli_query($connect, $bookDelete);
    header("Location: /BookExchange/login.html");
    exit;
?>