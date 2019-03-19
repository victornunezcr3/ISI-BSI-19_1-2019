<!doctype html>
<html lang=en>
	<head>
		<title>The Login page</title>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="css/includes.css">
	</head>
	<body>
		<div id="container">
		<?php include("login-header.php"); ?>
		<?php include("info-col.php"); ?>
		<div id="content"><!-- Start of the login page content. -->
		<?php 
			// This section processes submissions from the login form.
			// Check if the form has been submitted:
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				//connect to database
				require ('mysqli_connect.php');
				// Validate the user name:
				if (!empty($_POST['usrname'])) {
						$e = mysqli_real_escape_string($dbcon, $_POST['usrname']);
				} else {
				$e = FALSE;
					echo '<p class="error">You forgot to enter your user name.</p>';
				}
				// Validate the password:
				if (!empty($_POST['psword'])) {
						$p = mysqli_real_escape_string($dbcon, $_POST['psword']);
				} else {
				$p = FALSE;
					echo '<p class="error">You forgot to enter your password.</p>';
				}
				if ($e && $p){//if no problems
					// Retrieve the user_id, user_name and user_level for that username/password combination:
					$q = "SELECT id_usuario, usrname, usr_rol FROM usuarios WHERE (usrname='$e' AND psword='$p') ";		
					$result = mysqli_query ($dbcon, $q); 
					/* echo @mysqli_num_rows($result);
					exit();  */
					// Check the result:
						if (@mysqli_num_rows($result) == 1) {//The user input matched the database rcoord
							// Start the session, fetch the record and insert the three values in an array
							session_start();
							$_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
							$_SESSION['usr_rol'] = (int) $_SESSION['usr_rol']; // Changes the 1 or 2 user level to an integer.
							
							//echo $_SESSION['usr_rol'].gettype($_SESSION['usr_rol']);
							$nivel_usr = $_SESSION['usr_rol'];
							//exit();
							$url=($nivel_usr===1)?'usuario-page.php':'admin-page.php' ; // Ternary operation to set the URL
							header('Location: ' . $url); // Makes the actual page jump. Keep in mind that $url is a relative path.
							
							exit(); // Cancels the rest of the script.
							mysqli_free_result($result);
							mysqli_close($dbcon);
							ob_end_clean(); // Delete the buffer.
						} else { // No match was made.
							echo '<p class="error">The email address and password entered do not match our records.<br>Perhaps you need to register, click the Register button on the header menu</p>';
						}
					} else { // If there was a problem.
						echo '<p class="error">Please try again.</p>';
					}
				mysqli_close($dbcon);
			} // End of SUBMIT conditional.
		?>
		<!-- Display the form fields-->
		<div id="loginfields">
			<?php include ('login_page.inc.php'); ?>
			</div><br>
				<?php include ('footer.php'); ?>
			</div>
		</div>	
	</body>
</html>
