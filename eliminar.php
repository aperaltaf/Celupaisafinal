<?php
include_once("conexion.php");
 
$cod = $_GET['cod'];
 
mysqli_query($conn, "DELETE FROM user WHERE cod=$cod");
 
header("Location:pag_admin.php");

?>