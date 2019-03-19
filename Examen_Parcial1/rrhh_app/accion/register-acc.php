<?php
	session_start();
	if (!isset($_SESSION['usr_rol']) or ($_SESSION['usr_rol'] != 2))
	{
	header("Location: ../login.php");
	exit();
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Registro de Acciones de personal</title>
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
				<p>
				<?php
					require ('../mysqli_connect.php'); // Connect to the database.
					// If the form has been submitted, insert a record in the users table
					
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						$errors = array(); // Initialize an error array
					// Check for a name:
					if (empty($_POST['fecha_creac'])) {
						$errors[] = 'El campo fecha esta vacio.';
					} else {
						$fc = trim($_POST['fecha_creac']);
					}
					// Check for a descripcion:
					if (empty($_POST['hora_creac'])) {
						$errors[] = 'El campo hora esta vacio.';
					} else {
						$hc = trim($_POST['hora_creac']);
					}
					// Check for a descripcion:
					if (empty($_POST['gestor_rh'])) {
						$errors[] = 'El campo gestor rh esta vacio.';
					} else {
						$gr = $_SESSION['usr_rol'];
					}
					// Check for a descripcion:
					if (empty($_POST['consecutivo'])) {
						$errors[] = 'El campo consecutivo esta vacio.';
					} else {
						$cn = trim($_POST['consecutivo']);
					}
					// Check for a descripcion:
					if (empty($_POST['tipo'])) {
						$errors[] = 'El campo tipo esta vacio.';
					} else {
						$tp = trim($_POST['tipo']);
					}
					// Check for a descripcion:
					if (empty($_POST['fecha_nac'])) {
						$errors[] = 'El campo fecha nacimiento esta vacio.';
					} else {
						$na = trim($_POST['fecha_nac']);
					}
					// Check for a descripcion:
					
						$ff = trim($_POST['fecha_final']);
					
					// Check for a descripcion:
					
						$ob = trim($_POST['observacion']);
							
					if (empty($errors)) { // If everything's OK
					// Register the user in the database...
						// Make the query:
						$q = "INSERT INTO accion_personal (fecha_creac, hora_creac, gestor_rh, consecutivo, tipo, fecha_nac, fecha_final,
							observacion) VALUES ('$fc', '$hc','$gr','$cn','$tp','$na','$ff','$ob')";	
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
							echo $fc."-".$hc."-".$gr."-".$cn."-".$tp.".".$na.".".$ff.".".$ob;
							echo '<h2>System Error</h2>
							
							<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
							// Debugging message:
							echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
						} // End of if ($result)
						mysqli_close($dbcon); // Close the database connection.
						// Include the footer and stop the script
						include ('../footer1.php'); 
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
				<h2>Agregar accion personal</h2>
				<form action="register-acc.php" method="post">
					<p><label class="label" for="fecha_creac">Fecha creacion:</label><input id="fecha_creac" type="date" name="fecha_creac" 
						size="30" maxlength="30" value="<?php if (isset($_POST['fecha_creac'])) echo $_POST['fecha_creac']; ?>"></p>
					<p><label class="label" for="Hora_creac">Hora creacion:</label><input id="hora_creac" type="time" name="hora_creac" 
						size="30" maxlength="30" value="<?php if (isset($_POST['hora_creac'])) echo $_POST['hora_creac']; ?>"></p>
					<p><label class="label" for="gestor_rh">Gestor RRHH:</label><input id="gestor_rh" type="text" name="gestor_rh" 
						readonly="true" size="30" maxlength="50" value="<?php  echo $_SESSION['usrname']; ?>"></p>
					<p><label class="label" for="consecutivo">Consecutivo:</label><input id="consecutivo" type="text" name="consecutivo" 
						size="30" maxlength="30" value="<?php if (isset($_POST['consecutivo'])) echo $_POST['consecutivo']; ?>"></p>
					<p><label class="label" for="tipo">Tipo:</label><input id="tipo" type="text" name="tipo" 
						size="30" maxlength="30" value="<?php if (isset($_POST['tipo'])) echo $_POST['tipo']; ?>"></p>
					<p><label class="label" for="fecha_nac">Fecha Nacimiento:</label><input id="fecha_nac" type="date" name="fecha_nac" 
						size="30" maxlength="30" value="<?php if (isset($_POST['fecha_nac'])) echo $_POST['fecha_nac']; ?>"></p>
					<p><label class="label" for="fecha_final">Fecha finalizacion:</label><input id="fecha_final" type="date" name="fecha_final" 
						size="30" maxlength="30" value="<?php if (isset($_POST['fecha_final'])) echo $_POST['fecha_final']; ?>"></p>
					<p><label class="label" for="observacion">Observacion:</label><input id="observacion" type="textarea" name="observacion" 
						size="30" maxlength="500" value="<?php if (isset($_POST['observacion'])) echo $_POST['observacion']; ?>"></p>
					<p><input id="submit" type="submit" name="submit" value="Registrar"></p>
					

				</form>
				<?php include ('footer1.php'); ?>
				</p>
					<!-- End of the register page content -->
			</div>
		</div>	
	</body>
</html>