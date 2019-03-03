<?php 

require_once 'db_connect.php';

if($_POST) {
	$fidenti = $_POST['id_identificacion'];
	$name = $_POST['nombre'];
	$apelli1 = $_POST['apellido1'];
	$apelli2 = $_POST['apellido2'];

	$id = $_POST['id_persona'];

	$sql  = "UPDATE tbl_persona SET id_identificacion = '$fidenti', nombre = '$name', apellido1 = '$apelli1', apellido2 = '$apelli2' WHERE id_persona = {$id}";
	if($connect->query($sql) === TRUE) {
		echo "<p>Registro actualizado!!!!</p>";
		echo "<a href='../edit.php?id_persona=".$id."'><button type='button'>Atraz</button></a>";
		echo "<a href='../index.php'><button type='button'>Home</button></a>";
	} else {
		echo "Error de actualizacion de registro : ". $connect->error;
	}

	$connect->close();

}

?>