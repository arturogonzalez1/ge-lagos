'use strict'

$(document).ready(function(){
	$('#mainset').load('tabla.admin.administradores.view.php');

	//------------------------------------- NUEVO ADMINISTRADOR DE ESTACION --------------------------------------
	$('#btnAgregarADM').click(function(){
		if(validarFormVacio('frmAgrega') > 0){
			alertify.alert("Error","Debes llenar todos los campos");
			console.log("Debes llenar todos los campos");
			return false;
		}
		if (!ValidarADM()){
			return false;
		}
		var datos = $('#frmAgrega').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"consultas/agregarADM.php",
			success:function(r){
				if(r==1){
					$('#frmAgrega')[0].reset();
					$('#mainset').load('tabla.admin.administradores.view.php');
					$('#addmodal').modal('hide');
					alertify.success("Agregado con exito :)");
				}
				else{
					alertify.error("No se pudo agregar: " + r);
				}
			}
		});
	});

	//------------------------------------- MODIFICAR ADMINISTRADOR DE ESTACION --------------------------------------
	$('#btnactualizar').click(function(){
		console.log("Has clickeado el boton de actualizar");
		if(validarFormVacio('frmactualiza') > 0){
			alertify.alert("Error","Debes llenar todos los campos");
			return false;
		}
		if (!ValidarModificacionADM()){
			return false;
		}
		var datos = $('#frmactualiza').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"consultas/modificarADM.php",
			success:function(r){
				if(r==1){

					$('#frmactualiza')[0].reset();
					$('#updatemodal').modal('hide');
					$('#mainset').load('tabla.admin.administradores.view.php');
					alertify.success("Actualizado con exito");
				}
				else if (r == 3) {
					alertify.error("No se ha actualizado. Usuario no disponible");
				}
				else{
					alertify.error("No se pudo actualizar");
				}
			}
		});
	});
});