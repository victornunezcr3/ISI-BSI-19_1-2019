<?php
	//include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_titulo'])) {
           $errors[] = "Título vacío";
        }else if (empty($_POST['mod_autor'])) {
           $errors[] = "Autor vacío";
        } else if (empty($_POST['mod_editorial'])){
			$errors[] = "Editorial vacío";
		} else if (empty($_POST['mod_precio'])){
			$errors[] = "Precio  vacío";
		} else if (
			!empty($_POST['mod_titulo']) &&
			!empty($_POST['mod_autor']) &&
			!empty($_POST['mod_editorial']) &&
			!empty($_POST['mod_precio'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$titulo=mysqli_real_escape_string($con,(strip_tags($_POST["mod_titulo"],ENT_QUOTES)));
		$autor=mysqli_real_escape_string($con,(strip_tags($_POST["mod_autor"],ENT_QUOTES)));
		$editorial=mysqli_real_escape_string($con,(strip_tags($_POST["mod_editorial"],ENT_QUOTES)));
		$precio_venta=floatval($_POST['mod_precio']);
		$id_libro=$_POST['mod_id'];
		$sql="UPDATE libro SET titulo='".$titulo."', autor='".$autor."', editorial='".$editorial."', precio='".$precio."' WHERE id_libro='".$id_libro."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Libro ha sido actualizado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
							echo $error;
						}
					?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>