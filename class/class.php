<?php
session_start();
class Conectar 
{	
	public static function con()
	{
		$bd_host = "localhost";
		$bd_username = "root@localhost";
		$bd_pass = "123456";
		$bd = "estacionamiento";
		$con = mysqli_connect($bd_host,$bd_username,$bd_pass,$bd);
		mysqli_query($con,"SET NAMES 'utf8'");
		return $con;
	}
}
?>