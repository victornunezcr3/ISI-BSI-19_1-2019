<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Tarea dos progra avanzada</title>
</head>
<body>
    <header>
        <div class = "w3-container w3-red">
            <h1>PROGRAMACION AVANZADA - I CUATRIMESTRE 2019</h1>
        </div>    
    </header>
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
                 * Método que valida si el texto tiene un formato válido de E-Mail
                 * @param {string} - Email
                 * @return {bool}
                 */
                function validar_email(string $texto): bool
                {
                    return (filter_var($texto, FILTER_VALIDATE_EMAIL) === FALSE) ? False : True;
                }

                //-----------------------------------------------------
                // Variables
                //-----------------------------------------------------
                $errores = [];
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
                $email = isset($_POST['email']) ? $_POST['email'] : null;
                

                //-----------------------------------------------------
                // Validaciones
                //-----------------------------------------------------
                // Nombre
                if (!validar_requerido($nombre)) {
                    $errores[] = 'El campo Nombre es obligatorio.';
                }
                
                // Email
                if (!validar_email($email)) {
                    $errores[] = 'El campo de Email tiene un formato no válido.';
                }
            }
        ?>
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
        <!-- Formulario -->
        <form method="post">
            <script>
            
            </script>
        <hr>
            <p>
                <!-- Campo nombre -->
                Usuario:<input type="text" name="nombre" placeholder="digite login"  required  
                aria-describedby="descripcionContra" pattern='^[a-z A-Z]+[0-9]?'>
            </p>
            <p>
                <!-- Campo password -->
                Password:<input type="password" name="password" placeholder="" required >
            </p>
            <p>
                <!-- Campo edad -->
                <input type="hidden" name="oculto" placeholder="">
            </p>
            <p>
                <!-- Campo fecha nacimiento -->
                Fecha de Nacimiento:<input type="date" name="fechaNac"  >
            </p>
            <p>
                <!-- Campo Email -->
                Correo Electrónico:<input type="text" name="email" placeholder="Email">
            </p>
            <hr>
            <p>
           
                <!-- Botón submit -->
                <input type="submit" value="Enviar">
            </p>
            
        </form> 
        <hr>
        <footer>
			<div class="w3-container w3-red"  >
				Todos los derechos reservados.&nbsp;&nbsp;&nbsp;&nbsp; Diseñado por: 
				victor ml nunez lopez. &nbsp;&nbsp;&nbsp;&nbsp;
				UAM 2019.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright (c) 2019   
			</div> 
		</footer>
</body>
</html>