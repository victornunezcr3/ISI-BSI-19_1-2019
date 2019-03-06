<!doctype html>
<html lang="en">
<head>
<title>Pagina de registro</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<style type="text/css">
p.error { color:red; font-size:105%; font-weight:bold; text-align:center;}
</style>
</head>
<body>
<div id="container">
<?php include("..\..\..\header-admin.php"); ?>
<?php include("nav.php"); ?>

	<div id="content"><!-- Start of the register page content -->
<p><?php
require ('mysqli_connect.php'); // Connect to the database.
// If the form has been submitted, insert a record in the users table
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); // Initialize an error array
	// Check for a nombre cliente:
	if (empty($_POST['nombre_cliente'])) {
		$errors[] = 'You forgot to enter the customer´s name.';
	} else {
		//$fn = trim($_POST['nam']);
			$nam = mysqli_real_escape_string($dbcon, trim($_POST['nombre_cliente']));
	}
	// Check for a tipo cliente:
	if (empty($_POST['tipo_cliente'])) {
		$errors[] = 'You forgot to enter type customer.';
	} else {
		//$ln = trim($_POST['lname']);
		//$ln = mysqli_real_escape_string($dbcon, $ln);
		$tc = trim($_POST['tipo_cliente']);
	}
	// Check for an identificascion
	if (empty($_POST['identificacion'])) {
		$errors[] = 'You forgot to enter id customer.';
	} else {
		$iden = trim($_POST['identificacion']);
	}
	// Check for an direccion
	if (empty($_POST['direccion_exacta'])) {
		$errors[] = 'You forgot to enter direccion.';
	} else {
		$direc = trim($_POST['direccion_exacta']);
    }
    // check contacto
	if (empty($_POST['contacto'])) {
		$errors[] = 'You forgot to enter contact.';
	} else {
		$contac = trim($_POST['contacto']);
	}
    // check telefono
	if (empty($_POST['telefono'])) {
		$errors[] = 'You forgot to enter telefono.';
	} else {
		$tel = trim($_POST['telefono']);
	}
    // check correo
	if (empty($_POST['correo'])) {
		$errors[] = 'You forgot to enter correo.';
	} else {
		$ema = trim($_POST['correo']);
	}
	

	if (empty($errors)) { // If everything's OK
	// Register the customer in the database...
		// Make the query:
		$q = "INSERT INTO clientes (nombre_cliente, tipo_cliente, identificacion, direccion_exacta, contacto,telefono,correo) VALUES ('$nam', '$tc', '$iden', '$direc','$contac','$tel','$ema' )";		
		$result = @mysqli_query ($dbcon, $q); // Run the query.
		if ($result) { // If it ran OK
		header ("location: register-thanks.php"); 
		exit();
		// Echo a message:
		//echo '<h2>Thank you!</h2>
		//<p>You are now registered.</p><p><br></p>';	
		} else { // If it did not run OK
		// Error message:
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
		echo '<h2>Error!</h2>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Echo each error
			echo " - $msg<br>\n";
		}
		echo '</p><h3>Please try again.</h3><p><br></p>';
		}// End of if (empty($errors))
} // End of the main Submit conditional
?>
<h2>Register customer</h2>
<form action="consultar_cliente.php" method="post">
	<p><label class="label" for="nombre_cliente">Nombre Cliente:</label>
    <input id="nombre_cliente" type="text" name="nombre_cliente" size="30" maxlength="200" value="<?php if (isset($_POST['nombre_cliente'])) echo $_POST['nombre_cliente']; ?>"></p>
	<p><label class="label" for="tipo_cliente">Tipo cliente:</label>
    <input id="tipo_cliente" type="text" name="tipo_cliente" size="3" maxlength="3" value="<?php if (isset($_POST['tipo_cliente'])) echo $_POST['tipo_cliente']; ?>"></p>
	<p><label class="label" for="identificacion">Identificacion:</label>
    <input id="identificacion" type="text" name="identificacion" size="9" maxlength="15" value="<?php if (isset($_POST['identificacion'])) echo $_POST['identificacion']; ?>" > </p>
	<p><label class="label" for="direccion_exacta">Direccion exacta:</label>
    <input id="direccion_exacta" type="text" name="direccion_exacta" size="50" maxlength="300" value="<?php if (isset($_POST['direccion_exacta'])) echo $_POST['direccion_exacta']; ?>" ></p>
	<p><label class="label" for="contacto">Contacto:</label>
    <input id="contacto" type="text" name="contacto" size="50" maxlength="300" value="<?php if (isset($_POST['contacto'])) echo $_POST['contacto']; ?>" ></p>
	<p><label class="label" for="telefono">Telefono:</label>
    <input id="telefono" type="text" name="telefono" size="9" maxlength="9" value="<?php if (isset($_POST['telefono'])) echo $_POST['telefono']; ?>" ></p>
	<p><label class="label" for="correo">Correo:</label>
    <input id="correo" type="text" name="correo" size="50" maxlength="50" value="<?php if (isset($_POST['correo'])) echo $_POST['correo']; ?>" ></p>
	
    <p><input id="submit" type="submit" name="submit" value="Register"></p>
</form>
<?php include ('footer.php'); ?></p>
	<!-- End of the register page content -->
</div>
</div>	
</body>
</html>