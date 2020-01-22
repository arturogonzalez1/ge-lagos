'use strict'
//VALIDACIONES
function validarNuevoCliente(){
	var resultado = true;

	var nombre = document.querySelector("#nombreC").value;
	var personaA = document.querySelector("#paC").value;
	var usuario = document.querySelector("#usuarioC").value;

	var clave1 = document.getElementById("pswC").value;
	var clave2 = document.getElementById("pswCC").value;

	if(validarFormVacio('frmAgregar') > 0){
		alertify.alert("Error","Debes llenar todos los campos");
		resultado = false;
	}
	else if (!ValidarNombre(nombre, 50))
	{
		resultado = false;
		alertify.alert("ERROR","Introduzca un nombre valido.");
	}
	else if (!ValidarNombre(personaA, 50))
	{
		resultado = false;
		alertify.alert("ERROR","Introduzca un nombre de persona autorizada valido.");
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

	var nombreM = document.querySelector("#nombreCM").value;
	var personaAM = document.querySelector("#paCM").value;
	var usuarioM = document.querySelector("#usuarioCM").value;

	var clave1 = document.getElementById("pswCM").value;
	var clave2 = document.getElementById("pswCCM").value;

	if(validarFormVacio('frmactualiza') > 0){
		alertify.alert("Error","Debes llenar todos los campos");
		resultado = false;
	}
	else if (!ValidarNombre(nombreM, 50))
	{
		resultado = false;
		alertify.alert("ERROR","Introduzca un nombre valido.");
	}
	else if (!ValidarNombre(personaAM, 50))
	{
		resultado = false;
		alertify.alert("ERROR","Introduzca un nombre de persona autorizada valido.");
	}
	else if (!ValidarUserName(usuarioM, 20)) {
		resultado = false;
		alertify.alert("ERROR", "Introduzca un nombre de usuario valido");
	}
	else if (!validarClaves(clave1, clave2)){
		resultado = false;
	}
	return resultado;
}

