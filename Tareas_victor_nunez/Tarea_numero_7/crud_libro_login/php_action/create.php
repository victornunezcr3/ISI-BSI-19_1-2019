<?php 
session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
	header("location: login.php");
	exit;
	}
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

if($_POST) {
	$titulo = $_POST['titulo'];
	$autor = $_POST['autor'];
	$editorial = $_POST['editorial'];
	$precio = $_POST['precio'];

	$sql = "CALL sp_insertar_data_lib('$titulo', '$autor', '$editorial', '$precio')";
	if(mysqli_query($con, $sql) === TRUE) {
		echo "<p>New Record Successfully Created</p>";
		echo "<a href='../create.php'><button type='button'>Back</button></a>";
		echo "<a href='../index.php'><button type='button'>Home</button></a>";
	} else {
		echo "Error " . $sql . ' ' . $connect->connect_error;
	}

}

?>