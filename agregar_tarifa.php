<?php
require_once("class/class_usuarios.php");
require_once("class/class.tarifas.php");

if ($_SESSION["session_user"] and $_SESSION["session_perfil"] == 1)
{
?>
	<html>
		<head>
			<title>
				Crear una tarifa del sistema
			</title>
			<link rel="shortcut icon" type="image/x-icon" href="images/estacionamiento.ico" />
			<link rel="stylesheet" type="text/css" href="css/bootstrap">
			<script type="text/javascript" languange="javascript" src="js/bootstrap.js"></script>
			<script src="js/funciones.js" type="text/javascript" language="javascript"></script>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<script type="text/javascript" languange="javascript" src="js/bootstrap.js"></script>
			<script type="text/javascript" languange="javascript" src="js/jquery.min.js"></script>
		</head>
		<body onload="document.form.reset();document.form.tarifa.focus();">
			<div align="center" style="background-color:#f0f0f0;width:100%;height:50;">
			<a title="Click Aqu&iacute; para cerrar tu sesi&oacute;n" href="class/class.cerrar.sesion.php">CERRAR SESION</a>
			||
			<a href="home.php" title="Click Aqu&iacute; para vovler al Home del sitio">HOME</a>
			<br>
			<font color="green" style="background-color:#f0f0f0;"><strong><?php echo $_SESSION["session_user"];?></strong></font> te encuentras en:
			</div>
			<div class="form-group">
			<form method="POST" name="form" action="agregando_tarifa.php">
				<table align="center">
					<tr>
						<td valign="top" align="center" colspan="2">
							<h3>Secci&oacute;n de Crear: una tarifa del sistema</h3>
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Tarifa:
						</td>
						<td>
							<input class="form-control" type="text" name="tarifa" placeholder="Ingrese titulo de tarifa..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Precio:
						</td>
						<td>
							<input class="form-control" type="text" name="precio" placeholder="Ingrese el precio..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Tiempo:
						</td>
						<td>
							<input class="form-control" type="text" name="tiempo" placeholder="Ingrese el tiempo de la tarifa..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Descripcion:
						</td>
						<td>
							<textarea class="form-control" style="resize:none;" rows="5" cols="24" name="descripcion" placeholder="Ingrese una descripcion..." ></textarea>
						</td>
					</tr>
					<tr>
						<td valign="bottom" align="left" colspan="8">
							<br>
							<a href="javascript:history.back(1);"/><img src="images/volver.png" title="Volver a la pagina anterior"></a>
							||
							<input type="button" class="btn btn-info" name="agregar" value="Agregar" title="Agregar la tarifa..." onclick="validar_tarifa();">
							||
							<input type="button" class="btn btn-inverse" name="limpiar" value="Limpiar" title="Limpiar los campos..." onclick="limpiar_tarifas();">
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