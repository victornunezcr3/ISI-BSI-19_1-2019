<?php
	session_start();
	if (!isset($_SESSION['usr_rol']) or ($_SESSION['usr_rol'] != 2)){
		header("Location: login.php");
		exit();
	}
?>
<!doctype html>
<html lang=en>
	<head>
		<title>Pagina administrador</title>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="css/includes.css">
		<style type="text/css">
			#midcol { width:98%; }
			#midcol p { margin-left:160px; }
		</style>
	</head>
	<body>
		<div id="container">
			<?php include("header-admin.php"); ?>
			<?php include("nav.php"); ?>
			<?php include("info-col.php"); ?>
			<div id="content"><!-- Start of the user's page content. -->
				<?php
					echo '<h2>Bienvenido a la pagina del gestor -->  ';
					if (isset($_SESSION['usrname'])){
						echo "{$_SESSION['usrname']}";
					}
					echo '</h2>';
				?>
				<div id="midcol">
					<h3> Tiene permiso :</h3><br>
					<p>&#9632; para Editar y borrar un registro.</p>
					<p>&#9632; consultar los usuarios.</p>
					<p>&#9632; agregar nuevos usuarios</p>
					<p>&#9632; Ver, agregar, elimanar  y editar los catalogos del sistema</p>
					<p>&nbsp;</p>
			</div><!-- End of the users page content. -->
		</div>	
		<div id="footer">
				<?php include("footer1.php"); ?>
		</div>
	</body>
</html>