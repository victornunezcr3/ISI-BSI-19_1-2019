<?php 
 
require_once 'php_action/db_connect.php';
 
if($_GET['id_persona']) {
    $id = $_GET['id_persona'];
 
    $sql = "SELECT * FROM tbl_persona WHERE id_persona = {$id}";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
 
    $connect->close();
?>
 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Borrar registro</title>
    <style  type="text/css">
        button{
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
    
    </style>
    
</head>
<body>

<h2>ADVERTENCIA!!!!!!</h2>
 
<h3>Está seguro de querer borrar el registro ----> Nº <?php echo $id." ".$data['id_identificacion']." ".$data['nombre']." ".$data['apellido1']." ".$data['apellido2'] ?></h3>
<hr>
<H2>El registro se borrara permanentemente de la base de datos!!!!!</H2>
<form action="php_action/remove.php" method="post">
 
    <input type="hidden" name="id_persona" value="<?php echo $data['id_persona'] ?>" />
    <button type="submit">Guardar cambios</button>
    <a href="index.php"><button type="button">Atraz</button></a>
</form>
<br>
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
 
<?php
}
?>