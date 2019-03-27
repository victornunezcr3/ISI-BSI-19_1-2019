<?php 

require_once 'db_connect.php';

if($_POST) {
	$editorial = $_POST['editorial'];

	$sql = "CALL sp_increase_perc_pric('$editorial')";
	if($connect->query($sql) === TRUE) {
		echo "<p>Precios incrementados en un 10%!!</p>";
		echo "<a href='../index.php'><button type='button'>Home</button></a>";
		
	} else {
		echo "Error updating records : " . $connect->error;
	}

	$connect->close();
}

?>