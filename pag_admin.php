<?php
include_once("conexion.php"); 
?>
<!--Busca por Celupaisa para más proyectos. -->
<html>
<head>    
		<title>Celupaisa</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
	<img src="logo1.png">
			<div id="barrabuscar">
		<form method="POST">
		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
		</form>
		</div>
			<tr><th colspan="3"><h1>LISTAR USUARIOS</h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a></th><th><a style="font-weight: normal; font-size: 14px;" href=index.php ">Cerrar Sesion</a> <a style="font-weight: normal; font-size: 14px;" href=home.php ">Pagina Web</a><th></tr>
			<tr>
		    <th>Nro</th>
            <th>Nombre</th>
            <th>Contraseña</th>
            <th>Rol</th>
            <th>Acción</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conn, "SELECT cod,nom,pass,rol FROM user where nom like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conn, "SELECT * FROM user ORDER BY nom asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['nom']."</td>";
            echo "<td>".$mostrar['pass']."</td>";    
			echo "<td>".$mostrar['rol']."</td>";  
            echo "<td style='width:26%'><a href=\"editar.php?cod=$mostrar[cod]\">Modificar</a> | <a href=\"eliminar.php?cod=$mostrar[cod]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nom]?')\">Eliminar</a></td>";           
}
        ?>
    </table>
	 <script>
function abrirform() {
  document.getElementById("formregistrar").style.display = "block";
  
}


function cancelarform() {
  document.getElementById("formregistrar").style.display = "none";
}

</script>
<div class="caja_popup" id="formregistrar">
  <form action="agregar.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nuevo usuario</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" required></td>
            </tr>
            <tr> 
                <td>Contraseña</td>
                <td><input type="text" name="txtpass" required></td>
            </tr>
            <tr> 
                <td>Rol</td>
                <td><select <input name="txtrol" required />
<option value="0" style="display:none;"><label>Ingresar Rol</label></option>
<option value="Usuario">Usuario</option>
<option value="Admin">Administrador</option>
</select></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar a este usuario?');">
			</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

