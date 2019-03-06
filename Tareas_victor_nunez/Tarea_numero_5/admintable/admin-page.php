<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
{
   header("Location: login.php");
   exit();
}
?>
<!doctype html>
<html lang=en>
<head>
<title>Pagina administrador</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
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
echo '<h2>Welcome to the Admin Page ';
if (isset($_SESSION['fname'])){
echo "{$_SESSION['fname']}";
}
echo '</h2>';
?>
<div id="midcol">
	<h3> Tiene permiso :</h3><br>
	<p>&#9632; para Edit and delete un registro.</p>
	<p>&#9632;Use la  View members button para consultar los usuarios.</p>
	<p>&#9632;Use el Search button para filtrar un miembro en particular</p>
	<p>&#9632;Use la Addresses button para localizar una direccion y telefono de un usuario</p>
	<p>&nbsp;</p></div>
<!-- End of the users page content. -->
</div></div>	
	<div id="footer">
		<?php include("footer.php"); ?>
	</div>
</body>
</html>