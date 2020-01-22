'use strict'

//NUEVO REGISTRO
var inputPlaca = document.querySelector('#placaV');
var inputMarca = document.querySelector('#marcaV');
var inputModelo = document.querySelector('#modeloV');
var inputNoUnidad = document.querySelector('#unidadV');
var inputMotor = document.querySelector('#motorV');

inputPlaca.addEventListener('keypress', function(event){
	if (inputPlaca.value.length >= 15) {
		console.log("Campo placa solo acepta 15 caracteres.");
		event.returnValue = false;
	}
});
inputMarca.addEventListener('keypress', function(event){
	if (inputMarca.value.length >= 20) {
		console.log("Campo marca solo acepta 20 caracteres.");
		event.returnValue = false;
	}
});
inputModelo.addEventListener('keypress', function(event){
	if (inputModelo.value.length >= 50) {
		console.log("Campo modelo solo acepta 50 caracteres.");
		event.returnValue = false;
	}
});
inputNoUnidad.addEventListener('keypress', function(event){
	if (inputNoUnidad.value.length >= 30 || !SoloNumerosEnteros(event)) {
		console.log("Campo No. Unidad solo acepta 30 caracteres.");
		event.returnValue = false;
	}
});
inputMotor.addEventListener('keypress', function(event){
	if (inputMotor.value.length >= 100) {
		console.log("Campo motor solo acepta 100 caracteres.");
		event.returnValue = false;
	}
});

//MODIFICAR REGISTRO
var inputPlacaM = document.querySelector('#placaVM');
var inputMarcaM = document.querySelector('#marcaVM');
var inputModeloM = document.querySelector('#modeloVM');
var inputNoUnidadM = document.querySelector('#unidadVM');
var inputMotorM = document.querySelector('#motorVM');

inputPlacaM.addEventListener('keypress', function(event){
	if (inputPlacaM.value.length >= 15) {
		console.log("Campo placa solo acepta 15 caracteres.");
		event.returnValue = false;
	}
});
inputMarcaM.addEventListener('keypress', function(event){
	if (inputMarcaM.value.length >= 20) {
		console.log("Campo marca solo acepta 20 caracteres.");
		event.returnValue = false;
	}
});
inputModeloM.addEventListener('keypress', function(event){
	if (inputModeloM.value.length >= 50) {
		console.log("Campo modelo solo acepta 50 caracteres.");
		event.returnValue = false;
	}
});
inputNoUnidadM.addEventListener('keypress', function(event){
	if (inputNoUnidadM.value.length >= 30 || !SoloNumerosEnteros(event)) {
		console.log("Campo No. Unidad solo acepta 30 caracteres.");
		event.returnValue = false;
	}
});
inputMotorM.addEventListener('keypress', function(event){
	if (inputMotorM.value.length >= 100) {
		console.log("Campo motor solo acepta 100 caracteres.");
		event.returnValue = false;
	}
});