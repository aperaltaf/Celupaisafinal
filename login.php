<?php

 include('conexion.php');

$nombre = $_POST["txtusuario"];
$pass 	= $_POST["txtpassword"];
$rol 	= $_POST["rol"];



$queryusuario = mysqli_query($conn,"SELECT * FROM user WHERE nom ='$nombre' and pass = '$pass' and rol = '$rol'");
$nr 		= mysqli_num_rows($queryusuario);  
	
if ($nr == 1 )  
	{ 
		if($rol=="Usuario")
			{	
				header("Location: pag_user.php");
			}
		else if ($rol=="Admin")
			{
				header("Location: pag_admin.php");
			}
	}
else
	{
	echo "<script> alert('Usuario, contraseña o rol incorrecto.');window.location= 'index.php' </script>";
	}

/*Celupaisa*/
?>
