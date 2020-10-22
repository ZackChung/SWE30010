<?php
	require_once('../settings.php');
	$conn = @mysqli_connect($host, $user, $pwd, $dbname);
	
	if (!$conn) {
		die(mysqli_connect_error());
	}
	
	if (isset($_POST["submit"])) {
		if ($_POST["pname"] != "") {
			$href_id = "products";
			$product_code = $_POST["pcode"];
			$product_name = $_POST["pname"];
			$stock = $_POST["stock"];
			$sale_price = $_POST["sale"];
			$bought_price = $_POST["bought"];
			
			$sql = "UPDATE Product SET Product_Name = '$product_name', Stock = $stock, Sales_Price = $sale_price, Bought_Price = $bought_price WHERE Product_Code = $product_code";
		} else {
			$href_id = "sales";
			$sales_code = $_POST["scode"];
			$product_code = $_POST["pcode"];
			$sales_quantity = $_POST["squant"];
			$date = $_POST["sdate"];
			
			$sql = "UPDATE Sales SET Product_Code = $product_code, Sales_Quantity = $sales_quantity, Date_Of_Purchase = '$date' WHERE Sales_Code = $sales_code";
		}
		
		if (mysqli_query($conn, $sql)) {
			header("Location: editRecord.php#".$href_id);
		} else {
			echo mysqli_error($conn);
		}
		mysqli_close($conn);
	}
?>