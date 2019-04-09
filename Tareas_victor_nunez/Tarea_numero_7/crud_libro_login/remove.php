<?php 

require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos

if($_GET['id']) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM libro WHERE id_libro = {$id}";
	$query=mysqli_query($con, $sql);
	$data = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Remove Libro</title>
</head>
<body>

<h3>Do you really want to remove ?</h3>
<form action="php_action/remove.php" method="post">

	<input type="hidden" name="id" value="<?php echo $data['id_libro'] ?>" />
	<button type="submit">Save Changes</button>
	<a href="index.php"><button type="button">Back</button></a>
</form>

</body>
</html>

<?php
}
?>