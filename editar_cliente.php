<?php
require_once("class/class_usuarios.php");
require_once("class/class.clientes.php");

$cli = new Clientes();

if ($_SESSION["session_user"] and $_SESSION["session_perfil"] == 1 OR $_SESSION["session_user"] and $_SESSION["session_perfil"]==2)
{
	if(isset($_POST["grabar"]) and $_POST["grabar"] == "si"){
		$cli->edit_clientes(utf8_encode($_POST["nombres"]),utf8_encode($_POST["apellidos"]),utf8_encode($_POST["direccion"]),utf8_encode($_POST["telefono"]),utf8_encode($_POST["correo"]),utf8_encode($_POST["tipo_vehiculo"]),utf8_encode($_POST["tarifa"]),utf8_encode($_POST["patente"]),utf8_encode($_POST["fecha_llegada"]),utf8_encode($_POST["hora_llegada"]),utf8_encode($_POST["fecha_termino"]),utf8_encode($_POST["hora_termino"]),$_POST["id"]);
		exit;
	}
	$get_clientes = $cli->get_clientes($_GET["id"]);
	$tari = $cli->obtener_tarifa();
	$vehiculo = $cli->obtener_vehiculo();
?>
	<html>
		<head>
			<title>
				Edicion de Clientes y Vehiculos
			</title>
			<link rel="shortcut icon" type="image/x-icon" href="images/estacionamiento.ico" />
			<script src="js/funciones.js" type="text/javascript" language="javascript"></script>
			<!--Estilos del calendario-->
			<link href="css/calendario.css" type="text/css" rel="stylesheet">
			<script src="js/calendar.js" type="text/javascript"></script>
			<script src="js/calendar-es.js" type="text/javascript"></script>
			<script src="js/calendar-setup.js" type="text/javascript"></script>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<script type="text/javascript" languange="javascript" src="js/bootstrap.js"></script>
			<script type="text/javascript" languange="javascript" src="js/jquery.min.js"></script>
			<!--Fin de estilos del calendario-->
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
			<form method="POST" name="form" action="editar_cliente.php">
				<table align="center">
					<tr>
						<td valign="top" align="center" colspan="2">
							<h3>Secci&oacute;n de Edicion: Clientes y Vehiculos Estacionados</h3>
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Nombres:
						</td>
						<td>
							<input class="form-control" type="text" value="<?php echo utf8_decode($get_clientes[0]["nombres"]); ?>" name="nombres" placeholder="Ingrese nombres..." >
						</td>
					</tr>
					<tr>
						<td align="center"  style="text-align:justify;float:left;">
							Apellidos:
						</td>
						<td>
							<input class="form-control" type="text" value="<?php echo utf8_decode($get_clientes[0]["apellidos"]); ?>" name="apellidos" placeholder="Ingrese apellidos..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Direccion:
						</td>
						<td>
							<input class="form-control" type="text" name="direccion" value="<?php echo utf8_decode($get_clientes[0]["direccion"]); ?>" placeholder="Ingrese direccion..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Telefono:
						</td>
						<td>
							<input class="form-control" type="text" name="telefono" value="<?php echo utf8_decode($get_clientes[0]["telefono"]); ?>" placeholder="Ingrese telefono..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Correo:
						</td>
						<td>
							<input class="form-control" type="text" name="correo" value="<?php echo utf8_decode($get_clientes[0]["correo"]); ?>" placeholder="example@mail.com" >
						</td>
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
							<input class="form-control" type="text" name="patente" value="<?php echo $get_clientes[0]["patente"]; ?>" placeholder="Ingrese patente..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Fecha Llegada:
						</td>
						<td>
							<input class="form-control" type="text" name="fecha_llegada" value="<?php echo $get_clientes[0]["fecha_inicio"]; ?>" placeholder="Ingrese fecha llegada..." readonly>
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Hora Llegada:
						</td>
						<td>
							<input class="form-control" type="time" name="hora_llegada" value="<?php echo $get_clientes[0]["hora_inicio"]; ?>" placeholder="Ingrese hora llegada..." readonly>
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Fecha Termino:
						</td>
						<td>
							<input class="form-control" type="text" name="fecha_termino" id="ingreso" value="<?php echo $get_clientes[0]["fecha_termino"]; ?>" placeholder="Ingrese fecha termino...">
						</td>
						<td>	
							<a href="javascript:void(0);"><img src="images/calendario.png" width="34" height="34" border="0" title="Click Aqu&iacute; para agregar la fecha" id="lanzador"></a>
							<script type="text/javascript"> 
							   Calendar.setup({ 
							    inputField     :    "ingreso",    
							     ifFormat     :     "%Y-%m-%d",   
							     button     :    "lanzador"    
							}); 
							</script>
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Hora Termino:
						</td>
						<td>
							<input class="form-control" type="time" name="hora_termino" value="<?php echo $get_clientes[0]["hora_termino"]; ?>" placeholder="Ingrese hora termino..." >
						</td>
					</tr>
					<tr>
						<td valign="bottom" align="left" colspan="8">
							<input type="hidden" name="grabar" value="si">
							<input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>"/>
							<br>
							<a href="javascript:history.back(1);"/><img src="images/volver.png" title="Volver a la pagina anterior"></a>
							||
							<input class="btn btn-info" type="button" name="guardar" value="Guardar" title="Guardar los cambios" onclick="validar_edicion_cliente();">
							||
							<input class="btn btn-inverse" type="button" name="limpiar" value="Limpiar" title="Limpiar los campos" onclick="limpiar_clientes();">
						</td>
					</tr>
				</table>
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