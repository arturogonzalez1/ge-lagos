'use strict'

function validarNuevoDespachador(){
	var resultado = true;
	var clave1 = document.getElementById("pswGAS").value;
	var clave2 = document.getElementById("pswcGAS").value;

	if(validarFormVacio('frmAgregar') > 0){
		alertify.alert("Error","Debes llenar todos los campos");
		resultado = false;
	}
	if (!validarClaves(clave1, clave2)){
		resultado = false;
	}
	return resultado;
}

function validarModificacionDespachador(){
	var resultado = true;
	var clave1 = document.getElementById("pswGASM").value;
	var clave2 = document.getElementById("pswcGASM").value;

	if(validarFormVacio('frmActualiza') > 0){
		alertify.alert("Error","Debes llenar todos los campos");
		resultado = false;
	}
	if (!validarClaves(clave1, clave2)){
		resultado = false;
	}
	return resultado;
}