'use strict'

//----------------------------------------- VALIDAR FORMULARIO AGREGAR NUEVA ESTACION -----------------------------------------
$(document).ready(function(){
	$('#mainset').load('tabla.admin.estaciones.view.php');
	$('#btnAgregarEstacion').click(function(){
		var checkEmpresa = document.querySelector('#checkEmpresa');
		var opcion = 0;
		var formulario = document.querySelector('#frmAgrega');
		var datos = new FormData(formulario);
		var value = $('#empresaE').val();
		datos.append('idEmpresa', $('#listaEmpresas [value="' + value + '"]').data('value'));
		if (checkEmpresa.checked == true) {
			opcion = 1;
		}
		else {
			opcion = 0;
		}
		datos.append('checkbox', opcion);
		$.ajax({
			url:"consultas/agregarEstacion.php",
			type:"POST",
			contentType: false,
			data:datos,
			processData: false,
			cache: false, 
			success:function(r){
				if(r==1){
					$('#frmAgrega')[0].reset();
					$('#addmodal').modal('hide');
					$('#mainset').load('tabla.admin.estaciones.view.php');
					alertify.success("Estacion agregada con exito.");
				}
				else{
					alertify.alert("Error ", r);
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

	//------------------------------------------- ABRIR MODAL PARA MODIFICAR ------------------------------
	$('#')
});