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
						include ('../footer.php'); 
						exit();
					}
					require ('../mysqli_connect.php'); 
					// Has the form been submitted?
					//
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						$errors = array();
						// Look for the first name
						if (empty($_POST['nombre_dep'])) {
							$errors[] = 'You forgot to enter  name.';
						} else {
							$fn = mysqli_real_escape_string($dbcon, trim($_POST['nombre_dep']));
						}
						// Look for the last name
						if (empty($_POST['descripcion'])) {
							$errors[] = 'You forgot to enter description.';
						} else {
							$ln = mysqli_real_escape_string($dbcon, trim($_POST['descripcion']));
						}
						
						if (empty($errors)) { // If everything's OK
							//  
								$q = "UPDATE departamentos SET nombre_dep='$fn', descripcion='$ln' WHERE id_departamento=$id ";
								$result = @mysqli_query ($dbcon, $q);
								if (mysqli_affected_rows($dbcon) == 1) { // If it ran OK
										// Echo a message if the edit was satisfactory:
										echo '<h3>The departamento has been edited.</h3>';
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
					$q = "SELECT nombre_dep, descripcion FROM departamentos WHERE id_departamento=$id";		
					$result = @mysqli_query ($dbcon, $q);
					if (mysqli_num_rows($result) == 1) { // Valid user ID, display the form.
						// Get the user's information:
						$row = mysqli_fetch_array ($result, MYSQLI_NUM);
						// Create the form:
						echo '<form action="edit_record.php" method="post">
					<p><label class="label" for="nombre_dep">Nombre departamento:</label><input class="fl-left" id="nombre_dep" type="text" name="nombre_dep" size="30" maxlength="100" value="' . $row[0] . '"></p>
					<br><p><label class="label" for="descripcion">Descripcion:</label><input class="fl-left" type="text" name="descripcion" size="30" maxlength="100" value="' . $row[1] . '"></p>
					<br><p><input id="submit" type="submit" name="submit" value="Editar"></p>
					<br><input type="hidden" name="id" value="' . $id . '" />
					</form>';
					} else { // The user could not be validated
						echo '<p class="error">This page has been accessed in error.</p>';
					}
					mysqli_close($dbcon);
					include ('../footer.php');
				?>
			</div>
		</div>
	</body>
</html>