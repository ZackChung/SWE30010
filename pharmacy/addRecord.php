<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description", content="PHP SRePS" />
	<title>SRePS - Add</title>
	<link rel="stylesheet" type="text/css" href="style/edit.css" />
	<script type="text/javascript" src="js/add.js"></script>
</head>
<body>
	<header>
		<h1>Add a Sales Record or Prodcut</h1>
		<ul>
			<li>
				<a href="#" id="sales">Sales</a>
			</li>
			<li>
				<a href="#" id="product">Product</a>
			</li>
		</ul>
	</header>
	<form id="add_form" method="post" action="addAction.php">
		<table id="s_table">
			<tr>
				<th>Sales Code</th>
				<th>Product Code</th>
				<th>Sales Quantity</th>
				<th>Date</th>
			</tr>
			<tr>
				<td>
					<input type="text" name="scode" pattern="[0-9]+" />
				</td>
				<td>
					<input type="text" name="s_pcode" />
				</td>
				<td>
					<input type="text" name="quantity" pattern="[0-9]+" />
				</td>
				<td>
					<input type="date" name="date" />
				</td>
			</tr>
		</table>
		<table id="p_table">
			<tr>
				<th>Prodcut Code</th>
				<th>Product Name</th>
				<th>Stock</th>
				<th>Sales Price</th>
				<th>Bought Price</th>
			</tr>
			<tr>
				<td>
					<input type="text" name="p_pcode" />
				</td>
				<td>
					<input type="text" name="pname" />
				</td>
				<td>
					<input type="text" name="stock" pattern="[0-9]+" />
				</td>
				<td>
					<input type="text" name="sprice" />
				</td>
				<td>
					<input type="text" name="bprice" />
				</td>
			</tr>
		</table>
		<input type="submit" value="Add" name="add"/>
	</form>
	<button><a href='index.php'>Go Back</a></button>
</body>
</html>