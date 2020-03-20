'use strict'

//VALIDACIONES
function ValidarNuevoCliente(){
	var resultado = true;
	var nombre = document.querySelector("#nombreC").value;
	var apellidos = document.querySelector("#apellidosC").value;
	var rfc = document.querySelector("#rfcC").value;
	var codpos = document.querySelector("#codposC").value;
	var email = document.querySelector("#emailC").value;
	var email2 = document.querySelector("#email2C").value;
	var email3 = document.querySelector("#email3C").value;
	var telefono = document.querySelector("#telefonoC").value;
	var razons = document.querySelector("#razonsC").value;
	var colonia = document.querySelector("#coloniaC").value;
	var estado = document.querySelector("#estadoC").value;
	var ciudad = document.querySelector("#ciudadC").value;
	var pais = document.querySelector("#paisC").value;
	var delegacion = document.querySelector("#delegacionC").value;
	var numregidtrib = document.querySelector("#numregidtribC").value;
	var usocfdi = document.querySelector("#usocfdiC").value;
	var limite = document.querySelector("#limiteC").value;
	var diaspago = document.querySelector("#diasPagoC").value;
	var diaslimite = document.querySelector("#diasLimiteC").value;
	var usuario = document.querySelector("#usuarioC").value;
	var clave1 = document.getElementById("pswC").value;
	var clave2 = document.getElementById("pswCC").value;


	if (!ValidarNombre(nombre, 50) || nombre == "")
	{
		resultado = false;
		alertify.alert("ERROR","Introduzca un nombre valido.");
	}
	else if (apellidos != "" && !ValidarNombre(apellidos, 20)) {
			resultado = false;
			alertify.alert("ERROR", "Introduzca apellidos validos");
	}
	else if (rfc == "") {
		resultado = false;
		alertify.alert("ERROR", "RFC es un campo requerido.");
	}
	else if (codpos == "") {
		resultado = false;
		alertify.alert("ERROR", "CODIGO POSTAL es un campo requerido.");
	}
	else if (!ValidarEmail(email)) {
		resultado = false;
		alertify.alert("ERROR", "Introduzca un EMAIL principal valido.");
	}
	else if (email2 != "" && !ValidarEmail(email2)) {
		resultado = false;
		alertify.alert("ERROR", "Introduzca un segundo EMAIL valido");
	}
	else if (email3 != "" && !ValidarEmail(email3)) {
		resultado = false;
		alertify.alert("ERROR", "Introduzca un tercer EMAIL valido");
	}
	else if (telefono != "" && !ValidarTelefono(telefono)) {
		resultado = false;
		alertify.alert("ERROR", "Introduzca un TELEFONO valido");
	}
	else if (!ValidarNombre(razons)) {
		resultado = false;
		alertify.alert("ERROR", "Introduzca un NOMBRE para RAZON SOCIAL valido");
	}
	else if (usocfdi == "") {
		resultado = false;
		alertify.alert("ERROR", "Introduzca un valor CFDI valido");
	}
	else if (limite == "") {
		resultado = false;
		alertify.alert("ERROR", "El campo LIMITE DE CREDITO es requerido");
	}
	else if (!ValidarUserName(usuario, 20)) {
		resultado = false;
		alertify.alert("ERROR", "Introduzca un nombre de usuario valido");
	}
	else if (!validarClaves(clave1, clave2)){
		resultado = false;
	}
	return resultado;
}

function validarModificacionCliente(){
	var resultado = true;
	var nombre = document.querySelector("#nombreCM").value;
	var apellidos = document.querySelector("#apellidosCM").value;
	var rfc = document.querySelector("#rfcCM").value;
	var codpos = document.querySelector("#codposCM").value;
	var email = document.querySelector("#emailCM").value;
	var email2 = document.querySelector("#email2CM").value;
	var email3 = document.querySelector("#email3CM").value;
	var telefono = document.querySelector("#telefonoCM").value;
	var razons = document.querySelector("#razonsCM").value;
	var colonia = document.querySelector("#coloniaCM").value;
	var estado = document.querySelector("#estadoCM").value;
	var ciudad = document.querySelector("#ciudadCM").value;
	var pais = document.querySelector("#paisCM").value;
	var delegacion = document.querySelector("#delegacionCM").value;
	var numregidtrib = document.querySelector("#numregidtribCM").value;
	var usocfdi = document.querySelector("#usocfdiCM").value;
	var limite = document.querySelector("#limiteCM").value;
	var diaspago = document.querySelector("#diasPagoCM").value;
	var diaslimite = document.querySelector("#diasLimiteCM").value;
	var usuario = document.querySelector("#usuarioCM").value;
	var clave1 = document.getElementById("pswCM").value;
	var clave2 = document.getElementById("pswCCM").value;


	if (!ValidarNombre(nombre, 50) || nombre == "")
	{
		resultado = false;
		alertify.alert("ERROR","Introduzca un nombre valido.");
	}
	else if (apellidos != "" && !ValidarNombre(apellidos, 20)) {
			resultado = false;
			alertify.alert("ERROR", "Introduzca apellidos validos");
	}
	else if (rfc == "") {
		resultado = false;
		alertify.alert("ERROR", "RFC es un campo requerido.");
	}
	else if (codpos == "") {
		resultado = false;
		alertify.alert("ERROR", "CODIGO POSTAL es un campo requerido.");
	}
	else if (!ValidarEmail(email)) {
		resultado = false;
		alertify.alert("ERROR", "Introduzca un EMAIL principal valido.");
	}
	else if (email2 != "" && !ValidarEmail(email2)) {
		resultado = false;
		alertify.alert("ERROR", "Introduzca un segundo EMAIL valido");
	}
	else if (email3 != "" && !ValidarEmail(email3)) {
		resultado = false;
		alertify.alert("ERROR", "Introduzca un tercer EMAIL valido");
	}
	else if (telefono != "" && !ValidarTelefono(telefono)) {
		resultado = false;
		alertify.alert("ERROR", "Introduzca un TELEFONO valido");
	}
	else if (!ValidarNombre(razons)) {
		resultado = false;
		alertify.alert("ERROR", "Introduzca un NOMBRE para RAZON SOCIAL valido");
	}
	else if (usocfdi == "") {
		resultado = false;
		alertify.alert("ERROR", "Introduzca un valor CFDI valido");
	}
	else if (limite == "") {
		resultado = false;
		alertify.alert("ERROR", "El campo LIMITE DE CREDITO es requerido");
	}
	else if (!ValidarUserName(usuario, 20)) {
		resultado = false;
		alertify.alert("ERROR", "Introduzca un nombre de usuario valido");
	}
	else if (!validarClaves(clave1, clave2)){
		resultado = false;
	}
	return resultado;
}

