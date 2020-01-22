'use strict'

function ValidarADM(){
	var respuesta = true;
	var clave1 = document.getElementById("pswADM").value;
	var clave2 = document.getElementById("pswcADM").value;
	var nombre = document.getElementById("nombreADM").value;
	var telefono = document.getElementById("telefonoADM").value;
	var username = document.getElementById("usrADM").value;

	if(validarFormVacio('frmAgrega') > 0)
	{
		return false;
		alertify.alert("ERROR","Debes llenar todos los campos.");
	}
	if (!ValidarNombre(nombre, 100))
	{
		respuesta = false;
		alertify.alert("ERROR","Introduzca un nombre valido.");
	}
	if (!ValidarTelefono(telefono))
	{
		respuesta = false;
		alertify.alert("ERROR","Introduzca un telefono valido.");
	}
	if (!ValidarUserName(username, 50))
	{
		respuesta = false;
		alertify.alert("ERROR","Introduzca un nombre de usuario valido.");
	}
	if (!validarClaves(clave1, clave2))
	{
		respuesta = false;
		alertify.alert("ERROR","Las contraseñas no coinciden.");
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

	if(validarFormVacio('frmactualiza') > 0){
		alertify.alert("Error","Debes llenar todos los campos.");
		return false;
	}
	if (!ValidarNombre(nombre, 100))
	{
		respuesta = false;
		alertify.alert("ERROR","Introduzca un nombre valido.");
	}
	if (!ValidarTelefono(telefono))
	{
		respuesta = false;
		alertify.alert("ERROR","Introduzca un telefono valido.");
	}
	if (!ValidarUserName(username, 50))
	{
		respuesta = false;
		alertify.alert("ERROR","Introduzca un nombre de usuario valido.");
	}
	if (!validarClaves(clave1, clave2))
	{
		respuesta = false;
		alertify.alert("ERROR","Las contraseñas no coinciden.");
	}
	return respuesta;
}