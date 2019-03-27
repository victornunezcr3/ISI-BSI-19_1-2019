<?php
//include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['titulo'])) {
        $errors[] = "Titulo vacío";
    } else if (empty($_POST['autor'])){
		$errors[] = "Autor del libro vacío";
	} else if (empty($_POST['editorial'])){
		$errors[] = "Editorial vacio";
	} else if (empty($_POST['precio'])){
		$errors[] = "Precio del libro vacío";
	} else if (
			!empty($_POST['titulo']) &&
			!empty($_POST['autor']) &&
			!empty($_POST['editorial']) &&
			!empty($_POST['precio'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$titulo=mysqli_real_escape_string($con,(strip_tags($_POST["titulo"],ENT_QUOTES)));
		$autor=mysqli_real_escape_string($con,(strip_tags($_POST["autor"],ENT_QUOTES)));
		$editorial=mysqli_real_escape_string($con,(strip_tags($_POST["editorial"],ENT_QUOTES)));
		$precio=floatval($_POST['precio']);
		
		$sql="INSERT INTO libro (titulo, autor, editorial, precio) VALUES ('$titulo','$autor','$editorial','$precio')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Libro ha sido ingresado satisfactoriamente.";
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