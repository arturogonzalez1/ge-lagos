'use strict'

//------------------------------------------- VALIDAR FORMULARIO AGREGAR NUEVO VEHICULO --------------------------------------->
$(document).ready(function(){
	$('#mainset').load('tabla.client.vehiculos.view.php');
	$('#btnAgregarVehiculo').click(function(){
		if(validarFormVacio('frmAgrega') > 0){
			alertify.alert("Error","Debes llenar todos los campos. "+validarFormVacio('frmAgrega'));
			return false;
		}

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('placaV', $('#placaV').prop('value'));
		paqueteDeDatos.append('marcaV', $('#marcaV').prop('value'));
		paqueteDeDatos.append('modeloV', $('#modeloV').prop('value'));
		paqueteDeDatos.append('unidadV', $('#unidadV').prop('value'));
		paqueteDeDatos.append('motorV', $('#motorV').prop('value'));
		paqueteDeDatos.append('fotoV', $('#fotoV')[0].files[0]);

		$.ajax({
				url: 'php/agregarVehiculo.php',
				type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
				contentType: false,
				data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
				processData: false,
				cache: false, 
			success:function(r){
				if(r==1){
					$('#frmAgrega')[0].reset();
					$('#addmodal').modal('hide');
					$('#mainset').load('tabla.client.vehiculos.view.php');
					alertify.success("Agregado con exito :)");
					Location.reload();
				}
				else{
					alertify.alert("No se pudo agregar: " + r);
				}
			}
		});
	});
});
//---------------------------------------------------------------------------------------------------------------------------->

//------------------------------------------ VALIDAR FORMULARIO MODIFICAR VEHICULO ------------------------------------------->
$(document).ready(function(){
	$('#btnactualizar').click(function(){
	if(validarFormVacio('frmactualiza') > 0){
		alertify.alert("Error","Debes llenar todos los campos. ");
		return false;
	}
	var datos = new FormData();

	datos.append('placa', $('#placaVM').prop('value'));
	datos.append('marca', $('#marcaVM').prop('value'));
	datos.append('modelo', $('#modeloVM').prop('value'));
	datos.append('unidad', $('#unidadVM').prop('value'));
	datos.append('motor', $('#motorVM').prop('value'));
	datos.append('foto', $('#fotoVM')[0].files[0]);

		$.ajax({
			url: 'php/actualizarVehiculo.php',
			type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
			contentType: false,
			data: datos, // Al atributo data se le asigna el objeto FormData.
			processData: false,
			cache: false, 

		success:function(r){
			if(r==1){
				$('#frmactualiza')[0].reset();
				$('#updatemodal').modal('hide');
				$('#mainset').load('tabla.client.vehiculos.view.php');
				alertify.success("Actualizado con exito.");
			}else{
				alertify.alert("ERROR","No se pudo actualizar: "+r);
			}
		}
		});
	});
});
//---------------------------------------------------------------------------------------------------------------------------->

//------------------------------------------ ELIMINAR VEHICULO ------------------------------------------->
function eliminarVehiculo(placa){
alertify.confirm('ELIMINAR VEHICULO', '<CENTER>¿ESTA SEGURO DE DAR DE BAJA ESTE VEHICULO?</CENTER>', 
	function(){ 
		$.ajax({
			type:"POST",
			data:"placa=" + placa,
			url:"php/eliminarVehiculo.php",
			success:function(r){
				if(r==1){   
					$('#mainset').load('tabla.client.vehiculos.view.php');
					alertify.success("Eliminado con exito.");
				}else{
					alertify.error("No se pudo eliminar.");
				}
			}
		});
	}
	,function(){ 
		alertify.error('OPERACION CANCELADA')
	});
}
//---------------------------------------------------------------------------------------------------------------------------->