<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description", content="PHP SRePS" />
	<title>SRePS</title>
</head>
<body>
	<form method="post" action="display.php">
		<input type="text" name="scode" pattern="[0-9]+" />
		<input type="submit" name="search" value="Search" /><br/>
	</form>
<?php
	require_once('settings.php');
	$conn = @mysqli_connect($host, $user, $pwd, $dbname);
	if(!$conn){ 
		echo "<p>Database Connection Failure</p>"; 
	}
	else{
		$table = "Sales";
		if(isset($_POST["search"]) && !empty($_POST["scode"])){
			$scode = trim($_POST["scode"]);
			$query = "select * from $table where Sales_Code = '$scode'";
		}
		else{
			$query = "select * from $table";
		}
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Something is wrong.";
		}
		else{
			if(mysqli_num_rows($result) > 0){
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
				mysqli_free_result($result);
			}
		}
		mysqli_close($conn);
	}
	echo "<button><a href='index.php'>Go Back</a></button>";
?>
</body>
</html>