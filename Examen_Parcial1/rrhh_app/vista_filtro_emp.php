<!doctype html>
<html lang="en">
    <head>
        <title>Consultas y filtrado</title>
        <meta charset=utf-8>
        <link rel="stylesheet" type="text/css" href="css/includes.css">
        <style> 
            input[type=text] {
            width: 100%;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-image: url('img/searchicon2.png');
            background-size: contain;
            background-position: 10px 10px; 
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <?php include("header.php"); ?>

        <div id="content"><!-- Start of the page-specific content. -->
            <h2>Filtrado Empleados</h2>
            <form>
                <input type="text" name="search" placeholder="Search..">
            </form>              
        </div> <!-- End of the page-specific content. -->
        </div>	
        <div id="footer">
            <?php include("footer.php"); ?>	
        </div>
    </body>
</html>