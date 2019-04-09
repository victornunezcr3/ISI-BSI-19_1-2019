<?php
session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
	header("location: login.php");
	exit;
	}

/* Connect To Database*/
require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos

?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD</title>

	<style type="text/css">
		.manageMember {
			width: 50%;
			margin: auto;
		}

		table {
			width: 100%;
			margin-top: 20px;
		}
		#botton1{
			background-color: violet;
		}
		#botton2{
			background-color: yellow;
		}
		#botton3{
			background-color: lightblue;
		}
		

	</style>

</head>
<body>
<?php
	include("navbar.php");
?> 

<div class="manageMember">
	<a href="create.php"><button type="button" id="botton1">Add Libro</button></a>
	<a href="increase_10.php"><button type="button" id="botton2">Increase 10% Libro</button></a>
	<a href="increase_var.php"><button type="button"id="botton3" >Increase Libro variable</button></a>
	<table border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>Título</th>
				<th>Autor</th>
				<th>Editorial</th>
				<th>Precio</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>
			<?php
			//crea string sql coleccion de la tabla de la base de datos con estado activo
			$sql = "CALL sp_listar_libro('')"; 
			//imprime valor $sql
			//($sql);
			//crea objeto consulta de la tabla
			$query=mysqli_query($con, $sql);
			$result = $query;
			//print_r($result);
			//si  el numero de columnas del objeto es mayor que cero se itera el objeto, sino se imprime mensaje no data
			if($result->num_rows > 0) {
				//mientras la primer fila contenga datos = true, se recorre el objeto
				while($row1 = $result->fetch_assoc()) {
					echo "<tr>
						<td>".$row1['titulo']."</td>
						<td>".$row1['autor']."</td>
						<td>".$row1['editorial']."</td>
						<td>".$row1['precio']."</td>
						<td>
							<a href='edit.php?id=".$row1['id_libro']."'><button type='button'>Editar</button></a>
							<a href='remove.php?id=".$row1['id_libro']."'><button type='button'>Eliminar</button></a>
						</td>
					</tr>";
				}
			} else {
				echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
			}
			?>
		</tbody>
	</table>
</div>
<?php
	include("footer.php");
?>
</body>
</html>