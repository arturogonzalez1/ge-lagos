'use strict'

//ACTIVAR CLIENTE
function activarCliente(idcliente){
alertify.confirm('ACTIVAR CLIENTE', '<CENTER>¿ESTA SEGURO DE ACTIVAR ESTE CLIENTE? <br><br> <FONT style="color:red;"><FONT></CENTER>', 
		function(){ 
			$.ajax({
				type:"POST",
				data:"usr=" + idcliente,
				url:"consultas/activarCliente.php",
				success:function(r){
					if(r==1){     
						buscar_datos();
						alertify.success("Cliente activo");
					}else{
						alertify.error("No se pudo activar"+r);
					}
				}
			});
		}
		,function(){ 
			alertify.error('OPERACION CANCELADA')
		});
}
//SUSPENDER CLIENTE
function suspenderCliente(idcliente){
	alertify.confirm('SUSPENDER CLIENTE', '<CENTER>¿ESTA SEGURO DE SUSPENDER ESTE CLIENTE? <br><br> <FONT style="color:red;"><FONT></CENTER>', 
		function(){ 
			$.ajax({
				type:"POST",
				data:"usr=" + idcliente,
				url:"consultas/suspenderCliente.php",
				success:function(r){
					if(r==1){    
						buscar_datos();
						alertify.success("Cliente suspendido");
					}else{
						alertify.error("No se pudo suspender"+r);
					}
				}
			});
		}
		,function(){ 
			alertify.error('OPERACION CANCELADA')
		});
}


$(document).ready(function(){
	//NUEVO CLIENTE
	$('#btnAgregarg').click(function(){

		if(!validarNuevoCliente()){
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
					alertify.alert("No se pudo agregar", r);
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
					alertify.alert("ERROR AL MODIFICAR", r);
				}
			}
		});
	});
});