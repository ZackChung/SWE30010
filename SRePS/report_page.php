<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description", content="PHP SRePS" />
	<title>SRePS</title>
</head>
<body>
<?php
	require_once('settings.php');
	$conn = @mysqli_connect($host, $user, $pwd, $dbname);
	if(!$conn){ 
		echo "<p>Database Connection Failure</p>"; 
	}
	else {
        $datebegin = trim($_POST["datebegin"]);
        $dateend = trim($_POST["dateend"]);
        $table = "sales";
        $query = "SELECT * FROM $table WHERE Date_Of_Purchase BETWEEN '" . $datebegin . "' AND  '" . $dateend . "' ORDER by Date_Of_Purchase ASC";

        $result = mysqli_query($conn, $query);
		if (!$result) {
            echo "<p>Something is wrong with your input.", $datebegin, $dateend, "</p>";   
		}
		else {
			echo "<table><tr><th>Sales Code</th><th>Product Code</th><th>Sales Quantity</th><th>Date of Purchase</th></tr>";			
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" .$row["Sales_Code"]."</td><td> ".$row["Product_Code"]."</td><td>" .$row["Sales_Quantity"]."</td><td>" .$row["Date_Of_Purchase"]."</td>";
              }
			echo "</table>";
            echo "<p>Successfully generated sales report for ", mysqli_num_rows($result)," sales between ", $datebegin, " and ", $dateend, ".</p>";
		}
	}
	echo "<button><a href='report.php'>Go Back</a></button>";
	echo "<button><a href='csv.php'>Export to CSV</a></button>";
?>
</body>
</html>