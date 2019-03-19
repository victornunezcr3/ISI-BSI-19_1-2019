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
		<title>Delete a record</title>
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
			<h2>Delete a Record</h2>
			<?php 
				// Check for a valid user ID, through GET or POST:
				if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
					$id = $_GET['id'];
				} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
					$id = $_POST['id'];
				} else { // If no valid ID, stop the script.
					echo '<p class="error">This page has been accessed in error.</p>';
					include ('footer1.php'); 
					exit();
				}
				require ('../mysqli_connect.php');
				// Check if the form has been submitted:
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					if ($_POST['sure'] == 'Yes') { // Delete the record.
						// Make the query:
							$q = "DELETE FROM accion_personal WHERE id_acc_per=$id LIMIT 1";		
							$result = @mysqli_query ($dbcon , $q);
							if (mysqli_affected_rows($dbcon ) == 1) { // If it ran OK.
					// Print a message:
							echo '<h3>The record has been deleted.</h3>';	
							} else { // If the query did not run OK.
								echo '<p class="error">The record could not be deleted.<br>Probably because it does not exist or due to a system error.</p>'; // Public message.
								echo '<p>' . mysqli_error($dbcon ) . '<br />Query: ' . $q . '</p>'; // Debugging message.
							}
					} else { // No confirmation of deletion.
							echo '<h3>The personal´acction has NOT been deleted.</h3>';	
					}
				} else { // Show the form.
					// Retrieve the departament's information:
					$q = "SELECT CONCAT(id_acc_per, ' ', consecutivo) FROM accion_personal WHERE id_acc_per=$id";
					$result = @mysqli_query ($dbcon , $q);
					if (mysqli_num_rows($result) == 1) { // Valid accion personal ID, show the form.
						// Get the accion's information:
						$row = mysqli_fetch_array ($result, MYSQLI_NUM);
						// Display the record being deleted:
						echo "<h3>Are you sure you want to permanently delete the accion id -->$row[0]?</h3>";
						// Create the form:
						echo '<form action="delete_record.php" method="post">
						<input id="submit-yes" type="submit" name="sure" value="Yes"> 
						<input id="submit-no" type="submit" name="sure" value="No">
						
						<input type="hidden" name="id" value="' . $id . '">
						</form>';

					} else { // Not a valid user ID.
						echo '<p class="error">This page has been accessed in error.</p>';
						echo '<p>&nbsp;</p>';
					}
				} // End of the main submission conditional.
				mysqli_close($dbcon );
				echo '<p>&nbsp;</p>';

				include ('footer1.php');
			?>
			</div>
		</div>
	</body>
</html>