<?php
require_once("class/class_usuarios.php");
require_once("class/class.clientes.php");

if ($_SESSION["session_user"] and $_SESSION["session_perfil"] == 1 OR $_SESSION["session_user"] and $_SESSION["session_perfil"]==2)
{
?>
	<html>
		<head>
			<title>
				Mantenedor de Tarifas
			</title>
			<link rel="shortcut icon" type="image/x-icon" href="images/estacionamiento.ico" />
			<script src="js/funciones.js" type="text/javascript" language="javascript"></script>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<script type="text/javascript" languange="javascript" src="js/bootstrap.js"></script>
			<script type="text/javascript" languange="javascript" src="js/jquery.min.js"></script>
		</head>
		<body>
			<div align="center" style="background-color:#f0f0f0;width:100%;height:50;">
			<a title="Click Aqu&iacute; para cerrar tu sesi&oacute;n" href="class/class.cerrar.sesion.php">CERRAR SESION</a>
			||
			<a title="Click Aqu&iacute; Volver al HOME" href="home.php">HOME</a>
			<br>
			<font color="green" style="background-color:#f0f0f0;"><strong><?php echo $_SESSION["session_user"];?></strong></font> te encuentras en:
			</div>
			<table class="table table-bordered table-hover table-condensed" align="center">
				<tr>
					<td valign="top" align="center" colspan="13">
						<h3>Secci&oacute;n de Clientes y Vehiculos estacionados</h3>
					</td>
				</tr>
				<tr>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Nombres
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Apellidos
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Direccion
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Telefono
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Correo
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Tipo de Vehiculo
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Tarifa
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Patente
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Fecha llegada
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Hora llegada
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Fecha Termino
					</td>
					<td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Hora Termino
					</td>
					</td><td align="left" style="text-align:center;background-color:gray;color:#f0f0f0;">
						Operaciones
					</td>
				</tr>
				<?php
					
			
					$obj=new Clientes();
					$clientes=$obj->select_clientes();	
					for($i=0;$i<sizeof($clientes);$i++){
						if($clientes[$i]["fecha_inicio"]=date("Y-m-d")){	
				?>
				<tr>
					<td align="left" style="text-align:center;">
						<?php echo utf8_decode($clientes[$i]["nombres"]); ?>
					</td>
					<td align="left" style="text-align:center;">
						<?php echo utf8_decode($clientes[$i]["apellidos"]); ?>
					</td>
					<td align="left" style="text-align:center;">
						<?php echo utf8_decode($clientes[$i]["direccion"]); ?>
					</td>
					<td align="left" style="text-align:center;">
						<?php echo $clientes[$i]["telefono"]; ?>
					</td>
					<td align="left" style="text-align:center;">
						<?php 
						if($clientes[$i]["correo"]==""){
							echo "<font color='red'>SIN CORREO</font>";
						}else{
						echo utf8_decode($clientes[$i]["correo"]); 
						}
						?>
					</td>
					<td align="left" style="text-align:center;">
						<?php
						if($clientes[$i]["tipo_vehiculo"] == 1){
							echo "Camioneta"; 
						}else if($clientes[$i]["tipo_vehiculo"] == 2){
							echo "Automovil";
						}else if($clientes[$i]["tipo_vehiculo"]==3){
							echo "Motocicleta";
						}else if($clientes[$i]["tipo_vehiculo"]==4){
							echo "Furgon";
						}
						?>
					</td>
					<td align="left" style="text-align:center;">
						<?php echo utf8_decode($clientes[$i]["tarifa"]); ?>
					</td>
					<td align="left" style="text-align:center;">
						<?php echo utf8_decode( $clientes[$i]["patente"]); ?>
					</td>
					<td align="left" style="text-align:center;">
						<?php echo utf8_decode($clientes[$i]["fecha_inicio"]); ?>
					</td>
					<td align="left" style="text-align:center;">
						<?php echo utf8_decode($clientes[$i]["hora_inicio"]); ?>
					</td>
					<?php
						if($clientes[$i]["fecha_termino"] == 0000-00-00 OR $clientes[$i]["fecha_termino"] == NULL){
					?>
						<td align="left" style="text-align:center;">
							<?php echo "<font color='red' title='El veh&iacute;culo a&uacute;n se encuentra estacionado...'><strong>Estacionado</strong></font>"; ?>
						</td>
					<?php
						}else{
					?>
						<td align="left" style="text-align:center;">
							<?php echo $clientes[$i]["fecha_termino"];?>
						</td>
					<?php
						}
					?>
					<?php
						if($clientes[$i]["hora_termino"] == "00:00:00" OR $clientes[$i]["hora_termino"] == NULL){
					?>
						<td align="left" style="text-align:center;">
							<?php echo "<font color='red' title='El veh&iacute;culo a&uacute;n se encuentra estacionado...'><strong>Estacionado</strong></font>"; ?>
						</td>
					<?php
						}else{
					?>
						<td align="left" style="text-align:center;">
							<?php 
								echo $clientes[$i]["hora_termino"];
							?>
						</td>
					<?php
						}
						if($_SESSION["session_perfil"]==1){
					?>
					<td>
						<?php
							if($clientes[$i]["hora_termino"] == "00:00:00" OR $clientes[$i]["fecha_termino"] == 0000-00-00){
						?>
						<a href="finalizar_hora.php?id=<?php echo $clientes[$i]["id_cliente"]; ?>" title="Finalizar la hora de estacionamiento..."><img src="images/finalizar.png"></a>
						<?php	
							}
						?>
						<a href="editar_cliente.php?id=<?php echo $clientes[$i]["id_cliente"]; ?>" title="Editar el usuario..."><img src="images/editar.png"></a>
						<a href="javascript:void(0);" onclick="eliminar_cliente('eliminar_clientes.php?id=<?php echo $clientes[$i]["id_cliente"];?>');" title="Eliminar el cliente..."><img src="images/eliminar.png"></a>
					</td>
					<?php
						}else{
					?>
					<td>
						<?php
							if($clientes[$i]["hora_termino"] == "00:00:00" OR $clientes[$i]["fecha_termino"] == 0000-00-00){
						?>
						<a href="finalizar_hora.php?id=<?php echo $clientes[$i]["id_cliente"]; ?>" title="Finalizar la hora de estacionamiento..."><img src="images/finalizar.png"></a>
						<?php	
							}
						?>
						<a href="editar_cliente.php?id=<?php echo $clientes[$i]["id_cliente"]; ?>" title="Editar el cliente..."><img src="images/editar.png"></a>
						<a href="javascript:void(0);" onclick="eliminar_cliente('eliminar_clientes.php?id=<?php echo $clientes[$i]["id_cliente"];?>');" title="Eliminar el cliente..."><img src="images/eliminar.png"></a>
					</td>
					<?php						
						}
					?>
				</tr>
				<tr>
					<td align="left" valign="bottom" style="float:left;text-align:left;">
					<font color="green"><strong>
						Transcurrido:
						<br>
									<?php 
									$precio_minutos = "";
									$precio_horas = "";
									if($clientes[$i]["hora_termino"] != "00:00:00" OR $clientes[$i]["fecha_termino"] != 0000-00-00){
										if($clientes[$i]["id_tarifa"] == 1){
											$total_segundos = strtotime($clientes[$i]["hora_termino"])-strtotime($clientes[$i]["hora_inicio"]);
											$minutos = (($total_segundos/60)%60);
											//echo $minutos;
											$horas = floor($total_segundos/3600);
											$segundos = ($total_segundos%60);
											echo $horas."hrs:".$minutos."min:".$segundos."seg";
												if($minutos >= 1 && $minutos <= 15 && $horas < 1){
													$precio_minutos = $clientes[$i]["precio"];
												}
												if($minutos > 15 && $horas < 1){
													$precio_minutos = 350 * $minutos;
												}
												if($horas > 1){
													$precio_hora = 350 * $horas;
												}
										}else if($clientes[$i]["id_tarifa"] == 2){
											$total_segundos = strtotime($clientes[$i]["hora_termino"])-strtotime($clientes[$i]["hora_inicio"]);
											$minutos = (($total_segundos/60)%60);
											//echo $minutos;
											$horas = floor($total_segundos/3600);
											$segundos = ($total_segundos%60);
											echo $horas."hrs:".$minutos."min:".$segundos."seg";
												if($minutos >= 1 && $minutos <= 30 && $horas < 1){
													$precio_minutos = $clientes[$i]["precio"];
												}
												if($minutos > 30){
													$precio_minutos = 600 * $minutos;
												}
												if($horas == 0){
													$precio_hora = 600 * $horas;
												}
										}else if($clientes[$i]["id_tarifa"] == 3){
											$total_segundos = strtotime($clientes[$i]["hora_termino"])-strtotime($clientes[$i]["hora_inicio"]);
											$minutos = (($total_segundos/60)%60);
											//echo $minutos;
											$horas = floor($total_segundos/3600);
											$segundos = ($total_segundos%60);
											echo $horas."hrs:".$minutos."min:".$segundos."seg";
												if($minutos >= 1 && $minutos <= 15 && $horas < 1){
													$precio_minutos = $clientes[$i]["precio"];
												}
												if($minutos > 15 && $minutos <= 60 && $horas < 1){
													$precio_minutos = $clientes[$i]["precio"];
												}
												if($horas >= 1){
													$precio_hora = 1200 * $horas;
												}
										}
									}else{
										echo "0hrs:0min:0seg";
									}
					?>
				</font>
					</td>
					<td>
					<font color="blue">
					A pagar:
					<br>$
					<?php
									$precio_total = $precio_minutos + $precio_hora;
									if($horas == 0){
										if($clientes[$i]["hora_termino"] == "00:00:00" OR $clientes[$i]["fecha_termino"] == 0000-00-00){
											echo "0";
										}else{
											echo number_format($precio_minutos,""," ",".");
										}
									}else{
										if($clientes[$i]["hora_termino"] == "00:00:00" OR $clientes[$i]["fecha_termino"] == 0000-00-00){
											echo "0";
										}else{
										echo number_format($precio_total,2);
										}
									}
						?></strong></font>
					</td>
				</tr>
				<?php
						}else{
							echo "<tr><td valign='top' align='center' colspan='13'><font color='red'><h3><strong>No se han estacionado veh&iacute;culos hoy</strong></h3></font></tr></td>";
						}
					}
				?>
				<tr>
					<td valign="bottom" align="left" colspan="8">
						<a href="javascript:history.back(1);" title="Volver a la p&aacute;gina anterior..."/><img src="images/volver.png"></a>
						||
						<a href="agregar_clientes.php" style="border:0;" title="Agregar nuevo nueva Cliente..."><img src="images/agregar.png"></a>
					</td>
				</tr>
			</table>
		</body>
	</html>
<?php
}else{
	echo "<script type='text/javascript'>
	alert('Usted no cuenta con los permisos para este contenido');
	window.location='index.php';
	</script>";
}
?>