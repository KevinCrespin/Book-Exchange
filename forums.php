<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Forum</title>
<style>
    th {
        background-color: #4a4f55;
        color: #ffffff;
        font-weight:normal;
    }
</style>
</head>

<body>
<?php
	include("mainMenu.php");
	include("src/connectDatabase.php");

	$selectForums = "SELECT * FROM forum;";
	$results = mysqli_query($connect, $selectForums);
?>
<nav>
</nav>
<h2 align="center" style="margin-top:20px; margin-bottom:20px;">FORUM</h2>
<div class="fluid-container">
    <div class="row">
        <div class="col-8">
            <table class="table table-bordered table-sm" style="margin-left: 50px;">
                <thead class="thead-light">
                    <tr>
                        <th>NAME</th>
                        <th>POST</th>
                    </tr>
                    <?php
                        while($row = mysqli_fetch_assoc($results)){
                            print "<tr>";
                            print "<td>";
                            print ($row["poster_name"]);
                            print "</td>";
                            print "<td>";
                            print ($row["post"]);
                            print "</td>";
                            print "</tr>";
                        }
                    ?>
                </thead>
             </table>
        </div>
        <div class="col-4">
            <form action="src/forumsInsert.php" method="post">
                <table align="center" style="margin-left: 50px;">
                    <tr>
                        <td>Posting as: &nbsp;&nbsp;&nbsp; <?php print $_SESSION['name']?></td>
                        <td style="text-align: left;"><input type="hidden" name="name" value="<?php print $_SESSION['name']?>"/></td>
                        <input type="hidden" name="id" value="<?php print $_SESSION['id']?>" />
                    </tr>
                    <tr>
                        <td colspan="2"><textarea rows="6" cols="40" name="post"  maxlength="250" required></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: right;"><input class="btn btn-primary" style="width: 100px; height: 40px;" type="submit" value="Post"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>
