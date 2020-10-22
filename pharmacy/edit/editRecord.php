<!DOCTYPE html>
<html>
<head>
	<title>Sales Report and Prediction System</title>
<!-- 	<link rel="stylesheet" href="../style/edit.css" /> -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
	<script type="text/javascript" src="../js/edit.js"></script>
	<?php
		require_once('../settings.php');
		$conn = @mysqli_connect($host, $user, $pwd, $dbname);
		if (!$conn) {
			header("HTTP/1.0 500 Internal Server Error");
		}
	?>
</head>
<body class="card">
	<header class="card-header">
		<h1 class="text-center" style="color: #4a919e;">Edit Sales Records or Prodcuts</h1>
	</header>
	<div class="card-body">
		<ul class="list-group list-group-horizontal-sm">
			<li class="list-group-item d-inline">
				<a id="products" href="#">Products</a>
			</li>
			<li class="list-group-item d-inline">
				<a id="sales" href="#">Sales</a>
			</li>
		</ul>
		<form id="edit_form" action="editAction.php" method="post" class="card-body">
			<table id="p_table" class="table">
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
						<!-- <button type="button" id="edit" name="edit" >
							<img src="images/pencil2.png" />
						</input> -->
					</td>
				</tr>
				<?php
				}
				?>
			</table>
			<table id="s_table" class="table">
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
						<!-- <button type="button" id="edit" name="edit" >
							<img src="images/pencil2.png" />
						</input> -->
					</td>
				</tr>
				<?php
				}
				?>
			</table>
		</form>
	</div>
	<div class="card-footer">
		<a href='../index.php' class="btn btn-primary btn-sm">Go Back</a>
	</div>
</body>
</html>