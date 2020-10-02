<!DOCTYPE html>
<html lang="en">


<head>
	<title>Results</title>
</head>


<body>

<?php
$code = $_GET["code"];
$type = $_GET["type"];
$servername= "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " .$conn->connect_error);

}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');";
    echo "window.location.href='predictsales.php';</script>";
}

	$sql2 = "SELECT Product_name FROM Product WHERE Product_code = " .$code ;
	$variable = $conn->query($sql2)->fetch_assoc();
	$productName = $variable["Product_name"];

if ($type == "month") {
	$sql = "SELECT SUM(Sales_quantity) FROM Sales WHERE EXTRACT(MONTH FROM DATE) >= EXTRACT(MONTH FROM CURRENT_TIMESTAMP) - 6  AND Product_code = " .$code ; 
	// $sql = "SELECT SUM(Sales_quantity) FROM Sales WHERE EXTRACT(MONTH FROM DATE) >= EXTRACT(MONTH FROM CURRENT_TIMESTAMP)  AND Product_code = " .$code ; 
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$amount = round($row["SUM(Sales_quantity)"]/3);
	$msg =  $amount. " " .$productName. " predicted to be sold next " .$type;
	alert($msg);
}
else if ($type == "week") {
	$sql = "SELECT SUM(Sales_quantity) FROM Sales WHERE DATE >= DATE_ADD('2020-06-01', INTERVAL -21 DAY) AND Product_code = " .$code ;
	// $sql = "SELECT SUM(Sales_quantity) FROM Sales WHERE DATE >= DATE_ADD(CURRENT_TIMESTAMP, INTERVAL -21 DAY) AND Product_code = " .$code ;
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$amount = round($row["SUM(Sales_quantity)"]/3);
	$msg =  $amount. " " .$productName. " predicted to be sold next " .$type;
	alert($msg);
}

$conn ->close();
?>

</body>
</html>