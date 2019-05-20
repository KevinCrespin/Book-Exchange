<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Main</title>
    <link href="mainMenu.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
        include("mainMenu.php");
    ?>

    <div class="container-fluid">
    <div class="row">
            <div class="col" id="black-box">
                <a class="li_css_a" href="shopping.php?<?php print $name_email; ?>">SHOP</a>
            </div>
            <div class="col" id="white-box">
                <a class="li_css_a" href="selling.php?<?php print $name_email; ?>">SELL</a>
            </div>
        </div>

        <div class="row">
            <div class="col-6" id="white-box">
                <a class="li_css_a" href="profile.php?<?php print $name_email; ?>">PROFILE</a>
            </div>
            <div class="col-6" id="black-box">
                <a class="li_css_a" href="forums.php?<?php print $name_email;?>">FORUMS</a>
            </div>
        </div>
        <div class="row">
            <div class="col" id="black-box">
                <a class="li_css_a" href="src/logout.php?<?php print $name_email;?>">LOGOUT</a>
            </div>
        </div>
    </div>   
</body>
</html>