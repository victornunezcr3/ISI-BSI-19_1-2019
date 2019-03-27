<?php
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
    $title="Biblioteca | Store procedure";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php");?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>

</style>
</head>
<body>
    <?php include("navbar.php");?>
 
    <div class="container1">
        <h1 <style = "position: absolute;	text-align: right;	top: 55px;	width: 100%;display:none;"> 
        </style>LLAMADAS A STORE PROCEDURE</h1>
        <td><a href="form_sp1.php"><button type="button">SP1</button></a></td>
        <button type="sumit">SP-2</button>
        <div>
        <table class="table table-striped" border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>Título</th>
				<th>Autor</th>
				<th>Editorial</th>
				<th>Precio</th>
				
			</tr>
		</thead>
		<tbody>
        <?php
            
            $query=mysqli_query($con, "select * from libro");
            //$row=mysqli_fetch_array($query);
		    $count=mysqli_num_rows($query);//crea string sql coleccion de la tabla de la base de datos con estado activo
			
			//si  el numero de columnas del objeto es mayor que cero se itera el objeto, sino se imprime mensaje no data
			if($count > 0) {
				//mientras la primer fila contenga datos = true, se recorre el objeto
				while($row = mysqli_fetch_array( $query )) {
					echo "<tr>
						<td>".$row['titulo']."</td>
						<td>".$row['autor']."</td>
						<td>".$row['editorial']."</td>
						<td>".$row['precio']."</td>
                        <br>
					    </tr>";
				}
			} else {
				echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
			}
			?>
            </tbody>
        </table>
        </div>
    </div><!--  fin clase container -->
    <hr>
	<?php
		include("footer.php");
	?>
</body>
</html>