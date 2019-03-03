<?php 
 
require_once 'db_connect.php';
 
if($_POST) {
    $fcedula = $_POST['fcedula'];
    $fname   = $_POST['fname'];
    $lname1  = $_POST['lname1'];
    $lname2  = $_POST['lname2'];
    
 
    $sql = "INSERT INTO tbl_persona (id_identificacion, nombre, apellido1, apellido2) VALUES ('$fcedula', 
                                     '$fname', '$lname1', '$lname2')";
    if($connect->query($sql) === TRUE) {
        echo "<p>Se ha creado un nuevo registro</p>";
        echo "<a href='../create.php'><button type='button'>Atras</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }
 
    $connect->close();
}
 
?>