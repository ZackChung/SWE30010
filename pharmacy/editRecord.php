<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style/SRePS.css" />
	<script type="text/javascript" src="js/SRePS.js"></script>
	<?php
		require_once('settings.php');
		$conn = @mysqli_connect($host, $user, $pwd, $dbname);
		if (!$conn) {
			header("HTTP/1.0 500 Internal Server Error");
		}
	?>
</head>
<body>
	<header>
		<ul>
			<li>
				<a id="products" href="#">Products</a>
			</li>
			<li>
				<a id="sales" href="#">Sales</a>
			</li>
		</ul>
	</header>
	<form id="edit_form" action="editAction.php" method="post">
		<table id="p_table">
			<?php
				$db_product_table = mysqli_query($conn, "SELECT * FROM Product");
			?>
			<tr>
				<th>Product Code</th>
				<th>Product Name</th>
				<th>Stock</th>
				<th>Sale Price</th>
				<th>Bought Price</th>
				<th></th>
			</tr>
			<?php for ($i=0;$i<mysqli_num_rows($db_product_table);$i++) {
							$row = mysqli_fetch_array($db_product_table);
			?>
			<tr>
				<td>
					<?php echo $row["Product_Code"]; ?>
					<input type="hidden" class="pcode" name="pcode" value="<?php echo $row["Product_Code"]; ?>" />
				</td>
				<td>
					<input type="text" class="pname" name="pname" value="<?php echo $row["Product_Name"]; ?>" />
				</td>
				<td>
					<input type="text" class="stock" name="stock" value="<?php echo $row["Stock"]; ?>" />
				</td>
				<td>						
					<input type="text" class="sale" name="sale" value="<?php echo $row["Sales_Price"]; ?>" />
				</td>
				<td>
					<input type="text" class="bought" name="bought" value="<?php echo $row["Bought_Price"]; ?>" />
				</td>
				<td>
					<!--<button type="button" id="edit" name="edit" >
						<img src="images/pencil2.png" />
					</input>-->
				</td>
			</tr>
			<?php
			}
			?>
		</table>
		<table id="s_table">
			<?php
				$db_sales_table = mysqli_query($conn, "SELECT * FROM Sales");
			?>
			<tr>
				<th>Sales Number</th>
				<th>Product Code</th>
				<th>Sales Quantity</th>
				<th>Date</th>
				<th></th>
			</tr>
			<?php for ($i=0;$i<mysqli_num_rows($db_sales_table);$i++) {
							$row = mysqli_fetch_array($db_sales_table);
			?>
			<tr>
				<td>
					<?php echo $row["Sales_Code"] ?>
					<input type="hidden" class="scode" name="scode" value="<?php echo $row["Sales_Code"] ?>" />
				</td>
				<td>
					<input type="text" id="pcode" name="pcode" value="<?php echo $row["Product_Code"] ?>" />
				</td>
				<td>
					<input type="text" id="squant" name="squant" value="<?php echo $row["Sales_Quantity"] ?>" />
				</td>
				<td>
					<input type="text" id="sdate" name="sdate" value="<?php echo $row["Date_Of_Purchase"] ?>" />
				</td>
				<td>
					<!--<button type="button" id="edit" name="edit" >
						<img src="images/pencil2.png" />
					</input>-->
				</td>
			</tr>
			<?php
			}
			?>
		</table>
	</form>
	<button><a href='index.php'>Go Back</a></button>
</body>
</html>