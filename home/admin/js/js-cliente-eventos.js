'use strict'

//EVENTOS NUEVO REGISTRO
var nombre = document.querySelector("#nombreC");
var rfc = document.querySelector("#rfcC");
var limiteCredito = document.querySelector("#limiteC");
var personaAutorizada = document.querySelector("#paC");
var usuario = document.querySelector("#usuarioC");
var clave = document.querySelector("#pswC");
var claveC = document.querySelector("#pswCC");

nombre.addEventListener('keypress', function(event) {
	if (nombre.value.length >= 50) {
		console.log("El campo nombre solo acepta 50 caracteres como maximo");
		event.returnValue = false;
	}
});
rfc.addEventListener('keypress', function(event) {
	if (rfc.value.length >= 13) {
		console.log("El campo rfc solo acepta 13 caracteres como maximo");
		event.returnValue = false;
	}
});
limiteCredito.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (limiteCredito.value.length > 9 || key < 48 || key > 57) {
		console.log("El campo limite de credito solo acepta 9 digitos");
		event.returnValue = false;
	}
});
personaAutorizada.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (personaAutorizada.value.length >= 50) {
		console.log("El campo persona autorizada solo acepta 50 caracteres como maximo");
		event.returnValue = false;
	}
});
usuario.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (usuario.value.length >= 20 || key == 32) {
		console.log("El campo usuario solo acepta 20 caracteres como maximo");
		event.returnValue = false;
	}
});
clave.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (clave.value.length >= 8) {
		console.log("El campo clave solo acepta 8 digitos como maximo");
		event.returnValue = false;
	}
});
claveC.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (claveC.value.length >= 8) {
		console.log("El campo clave solo acepta 8 digitos como maximo");
		event.returnValue = false;
	}
});

//EVENTOS MODIFICAR REGISTRO
var nombreM = document.querySelector("#nombreCM");
var rfcM = document.querySelector("#rfcCM");
var limiteCreditoM = document.querySelector("#limiteCM");
var personaAutorizadaM = document.querySelector("#paCM");
var usuarioM = document.querySelector("#usuarioCM");
var claveM = document.querySelector("#pswCM");
var claveCM = document.querySelector("#pswCCM");

nombreM.addEventListener('keypress', function(event) {
	if (nombreM.value.length >= 50) {
		console.log("El campo nombre solo acepta 50 caracteres como maximo");
		event.returnValue = false;
	}
});
rfcM.addEventListener('keypress', function(event) {
	if (rfcM.value.length >= 13) {
		console.log("El campo rfc solo acepta 13 caracteres como maximo");
		event.returnValue = false;
	}
});
limiteCreditoM.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (limiteCreditoM.value.length > 9 || key < 48 || key > 57) {
		console.log("El campo limite de credito solo acepta 9 digitos");
		event.returnValue = false;
	}
});
personaAutorizadaM.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (personaAutorizadaM.value.length >= 50) {
		console.log("El campo persona autorizada solo acepta 50 caracteres como maximo");
		event.returnValue = false;
	}
});
usuarioM.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (usuarioM.value.length >= 20 || key == 32) {
		console.log("El campo usuario solo acepta 20 caracteres como maximo");
		event.returnValue = false;
	}
});
claveM.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (claveM.value.length >= 8) {
		console.log("El campo clave solo acepta 8 digitos como maximo");
		event.returnValue = false;
	}
});
claveCM.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (claveCM.value.length >= 8) {
		console.log("El campo clave solo acepta 8 digitos como maximo");
		event.returnValue = false;
	}
});