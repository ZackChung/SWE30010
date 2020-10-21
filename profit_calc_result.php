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
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "pharmacy";
		$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 

 		session_start();
		$dateFrom= $_POST["dateFrom"];
		$dateTo= $_POST["dateTo"];
		
		
		if (!$conn)
		{
			echo "<p>Database connection failure</p>";
		}
		else
		{
			$query = "
			SELECT sales.Sales_Code, sales.Product_Code, sales.Sales_Quantity, product.Sales_Price, product.Product_Name, product.Bought_Price, sales.Date_Of_Purchase
			FROM sales 
			INNER JOIN product ON sales.Product_Code = product.Product_Code
			Where sales.Date_Of_Purchase BETWEEN '$dateFrom' AND '$dateTo'";
			$result = mysqli_query($conn, $query);
			if (!$result)
			{
				echo "<p>Something is wrong with ", $query, "</p>";
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

			}
			mysqli_free_result($result);
		}			

		mysqli_close($conn); 
		
	?>
	
	<form name="Filter" method="POST" action="profit_calc.php">
	
		<input type="submit" name="submit" value="Back"/>
		
	</form>

	<br/><br/>
	
</body>