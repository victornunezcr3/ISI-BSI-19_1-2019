<?php require_once 'php_action/db_connect.php'; ?>

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
			$result = $connect->query($sql);
			//print_r($result);
			//si  el numero de columnas del objeto es mayor que cero se itera el objeto, sino se imprime mensaje no data
			if($result->num_rows > 0) {
				//mientras la primer fila contenga datos = true, se recorre el objeto
				while($row = $result->fetch_assoc()) {
					echo "<tr>
						<td>".$row['titulo']."</td>
						<td>".$row['autor']."</td>
						<td>".$row['editorial']."</td>
						<td>".$row['precio']."</td>
						<td>
							<a href='edit.php?id=".$row['id_libro']."'><button type='button'>Editar</button></a>
							<a href='remove.php?id=".$row['id_libro']."'><button type='button'>Eliminar</button></a>
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

</body>
</html>