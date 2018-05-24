<?php
require_once("class.php");

class Usuarios 
{
	private $perfil=array();
	private $usu = array();
	private $perfiles = array();
	
	public function logueo()
	{
		$con = Conectar::con();
		$sql="select * from usuarios where usuario ='".$_POST["usuario"]."' and password ='".$_POST["password"]."'";
		$res=mysqli_query($con,$sql);	
			if (mysqli_num_rows($res)==0){
				echo "<script>
					alert('Usuario no existe!');
					window.location='index.php';
				</script>";
				echo mysqli_connect_error();
			}else{
				if ($reg=mysqli_fetch_array($res)){
					$_SESSION["session_user"]=$reg["usuario"];
					$_SESSION["session_perfil"]=$reg["id_perfil"];
					header("Location: home.php");
				}
			}
	}
	function select_usuarios(){
		$con = Conectar::con();
		$sql="select * from usuarios ORDER BY id_usuario";
		$res=mysqli_query($con,$sql);	
		while($reg=mysqli_fetch_assoc($res)){
				$this->usu[]=$reg;
			}
			return $this->usu;
	}
	function get_perfil_por_id()
	{
		$con = Conectar::con();
		$sql="select perfil from perfiles where id_perfil=".$_SESSION["session_perfil"];
		$res=mysqli_query($con,$sql);
		if ($reg=mysqli_fetch_assoc($res))
			{
				$this->perfil[]=$reg;
			}
				return $this->perfil;
	}
		function add_usuario($nom,$ape,$usu,$pass,$dir,$tel,$correo,$perfil){
			$con = Conectar::con();
			$sql = "INSERT INTO usuarios VALUES(null,'$nom','$ape','$usu','$pass','$dir','$tel','$correo','$perfil')";
			$res=mysqli_query($con,$sql);
			echo "<script type='text/javascript' language='javascript'>
				alert('Cliente agregado correctamente');
				window.location='usuarios.php';
			</script>";
		}
		function edit_usuarios($nom,$ape,$usu,$pass,$dir,$tel,$correo,$perfil,$id){
			$con = Conectar::con();
			$sql = "UPDATE usuarios SET nombres='$nom',apellidos='$ape',usuario='$usu',password='$pass',direccion='$dir',telefono='$tel',correo='$correo',id_perfil='$perfil' WHERE id_usuario = $id";
			$res = mysqli_query($con,$sql);
			echo "<script type='text/javascript' language='javascript'>
				alert('El registro se actualizo correctamente');
				window.location.href='usuarios.php';
			</script>";
		}
		function delete_usuario($id){
			$con = Conectar::con();
			$sql="DELETE FROM usuarios WHERE id_usuario=$id";
			$res=mysqli_query($con,$sql);
			echo "<script type='text/javascript' language='javascript'>
				window.location.href='usuarios.php';
			</script>";
		}
		function get_usuarios($id){
			$con = Conectar::con();
			$sql="select * from usuarios u JOIN perfiles p ON p.id_perfil = u.id_perfil where u.id_usuario=$id";
			$res=mysqli_query($con,$sql);	
			while($reg=mysqli_fetch_assoc($res)){
				$this->usu[]=$reg;
			}
			return $this->usu;
		}
		function obtener_perfil(){
			$con = Conectar::con();
			$sql="select * from perfiles";
			$res=mysqli_query($con,$sql);	
			while($reg=mysqli_fetch_assoc($res)){
				$this->perfiles[]=$reg;
			}
			return $this->perfiles;	
		}
}


?>