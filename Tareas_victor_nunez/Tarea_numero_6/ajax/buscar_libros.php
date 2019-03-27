<?php

	/*-------------------------
	Autor: Victor Nunez
	UAM 2019 progra avanzada
	Mail: victornunezcr@gmail.com
	---------------------------*/
	/* Connect To Database*/
	require_once ("../config/db.php");      //Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../funciones.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_libro=intval($_GET['id']);
		$query=mysqli_query($con, "select * from libro where id_libro='".$id_libro."'");
		$count=mysqli_num_rows($query);
		if ($count==0){
			if ($delete1=mysqli_query($con,"DELETE FROM libro WHERE id_libro='".$id_libro."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo no está bién,  intenta nuevamente.
			</div>
			<?php
			
		}
			
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se pudo eliminar éste  libro. 
			</div>
			<?php
		}
		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('id_libro', 'titulo');//Columnas de busqueda
		 $sTable = "libro";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by id_libro desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './index_libro.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			//$simbolo_moneda=get_row('titulo','autor', 'id_libro', 1);
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>Código</th>
					<th>Título</th>
					<th>Autor</th>
					<th>editorial</th>
                    <th style="text-align: right">Precio</th>
					<th class='text-right'>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_libro=$row['id_libro'];
						$titulo=$row['titulo'];
						$autor=$row['autor'];
						$editorial=$row['editorial'];
						$precio=$row['precio'];
					?>
					
					<input type="hidden" value="<?php echo $id_libro;?>" id="id_libro<?php echo $id_libro;?>">
					<input type="hidden" value="<?php echo $titulo;?>" id="titulo<?php echo $titulo;?>">
					<input type="hidden" value="<?php echo $autor;?>" id="autor<?php echo $autor;?>">
					<input type="hidden" value="<?php echo $editorial;?>" id="editorial<?php echo $editorial;?>">
					<input type="hidden" value="<?php echo number_format($precio,2,'.','');?>" id="precio<?php echo $id_libro;?>">
					<tr>
						
						<td><?php   echo $id_libro; ?></td>
						<td><?php   echo $titulo;   ?></td>
						<td><?php   echo $autor;    ?></td>
						<td><?php   echo $editorial;?></td>
						<td><span class='pull-right'><?php echo number_format($precio,2);?></span></td>
					<td ><span class="pull-right">
					<a href="#" class='btn btn-default' title='Editar libro' onclick="obtener_datos('<?php echo $id_libro;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					<a href="#" class='btn btn-default' title='Borrar libro' onclick="eliminar('<?php echo $id_libro; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=6><span class="pull-right">
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>