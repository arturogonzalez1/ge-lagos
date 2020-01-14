'use strict'

function ValidarADM(){
	var respuesta = true;
	var clave1 = document.getElementById("pswADM").value;
	var clave2 = document.getElementById("pswcADM").value;
	var nombre = document.getElementById("nombreADM").value;
	//var rfc = document.getElementById("rfcADM").value;
	var telefono = document.getElementById("telefonoADM").value;
	var username = document.getElementById("usrADM").value;

	if (!validarClaves(clave1, clave2))
	{
		respuesta = false;
		console.log("Error en claves");
	}
	if (!ValidarNombre(nombre, 100))
	{
		respuesta = false;
		console.log("Error en nombre");
	}
	// if (!ValidarRFC(rfc))
	// 	respuesta = false;
	if (!ValidarTelefono(telefono))
	{
		respuesta = false;
		console.log("Error en telefono");
	}
	if (!ValidarUserName(username, 50))
	{
		respuesta = false;
		console.log("Error en username");
	}
	return respuesta;
}

function ValidarModificacionADM(){
	var respuesta = true;
	var clave1 = document.getElementById("pswADMM").value;
	var clave2 = document.getElementById("pswcADMM").value;

	var nombre = document.getElementById("nombreADMM").value;
	//var rfc = document.getElementById("rfcADMM").value;
	//var ciudad = document.getElementById("ciudadADMM").value;
	var telefono = document.getElementById("telefonoADMM").value;
	var username = document.getElementById("usrADMM").value;


	if (!validarClaves(clave1, clave2))
	{
		respuesta = false;
		console.log("Error en claves");
	}
	if (!ValidarNombre(nombre, 100))
	{
		respuesta = false;
		console.log("Error en nombre");
	}
	if (!ValidarTelefono(telefono))
	{
		respuesta = false;
		console.log("Error en telefono");
	}
	if (!ValidarUserName(username, 50))
	{
		respuesta = false;
		console.log("Error en username");
	}
	console.log("MODIFICACION VALIDA: "+respuesta);
	return respuesta;
}