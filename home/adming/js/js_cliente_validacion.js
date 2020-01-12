'use strict'
//VALIDACIONES
function validarNuevoCliente(){
	var resultado = true;
	var clave1 = document.getElementById("pswC").value;
	var clave2 = document.getElementById("pswCC").value;

	if(validarFormVacio('frmAgregar') > 0){
		alertify.alert("Error","Debes llenar todos los campos");
		resultado = false;
	}
	if (!validarClaves(clave1, clave2)){
		resultado = false;
	}
	return resultado;
}

function validarModificacionCliente(){
	var resultado = true;
	var clave1 = document.getElementById("pswCM").value;
	var clave2 = document.getElementById("pswCCM").value;

	if(validarFormVacio('frmactualiza') > 0){
		alertify.alert("Error","Debes llenar todos los campos");
		resultado = false;
	}
	if (!validarClaves(clave1, clave2)){
		resultado = false;
	}
	return resultado;
}

function validarClaves(clave, claveconfirmacion){
	if (clave == claveconfirmacion) {
		return true;
	}
	else {
		alertify.alert("Error","Las contraseñas no coinciden");
		return false;
	}
}

