<?php
	require_once("class/class_usuarios.php");
	if ($_SESSION["session_user"] and $_SESSION["session_perfil"] == 1 OR $_SESSION["session_user"] and $_SESSION["session_perfil"]==2)
	{
	require_once("class/class.clientes.php");
	$cli = new Clientes();
	$cli->add_cliente(utf8_encode($_POST["nombres"]),utf8_encode($_POST["apellidos"]),utf8_encode($_POST["direccion"]),utf8_encode($_POST["telefono"]),utf8_encode($_POST["correo"]),utf8_encode($_POST["tipo_vehiculo"]),utf8_encode($_POST["tarifa"]),utf8_encode($_POST["patente"]));
	}else{
	echo "<script type='text/javascript'>
	alert('Usted intenta ingresar a un contenido privado!');
	window.location='index.php';
	</script>";
	}
?>