'use strict'

var nombre = document.getElementById("nombreE");
var noestacion = document.getElementById("noE");
var rfc = document.getElementById("rfcE");

var nombreM = document.getElementById("nombreEM");
var noestacionM = document.getElementById("numEM");
var rfcM = document.getElementById("rfcEM");

nombre.addEventListener('keypress', function(event){
	if (nombre.value.length >= 50) {
		console.log("Solo se permiten 50 caracteres en el campo nombre");
		event.returnValue = false;
	}
});

noestacion.addEventListener('keypress', function(event){
	if (!SoloNumerosEnteros(event) || noestacion.value.length >= 9) {
		console.log("Solo se permiten 9 digitos");
		event.returnValue = false;
	}
});

rfc.addEventListener('keypress', function(event){
	if (rfc.value.length >= 13) {
		console.log("Solo se permiten 13 caracteres en rfc");
		event.returnValue = false;
	}
});

nombreM.addEventListener('keypress', function(event){
	if (nombreM.value.length >= 50) {
		console.log("Solo se permiten 50 caracteres en el campo nombre");
		event.returnValue = false;
	}
});

noestacionM.addEventListener('keypress', function(event){
	if (!SoloNumerosEnteros(event) || noestacionM.value.length >= 9) {
		console.log("Solo se permiten 9 digitos");
		event.returnValue = false;
	}
});

rfcM.addEventListener('keypress', function(event){
	if (rfcM.value.length >= 13) {
		console.log("Solo se permiten 13 caracteres en rfc");
		event.returnValue = false;
	}
});