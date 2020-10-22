<!DOCTYPE html>
<html lang = "en">

<head>
	<meta charset 	= "utf-8"								 />
	<meta name 		= "description"	content = "Profit Result"	 />
	<meta name 		= "keywords"	content = "Profit Result"		 />
	<meta name		= "author"		content = "Yulei Zhu"	 />
	<title>Profit Result</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
</head>


<body class="card">
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
				echo "<header class=\"card-header\">"
					."<h1 class=\"text-center\" style=\"color: #4a919e;\">Profit Calculation</h1>"
					."</header>\n";
				echo "<div class=\"card-body\">";
				echo "<table border = \"1\" class=\"table\">\n";
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
			
				echo "<p class=\"font-weight-bold\">Income between date of $dateFrom and $dateTo is:</p>";
				echo "<p>$$income</p>";
				
				echo "<p class=\"font-weight-bold\">Cost between date of $dateFrom and $dateTo is:</p>";
				echo "<p>$$cost</p>";
				
				$profit = $income - $cost;
				echo "<p class=\"font-weight-bold\">Profit between date of $dateFrom and $dateTo is:</p>";
				echo "<p>$$profit</p>";

				mysqli_free_result($result);
			}
		}			

		mysqli_close($conn); 
		
	?>
	
	<form name="Filter" method="POST" action="profit_calc.php">
	
		<input type="submit" name="submit" value="Back" class="btn btn-primary btn-sm"/>
		
	</form>
	</div>

	<div class="card-footer">
		<a href='../index.php' class="btn btn-primary btn-sm">Go Back</a>
	</div>	
	
</body>