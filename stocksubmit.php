<?php 
	$servername= "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";

	function alert($msg) {
    	echo "<script type='text/javascript'>alert('$msg');";
    	echo "window.location.href='stockcheck.php';</script>";
    	 
	}
	$conn = new mysqli($servername, $username, $password, $dbname);
	$msg = "";

	if ($conn->connect_error) {
		die("Connection failed: " .$conn->connect_error);

	}
	$sql = "SELECT Stock, Product_name FROM Product";
	$result = $conn->query($sql);

?>

<?php 
	while($row = $result->fetch_assoc()) {
		$stock = $row['Stock'];
		if ($stock <5) {
			$msg .= $row['Product_name']. " is low, only " .$stock . " is left\\n";	
		}		
	}
	if ($msg == "") {
			$msg = "No stock is low";
	}
	alert($msg);
	
?>