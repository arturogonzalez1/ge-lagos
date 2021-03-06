'use strict'

//EXPRESIONES REGULARES

function ValidarRFC(rfc){
	var respuesta = true;
	var expresion = /^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))((-)?([A-Z\d]{3}))?$/;
	if (!expresion.test(rfc)){
		respuesta = false;
	}
	return respuesta;
}

function ValidarUserName(username, max){
	var respuesta = true;
	var expresion = /\s/;
	if (expresion.test(username) || username.length > max || username == "") {
		respuesta = false;
	}
	return respuesta;
}

function ValidarNombre(nombre, max){
	var respuesta = true;
	var expresion = /^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?/g
	if (!expresion.test(nombre) || nombre.length > max || nombre == "") {
		respuesta = false;
	}
	return respuesta;
}

function ValidarLitros(value, max){
	var respuesta = true;
	var expresion = /^[0-9]{1,5}.{1}[0-9]{3}$/;
	if (!expresion.test(value) || value > max) {
		respuesta = false;
	}
	return respuesta;
}

function ValidarPrecios(value, max){
	var respuesta = true;
	var expresion = /^[0-9]{1,5}.{1}[0-9]{2}$/;
	if (!expresion.test(value) || value > max) {
		respuesta = false;
	}
	return respuesta;
}

function ValidarTelefono(telefono){
	var respuesta = true;
	var expresion = /^[0-9]{10}$/;
	if (!expresion.test(telefono)){
		respuesta = false;
	}
	else
		console.log("TELEFONO VALIDO");
	return respuesta;
}

function ValidarEmail(email){
	var respuesta = true;
	var expresion = /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/;
	if (!expresion.test(email)){
		respuesta = false;
	}
	return respuesta;
}

//Solo permite introducir numeros.
function SoloNumeros(e){
    var key = e.charCode;
    if (key == 46 || key >= 48 && key <=57) {
    	return true;
    }
    else{
    	console.log("valor no aceptado " + key);
    	return false;
    }
}
function SoloNumerosEnteros(e){
    var key = e.charCode;
    if (key >= 48 && key <=57) {
    	return true;
    }
    else{
    	return false;
    }
}

function validarFormVacio(formulario){
	var datos = $('#' + formulario).serialize();
	var d = datos.split('&');
	var vacios = 0;
	for(var i=0;i< d.length;i++){
		var controles = d[i].split("=");
		if(controles[1]=="A" || controles[1]==""){
			vacios++;
		}
	}
	return vacios;
}

function validarClaves(clave, claveconfirmacion){
	if (clave == claveconfirmacion) {
		return true;
	}
	else {
		return false;
	}
}

