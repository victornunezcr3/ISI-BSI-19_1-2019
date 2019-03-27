<?php 

require_once 'db_connect.php';

if($_POST) {
	$editorial = $_POST['editorial'];
	$per = $_POST['porcentaje'];

	$sql = "CALL sp_increase_price_var('$editorial','$per')";
	if($connect->query($sql) === TRUE) {
		echo "<p>Precios incrementados en un $per % a la editorial:$editorial !!</p>";
		echo "<a href='../index.php'><button type='button'>Back</button></a>";
	} else {
		echo "Error updating records : " . $connect->error;
	}

	$connect->close();
}

?>