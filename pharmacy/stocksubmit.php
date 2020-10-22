<?php 
	require_once('settings.php');

	function alert($msg) {
    	echo "<script type='text/javascript'>alert('$msg');";
    	echo "window.location.href='index.php';</script>";
	}

	$conn = @mysqli_connect($host, $user, $pwd, $dbname);
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
		if ($stock < 10) {
			$msg .= $row['Product_name']. " is low, only " .$stock . " is left\\n";	
		}		
	}
	if ($msg == "") {
			$msg = "No stock is low";
	}
	alert($msg);
	
?>