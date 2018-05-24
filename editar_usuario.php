<?php
require_once("class/class_usuarios.php");

$usu = new Usuarios();

if ($_SESSION["session_user"] and $_SESSION["session_perfil"] == 1)
{
	if(isset($_POST["grabar"]) and $_POST["grabar"] == "si"){
		$usu->edit_usuarios(utf8_encode($_POST["nombres"]),utf8_encode($_POST["apellidos"]),utf8_encode($_POST["usuario"]),utf8_encode($_POST["password"]),utf8_encode($_POST["direccion"]),$_POST["telefono"],utf8_encode($_POST["correo"]),$_POST["perfil"],$_POST["id"]);
		exit;
	}
	$get_usuario = $usu->get_usuarios($_GET["id"]);
	$perf = $usu->obtener_perfil();
?>
	<html>
		<head>
			<title>
				Edicion de: Usuarios del sistema
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
			<form method="POST" name="form" action="editar_usuario.php">
				<table align="center">
					<tr>
						<td valign="top" align="center" colspan="2">
							<h3>Secci&oacute;n de Edicion: Usuarios del Sistema</h3>
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Nombres:
						</td>
						<td>
							<input class="form-control" type="text" value="<?php echo utf8_decode($get_usuario[0]["nombres"]); ?>" name="nombres" placeholder="Ingrese nombres..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Apellidos:
						</td>
						<td>
							<input class="form-control" type="text" value="<?php echo utf8_decode($get_usuario[0]["apellidos"]); ?>" name="apellidos" placeholder="Ingrese apellidos..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Usuario:
						</td>
						<td>
							<input class="form-control" type="text" value="<?php echo utf8_decode($get_usuario[0]["usuario"]); ?>" name="usuario" placeholder="Ingrese usuario..." >
						</td>
					</tr>
					<tr>
						<?php
						if($_SESSION["session_perfil"] == 1){
						?>
						<td align="center" style="text-align:justify;float:left;">
							Password:
						</td>
						<td>
							<input class="form-control" type="text" value="<?php echo utf8_decode($get_usuario[0]["password"]); ?>" name="password" placeholder="Ingrese password...">
						</td>
						<?php
						}else{
						?>
						<td align="center" style="text-align:justify;float:left;">
							Password:
						</td>
						<td>
							<input class="form-control" type="password" value="<?php echo utf8_decode($get_usuario[0]["password"]); ?>" name="password" title="NO TIENES PERMISOS PARA VER LA PASSWORD..." readonly>
						</td>
						<?php
						}
						?>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Direccion:
						</td>
						<td>
							<input class="form-control" type="text" value="<?php echo utf8_decode($get_usuario[0]["direccion"]); ?>" name="direccion" placeholder="Ingrese direccion..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Telefono:
						</td>
						<td>
							<input class="form-control" type="text" value="<?php echo $get_usuario[0]["telefono"]; ?>" name="telefono" placeholder="Ingrese telefono..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Correo:
						</td>
						<td>
							<input class="form-control" type="text" value="<?php echo utf8_decode($get_usuario[0]["correo"]); ?>" name="correo" placeholder="Ingrese correo..." >
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:justify;float:left;">
							Perfil:
						</td>
						<td>
							<select class="form-control" name="perfil" title="Seleccione un perfil...">
								<option value="0" selected>Seleccione...</option>
								<?php
									for($i=0;$i<sizeof($perf);$i++){
								?>
								<option value="<?php echo $perf[$i]["id_perfil"]; ?>">
									<?php
										echo $perf[$i]["perfil"];
									?>
								</option>
								<?php
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td valign="bottom" align="left" colspan="8">
							<input type="hidden" name="grabar" value="si">
							<input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>"/>
							<br>
							<a href="javascript:history.back(1);"/><img src="images/volver.png" title="Volver a la pagina anterior"></a>
							||
							<input class="btn btn-info" type="button" name="guardar" value="Guardar" title="Guardar los cambios" onclick="validar_edicion_usuario();">
							||
							<input class="btn btn-inverse" type="button" name="limpiar" value="Limpiar" title="Limpiar los campos" onclick="limpiar_usuarios();">
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