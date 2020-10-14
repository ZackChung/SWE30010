<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description", content="PHP SRePS" />
	<title>SRePS</title>
</head>
<body>
<?php
	function alert($msg) {
	    echo "<script type='text/javascript'>alert('$msg');</script>";
	}

	require_once('settings.php');
	$conn = @mysqli_connect($host, $user, $pwd, $dbname);
	if (!$conn) {
		die(mysqli_connect_error());
	}

	if(isset($_POST["add"])) {
		if(!empty($_POST["scode"])) {
			$href_id = "sales";
			$scode = trim($_POST["scode"]);
			$s_pcode = trim($_POST["s_pcode"]);
			$quantity = trim($_POST["quantity"]);
			$date = trim($_POST["date"]);
			$table = "Sales";
			$query = "insert into $table values ('$scode', '$s_pcode', '$quantity', '$date')";
		} else {
			$href_id = "product";
			$p_pcode = trim($_POST["p_pcode"]);
			$pname = trim($_POST["pname"]);
			$stock = trim($_POST["stock"]);
			$sprice = trim($_POST["sprice"]);
			$bprice = trim($_POST["bprice"]);
			$table = "Product";
			$query = "insert into $table values ('$p_pcode', '$pname', '$stock', '$sprice', '$bprice')";
		}

		if (mysqli_query($conn, $query)) {
			header("Location: addRecord.php#".$href_id);
		} else {
			alert("Something wrong with your input.");
			echo mysqli_error($conn);
		}
	}
	mysqli_close($conn); 
	echo "<button><a href='addRecord.php'>Go Back</a></button>";
?>
</body>
</html>