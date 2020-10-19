<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description", content="PHP SRePS" />
	<title>SRePS - Display</title>
	<script type="text/javascript" src="js/display.js"></script>
	<?php
		require_once('settings.php');
		$conn = @mysqli_connect($host, $user, $pwd, $dbname);
		if (!$conn) {
			die(mysqli_connect_error());
		}
	?>
</head>
<body>
	<header>
		<ul>
			<li>
				<a href="#" id="sales">Sales</a>
			</li>
			<li>
				<a href="#" id="product">Product</a>
			</li>
		</ul>
	</header>
	<form method="post" action="displayAction.php">
		<input type="text" name="scode" id="scode" pattern="[0-9]+" />
		<input type="text" name="pcode" id="pcode" pattern="[0-9]+" />
		<input type="submit" name="search" value="Search" /><br/>
	</form>
	<table id="p_table" border="1">
		<?php
			$db_product_table = mysqli_query($conn, "SELECT * FROM Product");
		?>
		<tr>
			<th>Product Code</th>
			<th>Product Name</th>
			<th>Stock</th>
			<th>Sale Price</th>
			<th>Bought Price</th>
		</tr>
		<?php for ($i=0;$i<mysqli_num_rows($db_product_table);$i++) {
						$row = mysqli_fetch_array($db_product_table);
		?>
		<tr>
			<td>
				<?php echo $row["Product_Code"]; ?>
			</td>
			<td>
				<?php echo $row["Product_Name"]; ?>
			</td>
			<td>
				<?php echo $row["Stock"]; ?>
			</td>
			<td>						
				<?php echo $row["Sales_Price"]; ?>
			</td>
			<td>
				<?php echo $row["Bought_Price"]; ?>
			</td>
		</tr>
		<?php
		}
		?>
	</table>
	<table id="s_table" border="1">
		<?php
			$db_sales_table = mysqli_query($conn, "SELECT * FROM Sales");
		?>
		<tr>
			<th>Sales Number</th>
			<th>Product Code</th>
			<th>Sales Quantity</th>
			<th>Date</th>
		</tr>
		<?php for ($i=0;$i<mysqli_num_rows($db_sales_table);$i++) {
						$row = mysqli_fetch_array($db_sales_table);
		?>
		<tr>
			<td>
				<?php echo $row["Sales_Code"] ?>
			</td>
			<td>
				<?php echo $row["Product_Code"] ?>
			</td>
			<td>
				<?php echo $row["Sales_Quantity"] ?>
			</td>
			<td>
				<?php echo $row["Date_Of_Purchase"] ?>
			</td>
		</tr>
		<?php
		}
		?>
	</table>
	<button><a href='index.php'>Go Back</a></button>
</body>
</html>