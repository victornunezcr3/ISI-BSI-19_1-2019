<!DOCTYPE html>
<html>
<head>
	<title>Icrease variable Libro</title>

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

	<form action="php_action/form_incre_var.php" method="post">
		<table cellspacing="0" cellpadding="0">
            <div align="center">                        
            <p>
            <tr>
                <th>Editorial: </th>
				<td><input type="text" name="editorial" placeholder="editorial" required/><td>
            </tr>	
			<tr>
				<th>Porcentaje: </th>
				<td><input type="text" name="porcentaje" placeholder="porcentaje indicado del 1 al 99 " min=1 max=99 required /></td>
			</tr>
                <p></p>
                <td><a href='form_incre_var.php'><button type="submit" >Enviar</button></td>
                
			
           
            </p>
            
            </div>
		</table>
	</form>

</fieldset>

</body>
</html>