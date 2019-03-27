<!DOCTYPE html>
<html>
<head>
	<title>Add Libro</title>

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
	<legend>Add Libro</legend>

	<form action="php_action/create.php" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Titulo</th>
				<td><input type="text" name="titulo" placeholder="Titulo del libro" /></td>
			</tr>		
			<tr>
				<th>Autor</th>
				<td><input type="text" name="autor" placeholder="Autor del libro" /></td>
			</tr>
			<tr>
				<th>Editorial</th>
				<td><input type="text" name="editorial" placeholder="Editorial" /></td>
			</tr>
			<tr>
				<th>Precio</th>
				<td><input type="text" name="precio" placeholder="precio" /></td>
			</tr>
			<tr>
				<td><button type="submit">Save Changes</button></td>
				<td><a href="index.php"><button type="button">Back</button></a></td>
			</tr>
		</table>
	</form>

</fieldset>

</body>
</html>