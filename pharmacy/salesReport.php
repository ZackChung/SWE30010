<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description", content="PHP SRePS" />
	<title>SRePS - Generate Report</title>
</head>

<body>
	<h1>Generate a Sales Report</h1>
	<form method="post" action="salesReportPage.php">
        <label for="databegin">Date Range Begin:</label><br/>
        <input type="date" name="datebegin" required="required" /><br/>
        <label for="dataend">Date Range End:</label><br/>
        <input type="date" name="dateend" required="required" /><br/>
        <input type="submit" value="Generate" />
    </form>
    <button><a href ="index.php">Go Back</a></button>
</body>