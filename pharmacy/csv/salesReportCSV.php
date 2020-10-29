<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description", content="PHP SRePS" />
	<title>SRePS - Generate Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
	<link rel="stylesheet" href="../style/style.css" />
</head>

<body class="card">
    <header class="card-header">
        <h1 class="text-center" style="color: #4a919e;">Generate a Sales Report</h1>
    </header>
	<?php 
		include '../ui-design/menu.php';
	?>
	<form method="post" action="salesReportCSVPage.php" class="card-body">
        <label for="databegin">Date Range Begin:</label><br/>
        <input type="date" name="datebegin" required="required" /><br/>
        <label for="dataend">Date Range End:</label><br/>
        <input type="date" name="dateend" required="required" /><br/><br />
        <input type="submit" value="Generate"  class="btn btn-primary btn-sm"/>
    </form>
    <div class="card-footer">
        <a href='../index.php' class="btn btn-primary btn-sm">Go Back</a>
    </div>
</body>