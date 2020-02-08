'use strict';


function ValidarVale(){
  var respuesta = true;

  var nombre = document.querySelector("#txtChofer");

  console.log(validarFormVacio('frmAgrega'));
  if (validarFormVacio('frmAgrega') > 0) {
    alertify.alert("ERROR", "Debes llenar todos los campos.")
    respuesta = false;
  }
  else if (!ValidarNombre(nombre.value, 50)) {
    alertify.alert("ERROR","Nombre de operador invalido.");
    respuesta = false;
  }
  return respuesta;
}