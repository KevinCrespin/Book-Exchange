<?php
    include("connectDatabase.php");
    include($_SERVER['DOCUMENT_ROOT'] . "/BookExchange/mainMenu.php");
    
    $bookPrice = 0;

    $selectBooks = "SELECT * FROM books b JOIN cart c where b.isbn10 = c.isbn10";
    $results = mysqli_query($connect, $selectBooks);
    
    while($row = mysqli_fetch_assoc($results)) {
        $bookPrice = $bookPrice + $row["price"];
    }

    $selectProfile = "SELECT * FROM users where email='" . $_SESSION["email"] . "'";
    $account = mysqli_query($connect, $selectProfile);   
    $data = mysqli_fetch_assoc($account);

    $bal = $data["balance"];
    $userNewBalance = $bal - $bookPrice;
    $userBalanceUpdateQuery = "UPDATE users SET balance=" .  $userNewBalance . " WHERE email ='" . $_SESSION["email"] . "';";
    $userBalanceUpdateResult = mysqli_query($connect, $userBalanceUpdateQuery);
    
    $selectSellerIDPriceQuery = "SELECT seller_id, price FROM books INNER JOIN cart ON books.isbn10=cart.isbn10";
    $selectSellerIDPrice = mysqli_query($connect, $selectSellerIDPriceQuery);

    while($selectSellerIDPriceArray = mysqli_fetch_assoc($selectSellerIDPrice)) {
        $sellerCurrentBalanceQuery = "SELECT balance FROM users WHERE id = " . $selectSellerIDPriceArray["seller_id"] . ";";
        $sellerCurrentbalance = mysqli_fetch_assoc(mysqli_query($connect, $sellerCurrentBalanceQuery))["balance"];
        $sellerNewCurrentBalance = $sellerCurrentbalance + $selectSellerIDPriceArray["price"];
        $sellerNewBalanceUpdateQuery = "UPDATE users SET balance = $sellerNewCurrentBalance WHERE id = " . ($selectSellerIDPriceArray["seller_id"]). ";";
        $sellerNewBalanceUpdateResult = mysqli_query($connect, $sellerNewBalanceUpdateQuery);
    }

    $bookDeleteBooks = "DELETE books FROM books INNER JOIN cart ON books.isbn10 = cart.isbn10 WHERE books.isbn10 = cart.isbn10;";
    $result = mysqli_query($connect, $bookDeleteBooks);

    $bookDelete = "DELETE FROM cart;";
    $result = mysqli_query($connect, $bookDelete);

    header("Location: /BookExchange/profile.php");
?>