<!DOCTYPE html>
<html lang = "en">

<head>
	<meta charset 	= "utf-8"								 />
	<meta name 		= "description"	content = "Profit Result"	 />
	<meta name 		= "keywords"	content = "Profit Result"		 />
	<meta name		= "author"		content = "Yulei Zhu"	 />
	<title>Profit Result</title>
</head>


<body>
	<?php	
		require_once('../settings.php');
		$conn = @mysqli_connect($host, $user, $pwd, $dbname);

 		session_start();
		$dateFrom= $_POST["dateFrom"];
		$dateTo= $_POST["dateTo"];
		
		if (!$conn)
		{
			die(mysqli_connect_error());
		}
		else
		{
			$query = "
			SELECT Sales.Sales_Code, Sales.Product_Code, Sales.Sales_Quantity, Product.Sales_Price, Product.Product_Name, Product.Bought_Price, Sales.Date_Of_Purchase
			FROM Sales 
			INNER JOIN Product ON Sales.Product_Code = Product.Product_Code
			Where Sales.Date_Of_Purchase BETWEEN '$dateFrom' AND '$dateTo'";
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
			
				echo "<h2>Income between date of $dateFrom and $dateTo is:</h2>";
				echo "<p>$$income</p>";
				
				echo "<h2>Cost between date of $dateFrom and $dateTo is:</h2>";
				echo "<p>$$cost</p>";
				
				$profit = $income - $cost;
				echo "<h2>Profit between date of $dateFrom and $dateTo is:</h2>";
				echo "<p>$$profit</p>";
				
				mysqli_free_result($result);
			}
		}			

		mysqli_close($conn); 
		
	?>
	
	<form name="Filter" method="POST" action="profit_calc.php">
	
		<input type="submit" name="submit" value="Back"/>
		
	</form>

	<br/><br/>
	
</body>