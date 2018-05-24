<?php
	require_once("class.php");

	class Perfiles{
			private $perfil;
			function mostrar_perfiles(){
				$con = Conectar::con();
				$sql = "SELECT perfil FROM perfiles order by id_perfil asc";
				$res=mysqli_query($con,$sql);	
					while($reg=mysqli_fetch_assoc($res)){
						$this->perfil[]=$reg;
					}
				return $this->perfil;
			}
	}
			
?>