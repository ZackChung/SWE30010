<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description", content="PHP SRePS" />
	<title>SRePS</title>
</head>
<body>
<?php
	require_once('settings.php');
	$conn = @mysqli_connect($host, $user, $pwd, $dbname);
	if(!$conn){ 
		echo "<p>Database Connection Failure</p>"; 
	}
	else {
		$scode = trim($_POST["scode"]);
		$pcode = trim($_POST["pcode"]);
		$quantity = trim($_POST["quantity"]);
		$date = trim($_POST["date"]);
		$table = "Sales";
		$query = "insert into $table values ('$scode', '$pcode', '$quantity', '$date')";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			echo "<p>Something is wrong with your input.", $scode, $pcode, $quantity, $date, "</p>";
		}
		else {
			echo "<p>Successfully added new record.</p>";
		}
		mysqli_close($conn); 
	}
	echo "<button><a href='add.php'>Go Back</a></button>";
?>
</body>
</html>