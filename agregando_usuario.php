<?php
	require_once("class/class_usuarios.php");
	if ($_SESSION["session_user"] and $_SESSION["session_perfil"] == 1)
	{
	require_once("class/class_usuarios.php");
	$usu = new Usuarios();
	$usu->add_usuario(utf8_encode($_POST["nombres"]),utf8_encode($_POST["apellidos"]),utf8_encode($_POST["usuario"]),utf8_encode($_POST["password"]),utf8_encode($_POST["direccion"]),utf8_encode($_POST["telefono"]),utf8_encode($_POST["correo"]),utf8_encode($_POST["perfil"]));
	}else{
	echo "<script type='text/javascript'>
	alert('Usted intenta ingresar a un contenido privado!');
	window.location='index.php';
	</script>";
	}
?>