<?php
require_once("class/class_usuarios.php");
require_once("class/class.tarifas.php");

if ($_SESSION["session_user"] and $_SESSION["session_perfil"] == 1 OR $_SESSION["session_user"] and $_SESSION["session_perfil"]==2)
{
?>
	<html>
		<head>
			<title>
				Mantenedor de Tarifas
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
					<td valign="top" align="center" colspan="5">
						<h3>Secci&oacute;n de Tarifas</h3>
					</td>
				</tr>
				<tr>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Tarifa
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Precio
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Tiempo
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Descripcion
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Operaciones
					</td>
				</tr>
				<?php
					$obj=new Tarifas();
					$tarifa=$obj->select_tarifas();	
					for($i=0;$i<sizeof($tarifa);$i++){
				?>
				<tr>
					<td align="left">
						<?php echo utf8_decode($tarifa[$i]["tarifa"]); ?>
					</td>
					<td align="left">
						<?php echo "$".$tarifa[$i]["precio"]; ?>
					</td>
					<td align="left">
						<?php echo utf8_decode($tarifa[$i]["tiempo"]); ?>
					</td>
					<td align="left">
						<?php echo utf8_decode($tarifa[$i]["descripcion"]); ?>
					</td>
					<?php
						if($_SESSION["session_perfil"]==1){
					?>
					<td>
						<a href="editar_tarifa.php?id=<?php echo $tarifa[$i]['id_tarifa'] ?>" title="Editar una tarifa..."><img src="images/editar.png"></a>
						<a href="javascript:void(0);" onclick="eliminar_tarifa('eliminar_tarifa.php?id=<?php echo $tarifa[$i]['id_tarifa'] ?>');" title="Eliminar una tarifa..."><img src="images/eliminar.png"></a>
					</td>
					<?php
						}else{
					?>
					<td>
						<font title="No tienes los permisos suficientes para utilizas esta secci&oacute;n" color="red"><strong>NO PERMITIDO</strong></font>
					</td>
					<?php						
						}
					?>
				</tr>
				<?php
					}
				?>
				<tr>
					<td valign="bottom" align="left" colspan="8">
						<a href="javascript:history.back(1);"/><img src="images/volver.png"></a>
						<?php
							if($_SESSION["session_perfil"]==1){
						?>
						||
						<a href="agregar_tarifa.php" style="border:0;" title="Agregar una nueva tarifa..."><img src="images/agregar.png"></a>
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