<?php
	session_start();
	unset($_SESSION['usuario']);
	
		$_SESSION=array();
	
		session_destroy();
	
	echo '<script type="text/javascript">
	alert("Has finalizado la sesion con exito");
	window.location.href="../index.php";
	</script>';
?>