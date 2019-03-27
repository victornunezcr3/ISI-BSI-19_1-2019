<?php 

require_once 'php_action/db_connect.php';

if($_GET['id']) {
	$id = $_GET['id'];

	$sql = "SELECT * FROM libro WHERE id_libro = {$id}";
	$result = $connect->query($sql);
	$data = $result->fetch_assoc();

	$connect->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Remove Libro</title>
</head>
<body>

<h3>Do you really want to remove ?</h3>
<form action="php_action/remove.php" method="post">

	<input type="hidden" name="id" value="<?php echo $data['id_libro'] ?>" />
	<button type="submit">Save Changes</button>
	<a href="index.php"><button type="button">Back</button></a>
</form>

</body>
</html>

<?php
}
?>