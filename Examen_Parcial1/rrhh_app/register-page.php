<!doctype html>
<html lang="en">
	<head>
		<title>Pagina de registro</title>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="css/includes.css">
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
		<?php include("header-admin.php"); ?>
		<?php include("nav.php");?>
		<?php include("info-col.php"); ?>
			<div id="content"><!-- Start of the register page content -->
		<p>
		<?php
			require ('mysqli_connect.php'); // Connect to the database.
			// If the form has been submitted, insert a record in the users table
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$errors = array(); // Initialize an error array
			// Check for a first name:
			if (empty($_POST['usr_nombre'])) {
				$errors[] = 'El campo nombre esta vacio.';
			} else {
				$fn = trim($_POST['usr_nombre']);
				//$fn = mysqli_real_escape_string($dbcon, trim($_POST['usr_nombre']));
			}
			// Check for a apellido1:
			if (empty($_POST['usr_apellido1'])) {
				$errors[] = 'El campo apellido1 esta vacio.';
			} else {
				$ln = trim($_POST['usr_apellido1']);
				//$ln = mysqli_real_escape_string($dbcon, $ln);
				//$ln = mysqli_real_escape_string($dbcon, trim($_POST['usr_apellido1']));
			}
			// Check for a apellido2:
			if (empty($_POST['usr_apellido2'])) {
				$errors[] = 'El campo apellido2 esta vacio.';
			} else {
				$ln2 = trim($_POST['usr_apellido2']);
				//$ln = mysqli_real_escape_string($dbcon, $ln);
				//$ln2 = mysqli_real_escape_string($dbcon, trim($_POST['usr_apellido2']));
			}
			// Check for an user name
			if (empty($_POST['usrname'])) {
				$errors[] = 'El campo usrname esta vacio.';
			} else {
				$e = trim($_POST['usrname']);
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
				$q = "INSERT INTO usuarios (usr_nombre, usr_apellido1, usr_apellido2, usrname, psword, usr_rol) VALUES ('$fn', '$ln', '$ln2','$e', '$p','$ur' )";	
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
		<h2>Agregar usuario</h2>
		<form action="register-page.php" method="post">
			<p><label class="label" for="usr_nombre">Nombre:</label><input id="usr_nombre" type="text" name="usr_nombre" 
				size="30" maxlength="40" value="<?php if (isset($_POST['usr_nombre'])) echo $_POST['usr_nombre']; ?>"></p>
			<p><label class="label" for="usr_apellido1">Apellido1:</label><input id="usr_apellido1" type="text" 
				name="usr_apellido1" 
				size="30" maxlength="50" value="<?php if (isset($_POST['usr_apellido1'])) echo $_POST['usr_apellido1']; ?>"></p>
			<p><label class="label" for="usr_apellido2">Apellido2:</label><input id="usr_apellido2" type="text" 
				name="usr_apellido2" 
				size="30" maxlength="50" value="<?php if (isset($_POST['usr_apellido2'])) echo $_POST['usr_apellido2']; ?>"></p>
			<p><label class="label" for="usrname">login:</label><input id="usrname" type="text" name="usrname" 
				size="30" maxlength="50" value="<?php if (isset($_POST['usrname'])) echo $_POST['usrname']; ?>" > </p>
			<p><label class="label" for="psword">Password:</label><input id="psword" type="password" name="psword" 
				size="12" maxlength="40" value="<?php if (isset($_POST['psword'])) echo $_POST['psword']; ?>"
				>&nbsp;Entre 8 y 40 caracteres.</p>
			<p><label class="label" for="usr_rol">rol usuario:</label><input id="usr_rol" type="text" name="usr_rol" 
				size="10" maxlength="10" value="<?php if (isset($_POST['usr_rol'])) echo $_POST['usr_rol']; ?>">&nbsp;1= Consulta, 2= Gestor.</p>
			<p><input id="submit" type="submit" name="submit" value="Registrar"></p>			
		</form>
		<?php include ('footer.php'); ?></p>
			<!-- End of the register page content -->
		</div>
		</div>	
	</body>
</html>