<?php											
	session_start();
	if (!isset($_SESSION['usr_rol']) or ($_SESSION['usr_rol'] != 2)){
		header("Location: ../login.php");
		exit();
	}
?>
<!doctype html>
<html lang=en>
	<head>
		<title>Edit a record</title>
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
				<h2>Edit a Record</h2>
				<?php 
					// After clicking the Edit link in the found_record.php page, the editing interface appears 
					// The code looks for a valid user ID, either through GET or POST:
					if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
						$id = $_GET['id'];
					} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
						$id = $_POST['id'];
					} else { // If no valid ID, stop the script
						echo '<p class="error">This page has been accessed in error.</p>';
						include ('footer1.php'); 
						exit();
					}
					require ('../mysqli_connect.php'); 
					// Has the form been submitted?
					//

					$errors = array();
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						
						// Look for the fecha creac
						if (empty($_POST['fecha_creac'])) {
							$errors[] = 'You forgot to enter fecha creacion.';
						} else {
							$fn = mysqli_real_escape_string($dbcon, trim($_POST['fecha_creac']));
						}
						// Look for the last name
						if (empty($_POST['hora_creac'])) {
							$errors[] = 'You forgot to enter time.';
						} else {
							$hc = mysqli_real_escape_string($dbcon, trim($_POST['hora_creac']));
						}
						if (empty($_POST['consecutivo'])) {
							$errors[] = 'You forgot to enter consecutivo.';
						} else {
							$cs = mysqli_real_escape_string($dbcon, trim($_POST['consecutivo']));
						}
						if (empty($_POST['tipo'])) {
							$errors[] = 'You forgot to enter type.';
						} else {
							$tp = mysqli_real_escape_string($dbcon, trim($_POST['tipo']));
						}
						if (empty($_POST['fecha_nac'])) {
							$errors[] = 'You forgot to enter fecha nacimiento.';
						} else {
							$na = mysqli_real_escape_string($dbcon, trim($_POST['fecha_nac']));
						}
						$us= $_POST['usr_rol'];
						$ff= $_POST['fecha_final'];
						$ob= $_POST['observacion'];
						
						if (empty($errors)) { // If everything's OK
							//  
							$q = "UPDATE accion_personal SET fecha_creac='$fn', hora_creac='$hc', gestor_rh='$us', 	consecutivo='$cs', 
											tipo='$tp',	fecha_nac='$fn', fecha_final='$ff', observacion='$ob' WHERE id_acc_per=$id ";
								$result = @mysqli_query ($dbcon, $q);
							if (mysqli_affected_rows($dbcon) == 1) { // If it ran OK
								// Echo a message if the edit was satisfactory:
								echo '<h3>The accion has been edited.</h3>';
								exit();	
							} else { // Echo a message if the query failed.
								echo '<p class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
								echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>'; // Debugging message.
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
					$q = "SELECT * FROM accion_personal WHERE id_acc_per=$id";		
					$result = @mysqli_query ($dbcon, $q);
					if (mysqli_num_rows($result) == 1) { // Valid user ID, display the form.
						// Get the user's information:
						$row = mysqli_fetch_array ($result, MYSQLI_NUM);
						// Create the form:
						echo '<form action="edit_record.php" method="post">
						<p><label class="label" for="fecha_creac">Fecha creacion:</label><input class="fl-left" id="fecha_creac" type="text" 
						name="fecha_creac" size="30" maxlength="30" value="' . $row[1] . '"></p>
						<br><p><label class="label" for="hora_creac">Hora creacion:</label><input class="fl-left" type="text" 
						name="descripcion" size="30" maxlength="30" value="' . $row[2] . '"></p>
						<br><p><label class="label" for="gestor_rh">Gestor RRHH:</label><input class="fl-left" type="text" 
						name="descripcion" size="30" maxlength="50" value="' . $row[3] . '"></p>
						<br><p><label class="label" for="consecutivo">Consecutivo:</label><input class="fl-left" type="text" 
						name="descripcion" size="30" maxlength="50" value="' . $row[4] . '"></p>
						<br><p><label class="label" for="tipo">Tipo:</label><input class="fl-left" type="text" 
						name="descripcion" size="30" maxlength="30" value="' . $row[5] . '"></p>
						<br><p><label class="label" for="fecha_nac">Fecha nacimiento:</label><input class="fl-left" type="text" 
						name="descripcion" size="30" maxlength="30" value="' . $row[6] . '"></p>
						<br><p><label class="label" for="fecha_final">Fecha finalizacion:</label><input class="fl-left" type="text" 
						name="descripcion" size="30" maxlength="30" value="' . $row[7] . '"></p>
						<br><p><label class="label" for="observacion">Observaciones:</label><input class="fl-left" type="text" 
						name="descripcion" size="30" maxlength="100" value="' . $row[8] . '"></p>
						<br><p><input id="submit" type="submit" name="submit" value="Editar"></p>
						<br><input type="hidden" name="id" value="' . $id . '" />
						</form>';
					} else { // The user could not be validated
						echo '<p class="error">This page has been accessed in error.</p>';
					}
					mysqli_close($dbcon);
					include ('footer1.php');
				?>
			</div>
		</div>
	</body>
</html>