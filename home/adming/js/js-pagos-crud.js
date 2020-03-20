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
		var formulario = document.querySelector("#frmPagar");
		var datos = new FormData(formulario);
		var value = $('#cliente').val();
		datos.append('id', $('#listaClientes [value="' + value + '"]').data('value'));
		$.ajax({
			url:"consultas/agregarPago.php",
			type:"POST",
			contentType: false,
			data:datos,
			processData: false,
			cache: false, 
			success:function(r) {
				if (r==1) {
					alertify.success("El pago se ha realizado correctamente");
					ActualizarPagos();
				}
				else {
					alertify.alert("ERROR","Error al realizar el pago. "+r);
				}
			}
		});
	});
});