<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description", content="PHP SRePS" />
	<title>Sales Report and Prediction System</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
</head>
<body class="card text-center">
	<h1 class="card-header" style="color: #4a919e;">Sales Report and Predict System</h1>
	<div class="container card-body">
		<div class="row">
			<a href="add/addRecord.php" title="add record" class="col btn btn-light btn-sm" style="color: #318fb5;">Add a Sales Record</a>
			<a href="display/displayRecord.php" title="display record" class="col btn btn-light btn-sm" style="color: #318fb5;">Display a Sales Record</a>
		</div>
		<div class="row">
			<a href="edit/editRecord.php" title="edit record" class="col btn btn-light btn-sm" style="color: #318fb5;">Edit a Sales Record</a>
			<a href="sales/sale_report.php" title="generate sales report" class="col btn btn-light btn-sm" style="color: #318fb5;">Generate a Sales Report</a>
		</div>
		<div class="row">
		<a href="predict/predictSales.php" title="predict report" class="col btn btn-light btn-sm" style="color: #318fb5;">Predict the Sales</a>
		<a href="csv/salesReportCSV.php" title="generate csv report" class="col btn btn-light btn-sm" style="color: #318fb5;">Generate a CSV Sales Report</a>
		</div>
		<div class="row">
			<a href="stocksubmit.php" title="stock check" class="col btn btn-light btn-sm" style="color: #318fb5;">Check the Stock</a>
			<a href="profit/profit_calc.php" title="profit calculation" class="col btn btn-light btn-sm" style="color: #318fb5;">Profit Calculation</a>
		</div>
	</div>
</body>
</html>