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
<?php include("..\..\header-admin.php"); ?>
<?php include("nav.php"); ?>
	<div id="content"><!-- Start of the register page content -->
<p><?php
require ('mysqli_connect.php'); // Connect to the database.
// If the form has been submitted, insert a record in the users table
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); // Initialize an error array
	// Check for a nombre provedor:
	if (empty($_POST['nombre'])) {
		$errors[] = 'You forgot to enter the vendors´s name.';
	} else {
		//$fn = trim($_POST['nom']);
			$nom = mysqli_real_escape_string($dbcon, trim($_POST['nombre']));
	}
	// Check for a tipo producto:
	if (empty($_POST['tipo_producto'])) {
		$errors[] = 'You forgot to enter type producto.';
	} else {
		//$ln = trim($_POST['lname']);
		//$ln = mysqli_real_escape_string($dbcon, $ln);
		$tp = trim($_POST['tipo_producto']);
	}
	// Check for an identificascion
	if (empty($_POST['descripcion'])) {
		$errors[] = 'You forgot to enter description.';
	} else {
		$des = trim($_POST['descripcion']);
	}
	// Check for an costo unitario
	if (empty($_POST['costo_unitario'])) {
		$errors[] = 'You forgot to enter unit cost.';
	} else {
		$uc = trim($_POST['costo_unitario']);
    }
    
	

	if (empty($errors)) { // If everything's OK
	// Register the customer in the database...
		// Make the query:
		$q = "INSERT INTO productos (nombre, tipo_producto, descripcion, costo_unitario)
			  VALUES ('$nom', '$tp', '$des', '$uc')";		
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
<h2>Registro de productos  y/o Servicios</h2>
<form action="consultar_producto.php" method="post">
	<p><label class="label" for="nombre">Nombre producto:</label>
	<input id="nombre" type="text" name="nombre" size="30" maxlength="200" value="<?php if 
		(isset($_POST['nombre'])) echo $_POST['nombre']; ?>"></p>
	<p><label class="label" for="tipo_producto">Tipo producto:</label>
	<input id="tipo_producto" type="text" name="tipo_producto" size="3" maxlength="3" value="<?php if 
		(isset($_POST['tipo_producto'])) echo $_POST['tipo_producto']; ?>"></p>
	<p><label class="label" for="descripcion">Descripcion:</label>
	<input id="descripcion" type="text" name="descripcion" size="9" maxlength="300" value="<?php if 
		(isset($_POST['descripcion'])) echo $_POST['descripcion']; ?>" > </p>
	<p><label class="label" for="costo_unitario">Costo unitario:</label>
	<input id="costo_unitario" type="text" name="costo_unitario" size="10"  value="<?php if 
		(isset($_POST['costo_unitario'])) echo $_POST['costo_unitario']; ?>" ></p>
		
    <p><input id="submit" type="submit" name="submit" value="Register"></p>
</form>
<?php include ('footer.php'); ?></p>
	<!-- End of the register page content -->
</div>
</div>	
</body>
</html>