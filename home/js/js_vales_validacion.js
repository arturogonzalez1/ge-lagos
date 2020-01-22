'use strict'



//VALIDAR LITROS
var txtLitros = document.querySelector("#txtLitros");
txtLitros.addEventListener("keypress", function (e){
	console.log("Tecla presionada " + String.fromCharCode(e.keyCode));
  	if (!soloNumeros(e)){
	  	e.preventDefault();
	  	console.log("Solo datos numericos");
	}
})

txtLitros.addEventListener("keyup", function (e){
  	if (ValidarPrecios(txtLitros.value, 15000)){
  		console.log("Valor aceptado");
  		e.preventDefault();
  	}
  	else
  	{
  		console.log("Valor NO aceptado");
  	}
});


//VALIDAR IMPORTE
var txtImporte = document.querySelector("#txtImporte");
txtImporte.addEventListener("keypress", function (e){
	console.log("Tecla presionada " + String.fromCharCode(e.keyCode));
  	if (!soloNumeros(e)){
	  	e.preventDefault();
	  	console.log("Solo datos numericos");
	}
})

txtImporte.addEventListener("keyup", function (e){
	console.log(txtImporte.value);
  	if (ValidarPrecios(txtImporte.value, 15000)){
  		console.log("Valor aceptado");
  		e.preventDefault();
  	}
  	else
  	{
  		console.log("Valor NO aceptado");
  	}
});

function ValidarVale(){
  var respuesta = true;

  var nombre = document.querySelector("#txtChofer");

  if (!ValidarNombre(nombre.value, 50)) {
    console.log("Nombre de operador invalido.");
    respuesta = false;
  }
  return respuesta;
}