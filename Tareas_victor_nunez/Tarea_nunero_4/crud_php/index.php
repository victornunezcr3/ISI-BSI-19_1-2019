<?php require_once 'php_action/db_connect.php'; ?>
 
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>APP PHP CRUD</title>
 
    <style type="text/css">
        body{
            background-color: #FAF8F8;
        }
        .formConsulta {
            background-color: #C0C0C0;
            width: 50%;
            margin: auto;
        }
        button{
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
 
        table {
            width: 100%;
            margin-top: 20px;
        }
        

 
    </style>
 
</head>
<body>
<header>
			<div class = "w3-container w3-red">
				<h1>PROGRAMACION AVANZADA - I CUATRIMESTRE 2019</h1>
			</div>    
	
</header>
<!-- Contenido del documento -->
<div class="formConsulta">
    <h2 <style = {center;}> MANTENIMIENTO CATALOGO PERSONAS</h2>
    <br>
    <h3>Consulta de datos - listado</h3>
    <a class="boton" href="create.php"><button type="button">Agregar persona</button></a>
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido1</th>
                <th>Apellido2</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM tbl_persona";
            $result = $connect->query($sql);
 
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id_persona']."</td>
                            <td>".$row['id_identificacion']."</td>
                            <td>".$row['nombre']."</td>
                            <td>".$row['apellido1']."</td>
                            <td>".$row['apellido2']."</td>
                            <td>
                                <a href='edit.php?id_persona=".$row['id_persona']."'><button  type='button'>Editar  </button></a>
                                <a href='remove.php?id_persona=".$row['id_persona']."'><button  type='button'>Borrar</button></a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='5'><center>Sin datos disponibles</center></td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<br>
<footer>
				<div class="w3-container w3-red"  >
						Todos los derechos reservados.&nbsp;&nbsp;&nbsp;&nbsp; Diseñado por: 
						victor ml nunez lopez. &nbsp;&nbsp;&nbsp;&nbsp;
						UAM 2019.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright (c) 2019   
				</div> 
			</footer>

</body>
</html>