<?php
    include("connectDatabase.php");
    
    $bookInsert = "DELETE FROM cart WHERE isbn10='" . $_GET["isbn10"] . "';";
    $result = mysqli_query($connect, $bookInsert);
    
    header("Location: /BookExchange/profile.php");
?>