<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0))
{  header("Location: login.php");
   exit();
}
?>
<!doctype html>
<html lang="en">
<head>
<title>Pagina de usuario</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<style type="text/css">
#mid-right-col { text-align:center; margin:auto;
}
#midcol h3 { font-size:130%; margin-top:0; margin-bottom:0;
}
</style>
</head>
<body>
<div id="container">
<?php include("header-members.php"); ?>
<?php include("nav_usr.php"); ?>
<?php include("info-col.php"); ?>
	<div id="content"><!-- Start of the member's page content. -->
<?php
echo '<h2>Bienvenido a la pagina de usuario normal ';
if (isset($_SESSION['fname'])){
echo "{$_SESSION['fname']}";
}
echo '</h2>';
?>
<div id="midcol">
<div id="mid-left-col">
<h3>Acciones permitidas</h3>
<p>&#9632; Facturar.
<br>
<p> &#9632; Consultar las bases</p>
<br>
<p>&#9632; Editar su informacion</p> 
<br>
</div>

</div></div><!-- End of the members page content. -->
</div>	
	<div id="footer">
		<?php include("footer.php"); ?>
	</div>
</body>
</html>