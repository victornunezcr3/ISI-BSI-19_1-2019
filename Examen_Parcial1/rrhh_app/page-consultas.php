<!doctype html>
<html lang="en">
  <head>
    <title>Consultas y filtrado</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="css/includes.css">
    <style>
    .button {
      background-color:blue; /* Green */
      
      border: none;
      color: white;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }
    .button1 {
      background-color:orange; /* naranja */
      border: none;
      color: white;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 32px;
      margin: 4px 2px;
      cursor: pointer;
    }
    .button4 {padding: 64px 32px;}
    </style>
  </head>
  <body>
    <div id="container">
      <?php include("header.php"); ?>
      <?php include("info-col.php"); ?>
      <div id="content"><!-- Start of the page-specific content. -->
        <h2>Consultas y filtrados</h2>
        <p></p>
        <a class="button button4" href="vista_filtro_emp.php">Empleados</a>
        <a class="button button4" href="">Departamentos</a>
        <a class="button button4" href="">Acciones de personal</a>
        <a class="button1 button4" href="logout.php" title="Salir" >Salir</a>

          <!-- End of the page-specific content. --></div>
      </div>	
      <div id="footer">
        <?php include("footer.php"); ?>	
      </div>
  </body>
</html>