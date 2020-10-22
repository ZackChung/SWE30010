<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description", content="PHP SRePS" />
	<title>SRePS - Display</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
	<script type="text/javascript" src="../js/display.js"></script>
	<?php
		require_once('../settings.php');
		$conn = @mysqli_connect($host, $user, $pwd, $dbname);
		if (!$conn) {
			die(mysqli_connect_error());
		}
	?>
</head>
<body class="card">
	<header class="card-header">
		<h1 class="text-center" style="color: #4a919e;">Display Sales Records or Prodcuts</h1>
	</header>
	<div class="card-body">
		<ul class="list-group list-group-horizontal-sm">
			<li class="list-group-item d-inline">
				<a href="#" id="sales">Sales</a>
			</li>
			<li class="list-group-item d-inline">
				<a href="#" id="product">Product</a>
			</li>
		</ul>
		<form method="post" action="displayAction.php" class="card-body">
			<input type="text" name="scode" id="scode" pattern="[0-9]+" />
			<input type="text" name="pcode" id="pcode" pattern="[0-9]+" />
			<input type="submit" name="search" value="Search" class="btn btn-primary btn-sm" /><br/>
		</form>
		<table id="p_table" class="table text-center">
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
		<table id="s_table" class="table text-center">
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
	</div>
	<div class="card-footer">
		<a href='../index.php' class="btn btn-primary btn-sm">Go Back</a>
	</div>
</body>
</html>