'use strict'

function validarNuevoDespachador(){
	var resultado = true;
	var nombre = document.querySelector('#nombreGAS').value;
	var telefono = document.querySelector('#telefonoGAS').value;
	var usuario = document.querySelector('#usrGAS').value;
	var clave1 = document.getElementById("pswGAS").value;
	var clave2 = document.getElementById("pswcGAS").value;

	if(validarFormVacio('frmAgregar') > 0){
		alertify.alert("Error","Debes llenar todos los campos.");
		resultado = false;
	}
	else if (!ValidarNombre(nombre, 50)) {
		alertify.alert("Error", "Introduzca un nombre valido.");
		resultado = false;
	}
	else if (!ValidarTelefono(telefono)) {
		alertify.alert("Error", "Introduzca un telefono validdo.");
		resultado = false;
	}
	else if (!ValidarUserName(usuario, 20)) {
		alertify.alert("Error", "Introduzca un nombre de usuario valido.");
		resultado = false;
	}
	else if (!validarClaves(clave1, clave2)) {
		alertify.alert("Error", "Las contrasenas no coinciden.");
		resultado = false;
	}
	return resultado;
}

function validarModificacionDespachador(){
	var resultado = true;
	var nombre = document.querySelector('#nombreGASM').value;
	var telefono = document.querySelector('#telefonoGASM').value;
	var usuario = document.querySelector('#usrGASM').value;
	var clave1 = document.getElementById("pswGASM").value;
	var clave2 = document.getElementById("pswcGASM").value;

	if(validarFormVacio('frmActualiza') > 0){
		alertify.alert("Error","Debes llenar todos los campos");
		resultado = false;
	}
	else if (!ValidarNombre(nombre, 50)) {
		alertify.alert("Error", "Introduzca un nombre valido.");
		resultado = false;
	}
	else if (!ValidarTelefono(telefono)) {
		alertify.alert("Error", "Introduzca un telefono validdo.");
		resultado = false;
	}
	else if (!ValidarUserName(usuario, 20)) {
		alertify.alert("Error", "Introduzca un nombre de usuario valido.");
		resultado = false;
	}
	else if (!validarClaves(clave1, clave2)){
		alertify.alert("Error", "Las contrasenas no coinciden.");
		resultado = false;
	}
	return resultado;
}