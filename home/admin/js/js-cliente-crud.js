'use strict'

$(document).ready(function(){
	//NUEVO CLIENTE
	$('#btnAgregarg').click(function(){

		if(!ValidarNuevoCliente()){
			return false;
		}
		var datos=$('#frmAgregar').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"consultas/agregarCliente.php",
			success:function(r){
				if(r==1){
					$('#frmAgregar')[0].reset();
					buscar_datos();
					$('#addmodal').modal('hide');
					alertify.success("Agregado con exito");
				}
				else{
					alertify.error("No se pudo agregar: " + r);
				}
			}
		});
	});

	//MODIFICAR CLIENTE
	$('#btnactualizar').click(function(){

		if (!validarModificacionCliente()) {
			return false;
		}

		var datos = $('#frmactualiza').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"consultas/modificarCliente.php",
			success:function(r){
				if(r==1){
					$('#frmactualiza')[0].reset();
					buscar_datos();
				 	$('#updatemodal').modal('hide');
					alertify.success("Modificado con exito");
				}
				else{
					alertify.error("No se pudo modificar. "+r);
				}
			}
		});
	});
});