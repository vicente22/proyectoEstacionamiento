<?php
require_once("class/class_usuarios.php");
	if ($_SESSION["session_user"] and $_SESSION["session_perfil"]){
		$obj=new Usuarios();
		$perfil=$obj->get_perfil_por_id();	
		?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>HOME || Sitio de Estacionamiento</title>
		<link rel="shortcut icon" type="image/x-icon" href="images/estacionamiento.ico" />
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<script type="text/javascript" languange="javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" languange="javascript" src="js/jquery.min.js"></script>
		</head>

		<body>
			<div align="center" style="bakcground-color:#f0f0f0;width:300px;height:300px;margin:0 auto;">
				Bienvenido/a <font color="green" style="background-color:#f0f0f0;"><strong><?php echo $_SESSION["session_user"];?></strong></font> 
				tu perfil en estos momentos es de: <font color="green" style="background-color:#f0f0f0;"><strong><?php echo $perfil[0]["perfil"];?></strong></font> || 
				<a title="Click Aqu&iacute; para cerrar tu sesi&oacute;n" href="class/class.cerrar.sesion.php">CERRAR SESION</a>
				<br />
				<br />
				<div width="300px">
					<?php
						if ($_SESSION["session_perfil"]==1 or $_SESSION["session_perfil"]==2)
						{
					?>
							<a href="usuarios.php" class="animated fadeIn" style="background-color:#f0f0f0;border-radius:5px;width:20px;height:20px;color:black;" title="Ver Secci&oacute;n de Usuarios"><img src="images/ver.png" border="0" /><strong>Ver a todos usuarios del sistema</strong></a>
							<hr width="300px">
					<?php
						}
					?>

					<?php
						if ($_SESSION["session_perfil"]==1 or $_SESSION["session_perfil"]==2)
						{
					?>
							<a href="tarifas.php" class="animated fadeIn" style="background-color:#f0f0f0;border-radius:5px;width:20px;height:20px;color:black;" title="Ver Secci&oacute;n de Tarifas"><img src="images/ver.png" border="0" /><strong>Ver todas las Tarifas disponibles</strong></a>
							<hr width="300px">
					<?php
						}
					?>
					<?php
						if ($_SESSION["session_perfil"]==1 or $_SESSION["session_perfil"]==2)
						{
					?>	
							<a class="animated fadeIn" href="clientes.php" style="background-color:#f0f0f0;border-radius:5px;width:20px;height:20px;color:black;" title="Ver o Estacionar veh&iacute;culos"><img src="images/ver.png" border="0" /><strong>Ver/Estacionar un Veh&iacute;culo</strong></a>
					<?php
						}
					?>
				</div>
			</div>
			<?php
			if ($_SESSION["session_perfil"]==2){
			?>	
			<hr>
			<div style="background-color:#f0f0f0;width:300;height:300;float:left;align:center;">
				<font class="animated fadeIn" color="black" style="text-align:justify;"><strong>
					NOTA:</strong> <font color="green"><?php echo $_SESSION["session_user"];?></font> estas son las opciones disponibles que tiene tu perfil de usuario.
					<br>
					En el caso de no tener mas opciones quiere decir que no cuenta con los permisos 
					<br>
					para realizar mas opeaciones dentro del sistema, hable con el administrador del 
					<br>
					sitio para mas información.
				</font>
			</div>
			<?php
			}
			?>
		<br><br><br><br>
		<hr>
		<footer align="center">
			<div align="center"><p class="animated fadeIn">&copy; Creado por Vicente Miño,  email: vicente.mibarra@gmail.com, 2015.</p></div>
		</footer>

		</body>
		</html>
	<?php
	}else{
		echo "<script type='text/javascript'>
		alert('Ud debe loguarse para ingresar a este contenido');
		window.location='index.php';
		</script>";
	}
?>
