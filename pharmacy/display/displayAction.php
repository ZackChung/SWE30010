<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description", content="PHP SRePS" />
	<title>SRePS - Display</title>
	<?php
		require_once('../settings.php');
		$conn = @mysqli_connect($host, $user, $pwd, $dbname);
		if (!$conn) {
			die(mysqli_connect_error());
		}
	?>
</head>
<body>
<?php
	if(!empty($_POST["scode"])){
		$table = "Sales";
		$scode = trim($_POST["scode"]);
		$query = "select * from $table where Sales_Code = '$scode'";
	} elseif (!empty($_POST["pcode"])) {
		$table = "Product";
		$pcode = trim($_POST["pcode"]);
		$query = "select * from $table where Product_Code = '$pcode'";
	} else {
		header("Location: displayRecord.php#sales");
	}

	$result = mysqli_query($conn, $query);
	if(!$result) {
		echo mysqli_error($conn);
	}
	else {
		if($table == "Sales") {
			echo "<table border=\"1\">";
			echo "<tr>\n"
				."<th scope=\"col\">Sales Code</th>\n"
				."<th scope=\"col\">Product Code</th>\n"
				."<th scope=\"col\">Quantity</th>\n"
				."<th scope=\"col\">Date of Sold</th>\n";
			while ($row = mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>", $row["Sales_Code"], "</td>";
				echo "<td>", $row["Product_Code"], "</td>";
				echo "<td>", $row["Sales_Quantity"], "</td>";
				echo "<td>", $row["Date_Of_Purchase"], "</td>";
				echo "</tr>";
			}
			echo "</table>";
		} elseif ($table == "Product") {
			echo "<table border=\"1\">";
			echo "<tr>\n"
				."<th scope=\"col\">Product Code</th>\n"
				."<th scope=\"col\">Product Name</th>\n"
				."<th scope=\"col\">Stock</th>\n"
				."<th scope=\"col\">Sale Price</th>\n"
				."<th scope=\"col\">Brought Price Price</th>\n";
			while ($row = mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>", $row["Product_Code"], "</td>";
				echo "<td>", $row["Product_Name"], "</td>";
				echo "<td>", $row["Stock"], "</td>";
				echo "<td>", $row["Sales_Price"], "</td>";
				echo "<td>", $row["Brought_Price"], "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		mysqli_free_result($result);
	}
?>
	<button><a href="displayRecord.php">Back To Display</a></button>
</body>
</html>