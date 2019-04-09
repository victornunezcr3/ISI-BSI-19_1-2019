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
	<title>Edit Libro</title>

	<style type="text/css">
		fieldset {
			margin: auto;
			margin-top: 100px;
			width: 50%;
		}

		table tr th {
			padding-top: 20px;
		}
	</style>

</head>
<body>

<fieldset>
	<legend>Edit Libro</legend>

	<form action="php_action/update.php" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Titulo</th>
				<td><input type="text" name="titulo" placeholder="Titulo" value="<?php echo $data['titulo'] ?>" /></td>
			</tr>		
			<tr>
				<th>Autor</th>
				<td><input type="text" name="autor" placeholder="autor" value="<?php echo $data['autor'] ?>" /></td>
			</tr>
			<tr>
				<th>Editorial</th>
				<td><input type="text" name="editorial" placeholder="editorial" value="<?php echo $data['editorial'] ?>" /></td>
			</tr>
			<tr>
				<th>Precio</th>
				<td><input type="text" name="precio" placeholder="precio" value="<?php echo $data['precio'] ?>" /></td>
			</tr>
			<tr>
				<input type="hidden" name="id" value="<?php echo $data['id_libro']?>" />
				<td><button type="submit">Save Changes</button></td>
				<td><a href="index.php"><button type="button">Back</button></a></td>
			</tr>
		</table>
	</form>

</fieldset>

</body>
</html>

<?php
}
?>