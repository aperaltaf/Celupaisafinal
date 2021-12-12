<?php include_once("conexion.php"); 
    
	$nombre 	= $_POST['txtnombre'];
    $pass 	= $_POST['txtpass'];
    $rol 	= $_POST['txtrol'];
    
	mysqli_query($conn, "INSERT INTO user (nom,pass,rol) VALUES('$nombre','$pass','$rol')");
    
header("Location:pag_admin.php");
	

?>
