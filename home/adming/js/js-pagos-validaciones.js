'use strict'

//VALIDAR FORMULARIO BUSQUEDA DE TICKETS



//VALIDAR FORMULARIO PAGAR
var inputFactura = document.querySelector("#numeroFactura");

inputFactura.addEventListener('keypress', function(event) {
	var key = event.charCode;
	if (inputFactura.value.length >= 20 || key < 48 || key > 57) {
		console.log("El campo factura solo adminte 20 digitos");
		event.returnValue = false;
	}
});