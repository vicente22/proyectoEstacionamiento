<?php
	require_once("class/class_usuarios.php");
	if ($_SESSION["session_user"] and $_SESSION["session_perfil"] == 1)
	{
	require_once("class/class.tarifas.php");
	$tarifa = new Tarifas();
	$tarifa->delete_tarifa($_GET["id"]);
	}else{
	echo "<script type='text/javascript'>
	alert('Usted intenta ingresar a un contenido privado!');
	window.location='index.php';
	</script>";
	}
?>