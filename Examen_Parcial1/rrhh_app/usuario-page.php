<?php
	session_start();
	if (!isset($_SESSION['usr_rol']) or ($_SESSION['usr_rol'] != 1)){  
		header("Location: login.php");
		exit();
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Pagina de usuario</title>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="css/includes.css">
		<style type="text/css">
		#mid-right-col { 
			text-align:center; 
			margin:auto;
		}
		#midcol h3 { 
			font-size:130%; 
			margin-top:0; 
			margin-bottom:0;
		}
		</style>
	</head>
	<body>
		<div id="container">
			<?php include("header-usuarios.php"); ?>
			<?php include("nav_usr.php"); ?>
			<?php include("info-col.php"); ?>
				<div id="content"><!-- Start of the member's page content. -->
			<?php
				echo '<h2>Bienvenido a la pagina de usuario normal ';
				if (isset($_SESSION['usr_nombre'])){
					echo "{$_SESSION['usr_nombre']}";
				}
				echo '</h2>';
			?>
			<div id="midcol">
				<div id="mid-left-col">
					<h3>Acciones permitidas</h3>
					<p>&#9632; Solo consultas.
					<br>
					<p> &#9632; Consultar las bases</p>
					<br>
				</div>
			</div><!-- End of the members page content. -->
		</div>	
		<div id="footer">
			<?php include("footer1.php"); ?>
		</div>
	</body>
</html>