<?php 
 
require_once 'db_connect.php';

 
if($_POST) {
    $id = $_POST['id_persona'];
    $sql = "DELETE From tbl_persona Where id_persona='$id'";
    
    if($connect->query($sql) === TRUE) {
        echo "<p>Registro eliminado!!</p>";
        echo "<a href='../index.php'><button type='button'>Atras</button></a>";
    } else {
        echo "Error eliminar registro : " . $connect->error;
    }
 
    $connect->close();
}
 
?>