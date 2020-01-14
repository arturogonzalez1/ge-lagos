'use strict'

$(ActualizarPagos());

function ActualizarPagos(){
	var datos = new FormData();
	datos.append('i', 0);
	$.ajax({
		url: 'consultas/verPagos.php',
		type: 'POST',
		contentType: false,
		data: datos,
		dataType: 'html',
		processData: false,
		cache: false, 
		success:function(r){
			$('#mainset').html(r);
		}
	});
}