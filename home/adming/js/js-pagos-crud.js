'use strict';

$(document).ready(function(){
	$('#btnbuscar').click(function(){
		
		if(validarFormVacio('frmBusca') > 0){
			alertify.alert("Error","Debes llenar todos los campos");
			return false;
		}
		$('#frmBusca').submit();
	});
	$('#btnpagar').click(function(){
		if(validarFormVacio('frmPagar') > 0){
			alertify.alert("Error","Debes llenar todos los campos");
			return false;
		}
		var datos = $('#frmPagar').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"consultas/agregarPago.php",
			success:function(r) {
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