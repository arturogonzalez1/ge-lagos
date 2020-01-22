'use strict'

$(document).ready(function(){
	$('#mainset').load('tabla.admin.administradores.view.php');

	//------------------------------------- NUEVO ADMINISTRADOR DE ESTACION --------------------------------------
	$('#btnAgregarADM').click(function(){
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
					alertify.success("Agregado con exito.");
				}
				else{
					alertify.error("No se pudo agregar: " + r);
				}
			}
		});
	});

	//------------------------------------- MODIFICAR ADMINISTRADOR DE ESTACION --------------------------------------
	$('#btnactualizar').click(function(){
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
				else {
					alertify.alert("ERROR AL MODIFICAR", r);
				}
			}
		});
	});
});