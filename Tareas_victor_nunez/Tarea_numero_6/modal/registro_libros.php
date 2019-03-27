	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoLibro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo libro</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_libro" name="guardar_libro">
			<div id="resultados_ajax_libro"></div>
			  <div class="form-group">
				<label for="titulo" class="col-sm-3 control-label">Título</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título del libro" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="autor" class="col-sm-3 control-label">Autor</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="autor" name="autor" placeholder="Autor del libro" required>
				  
				</div>
			  </div>
			  <div class="form-group">
				<label for="editorial" class="col-sm-3 control-label">Editorial</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="editorial" name="editorial" placeholder="Editorial" required>
				  
				</div>
			  </div>

			  <!-- <div class="form-group">
				<label for="estado" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-8">
				 <select class="form-control" id="estado" name="estado" required>
					<option value="">-- Selecciona estado --</option>
					<option value="1" selected>Activo</option>
					<option value="0">Inactivo</option>
				  </select>
				</div>
			  </div> -->
			  <div class="form-group">
				<label for="precio" class="col-sm-3 control-label">Precio</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio  del libro" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
				</div>
			  </div>
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>