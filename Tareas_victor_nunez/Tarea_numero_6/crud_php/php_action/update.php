<?php 

require_once 'db_connect.php';

if($_POST) {
	$ftitulo = $_POST['titulo'];
	$fautor = $_POST['autor'];
	$feditorial = $_POST['editorial'];
	$fprecio = $_POST['precio'];

	$id = $_POST['id'];
	printf($id);
	$sql  = "CALL sp_uddate_libro({$id},'$ftitulo',$fautor,$feditorial,$fprecio)";
	if($connect->query($sql) === TRUE) {
		echo "<p>Succcessfully Updated</p>";
		echo "<a href='../edit.php?id=".$id."'><button type='button'>Back</button></a>";
		echo "<a href='../index.php'><button type='button'>Home</button></a>";
	} else {
		echo "Erorr while updating record : ". $connect->error;
	}

	$connect->close();

}

?>