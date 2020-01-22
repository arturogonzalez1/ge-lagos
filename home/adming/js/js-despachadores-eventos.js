'use strict'

//EVENTOS
var nombre = document.querySelector('#nombreGAS');
var domicilio = document.querySelector('#domicilioGAS');
var ciudad = document.querySelector('#ciudadGAS');
var telefono = document.querySelector('#telefonoGAS');
var usuario = document.querySelector('#usrGAS');
var psw = document.querySelector('#pswGAS');
var pswc = document.querySelector('#pswcGAS');

nombre.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (nombre.value.length >= 50) {
		console.log("Nombre no puede contener mas de 50 caracteres.");
		event.returnValue = false;
	}
});
domicilio.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (domicilio.value.length >= 100) {
		console.log("Domicilio no puede contener mas de 100 caracteres.");
		event.returnValue = false;
	}
});
ciudad.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (ciudad.value.length >= 100) {
		console.log("Ciudad no puede contener mas de 100 caracteres.");
		event.returnValue = false;
	}
});
telefono.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (telefono.value.length >= 10 || key < 48 || key > 57) {
		console.log("Telefono no puede contener mas de 10 caracteres.")
		event.returnValue = false;
	}
});
usuario.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (usuario.value.length >= 20) {
		console.log("Usuario no puede contener mas de 20 caracteres.");
		event.returnValue = false;
	}
});
psw.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (psw.value.length >= 8) {
		console.log("La contrasena no puede contener mas de 8 caracteres.");
		event.returnValue = false;
	}
});
pswc.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (pswc.value.length >= 8) {
		console.log("La contrasena no puede contener mas de 8 caracteres.");
		event.returnValue = false;
	}
});

var nombreM = document.querySelector('#nombreGASM');
var domicilioM = document.querySelector('#domicilioGASM');
var ciudadM = document.querySelector('#ciudadGASM');
var telefonoM = document.querySelector('#telefonoGASM');
var usuarioM = document.querySelector('#usrGASM');
var pswM = document.querySelector('#pswGASM');
var pswcM = document.querySelector('#pswcGASM');

nombreM.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (nombreM.value.length >= 50) {
		console.log("Nombre no puede contener mas de 50 caracteres.");
		event.returnValue = false;
	}
});
domicilioM.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (domicilioM.value.length >= 100) {
		console.log("Domicilio no puede contener mas de 100 caracteres.");
		event.returnValue = false;
	}
});
ciudadM.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (ciudadM.value.length >= 100) {
		console.log("Ciudad no puede contener mas de 100 caracteres.");
		event.returnValue = false;
	}
});
telefonoM.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (telefonoM.value.length >= 10) {
		console.log("Telefono no puede contener mas de 10 caracteres.")
		event.returnValue = false;
	}
});
usuarioM.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (usuarioM.value.length >= 20) {
		console.log("Usuario no puede contener mas de 20 caracteres.");
		event.returnValue = false;
	}
});
pswM.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (pswM.value.length >= 8) {
		console.log("La contrasena no puede contener mas de 8 caracteres.");
		event.returnValue = false;
	}
});
pswcM.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (pswcM.value.length >= 8) {
		console.log("La contrasena no puede contener mas de 8 caracteres.");
		event.returnValue = false;
	}
});
