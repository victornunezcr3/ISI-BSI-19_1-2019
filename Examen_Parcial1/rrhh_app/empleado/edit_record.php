<?php											
	session_start();
	if (!isset($_SESSION['usr_rol']) or ($_SESSION['usr_rol'] != 2)){
		header("Location: login.php");
		exit();
}
?>
<!doctype html>
<html lang=en>
	<head>
		<title>Editar un registro</title>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="../css/includes.css">
		<style type="text/css">
			p { 
				text-align:center; 
			}
			input.fl-left { 
				float:left; 
			}
			#submit { 
				float:left; 
			}
		</style>
	</head>
	<body>
		<div id="container">
			<?php include("header-admin2.php"); ?>
			<?php include("nav2.php"); ?>
			<?php include("info-col.php"); ?>
			<div id="content"><!-- Start of the page-specific content. -->
				<h2>Editar un registro</h2>
				<?php 
					// After clicking the Edit link in the found_record.php page, the editing interface appears 
					// The code looks for a valid user ID, either through GET or POST:
					if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
						$id = $_GET['id'];
					} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
						$id = $_POST['id'];
					} else { // If no valid ID, stop the script
						echo "id--> ".$_GET['id_empleado'];
						echo '<p class="error">Hay errores.....</p>';
						include ('../footer1.php'); 
						exit();
					}
					require ('../mysqli_connect.php'); 
					// Has the form been submitted?
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						$errors = array();
						// Look for the first name
						if (empty($_POST['fname'])) {
							$errors[] = 'You forgot to enter your first name.';
						} else {
							$fn = mysqli_real_escape_string($dbcon, trim($_POST['fname']));
						}
						// Look for the last name
						if (empty($_POST['lname'])) {
							$errors[] = 'You forgot to enter your last name.';
						} else {
							$ln = mysqli_real_escape_string($dbcon, trim($_POST['lname']));
						}
						// Look for the email address
						if (empty($_POST['email'])) {
						$errors[] = 'You forgot to enter your email address.';
						} else {
						$e = mysqli_real_escape_string($dbcon, trim($_POST['email']));
						}
						if (empty($errors)) { // If everything's OK
							//  Check that the email address is not already in the database
									$q = "SELECT user_id FROM users WHERE email='$e' AND user_id != $id";
							$result = @mysqli_query($dbcon, $q);
							if (mysqli_num_rows($result) == 0) {
							// Make the update query:
								$q = "UPDATE users SET fname='$fn', lname='$ln', email='$e' WHERE user_id=$id LIMIT 1";
								$result = @mysqli_query ($dbcon, $q);
								if (mysqli_affected_rows($dbcon) == 1) { // If it ran OK
								// Echo a message if the edit was satisfactory:
									echo '<h3>The user has been edited.</h3>';	
											} else { // Echo a message if the query failed.
									echo '<p class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
									echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>'; // Debugging message.
								}
								} else { // Already registered
								echo '<p class="error">The email address has already been registered.</p>';
							}
							} else { // Display the errors.
							echo '<p class="error">The following error(s) occurred:<br />';
							foreach ($errors as $msg) { // Echo each error.
								echo " - $msg<br />\n";
							}
							echo '</p><p>Please try again.</p>';
						} // End of if (empty($errors))section.
					} // End of the conditionals
					// Select the user's information:
					$q = "SELECT * FROM empleados WHERE id_empleado=$id";		
					$result = @mysqli_query ($dbcon, $q);
					if (mysqli_num_rows($result) == 1) { // Valid user ID, display the form.
						// Get the user's information:
						$row = mysqli_fetch_array ($result, MYSQLI_NUM);
						// Create the form:
						echo '<form action="edit_record.php" method="post">
					<p><label class="label" for="nombre">Nombre:</label><input class="fl-left" id="nombre" type="text" 
						name="nombre" size="30" maxlength="50" value="' . $row[1] . '"></p>
					<br><p><label class="label" for="apellido1">Apellido1:</label><input class="fl-left" type="text" 
						name="apellido1" size="30" maxlength="50" value="' . $row[2] . '"></p>
					<br><p><label class="label" for="apellido2">Apellido2:</label><input class="fl-left" type="text" 
						name="apellido2" size="30" maxlength="50" value="' . $row[3] . '"></p>
					<br><p><label class="label" for="identificacion">Identificacion:</label><input class="fl-left" type="text" 
						name="identificacion" size="25" maxlength="25" value="' . $row[4] . '"></p>
					<br><p><label class="label" for="nacionalidad">Nacionalidad:</label><input class="fl-left" type="text" 
						name="nacionalidad" size="25" maxlength="50" value="' . $row[5] . '"></p>
					<br><p><label class="label" for="provincia">Provincia:</label><input class="fl-left" type="text" 
						name="provincia" size="30" maxlength="50" value="' . $row[6] . '"></p>
					<br><p><label class="label" for="canton">Canton:</label><input class="fl-left" type="text" 
						name="canton" size="30" maxlength="50" value="' . $row[7] . '"></p>
					<br><p><label class="label" for="distrito">Distrito:</label><input class="fl-left" type="text" 
						name="distrito" size="30" maxlength="50" value="' . $row[8] . '"></p>
					<br><p><label class="label" for="direccion">Direccion:</label><input class="fl-left" type="text" 
						name="direccion" size="50" maxlength="500" value="' . $row[9] . '"></p>
					<br><p><label class="label" for="telefono">Telefono:</label><input class="fl-left" type="text" 
						name="telefono" size="10" maxlength="10" value="' . $row[10] . '"></p>
					<br><p><label class="label" for="celular">Celular:</label><input class="fl-left" type="text" 
						name="celular" size="10" maxlength="10" value="' . $row[11] . '"></p>
					<br><p><label class="label" for="correo">Email:</label><input class="fl-left" type="text" 
						name="correo" size="30" maxlength="50" value="' . $row[12] . '"></p>
					<br><p><label class="label" for="grado_academico">Grado academico:</label><input class="fl-left" type="text" 
						name="grado_academico" size="30" maxlength="50" value="' . $row[13] . '"></p>
					<br><p><label class="label" for="fecha_nac">Fecha nacimiento:</label><input class="fl-left" type="date" 
						name="fecha_nac" size="30" maxlength="50" value="' . $row[14] . '"></p>
					<br><p><label class="label" for="departamento">Departamento:</label><input class="fl-left" type="text" 
						name="departamento" size="30" maxlength="50" value="' . $row[15] . '"></p>
					<br><p><label class="label" for="puesto">Puesto:</label><input class="fl-left" type="text" 
						name="puesto" size="30" maxlength="50" value="' . $row[16] . '"></p>
					<br><p><label class="label" for="banco">Banco:</label><input class="fl-left" type="text" 
						name="banco" size="30" maxlength="50" value="' . $row[17] . '"></p>
					<br><p><label class="label" for="cuenta_banca">Cuenta bancaria:</label><input class="fl-left" type="text" 
						name="cuenta_banca" size="30" maxlength="50" value="' . $row[18] . '"></p>
					<br><p><label class="label" for="estado">Estado:</label><input class="fl-left" type="text" 
						name="estado" size="30" maxlength="50" value="' . $row[19] . '"></p>

						<br><p><input id="submit" type="submit" name="submit" value="Edit"></p>
					<br><input type="hidden" name="id" value="' . $id . '" />
					</form>';
					} else { // The user could not be validated
						echo '<p class="error">Hay errores en la pagina........</p>';
					}
					mysqli_close($dbcon);
					include ('../footer.php');
				?>
			</div>
		</div>
	</body>
</html>