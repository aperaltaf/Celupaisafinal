<?php 
include_once("conexion.php");
include_once("pag_admin.php");

$codigo = $_GET['cod'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM user WHERE cod=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $codigo = $mostrar['cod'];
    $nombre = $mostrar['nom'];
    $pass = $mostrar['pass'];
	$rol = $mostrar['rol'];
}
?>
<html>
<head>    
		<title>Celupaisa</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar usuario</th></tr>
		     <tr> 
                <td>Codigo</td>
                <td><input type="text" name="txtcodigo" value="<?php echo $codigo;?>" required ></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>Contraseña</td>
                <td><input type="text" name="txtpass" value="<?php echo $pass;?>" required></td>
            </tr>
            <tr> 
                <td>Rol</td>
                <td><select <type="text" name="txtrol" value="<?php echo $rol;?>" required />
<option value="0" style="display:none;"><label>Ingresar Rol</label></option>
<option value="Usuario">Usuario</option>
<option value="Admin">Administrador</option>
</select></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="pag_admin.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">
				</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php
	
	if(isset($_POST['btnmodificar']))
{    
    $codigo1 = $_POST['txtcodigo'];
	
	$nombre1 	= $_POST['txtnombre'];
    $pass1 	= $_POST['txtpass'];
    $rol1 	= $_POST['txtrol']; 
      
    $querymodificar = mysqli_query($conn, "UPDATE user SET nom='$nombre1',pass='$pass1',rol='$rol1' WHERE cod=$codigo1");

  	echo "<script>window.location= 'pag_admin.php' </script>";
    
}
?>
	