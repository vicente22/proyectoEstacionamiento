<?php
require_once("class/class_usuarios.php");
require_once("class/class.clientes.php");

if ($_SESSION["session_user"] and $_SESSION["session_perfil"] == 1 OR $_SESSION["session_user"] and $_SESSION["session_perfil"]==2)
{
	$cli = new Clientes();
	$tari = $cli->obtener_tarifa();
	$vehiculo = $cli->obtener_vehiculo();
?>
	<html>
		<head>
			<title>
				Agregar de clientes y vehiculos a estacionar
			</title>
			<link rel="shortcut icon" type="image/x-icon" href="images/estacionamiento.ico" />
			<script src="js/funciones.js" type="text/javascript" language="javascript"></script>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<script type="text/javascript" languange="javascript" src="js/bootstrap.js"></script>
			<script type="text/javascript" languange="javascript" src="js/jquery.min.js"></script>
		</head>
		<body onload="document.form.reset();document.form.nombres.focus();">
			<div align="center" style="background-color:#f0f0f0;width:100%;height:50;">
			<a title="Click Aqu&iacute; para cerrar tu sesi&oacute;n" href="class/class.cerrar.sesion.php">CERRAR SESION</a>
			||
			<a title="Click Aqu&iacute; Volver al HOME" href="home.php">HOME</a>
			<br>
			<font color="green" style="background-color:#f0f0f0;"><strong><?php echo $_SESSION["session_user"];?></strong></font> te encuentras en:
			</div>
			<div class="form-group">
			<form method="POST" name="form" action="agregando_cliente.php">
				<div class="table-responsive">
				<table align="center">
					<tr>
						<td valign="top" align="center" colspan="2">
							<h3>Secci&oacute;n de Agregar: Cliente y Vehiculo a Estacionar</h3>
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Nombres:
						</td>
						<td>
							<input class="form-control" type="text" name="nombres" placeholder="Ingrese nombres..." >
						</td>
					</tr>
					<tr>
						<td align="center"  style="text-align:justify;float:left;">
							Apellidos:
						</td>
						<td>
							<input class="form-control" type="text" name="apellidos" placeholder="Ingrese apellidos..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Direccion:
						</td>
						<td>
							<input class="form-control" type="text" name="direccion" placeholder="Ingrese direccion..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Telefono:
						</td>
						<td>
							<input class="form-control" type="text" name="telefono" placeholder="Ingrese telefono..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Correo:
						</td>
						<td>
							<input class="form-control" type="text" name="correo" placeholder="example@mail.com" >
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Tipo Vehiculo:
						</td>
						<td>
							<select class="form-control" name="tipo_vehiculo">
								<option value="0" selected>Seleccione...</option>
								<?php
									for($i=0;$i<sizeof($vehiculo);$i++){
								?>
								<option value="<?php echo $vehiculo[$i]["id_vehiculo"]; ?>">
									<?php
										echo $vehiculo[$i]["tipo_vehiculo"];
									?>
								</option>
								<?php
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Tarifa:
						</td>
						<td>
							<!--input type="text" name="tarifa" value="<?// echo $get_clientes[0]["id_tarifa"]; ?>" placeholder="Ingrese tarifa..." -->
							<select class="form-control" name="tarifa">
									<option value="0" selected>Seleccione...</option>
									<?php
										for($i=0;$i<sizeof($tari);$i++){
									?>
									<option value="<?php echo $tari[$i]["id_tarifa"]; ?>">
										<?php
											echo $tari[$i]["tarifa"];
										?>
									</option>
									<?php
										}
									?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Patente:
						</td>
						<td>
							<input class="form-control" type="text" name="patente" placeholder="Ingrese patente..." >
						</td>
					</tr>
					<tr>
						<td valign="bottom" align="left" colspan="8">
							<br>
							<a href="javascript:history.back(1);"/><img src="images/volver.png" title="Volver a la pagina anterior"></a>
							||
							<input class="btn btn-info" type="button" name="agregar" value="Agregar" title="Agregar cliente..." onclick="validar_cliente();">
							||
							<input type="button" class="btn btn-inverse" name="limpiar" value="Limpiar" title="Limpiar los campos..." onclick="limpiar_clientes();">
						</td>
					</tr>
				</table>
			</div>
			</form>
			</div>
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