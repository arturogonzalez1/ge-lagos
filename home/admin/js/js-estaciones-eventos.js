'use strict'

var nombre = document.getElementById("nombreE");
var noestacion = document.getElementById("noE");
var rfc = document.getElementById("rfcE");

var nombreM = document.getElementById("nombreEM");
var noestacionM = document.getElementById("numEM");
var rfcM = document.getElementById("rfcEM");

var checkEmpresa = document.querySelector('#checkEmpresa');
var conEmpresaControl = document.getElementById('con-empresa');
var sinEmpresaControl = document.getElementById('sin-empresa');

var checkEmpresaEM = document.querySelector('#checkEmpresaEM');
var contenedorSelectEmpresa = document.getElementById('con-empresaEM');
var contenedorDatosEmpresa = document.getElementById('sin-empresaEM');

var selectEmpresa = document.querySelector('#empresaEM');

//NUEVO REGISTRO

checkEmpresa.addEventListener('change', function(event){
	if (checkEmpresa.checked == true) {
		console.log("Checked");
		checkEmpresa.value = 1;
		conEmpresaControl.classList.remove('hidden');
		sinEmpresaControl.classList.add('hidden');
	}
	else {
		console.log("Unchecked");
		checkEmpresa.value = 0;
		conEmpresaControl.classList.add('hidden');
		sinEmpresaControl.classList.remove('hidden');
	}
});

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

// MODIFICACION

checkEmpresaEM.addEventListener('change', function(event){
	if (checkEmpresaEM.checked == true) {
		console.log("Checked");
		checkEmpresaEM.value = 1;
		contenedorSelectEmpresa.classList.remove('hidden');
		selectEmpresa.disabled = true;
		contenedorDatosEmpresa.classList.remove('hidden');
	}
	else {
		console.log("Unchecked");
		checkEmpresaEM.value = 0;
		contenedorSelectEmpresa.classList.remove('hidden');
		selectEmpresa.disabled = false;
		contenedorDatosEmpresa.classList.add('hidden');
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