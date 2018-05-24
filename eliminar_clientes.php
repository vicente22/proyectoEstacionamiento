<?php
	require_once("class/class_usuarios.php");
	if ($_SESSION["session_user"] and $_SESSION["session_perfil"] == 1 OR $_SESSION["session_user"] and $_SESSION["session_perfil"]==2)
	{
	require_once("class/class.clientes.php");
	$cli = new Clientes();
	$cli->delete_cliente($_GET["id"]);
	}else{
	echo "<script type='text/javascript'>
	alert('Usted intenta ingresar a un contenido privado!');
	window.location='index.php';
	</script>";
	}
?>