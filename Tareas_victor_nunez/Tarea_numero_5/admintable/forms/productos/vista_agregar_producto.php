<?php											
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
{
header("Location: login.php");
exit();
}
?>
<!doctype html>
<html lang=en>
<head>
<title>Vista productos for an administrator</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
</head>
<body>
<div id="container">
<?php include("..\..\header-admin.php"); ?>
<?php include("nav.php"); ?>

<div id="content"><!-- Start of the page-specific content. -->
<h2>Consulta de productos</h2>
<p>
<?php 
// This script retrieves all the records from the users table.
require ('mysqli_connect.php'); // Connect to the database.
// Make the query:
$q = "SELECT id_producto, nombre, tipo_producto, costo_unitario FROM productos ORDER BY id_producto ASC";		
$result = @mysqli_query ($dbcon, $q); // Run the query.
echo $q-->'nombre';
if ($result) { // If it ran OK, display the records.
// Table header.
echo '<table>
<tr><td align="left"><b>Edit</b></td>
<td align="left"><b>Delete</b></td>
<td align="left"><b>ID_producto</b></td>
<td align="left"><b>Nombre</b></td>
<td align="left"><b>Tipo producto</b></td>
<td align="left"><b>Costo unitario</b></td>
</tr>';
// Fetch and print all the records:
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr>
	<td align="left"><a href="edit_user.php?id=' . $row['id_producto'] . '">Edit</a></td>
	<td align="left"><a href="delete_user.php?id=' . $row['id_producto'] . '">Delete</a></td>
	<td align="left">' . $row['id_producto'] . '</td>
	<td align="left">' . $row['nombre'] . '</td>
	<td align="left">' . $row['tipo_producto'] . '</td>
	<td align="left">' . $row['costo_unitario'] . '</td>
	</tr>';
	}
	echo '</table>'; // Close the table.
	mysqli_free_result ($result); // Free up the resources.	
} else { // If it did not run OK.
// Public message:
	echo '<p class="error">The current users could not be retrieved. We apologize for any inconvenience.</p>';
	// Debugging message:
	echo '<p>' . mysqli_error($dbcon) . '<br><br />Query: ' . $q . '</p>';
} // End of if ($r) IF.
mysqli_close($dbcon); // Close the database connection.
?>
</p>
</div><!-- End of the page-specific content. -->
<?php include("footer.php"); ?>
</div>
</body>
</html>