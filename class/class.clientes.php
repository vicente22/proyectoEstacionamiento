<?php
	require_once("class.php");
	
	class Clientes{
		private $clientes=array();
		private $get_cliente=array();
		private $obtener_tarifas=array();
		private $vehiculos=array();
		
		function select_clientes(){
			$con = Conectar::con();
			$sql="select * from clientes c JOIN tarifas t ON t.id_tarifa=c.id_tarifa order by c.id_cliente asc";
			$res=mysqli_query($con,$sql);	
			while($reg=mysqli_fetch_assoc($res)){
				$this->clientes[]=$reg;
			}
			return $this->clientes;
		}
		function get_clientes($id){
			$con = Conectar::con();
			$sql="select * from clientes where id_cliente=$id";
			$res=mysqli_query($con,$sql);	
			while($reg=mysqli_fetch_assoc($res)){
				$this->get_cliente[]=$reg;
			}
			return $this->get_cliente;
		}
		function edit_clientes($nom,$ape,$dir,$tel,$correo,$vehiculo,$tarifa,$patente,$fe_ini,$hora_ini,$fe_ter,$hora_ter,$id){
			$con = Conectar::con();
			$sql = "update clientes set nombres='$nom',apellidos='$ape',direccion='$dir',telefono='$tel',correo='$correo',tipo_vehiculo='$vehiculo',id_tarifa='$tarifa',patente='$patente',fecha_inicio='$fe_ini',hora_inicio='$hora_ini',fecha_termino='$fe_ter',hora_termino='$hora_ter' where id_cliente = $id";
			$res = mysqli_query($con,$sql);
			echo "<script type='text/javascript' language='javascript'>
				alert('Clientes actualizado correctamente');
				window.location.href='clientes.php';
			</script>";
		}
		function delete_cliente($id){
			$con = Conectar::con();
			$sql="delete from clientes where id_cliente=$id";
			$res=mysqli_query($con,$sql);
			echo "<script type='text/javascript' language='javascript'>
				window.location.href='clientes.php';
			</script>";
		}
		function add_cliente($nom,$ape,$dir,$tel,$correo,$vehiculo,$tarifa,$patente){
			$con = Conectar::con();
			$sql = "INSERT INTO clientes VALUES(null,'$nom','$ape','$dir','$tel','$correo','$vehiculo','$tarifa','$patente',now(),now(),'0000-00-00','00:00:00')";
			$res=mysqli_query($con,$sql);
			echo "<script type='text/javascript' language='javascript'>
				alert('Cliente agregado correctamente');
				window.location='clientes.php';
			</script>";
		}
		function obtener_tarifa(){
			$con = Conectar::con();
			$sql="select * from tarifas order by id_tarifa";
			$res=mysqli_query($con,$sql);	
			while($reg=mysqli_fetch_assoc($res)){
				$this->obtener_tarifas[]=$reg;
			}
			return $this->obtener_tarifas;	
		}
		function obtener_vehiculo(){
			$con = Conectar::con();
			$sql="select * from vehiculos order by id_vehiculo";
			$res=mysqli_query($con,$sql);	
			while($reg=mysqli_fetch_assoc($res)){
				$this->vehiculos[]=$reg;
			}
			return $this->vehiculos;	
		}
		function terminar_hora($id){
			$con = Conectar::con();
			$sql="update clientes set fecha_termino=now(),hora_termino=now() where id_cliente=$id";
			$res=mysqli_query($con,$sql);
			echo "<script type='text/javascript' language='javascript'>
				alert('Hora finalizada correctamente');
				window.location='clientes.php';
			</script>";
		}
	}
?>