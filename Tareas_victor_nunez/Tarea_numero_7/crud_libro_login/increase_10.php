<!DOCTYPE html>
<html>
<head>
	<title>Increase 10% Libro</title>

	<style type="text/css">
		fieldset {
			margin: auto;
			margin-top: 100px;
			width: 50%;
		}

		table tr th {
			padding-top: 20px;
		}
	</style>

</head>
<body>

<fieldset>
	<legend>Increase libro</legend>

	<form action="php_action/form_incre_10.php" method="post">
		<table cellspacing="0" cellpadding="0">
            <div align="center">                        
            <p>Ingrese el nombre de la editorial:</p>
            <p>
            <tr>
				<td><input type="text" name="editorial" placeholder="editorial" />
                <a href='form_incre_10.php'><button type="submit" >Enviar</button></td>
				
			</tr>	
			
            </p>
            
            </div>
			
		</table>
		
	</form>
	<a href='../index.php'><button type='button'>Back</button></a>
</fieldset>

</body>
</html>