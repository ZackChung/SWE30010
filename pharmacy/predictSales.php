<!DOCTYPE html>
<html lang="en">
<head>
	<title>Predict Sales</title>
</head>
<body>
	<form action="predictAction.php" method="post">
	<?php 
		require_once('settings.php');
		$conn = @mysqli_connect($host, $user, $pwd, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " .$conn->connect_error);
		}
		$sql = "SELECT Product_code, Product_name FROM Product";
		$result = $conn->query($sql);
	?>
		<label for="Product Code" name="Product Code">Product: </label>
		<select id="code" name ="code">
	<?php 
		while($row = $result->fetch_assoc()) {
			echo "<option value = '".$row['Product_code']."'>".$row['Product_name']."</option>";	
		}
	?>
		</select>
		<label for="Type" name="Type">Type: </label>
		<select id="type" name ="type">
			<option value = "week">Weekly</option> 
			<option value = "month">Monthly</option>
		</select>
		<input type ="submit" value="Submit"/>
	</form>
	<button><a href='index.php'>Go Back</a></button>
</body>
</html>
