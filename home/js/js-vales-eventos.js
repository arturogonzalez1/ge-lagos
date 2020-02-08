'use strict';

//VALIDAR LITROS
var txtLitros = document.querySelector("#txtLitros");
txtLitros.addEventListener("keypress", function (event) {
	var valor = String.fromCharCode(event.charCode);
  	if (!SoloNumeros(event) || txtLitros.value >= 1500 || (txtLitros.value+valor) > 1500) {
	  	event.returnValue = false;
	  	console.log("Campo litros solo acepta valores numericos.");
	}
});


//VALIDAR IMPORTE
var txtImporte = document.querySelector("#txtImporte");
txtImporte.addEventListener("keypress", function (event) {
	var valor = String.fromCharCode(event.charCode);
	console.log(txtImporte.value + valor);
  	if (!SoloNumeros(event) || txtImporte.value >= 15000 || (txtImporte.value+valor) > 15000){
	  	event.returnValue = false;
	  	console.log("Campo importe solo acepta valores numericos y decimales.");
	}
})