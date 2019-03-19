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
		<title>Borrar empleado</title>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="../css/includes.css">
		<style type="text/css">
		p { 
			text-align:center; 
		}
		form { 
			text-align:center;
		}
		input.fl-left { 
			float:left; 
		}
		#submit-yes { 
			float:left; margin-left:220px;
		}
		#submit-no { 
			float:left; margin-left:20px;
		}
		</style>
	</head>
	<body>
		<div id="container">
		<?php include("header-admin2.php"); ?>
		<?php include("nav2.php"); ?>
		<?php include("info-col.php"); ?>
		<div id="content"><!-- Start of content for the delete page -->
		<h2>Borrar empleado</h2>
		<?php 
		// Check for a valid user ID, through GET or POST:
		if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
		$id = $_GET['id'];
		} elseif
		( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
			$id = $_POST['id'];
		} else { // If no valid ID, stop the script.
			echo '<p class="error">Hay errores en la pagina...</p>';
			include ('../footer.php'); 
			exit();
		}
		require ('../mysqli_connect.php');
		// Check if the form has been submitted:
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($_POST['sure'] == 'Yes') { // Delete the record.
			// Make the query:
				$q = "DELETE FROM empleados WHERE user_id=$id LIMIT 1";		
				$result = @mysqli_query ($dbcon , $q);
				if (mysqli_affected_rows($dbcon ) == 1) { // If it ran OK.
		// Print a message:
				echo '<h3>El registro fue borrado.</h3>';	
				} else { // If the query did not run OK.
					echo '<p class="error">El registro no pudo ser borrado.<br>Porque no existe o hay un error de sistema.</p>'; // Public message.
					echo '<p>' . mysqli_error($dbcon ) . '<br />Query: ' . $q . '</p>'; // Debugging message.
				}
			} else { // No confirmation of deletion.
				echo '<h3>El registro no puede ser borrado.</h3>';	
			}
		} else { // Show the form.
			// Retrieve the user's information:
			$q = "SELECT CONCAT(nombre, ' ', apellido1,' ced: ',identificacion) FROM empleados WHERE id_empleado=$id";
			$result = @mysqli_query ($dbcon , $q);
			if (mysqli_num_rows($result) == 1) { // Valid user ID, show the form.
				// Get the user's information:
				$row = mysqli_fetch_array ($result, MYSQLI_NUM);
				// Display the record being deleted:
				echo "<h3>Esta seguro de querer echarse el registro de $row[0]?</h3>";
				echo "<h3>Esta accion es irreversible</h3>";
				// Create the form:
				echo '<form action="delete_record.php" method="post">
			<input id="submit-yes" type="submit" name="sure" value="Yes"> 
			<input id="submit-no" type="submit" name="sure" value="No">
			
			<input type="hidden" name="id" value="' . $id . '">
			</form>';

			} else { // Not a valid user ID.
				echo '<p class="error">La pagina fue accesada con errores.</p>';
				echo '<p>&nbsp;</p>';
			}
		} // End of the main submission conditional.
		mysqli_close($dbcon );
				echo '<p>&nbsp;</p>';

		include ('../footer1.php');
		?>
		</div>
		</div>
	</body>
</html>