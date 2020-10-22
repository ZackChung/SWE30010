<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description", content="PHP SRePS" />
	<title>SRePS - Add</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
	<script type="text/javascript" src="../js/add.js"></script>
</head>
<body class="card">
	<header class="card-header">
		<h1 class="text-center" style="color: #4a919e;">Add a Sales Record or Prodcut</h1>
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
		<form id="add_form" method="post" action="addAction.php" class="card-body">
			<table id="s_table" class="table text-center">
				<tr>
					<th scope="col">Sales Code</th>
					<th scope="col">Product Code</th>
					<th scope="col">Sales Quantity</th>
					<th scope="col">Date</th>
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
			<table id="p_table" class="table text-center">
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
			<input type="submit" value="Add" name="add" class="btn btn-primary btn-sm" />
		</form>
	</div>
	<div class="card-footer">
		<a href='../index.php' class="btn btn-primary btn-sm">Go Back</a>
	</div>
</body>
</html>