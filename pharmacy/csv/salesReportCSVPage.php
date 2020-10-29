<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description", content="PHP SRePS" />
	<title>Sales Report and Prediction System</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
</head>
<body class="card">
	<header class="card-header">
        <h1 class="text-center" style="color: #4a919e;">Export to CSV File</h1>
    </header>
	<?php 
		include '../ui-design/menu.php';
	?>
    <div class="card-body">
<?php
	require_once('../settings.php');
	$conn = @mysqli_connect($host, $user, $pwd, $dbname);
	if(!$conn){ 
		echo "<p>Database Connection Failure</p>"; 
	}
	else {
        $datebegin = trim($_POST["datebegin"]);
        $dateend = trim($_POST["dateend"]);
        $table = "Sales";
        $query = "SELECT * FROM $table WHERE Date_Of_Purchase BETWEEN '" . $datebegin . "' AND  '" . $dateend . "' ORDER by Date_Of_Purchase ASC";

        $result = mysqli_query($conn, $query);
		if (!$result) {
            echo mysqli_error($conn);
		}
		else {
			session_start();
			$_SESSION["datebegin"] = $datebegin;
			$_SESSION["dateend"] = $dateend;
			echo "<table border=\"1\" class=\"table\"><tr><th>Sales Code</th><th>Product Code</th><th>Sales Quantity</th><th>Date of Purchase</th></tr>";			
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" .$row["Sales_Code"]."</td><td> ".$row["Product_Code"]."</td><td>" .$row["Sales_Quantity"]."</td><td>" .$row["Date_Of_Purchase"]."</td>";
              }
			echo "</table>";
            echo "<p>Successfully generated sales report for ", mysqli_num_rows($result)," sales between ", $datebegin, " and ", $dateend, ".</p>";
		}

		
	}
?>
	</div>
	<div class="card-footer">
		<a href='salesReportCSV.php'  class="btn btn-primary btn-sm">Go Back</a>
		<a href='csv.php' class="btn btn-primary btn-sm">Export to CSV</a>
	</div>
</body>
</html>