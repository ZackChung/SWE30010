<!DOCTYPE html>
<html lang = "en">

<head>
	<meta charset 	= "utf-8"										 />
	<meta name 		= "description"	content = "Profit Calculation"	 />
	<meta name 		= "keywords"	content = "Profit Calculation"	 />
	<meta name		= "author"		content = "Yulei Zhu"			 />
	<title>Profit Calculation</title>
</head>


<body>
	<?php	
		require_once('../settings.php');
		$conn = @mysqli_connect($host, $user, $pwd, $dbname);

		if (!$conn) {
			die(mysqli_connect_error());
		}
		else
		{
			$query = "
			SELECT Sales.Sales_Code, Sales.Product_Code, Sales.Sales_Quantity, Product.Sales_Price, Product.Product_Name, Product.Bought_Price
			FROM Sales 
			INNER JOIN Product ON Sales.Product_Code = Product.Product_Code";
			$result = mysqli_query($conn, $query);
			if (!$result)
			{
				echo mysqli_error($conn);
			}
			else
			{
				echo "<h1>Profit Calculation</h1>\n";
				echo "<table border = \"1\">\n";
				echo "<tr>\n"
					."<th scope=\"col\">Sales_Code</th>\n"
					."<th scope=\"col\">Product_Code</th>\n"
					."<th scope=\"col\">Sales_Quantity</th>\n"
					."<th scope=\"col\">Sales_Price</th>\n"
					."<th scope=\"col\">Bought_Price</th>\n"
					."<th scope=\"col\">Product_Name</th>\n"
					."</tr>\n";
				$income = 0;
				$cost = 0;
				while ($row = mysqli_fetch_assoc($result))
				{
					echo "<tr>\n";
					echo "<td>", $row["Sales_Code"],"</td>\n";
					echo "<td>", $row["Product_Code"],"</td>\n";
					echo "<td>", $row["Sales_Quantity"],"</td>\n";
					echo "<td>", $row["Sales_Price"],"</td>\n";
					echo "<td>", $row["Bought_Price"],"</td>\n";
					echo "<td>", $row["Product_Name"],"</td>\n";
					echo "</tr>\n";
					
					$income += $row["Sales_Quantity"] * $row["Sales_Price"];
					$cost += $row["Sales_Quantity"] * $row["Bought_Price"];
				}
			
				echo "</table>\n";
			
				echo "<h2>Total Income:</h2>";
				echo "<p>$$income</p>";
				
				echo "<h2>Total Cost:</h2>";
				echo "<p>$$cost</p>";
			
				$profit = $income - $cost;
				echo "<h2>Total Profit:</h2>";
				echo "<p>$$profit</p>";

				mysqli_free_result($result);
			}
		}			

		mysqli_close($conn); 
		
	?>

	<form name="Filter" method="POST" action="profit_calc_result.php">
		From:
		<input type="date" name="dateFrom" value="<?php echo date('Y-m-d'); ?>" />
		<br/><br/>
		To:
		<input type="date" name="dateTo" value="<?php echo date('Y-m-d'); ?>" />
		<br/><br/>
		<input type="submit" name="submit" value="Calculate"/>	
	</form>

	<button><a href ="../index.php">Go Back</a></button>

	<?php
		session_start();
		if(isset($_POST["dateFrom"]) && isset($_POST["dateTo"])) {
			$dateFrom= $_POST["dateFrom"];
			$dateTo= $_POST["dateTo"];
			$_SESSION["dateFrom"] = $dateFrom;
			$_SESSION["dateTo"] = $dateTo;
		}
	?>
	
	
	
	
</body>