'use strict'

//---------------------------------------------------------- VARIABLES -------------------------------------------------------------

var nombre = document.getElementById("nombreADM");
var rfc = document.getElementById("rfcADM");
var domicilio = document.getElementById("domicilioADM");
var ciudad = document.getElementById("ciudadADM");
var telefono = document.getElementById("telefonoADM");
var username = document.getElementById("usrADM");
var psw = document.getElementById("pswADM");
var pswc = document.getElementById("pswcADM");

var nombreM = document.getElementById("nombreADMM");
var rfcM = document.getElementById("rfcADMM");
var domicilioM = document.getElementById("domicilioADMM");
var ciudadM = document.getElementById("ciudadADMM");
var telefonoM = document.getElementById("telefonoADMM");
var usernameM = document.getElementById("usrADMM");
var pswM = document.getElementById("pswADMM");
var pswcM = document.getElementById("pswcADMM");


//------------------------------------------------------------ EVENTOS -----------------------------------------------------------------


//NUEVO REGISTRO
nombre.addEventListener('keypress', function(event){
	if (nombre.value.length >= 50) {
		console.log("Solo se permiten 50 caracteres en el campo nombre");
		event.returnValue = false;
	}
});
rfc.addEventListener('keypress', function(event){
	if (rfc.value.length >= 13) {
		console.log("Solo se permiten 13 caracteres en el campo RFC");
		event.returnValue = false;
	}
});
domicilio.addEventListener('keypress', function(event){
	if (domicilio.value.length >= 100) {
		console.log("Solo se permiten 100 caracteres en el campo domicilio");
		event.returnValue = false;
	}
});
ciudad.addEventListener('keypress', function(event){
	if (ciudad.value.length >= 100) {
		console.log("Solo se permiten 100 caracteres en el campo ciudad");
		event.returnValue = false;
	}
});
telefono.addEventListener('keypress', function(event){
	if (telefono.value.length >= 10) {
		console.log("Solo se permiten 10 caracteres en el campo telefono");
		event.returnValue = false;
	}
});
username.addEventListener('keypress', function(event){
	if (username.value.length >= 50) {
		console.log("Solo se permiten 50 caracteres en el campo username");
		event.returnValue = false;
	}
});
psw.addEventListener('keypress', function(event){
	if (psw.value.length >= 16) {
		console.log("Solo se permiten 16 caracteres en el campo clave");
		event.returnValue = false;
	}
});
pswc.addEventListener('keypress', function(event){
	if (pswc.value.length >= 16) {
		console.log("Solo se permiten 50 caracteres en el campo clave confirmacion");
		event.returnValue = false;
	}
});





//MODIFICAR REGISTRO
nombreM.addEventListener('keypress', function(event){
	if (nombreM.value.length >= 50) {
		console.log("Solo se permiten 50 caracteres en el campo nombre");
		event.returnValue = false;
	}
});
rfcM.addEventListener('keypress', function(event){
	if (rfcM.value.length >= 13) {
		console.log("Solo se permiten 13 caracteres en el campo RFC");
		event.returnValue = false;
	}
});
domicilioM.addEventListener('keypress', function(event){
	if (domicilioM.value.length >= 100) {
		console.log("Solo se permiten 100 caracteres en el campo domicilio");
		event.returnValue = false;
	}
});
ciudadM.addEventListener('keypress', function(event){
	if (ciudadM.value.length >= 100) {
		console.log("Solo se permiten 100 caracteres en el campo ciudad");
		event.returnValue = false;
	}
});
telefonoM.addEventListener('keypress', function(event){
	if (telefonoM.value.length >= 10) {
		console.log("Solo se permiten 10 caracteres en el campo telefono");
		event.returnValue = false;
	}
});
usernameM.addEventListener('keypress', function(event){
	if (usernameM.value.length >= 50) {
		console.log("Solo se permiten 50 caracteres en el campo username");
		event.returnValue = false;
	}
});
pswM.addEventListener('keypress', function(event){
	if (pswM.value.length >= 16) {
		console.log("Solo se permiten 16 caracteres en el campo clave");
		event.returnValue = false;
	}
});
pswcM.addEventListener('keypress', function(event){
	if (pswcM.value.length >= 16) {
		console.log("Solo se permiten 50 caracteres en el campo clave confirmacion");
		event.returnValue = false;
	}
});
