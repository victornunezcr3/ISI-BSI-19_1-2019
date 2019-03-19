<!doctype html>
<html lang="en">
	<head>
		<title>Registro de departamentos</title>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="../css/includes.css">
		<style type="text/css">
			p.error { 
				color:red; 
				font-size:105%; 
				font-weight:bold; 
				text-align:center;
			}
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
					if (empty($_POST['nombre_dep'])) {
						$errors[] = 'El campo nombre esta vacio.';
					} else {
						$fn = trim($_POST['nombre_dep']);
						//$fn = mysqli_real_escape_string($dbcon, trim($_POST['nombre_dep']));
					}
					// Check for a descripcion:
					if (empty($_POST['descripcion'])) {
						$errors[] = 'El campo descripcion esta vacio.';
					} else {
						$ln = trim($_POST['descripcion']);
						//$ln = mysqli_real_escape_string($dbcon, $ln);
						//$ln = mysqli_real_escape_string($dbcon, trim($_POST['descripcion']));
					}
					
					
					if (empty($errors)) { // If everything's OK
					// Register the user in the database...
						// Make the query:
						$q = "INSERT INTO departamentos (nombre_dep, descripcion) VALUES ('$fn', '$ln')";	
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
				<h2>Agregar departamento</h2>
				<form action="register-depa.php" method="post">
					<p><label class="label" for="nombre_dep">Nombre departamento:</label><input id="nombre_dep" type="text" name="nombre_dep" 
						size="30" maxlength="100" value="<?php if (isset($_POST['nombre_dep'])) echo $_POST['nombre_dep']; ?>"></p>
					<p><label class="label" for="descripcion">Descripcion:</label><input id="descripcion" type="text" name="descripcion" 
						size="30" maxlength="100" value="<?php if (isset($_POST['descripcion'])) echo $_POST['descripcion']; ?>"></p>
					<p><input id="submit" type="submit" name="submit" value="Registrar"></p>
					

				</form>
				<?php include ('../footer.php'); ?></p>
					<!-- End of the register page content -->
			</div>
		</div>	
	</body>
</html>