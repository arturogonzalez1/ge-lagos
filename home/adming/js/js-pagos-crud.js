'use strict'

$(document).ready(function(){
	$('#btnbuscar').click(function(){
		if(validarFormVacio('frmBusca') > 0){
			alertify.alert("Error","Debes llenar todos los campos");
			return false;
		}
		$('#frmBusca').submit();
	});
	$('#btnpagar').click(function(){
		if(validarFormVacio('frmactualiza') > 0){
			alertify.alert("Error","Debes llenar todos los campos");
			return false;
		}
		var datos = $('#frmactualiza').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"consultas/modificarPagos.php",
			success:function(r) {
				alertify.alert("Respuesta Servidor: ",r);
				if (r==1) {
					alertify.success("El pago se ha realizado correctamente");
					ActualizarPagos();				
				}
				else if (r==2) {
					alertify.error("Error en las fechas");
				}
				else {
					alertify.error("Error al realizar el pago");
				}
			}
		});
	});
});