<?php											
	session_start();
	if (!isset($_SESSION['usr_rol']) ){
		header("Location: ../login.php");
		exit();
	}
?>
<!doctype html>
<html lang=en>
	<head>
		<title>Vista empleados</title>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="../css/includes.css">
		<style type="text/css">
			p { 
				text-align:center; 
			}
		</style>
	</head>
	<body>
		<div id="container">
			<?php include("header-admin2.php"); ?>
			<?php include("nav2.php"); ?>
			<?php include("info-col.php"); ?>


			<div id="content"><!-- Start of table display page content of  -->
				<h2>Empleados registrados - consulta</h2>
				<p>
				<?php 
				// This script retrieves all the records from the users table.
				require ('../mysqli_connect.php'); // Connect to the database.
				//set the number of rows per display page
				$pagerows = 4;
				// Has the total number of pagess already been calculated?
				if (isset($_GET['p']) && is_numeric
				($_GET['p'])) {//already been calculated
				$pages=$_GET['p'];
				}else{//use the next block of code to calculate the number of pages
				//First, check for the total number of records
				$q = "SELECT COUNT(id_empleado) FROM empleados";
				$result = @mysqli_query ($dbcon, $q);
				$row = @mysqli_fetch_array ($result, MYSQLI_NUM);
				$records = $row[0];
				//Now calculate the number of pages
				if ($records > $pagerows){ //if the number of records will fill more than one page
				//Calculatethe number of pages and round the result up to the nearest integer
				$pages = ceil ($records/$pagerows);
				}else{
				$pages = 1;
				}
				}//page check finished
				//Declare which record to start with
				if (isset($_GET['s']) && is_numeric
				($_GET['s'])) {//already been calculated
				$start = $_GET['s'];
				}else{
				$start = 0;
				}
				// Make the query:
				$q = "SELECT * FROM empleados ORDER BY id_empleado ASC LIMIT $start, $pagerows";		
				$result = @mysqli_query ($dbcon, $q); // Run the query.
				$members = mysqli_num_rows($result);
				if ($result) { // If it ran OK, display the records.
				// Table header.
				echo '<table>
				<tr><td><b>Editar</b></td>
				<td><b>Borrar</b></td>
				<td><b>id_empleado</b></td>
				<td><b>Empleado</b></td>
				<td><b>Identificacion</b></td>
				<td><b>Telefono</b></td>
				<td><b>Celular</b></td>
				<td><b>Departamento</b></td>
				<td><b>Puesto</b></td>
				<td><b>Banco</b></td>
				<td><b>Cta Banco</b></td>
				<td><b>Estado</b></td>
				</tr>';
				// Fetch and print all the records:
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					echo '<tr>
					<td><a href="edit_record.php?id=' . $row['id_empleado'] . '">Editar</a></td>
					<td><a href="delete_record.php?id=' . $row['id_empleado'] . '">Borrar</a></td>
					<td>' . $row['id_empleado'] . '</td>
					<td>' . $row['nombre'] . " ".$row['apellido1'] ." ".$row['apellido2'] .'</td>
					<td>' . $row['identificacion'] . '</td>
					<td>' . $row['telefono'] . '</td>
					<td>' . $row['celular'] . '</td>
					<td>' . $row['departamento'] . '</td>
					<td>' . $row['puesto'] . '</td>
					<td>' . $row['banco'] . '</td>
					<td>' . $row['cuenta_banca'] . '</td>
					<td>' . $row['estado'] . '</td>
					</tr>';
					}
					echo '</table>'; // Close the table.
					mysqli_free_result ($result); // Free up the resources.	
				} else { // If it did not run OK.
				// Public message:
					echo '<p class="error">Hay errores. Disculpas por cualquier incoveniente.</p>';
					// Debugging message:
					echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
				} // End of if ($result). Now display the total number of records/members.
				$q = "SELECT COUNT(id_empleado) FROM empleados";
				$result = @mysqli_query ($dbcon, $q);
				$row = @mysqli_fetch_array ($result, MYSQLI_NUM);
				$members = $row[0];
				mysqli_close($dbcon); // Close the database connection.
				echo "<p>Total de empleados: $members</p>";
				if ($pages > 1) {
				echo '<p>';
				//What number is the current page?
				$current_page = ($start/$pagerows) + 1;
				//If the page is not the first page then create a Previous link
				if ($current_page != 1) {
				echo '<a href="admin_view_users.php?s=' . ($start - $pagerows) . '&p=' . $pages . '">Anterior</a> ';
				}
				//Create a Next link
				if ($current_page != $pages) {
				echo '<a href="admin_view_users.php?s=' . ($start + $pagerows) . '&p=' . $pages . '">Proxima</a> ';
				}
				echo '</p>';
				}
				?>
			</div><!-- End of table display content -->
			<?php include("../footer1.php"); ?>
		</div>
	</body>
</html>