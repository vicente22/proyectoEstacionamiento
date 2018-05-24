<?php
require_once("class/class_usuarios.php");

if ($_SESSION["session_user"] and $_SESSION["session_perfil"] == 1 OR $_SESSION["session_user"] and $_SESSION["session_perfil"]==2)
{
?>
	<html>
		<head>
			<title>
				Mantenedor de Usuarios del sistema
			</title>
			<link rel="shortcut icon" type="image/x-icon" href="images/estacionamiento.ico" />
			<script src="js/funciones.js" type="text/javascript" language="javascript"></script>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<script type="text/javascript" languange="javascript" src="js/bootstrap.js"></script>
			<script type="text/javascript" languange="javascript" src="js/jquery.min.js"></script>
		</head>
		<body>
			<div align="center" style="background-color:#f0f0f0;width:100%;height:50;">
			<a title="Click Aqu&iacute; para cerrar tu sesi&oacute;n" href="class/class.cerrar.sesion.php">CERRAR SESION</a>
			||
			<a title="Click Aqu&iacute; Volver al HOME" href="home.php">HOME</a>
			<br>
			<font color="green" style="background-color:#f0f0f0;"><strong><?php echo $_SESSION["session_user"];?></strong></font> te encuentras en:
			</div>
			<table class="table table-bordered table-hover table-condensed" align="center">
				<tr>
					<td valign="top" align="center" colspan="8">
						<h3>Secci&oacute;n de Usuarios del sistema</h3>
					</td>
				</tr>
				<tr>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Nombres
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Apellidos
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Usuario
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Direccion
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Telefono
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Correo
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Perfil
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Operaciones
					</td>
				</tr>
				<?php
					$obj=new Usuarios();
					$usu=$obj->select_usuarios();	
					for($i=0;$i<sizeof($usu);$i++){
				?>
				<tr>
					<td align="left">
						<?php echo utf8_decode($usu[$i]["nombres"]); ?>
					</td>
					<td align="left">
						<?php echo utf8_decode($usu[$i]["apellidos"]); ?>
					</td>
					<?php
						if($_SESSION["session_perfil"] == 1){
					?>
					<td align="left">
						<?php echo utf8_decode($usu[$i]["usuario"]); ?>
					</td>
					<?php
					}else{
						?>
						<td align="left">
							<font title="Tus permisos no son suficientes para ver este contenido..." color="red"><storng>No disponible</strong</font>
						</td>
					<?php
					}
					?>
					<td align="left">
						<?php echo utf8_decode($usu[$i]["direccion"]); ?>
					</td>
					<td align="left">
						<?php echo utf8_decode($usu[$i]["telefono"]); ?>
					</td>
					<td align="left">
						<?php echo utf8_decode($usu[$i]["correo"]); ?>
					</td>
					<td align="left">
						<?php 
						if($usu[$i]["id_perfil"]==1) {
							echo "Adminitrador";
						}else{
							echo "Empleado";
						}
						?>
					</td>
					<?php
					if($_SESSION["session_perfil"] == 1){
						if($usu[$i]["id_perfil"]==2){
					?>
						<td> 
							<a href="editar_usuario.php?id=<?php echo $usu[$i]["id_usuario"]; ?>" title="Editar el usuario..."><img src="images/editar.png"></a>
							<a href="javascript:void(0);" onclick="eliminar_usuario('eliminar_usuario.php?id=<?php echo $usu[$i]["id_usuario"]; ?>');" title="Eliminar el usuario..."><img src="images/eliminar.png"></a>
						</td>
					<?php
						}else{
					?>
						<td>
							<font color="red" title="No se puede operar con el usuario <?php echo $usu[$i]["nombres"]; ?> porque es administrador"><strong>NO PERMITIDO</srong></font>
						</td>
					<?php					
						}
					?>
				</tr>
				<?php
					}else{
				?>
					<td>
						<font title="No tienes lo permisos suficientes para hacer operaciones en esta secci&oacute;n" color="red"><strong>SIN OPERACIONES<strong></font>
					</td>
				<?php
					}
				}
				?>
				<tr>
					<td valign="bottom" align="left" colspan="8">
						<a href="javascript:history.back(1);"/><img src="images/volver.png" title="Volver a la pagina anterior"></a>
						<?php
							if($_SESSION["session_perfil"]==1){
						?>
						||
						<a href="agregar_usuario.php" style="border:0;" title="Agregar un nuevo usuario..."><img src="images/agregar.png"></a>
						<?php
							}
						?>
					</td>
				</tr>
			</table>
		</body>
	</html>
<?php
}else{
	echo "<script type='text/javascript'>
	alert('Usted no cuenta con los permisos para este contenido');
	window.location='index.php';
	</script>";
}
?>