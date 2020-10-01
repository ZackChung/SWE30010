<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description", content="PHP SRePS" />
	<title>SRePS</title>
</head>
<body>
	<h1>Add a Sales Record</h1>
	<form method="post" action="action.php">
		<label for="scode">Sales Code:</label><br/>
		<input type="text" name="scode" pattern="[0-9]+" required="required" /><br/>
		<label for="pcode">Product Code:</label><br/>
		<input type="text" name="pcode" required="required" /><br/>
		<label for="quantity">Quantity:</label><br/>
		<input type="text" name="quantity" pattern="[0-9]+" required="required" /><br/>
		<label for="date">Date of Sold:</label><br/>
		<input type="date" name="date" required="required" /><br/>
		<input type="submit" value="Add" />
	</form>
	<button><a href='index.php'>Go Back</a></button>
</body>
</html>