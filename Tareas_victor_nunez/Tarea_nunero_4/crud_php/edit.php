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
    <title>Editar registro</title>
 
    <style type="text/css">
        fieldset {
            background: silver;
            margin: auto;
            margin-top: 100px;
            width: 50%;
        }

        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
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
 
        table tr th {
            padding-top: 20px;
        }
    </style>
 
</head>
<body>
<?php
    //======================================================================
    // PROCESAR FORMULARIO 
    //======================================================================
    // Comprobamos si nos llega los datos por POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //-----------------------------------------------------
        // Funciones Para Validar
        //-----------------------------------------------------

        /**
         * Método que valida si un texto no esta vacío
         * @param {string} - Texto a validar
         * @return {boolean}
         */
        function validar_requerido(string $texto): bool
        {
            return !(trim($texto) == '');
        }

        /**
         * Método que valida si es un texto entero 
         * @param {string} - texto a validar
         * @return {bool}
         */
        function validar_cedula(string $texto): bool
        {
            if(!preg_match('/^[1-9][0-9]{8}/', $texto))
            {
                return false;
            }
                return true;
        }

        /**
         * Método que valida si el texto tiene un formato válido
         * @param {string} - texto
         * @return {bool}
         */
        function validar_texto(string $texto): bool
        {
            if(!preg_match('/[A-Za-z]{2,40}', $texto))
            {
                return false;
            }
                return true;
        }

        //-----------------------------------------------------
        // Variables
        //-----------------------------------------------------
        $errores = [];
        $cedula = isset($_POST['id_identificacion']) ? $_POST['id_identificacion'] : null;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $apellido1 = isset($_POST['apellido1']) ? $_POST['apellido1'] : null;
        $apellido2 = isset($_POST['apellido2']) ? $_POST['apellido2'] : null;

        //-----------------------------------------------------
        // Validaciones
        //-----------------------------------------------------
        // Cedula
        if (!validar_requerido($cedula)) {
            $errores[] = 'El campo Nombre es obligatorio.';
        }
        // Nombre
        if (!validar_requerido($nombre)) {
            $errores[] = 'El campo Nombre es obligatorio.';
        }
        // Apellido1
        if (!validar_requerido($pellido1)) {
            $errores[] = 'El campo Nombre es obligatorio.';
        }
        // Cedula
        if (!validar_cedula($cedula)) {
            $errores[] = 'El campo cedula no tiene un formato no válido.';
        }
        // Nombre
        if (!validar_texto($nombre)) {
            $errores[] = 'El campo nombre no tiene un formato no válido.';
        }
        //Apellido1
        if (!validar_texto($apellido1)) {
            $errores[] = 'El campo apellido1 no tiene un formato no válido.';
        }
        //Apellido2
        if (!validar_texto($apellido2)) {
            $errores[] = 'El campo apellido2 no tiene un formato no válido.';
        }

    }
?>
<br>
<!-- Mostramos errores por HTML -->
<?php if (isset($errores)): ?>
        <ul class="errores">
            <?php 
                foreach ($errores as $error) {
                    echo '<li>' . $error . '</li>';
                } 
            ?> 
        </ul>
<?php endif; ?>
<fieldset>
    <legend>Editar registro</legend>
 
    <form action="php_action/update.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Cédula</th>
                <td><input type="text" name="id_identificacion" placeholder="Cédula" value="<?php echo $data['id_identificacion'] ?>" /></td>
            </tr>     
            <tr>
                <th>Nombre</th>
                <td><input type="text" name="nombre" placeholder="Nombre" value="<?php echo $data['nombre'] ?>" /></td>
            </tr>     
            <tr>
                <th>Apellido1</th>
                <td><input type="text" name="apellido1" placeholder="Apellido1" value="<?php echo $data['apellido1'] ?>" /></td>
            </tr>
            <tr>
                <th>Apellido2</th>
                <td><input type="text" name="apellido2" placeholder="Apellido2" value="<?php echo $data['apellido2'] ?>" /></td>
            </tr>
            
            <tr>
                <input type="hidden" name="id_persona" value="<?php echo $data['id_persona']?>" />
                <td><button type="submit">Guardar cambios</button></td>
                <td><a href="index.php"><button type="button">Atras</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
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