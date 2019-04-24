<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_facturas="";
	$active_productos="";
	$active_clientes="";
    $active_usuarios="";
    $active_about="active";	
	$title="Acerca de...";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>
	
    <div class="container">
	<div class="panel panel-info">
		
	<div id="resultados"></div><!-- Carga los datos ajax -->
	<div class='outer_div'></div><!-- Carga los datos ajax -->
    <h1>Acerca de miFactura</h1>

<p>
    Application name: Factura CR
</p>

<p>
    Application description: Software de fgacturacion
</p>			
    </div>
    </div>
	<hr>
	<?php
	include("footer.php");
	?>
  </body>
</html>
