<?php
	require_once("class/class.clientes.php");
	$cli = new Clientes();
	$cli->terminar_hora($_GET["id"]);
?>