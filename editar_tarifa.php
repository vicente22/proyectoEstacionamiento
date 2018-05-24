<?php
require_once("class/class_usuarios.php");
require_once("class/class.tarifas.php");

$tar = new Tarifas();

if ($_SESSION["session_user"] and $_SESSION["session_perfil"] == 1)
{
	if(isset($_POST["grabar"]) and $_POST["grabar"] == "si"){
		$tar->edit_tarifa(utf8_encode($_POST["tarifa"]),utf8_encode($_POST["precio"]),utf8_encode($_POST["tiempo"]),utf8_encode($_POST["descripcion"]),$_POST["id"]);
		exit;
	}
	$get_tarifa = $tar->get_tarifas($_GET["id"]);
?>
	<html>
		<head>
			<title>
				Edici&oacute;n de Tarifas del sistema
			</title>
			<link rel="shortcut icon" type="image/x-icon" href="images/estacionamiento.ico" />
			<script src="js/funciones.js" type="text/javascript" language="javascript"></script>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<script type="text/javascript" languange="javascript" src="js/bootstrap.js"></script>
			<script type="text/javascript" languange="javascript" src="js/jquery.min.js"></script>
		</head>
		<body onload="document.form.reset();document.form.tarifa.focus();">
			<div align="center" style="background-color:#f0f0f0;width:100%;height:50;">
			<a title="Click Aqu&iacute; para cerrar tu sesi&oacute;n" href="class/class.cerrar.sesion.php">CERRAR SESION</a>
			||
			<a title="Click Aqu&iacute; Volver al HOME" href="home.php">HOME</a>
			<br>
			<font color="green" style="background-color:#f0f0f0;"><strong><?php echo $_SESSION["session_user"];?></strong></font> te encuentras en:
			</div>
			<div class="form-group">
			<form method="POST" name="form" action="editar_tarifa.php">
				<table align="center">
					<tr>
						<td valign="top" align="center" colspan="2">
							<h3>Secci&oacute;n de Edicion: Clientes y Veh&iacute;culos Estacionados</h3>
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Tarifa:
						</td>
						<td>
							<input class="form-control" type="text" value="<?php echo utf8_decode($get_tarifa[0]["tarifa"]); ?>" name="tarifa" placeholder="Ingrese tarifa..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Precio:
						</td>
						<td>
							<input class="form-control" type="text" value="<?php echo utf8_decode($get_tarifa[0]["precio"]); ?>" name="precio" placeholder="Ingrese precio..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Tiempo:
						</td>
						<td>
							<input class="form-control" type="time" value="<?php echo utf8_decode($get_tarifa[0]["tiempo"]); ?>" name="tiempo" placeholder="Ingrese tiempo..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Descripcion:
						</td>
						<td>
							<textarea class="form-control" style="resize:none;" rows="5" cols="24" placeholder="Ingrese descripcion..." name="descripcion"><?php echo utf8_decode($get_tarifa[0]["descripcion"]); ?></textarea>
						</td>
					</tr>
					<tr>
						<td valign="bottom" align="left" colspan="8">
							<input type="hidden" name="grabar" value="si">
							<input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>"/>
							<br>
							<a href="javascript:history.back(1);"/><img src="images/volver.png" title="Volver a la pagina anterior"></a>
							||
							<input class="btn btn-info" type="button" name="guardar" value="Guardar" title="Guardar los cambios" onclick="validar_tarifa();">
							||
							<input class="btn btn-inverse" type="button" name="limpiar" value="Limpiar" title="Limpiar los campos" onclick="limpiar_tarifas();">
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