<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Administrator Page</title>
</head>

<body>
<?php
	include("connectDatabase.php");

	$searchUsers = "SELECT * FROM users WHERE " .
		"name='" . $_POST["name"] . "' AND " .
		"email='" . $_POST["email"] . "'";
	$results = mysqli_query($connect, $searchUsers);
	
	if (mysqli_num_rows($results) == 0) {
		header("Location: /BookExchange/login.html");
		exit;
	}

	if (mysqli_num_rows($results) > 0) {
		$data = mysqli_fetch_assoc($results);
		session_start();
		$_SESSION['name'] = $_POST["name"];
		$_SESSION['email'] = $_POST["email"];
		$_SESSION['id'] = $data["id"];
		$_SESSION['isAdmin'] = $data["is_admin"];

		if ($_SESSION['isAdmin'] == 1){
			header("Location: /BookExchange/admin.php");
		} else{
			header("Location: /BookExchange/main.php");
		}
		exit;
	}
?>
	<nav>
	<a href = "src/userEnroll.php">Go to Enrollment Page</a>
	</nav>
	<table align="center" border="2" width=400>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Delete</th>
		</tr>
		<?php
			while($row = mysqli_fetch_assoc($results)) {
				print "<tr>";
				print "<td>";
				print ($row["name"]);
				print "</td>";
				print "<td>";
				print ($row["email"]);
				print "</td>";
				Print "<td>";
				Print "<a href='src/userDelete.php?";
				Print "email=" . $row["email"] . "'>";
				Print "DELETE";
				Print "</a>";
				Print "</td>";
				print "</tr>";
			}
		?>
	</table>
</body>
</html>