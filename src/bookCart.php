<?php
    include("connectDatabase.php");

    $bookInsert = "INSERT INTO CART VALUES('" . $_GET["isbn10"] . "');";
    $result = mysqli_query($connect, $bookInsert);
    
    header("Location: /BookExchange/profile.php");
?>