<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description", content="PHP SRePS" />
	<title>Sales Report and Prediction System</title>
</head>
<body>
<?php
	require_once('settings.php');
	$conn = @mysqli_connect($host, $user, $pwd, $dbname);
	if(!$conn){ 
		echo "<p>Database Connection Failure</p>"; 
	}
	else {
		session_start();
		ob_get_clean();
		$datebegin = $_SESSION["datebegin"];
		$dateend = $_SESSION["dateend"];
        $table = "sales";
        $query = "SELECT * FROM $table WHERE Date_Of_Purchase BETWEEN '" . $datebegin . "' AND  '" . $dateend . "' ORDER by Date_Of_Purchase ASC";

        $result = mysqli_query($conn, $query);
		if (!$result) {
            echo "<p>Something is wrong with your input.", $datebegin, $dateend, "</p>";   
		}
		else {

			$num_fields = mysqli_num_fields($result);
			$headers = array();
			while ($fieldinfo = mysqli_fetch_field($result)) {
    		$headers[] = $fieldinfo->name;
			}
			$fp = fopen('php://output', 'w');
			if ($fp && $result) {
    			header('Content-Type: text/csv');
    			header('Content-Disposition: attachment; filename="export.csv"');
    			header('Pragma: no-cache');
    			header('Expires: 0');
    			fputcsv($fp, $headers);
    			while ($row = $result->fetch_array(MYSQLI_NUM)) {
        			fputcsv($fp, array_values($row));
    			}		
    		die;
			}	
			echo "<p>",$datebegin, "and" , $dateend, ".</p>";
		}
	}
?>
</body>
</html>


