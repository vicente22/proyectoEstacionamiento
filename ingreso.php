<?php
	require_once("class/class_usuarios.php");
	print_r($_POST);
	$obj=new Usuarios();
	$obj->logueo();
?>