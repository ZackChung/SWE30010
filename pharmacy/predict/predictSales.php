<!DOCTYPE html>
<html lang="en">
<head>
	<title>SRePS - Predict</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
	<link rel="stylesheet" href="../style/style.css" />
</head>
<body class="card">
	<header class="card-header">
		<h1 class="text-center" style="color: #4a919e;">Predict Sales Report</h1>
	</header>
	<?php 
		include '../ui-design/menu.php';
	?>
	<form action="predictAction.php" method="post" class="card-body">
	<?php 
		require_once('../settings.php');
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
		<input type ="submit" value="Submit" class="btn btn-primary btn-sm"/>
	</form>
	<div class="card-footer">
		<a href='../index.php' class="btn btn-primary btn-sm">Go Back</a>
	</div>
</body>
</html>
