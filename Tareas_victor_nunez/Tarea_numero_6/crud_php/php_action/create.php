<?php 

require_once 'db_connect.php';

if($_POST) {
	$titulo = $_POST['titulo'];
	$autor = $_POST['autor'];
	$editorial = $_POST['editorial'];
	$precio = $_POST['precio'];

	$sql = "CALL sp_insertar_data_lib('$titulo', '$autor', '$editorial', '$precio')";
	if($connect->query($sql) === TRUE) {
		echo "<p>New Record Successfully Created</p>";
		echo "<a href='../create.php'><button type='button'>Back</button></a>";
		echo "<a href='../index.php'><button type='button'>Home</button></a>";
	} else {
		echo "Error " . $sql . ' ' . $connect->connect_error;
	}

	$connect->close();
}

?>