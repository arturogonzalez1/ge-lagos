'use strict'

//----------------------------------------- VALIDAR FORMULARIO AGREGAR NUEVA ESTACION -----------------------------------------
$(document).ready(function(){
	$('#mainset').load('tabla.admin.estaciones.view.php');
	$('#btnAgregarEstacion').click(function(){
		if(validarFormVacio('frmAgrega') > 0){
			alertify.alert("Error","Debes llenar todos los campos");
			return false;
		}
		var datos = $('#frmAgrega').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"consultas/agregarEstacion.php",
			success:function(r){
				if(r==1){
					$('#frmAgrega')[0].reset();
					$('#addmodal').modal('hide');
					$('#mainset').load('tabla.admin.estaciones.view.php');
					alertify.success("Agregado con exito :)");
				}
				else{
					alertify.error("No se pudo agregar: " + r);
				}
			}
		});
	});

	//-------------------------------------- VALIDAR FORMULARIO ACTUALIZAR ESTACION --------------------------------------
	$('#btnactualizar').click(function(){

		if(validarFormVacio('frmactualiza') > 0){
			alertify.alert("Error","Debes llenar todos los campos");
			return false;
		}
		var datos=$('#frmactualiza').serialize();
		$.ajax({
		type:"POST",
		data:datos,
		url:"consultas/modificarEstacion.php",
		success:function(r){
			if(r==1){
				$('#frmactualiza')[0].reset();
				$('#updatemodal').modal('hide');
				$('#mainset').load('tabla.admin.estaciones.view.php');
				alertify.success("Modificado con exito");
			}
			else{
				alertify.error("No se pudo modificar");
			}
		}
		});
	});
});