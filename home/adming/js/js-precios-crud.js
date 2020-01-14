'use strict'

$(document).ready(function(){
	$('#mainsetPrecioActual').load('content.admine.precioactual.view.php');
	$('#mainsetSiguientePrecio').load('content.admine.precionext.view.php');
	$('#mainsetHistorialPrecios').load('content.admine.historial.view.php');

	//---------------------------------------- NUEVO PRECIO PROGRAMADO -----------------------------------------
	$('#btnAgregarPrecio').click(function(){
		if(validarFormVacio('frmAgrega') > 0){
			alertify.alert("Error","Debes llenar todos los campos");
			return false;
		}
		var datos = $('#frmAgrega').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"consultas/agregarPrecio.php",
			success:function(r){
				if(r==1){
					$('#frmAgrega')[0].reset();
					$('#mainsetSiguientePrecio').load('content.admine.precionext.view.php');
					$('#addmodal').modal('hide');
					alertify.success("Precio agregado con exito.");
				}
				else{
					alertify.error("No se pudo agregar: " + r);
				}
			}
		});
	});

	//------------------------------------------------------ MODIFICAR PRECIO ---------------------------------------------------
	$('#btnActualizar').click(function(){
		if(validarFormVacio('frmactualiza') > 0){
			alertify.alert("Error","Debes llenar todos los campos");
			return false;
		}
		var datos=$('#frmactualiza').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"consultas/modificarPrecio.php",
			success:function(r){
				if(r==1){
					$('#frmactualiza')[0].reset();
					$('#updatemodal').modal('hide');
					$('#mainsetPrecioActual').load('content.admine.precioactual.view.php');
					$('#mainsetSiguientePrecio').load('content.admine.precionext.view.php');
					$('#mainsetHistorialPrecios').load('content.admine.historial.view.php');
					alertify.success("El precio se ha modificado con exito.");
				}
				else{
					alertify.error("No se pudo modificar: " + r);
				}
			}
		});
	});
});