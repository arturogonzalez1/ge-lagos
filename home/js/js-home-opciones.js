'use strict'

function obtenerEstadoCliente(usuario){
	$.ajax({
	type:"POST",
	data:"usuario=" + usuario,
	url:"php/estadoCliente.php",
	success:function(r){
		var datos=jQuery.parseJSON(r);
		document.getElementById('infoAdvertencia').innerText = "";
		document.getElementById('infoAdvertenciaCredito').innerText = "";
		var estado = datos['estado'];
		var cantidad = datos['cantidad'];

		if (estado != 'ACTIVO' || cantidad <= 500)
		{
			if (estado != 'ACTIVO')
			{
				document.getElementById('infoAdvertencia').innerText = 'Su credito se encuentra '+estado+'. Pongase en contacto con el administrador';
			}
			if (cantidad <= 500)
			{
				document.getElementById('infoAdvertenciaCredito').innerText = 'Su saldo esta por agotarse. Realice un pago para continuar con su credito';
			}
			$('#notificacionModal').modal();
		}
		
	}
	});
}