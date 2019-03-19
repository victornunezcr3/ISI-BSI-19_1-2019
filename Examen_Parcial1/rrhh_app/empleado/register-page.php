<!doctype html>
<html lang="en">
	<head>
		<title>Registro de empleados</title>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="../css/includes.css">
		<style type="text/css">
			p.error { color:red; 
			font-size:105%; 
			font-weight:bold; 
			text-align:center;}
	</style>
	</head>
	<body>
		<div id="container">
			<?php include("header-admin2.php"); ?>
			<?php include("nav2.php"); ?>
			<div id="content"><!-- Start of the register page content -->
				<p>
				<?php
				require ('../mysqli_connect.php'); // Connect to the database.
				$sql="SELECT * from departamentos";
				$result = $dbcon->query($sql); //usamos la conexion para dar un resultado a la variable
				
				if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
				{
					$combobit="";
					while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
					{
						$combobit .=" <option value='".$row['id_departamento']."'>".$row['nombre_dep']."</option>"; //concatenamos  los options para luego ser insertado en el HTML
					}
				}
				else
				{
					echo "No hubo resultados";
				}

				?>
				<?php
					//require ('../mysqli_connect.php'); // Connect to the database.
					// If the form has been submitted, insert a record in the users table
					
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						$errors = array(); // Initialize an error array
					// Check for a first name:
					if (empty($_POST['nombre'])) {
						$errors[] = 'El campo nombre esta vacio.';
					} else {
						$fn = trim($_POST['nombre']);
						//$fn = mysqli_real_escape_string($dbcon, trim($_POST['nombre']));
					}
					// Check for a apellido1:
					if (empty($_POST['apellido1'])) {
						$errors[] = 'El campo apellido1 esta vacio.';
					} else {
						$ln = trim($_POST['apellido1']);
						//$ln = mysqli_real_escape_string($dbcon, $ln);
						//$ln = mysqli_real_escape_string($dbcon, trim($_POST['apellido1']));
					}
					// Check for a apellido2:
					if (empty($_POST['apellido2'])) {
						$errors[] = 'El campo apellido2 esta vacio.';
					} else {
						$ln2 = trim($_POST['apellido2']);
						//$ln = mysqli_real_escape_string($dbcon, $ln);
						//$ln2 = mysqli_real_escape_string($dbcon, trim($_POST['apellido2']));
					}
					// Check for an user name
					if (empty($_POST['identificacion'])) {
						$errors[] = 'El campo identificacion esta vacio.';
					} else {
						$e = trim($_POST['identificacion']);
					}
					// Check for an nacionalidad
					if (empty($_POST['nacionalidad'])) {
						$errors[] = 'El campo nacionalidad esta vacio.';
					} else {
						$nac = trim($_POST['nacionalidad']);
					}
					// Check for a provincia
					if (empty($_POST['provincia'])) {
						$errors[] = 'El campo provincia esta vacio.';
					} else {
						$pro = trim($_POST['provincia']);
					}
					// Check for a canton
					if (empty($_POST['canton'])) {
						$errors[] = 'El campo canton esta vacio.';
					} else {
						$can = trim($_POST['canton']);
					}
					// Check for a distrito
					if (empty($_POST['distrito'])) {
						$errors[] = 'El campo distrito esta vacio.';
					} else {
						$dis = trim($_POST['distrito']);
					}
					// Check for a password then match it against the confirmed password:
					if (empty($_POST['psword'])) {
						$errors[] = 'El campo user rol esta vacio.';		
					} else {
						$p = trim($_POST['psword']);
					}
					// Check for an usr rol
					if (empty($_POST['usr_rol'])) {
						
					} else {
						$ur = trim($_POST['usr_rol']);
					}
					
					if (empty($errors)) { // If everything's OK
					// Register the user in the database...
						// Make the query:
						$q = "INSERT INTO usuarios (nombre, apellido1, apellido2, identificacion, nacionalidad, usr_rol) VALUES ('$fn', '$ln', '$ln2','$e', '$nac', SHA1('$p'),'$ur' )";	
						$result = @mysqli_query ($dbcon, $q); // Run the query.
						if ($result) { // If it ran OK
						header ("location: register-thanks.php"); 
						exit();
						// Echo a message:
						//echo '<h2>Thank you!</h2>
						//<p>You are now registered.</p><p><br></p>';	
						} else { // If it did not run OK
						// Error message:
						//manolo nunez mantilla manolo manolo 842703 1
							echo $fn."-".$ln."-".$ln2."-".$e."-".$p.".".$ur;
							echo '<h2>System Error</h2>
							
							<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
							// Debugging message:
							echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
						} // End of if ($result)
						mysqli_close($dbcon); // Close the database connection.
						// Include the footer and stop the script
						include ('footer.php'); 
						//header ("location: register-thanks.php"); 
						//exit();
					} else { // Report the errors
						echo '<h2>Error!!!!</h2>
						<p class="error">Los siguientes errores ocurrieron:<br>';
						foreach ($errors as $msg) { // Echo each error
							echo " - $msg<br>\n";
						}
						echo '</p><h3>Favor intentar de nuevo.</h3><p><br></p>';
						}// End of if (empty($errors))
				} // End of the main Submit conditional
				?>
				<h2>Agregar Empleado</h2>
				<form action="register-page.php" method="post">
					<p><label class="label" for="nombre">Nombre:</label><input id="nombre" type="text" name="nombre" 
						size="30" maxlength="50" value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre']; ?>"></p>
					<p><label class="label" for="apellido1">Apellido1:</label><input id="apellido1" type="text" 
						name="apellido1" 
						size="30" maxlength="50" value="<?php if (isset($_POST['apellido1'])) echo $_POST['apellido1']; ?>"></p>
					<p><label class="label" for="apellido2">Apellido2:</label><input id="apellido2" type="text" 
						name="apellido2" 
						size="30" maxlength="50" value="<?php if (isset($_POST['apellido2'])) echo $_POST['apellido2']; ?>"></p>
					<p><label class="label" for="identificacion">Identificacion:</label><input id="identificacion" type="text" name="identificacion" 
						size="30" maxlength="50" value="<?php if (isset($_POST['identificacion'])) echo $_POST['identificacion']; ?>" > </p>
					<p><label class="label" for="nacionalidad">Nacionalidad:</label><input id="nacionalidad" type="text" name="nacionalidad" 
						size="30" maxlength="100" value="<?php if (isset($_POST['nacionalidad'])) echo $_POST['nacionalidad']; ?>" > </p>
					<p><label class="label" for="provincia">Provincia:</label><input id="provincia" type="text" name="provincia" 
						size="30" maxlength="50" value="<?php if (isset($_POST['provincia'])) echo $_POST['provincia']; ?>" > </p>
					<p><label class="label" for="canton">Canton:</label><input id="canton" type="text" name="canton" 
						size="30" maxlength="50" value="<?php if (isset($_POST['canton'])) echo $_POST['canton']; ?>" > </p>
					<p><label class="label" for="distrito">Distrito:</label><input id="distrito" type="text" name="distrito" 
						size="30" maxlength="50" value="<?php if (isset($_POST['distrito'])) echo $_POST['distrito']; ?>" > </p>
					<p><label class="label" for="direccion">Direccion:</label><textarea rows="4" cols="50" 
						value ="<?php if (isset($_POST['direccion'])) echo $_POST['direccion']; ?>"></textarea></p> 
					<p><label class="label" for="telefono">Telefono:</label><input id="telefono" type="text" name="telefono" 
						size="8" maxlength="8" value="<?php if (isset($_POST['telefono'])) echo $_POST['telefono']; ?>" > </p>
					<p><label class="label" for="celular">Celular:</label><input id="celular" type="text" name="celular" 
						size="8" maxlength="8" value="<?php if (isset($_POST['celular'])) echo $_POST['celular']; ?>" > </p>
					<p><label class="label" for="correo">Email:</label><input id="correo" type="text" name="correo" 
						size="30" maxlength="50" value="<?php if (isset($_POST['correo'])) echo $_POST['correo']; ?>" > </p>
					<p><label class="label" for="grado_academico">Grado academinco:</label><input id="grado_academino" type="text" name="grado_academico" 
						size="10" maxlength="10" value="<?php if (isset($_POST['grado_academico'])) echo $_POST['grado_academico']; ?>" > </p>
					<p><label class="label" for="fecha_nac">Fecha de nacimiento:</label><input id="fecha_nac" type="date" name="fecha_nac" 
						size="30" maxlength="50" value="<?php if (isset($_POST['fecha_nac'])) echo $_POST['fecha_nac']; ?>" > </p>
					<p><label class="label" for="departamento">Departamento:</label>
					<select name="departamento"><?php echo $combobit; ?>
					</select><?php if (isset($_POST['departamento'])) echo $_POST['departamento']; ?>" > </p>
					<p><label class="label" for="puesto">Puesto:</label><input id="puesto" type="text" name="puesto" 
						size="30" maxlength="50" value="<?php if (isset($_POST['puesto'])) echo $_POST['puesto']; ?>" > </p>
					<p><label class="label" for="banco">Banco:</label><input id="banco" type="text" name="banco" 
						size="20" maxlength="200" value="<?php if (isset($_POST['banco'])) echo $_POST['banco']; ?>" > </p>
					<p><label class="label" for="cuenta_banca">Cuenta bancaria:</label><input id="cuenta_banca" type="text" name="cuenta_banca" 
						size="12" maxlength="40" value="<?php if (isset($_POST['cuenta_banca'])) echo $_POST['cuenta_banca']; ?>"</p>
					<p><label class="label" for="estado">Estado :</label>
					<select name="estado">
					<option value="">----Seleccionar----</option>
					<option value="1" value="">Activo </option>
					<option value="2" value="">Inactivo</option>
					</select>&nbsp;1= Activo, 2= Inactivo.</p>
					<p><input id="submit" type="submit" name="submit" value="Registrar"></p>
					

				</form>
				<?php include ('../footer.php'); ?></p>
					<!-- End of the register page content -->
			</div>
		</div>	
	</body>
</html>