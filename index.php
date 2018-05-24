<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Inicio || Estacionamiento</title>
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="shortcut icon" type="image/x-icon" href="images/estacionamiento.ico" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
		<script type="text/javascript" languange="javascript" src="js/funciones.js"></script>
		<script type="text/javascript" languange="javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" languange="javascript" src="js/bootstrap.js"></script>
	</head>
	<body onload="document.form.reset();document.form.login.focus();">
		<center>
		<div style="width:500px;height:500px;background:url(images/estacionamiento.jpeg) no-repeat fixed center;border-radius:20px 20px 20px 20px;">
			<br><br>
		<form style="color:white;width:500px;height:300px;border-radius:10px;" class="animated fadeInDown" action="ingreso.php" name="form" method="post">
		<table>
			<tr>
				<td valign="top" align="center" colspan="2">
					<h2>Ingrese sus datos</h2>
					<hr>
				</td>
			</tr>
			<tr>
				<td>
					<label>Usuario:</label>
				</td>
				<td>
					<div class="form-group"><input class="form-control" type="text" name="usuario" placeholder="Ingrese su usuario..." title="Ingrese su usuario al sistema"/></div>
				</td>
			</tr>
			<tr>
				<td>
					<label>Password:</label>
				</td>
				<td>
					<div class="form-group"><input class="form-control" type="password" name="password" placeholder="Ingrese su clave..." title="Ingrese su clave de sistema"/></div>
				</td>
			</tr>
			<tr colspan="2">
				<td>
					<input type="button" class="btn btn-info" value="Ingresar" title="Entrar al sistema" onclick="validar_login();" />
					<input type="button" value="Limpiar" class="btn btn-success" title="Limpiar los campos" onclick="limpiar_login();" />
				</td>
			</tr>
		</table>
		<br />
		No tienes una cuenta?<a href="#" style="color:white;"><strong> Regístrate</strong></a><br />
		<a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#terminos" title="Ver aquí los términos de uso de Sistema de Estacionamiento Online">Ver términos de uso</a>
		</form>
		<br><br><br><br><br><br>
		</div>
		<hr>
		<footer align="center">
			<div  align="center"><p class="animated fadeIn">&copy; Creado por Vicente Miño,  email: vicente.mibarra@gmail.com, 2015.</p></div>
		</footer>
		<div class="modal fade" id="terminos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3>Términos de uso del Sistema</h3>
					</div>
					<div class="modal-body">
						<p align="justify">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at finibus purus, 
							non cursus leo. Vestibulum et varius lectus. Donec efficitur vulputate tempus. Sed finibus sodales ex, sit amet tempor enim tristique eu. 
							Proin laoreet malesuada tellus nec pulvinar.
							Fusce vestibulum erat risus, eget imperdiet mauris tempus vitae. Duis vulputate est ut mollis venenatis. Nullam sollicitudin pulvinar nibh, 
							vitae faucibus odio dignissim ut. Praesent non dui eros.
							Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla facilisi. Proin in hendrerit sem, sed aliquet massa.
							Aenean finibus nulla et erat iaculis, nec commodo risus euismod. Suspendisse 
							aliquam rutrum est quis dignissim. Proin nec tempus nisi. Pellentesque porttitor vel turpis vel fringilla. Vestibulum sit amet ex ligula. 
							Proin sodales, mi a porta luctus, nunc purus mollis risus, 
						</p>
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-danger">Cerrar</button> 
					</div>
				</div>
			</div>
		</div>
	</body>
</html>