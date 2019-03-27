<?php
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	$title="Biblioteca | Libros";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
    <?php include("navbar.php");?>
    <div class="container">
		<div class="panel panel-info">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                    <button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoLibro"><span 
                    class="glyphicon glyphicon-plus" ></span> Nuevo Libro</button>
                </div>
                <h4><i class='glyphicon glyphicon-search'></i> Buscar Libro</h4>
            </div>
            <div class="panel-body">			
            <?php
            include("modal/registro_libros.php");
            include("modal/editar_libros.php"); 
            ?>
            <form class="form-horizontal" role="form" id="datos_cotizacion">				
                <div class="form-group row">
                    <label for="q" class="col-md-2 control-label">Código o nombre</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="q" placeholder="Código o nombre del libro" onkeyup='load(1);'>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-default" onclick='load(1);'>
                        <span class="glyphicon glyphicon-search" ></span> Buscar</button>
                        <span id="loader"></span>
                    </div>							
                </div>				
            </form>
            <div id="resultados"></div><!-- Carga los datos ajax -->
            <div class='outer_div'></div><!-- Carga los datos ajax -->			
            </div>
		</div>		 
	</div>
	<hr>
	<?php
		include("footer.php");
	?>
	<script type="text/javascript" src="js/libros.js"></script>
  </body>
</html>
<script>
$( "#guardar_libro" ).submit(function( event ){
  $('#guardar_datos').attr("disabled", true);
  
 	var parametros = $(this).serialize();
	$.ajax({
		type: "POST",
		data: parametros,
		beforeSend: function(objeto){
			$("#resultados_ajax_libro").html("Mensaje: Cargando...");
		},
		success: function(datos){
			$("#resultados_ajax_libro").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		}
	});
  	event.preventDefault();
})

$( "#editar_libro" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
    var parametros = $(this).serialize();
	$.ajax({
		type: "POST",
		url: "ajax/editar_libro.php",
		data: parametros,
		beforeSend: function(objeto){
			$("#resultados_ajax2").html("Mensaje: Cargando...");
		},
		success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			load(1);
		}
	});
    event.preventDefault();
})

	function obtener_datos(id){
		var codigo_libro = $("#codigo_libro"+id).val();
		var titulo_libro = $("#titulo_libro"+id).val();
		var autor_libro = $("#autor_libro"+id).val();
		var editorial_libro = $("#editorial_libro"+id).val();
		var precio_libro = $("#precio_libro"+id).val();
		$("#mod_id").val(codigo_libro);
		$("#mod_titulo").val(titulo_libro);
		$("#mod_autor").val(autor_libro);
		$("#mod_editorial").val(editorial_libro);
		$("#mod_precio").val(precio_libro);
	}
</script>