//Desarrollado por Vicente Miño
function limpiar_clientes(){
	var form = document.form;
	form.nombres.value="";
	form.apellidos.value="";
	form.direccion.value="";
	form.telefono.value="";
	form.correo.value="";
	form.tipo_vehiculo.value="0";
	form.tarifa.value="0";
	form.patente.value="";
	form.nombres.focus();
}
function limpiar_usuarios(){
	var form = document.form;
	form.nombres.value="";
	form.apellidos.value="";
	form.usuario.value="";
	form.password.value="";
	form.confirme_password.value="";
	form.direccion.value="";
	form.telefono.value="";
	form.correo.value="";
	form.perfil.value="0";
	form.nombres.focus();
}
function limpiar_tarifas(){
	var form = document.form;
	form.tarifa.value="";
	form.precio.value="";
	form.tiempo.value="";
	form.descripcion.value="";
	form.tarifa.focus();
}
function valida_correo(correo) {
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)){
		return (true);
	} else {
		return (false);
	}
}
function validar_cliente(){
	var form = document.form;
	if(form.nombres.value==0){
			alert("Ingrese los Nombres");
			form.nombres.value="";
			form.nombres.focus();
			return false;
	}
	if(form.apellidos.value==0){
			alert("Ingrese los Apellidos");
			form.apellidos.value="";
			form.apellidos.focus();
			return false;
	}
	if(form.direccion.value==0){
			alert("Ingrese la Direccion");
			form.direccion.value="";
			form.direccion.focus();
			return false;
	}
	if(form.telefono.value==0){
			alert("Ingrese el Telefono");
			form.telefono.value="";
			form.telefono.focus();
			return false;
	}
	if(form.correo.value==0){
			alert("Ingrese el correo");
			form.correo.value="";
			form.correo.focus();
			return false;
	}
	if(valida_correo(form.correo.value) == false){
			alert("Formato de correo incorrecto EJ: example@mail.com");
			form.correo.value="";
			form.correo.focus();
			return false;
	}
	if(form.tipo_vehiculo.value==0){
			alert("Seleccione un Tipo de Vehiculo");
			form.tipo_vehiculo.focus();
			return false;
	}
	if(form.tarifa.value==0){
			alert("Seleccione una Tarifa");
			form.tarifa.focus();
			return false;
	}
	if(form.patente.value==0){
			alert("Ingrese la Patente del vehiculo");
			form.patente.value="";
			form.patente.focus();
			return false;
	}
	form.submit();
}
function validar_edicion_cliente(){
	var form = document.form;
	if(form.nombres.value==0){
			alert("Ingrese los Nombres");
			form.nombres.value="";
			form.nombres.focus();
			return false;
	}
	if(form.apellidos.value==0){
			alert("Ingrese los Apellidos");
			form.apellidos.value="";
			form.apellidos.focus();
			return false;
	}
	if(form.direccion.value==0){
			alert("Ingrese la Direccion");
			form.direccion.value="";
			form.direccion.focus();
			return false;
	}
	if(form.telefono.value==0){
			alert("Ingrese el Telefono");
			form.password.value="";
			form.password.focus();
			return false;
	}
	if(form.correo.value==0){
			alert("Ingrese el Correo");
			form.correo.value="";
			form.correo.focus();
			return false;
	}
	if(valida_correo(form.correo.value) == false){
			alert("Formato de correo incorrecto EJ: example@mail.com");
			form.correo.value="";
			form.correo.focus();
			return false;
	}
	if(form.tipo_vehiculo.value==0){
			alert("Seleccione un Tipo de Vehiculo");
			form.tipo_vehiculo.focus();
			return false;
	}
	if(form.tarifa.value==0){
			alert("Seleccione una Tarifa");
			form.tarifa.focus();
			return false;
	}
	if(form.patente.value==0){
			alert("Ingrese la Patente del vehiculo");
			form.patente.value="";
			form.patente.focus();
			return false;
	}
	if(form.fecha_termino.value < form.fecha_llegada.value){
			alert("La FECHA DE TERMINO no puede ser menor a la FECHA DE LLEGADA");
			form.fecha_termino.focus();
			return false;
	}
	if(form.hora_termino.value < form.hora_llegada.value){
			alert("La HORA DE TERMINO no puede ser menor a la HORA DE LLEGADA");
			form.fecha_termino.focus();
			return false;
	}
	form.submit();
}
function validar_usuario(){
	var form = document.form;
	if(form.nombres.value==0){
			alert("Ingrese los Nombres");
			form.nombres.value="";
			form.nombres.focus();
			return false;
	}
	if(form.apellidos.value==0){
			alert("Ingrese los Apellidos");
			form.apellidos.value="";
			form.apellidos.focus();
			return false;
	}
	if(form.usuario.value==0){
			alert("Ingrese el nombre de Usuario");
			form.usuario.value="";
			form.usuario.focus();
			return false;
	}
	if(form.password.value==0){
			alert("Ingrese la password");
			form.password.value="";
			form.password.focus();
			return false;
	}
	if(form.confirme_password.value==0){
			alert("Confirme la password");
			form.confirme_password.value="";
			form.confirme_password.focus();
			return false;
	}
	if(form.password.value != form.confirme_password.value){
			alert("Password y confirmacion no coinciden");
			form.password.value="";
			form.confirme_password.value="";
			form.password.focus();
			return false;
	}
	if(form.direccion.value==0){
			alert("Ingrese la Direccion");
			form.direccion.value="";
			form.direccion.focus();
			return false;
	}
	if(form.telefono.value==0){
			alert("Ingrese el Telefono");
			form.telefono.value="";
			form.telefono.focus();
			return false;
	}
	if(form.correo.value==0){
			alert("Ingrese el Correo");
			form.correo.value="";
			form.correo.focus();
			return false;
	}
	if(form.perfil.value==0){
			alert("Seleccione un perfil");
			form.perfil.focus();
			return false;
	}
	form.submit();
}
function validar_edicion_usuario(){
	var form = document.form;
	if(form.nombres.value==0){
			alert("Ingrese los Nombres");
			form.nombres.value="";
			form.nombres.focus();
			return false;
	}
	if(form.apellidos.value==0){
			alert("Ingrese los Apellidos");
			form.apellidos.value="";
			form.apellidos.focus();
			return false;
	}
	if(form.usuario.value==0){
			alert("Ingrese el nombre de Usuario");
			form.usuario.value="";
			form.usuario.focus();
			return false;
	}
	if(form.password.value==0){
			alert("Ingrese la password");
			form.password.value="";
			form.password.focus();
			return false;
	}
	if(form.direccion.value==0){
			alert("Ingrese la Direccion");
			form.direccion.value="";
			form.direccion.focus();
			return false;
	}
	if(form.telefono.value==0){
			alert("Ingrese el Telefono");
			form.telefono.value="";
			form.telefono.focus();
			return false;
	}
	if(form.correo.value==0){
			alert("Ingrese el Correo");
			form.correo.value="";
			form.correo.focus();
			return false;
	}
	if(form.perfil.value==0){
			alert("Seleccione un perfil");
			form.perfil.focus();
			return false;
	}
	form.submit();
}
function validar_tarifa(){
	var form = document.form;
	if(form.tarifa.value==0){
			alert("Ingrese el nombre de la Tarifa");
			form.tarifa.value="";
			form.tarifa.focus();
			return false;
	}
	if(form.precio.value==0){
			alert("Ingrese el Precio");
			form.precio.value="";
			form.precio.focus();
			return false;
	}
	if(form.tiempo.value==0){
			alert("Ingrese el Tiempo de la tarifa");
			form.tiempo.value="";
			form.tiempo.focus();
			return false;
	}
	if(form.descripcion.value==0){
			alert("Ingrese la descripcion de la Tarifa");
			form.descripcion.value="";
			form.descripcion.focus();
			return false;
	}
	form.submit();
}
function tr(id,color){
	document.getElementById(id).style.backgroundColor=color;
}
function eliminar_cliente(url){
	if(confirm("Realmente desea eliminar a este Cliente?")){
		window.location=url;
	}
}
function eliminar_usuario(url){
	if(confirm("Realmente desea eliminar a este Usuario?")){
		window.location=url;
	}
}
function eliminar_tarifa(url){
	if(confirm("Realmente desea eliminar esta Tarifa?")){
		window.location=url;
	}
}
function validar_login(){
	var form = document.form;
	if(form.usuario.value==0){
			alert("Ingrese su nombre de usuario");
			form.usuario.value="";
			form.usuario.focus();
			return false;
	}
	if(form.password.value==0){
			alert("Ingrese su Password de Sistema");
			form.password.value="";
			form.password.focus();
			return false;
	}
	form.submit();
}
function limpiar_login(){
	var form = document.form;
	form.usuario.value="";
	form.password.value="";
	form.usuario.focus();
}