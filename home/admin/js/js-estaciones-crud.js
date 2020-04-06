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

		var checkEmpresa = document.querySelector('#checkEmpresaEM');
		var fkEmpresa = 0;
		var formulario = document.querySelector('#frmactualiza');
		var datos = new FormData(formulario);
		if (checkEmpresa.checked == false) {
			fkEmpresa = document.querySelector('#idEmpresaEM').value;
		}
		datos.append('idEmpresa', fkEmpresa);
		$.ajax({
			url:"consultas/modificarEstacion.php",
			type:"POST",
			contentType: false,
			data:datos,
			processData: false,
			cache: false, 
			success:function(r){
				if(r==1){
					$('#frmactualiza')[0].reset();
					$('#updatemodal').modal('hide');
					$('#mainset').load('tabla.admin.estaciones.view.php');
					alertify.success("Modificado con exito");
				}
				else{
					alertify.alert("No se pudo modificar",  "Debido a: "+r);
				}
			}
		});
	});

	//------------------------------------------- ABRIR MODAL PARA MODIFICAR ------------------------------
	$('#')
});