<?php
	require_once("class.php");
	
	class Tarifas{
		private $tarifas=array();
		private $get_tarifas = array();
		
		function select_tarifas(){
			$con = Conectar::con();
			$sql="select * from tarifas order by id_tarifa asc";
			$res=mysqli_query($con,$sql);	
			while($reg=mysqli_fetch_assoc($res)){
				$this->tarifas[]=$reg;
			}
			return $this->tarifas;
		}
		function get_tarifas($id){
			$con = Conectar::con();
			$sql="select * from tarifas where id_tarifa=$id";
			$res=mysqli_query($con,$sql);	
			while($reg=mysqli_fetch_assoc($res)){
				$this->get_tarifas[]=$reg;
			}
			return $this->get_tarifas;
		}
		function delete_tarifa($id){
			$con = Conectar::con();
			$sql="DELETE FROM tarifas WHERE id_tarifa=$id";
			$res=mysqli_query($con,$sql);
			echo "<script type='text/javascript' language='javascript'>
				window.location.href='tarifas.php';
			</script>";
		}
		function edit_tarifa($tarifa,$precio,$tiempo,$descripcion,$id){
			$con = Conectar::con();
			$sql = "UPDATE tarifas SET tarifa='$tarifa',precio='$precio',tiempo='$tiempo',descripcion='$descripcion' WHERE id_tarifa = $id";
			$res = mysqli_query($con,$sql);
			echo "<script type='text/javascript' language='javascript'>
				alert('La Tarifa se actualizada correctamente');
				window.location.href='tarifas.php';
			</script>";
		}
		function add_tarifa($tarifa,$precio,$tiempo,$descripcion){
			$con = Conectar::con();
			$sql = "INSERT INTO tarifas VALUES(null,'$tarifa','$precio','$tiempo','$descripcion')";
			$res=mysqli_query($con,$sql);
			echo "<script type='text/javascript' language='javascript'>
				alert('Tarifa creada correctamente');
				window.location='tarifas.php';
			</script>";
		}
	}
?>