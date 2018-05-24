<?php
	require_once("class/class_usuarios.php");
	if ($_SESSION["session_user"] and $_SESSION["session_perfil"] == 1)
	{
	require_once("class/class.tarifas.php");
	$tari = new Tarifas();
	$tari->add_tarifa($_POST["tarifa"],$_POST["precio"],$_POST["tiempo"],$_POST["descripcion"]);
	}else{
	echo "<script type='text/javascript'>
	alert('Usted intenta ingresar a un contenido privado!');
	window.location='index.php';
	</script>";
	}
?>