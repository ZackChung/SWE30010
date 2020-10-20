<!DOCTYPE html>
<html lang = "en">

<head>
	<meta charset 	= "utf-8"								 />
	<meta name 		= "description"	content = "Monthly report"	 />
	<meta name 		= "keywords"	content = "Monthly report"		 />
	<meta name		= "author"		content = "Yulei Zhu"	 />
	<title>Monthly report</title>
</head>


<body>
	<?php	
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "pharmacy";
		$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
		if (!$conn)
		{
			echo "<p>Database connection failure</p>";
		}
		else
		{
			$query = "
			SELECT sales.Sales_Code, sales.Product_Code, sales.Sales_Quantity, product.Sales_Price, product.Product_Name, product.Bought_Price
			FROM sales 
			INNER JOIN product ON sales.Product_Code = product.Product_Code";
			$result = mysqli_query($conn, $query);
			if (!$result)
			{
				echo "<p>Something is wrong with ", $query, "</p>";
			}
			else
			{
				//display a table of the sales detail
				echo "<h1>Sales Report</h1>\n";
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
			

			}
			mysqli_free_result($result);
		}			

		mysqli_close($conn); 
		
	?>

	<br/><br/>
	
	
</body>