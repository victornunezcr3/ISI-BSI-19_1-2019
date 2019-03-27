<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Agregar registro</title>
 
    <style type="text/css">
        fieldset {
            background-color: silver;
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
        $cedula = isset($_POST['fcedula']) ? $_POST['fcedula'] : null;
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
    <legend>Agregar registro</legend>
 
    <form action="php_action/create.php" method="post">
    
        <table cellspacing="0" cellpadding="0" >
            <tr>
                <th>Cédula</th>
                <td><input type="text" name="fcedula" placeholder="cédula"   pattern= "[0-9]{9}" required/></td>
            </tr>     
            <tr>
                <th>Nombre</th>
                <td><input type="text" name="fname" placeholder="Nombre" pattern= "[a-zA-Z]{2,40}" required/></td>
            </tr>     
            <tr>
                <th>Apellido1</th>
                <td><input type="text" name="lname1" placeholder="Apellido1" pattern= "[a-zA-Z]{2,40}" required/></td>
            </tr>
            <tr>
                <th>Apellido2</th>
                <td><input type="text" name="lname2" placeholder="Apellido2" maxlength="40" pattern= "[a-z A-Z]{3}" /></td>
            </tr>
            <tr>
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